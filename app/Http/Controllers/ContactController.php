<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Lead;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Captación pública de consultas jurídicas. Es el único punto de ESCRITURA sin
 * sesión del sitio, endurecido en dos capas:
 *   1. Ruta con throttle (routes/web.php) — corta ráfagas de un mismo IP.
 *   2. Honeypot — campo `website` invisible; si viene relleno es un bot: se
 *      responde "ok" sin guardar, para no darle pistas.
 */
class ContactController extends Controller
{
    public function store(StoreContactRequest $request)
    {
        // Honeypot: un bot rellena todos los campos, un humano no ve este.
        if (filled($request->input('website'))) {
            return back();
        }

        $lead = new Lead($request->validated());
        $lead->source = 'sitio-firma';
        $lead->status = 'new';
        $lead->consent_at = now();
        $lead->ip_address = $request->ip();
        $lead->user_agent = substr((string) $request->userAgent(), 0, 1000);
        $lead->save();

        // Reenvía la consulta al CRM de Ualdo para gestionarla en una sola bandeja.
        // Corre DESPUÉS de enviar la respuesta (terminating) para no hacer esperar
        // al usuario. Best-effort: si el CRM no está configurado o falla, la
        // consulta ya quedó guardada localmente, así que nunca se pierde.
        app()->terminating(fn () => $this->forwardToCrm($lead));

        return back();
    }

    /**
     * Reenvía la consulta al intake del CRM de Ualdo (server-to-server), etiquetada
     * como 'sitio-firma'. El área concreta se antepone al mensaje para no perderla.
     */
    private function forwardToCrm(Lead $lead): void
    {
        $crm = config('services.ualdo_crm');
        if (empty($crm['url']) || empty($crm['secret'])) {
            return;
        }

        $areas = [
            'civil' => 'Derecho Civil',
            'laboral' => 'Derecho Laboral',
            'empresarial' => 'Derecho Empresarial y Societario',
            'asesoria_empresas' => 'Asesoría a Empresas',
            'asesoria_politica' => 'Asesoría Política y Gestión Pública',
            'otro' => 'Consulta general',
        ];
        $areaLabel = $areas[$lead->matter_type] ?? ($lead->matter_type ?: 'Consulta general');
        $message = trim('[Área: '.$areaLabel.'] '.((string) $lead->message));

        try {
            Http::withHeaders(['X-Leads-Secret' => $crm['secret']])
                ->timeout(8)
                ->post($crm['url'], [
                    'first_name' => $lead->first_name,
                    'last_name' => $lead->last_name,
                    'email' => $lead->email,
                    'phone' => $lead->phone,
                    'city' => $lead->city,
                    'message' => $message,
                    'product_interest' => 'legal',
                    'source' => 'sitio-firma',
                ])
                ->throw();
        } catch (\Throwable $e) {
            Log::warning('No se pudo reenviar la consulta al CRM de Ualdo: '.$e->getMessage());
        }
    }
}

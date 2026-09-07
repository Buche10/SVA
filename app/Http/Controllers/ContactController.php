<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Lead;

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

        // TODO (opcional): notificar por correo a la firma cuando se configure MAIL.

        return back();
    }
}

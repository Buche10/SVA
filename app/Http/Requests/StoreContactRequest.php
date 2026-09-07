<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Validación del formulario público de consulta. authorize = true porque la ruta
 * es abierta; la defensa contra abuso vive en el throttle de la ruta y el honeypot.
 */
class StoreContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name'  => 'required|string|max:255',
            'last_name'   => 'nullable|string|max:255',
            'email'       => 'required|email|max:255',
            'phone'       => ['nullable', 'string', 'max:50', 'regex:/^[0-9\+\-\s\(\)]+$/'],
            'city'        => 'nullable|string|max:255',
            'matter_type' => 'required|string|in:civil,laboral,empresarial,asesoria_empresas,asesoria_politica,otro',
            'message'     => 'nullable|string|max:2000',
            // Consentimiento LOPDP obligatorio: sin "sí" explícito no hay base legal.
            'consent'     => 'accepted',
        ];
    }

    public function messages(): array
    {
        return [
            'consent.accepted'     => 'Necesitamos tu consentimiento para poder contactarte.',
            'email.required'       => 'Déjanos un correo para poder responderte.',
            'matter_type.required' => 'Indícanos el tipo de asunto de tu consulta.',
        ];
    }
}

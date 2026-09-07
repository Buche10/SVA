<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Consulta jurídica captada en el sitio público. Los campos de rastro
 * (consent_at, ip_address, user_agent) y status/source se fijan en el
 * controlador, no por mass-assignment.
 */
class Lead extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'city',
        'matter_type',
        'message',
    ];

    protected $casts = [
        'consent_at' => 'datetime',
    ];
}

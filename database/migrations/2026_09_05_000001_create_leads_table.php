<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Consultas captadas desde el sitio público del bufete. Guarda el rastro que la
 * LOPDP exige para un consentimiento válido: consent_at, ip_address y user_agent.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            // Clasificación de la consulta (área de práctica / tipo de asesoría).
            $table->string('matter_type')->nullable();
            $table->text('message')->nullable();
            $table->string('source')->default('sitio-firma');
            $table->string('status')->default('new');
            // Rastro del consentimiento (LOPDP).
            $table->timestamp('consent_at')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();

            $table->index('status');
            $table->index('matter_type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};

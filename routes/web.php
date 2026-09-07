<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Sitio institucional público de Santamaría Velasco & Asociados (single-page).
Route::get('/', fn () => Inertia::render('Home'))->name('home');

// Captación de consultas. PÚBLICA y de escritura: throttle 5/min por IP + honeypot
// en el controlador frenan bots sin molestar a un humano que corrige y reenvía.
Route::post('/contacto', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contacto.store');

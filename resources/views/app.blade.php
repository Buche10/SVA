<!DOCTYPE html>
@php
    $siteName = 'Santamaría Velasco & Asociados';
    $siteUrl = rtrim(config('app.url'), '/');
    $description = 'Firma legal en Ambato, Ecuador especializada en protección de datos (LOPDP), delegado de protección de datos (DPO) externo, derecho de la economía digital, gobernanza de inteligencia artificial, derecho empresarial, propiedad intelectual y sector financiero popular y solidario (SEPS).';

    // Datos estructurados schema.org. Se genera desde un array PHP para que Blade
    // no interprete las claves "@context"/"@type" como directivas.
    $jsonLd = [
        '@context' => 'https://schema.org',
        '@type' => 'LegalService',
        'name' => 'Santamaría Velasco & Asociados',
        'alternateName' => 'Santamaría Velasco & Aso.',
        'description' => $description,
        'url' => $siteUrl,
        'slogan' => 'Soluciones legales e informáticas',
        'areaServed' => ['@type' => 'Country', 'name' => 'Ecuador'],
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => 'Ambato',
            'addressRegion' => 'Tungurahua',
            'addressCountry' => 'EC',
        ],
        'knowsAbout' => [
            'Protección de datos personales (LOPDP)',
            'Delegado de Protección de Datos (DPO)',
            'Derecho de la economía digital',
            'Gobernanza y derecho de la inteligencia artificial',
            'Derecho empresarial y societario',
            'Registro de marcas y propiedad intelectual',
            'Sector financiero popular y solidario (SEPS)',
            'Derecho civil',
            'Derecho laboral',
        ],
        'founder' => [
            ['@type' => 'Person', 'name' => 'Juan Pablo Santamaría', 'jobTitle' => 'Socio Fundador · Dirección General'],
            ['@type' => 'Person', 'name' => 'Alex Mauricio Parra', 'jobTitle' => 'Socio Fundador · Dirección Jurídica'],
            ['@type' => 'Person', 'name' => 'Carlos Bucheli Escobar', 'jobTitle' => 'Socio Fundador · Dirección Tecnológica'],
        ],
    ];
@endphp
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#1e2b45">

        <title inertia>{{ config('app.name', $siteName) }}</title>

        {{-- SEO --}}
        <meta name="description" content="{{ $description }}">
        <meta name="keywords" content="firma legal Ambato, abogados Ecuador, protección de datos LOPDP, DPO externo, delegado de protección de datos, derecho de la economía digital, gobernanza de inteligencia artificial, derecho empresarial, registro de marcas SENADI, propiedad intelectual, cooperativas SEPS, sector financiero popular y solidario, Santamaría Velasco">
        <meta name="author" content="{{ $siteName }}">
        <meta name="robots" content="index, follow, max-image-preview:large">
        <link rel="canonical" href="{{ $siteUrl }}">

        {{-- Open Graph --}}
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="{{ $siteName }}">
        <meta property="og:title" content="{{ $siteName }} — Firma legal, consultoría estratégica e innovación">
        <meta property="og:description" content="{{ $description }}">
        <meta property="og:url" content="{{ $siteUrl }}">
        <meta property="og:locale" content="es_EC">
        {{-- TODO: subir una portada 1200x630 a public/branding/og-image.jpg --}}
        <meta property="og:image" content="{{ $siteUrl }}/branding/og-image.jpg">

        {{-- Twitter --}}
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $siteName }}">
        <meta name="twitter:description" content="{{ $description }}">
        <meta name="twitter:image" content="{{ $siteUrl }}/branding/og-image.jpg">

        {{-- Datos estructurados (JSON-LD) — legibles por Google y buscadores de IA --}}
        <script type="application/ld+json">{!! json_encode($jsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>

        <!-- Fonts: Cormorant Garamond (titulares) + Inter (cuerpo) -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=cormorant-garamond:400,500,600,700|inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>

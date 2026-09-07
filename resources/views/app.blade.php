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
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name' => 'Áreas de práctica y servicios',
            'itemListElement' => array_map(fn ($s) => [
                '@type' => 'Offer',
                'itemOffered' => ['@type' => 'Service', 'name' => $s],
            ], [
                'Derecho Civil',
                'Derecho Laboral',
                'Derecho Empresarial y Societario',
                'Registro de marcas y propiedad intelectual (SENADI)',
                'Protección de datos personales (LOPDP y RGPD)',
                'Delegado de Protección de Datos (DPO) externo',
                'Derecho de la Economía Digital',
                'Gobernanza y Derecho de la Inteligencia Artificial',
                'Sector Financiero Popular y Solidario (SEPS)',
            ]),
        ],
    ];

    // FAQPage. Mantener SINCRONIZADO con `faqs` en resources/js/data/site.js.
    $faqs = [
        ['¿Qué es la LOPDP y a quién obliga?', 'La LOPDP es la Ley Orgánica de Protección de Datos Personales del Ecuador. Obliga a toda organización que trate datos personales —empresas, cooperativas, instituciones y profesionales— a proteger esa información y respetar los derechos de sus titulares, bajo riesgo de sanciones.'],
        ['¿Qué es un Delegado de Protección de Datos (DPO) y cuándo lo necesito?', 'El DPO (Delegado de Protección de Datos) es la figura responsable de velar por el cumplimiento de la protección de datos en una organización. Ofrecemos DPO externo para empresas que deben designarlo o que prefieren delegar esa función en especialistas.'],
        ['¿Cómo ayudan a mi empresa a cumplir la LOPDP y el RGPD europeo?', 'Hacemos un diagnóstico de brechas, diseñamos y construimos el sistema de protección de datos (políticas, avisos de privacidad y registro de tratamientos), capacitamos a tu equipo y acompañamos con un DPO externo, alineados con la LOPDP del Ecuador y el RGPD europeo (GDPR).'],
        ['¿Asesoran a cooperativas de ahorro y crédito (SEPS)?', 'Sí. Asesoramos al sector financiero popular y solidario en cumplimiento ante la Superintendencia de Economía Popular y Solidaria (SEPS), gobierno cooperativo, prevención de lavado de activos (LAFT) y protección de datos del socio.'],
        ['¿Registran marcas y protegen propiedad intelectual?', 'Sí. Registramos marcas y signos distintivos ante el SENADI y protegemos la propiedad intelectual (patentes, derechos de autor y secretos empresariales) como parte del área de Derecho Empresarial y Societario.'],
        ['¿Dónde están ubicados y atienden a nivel nacional?', 'Estamos en Ambato, Ecuador, y brindamos cobertura nacional. Puedes agendar una consulta desde el formulario de contacto del sitio.'],
    ];
    $faqLd = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array_map(fn ($f) => [
            '@type' => 'Question',
            'name' => $f[0],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f[1]],
        ], $faqs),
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
        <script type="application/ld+json">{!! json_encode($faqLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>

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

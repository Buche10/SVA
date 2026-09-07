<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import { practiceAreas, advisory, team, matterTypes, contactInfo, faqs } from '@/data/site';

const openFaq = ref(0);
const toggleFaq = (i) => { openFaq.value = openFaq.value === i ? null : i; };

const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    phone: '',
    city: '',
    matter_type: '',
    message: '',
    consent: false,
    website: '', // honeypot
});

const submit = () => {
    form.post('/contacto', {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Santamaría Velasco & Asociados — Firma Legal, Consultoría Estratégica e Innovación" />

    <div class="min-h-screen bg-sv-cream font-sans text-sv-navy-900 antialiased scroll-smooth">
        <!-- Header -->
        <header class="sticky top-0 z-50 bg-sv-navy-800/95 backdrop-blur border-b border-white/10">
            <div class="mx-auto max-w-6xl px-6 flex items-center justify-between h-20">
                <a href="#inicio" class="flex items-center gap-3">
                    <img src="/branding/sv-logo.svg" alt="Santamaría Velasco & Asociados" class="h-12 w-auto"
                         onerror="this.style.display='none'" />
                    <span class="flex flex-col leading-none">
                        <span class="font-serif text-xl text-white">
                            Santamaría Velasco <span class="text-sv-gold-400">&amp; Asociados</span>
                        </span>
                        <span class="mt-1 text-[10px] uppercase tracking-[0.15em] text-white/50">Soluciones legales e informáticas</span>
                    </span>
                </a>
                <nav class="hidden md:flex items-center gap-7 text-sm font-medium text-white/80">
                    <a href="#areas" class="hover:text-sv-gold-400 transition">Áreas</a>
                    <a href="#asesoria" class="hover:text-sv-gold-400 transition">Consultoría</a>
                    <a href="#firma" class="hover:text-sv-gold-400 transition">La Firma</a>
                    <a href="#contacto" class="rounded-full bg-sv-gold-500 px-5 py-2.5 font-semibold text-sv-navy-900 hover:bg-sv-gold-400 transition">
                        Agendar consulta
                    </a>
                </nav>
            </div>
        </header>

        <!-- Hero -->
        <section id="inicio" class="relative bg-sv-navy-800 text-white overflow-hidden">
            <div class="absolute inset-0 opacity-[0.06] flex items-center justify-end pr-10 select-none pointer-events-none">
                <span class="font-serif text-[26rem] leading-none text-sv-gold-400">SV</span>
            </div>
            <div class="relative mx-auto max-w-6xl px-6 py-24 md:py-32 max-w-3xl">
                <p class="text-sv-gold-400 font-semibold tracking-[0.2em] uppercase text-xs mb-6">
                    Firma Legal · Consultoría Estratégica · Innovación
                </p>
                <h1 class="font-serif text-4xl md:text-6xl leading-tight text-white max-w-3xl">
                    Solvencia jurídica, visión empresarial y asesoría estratégica para decisiones de alto impacto.
                </h1>
                <p class="mt-6 text-lg text-white/70 max-w-2xl leading-relaxed">
                    Tomamos decisiones respaldadas en <strong class="text-white/90 font-semibold">datos reales y estrategia tecnológica</strong>,
                    combinando rigor jurídico, capacidad de litigio y visión preventiva para acompañar a empresas,
                    personas y líderes del sector público con estándares de alto nivel.
                </p>
                <div class="mt-10 flex flex-col sm:flex-row gap-4">
                    <a href="#contacto" class="rounded-full bg-sv-gold-500 px-8 py-4 font-semibold text-sv-navy-900 hover:bg-sv-gold-400 transition text-center">
                        Agendar consulta
                    </a>
                    <a href="#areas" class="rounded-full border border-white/25 px-8 py-4 font-semibold text-white hover:bg-white/10 transition text-center">
                        Explorar áreas de práctica
                    </a>
                </div>
            </div>
        </section>

        <!-- Diferenciadores -->
        <section class="mx-auto max-w-6xl px-6 py-20 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
            <div v-for="d in [
                { t: 'Rigor técnico', d: 'Fundamentación jurídica sólida en cada estrategia y actuación procesal.', i: 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z' },
                { t: 'Enfoque preventivo', d: 'Anticipamos contingencias para blindar a nuestros clientes antes del conflicto.', i: 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z' },
                { t: 'Visión integral', d: 'Derecho, negocio y tecnología al servicio de decisiones de alto impacto.', i: 'M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z M15 12a3 3 0 11-6 0 3 3 0 016 0z' },
                { t: 'Decisiones basadas en datos', d: 'Estrategia respaldada en datos reales y herramientas tecnológicas: decidimos con evidencia, no con intuición.', i: 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z' },
            ]" :key="d.t" class="border-l-2 border-sv-gold-500 pl-5">
                <div class="w-11 h-11 rounded-xl bg-sv-gold-500/10 text-sv-gold-600 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" :d="d.i" />
                    </svg>
                </div>
                <h3 class="font-serif text-2xl mb-2">{{ d.t }}</h3>
                <p class="text-sv-navy-700/80 leading-relaxed">{{ d.d }}</p>
            </div>
        </section>

        <!-- Confianza y cifras -->
        <section class="bg-sv-navy-800 text-white">
            <div class="mx-auto max-w-6xl px-6 py-16 grid gap-10 sm:grid-cols-2 lg:grid-cols-4 text-center divide-y sm:divide-y-0 sm:divide-x divide-white/10">
                <div v-for="s in [
                    { n: '+15', l: 'Años de experiencia' },
                    { n: '3', l: 'Áreas de práctica jurídica' },
                    { n: 'Nacional', l: 'Cobertura desde Ambato' },
                    { n: 'LOPDP', l: 'Datos soberanos y cumplimiento' },
                ]" :key="s.l" class="pt-8 sm:pt-0 sm:px-4">
                    <div class="font-serif text-4xl md:text-5xl text-sv-gold-400">{{ s.n }}</div>
                    <div class="mt-2 text-xs sm:text-sm text-white/60 uppercase tracking-wider">{{ s.l }}</div>
                </div>
            </div>
        </section>

        <!-- Áreas de práctica -->
        <section id="areas" class="bg-white py-24 scroll-mt-20">
            <div class="mx-auto max-w-6xl px-6">
                <div class="max-w-2xl mb-14">
                    <p class="text-sv-gold-600 font-semibold tracking-widest uppercase text-xs">Arquitectura Jurídica 360</p>
                    <h2 class="font-serif text-4xl mt-3">Patrocinio jurídico especializado</h2>
                    <p class="mt-4 text-sv-navy-700/80 leading-relaxed">
                        Un enfoque integral que diseña, ordena y protege: combina derecho tradicional, derecho digital, protección de datos e inteligencia artificial soberana en cada área de práctica.
                    </p>
                </div>
                <!-- Áreas base -->
                <div class="grid gap-8 md:grid-cols-3">
                    <article v-for="area in practiceAreas.slice(0, 3)" :key="area.slug"
                             class="rounded-2xl border border-sv-navy-900/10 p-8 hover:border-sv-gold-500 transition-colors flex flex-col">
                        <h3 class="font-serif text-2xl text-sv-navy-800">{{ area.title }}</h3>
                        <p class="mt-2 text-sm text-sv-gold-600 font-medium">{{ area.summary }}</p>
                        <ul class="mt-5 space-y-2.5">
                            <li v-for="it in area.items" :key="it" class="flex gap-2.5 text-sm text-sv-navy-700/80 leading-snug">
                                <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-sv-gold-500"></span>{{ it }}
                            </li>
                        </ul>
                    </article>
                </div>

                <!-- Áreas especializadas (diferenciadas) -->
                <div class="mt-16 mb-8">
                    <p class="text-sv-gold-600 font-semibold tracking-widest uppercase text-xs">Áreas especializadas</p>
                    <h3 class="font-serif text-3xl mt-2 text-sv-navy-800">Derecho para la economía digital y los datos</h3>
                </div>
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    <article v-for="area in practiceAreas.slice(3)" :key="area.slug"
                             class="rounded-2xl border border-sv-navy-900/10 p-7 hover:border-sv-gold-500 transition-colors flex flex-col">
                        <h3 class="font-serif text-xl text-sv-navy-800">{{ area.title }}</h3>
                        <p class="mt-2 text-sm text-sv-gold-600 font-medium">{{ area.summary }}</p>
                        <ul class="mt-5 space-y-2.5">
                            <li v-for="it in area.items" :key="it" class="flex gap-2.5 text-sm text-sv-navy-700/80 leading-snug">
                                <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-sv-gold-500"></span>{{ it }}
                            </li>
                        </ul>
                    </article>
                </div>
            </div>
        </section>

        <!-- Herramientas -->
        <section class="bg-sv-cream py-20">
            <div class="mx-auto max-w-4xl px-6">
                <p class="text-sv-gold-600 font-semibold tracking-widest uppercase text-xs">Herramientas</p>
                <h2 class="font-serif text-4xl mt-3 mb-8">Recursos prácticos</h2>
                <div class="rounded-2xl bg-white border border-sv-navy-900/10 p-8 flex flex-col sm:flex-row sm:items-center gap-6">
                    <div class="w-14 h-14 shrink-0 rounded-2xl bg-sv-gold-500/10 text-sv-gold-600 flex items-center justify-center">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-serif text-2xl text-sv-navy-800">Calculadora laboral</h3>
                        <p class="mt-1 text-sm text-sv-navy-700/80 leading-relaxed">
                            Calcula rubros de derecho laboral del Ecuador de forma rápida, confiable y ajustada a la normativa vigente.
                        </p>
                    </div>
                    <a href="#contacto" class="shrink-0 inline-flex items-center justify-center gap-2 rounded-full bg-sv-navy-800 px-6 py-3 text-sm font-semibold text-white hover:bg-sv-navy-700 transition">
                        Conoce más
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- Asesoría estratégica -->
        <section id="asesoria" class="bg-sv-navy-800 text-white py-24 scroll-mt-20">
            <div class="mx-auto max-w-6xl px-6">
                <div class="max-w-2xl mb-14">
                    <p class="text-sv-gold-400 font-semibold tracking-widest uppercase text-xs">Consultoría y asesoramiento</p>
                    <h2 class="font-serif text-4xl mt-3">Estrategia legal para empresas y sector público</h2>
                </div>
                <div class="grid gap-8 md:grid-cols-2">
                    <div v-for="block in advisory" :key="block.slug" class="rounded-2xl bg-white/5 border border-white/10 p-8">
                        <p class="text-sv-gold-400 text-xs font-semibold tracking-widest uppercase">{{ block.eyebrow }}</p>
                        <h3 class="font-serif text-2xl mt-2 text-white">{{ block.title }}</h3>
                        <ul class="mt-5 space-y-2.5">
                            <li v-for="it in block.items" :key="it" class="flex gap-2.5 text-sm text-white/75 leading-snug">
                                <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-sv-gold-400"></span>{{ it }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- La Firma + Equipo -->
        <section id="firma" class="bg-white py-24 scroll-mt-20">
            <div class="mx-auto max-w-6xl px-6">
                <div class="max-w-2xl mb-14">
                    <p class="text-sv-gold-600 font-semibold tracking-widest uppercase text-xs">La firma</p>
                    <h2 class="font-serif text-4xl mt-3">Socios fundadores</h2>
                    <p class="mt-4 text-sv-navy-700/80 leading-relaxed">
                        Un equipo que une trayectoria en litigio, docencia y economía digital con una visión
                        centrada en soluciones concretas y compromiso ético.
                    </p>
                </div>
                <div class="grid gap-8 md:grid-cols-3">
                    <article v-for="p in team" :key="p.name" class="rounded-2xl border border-sv-navy-900/10 overflow-hidden">
                        <div class="aspect-[4/3] bg-sv-navy-800 flex items-center justify-center">
                            <img :src="p.photo" :alt="`Foto de ${p.name}, ${p.role}`" class="h-full w-full object-cover object-top"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'" />
                            <span class="hidden h-full w-full items-center justify-center font-serif text-6xl text-sv-gold-400">{{ p.initials }}</span>
                        </div>
                        <div class="p-6">
                            <h3 class="font-serif text-xl text-sv-navy-800">{{ p.name }}</h3>
                            <p class="text-sv-gold-600 text-sm font-semibold mt-0.5">{{ p.role }}</p>
                            <ul class="mt-3 space-y-1">
                                <li v-for="c in p.creds" :key="c" class="text-xs text-sv-navy-700/70">{{ c }}</li>
                            </ul>
                            <p class="mt-4 text-sm text-sv-navy-700/80 leading-relaxed">{{ p.bio }}</p>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Cita del manifiesto -->
        <section class="relative bg-sv-navy-900 text-white overflow-hidden">
            <div class="absolute inset-0 opacity-[0.05] flex items-center justify-center select-none pointer-events-none">
                <span class="font-serif text-[18rem] leading-none text-sv-gold-400">SV</span>
            </div>
            <div class="relative mx-auto max-w-4xl px-6 py-24 text-center">
                <svg class="w-10 h-10 mx-auto text-sv-gold-400 mb-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9.983 3v7.391c0 5.704-3.731 9.57-8.983 10.609l-.995-2.151c2.432-.917 3.995-3.638 3.995-5.849h-4v-10h9.983zm14.017 0v7.391c0 5.704-3.748 9.571-9 10.609l-.996-2.151c2.433-.917 3.996-3.638 3.996-5.849h-3.983v-10h9.983z"/>
                </svg>
                <p class="font-serif text-2xl md:text-3xl leading-relaxed text-white">
                    No construimos herramientas para sustituir a las personas, sino para ayudarlas a comprender mejor, decidir con mayor seguridad y crear soluciones con impacto real.
                </p>
                <p class="mt-8 text-xs uppercase tracking-[0.2em] text-sv-gold-400 font-semibold">Manifiesto de la firma</p>
            </div>
        </section>

        <!-- Ualdo Corp (solo marca de innovación) -->
        <section class="bg-sv-cream py-20">
            <div class="mx-auto max-w-4xl px-6 text-center">
                <p class="text-sv-gold-600 font-semibold tracking-widest uppercase text-xs">Innovación</p>
                <h2 class="font-serif text-3xl md:text-4xl mt-3 text-sv-navy-800">Ualdo Corp</h2>
                <p class="mt-5 text-sv-navy-700/80 leading-relaxed max-w-2xl mx-auto">
                    Ualdo Corp es la marca y el brazo de innovación y desarrollo tecnológico de la firma,
                    orientada a integrar soluciones inteligentes y optimizar procesos organizacionales.
                </p>
                <a href="https://ualdocorp.com" target="_blank" rel="noopener"
                   class="mt-8 inline-flex rounded-full border border-sv-navy-800/20 px-7 py-3 font-semibold text-sv-navy-800 hover:border-sv-gold-500 transition">
                    Conocer Ualdo Corp
                </a>
            </div>
        </section>

        <!-- Preguntas frecuentes -->
        <section id="faq" class="bg-white py-24 scroll-mt-20">
            <div class="mx-auto max-w-3xl px-6">
                <div class="mb-12">
                    <p class="text-sv-gold-600 font-semibold tracking-widest uppercase text-xs">Preguntas frecuentes</p>
                    <h2 class="font-serif text-4xl mt-3">Resolvemos tus dudas</h2>
                </div>
                <div class="space-y-3">
                    <div v-for="(f, i) in faqs" :key="i" class="rounded-2xl border border-sv-navy-900/10 overflow-hidden">
                        <button @click="toggleFaq(i)" class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-sv-cream/60 transition">
                            <span class="font-serif text-lg text-sv-navy-800 pr-4">{{ f.q }}</span>
                            <svg class="w-5 h-5 text-sv-gold-600 shrink-0 transition-transform" :class="{ 'rotate-180': openFaq === i }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div v-show="openFaq === i" class="px-6 pb-5 text-sm text-sv-navy-700/80 leading-relaxed border-t border-sv-navy-900/5">
                            <p class="pt-4">{{ f.a }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contacto -->
        <section id="contacto" class="bg-sv-navy-900 text-white py-24 scroll-mt-20">
            <div class="mx-auto max-w-6xl px-6 grid gap-12 md:grid-cols-2">
                <div>
                    <p class="text-sv-gold-400 font-semibold tracking-widest uppercase text-xs">Contacto</p>
                    <h2 class="font-serif text-4xl mt-3">Agenda tu consulta jurídica</h2>
                    <p class="mt-4 text-white/70 leading-relaxed">
                        Cuéntanos tu caso y te contactamos. Atención en <strong class="text-white">{{ contactInfo.city }}</strong>
                        con {{ contactInfo.coverage.toLowerCase() }}.
                    </p>
                    <a v-if="contactInfo.whatsappUrl" :href="contactInfo.whatsappUrl" target="_blank" rel="noopener"
                       class="mt-8 inline-flex items-center gap-2.5 rounded-full bg-emerald-500 px-6 py-3.5 font-semibold text-white hover:bg-emerald-600 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.71.306 1.263.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Escríbenos por WhatsApp
                    </a>
                    <dl class="mt-6 space-y-2 text-sm text-white/70">
                        <div v-if="contactInfo.whatsapp"><dt class="inline text-sv-gold-400 font-semibold">WhatsApp: </dt><dd class="inline">{{ contactInfo.whatsapp }}</dd></div>
                        <div v-if="contactInfo.email"><dt class="inline text-sv-gold-400 font-semibold">Correo: </dt><dd class="inline">{{ contactInfo.email }}</dd></div>
                    </dl>
                </div>

                <div class="rounded-2xl bg-white/5 border border-white/10 p-8">
                    <div v-if="form.wasSuccessful" class="text-center py-8">
                        <h3 class="font-serif text-2xl text-white">Gracias, recibimos tu consulta.</h3>
                        <p class="mt-3 text-white/70">Un miembro del equipo te contactará a la brevedad.</p>
                    </div>
                    <form v-else @submit.prevent="submit" class="space-y-4">
                        <input v-model="form.website" type="text" tabindex="-1" autocomplete="off" class="hidden" aria-hidden="true" />
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-white/70 mb-1.5">Nombre *</label>
                                <input v-model="form.first_name" type="text" required class="w-full rounded-lg bg-white/10 border-white/15 text-white placeholder-white/40 focus:border-sv-gold-400 focus:ring-sv-gold-400" />
                                <p v-if="form.errors.first_name" class="mt-1 text-xs text-red-300">{{ form.errors.first_name }}</p>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-white/70 mb-1.5">Apellido</label>
                                <input v-model="form.last_name" type="text" class="w-full rounded-lg bg-white/10 border-white/15 text-white focus:border-sv-gold-400 focus:ring-sv-gold-400" />
                            </div>
                        </div>
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-white/70 mb-1.5">Correo *</label>
                                <input v-model="form.email" type="email" required class="w-full rounded-lg bg-white/10 border-white/15 text-white focus:border-sv-gold-400 focus:ring-sv-gold-400" />
                                <p v-if="form.errors.email" class="mt-1 text-xs text-red-300">{{ form.errors.email }}</p>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-white/70 mb-1.5">Teléfono</label>
                                <input v-model="form.phone" type="tel" class="w-full rounded-lg bg-white/10 border-white/15 text-white focus:border-sv-gold-400 focus:ring-sv-gold-400" />
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-white/70 mb-1.5">Tipo de asunto *</label>
                            <select v-model="form.matter_type" required class="w-full rounded-lg bg-white/10 border-white/15 text-white focus:border-sv-gold-400 focus:ring-sv-gold-400">
                                <option value="" class="text-sv-navy-900">Selecciona una opción</option>
                                <option v-for="m in matterTypes" :key="m.value" :value="m.value" class="text-sv-navy-900">{{ m.label }}</option>
                            </select>
                            <p v-if="form.errors.matter_type" class="mt-1 text-xs text-red-300">{{ form.errors.matter_type }}</p>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-white/70 mb-1.5">Describe tu consulta</label>
                            <textarea v-model="form.message" rows="3" class="w-full rounded-lg bg-white/10 border-white/15 text-white focus:border-sv-gold-400 focus:ring-sv-gold-400"></textarea>
                        </div>
                        <label class="flex items-start gap-3 cursor-pointer">
                            <input v-model="form.consent" type="checkbox" class="mt-1 rounded border-white/30 bg-white/10 text-sv-gold-500 focus:ring-sv-gold-400" />
                            <span class="text-xs text-white/70 leading-relaxed">
                                Autorizo el tratamiento de mis datos para ser contactado, conforme a la Ley Orgánica de Protección de Datos Personales (LOPDP).
                            </span>
                        </label>
                        <p v-if="form.errors.consent" class="text-xs text-red-300 -mt-2">{{ form.errors.consent }}</p>
                        <button type="submit" :disabled="form.processing"
                                class="w-full rounded-full bg-sv-gold-500 px-8 py-4 font-semibold text-sv-navy-900 hover:bg-sv-gold-400 transition disabled:opacity-60">
                            {{ form.processing ? 'Enviando…' : 'Enviar consulta' }}
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-sv-navy-900 border-t border-white/10 py-10">
            <div class="mx-auto max-w-6xl px-6 flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-white/50">
                <p class="font-serif text-white">Santamaría Velasco <span class="text-sv-gold-400">&amp; Asociados</span></p>
                <p>© {{ new Date().getFullYear() }} · {{ contactInfo.city }} · {{ contactInfo.coverage }}</p>
            </div>
        </footer>
    </div>
</template>

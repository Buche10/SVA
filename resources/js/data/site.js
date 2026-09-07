// Fuente única de contenido del sitio institucional. Mantener aquí textos y datos
// facilita ajustar copy sin tocar los componentes.

export const practiceAreas = [
    {
        slug: 'civil',
        title: 'Derecho Civil',
        summary: 'Protección del patrimonio y resolución rigurosa de controversias.',
        items: [
            'Contratos y obligaciones patrimoniales',
            'Bienes, propiedad y derechos reales',
            'Sucesiones, particiones y planificación patrimonial familiar',
            'Responsabilidad civil contractual y extracontractual',
            'Litigio y resolución de controversias civiles',
        ],
    },
    {
        slug: 'laboral',
        title: 'Derecho Laboral',
        summary: 'Estrategia patronal preventiva y defensa sólida ante contingencias.',
        items: [
            'Contratación laboral estratégica y políticas de compensación',
            'Prevención de contingencias patronales y auditorías de nómina',
            'Negociación y desvinculaciones laborales seguras',
            'Defensa y patrocinio ante inspectores de trabajo y juzgados de lo laboral',
        ],
    },
    {
        slug: 'empresarial',
        title: 'Derecho Empresarial y Societario',
        summary: 'Constitución, marcas, propiedad intelectual y gobierno para el crecimiento de tu empresa.',
        items: [
            'Constitución y registro de empresas ante la Superintendencia de Compañías',
            'Estructuración y disolución de sociedades (especialidad en S.A.S. y mercantiles)',
            'Registro de marcas, nombres comerciales y signos distintivos (SENADI)',
            'Propiedad intelectual: patentes, derechos de autor y secretos empresariales',
            'Acuerdos de accionistas, reformas estatutarias y buen gobierno corporativo',
            'Contratos comerciales, mercantiles y de colaboración',
            'Fusiones, adquisiciones y cesión de participaciones',
        ],
    },
    {
        slug: 'datos',
        title: 'Protección de Datos y Privacidad',
        summary: 'Cumplimiento LOPDP de punta a punta: del diagnóstico al sistema que lo sostiene.',
        items: [
            'Delegado de Protección de Datos (DPO) externo',
            'Diseño y construcción de sistemas de protección de datos (LOPDP)',
            'Diagnóstico, análisis de brechas y plan de adecuación a la LOPDP',
            'Políticas, avisos de privacidad, cláusulas y registro de actividades de tratamiento',
            'Gestión de brechas de seguridad y ejercicio de derechos de los titulares',
        ],
    },
    {
        slug: 'digital',
        title: 'Derecho de la Economía Digital',
        summary: 'El derecho que rige los negocios, contratos y plataformas del mundo digital.',
        items: [
            'E-commerce y comercio electrónico: contratos, términos y consumidor digital',
            'Firma electrónica y validez jurídica de documentos digitales',
            'Contratos tecnológicos: SaaS, licenciamiento de software y desarrollo',
            'Términos de uso, políticas y regulación de plataformas digitales',
            'Activos digitales y nuevos modelos de negocio',
        ],
    },
    {
        slug: 'ia',
        title: 'Gobernanza y Derecho de la IA',
        summary: 'Marco legal para adoptar inteligencia artificial con responsabilidad y confianza.',
        items: [
            'Políticas de uso responsable de IA y marcos de gobernanza',
            'Evaluación de riesgos y responsabilidad algorítmica',
            'Transparencia, explicabilidad y supervisión humana',
            'Cumplimiento de la IA con la LOPDP y normativa aplicable',
            'Contratos y cláusulas para sistemas de inteligencia artificial',
        ],
    },
    {
        slug: 'seps',
        title: 'Sector Financiero Popular y Solidario',
        summary: 'Cumplimiento y gobierno para cooperativas de ahorro y crédito ante la SEPS.',
        items: [
            'Cumplimiento regulatorio ante la Superintendencia de Economía Popular y Solidaria (SEPS)',
            'Gobierno cooperativo: estatutos, reglamentos internos y órganos de administración',
            'Prevención de lavado de activos (LAFT) y auditoría de cumplimiento',
            'Reglamentos de crédito, cobranza y protección de datos del socio',
            'Gestión de riesgos y acompañamiento a consejos',
        ],
    },
];

export const advisory = [
    {
        slug: 'empresas',
        eyebrow: 'Para empresas',
        title: 'Asesoría integral y gobierno corporativo',
        items: [
            'Modelo de igualas jurídicas: acompañamiento legal mensual permanente y preventivo',
            'Diagnósticos de cumplimiento normativo y blindaje institucional',
            'Negociaciones corporativas y estructuración de alianzas',
        ],
    },
    {
        slug: 'politica',
        eyebrow: 'Para el sector público y político',
        title: 'Asesoramiento político y gestión pública',
        items: [
            'Asesoría jurídica estratégica para actores políticos, autoridades y candidatos',
            'Técnica legislativa: diseño y revisión de proyectos normativos, ordenanzas y reglamentos',
            'Gestión de riesgos jurídicos, control político y defensa de derechos políticos',
            'Consultoría en gobernanza, gestión pública y manejo jurídico de crisis institucionales',
        ],
    },
];

// Los tres son Socios Fundadores. A Carlos Bucheli se le presenta con exactitud:
// estudiante de Derecho (no "abogado" aún) y perfil de innovación/tecnología.
export const team = [
    {
        name: 'Ab. Juan Pablo Santamaría',
        role: 'Socio Fundador · Dirección General y Academia Ualdo',
        creds: [
            'Magíster en Derecho Constitucional',
            'Magíster en Derecho de la Economía Digital',
        ],
        bio: 'Dirige el ecosistema de la firma y la Academia Ualdo. Abogado con más de 15 años de experiencia, docente y académico.',
        focus: ['Dirección General', 'Academia Ualdo', 'Estrategia'],
        photo: '/branding/team/jp-santamaria.jpg',
        initials: 'JP',
    },
    {
        name: 'Ab. Alex Mauricio Parra',
        role: 'Socio Fundador · Arquitectura Jurídica 360',
        creds: ['Magíster en Derecho Procesal'],
        bio: 'Dirige Arquitectura Jurídica 360: estrategia procesal, litigio y producción jurídica de la firma. Abogado en libre ejercicio con experiencia en docencia.',
        focus: ['Arquitectura Jurídica 360', 'Litigio', 'Derecho procesal'],
        photo: '/branding/team/a-parra.jpg',
        initials: 'AP',
    },
    {
        name: 'Carlos Bucheli Escobar',
        role: 'Socio Fundador · Ualdo (Tecnología e IA)',
        creds: [
            'Estudiante de Derecho e Ingeniería en Tecnologías de la Información',
            'Diplomado en Derecho Laboral',
            'Certificaciones de Harvard, Google y Oracle en desarrollo e IA',
        ],
        bio: 'Dirige Ualdo, la unidad de IA soberana de la firma: arquitectura, desarrollo y evolución del producto. Apoya el área de derecho laboral.',
        focus: ['Ualdo · IA soberana', 'Innovación', 'Derecho laboral'],
        photo: '/branding/team/c-bucheli.jpg',
        initials: 'CB',
    },
];

// Opciones del formulario de contacto clasificado.
export const matterTypes = [
    { value: 'civil', label: 'Derecho Civil' },
    { value: 'laboral', label: 'Derecho Laboral' },
    { value: 'empresarial', label: 'Derecho Empresarial y Societario' },
    { value: 'asesoria_empresas', label: 'Asesoría a Empresas (Igualas)' },
    { value: 'asesoria_politica', label: 'Asesoría Política y Gestión Pública' },
    { value: 'otro', label: 'Otro / Consulta general' },
];

export const contactInfo = {
    city: 'Ambato, Ecuador',
    coverage: 'Cobertura nacional',
    whatsapp: '', // TODO: número real de WhatsApp
    email: '',    // TODO: correo de consultas
};

// Preguntas frecuentes. Responden lo que la gente (y la IA) busca. Deben quedar
// SINCRONIZADAS con el bloque FAQPage (JSON-LD) de resources/views/app.blade.php.
export const faqs = [
    {
        q: '¿Qué es la LOPDP y a quién obliga?',
        a: 'La LOPDP es la Ley Orgánica de Protección de Datos Personales del Ecuador. Obliga a toda organización que trate datos personales —empresas, cooperativas, instituciones y profesionales— a proteger esa información y respetar los derechos de sus titulares, bajo riesgo de sanciones.',
    },
    {
        q: '¿Qué es un Delegado de Protección de Datos (DPO) y cuándo lo necesito?',
        a: 'El DPO (Delegado de Protección de Datos) es la figura responsable de velar por el cumplimiento de la protección de datos en una organización. Ofrecemos DPO externo para empresas que deben designarlo o que prefieren delegar esa función en especialistas.',
    },
    {
        q: '¿Cómo ayudan a mi empresa a cumplir la LOPDP y el RGPD europeo?',
        a: 'Hacemos un diagnóstico de brechas, diseñamos y construimos el sistema de protección de datos (políticas, avisos de privacidad y registro de tratamientos), capacitamos a tu equipo y acompañamos con un DPO externo, alineados con la LOPDP del Ecuador y el RGPD europeo (GDPR).',
    },
    {
        q: '¿Asesoran a cooperativas de ahorro y crédito (SEPS)?',
        a: 'Sí. Asesoramos al sector financiero popular y solidario en cumplimiento ante la Superintendencia de Economía Popular y Solidaria (SEPS), gobierno cooperativo, prevención de lavado de activos (LAFT) y protección de datos del socio.',
    },
    {
        q: '¿Registran marcas y protegen propiedad intelectual?',
        a: 'Sí. Registramos marcas y signos distintivos ante el SENADI y protegemos la propiedad intelectual (patentes, derechos de autor y secretos empresariales) como parte del área de Derecho Empresarial y Societario.',
    },
    {
        q: '¿Dónde están ubicados y atienden a nivel nacional?',
        a: 'Estamos en Ambato, Ecuador, y brindamos cobertura nacional. Puedes agendar una consulta desde el formulario de contacto del sitio.',
    },
];

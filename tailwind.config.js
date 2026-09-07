import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                // Serif de marca para titulares (registro sobrio de bufete) + sans para cuerpo.
                serif: ['"Cormorant Garamond"', 'Georgia', ...defaultTheme.fontFamily.serif],
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Paleta derivada del logo: azul marino profundo + dorado/tabaco + crema.
                'sv-navy': {
                    900: '#141d33',
                    800: '#1e2b45',
                    700: '#26365a',
                    600: '#33477099',
                },
                'sv-gold': {
                    600: '#a8875a',
                    500: '#b9986a',
                    400: '#c8ad82',
                    300: '#dcc9a8',
                },
                'sv-cream': '#f7f4ee',
            },
        },
    },

    plugins: [forms],
};

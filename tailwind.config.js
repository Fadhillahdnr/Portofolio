import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            typography: {
                DEFAULT: {
                    css: {
                        color: '#e5e7eb',        // text-gray-200
                        a: { color: '#6366f1' }, // indigo-500
                        h1: { color: '#f9fafb' },
                        h2: { color: '#f9fafb' },
                        h3: { color: '#f9fafb' },
                        strong: { color: '#f9fafb' },
                        code: {
                            color: '#a5b4fc',
                            backgroundColor: '#020617',
                            padding: '0.2rem 0.4rem',
                            borderRadius: '0.375rem',
                        },
                        pre: {
                            backgroundColor: '#020617',
                        },
                    },
                },
            },
        },
    },

    plugins: [
        forms,
        typography,
    ],
};

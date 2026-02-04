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
                github: {
                    css: {
                        color: '#111827', // gray-900
                        lineHeight: '1.75',

                        h1: {
                            color: '#111827',
                            fontWeight: '800',
                        },
                        h2: {
                            color: '#111827',
                            fontWeight: '700',
                            borderBottom: '1px solid #e5e7eb',
                            paddingBottom: '0.3em',
                        },
                        h3: {
                            color: '#111827',
                            fontWeight: '600',
                        },

                        a: {
                            color: '#4f46e5',
                            textDecoration: 'none',
                            '&:hover': {
                                textDecoration: 'underline',
                            },
                        },

                        strong: {
                            color: '#111827',
                        },

                        code: {
                            color: '#db2777',
                            backgroundColor: '#f3f4f6',
                            padding: '0.2rem 0.4rem',
                            borderRadius: '0.375rem',
                            fontWeight: '500',
                        },

                        pre: {
                            backgroundColor: '#0f172a',
                            color: '#e5e7eb',
                            padding: '1rem',
                            borderRadius: '0.75rem',
                        },

                        blockquote: {
                            borderLeftColor: '#6366f1',
                            color: '#374151',
                        },

                        table: {
                            width: '100%',
                        },

                        th: {
                            backgroundColor: '#f9fafb',
                            fontWeight: '600',
                        },

                        hr: {
                            borderColor: '#e5e7eb',
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

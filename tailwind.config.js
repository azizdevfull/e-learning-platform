import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: '#4F46E5', // Indigo
                    hover: '#4338CA',
                },
                secondary: {
                    DEFAULT: '#10B981', // Green
                    hover: '#059669',
                },
                pastel: {
                    blue: '#E0E7FF',
                    green: '#D1FAE5',
                    gray: '#F3F4F6',
                },
                sidebar: {
                    DEFAULT: '#F8FAFC',
                    hover: '#F1F5F9',
                }
            },
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
            },
        },
    },

    plugins: [forms],
};

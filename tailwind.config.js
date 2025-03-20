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
                primary: { DEFAULT: '#4F46E5', hover: '#4338CA', light: '#E0E7FF' },
                secondary: { DEFAULT: '#10B981', hover: '#059669', light: '#D1FAE5' },
                pastel: { blue: '#E0E7FF', green: '#D1FAE5', amber: '#FEF3C7', purple: '#EDE9FE', pink: '#FCE7F3', gray: '#F3F4F6' },
                sidebar: {
                    DEFAULT: '#F8FAFC',
                    hover: '#F1F5F9',
                },
                accent: { DEFAULT: '#F59E0B', hover: '#D97706', light: '#FEF3C7' },
            },
            fontFamily: { sans: ['Inter', 'sans-serif'] },
            animation: { 'float': 'float 3s ease-in-out infinite', 'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite' },
            keyframes: { float: { '0%, 100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-10px)' } } }
        },
    },

    plugins: [forms],
};

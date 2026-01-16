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
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                soft: {
                    50: '#faf9f7',
                    100: '#f5f3f0',
                    200: '#ede8e3',
                    300: '#e1d9d1',
                    400: '#c9b8ac',
                    500: '#b39a8b',
                    600: '#9d8577',
                    700: '#7d6b5f',
                    800: '#6b5a50',
                    900: '#5a4c44',
                },
                blush: {
                    50: '#fdf7f5',
                    100: '#fceae5',
                    200: '#f8d0c6',
                    300: '#f4a394',
                    400: '#ed7e5c',
                    500: '#e85e3c',
                    600: '#d4452f',
                },
                sage: {
                    50: '#f7f9f7',
                    100: '#eef3ed',
                    200: '#d9e6d5',
                    300: '#c1d7bf',
                    400: '#96bd85',
                    500: '#7cb073',
                    600: '#689d62',
                },
                sky: {
                    50: '#f6f9fb',
                    100: '#eff6f9',
                    200: '#dde9f3',
                    300: '#c1ddf0',
                    400: '#8fc7eb',
                    500: '#6fb5e5',
                },
            },
            boxShadow: {
                'soft': '0 2px 8px rgba(0, 0, 0, 0.08)',
                'soft-md': '0 4px 12px rgba(0, 0, 0, 0.1)',
                'soft-lg': '0 8px 20px rgba(0, 0, 0, 0.12)',
            },
            borderRadius: {
                'soft': '12px',
                'soft-lg': '16px',
            },
        },
    },

    plugins: [forms],
};

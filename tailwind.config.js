const defaultTheme = require('tailwindcss/defaultTheme');
const pluginLineClamp = require('@tailwindcss/line-clamp');
const pluginForms = require('@tailwindcss/forms');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                success: {
                    'l3': '#c8e9c8',
                    'l2': '#a9ddaa',
                    'l1': '#65C77F',
                    DEFAULT: '#318748',
                    'd1': '#276d3c',
                    'd2': '#226036',
                    'd3': '#1d532f',
                },
                info: {
                    'l3': '#B2CCE5',
                    'l2': '#8FB4DA',
                    'l1': '#6A9BCD',
                    DEFAULT: '#336699',
                    'd1': '#274e7f',
                    'd2': '#214273',
                    'd3': '#1b3566',
                },
                'error': {
                    'l3': '#F7C1C1',
                    'l2': '#F3A2A2',
                    'l1': '#FC3B37',
                    DEFAULT: '#BF0603',
                    'd1': '#8C0401',
                    'd2': '#730300',
                    'd3': '#590200',
                },
                'warning': {
                    'l3': '#FFF1D1',
                    'l2': '#FFE3A3',
                    'l1': '#FFD575',
                    DEFAULT: '#FFA900',
                    'd1': '#CC8B00',
                    'd2': '#B37C00',
                    'd3': '#996D00',
                },
            },
            fontFamily: {
                title: ['Marmelad', ...defaultTheme.fontFamily.sans],
                sans: ['Raleway', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [pluginLineClamp, pluginForms],
    darkMode: 'class',
};

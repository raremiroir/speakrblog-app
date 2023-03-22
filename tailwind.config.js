const defaultTheme = require('tailwindcss/defaultTheme');
const pluginLineClamp = require('@tailwindcss/line-clamp');
const pluginForms = require('@tailwindcss/forms');
const pluginTypography = require('@tailwindcss/typography');
const pluginAspectRatio = require('@tailwindcss/aspect-ratio');
const wireUi = require('./vendor/wireui/wireui/tailwind.config.js')

/** @type {import('tailwindcss').Config} */
module.exports = {
    presets: [ wireUi ],

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php'
    ],
    
    theme: {
        extend: {
            colors: {
                primary: {
                    50: '#f3faf7',
                    100: '#c8e9c8',
                    200: '#a9ddaa',
                    300: '#a9ddaa',
                    400: '#65C77F',
                    500: '#65C77F',
                    600: '#318748',
                    700: '#276d3c',
                    800: '#226036',
                    900: '#1d532f',
                },
                secondary: {
                    50: '#F9FAFB', 
                    100: '#F3F4F6', 
                    200: '#E5E7EB', 
                    300: '#D1D5DB', 
                    400: '#9CA3AF', 
                    500: '#6B7280', 
                    600: '#4B5563', 
                    700: '#374151', 
                    800: '#1F2937', 
                    900: '#111827'
                },
                success: {
                    'l3': '#c8e9c8',
                    'l2': '#a9ddaa',
                    'l1': '#65C77F',
                    DEFAULT: '#318748',
                    'd1': '#276d3c',
                    'd2': '#226036',
                    'd3': '#1d532f',
                },
                positive: {
                    50: '#f3faf7',
                    100: '#c8e9c8',
                    200: '#a9ddaa',
                    300: '#a9ddaa',
                    400: '#65C77F',
                    500: '#65C77F',
                    600: '#318748',
                    700: '#276d3c',
                    800: '#226036',
                    900: '#1d532f',
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
                info: {
                    50: '#F0F8FF',
                    100: '#B2CCE5',
                    200: '#8FB4DA',
                    300: '#6A9BCD',
                    400: '#6A9BCD',
                    500: '#336699',
                    600: '#336699',
                    700: '#274e7f',
                    800: '#214273',
                    900: '#1b3566',
                },
                error: {
                    'l3': '#F7C1C1',
                    'l2': '#F3A2A2',
                    'l1': '#FC3B37',
                    DEFAULT: '#BF0603',
                    'd1': '#8C0401',
                    'd2': '#730300',
                    'd3': '#590200',
                },
                negative: {
                    50 : '#F7C1C1',
                    100: '#F7C1C1',
                    200: '#F3A2A2',
                    300: '#F3A2A2',
                    400: '#FC3B37',
                    500: '#FC3B37',
                    600: '#BF0603',
                    700: '#8C0401',
                    800: '#730300',
                    900: '#590200',
                },
                warning: {
                    'l3': '#FFF1D1',
                    'l2': '#FFE3A3',
                    'l1': '#FFD575',
                    DEFAULT: '#FFA900',
                    'd1': '#CC8B00',
                    'd2': '#B37C00',
                    'd3': '#996D00',
                },
                warning: {
                    50: '#FFF1D1',
                    100: '#FFE3A3',
                    200: '#FFE3A3',
                    300: '#FFD575',
                    400: '#FFD575',
                    500: '#FFA900',
                    600: '#FFA900',
                    700: '#CC8B00',
                    800: '#B37C00',
                    900: '#996D00',
                },
            },
            fontFamily: {
                title: ['Marmelad', ...defaultTheme.fontFamily.sans],
                sans: ['Raleway', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [pluginLineClamp, pluginForms, pluginTypography, pluginAspectRatio],
    darkMode: 'class',
};

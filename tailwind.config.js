const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },
            colors : {
                'primary' : '#0D2772',
                'secondary' : '#ECAD43',
                'dark' : '#334155',
                'gray' : '#64748b'
            }
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require("daisyui")
        ],
};

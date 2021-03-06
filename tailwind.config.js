const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {

    purge: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                '7xl': '.60rem',
            },

        },

    },

    variants: {
        textIndent: ['responsive'],
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('tailwindcss-text-indent')(),
        require('@tailwindcss/custom-forms'),

    ]
};


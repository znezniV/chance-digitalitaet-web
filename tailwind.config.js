/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')
const plugin = require('tailwindcss/plugin')

module.exports = {
    content: [
        './templates/**/*.{twig,html}',
        './src/**/*.{vue,js,ts,jsx,tsx,svg}',
        './config/colour-swatches.php',
    ],
    theme: {
        fontFamily: {
            sans: [...defaultTheme.fontFamily.sans],
        },
        extend: {
            spacing: {
                em: '1em',
            },
            colors: {
            },
            fontSize: {
            },
        },
    },
    plugins: [
        plugin(function ({ addVariant }) {
            addVariant('supports-hover', '@media (hover: hover)')
        }),
    ],
}

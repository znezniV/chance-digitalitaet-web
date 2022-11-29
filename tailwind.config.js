/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './templates/**/*.{twig,html,svg}',
        './src/**/*.{vue,js,ts,jsx,tsx,svg}',
        './config/colour-swatches.php',
    ],
    theme: {
        fontFamily: {
            sans: [...defaultTheme.fontFamily.sans],
        },
        fontSize: {
            base: [
                'clamp(1rem, 0.909rem + 0.45vw, 1.25rem)',
                {
                    letterSpacing: '0em',
                    lineHeight: '1.2',
                },
            ],
        },
        extend: {
            screens: {
                xs: '390px',
            },
            spacing: {
                em: '1em',
                7.5: '1.875rem',
                15: '3.75rem',
            },
            colors: {},
        },
    },
    future: {
        hoverOnlyWhenSupported: true,
    },
}

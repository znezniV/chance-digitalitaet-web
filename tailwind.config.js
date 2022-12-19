/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');
const plugin = require('tailwindcss/plugin');

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
    corePlugins: {
        container: false,
        aspectRatio: false,
    },
    plugins: [
        plugin(function ({ addVariant }) {
            addVariant('any-hover', '@media(any-hover:hover)');
        }),
        // aspect-ratio polyfill for safari 14 - https://www.viget.com/articles/adding-safari-14-support-to-tailwinds-aspect-ratio/
        ({ matchUtilities, theme }) => {
            matchUtilities(
                {
                    aspect: (value) => ({
                        '@supports (aspect-ratio: 1 / 1)': {
                            aspectRatio: value,
                        },
                        '@supports not (aspect-ratio: 1 / 1)': {
                            '&::before': {
                                content: '""',
                                float: 'left',
                                paddingTop: `calc(100% / (${value}))`,
                            },
                            '&::after': {
                                clear: 'left',
                                content: '""',
                                display: 'block',
                            },
                        },
                    }),
                },
                { values: theme('aspectRatio') },
            );
        },
    ],
    future: {
        hoverOnlyWhenSupported: true,
    },
};

import { defineConfig } from 'vite';

export default defineConfig(({ command }) => ({
    base: command === 'serve' ? '' : '/dist/',
    build: {
        manifest: true,
        sourcemap: true,
        outDir: './web/dist/',
        rollupOptions: {
            input: {
                app: './src/js/app.js',
                css: './src/css/app.scss',
            },
        },
    },
}));

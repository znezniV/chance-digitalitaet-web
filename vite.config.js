import { defineConfig } from 'vite';
// import restart from 'vite-plugin-restart';

export default defineConfig(({command}) => ({
    base: command === 'serve' ? '' : '/dist/',
    build: {
        manifest: true,
        sourcemap: true,
        outDir: './web/dist/',
        rollupOptions: {
            input: {
                app: './src/js/app.js',
            },
        },
    },
    plugins: [
        // restart({
        //     reload: [
        //         './templates/**/*',
        //         './modules/**/*',
        //         './web/assets/**/*',
        //     ],
        // }),
    ],
}));

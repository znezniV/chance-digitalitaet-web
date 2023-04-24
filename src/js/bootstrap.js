import 'lazysizes';
lazySizes.cfg.expFactor = 3;

// Accept HMR as per: https://vitejs.dev/guide/api-hmr.html
if (import.meta.hot) {
    import.meta.hot.accept();
}

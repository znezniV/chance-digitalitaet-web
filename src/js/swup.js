import Swup from 'swup';
import SwupProgressPlugin from '@swup/progress-plugin';
import SwupPreloadPlugin from '@swup/preload-plugin';
import SwupScrollPlugin from '@swup/scroll-plugin';
// import SwupScriptsPlugin from '@swup/scripts-plugin';
// import SwupA11yPlugin from '@swup/a11y-plugin';

new Swup({
    containers: ['#swup'],
    // resolveUrl: (url) => {
    //     if (url.startsWith('/projekte/')) {
    //         return '/projekte';
    //     }
    //     return url;
    // },
    plugins: [
        // new SwupA11yPlugin(),
        // new SwupScriptsPlugin({
        //     head: false,
        //     body: true,
        // }),
        new SwupProgressPlugin({
            delay: 500,
        }),
        new SwupPreloadPlugin(),
        new SwupScrollPlugin(),
    ],
});

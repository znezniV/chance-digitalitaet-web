import Swup from 'swup';
// import SwupScriptsPlugin from '@swup/scripts-plugin';
import SwupProgressPlugin from '@swup/progress-plugin';
import SwupPreloadPlugin from '@swup/preload-plugin';
import SwupScrollPlugin from '@swup/scroll-plugin';
import SwupA11yPlugin from '@swup/a11y-plugin';

new Swup({
    resolveUrl: (url) => {
        if (url.startsWith('/projekte/')) {
            return '/projekte';
        }
        return url;
    },
    containers: ['#swup'],
    plugins: [
        // new SwupScriptsPlugin({
        //     head: false,
        //     body: true,
        // }),
        new SwupProgressPlugin({
            delay: 500,
        }),
        new SwupPreloadPlugin(),
        new SwupScrollPlugin(),
        new SwupA11yPlugin(),
    ],
});

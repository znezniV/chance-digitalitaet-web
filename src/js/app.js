import './bootstrap.js';
import './swup.js'
// import './htmx.js'

import Alpine from 'alpinejs';
// import focus from '@alpinejs/focus';
// import collapse from '@alpinejs/collapse';
// import intersect from '@alpinejs/intersect'

import lottie from './components/lottie';
import footer from './components/footer';
import newsletter from './components/newsletter';
//
window.Alpine = Alpine;
// Alpine.plugin(collapse);
// Alpine.plugin(focus);
// Alpine.plugin(intersect);
//
document.addEventListener('alpine:init', () => {
    Alpine.data('lottie', lottie);
    Alpine.data('footer', footer);
    Alpine.data('newsletter', newsletter);
});
//
Alpine.start();

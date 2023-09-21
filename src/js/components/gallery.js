import PhotoSwipeLightbox from 'photoswipe/lightbox';
import 'photoswipe/style.css';
import PhotoSwipe from 'photoswipe';

export default () => ({
    init() {
        const lightbox = new PhotoSwipeLightbox({
            gallery:  this.$refs.container,
            children: '.gallery__image',
            pswpModule: PhotoSwipe,
            secondaryZoomLevel: 1,
            maxZoomLevel: 1,
            zoom: false,
            padding: { top: 60, bottom: 60, left: 60, right: 60 }
        });
        lightbox.init();
    }
});

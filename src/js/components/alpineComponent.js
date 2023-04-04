export default () => ({
    swiper: null,
    open: false,
    isMobile: false,

    init() {
        this.onResize();
        this.$watch('isMobile', () => {
            if (!this.isMobile && this.open) {
                this.open = false;
            }
        });
    },

    destroy() {
        if (this.swiper) {
            this.swiper.destroy();
        }
    },

    toggleMenu() {
        this.open = !this.open;
    },

    onResize() {
        this.isMobile = window.innerWidth < 640;
    },
});

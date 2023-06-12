import lottie from "lottie-web";

export default () => ({
    path: "",

    start() {
        lottie.loadAnimation({
            container: this.$refs.container, // the dom element that will contain the animation
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: `${this.path}` // the path to the animation json
        });
    },

    reasign(param) {
        this.path = param
        this.start()
    },

    destroy() {
        lottie.destroy()
    },
});

import jsonp from 'jsonp';

export default () => ({
    open: false,
    isMobile: false,
    firstName: "",
    lastName: "",
    email: "",
    location: "",
    formSuccess: false,
    formMessage: "hallo",
    loading: false,
    formData: {
        EMAIL: "",
        FNAME: "",
        LNAME: "",
        ADDRESS: "",
    },

    currentLang: window.lang || 'en',

    init() {
        this.onResize();
        this.$watch('isMobile', () => {
            if (!this.isMobile && this.open) {
                this.open = false;
            }
        });
    },

    destroy() {
    },

    toggleMenu() {
        this.open = !this.open;
    },

    onResize() {
        this.isMobile = window.innerWidth < 640;
    },

    sendData() {

        jsonp(`https://stationx.us21.list-manage.com/subscribe/post-json?u=9e7b2db48833953552bbbda01&id=6adafddeca&f_id=002fdbe1f0&EMAIL=${this.email}&FNAME=${this.firstName}&LNAME=${this.lastName}&ADRESS[city]=${this.location}`, { param: "c", name: "jsonpFunc" }, (err, data) => {
            if(data.result === 'success') {
                this.formSuccess = true,
                this.formMessage = data.msg
            } else {
                this.formSuccess = false,
                this.formMessage = data.msg
            }
        })
    }
})

import jsonp from 'jsonp';

export default () => ({
    open: false,
    isMobile: false,
    firstName: "",
    lastName: "",
    email: "",
    location: "",
    formSuccess: false,
    formError: false,
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
        jsonp(`https://staatslabor.us14.list-manage.com/subscribe/post-json?u=7b20cde35ddc978526642606a&id=b34ee655ad&f_id=008098e0f0&EMAIL=${this.email}&FNAME=${this.firstName}&LNAME=${this.lastName}&tags=11262300`, { param: "c", name: "jsonpFunc" }, (err, data) => {
            if(data.result === 'success') {
                this.formSuccess = true,
                this.formError = false
                this.formMessage = data.msg
            } else if (data.result === 'error') {
                this.formSuccess = false
                this.formError = true
                this.formMessage = data.msg
                console.log(data)
            } else {
                this.formSuccess = false,
                this.formError = true
                this.formMessage = data.msg
                console.log(data)
            }
        })
    }
})

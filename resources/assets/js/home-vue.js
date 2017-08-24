window.Vue = require('vue');
window.VueResource = require('vue-resource');
window.VueScrollTo = require('vue-scrollto');

Vue.use(VueResource);
Vue.use(VueScrollTo);

const headerMenu = new Vue({
    el: ".main-header",
    data: {
        headerActive: false,
        langDropdown: false
    },
    methods: {
        mobileMenu: function(){
            this.headerActive = !this.headerActive;
            var bodyEl = document.querySelector('body');
            bodyEl.classList.toggle('opened');
        },
        closeDropDown: function(){
            this.langDropdown = false;
        }
    },
    mounted: function(){
        var self = this;
        window.addEventListener('click', function(e){
            if(!e.target.parentNode.classList.contains('lang-dropdown'))
                self.closeDropDown();
        })
    }
});

const scrollDown = new Vue({
    el: '.s_hero'
});

const writeToUsForm = new Vue({
    el: "#write-to-us-form",
    data: {
        formData: {
            "_token": Laravel.csrfToken,
            "name": '',
            "email": '',
            "company": '',
            "phone": '',
            "budget": '',
            "project_type": '',
            "project_details": '',
            "g-recaptcha-response": ''
        },
        errors: []
    },
    methods: {
        sendForm: function(){
            this.formData["g-recaptcha-response"] = document.getElementById("captcha-start-project").getElementsByClassName("g-recaptcha-response")[0].value;
            this.$http.post('/email-requests/start-project', this.formData).then(function(data){
                var receivedData = JSON.parse(data.bodyText);
                if(typeof receivedData.error !== 'undefined'){
                    this.errors = receivedData.error;
                }else{
                    location.reload();
                }
                console.log(data)
            }, function(err){
                console.log(err);
            });
        }
    }

});
const contactUsForm = new Vue({
    el: "#contact-form",
    data: {
        formData: {
            "_token": Laravel.csrfToken,
            "name": '',
            "email": '',
            "phone": '',
            "project_details": '',
            "g-recaptcha-response": ''
        },
        errors: [],
        success: ''
    },
    methods: {
        sendForm: function(){
            this.formData["g-recaptcha-response"] = document.getElementById("captcha-contact-us").getElementsByClassName("g-recaptcha-response")[0].value;
            this.$http.post('/email-requests/contact-us', this.formData).then(function(data){
                let receivedData = data.body;
                if(typeof receivedData.error !== 'undefined'){
                    this.errors = receivedData.error;
                }else{
                    this.errors = [];
                    this.formData = {
                        "name": '',
                        "email": '',
                        "phone": '',
                        "project_details": '',
                        "g-recaptcha-response": ''
                    };
                    this.success = receivedData.success;
                }
            }, function(err){
                console.log(err);
            });
        }
    }

});
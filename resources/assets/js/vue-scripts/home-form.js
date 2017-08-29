const contactUsForm = new Vue({
    el: "#write-to-us-form",
    data: {
        formData: {
            "_token": Laravel.csrfToken,
            "name": '',
            "email": '',
            "phone": '',
            "project_details": '',
            "g-recaptcha-response": ''
        },
        errors: []
    },
    methods: {
        sendForm: function(){
            this.formData["g-recaptcha-response"] = document.getElementById("captcha-contact-us").getElementsByClassName("g-recaptcha-response")[0].value;
            this.$http.post('/email-requests/contact-us', this.formData).then(function(data){
                let receivedData = JSON.parse(data.bodyText);
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
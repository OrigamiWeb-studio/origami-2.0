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
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
        errors: [],
        success: ''
    },
    methods: {
        sendForm: function(){
            this.formData["g-recaptcha-response"] = document.getElementById("captcha-start-project").getElementsByClassName("g-recaptcha-response")[0].value;
            axios.post('/email-requests/start-project', this.formData).then(response => {
                let receivedData = response.data;
                if(typeof receivedData.error !== 'undefined'){
                    this.errors = receivedData.error;
                    this.success = '';
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
            }).catch(err => {
                console.error(err);
            });
        }
    }

});
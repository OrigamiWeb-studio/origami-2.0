new Vue({
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
          $('body').append('<div class="loader"><div class="loader__inner"></div></div>');
            this.formData["g-recaptcha-response"] = document.getElementById("captcha-contact-us").getElementsByClassName("g-recaptcha-response")[0].value;
            axios.post('/email-requests/contact-us', this.formData).then(response => {
                let receivedData = response.data;
                if(typeof receivedData.error !== 'undefined'){
                    this.errors = receivedData.error;
                    this.success = '';
                }else{
                    this.errors = [];
                    this.formData = {
                        "_token": receivedData.token,
                        "name": '',
                        "email": '',
                        "phone": '',
                        "project_details": '',
                        "g-recaptcha-response": ''
                    };
                    this.success = receivedData.success;
                  $(".g-recaptcha-response").each(function(index){
                    if($(this).closest("#captcha-contact-us").length){
                      grecaptcha.reset(index);
                    }
                  });
                }
                $(".loader").remove();
            }).catch(err => {
                console.error(err);
                $(".loader").remove();
            });
        }
    }

});
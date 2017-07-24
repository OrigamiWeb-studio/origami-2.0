
var writeToUsForm = new Vue({
    el: "#write-to-us-form",
    data: {
        "_token": Laravel.csrfToken,
        "name": '',
        "email": '',
        "description": '',
        "g-recaptcha-response": ''
    },
    methods: {
        sendForm: function(){

            // console.log(grecaptcha.getResponse());
            // console.log(document.getElementById("captcha-start-project").getElementsByClassName("g-recaptcha-response")[0].value);
            this.$data["g-recaptcha-response"] = document.getElementById("captcha-start-project").getElementsByClassName("g-recaptcha-response")[0].value;
            console.log(this.$data);
            this.$http.post('/email-requests/start-project', this.$data).then(function(data){
                console.log(data)
            }, function(err){
                console.log(err);
            });
        }
    }

});
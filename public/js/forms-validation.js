

var writeToUsForm = new Vue({
    el: "#write-to-us-form",
    data: {
        form: {}
    },
    methods: {
        sendForm: function(){

            console.log(this.$refs.custom);
            // this.$http.get('/email-requests/start-project', this.$refs.custom).then(function(data){
            //     console.log(data)
            // }, function(err){
            //     console.log(err);
            // });
            // this.$refs.custom.submit();
            // console.log(this.form);
        }
    }
});


// form: {
//     name: '',
//         company: '',
//         email: '',
//         number: '',
//         budget: '',
//         project_type: ''
// }
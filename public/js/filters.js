var allProjects = new Vue({
    el: '.s_allprojects',
    data: {
        filterData: {
            "categories": [],
            "years" : [],
            "components" : []
        }
    },
    methods: {
        sendData: function(){
            this.$http.post('/projects', this.filterData).then(function(data){
                console.log(data)
            },function(err){
                console.log(err);
            })
        }
    }
});
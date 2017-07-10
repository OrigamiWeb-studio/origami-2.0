var allProjects = new Vue({
    el: '.s_allprojects',
    data: {
        filtered: false,
        searchField: false,
        filterData: {
            "categories": [],
            "years" : [],
            "components" : []
        },
        search: '',
        projects: []
    },
    watch: {
        filterData: {
            handler: function () {
                this.sendData()
            },
            deep: true
        }
    },
    methods: {
        sendData: function(){
            this.filtered = true;
            this.$http.post('/projects', this.filterData).then(function(data){
               this.projects = (data.data.projects.data);
                // console.log(document.location.origin)
            },function(err){
                console.log(err);
            })
        }
    },
    computed: {
      filteredProjects: function(){
          return this.projects.filter((project) => {
              return project.title.match(this.search);
          })
      }
    },
    mounted: function(){
        // this.$http.get('https://jsonplaceholder.typicode.com/posts').then(function(data){
        //     console.log(data);
        // })
        var self = this;
        window.addEventListener('click', function(e){
            if(!e.target.parentNode.classList.contains('search-wrapper'))
                self.searchField = false;
        })
    }
});
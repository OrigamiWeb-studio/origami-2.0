var allProjects = new Vue({
    el: '.s_allprojects',
    data: {
        searchField: false,
        filterData: {
            "categories": [],
            "years" : [],
            "components" : [],
            "paginate": 1
        },
        search: '',
        projects: [],
        pagination: []
    },
    watch: {
        filterData: {
            handler: function () {
                this.sendData()
            },
            deep: true
        },
        search: function(){
            this.sendData();
        }
    },
    methods: {
        sendData: function(){
            this.$http.post('/projects', this.filterData).then(function(data){
                this.projects = data.data.projects;
                this.pagination = data.data.pagination;
                console.log(this.pagination);
            },function(err){
                console.log(err);
            })
        },
        paginate: function(page){
            this.$http.post('/projects?page='+page, this.filterData).then(function(data){
                this.projects = data.data.projects;
                this.pagination = data.data.pagination;
            }, function(err){
                console.log(err);
            })
        }
    },
    computed: {
      filteredProjects: function(){
          return this.projects.filter((project) => {
              return project.title.toLowerCase().match(this.search.toLowerCase());
          })
      }
    },
    mounted: function(){
        var self = this;
        window.addEventListener('click', function(e){
            if(!e.target.parentNode.classList.contains('search-wrapper'))
                self.searchField = false;
        })
    },
    beforeMount(){
        this.sendData();
    }
});
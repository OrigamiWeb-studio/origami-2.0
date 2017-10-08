// vueSlider = require('vue-slider-component');
import manageProject from './components/manage-project.vue';
Vue.component('manage-project', manageProject);
new Vue({
    el: '.s_allprojects',
    components: {
        // vueSlider
    },
    data: {
        searchField: false,
        searchText: '',
        timeout: null,
        filterData: {
            "categories": [],
            "years" : [],
            "components" : [],
            "search": '',
            "paginate": 9
        },
        projects: [],
        pagination: [],
        loading: true,
        notFound: false
    },
    watch: {
        filterData: {
            handler: function () {
                this.sendData()
            },
            deep: true
        },
        searchText(){
            let self = this;
            clearTimeout(this.timeout);
            this.timeout = setTimeout(function(){
                self.filterData.search = self.searchText;
            }, 500)
        }
    },
    methods: {
        sendData: function(){
          this.loading = true;
            axios.post('/projects', this.filterData).then(response => {
                let self = this;
                self.projects = response.data.projects;
                self.pagination = response.data.pagination;
                self.loading = false;
                if(this.projects.length === 0){
                    self.notFound = true;
                }else{
                    self.notFound = false;
                }
            }).catch(err => {
                console.error(err);
              this.loading = false;
            })
        },
        paginate: function(page){
            this.loading = true;
            axios.post('/projects?page='+page, this.filterData).then(response => {
                this.projects = response.data.projects;
                this.pagination = response.data.pagination;
              this.loading = false;
            }).catch(err => {
                console.error(err);
              this.loading = false;
            })
        }
    },
    mounted: function(){
        let self = this;
        window.addEventListener('click', function(e){
            if(!e.target.parentNode.classList.contains('search-wrapper'))
                self.searchField = false;
        })
    },
    beforeMount(){
        this.sendData();
    }
});
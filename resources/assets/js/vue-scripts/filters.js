// vueSlider = require('vue-slider-component');
// import confirmModal from './components/confirm-modal.vue';
// Vue.component('delete-modal', confirmModal);
import manageProject from './components/manage-project.vue';
Vue.component('manage-project', manageProject);
new Vue({
    el: '.s_allprojects',
    components: {
        // vueSlider
    },
    data: {
        searchField: false,
        filterData: {
            "categories": [],
            "years" : [],
            "components" : [],
            "search": '',
            "paginate": 9
        },
        projects: [],
        pagination: [],
      deleteModal: false
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
            axios.post('/projects', this.filterData).then(response => {
                this.projects = response.data.projects;
                this.pagination = response.data.pagination;
            }).catch(err => {
                console.error(err);
            })
        },
        paginate: function(page){
            axios.post('/projects?page='+page, this.filterData).then(response => {
                this.projects = response.data.projects;
                this.pagination = response.data.pagination;
            }).catch(err => {
                console.error(err);
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
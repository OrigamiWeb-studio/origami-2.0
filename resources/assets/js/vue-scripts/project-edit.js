// import projectImages from './components/add-project-images.vue';
// Vue.component('project-images', projectImages);
import origamiTextArea from './components/textarea.vue';
import projectScreenshotDelete from './components/project-screenshot-delete.vue';

Vue.component('origami-textarea', origamiTextArea);
Vue.component('project-screenshot-delete', projectScreenshotDelete);

new Vue({
  el: "#project-edit",
  data: {
    loading: false,

    screenshots: [],

    filesUploaded: 0,

    logoUploaded: false,
    logoUrl: '',

    mainImageUploaded: false,
    mainImageUrl: ''
  },
  methods: {
    deleteScreenshot(index){
      this.screenshots.splice(index, 1);
    },
    countFiles(event){
      let theInput = event.target;
      this.filesUploaded = theInput.files.length;
    },
    selectAll(id){
      $(`#${id} option`).prop('selected', true);
      jcf.refreshAll();
    },
    deselectAll(id){
      $(`#${id} option`).prop('selected', false);
      jcf.refreshAll();
    },
    previewLogo(event){
      let theInput = event.target,
        self = this;

      if (theInput.files && theInput.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
          self.logoUrl = e.target.result;
        };

        reader.readAsDataURL(theInput.files[0]);
        self.logoUploaded = true;
      }else{
        self.logoUploaded= false;
        self.logoUrl = '#'
      }
    },
    previewMainImage(event){
      let theInput = event.target,
        self = this;

      if (theInput.files && theInput.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
          self.mainImageUrl = e.target.result;
        };

        reader.readAsDataURL(theInput.files[0]);
        self.mainImageUploaded = true;
      }else{
        self.mainImageUploaded= false;
        self.mainImageUrl = '#'
      }
    }
  },
  beforeMount(){
    axios.get(`/projects/${window.projectId}/screenshots`).then(response => {
      this.screenshots = response.data;
    }).catch(err => {
      console.log(err)
    })
  }
});
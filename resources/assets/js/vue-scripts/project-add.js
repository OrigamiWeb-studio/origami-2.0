// import projectImages from './components/add-project-images.vue';
// Vue.component('project-images', projectImages);
import origamiTextArea from './components/textarea.vue';
Vue.component('origami-textarea', origamiTextArea);
new Vue({
  el: "#project-add",
  data: {
    projectName: '',

    filesUploaded: 0,

    logoUploaded: false,
    logoUrl: '',

    mainImageUploaded: false,
    mainImageUrl: ''
  },
  methods: {
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
  }
});
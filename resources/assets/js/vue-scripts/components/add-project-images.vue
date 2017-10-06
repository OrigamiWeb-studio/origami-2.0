<template lang="html">
    <div class="project-screens__item">
        <label class="project-screens__input-wrapper" v-if="!imageUploaded">
            <input type="file" accept="image/jpeg,image/png,image/gif" @change="previewImage($event)">
        </label>
        <div v-cloak class="project-screens__image-wrapper" v-else>
            <a class="project-screens__magnific-link" :href="imageSrc">
                <img :src="imageSrc">
            </a>
        </div>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        imageSrc: '',
        imageUploaded: false
      }
    },
    methods: {
      previewImage(event){
        let theInput = event.target,
            self = this;
        if (theInput.files && theInput.files[0]) {
          let reader = new FileReader();

          reader.onload = function (e) {
            self.imageSrc = e.target.result;
          };

          reader.readAsDataURL(theInput.files[0]);
          self.imageUploaded = true;
        }else{
          self.imageUploaded = false;
          self.imageSrc = '#'
        }
      }
    },
    props: ['formAction', 'visible']
  }
</script>
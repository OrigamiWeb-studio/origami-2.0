<template lang="html">
    <div>
        <textarea :name="name" :id="id" :rows="rows" :keyup="countdown()" :maxlength="maxlength" v-model="message" class="origami-form__input origami-form__input_textarea">
        </textarea>
        <span class="origami-form__symbols-left">{{ remainingCount }} <slot name="symbolsLeft"></slot></span>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        remainingCount: this.maxlength,
        message: this.oldvalue
      }
    },
    methods: {
      countdown() {
        this.remainingCount = this.maxlength - this.message.length;
      }
    },
    props: ['name', 'id', 'rows', 'maxlength', 'oldvalue']
  }
</script>
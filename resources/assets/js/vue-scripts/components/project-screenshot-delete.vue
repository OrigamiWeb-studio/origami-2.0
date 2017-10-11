<template lang="html">
    <div>
        <ul class="management-icons">
            <li class="management-icons__item">
                <button class="management-icons__icon" @click.prevent="visible = true">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </button>
            </li>
        </ul>
        <transition appear name="origami-modal2" v-if="visible" v-on:after-leave="afterLeave">
            <div class="origami-modal2">
                <div class="origami-modal2__overlay" @click="visible = false"></div>
                <div class="origami-modal2__dialog">
                    <div class="origami-modal2__content">
                        <header class="origami-modal2__header">
                            <h4 class="origami-modal2__title">
                                <slot name="title"></slot>
                            </h4>
                            <button type="button" class="origami-modal2__close" @click="visible = false">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </header>
                        <div class="origami-modal2__body">
                            <div class="origami-modal2__buttons">
                                <button class="btn origami-modal2__button" @click.prevent="deleteScreen()"><slot name="confirm"></slot></button>
                                <button class="btn origami-modal2__button" @click.prevent="visible = false"><slot name="cancel"></slot></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        visible: false,
        deleted: false
      }
    },
    methods: {
      deleteScreen(){
        this.$emit('loadon');
        axios.get(this.deleteLink).then(response => {
          this.visible = false;
          this.deleted = true;
          this.$emit('loadoff');
        }).catch(err => {
          console.log(err);
          this.$emit('loadoff');
        });
      },
      afterLeave(){
        if(this.deleted){
          this.$emit('deletescreen');
        }
      },
      getScrollbarWidth() {
        let outer = document.createElement("div");
        outer.style.visibility = "hidden";
        outer.style.width = "100px";
        outer.style.msOverflowStyle = "scrollbar";

        document.body.appendChild(outer);

        let widthNoScroll = outer.offsetWidth;
        outer.style.overflow = "scroll";
        let inner = document.createElement("div");
        inner.style.width = "100%";
        outer.appendChild(inner);

        let widthWithScroll = inner.offsetWidth;

        outer.parentNode.removeChild(outer);

        return widthNoScroll - widthWithScroll;
      }
    },
    props: ['deleteLink', 'screenshotId'],
    watch: {
      visible: function(){
        if(this.visible){
          $('body').css({'overflow': 'hidden', 'padding-right': this.getScrollbarWidth()+'px'});
        }else{
          setTimeout(()=>{
            $('body').css({'overflow': '', 'padding-right': ''});
          },200)
        }
      }
    }
  }
</script>
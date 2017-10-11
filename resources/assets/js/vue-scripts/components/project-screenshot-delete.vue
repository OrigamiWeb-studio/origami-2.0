<template lang="html">
    <div>
        <ul class="management-icons">
            <li class="management-icons__item">
                <button class="management-icons__icon" @click.prevent="visible = true">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </button>
            </li>
        </ul>
        <transition appear name="origami-modal2" v-if="visible">
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
                            <p class="origami-modal2__paragraph"><slot></slot></p>
                            <div class="origami-modal2__buttons">
                                <!--<a :href="deleteLink" class="btn origami-modal2__button"><slot name="confirm"></slot></a>-->
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
        visible: false
      }
    },
    methods: {
      deleteScreen(){
        axios.get(this.deleteLink).then(response => {
          console.log(response);
        });
        this.$emit('delete-screen');
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
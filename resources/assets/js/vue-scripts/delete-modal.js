import confirmModal from './components/confirm-modal.vue';
Vue.component('delete-modal', confirmModal);
new Vue({
  el: '#manage-block',
  data:{
    deleteModalShow: false
  }
});
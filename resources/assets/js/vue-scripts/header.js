new Vue({
    el: ".main-header",
    data: {
        headerActive: false,
        langDropdown: false
    },
    methods: {
        mobileMenu: function(){
            this.headerActive = !this.headerActive;
            let bodyEl = document.querySelector('body');
            bodyEl.classList.toggle('opened');
        },
        closeDropDown: function(){
            this.langDropdown = false;
        }
    },
    mounted: function(){
        let self = this;
        window.addEventListener('click', function(e){
            if(!e.target.parentNode.classList.contains('lang-dropdown'))
                self.closeDropDown();
        })
    }
});
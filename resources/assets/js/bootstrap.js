window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');

window.axios = require('axios');

window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};

require('../../../public/libs/bootstrap/js/bootstrap.min');
require('./bootstrap');

window.Vue = require('vue');

Vue.component(
    'Jobs',
    require('./components/Jobs.vue').default
);
Vue.component(
    'Navbar',
    require('./components/Navbar.vue').default
);
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);

const app = new Vue({
    el: '#app',
});

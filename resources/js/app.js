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
Vue.component(
    'userdetails',
    require('./components/UserDetails.vue').default
);
Vue.component(
    'login',
    require('./components/Login').default
);
Vue.component(
    'register',
    require('./components/Register').default
)

const app = new Vue({
    el: '#app',
    token: localStorage.getItem('access_token') || null
});

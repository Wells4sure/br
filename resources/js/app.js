require('./bootstrap');

window.Vue = require('vue');

Vue.component('login-form', require('./components/LoginForm.vue').default);
Vue.component('deals-comp', require('./components/DealsComp.vue').default);
Vue.component('campaigns-comp', require('./components/CampaignsComp.vue').default);
Vue.component('points-comp', require('./components/PointsComp.vue').default);
Vue.component('earned-rewards', require('./components/EarnedRewards.vue').default);
Vue.component('redemption-comp', require('./components/RedemptionComp.vue').default);
Vue.component('earning-comp', require('./components/EarningComp.vue').default);
Vue.component('profile-comp', require('./components/ProfileComp.vue').default);
Vue.component('register-comp', require('./components/RegisterComp.vue').default);

const app = new Vue({
    el: '#app',
});
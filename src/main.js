import Vue from 'vue'
import App from './App.vue'
import vueResource from 'vue-resource'

Vue.use(vueResource);
Vue.http.headers.common['Accept'] = 'application/json';
Vue.http.options.root = 'http://3.80.185.75/public/api/cal/';

new Vue({
  el: '#app',
  render: h => h(App)
})


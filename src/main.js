import Vue from 'vue'
import App from './App.vue'
import vueResource from 'vue-resource'

Vue.use(vueResource);
Vue.http.headers.common['Accept'] = 'application/json';

new Vue({
  el: '#app',
  render: h => h(App)
})

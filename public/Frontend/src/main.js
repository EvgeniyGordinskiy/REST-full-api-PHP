/* ============
 * Vue
 * ============
 *
 * Vue.js is a library for building interactive web interfaces.
 * It provides data-reactive components with a simple and flexible API.
 *
 * http://rc.vuejs.org/guide/
 */
import Vue from 'vue';

// eslint-disable-next-line
import App from './App.vue';
console.log('store');

require('./bootstrap');

// eslint-disable-next-line
new Vue(App).$mount('#app');

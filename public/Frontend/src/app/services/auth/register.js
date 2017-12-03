import Vue from 'vue';
import accountTransformer from './../../transformers/custom/accountSetup';
import accountService from './../account';
import store from './../../store';

const success = (token, resolve) => {
  store.dispatch('login', token.token);
  Vue.router.push({
    name: 'register.personalInfo',
  });
  resolve();
};

const failed = (errors, reject) => {
  reject(accountTransformer.fetch(errors));
};

export default user => (
  new Promise((resolve, reject) => {
    Vue.$http
      .post('auth/register', user)
      .then((response) => {
        success(response.data, resolve);
      })
      .catch((error) => {
        failed(error.response.data, reject);
      });
  })
);

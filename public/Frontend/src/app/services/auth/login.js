import Vue from 'vue';
import accountService from './../account';
import store from './../../store';

/**
 * When the request succeeds
 */
const success = (token, resolve) => {
  store.dispatch('login', token.token);
  accountService.find().then(() => {
    Vue.router.push({
      name: 'clients',
    });
    resolve();
  });
};

/**
 * When the request fails
 */
const failed = (error, reject) => {
  if (error.response === undefined) {
    return reject({ error: ['Invalid credentials'] });
  }
  return reject(error.response.data);
};

export default user => (
  new Promise((resolve, reject) => {
    Vue.$http.post('/auth', user)
             .then((response) => {
               success(response.data, resolve);
             })
             .catch((error) => {
               failed(error, reject);
             });
  })
);

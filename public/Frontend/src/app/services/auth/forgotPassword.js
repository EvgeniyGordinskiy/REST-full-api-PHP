import Vue from 'vue';
import accountService from './../account';
import store from './../../store';

/**
 * When the request succeeds
 */
const success = (token, resolve) => {
    // store.dispatch('login', token);
    // Vue.router.push({
    //     name: 'clients',
    // });
};

/**
 * When the request fails
 */
const failed = (error, reject) => {
  // if (typeof error.response.data.error !== 'undefined') {
  //   return reject({ error: ['Invalid credentials'] });
  // }
  return reject(error.response.data);
};

export default user => (
  new Promise((resolve, reject) => {
      Vue.$http.post('/forgotPassword', user)
             .then((response) => {
              console.log(response, 'response');
               success(response.data, resolve);
             })
             .catch((error) => {
               console.log(error, ' error');

               failed(error, reject);
             });
  })
);

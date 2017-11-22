import Vue from 'vue';
import accountTransformer from './../../transformers/account';
import store from './../../store';

// When the request succeeds
const success = (account, resolve) => {
  //eslint-disable-next-line
  account = accountTransformer.fetch(account);
  store.dispatch('getAccount', account);
  resolve(account);
};

// When the request fails
const failed = (error, reject) => {
  reject(error);
};

export default () => (
  new Promise((resolve, reject) => {
    Vue.$http.get('/account')
            .then((response) => {
              success(response.data, resolve);
            })
            .catch((error) => {
              failed(error, reject);
            });
  })
);

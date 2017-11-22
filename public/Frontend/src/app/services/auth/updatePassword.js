import Vue from 'vue';

const success = (response, resolve) => {
  resolve(response.data.success.message);
};

const failed = (errors, reject) => {
  reject(errors);
};

export default data => (
  new Promise((resolve, reject) => {
    Vue.$http
    .put('auth/update_password', data)
    .then((response) => {
      success(response, resolve);
    })
    .catch((error) => {
      failed(error.response.data, reject);
    });
  })
);

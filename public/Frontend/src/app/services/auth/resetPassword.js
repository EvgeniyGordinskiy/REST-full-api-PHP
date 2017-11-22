import Vue from 'vue';

const success = (data, resolve) => {
  resolve(data);
};

const failed = (errors, reject) => {
  reject(errors);
};

export default data => (
  new Promise((resolve, reject) => {
    Vue.$http
    .post('auth/reset_password', data)
    .then((response) => {
      success(response.data, resolve);
    })
    .catch((error) => {
      failed(error.response.data, reject);
    });
  })
);

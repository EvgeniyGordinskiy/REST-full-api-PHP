'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _promise = require('babel-runtime/core-js/promise');

var _promise2 = _interopRequireDefault(_promise);

var _vue = require('vue');

var _vue2 = _interopRequireDefault(_vue);

var _account = require('./../account');

var _account2 = _interopRequireDefault(_account);

var _store = require('./../../store');

var _store2 = _interopRequireDefault(_store);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

/**
 * When the request succeeds
 */
var success = function success(token, resolve) {
    _store2.default.dispatch('login', token.token);
    _account2.default.find().then(function () {
        _vue2.default.router.push({
            name: 'clients'
        });
        resolve();
    });
};

/**
 * When the request fails
 */
var failed = function failed(error, reject) {
    if (error.response === undefined) {
        return reject({ error: ['Invalid credentials'] });
    }
    return reject(error.response.data);
};

exports.default = function (user) {
    return new _promise2.default(function (resolve, reject) {
        _vue2.default.$http.post('/auth', user).then(function (response) {
            success(response.data, resolve);
        }).catch(function (error) {
            failed(error, reject);
        });
    });
};

//# sourceMappingURL=login-compiled.js.map
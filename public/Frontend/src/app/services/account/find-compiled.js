'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _promise = require('babel-runtime/core-js/promise');

var _promise2 = _interopRequireDefault(_promise);

var _account = require('./../../transformers/account');

var _account2 = _interopRequireDefault(_account);

var _store = require('./../../store');

var _store2 = _interopRequireDefault(_store);

var _vue = require('vue');

var _vue2 = _interopRequireDefault(_vue);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

// When the request succeeds
var success = function success(account, resolve) {
    account = _account2.default.fetch(account);
    _store2.default.dispatch('getAccount', account);
    resolve(account);
};

// When the request fails
var failed = function failed(error, reject) {
    reject(error);
};

exports.default = function () {
    return new _promise2.default(function (resolve, reject) {
        _vue2.default.$http.get('/account').then(function (response) {
            success(response.data, resolve);
        }).catch(function (error) {
            failed(error, reject);
        });
    });
};

//# sourceMappingURL=find-compiled.js.map
'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _login = require('./login');

var _login2 = _interopRequireDefault(_login);

var _logout = require('./logout');

var _logout2 = _interopRequireDefault(_logout);

var _register = require('./register');

var _register2 = _interopRequireDefault(_register);

var _resetPassword = require('./resetPassword');

var _resetPassword2 = _interopRequireDefault(_resetPassword);

var _updatePassword = require('./updatePassword');

var _updatePassword2 = _interopRequireDefault(_updatePassword);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
  login: _login2.default,
  logout: _logout2.default,
  register: _register2.default,
  resetPassword: _resetPassword2.default,
  updatePassword: _updatePassword2.default
};

//# sourceMappingURL=index-compiled.js.map
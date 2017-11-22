'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _auth = require('./../../../services/auth');

var _auth2 = _interopRequireDefault(_auth);

var _store = require('./../../../store');

var _store2 = _interopRequireDefault(_store);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

/* ============
 * Login using token
 * ============
 *
 * This is the login using token.
 */

exports.default = {
  created: function created() {
    _auth2.default.loginUsingToken(_store2.default.state.route.params.token);
  }
};

//# sourceMappingURL=loginUsingToken-compiled.js.map
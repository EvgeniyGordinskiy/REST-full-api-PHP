'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _vuex = require('vuex');

var _auth = require('./../../services/auth');

var _auth2 = _interopRequireDefault(_auth);

var _header = require('./../../components/header/header.vue');

var _header2 = _interopRequireDefault(_header);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
  data: function data() {
    return {};
  },


  methods: {
    logout: function logout() {
      _auth2.default.logout();
    }
  },
  components: {
    headerv: _header2.default
  }
}; /* ============
    * User Layout
    * ============
    *
    * This is the layout for the authenticated user.
    */

//# sourceMappingURL=user-compiled.js.map
'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _auth = require('./../../services/auth');

var _auth2 = _interopRequireDefault(_auth);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

// import accountService from './../../services/account';

exports.default = {

  computed: {
    username: function username() {},
    avatar: function avatar() {},


    /**
     * This computed property will determine if the admin impersonated this account.
     */
    isAdmin: function isAdmin() {}
  },

  mounted: function mounted() {},


  methods: {
    /**
     * This method will logout the user.
     */
    logout: function logout() {
      _auth2.default.logout();
    }
  }
}; /* ============
    * Dashboard menu
    * ============
    *
    * This is the header component.
    */

//# sourceMappingURL=header-compiled.js.map
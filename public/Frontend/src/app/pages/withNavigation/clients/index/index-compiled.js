'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _card = require('./../../../../components/card/card.vue');

var _card2 = _interopRequireDefault(_card);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
  data: function data() {
    return {
      clients: [{
        name: 'FirstName LastName',
        email: 'email'
      }, {
        name: 'FirstName LastName',
        email: 'email'
      }, {
        name: 'FirstName LastName',
        email: 'email'
      }, {
        name: 'FirstName LastName',
        email: 'email'
      }, {
        name: 'FirstName LastName',
        email: 'email'
      }, {
        name: 'FirstName LastName',
        email: 'email'
      }, {
        name: 'FirstName LastName',
        email: 'email'
      }, {
        name: 'FirstName LastName',
        email: 'email'
      }, {
        name: 'FirstName LastName',
        email: 'email'
      }, {
        name: 'FirstName LastName',
        email: 'email'
      }, {
        name: 'FirstName LastName',
        email: 'email'
      }],
      loading: false
    };
  },


  methods: {
    editClient: function editClient(client) {
      console.log(client);
    }
  },
  components: {
    cardv: _card2.default
  }

}; /* ============
    * Home Index
    * ============
    *
    * This is the home page.
    */

//# sourceMappingURL=index-compiled.js.map
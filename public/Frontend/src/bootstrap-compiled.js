'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.router = undefined;

var _promise = require('babel-runtime/core-js/promise');

var _promise2 = _interopRequireDefault(_promise);

var _vue = require('vue');

var _vue2 = _interopRequireDefault(_vue);

require('element-ui/lib/theme-default/index.css');

var _axios = require('axios');

var _axios2 = _interopRequireDefault(_axios);

var _vuexRouterSync = require('vuex-router-sync');

var _vuexRouterSync2 = _interopRequireDefault(_vuexRouterSync);

var _store = require('./app/store');

var _store2 = _interopRequireDefault(_store);

var _vueRouter = require('vue-router');

var _vueRouter2 = _interopRequireDefault(_vueRouter);

var _routes = require('./app/routes');

var _routes2 = _interopRequireDefault(_routes);

var _elementUi = require('element-ui');

var _elementUi2 = _interopRequireDefault(_elementUi);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

// eslint-disable-next-line
//  import authService from './app/services/auth';
var logoutErrors = [40102, // No token provided
40103];

/* ============
 * Axios
 * ============
 *
 * Promise based HTTP client for the browser and node.js.
 * Because Vue Resource has been retired, Axios will now been used
 * to perform AJAX-requests.
 *
 * https://github.com/mzabriskie/axios
 */
/* ============
 * Bootstrap File
 * ============
 *
 * Will configure and bootstrap the application
 */

/* ============
 * Vue
 * ============
 *
 * Vue.js is a library for building interactive web interfaces.
 * It provides data-reactive components with a simple and flexible API.
 *
 * http://rc.vuejs.org/guide/
 */


_axios2.default.defaults.baseURL = process.env.API_LOCATION;
_axios2.default.defaults.headers.common.Accept = 'application/json';
_axios2.default.interceptors.response.use(function (response) {
  return response;
}, function (error) {
  /**
   * If response is unauthorized and it is not a request retry from auth service.
   */
  if (error.response.status === 401 && error.response.request.responseURL.indexOf('retry=1') === -1) {
    var errorCode = error.response.data.error.code;
    /**
     * If error should log user out.
     */
    if (logoutErrors.indexOf(errorCode) >= 0) {
      //  authService.logout();
      return _promise2.default.reject(error);
    }

    /**
    * If token is expired, try to refresh it and retry failed ajax.
    */
    if (errorCode === 40104) {}
    // return authService.token.getRefreshedToken(error.response);


    /**
    * if email is no verified.
    */
    if (errorCode === 40113) {
      _vue2.default.router.push({
        name: 'dashboard'
      });
    }

    /**
    * If user does not have module.
    */
    if (errorCode === 40112) {
      _vue2.default.router.push({
        name: 'dashboard'
      });
    }
  }
  return _promise2.default.reject(error);
});
_axios2.default.interceptors.request.use(function (config) {
  if (localStorage.getItem('id_token')) {
    // eslint-disable-next-line
    config.headers.Authorization = 'Bearer ' + localStorage.getItem('id_token');
  }
  return config;
}, function (error) {
  return _promise2.default.reject(error);
});
_vue2.default.$http = _axios2.default;

/* ============
 * Styling
 * ============
 *
 * Require the application styling.
 * Stylus is used for this boilerplate.
 *
 * If you don't want to use Stylus, that's fine!
 * Replace the stylus directory with the CSS preprocessor you want.
 * Require the entry point here & install the webpack loader.
 *
 * It's that easy...
 *
 * http://stylus-lang.com/
 */
require('./assets/stylus/app.styl');

/* ============
 * Vuex Router Sync
 * ============
 *
 * Effortlessly keep vue-Router and vuex store in sync.
 *
 * https://github.com/vuejs/vuex-router-sync/blob/master/README.md
 */
// eslint-disable-next-line

// eslint-disable-next-line


// store.dispatch('checkAuthentication');


/* ============
 * Vue Router
 * ============
 *
 * The official Router for Vue.js. It deeply integrates with Vue.js core
 * to make building Single Page Applications with Vue.js a breeze.
 *
 * http://router.vuejs.org/en/index.html
 */
// eslint-disable-next-line

// eslint-disable-next-line

// eslint-disable-next-line
// import routeMidlleware from './app/route-middleware';

_vue2.default.use(_vueRouter2.default);

var router = exports.router = new _vueRouter2.default({
  routes: _routes2.default
});
// router.beforeEach(routeMidlleware.beforeEach);

_vuexRouterSync2.default.sync(_store2.default, router);

_vue2.default.router = router;

/* ============
 * Element User Interface
 * ============
 *
 * Vue.js UI components.
 *
 * http://element.eleme.io/#/en-US
 */
// eslint-disable-next-line


_vue2.default.use(_elementUi2.default);

exports.default = {
  router: router
};

//# sourceMappingURL=bootstrap-compiled.js.map
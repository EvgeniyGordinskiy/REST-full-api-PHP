/* ============
 * Login using token
 * ============
 *
 * This is the login using token.
 */

import loginService from './../../../services/auth';
import store from './../../../store';

export default {
  created() {
    loginService.loginUsingToken(store.state.route.params.token);
  },
};

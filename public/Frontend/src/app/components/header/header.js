/* ============
 * Dashboard menu
 * ============
 *
 * This is the header component.
 */

import authService from './../../services/auth';
 // import accountService from './../../services/account';

export default {

  computed: {

    username() {

    },

    avatar() {

    },

    /**
     * This computed property will determine if the admin impersonated this account.
     */
    isAdmin() {

    },
  },

  mounted() {

  },

  methods: {
    /**
     * This method will logout the user.
     */
    logout() {
      authService.logout();
    },
  },
};

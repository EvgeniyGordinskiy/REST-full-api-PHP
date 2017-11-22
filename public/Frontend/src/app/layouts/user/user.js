/* ============
 * User Layout
 * ============
 *
 * This is the layout for the authenticated user.
 */

import { mapGetters } from 'vuex';
import authService from './../../services/auth';
import Header from './../../components/header/header.vue';

export default {
  data() {
    return {

    };
  },

  methods: {
    logout() {
      authService.logout();
    },
  },
  components: {
    headerv: Header,
  },
};

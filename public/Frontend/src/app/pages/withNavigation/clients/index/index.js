/* ============
 * Home Index
 * ============
 *
 * This is the home page.
 */

import cardv from './../../../../components/card/card.vue';

export default {
  data() {
      return {
          clients: [
          ],
          loading: false,
      };
  },
  created() {
    console.log(localStorage.getItem('id_token'));
  },
  methods: {
      editClient(client) {
          console.log(client);
      }
  },
  components: {
        cardv: cardv,
    },
};

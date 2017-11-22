<template>
    <router-view></router-view>
</template>
<script>
  /* ============
   * Entry Point
   * ============
   *
   * The entry point of the application
   */

  import store from './app/store';
  import { router } from './bootstrap';
  export default {
    data() {
      return {
        loading: false,
      };
    },

    /**
     * The Vuex store
     */
    store,

    /**
     * The router
     */
    router,

    /**
     * Fires when the app has been mounted
     */
    created() {
// eslint-disable-next-line
      console.log('vue');
      // If the user is authenticated,
      // fetch the data from the API
//      if (this.$store.state.auth.authenticated) {
//        this.loading = true;
//        accountService.find().then(() => {
//          this.loading = false;
//        });
//      }
    },
  };
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>

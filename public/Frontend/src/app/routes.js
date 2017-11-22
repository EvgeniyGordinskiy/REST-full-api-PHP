/* ============
 * Routes File
 * ============
 *
 * The routes and redirects are defined in this file
 */


/**
 * The routes
 *
 * @type {object} The routes
 */

import Home from './pages/home/index/index.vue';

const Clients = (resolve) => {
  require.ensure(['./pages/withNavigation/clients/index/index.vue'], () => {
  // eslint-disable-next-line
  resolve(require('./pages/withNavigation/clients/index/index.vue'));
  }, 'clients');
};

const UserLayout = (resolve) => {
  require.ensure(['./pages/withNavigation/navigation.vue'], () => {
  // eslint-disable-next-line
  resolve(require('./pages/withNavigation/navigation.vue'));
  }, 'clients');
};

// eslint-disable-next-line
export default [

    // Home
  {
    path: '/home',
    name: 'home',
    components: {
      default: Home,
    },
  },
  // Components with the navigation wrapper.
  {
    path: '',
    component: UserLayout,
    children: [
      {
        path: '/clients',
        name: 'clients',
        components: {
          default: Clients,
        },
        children: [
        ],
      },
      {
        path: '/*',
        redirect: '/home',
      },
    ],
  },
];

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
console.log('routes');

import Home from './pages/home/index/index.vue';

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
    component: require('./pages/withNavigation/navigation.vue'),
    children: [
      {
        path: '/clients',
        name: 'clients',
        component: require('./pages/withNavigation/clients/index/index.vue'),
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

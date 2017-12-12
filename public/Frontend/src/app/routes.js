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

// eslint-disable-next-line
export default [
  {
    path: '',
    redirect: '/home',
  },
    // Home
  {
    path: '/home',
    name: 'home',
    component: require('./pages/home/home.vue'),
    meta: {
      guest: false,
    },
  },
    
  // Login page
  {
    path: '/login',
    name: 'login',
    component: require('./pages/login/login.vue'),
    meta: {
      guest: true,
    },
  },
    
   // Register page 
  {
    path: '/register',
    name: 'register',
    component: require('./pages/register/register.vue'),
    meta: {
      guest: true,
    },
  },
  // Components with the navigation wrapper.
  {
    path: '',
    component: require('./pages/withNavigation/navigation.vue'),
    meta: {
      guest: false,
    },
    children: [
      {
        path: '/clients',
        name: 'clients',
        
        component: require('./pages/withNavigation/clients/index/index.vue'),

        children: [
        ],
      }
    ],
  },
  {
    path: '/*',
    redirect: '/home',
  },

];

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

    // Home
  {
    path: '/home',
    name: 'home',
    component: require('./pages/home/home.vue'),
  },
    
  // Login page
  {
    path: '/login',
    name: 'login',
    component: require('./pages/login/login.vue'),
  },
    
   // Register page 
  {
    path: '/register',
    name: 'register',
    component: require('./pages/register/register.vue'),
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
        meta: {
          auth: true,
        },
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

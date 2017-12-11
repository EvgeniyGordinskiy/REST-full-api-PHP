import store from './store';

/**
 * Perform actions before each route
 * @param  {[type]}   to   route to be accessed
 * @param  {[type]}   from route coming from
 * @param  {Function} next resolves the hook, must be called
 * @return {Function}        [description]
 */
const beforeEach = (to, from, next) => {
    /**
     * Authenticated routes.
     */
    if (to.matched.some(record => record.meta.guest)) {
        /**
         * If user is not authenticated, redirect to home.
         */
        // if (!store.state.auth.authenticated) {
        //     return next({
        //         path: '/login',
        //     });
        // }

        console.log(to);
    }

    console.log(to);
    return next();
}

export default {
    beforeEach,
};

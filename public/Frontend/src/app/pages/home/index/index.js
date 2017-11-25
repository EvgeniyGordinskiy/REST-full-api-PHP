/* ============
 * Login User
 * ============
 *
 * This is the page for logging user in.
 */

import auth from './../../../services/auth';
import Forms from './../../../utils/forms/forms';
import Formvue from './../../../components/form/form.vue';
import Header from './../../../components/header/header.vue';
import LayoutV from './../../../layouts/user/user.vue';

export default {
    data() {
        return {
            form: new Forms({
                email: {
                    value: '',
                    type: 'email',
                },
                password: {
                    value: '',
                    type: 'password',
                },
            }),
        };
    },

    methods: {
        /**
         * Logs the user in
         */
        login() {
            console.log('login');
            this.form.loading = true;
            auth.login(this.form.data())
                .catch((errors) => {
                    this.form.loading = false;
                    this.form.recordErrors(errors);
                });
        },
    },

    components: {
        formv: Formvue,
        headerv: Header,
        layoutv: LayoutV,

    },
};

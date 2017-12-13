/* ============
 * Login User
 * ============
 *
 * This is the page for logging user in.
 */

import auth from './../../services/auth';
import Forms from './../../utils/forms/forms';
import Formvue from './../../components/form/form.vue';

export default {
    data() {
        return {
            form: new Forms({
                email: {
                    value: '',
                    type: 'email',
                },
            }),
        };
    },

    methods: {
        /**
         * Logs the user in
         */
        send() {
            this.form.loading = true;
            auth.forgotPassword(this.form.data())
                .catch((errors) => {
                    console.log(errors.error);
                    this.form.loading = false;
                    this.form.recordErrors(errors);
                });
        },
    },

    components: {
        formv: Formvue,
    },
};

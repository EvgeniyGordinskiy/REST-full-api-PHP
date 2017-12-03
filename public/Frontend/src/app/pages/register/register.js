/**
 * ========
 * Regisfter
 * ========
 * THe page for the register user
 */

import Vue from 'vue';
import Auth from './../../services/auth';
import Form from './../../utils/forms/forms';
import Vform from './../../components/form/form.vue';

export default {
    data() {
        return {
            form: new Form({
                name: {
                    value: '',
                    type: 'text'
                },
                email: {
                    value: '',
                    type: 'email'
                },
                password: {
                    value: '',
                    type: 'password'
                },
                confirm_password: {
                    value: '',
                    type: 'password'
                },
            }),
        }
    },
    methods: {
        register() {
            this.form.loading = true;
            console.log(this.form.data());
            Auth.register(this.form.data())
                .then(() => {
                    Vue.router.push({
                        name: 'home'
                    });
                })
                .catch((errors) => {
                    console.log(errors, ' errors register');
                    this.form.loading = false;
                    this.form.recordErrors(errors);
                })
        }
    },
    components: {
        Vform: Vform,
    },
}
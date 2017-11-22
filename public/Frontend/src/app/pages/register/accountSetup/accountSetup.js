/* ============
 * Account Setup
 * ============
 *
 * This is the page for registering basic info.
 */
import { mapGetters, mapActions } from 'vuex';
import Forms from './../../../utils/forms/forms';
import store from './../../../store';
import planService from './../../../services/plans';
import organizationTypeService from './../../../services/organizationType';
import authService from './../../../services/auth';
import accountTransformer from './../../../transformers/custom/accountSetup';

export default {
  data() {
    return {
      form: new Forms(
        {
          firstName: {
            value: '',
            type: 'text',
          },
          lastName: {
            value: '',
            type: 'text',
          },
          email: {
            value: '',
            type: 'email',
          },
          password: {
            value: '',
            type: 'password',
          },
          passwordConfirmation: {
            value: '',
            type: 'password',
          },
          planId: {
            value: '',
            type: 'select',
          },
          organizationTypeId: {
            value: '',
            type: 'select',
          },
          terms: {
            value: '',
            type: 'term',
          },
        }
      ),
    };
  },

  computed: {
    ...mapGetters({
      plan: 'chosenPlan',
      plans: 'allPlans',
      organizationTypes: 'allOrganizationTypes',
    }),
  },

  watch: {
    /**
     * Watches state update to inject on Forms class.
     *
     * @param  {Object} plans    The plans list.
     */
    plans(plans) {
      this.form.setOptions('planId', plans);
    },

    /**
     * Watches state update to inject on Forms class.
     *
     * @param  {Object} organizationTypes    The organization types list.
     */
    organizationTypes(organizationTypes) {
      this.form.setOptions('organizationTypeId', organizationTypes);
    },
  },

  mounted() {
    Promise.all([
      planService.all(),
      organizationTypeService.all(),
    ]).then(() => {
      if (store.state.route.params.id !== undefined) {
        const planId = parseInt(store.state.route.params.id, 10);
        this.form.planId = this.plans.filter(plan => (plan.id === planId))[0].id;
      }
    });
  },

  methods: {
    ...mapActions([
      'setChosenPlan',
    ]),

    /**
     * This method will be called when saving the form.
     */
    register() {
      this.form.loading = true;
      if (this.form.terms) {
        const account = accountTransformer.send(this.form.data());
        authService.register(account)
        .catch((errors) => {
          this.form.loading = false;
          this.form.recordErrors(errors);
        });
      } else {
        this.form.loading = false;
        this.form.recordErrors({
          terms: [
            this.$t('static.accountSetup.termsError'),
          ],
        });
      }
    },

    /**
     * This method will set the chosen plan on state whenever changes in the form.
     *
     * @param {String} name   The name of the attribute changing in the form.
     */
    onFormChange(name) {
      if (name === 'planId') {
        this.setChosenPlan(this.plans.filter(plan => (plan.id === this.form.planId))[0]);
      }
    },
  },

  components: {
    VForm: require('./../../../components/form/form.vue'),
  },
};

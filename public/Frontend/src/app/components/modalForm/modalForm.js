
import Formvue from './../../../components/form/form.vue';
import Forms from './../../../utils/forms/forms';
import timeZones from './../../../../mixins/timeZones';


export default {
  data() {
    return {
      form: new Forms({
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
        timezone: {
          value: this.client.timeZone,
          type: 'select'
        }
      }),
    };
  },
  props: {
    client: {
      type: Object,
      required: true,
    },
    show: {
      type: Boolean,
      required: true,
      default: false,
    },
    onFormChange: {
      type: Function,
      required: true,
    },
  },

  methods: {
    onSubmit() {
     console.log('submit');
    },
  },

  watch: {
    /**
     * Watches state update to inject on Forms class.
     *
     * @param  {Object} deposits    The all deposits list.
     */
    timeZones(deposits) {
      this.form.setOptions('timeZones', timeZones);
    },

  },

  components: {
    formv: Formvue,
  },
  mixins: [
    timeZones,
  ],
};

'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _form = require('./../../../components/form/form.vue');

var _form2 = _interopRequireDefault(_form);

var _forms = require('./../../../utils/forms/forms');

var _forms2 = _interopRequireDefault(_forms);

var _timeZones2 = require('./../../../../mixins/timeZones');

var _timeZones3 = _interopRequireDefault(_timeZones2);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
  data: function data() {
    return {
      form: new _forms2.default({
        firstName: {
          value: '',
          type: 'text'
        },
        lastName: {
          value: '',
          type: 'text'
        },
        email: {
          value: '',
          type: 'email'
        },
        timezone: {
          value: this.client.timeZone,
          type: 'select'
        }
      })
    };
  },

  props: {
    client: {
      type: Object,
      required: true
    },
    show: {
      type: Boolean,
      required: true,
      default: false
    },
    onFormChange: {
      type: Function,
      required: true
    }
  },

  methods: {
    onSubmit: function onSubmit() {
      console.log('submit');
    }
  },

  watch: {
    /**
     * Watches state update to inject on Forms class.
     *
     * @param  {Object} deposits    The all deposits list.
     */
    timeZones: function timeZones(deposits) {
      this.form.setOptions('timeZones', _timeZones3.default);
    }
  },

  components: {
    formv: _form2.default
  },
  mixins: [_timeZones3.default]
};

//# sourceMappingURL=modalForm-compiled.js.map
'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _getPrototypeOf = require('babel-runtime/core-js/object/get-prototype-of');

var _getPrototypeOf2 = _interopRequireDefault(_getPrototypeOf);

var _classCallCheck2 = require('babel-runtime/helpers/classCallCheck');

var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);

var _createClass2 = require('babel-runtime/helpers/createClass');

var _createClass3 = _interopRequireDefault(_createClass2);

var _possibleConstructorReturn2 = require('babel-runtime/helpers/possibleConstructorReturn');

var _possibleConstructorReturn3 = _interopRequireDefault(_possibleConstructorReturn2);

var _inherits2 = require('babel-runtime/helpers/inherits');

var _inherits3 = _interopRequireDefault(_inherits2);

var _transformer = require('./../transformer');

var _transformer2 = _interopRequireDefault(_transformer);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var PersonalInfoTransformer = function (_Transformer) {
  (0, _inherits3.default)(PersonalInfoTransformer, _Transformer);

  function PersonalInfoTransformer() {
    (0, _classCallCheck3.default)(this, PersonalInfoTransformer);
    return (0, _possibleConstructorReturn3.default)(this, (PersonalInfoTransformer.__proto__ || (0, _getPrototypeOf2.default)(PersonalInfoTransformer)).apply(this, arguments));
  }

  (0, _createClass3.default)(PersonalInfoTransformer, null, [{
    key: 'fetch',

    /**
     * Method used to transform a fetched personalInfo
     *
     * @param personalInfo The fetched personalInfo
     *
     * @returns {Object} The transformed personalInfo
     */
    value: function fetch(personalInfo) {
      return {
        phoneNumber: personalInfo.phone_number,
        streetName: personalInfo.street_name,
        zipcode: personalInfo.zipcode,
        cityId: personalInfo.city_id
      };
    }

    /**
     * Method used to transform a send personalInfo
     *
     * @param personalInfo The personalInfo to be send
     *
     * @returns {Object} The transformed personalInfo
     */

  }, {
    key: 'send',
    value: function send(personalInfo) {
      return {
        phone_number: personalInfo.phoneNumber,
        street_name: personalInfo.streetName,
        zipcode: personalInfo.zipcode,
        city_id: personalInfo.cityId
      };
    }
  }]);
  return PersonalInfoTransformer;
}(_transformer2.default); /* ============
                           * Register personal informations Transformer
                           * ============
                           *
                           * The transformer for the personal information.
                           */

exports.default = PersonalInfoTransformer;

//# sourceMappingURL=registerPersonalInfo-compiled.js.map
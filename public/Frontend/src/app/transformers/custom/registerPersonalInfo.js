/* ============
 * Register personal informations Transformer
 * ============
 *
 * The transformer for the personal information.
 */

import Transformer from './../transformer';

export default class PersonalInfoTransformer extends Transformer {
  /**
   * Method used to transform a fetched personalInfo
   *
   * @param personalInfo The fetched personalInfo
   *
   * @returns {Object} The transformed personalInfo
   */
  static fetch(personalInfo) {
    return {
      phoneNumber: personalInfo.phone_number,
      streetName: personalInfo.street_name,
      zipcode: personalInfo.zipcode,
      cityId: personalInfo.city_id,
    };
  }

  /**
   * Method used to transform a send personalInfo
   *
   * @param personalInfo The personalInfo to be send
   *
   * @returns {Object} The transformed personalInfo
   */
  static send(personalInfo) {
    return {
      phone_number: personalInfo.phoneNumber,
      street_name: personalInfo.streetName,
      zipcode: personalInfo.zipcode,
      city_id: personalInfo.cityId,
    };
  }
}

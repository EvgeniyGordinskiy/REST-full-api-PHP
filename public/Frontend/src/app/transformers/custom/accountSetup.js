/* ============
 * Register account setup Transformer
 * ============
 *
 * The transformer for the account setup.
 */

import Transformer from './../transformer';

export default class AccountSetupTransformer extends Transformer {
  /**
   * Method used to transform a fetched account setup.
   *
   * @param accountSetup The fetched account setup.
   *
   * @returns {Object} The transformed accountSetup
   */
  static fetch(accountSetup) {
    return {
      firstName: accountSetup.first_name,
      lastName: accountSetup.last_name,
      email: accountSetup.email,
      password: accountSetup.password,
      passwordConfirmation: accountSetup.password_confirmation,
    };
  }

  /**
   * Method used to transform a send accountSetup
   *
   * @param accountSetup The accountSetup to be send
   *
   * @returns {Object} The transformed accountSetup
   */
  static send(accountSetup) {
    return {
      first_name: accountSetup.firstName,
      last_name: accountSetup.lastName,
      email: accountSetup.email,
      password: accountSetup.password,
      password_confirmation: accountSetup.passwordConfirmation,
    };
  }
}

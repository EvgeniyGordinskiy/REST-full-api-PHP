"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
/* ============
 * Clients Menu Component
 * ============
 *
 * Menu to navigate between list of clients and client groups.
 */

exports.default = {
  props: {
    /**
     * The menu items to be rendered. Each item is a object containing the route name and the title.
     *
     * @type {Array}
     */
    items: {
      type: Array,
      required: true
    },

    /**
     * A boolean indicating if translation should be used.
     *
     * @type {Boolean}
     */
    translated: {
      type: Boolean,
      required: false
    }
  }
};

//# sourceMappingURL=innerMenu-compiled.js.map
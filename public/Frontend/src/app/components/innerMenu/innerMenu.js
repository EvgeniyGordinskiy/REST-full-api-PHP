/* ============
 * Clients Menu Component
 * ============
 *
 * Menu to navigate between list of clients and client groups.
 */

export default {
  props: {
    /**
     * The menu items to be rendered. Each item is a object containing the route name and the title.
     *
     * @type {Array}
     */
    items: {
      type: Array,
      required: true,
    },

    /**
     * A boolean indicating if translation should be used.
     *
     * @type {Boolean}
     */
    translated: {
      type: Boolean,
      required: false,
    },
  },
};

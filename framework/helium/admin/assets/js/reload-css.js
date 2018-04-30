(function ($) {
    $(function () {
        if ('undefined' !== typeof wp && wp.customize && wp.customize.selectiveRefresh) {
            wp.customize.selectiveRefresh.bind('render-partials-response', function (setting) {
                $('#selective_refresh_loader').hide()
            });
        }

        wp.customize.selectiveRefresh.partialConstructor.refresh_styles = wp.customize.selectiveRefresh.Partial.extend({

            /**
             * Class name choices.
             *
             * This is populated in PHP via `wp_add_inline_script()`.
             *
             * @type {Array}
             */
            choices: [],

            /**
             * Refresh partial.
             *
             * Override refresh behavior to bypass partial refresh request in favor of direct DOM manipulation.
             *
             * @returns {jQuery.Promise} Resolved promise.
             */
            preparePlacement: function() {
                $('#selective_refresh_loader').show()
            }
        });

    });


})(jQuery);

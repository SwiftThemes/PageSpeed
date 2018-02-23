(function ($) {
    $(function () {
        if ('undefined' !== typeof wp && wp.customize && wp.customize.selectiveRefresh) {
            wp.customize.selectiveRefresh.bind('render-partials-response', function (setting) {
                // $('body').css('opacity', 1)
                // $( 'body' ).removeClass( 'updating-styles' );
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
                // $( 'body' ).addClass( 'updating-styles' );
                // $('body').css('opacity', .2)

                $('#selective_refresh_loader').show()

            }
        });

    });


})(jQuery);

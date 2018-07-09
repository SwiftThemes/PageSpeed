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
            preparePlacement: function () {
                $('#selective_refresh_loader').show()
            }
        });


        //Selective refresh for body classes
        //@todo These must be moved to pagespeed
        if ('undefined' !== typeof wp && wp.customize && wp.customize.selectiveRefresh) {

            wp.customize.selectiveRefresh.partialConstructor.body_classes = wp.customize.selectiveRefresh.Partial.extend({

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
                renderContent: function (placement) {
                    $('body').removeClass().addClass(placement.addedContent)

                    wp.customize.selectiveRefresh.trigger('partial-content-rendered', placement);
                    return true;
                }

            });
            // @todo
            // We shouldn't need this as we are not rendering anything.
            wp.customize.selectiveRefresh.partialConstructor.masonry = wp.customize.selectiveRefresh.Partial.extend({
                renderContent: function (placement) {
                    wp.customize.selectiveRefresh.trigger('partial-content-rendered', placement);
                    return true;
                }
            });
        }


        wp.customize.selectiveRefresh.bind('partial-content-rendered', function (placement) {
            if ('home_slider' == placement.partial.id) {
                jQuery('.srs-slider').unslider('destroy');
                jQuery('.srs-slider').unslider({
                    autoplay: true,
                    delay: 6000,
                    infinite: true,
                    arrows: {
                        prev: '<span class="unslider-arrow prev  he-chevron-circle-left"></span>',
                        next: '<span class="unslider-arrow next  he-chevron-circle-right"></span>',
                    }
                });
            }
            if ('masonry' == placement.partial.id) {
                setTimeout(function () {
                    $('#articles').masonry('destroy');
                    $('.masonry #articles').masonry({
                        columnWidth: '.entry',
                        itemSelector: '.entry',
                        gutter: '.gutter-sizer',
                    });


                }, 50)

            }
        })


    });


})(jQuery);

/**
 * Created by satish on 04/02/17.
 */
(function ($, GLOBAL) {
    'use strict';
    GLOBAL = {}
    GLOBAL.DESKTOP_WIDTH = 1160;
    GLOBAL.hasSideMenu = false
    $(document).ready(function () {
        setSidebarHeights()
        menuHandler();
        makeSideBarsSticky()
        makeNavSticky()
        makeHeaderSticky()


        //Clear the timeout when user is interacting with the nav
        $('#primary-nav-container,#sticky-search').on('click', function () {
            clearTimeout(GLOBAL.hideStickyTimer)
        })


        /**
         * Moved these event listeners from add side menu function.
         * Find a suitable place.
         */
        $('.open-drawer').click(function (event) {
            event.preventDefault();
            event.stopPropagation();
            $('body').toggleClass('menu-open');
        })
        $(document).on('click', '.menu-open #wrapper', function () {
            $('body').removeClass('menu-open')
        })
    })
    $(window).load(function () {
        setSidebarHeights()
    })

    $(window).resize(function () {
        menuHandler();
        removeStickiesOnMobile();
        unsetSidebarHeights();
    });

    window.addEventListener('scroll', function () {
        autoHideStickyNav()
    })


    /**
     * Show nav bar on scroll. Hide in 2 seconds
     */
    GLOBAL.hideStickyTimer = false
    var autoHideStickyNav = throttle(function () {
        /**
         * @todo
         * Overloading both stickies, seperate it out?
         */

        clearTimeout(GLOBAL.hideStickyTimer)
        $('#primary-nav-container-sticky-wrapper,#sticky-search-sticky-wrapper,.sleek-header #site-header-container-sticky-wrapper').css({opacity: 1})
        GLOBAL.hideStickyTimer = setTimeout(function () {
            if ($('body').hasClass('menu-open')) {
                return
            }
            $('#primary-nav-container-sticky-wrapper.is-sticky,#sticky-search-sticky-wrapper.is-sticky,.sleek-header #site-header-container-sticky-wrapper.is-sticky').css({'opacity': 0})
        }, 2000)
    }, 1000)

    /**
     * Check if the current device is desktop or mobile.
     * Uses browser width to decide
     */
    function isDesktop() {
        if (window.innerWidth > GLOBAL.DESKTOP_WIDTH) {
            return true
        } else {
            return false
        }
    }

    function isMobile() {
        if (window.innerWidth <= 800) {
            return true
        } else {
            return false
        }
    }

    /**
     * Set the sidebar heights dynamically so that broders and background appear
     * properly
     */
    function setSidebarHeights() {
        if (isDesktop()) {
            var height = document.getElementById('content').offsetHeight
            $('#sb1 >.inner,#sb2 >.inner').height(height)

            $('#sb-page-rsb >.inner,#sb-page-lsb >.inner').height(height)

            if (!document.getElementById('sticky-sb') && !document.getElementById('normal-sb')) {
                $('#ns1 >.inner,#ns2 >.inner').height(height)
            }

            $('.layout-rr-sb #ns1 >.inner,.layout-rr-sb #ns2 >.inner,.layout-ll-sb #ns1 >.inner,.layout-ll-sb #ns2 >.inner').height(height + 40)


        }
    }

    function unsetSidebarHeights() {
        if (isMobile()) {
            var height = document.getElementById('content').offsetHeight
            $('#sb1 >.inner,#sb2 >.inner').height('')

            if (!document.getElementById('sticky-sb') && !document.getElementById('normal-sb')) {
                $('#ns1 >.inner,#ns2 >.inner').height('')
            }
        }
    }

    /**
     * Return the largest of three numbers
     */

    function findMax(a, b, c) {
        if (a > b) {
            if (a > c) {
                return a
            } else {
                return c
            }
        } else {
            if (b > c) {
                return b
            } else {
                return c
            }
        }
    }


    /**
     * Handles the navigation menu.
     * Sets the right menu based on the device.
     */
    function menuHandler() {
        if (isMobile()) {
            addSideMenu()
        } else {
            removeSideMenu()
        }
    }

    /**
     * Add side menu when on mobile.
     */
    function addSideMenu() {
        if (!GLOBAL.hasSideMenu) {
            $('#primary-nav-container,#secondary-nav-container,#header-nav-container').hide()
            $('.open-drawer').show()
            $('#side-pane-inner').append($('#header-nav').html()).append($('#primary-nav').html()).append($('#secondary-nav').html())
            GLOBAL.hasSideMenu = true
        }
    }

    /**
     * Remove side menu added by addSideMenu
     */
    function removeSideMenu() {
        if (GLOBAL.hasSideMenu) {
            $('#primary-nav-container,#secondary-nav-container,header-nav-container').show()
            $('.open-drawer,#side-pane').hide()
            GLOBAL.hasSideMenu = false
        }
    }

    /**
     *
     */
    function makeSideBarsSticky() {
        if (isMobile()) {
            return
        }
        // Adding 60 as margin of error.
        // @todo make top spacing dynamic when using sticky nav
        var bottomSpacing = $('#site-footer-container').outerHeight() + $('#copyright-container').outerHeight() + 60
        $("#sticky-sb1,#sticky-sb2").sticky({topSpacing: 10, bottomSpacing: bottomSpacing, responsiveWidth: true});
    }

    function makeNavSticky() {
        if (isMobile()) {
            return
        }
        //@todo add stick-it, it is stikcy always now.
        $("#primary-nav-container.stick-it,.sleek-header #site-header-container").sticky({
            responsiveWidth: true,
            zIndex: 9
        });
    }

    function makeHeaderSticky() {
        if (isMobile()) {
            //$("#site-header-container").unstick();
            //$("#site-header-container").sticky({responsiveWidth: true, zIndex: 9});
            $("#sticky-search").unstick();
            $("#sticky-search").sticky({responsiveWidth: true, zIndex: 9, widthFromWrapper: true});
        }
    }

    function removeStickiesOnMobile() {
        if (isMobile()) {
            $("#sticky-sb1,#sticky-sb2,#primary-nav-container.stick-it,#site-header-container").unstick();
        }
    }


    /**
     *
     * @param callback
     * @param limit
     * @returns {Function}
     */
    function throttle(callback, limit) {
        var wait = false;                  // Initially, we're not waiting
        return function () {               // We return a throttled function
            if (!wait) {                   // If we're not waiting
                callback.call();           // Execute users function
                wait = true;               // Prevent future invocations
                setTimeout(function () {   // After a period of time
                    wait = false;          // And allow future invocations
                    callback.call();
                }, limit);
            }
        }
    }
})(jQuery);
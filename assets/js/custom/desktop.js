/**
 * Created by satish on 04/02/17.
 */
(function ($, GLOBAL) {
    'use strict';
    GLOBAL = {}
    GLOBAL.DESKTOP_WIDTH = 1160;
    GLOBAL.MOBILE_WIDTH = 768;
    GLOBAL.hasSideMenu = false
    $(document).ready(function () {
        triggerMasonry()
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
        $('.open-drawer,#menu-close').click(function (event) {
            event.preventDefault();
            event.stopPropagation();
            $('body').toggleClass('menu-open');
        })

        $(document).on('click', '#side-pane-inner .menu li.menu-item-has-children .status', function (e) {
            e.preventDefault()
            var li = $(e.target).parent()
            if (li.hasClass('expanded')) {
                li.removeClass('expanded')
            } else {
                li.addClass('expanded')
            }
        })


        $('body').on('focus', '.#search-field', function () {
            clearTimeout(GLOBAL.hideStickyTimer)
        })
        $('#site-header-container-sticky-wrapper,#primary-nav-container-sticky-wrapper').hover(function () {
            clearTimeout(GLOBAL.hideStickyTimer)
        })


    })
    $(window).load(function () {
        setSidebarHeights()
    })

    $(window).resize(function () {
        menuHandler();
        removeStickiesOnMobile();
        unsetSidebarHeights();
        //@todo why are we not calling setSidebarHeights?
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

            if($(".he-search-wrapper #search-field").val()){
                clearTimeout(GLOBAL.hideStickyTimer)
                return
            }
            $('#primary-nav-container-sticky-wrapper.is-sticky,#sticky-search-sticky-wrapper.is-sticky,.sleek-header #site-header-container-sticky-wrapper.is-sticky').css({'opacity': 0})
        }, 3000)

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
        if (window.innerWidth <= GLOBAL.MOBILE_WIDTH) {
            return true
        } else {
            return false
        }
    }

    /**
     * Set the sidebar heights dynamically so that broders and background appear
     * properly
     * @todo Apply these to woocommerce pages as well.
     */
    function setSidebarHeights() {
        if (isDesktop()) {
            $('.sb-container >.inner').height('')
            var height = document.getElementById('content').offsetHeight
            $('.sb-container >.inner').height(height)
        }
    }

    function unsetSidebarHeights() {
        if (isMobile()) {
            $('.sb-container >.inner').height('')
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
            $('.open-drawer').css('display', 'flex');
            var search = $("#mobile-search-form").clone()
            $('#side-pane-inner').append(search)
            $('#side-pane-inner').append($('#header-nav').html()).append($('#primary-nav').html()).append($('#secondary-nav').html())
            $('#side-pane-inner').append($('#nav-social-media'))
            GLOBAL.hasSideMenu = true
        }
    }

    /**
     * Remove side menu added by addSideMenu
     */
    function removeSideMenu() {
        if (GLOBAL.hasSideMenu) {
            $('#primary-nav-container,#secondary-nav-container,#header-nav-container').show()
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

        var topSpacing = $('.sticky-nav #primary .nav').outerHeight() + 20;

        $("#sticky-sb1,#sticky-sb2").sticky({
            topSpacing: topSpacing,
            bottomSpacing: bottomSpacing,
            responsiveWidth: true
        });
    }

    function makeNavSticky() {
        if (isMobile()) {
            return
        }
        //@todo add stick-it, it is stikcy always now.
        $(".sticky-nav  #primary-nav-container,.sleek-header.sticky-nav  #site-header-container").sticky({
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


    function triggerMasonry() {
        // Masonry
        if ($('body').hasClass('masonry')) {
            if (window.innerWidth > 480)
                $('#articles').masonry({
                    columnWidth: '.entry',
                    itemSelector: '.entry',
                    gutter: '.gutter-sizer',
                });
        }
    }

})(jQuery);
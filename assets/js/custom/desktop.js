/**
 * Created by satish on 04/02/17.
 */
(function ($, GLOBAL) {
    'use strict';
    GLOBAL = {}
    GLOBAL.DESKTOP_WIDTH = 1160;

    $(document).ready(function () {
        setSidebarHeights()
        menuHandler();
        makeSideBarsSticky()
        makeNavSticky()
        makeHeaderSticky()
    })
    $(window).load(function () {
        setSidebarHeights()
    })

    $( window ).resize(function() {
        menuHandler();
        removeStickiesOnMobile();
        unsetSidebarHeights();
    });


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

            if (!document.getElementById('sticky-sb') && !document.getElementById('normal-sb')) {
                $('#ns1 >.inner,#ns2 >.inner').height(height)
            }
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
        $('#primary-nav-container,#secondary-nav-container').hide()
        $('#menu').show()
        $('#side-pane-inner').append($('#primary-nav').html()).append($('#secondary-nav').html())


        $('#menu').click(function (event) {
            event.preventDefault();
            event.stopPropagation();
            $('body').toggleClass('menu-open');
        })
        $(document).on('click', '.menu-open #wrapper', function () {
            $('body').removeClass('menu-open')
        })
    }

    /**
     * Remove side menu added by addSideMenu
     */
    function removeSideMenu() {
        $('#primary-nav-container,#secondary-nav-container').show()
        $('#menu,#side-pane').hide()
    }

    /**
     *
     */
    function makeSideBarsSticky() {
        if (isMobile()) {
            return
        }
        var bottomSpacing = $('#site-footer-container').outerHeight() + $('#copyright-container').outerHeight()
        $("#sticky-sb1,#sticky-sb2").sticky({topSpacing: 10, bottomSpacing: bottomSpacing, responsiveWidth: true});
    }

    function makeNavSticky() {
        if (isMobile()) {
            return
        }
        $("#primary-nav-container.stick-it").sticky({responsiveWidth: true,zIndex:9});
    }

    function makeHeaderSticky() {
        if (isMobile()) {
            $("#site-header-container").unstick();
            $("#site-header-container").sticky({responsiveWidth: true,zIndex:9});
        }
    }

    function removeStickiesOnMobile(){
        if (isMobile()) {
            $("#sticky-sb1,#sticky-sb2,#primary-nav-container.stick-it").unstick();
        }
    }


})(jQuery);
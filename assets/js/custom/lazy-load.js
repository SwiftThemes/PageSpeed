jQuery(function ($) {

    stopInvisibleImages();



    function stopInvisibleImages() {
        $('img').each(
            function () {
                if (!$(this).visible(true)) {

                    // Skip if lazyloading is disabled
                    if ($(this).hasClass('disable-lazy-load')) {
                        return;
                    }
                    var loader = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
                    $(this).addClass('imageNotLoaded')
                    var src = $(this).attr('src')
                    var srcset = $(this).attr('srcset')
                    $(this).attr('src', loader)
                    if (srcset) {
                        $(this).attr('srcset', loader)
                    }
                    $(this).data('src', src)
                    $(this).data('srcset', srcset)
                }
            }
        )
    }

    var callLazyLoadImages = throttle(function () {
        lazyLoadImages()
    }, 50)

    function lazyLoadImages() {
        var count = 0;
        $('img.imageNotLoaded').each(
            function (el) {
                count++;
                if ($(this).visible(true)) {
                    $(this).removeClass('imageNotLoaded')
                    var src = $(this).data('src')
                    var srcset = $(this).data('srcset')
                    if (src) {
                        $(this).attr('src', src)
                    }
                    if (srcset) {
                        $(this).attr('srcset', srcset)
                    }
                }
            }
        )
        if (!count) {
            window.removeEventListener('scroll', callLazyLoadImages)
            window.removeEventListener('touchmove', callLazyLoadImages)
        }
    }

    window.addEventListener('scroll', callLazyLoadImages);
    window.addEventListener('touchmove', callLazyLoadImages);
});
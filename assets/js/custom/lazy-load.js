jQuery(function ($) {

    stopInvisibleImages();



    function stopInvisibleImages() {
        $('img').each(
            function () {
                if (!$(this).visible(true)) {

                    // Skip if lazyloading is disabled
                    if ($(this).hasClass('no-lazy-load')) {
                        return;
                    }
                    var loader = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
                    $(this).addClass('imageNotLoaded')
                    var src = $(this).attr('src')
                    $(this).attr('src', loader)
                    $(this).data('src', src)
                    var srcset = $(this).attr('srcset')
                    if (srcset) {
                        $(this).attr('srcset', loader)
                        $(this).data('srcset', srcset)
                    }
                    console.log('skipped')
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
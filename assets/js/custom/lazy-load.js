jQuery(function($) {
  stopInvisibleImages();

  function stopInvisibleImages() {
    $(".srs-slider img").each(function() {
      stopImage(this, "srsImgNotLoaded");
      $(this).addClass("no-lazy-load");
    });

    $("img").each(function() {
      if (!$(this).visible(true)) {
        stopImage(this);
      }
    });
  }

  function stopImage(img, cn) {
    // Skip if lazyloading is disabled
    if ($(img).hasClass("no-lazy-load")) {
      return;
    }

    var className = cn || "imageNotLoaded";
    var loader =
      "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7";
    $(img).addClass(className);
    var src = $(img).attr("src");
    if (src == loader) {
      return;
    }
    $(img).attr("src", loader);
    $(img).data("src", src);
    var srcset = $(img).attr("srcset");
    if (srcset) {
      $(img).attr("srcset", loader);
      $(img).data("srcset", srcset);
    }
  }

  var callLazyLoadImages = throttle(function() {
    lazyLoadImages();
  }, 50);

  function lazyLoadImages() {
    var count = 0;
    $("img.imageNotLoaded").each(function(el) {
      count++;
      if ($(this).visible(true)) {
        $(this).removeClass("imageNotLoaded");
        var src = $(this).data("src");
        var srcset = $(this).data("srcset");
        if (src) {
          $(this).attr("src", src);
        }
        if (srcset) {
          $(this).attr("srcset", srcset);
        }
      }
    });
    if (!count) {
      window.removeEventListener("scroll", callLazyLoadImages);
      window.removeEventListener("touchmove", callLazyLoadImages);
    }
  }

  window.addEventListener("scroll", callLazyLoadImages);
  window.addEventListener("touchmove", callLazyLoadImages);
});

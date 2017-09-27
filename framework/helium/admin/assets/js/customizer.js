(function ($) {

    function log(message) {
        // $("<div/>").html(message).prependTo("#log");

        $("#font_selection__").append(message);
        $("#log").attr("scrollTop", 0);
    }

    /*
    var fontTemplate = _.template('<div class="selected-font">' +
        '<div class="header"><%= family %></div><label class="cb"><select data-customize-setting-link="font" multiple>' +
        '<% _.each(variants, function(variant) { %> \n' +
        '    <option value="<%= variant %>"><%= variant %></option>\n' +
        '<% }); %>'+
        '</label>'+
        '<div class="clear"></div> </div>');
    */

    var options = _.template(
        '<% _.each(options, function(variant) { %>' +
        '    <option value="<%= variant %>"><%= variant %></option>\n' +
        '<% }); %>');

    $.ajax({
        url: "https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyDVKxwBB7u0r7p1jNtveJ-GA2EHvbGB6h4",
        success: function (res) {
            // res = JSON(res)
            var fonts = res.items
            var data = $.map(fonts, function (font) {
                return {
                    value: font.family,
                    id: font.family,
                    label: font.family,
                    font: font
                }
            })

            $(".he_font_selection").autocomplete({
                source: data,
                minLength: 0,
                select: function (event, ui) {
                    var parent = jQuery(event.target.parentNode)
                    parent.find('.weights').append(options({options: ui.item.font.variants}))
                    parent.find('.subsets').append(options({options: ui.item.font.subsets}))

                    parent.find('.all_weights').append(options({options: ui.item.font.variants}))

                    parent.find('.subsets option').each(function () {
                        console.log(this)
                        $(this).prop('selected', true);
                    })

                    //Set hidden field values
                    parent.find('.subsets').attr("data-customize-setting-link", "weights").append(options({options: ui.item.font.subsets}))
                }
            });
        }
    });


})(jQuery);

//data-customize-setting-link="home_show_excerpts"
(function ($) {


    wp.customize.controlConstructor['he_font'] = wp.customize.Control.extend({
        ready: function () {
            var control = this;
            control.container.on('change', 'input.family',
                function (e) {
                    var font = {}
                    var fontObject = JSON.parse($(this).attr('data-fontOb'))
                    var parent = $(e.target.parentNode)

                    //@todo see if updating a variable does away with this.
                    parent.find('.weights').html(options({options: fontObject.variants}))
                    parent.find('.subsets').html(options({options: fontObject.subsets}))

                    font['stack'] = '"' + fontObject['family'] + '", ' + fontObject['category']
                    font['fontObject'] = fontObject

                    control.setting.set(font)

                }
            );

            control.container.on('change', 'select.weights',
                function (e) {
                    var font = control.setting()
                    font['weights'] = $(this).val()
                    control.setting.set(font)

                }
            );
            control.container.on('change', 'select.subsets',
                function (e) {
                    var font = control.setting()
                    font['subsets'] = $(this).val()
                    control.setting.set(font)

                }
            );
        }
    });


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
        // url: "https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyDVKxwBB7u0r7p1jNtveJ-GA2EHvbGB6h4",
        url: "http://localhost/gfonts.json",
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
                    $(this).attr('data-fontOb', JSON.stringify(ui.item.font))
                    var parent = jQuery(event.target.parentNode)
                    // parent.find('.weights').html(options({options: ui.item.font.variants}))
                    // parent.find('.subsets').html(options({options: ui.item.font.subsets}))
                }
            });
        }
    });


})(jQuery);

//data-customize-setting-link="home_show_excerpts"
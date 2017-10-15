(function ($) {


    wp.customize.controlConstructor['he_font'] = wp.customize.Control.extend({
        ready: function () {
            var control = this;
            control.container.on('change', 'input.family',
                function (e) {
                    var parent = $(e.target.parentNode)
                    if (($(this).val())) {
                        var font = {}
                        var fontObject = JSON.parse($(this).attr('data-fontOb'))


                        //@todo see if updating a variable does away with this.
                        parent.find('.weights').html(options({options: fontObject.variants}))
                        parent.find('.subsets').html(options({options: fontObject.subsets}))

                        font['stack'] = '"' + fontObject['family'] + '", ' + fontObject['category']
                        font['fontObject'] = fontObject
                        control.setting.set(font)
                    } else {
                        parent.find('.weights').html(options({options: []}))
                        parent.find('.subsets').html(options({options: []}))
                        control.setting.set('')
                    }
                }
            );

            control.container.on('change', 'select.weights',
                function (e) {
                    var setting = _.extend({},control.setting())
                    setting['weights'] = $(this).val()
                    control.setting.set(setting)
                }
            );
            control.container.on('change', 'select.subsets',
                function (e) {
                    var setting = _.extend({},control.setting())
                    setting['subsets'] = $(this).val()
                    control.setting.set(setting)
                }
            );
        }
    });


    wp.customize.controlConstructor['he_typography'] = wp.customize.Control.extend({
        ready: function () {
            var control = this;
            control.container.on('change', 'select.stack',
                function (e) {
                    var setting = _.extend({},control.setting())
                    setting['stack'] = $(this).val()
                    control.setting.set(setting)
                }
            );

            control.container.on('change', 'select.size',
                function (e) {
                    var setting = _.extend({},control.setting())
                    setting['size'] = $(this).val()
                    control.setting.set(setting)
                }
            );
            control.container.on('change', 'input.lineHeight',
                function (e) {
                    var setting = _.extend({},control.setting())
                    setting['line_height'] = $(this).val()
                    control.setting.set(setting)
                }
            );
            control.container.on('change', 'select.weight',
                function (e) {
                    var setting = _.extend({},control.setting())
                    setting['weight'] = $(this).val()
                    control.setting.set(setting)
                }
            );
        }
    });


    var options = _.template(
        '<% _.each(options, function(variant) { %>' +
        '    <option value="<%= variant %>"><%= variant %></option>\n' +
        '<% }); %>');

    $.ajax({
        // url: "https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyDVKxwBB7u0r7p1jNtveJ-GA2EHvbGB6h4",
        url: "http://localhost/gfonts.json",
        success: function (res) {
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
                }
            });
        }
    });

    function makeid() {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for (var i = 0; i < 5; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));

        return text;
    }

})(jQuery);

//data-customize-setting-link="home_show_excerpts"
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
                        font['stack'] = "'" + fontObject['family'] + "', " + fontObject['category']
                        font['fontObject'] = control.params.value.fontObject = fontObject
                        control.setting.set(font)
                    } else {
                        control.params.value.fontObject = {family: '', weight: [], subsets: []}
                        control.setting.set('')
                    }

                    control.renderContent()


                    var stack = {}
                    stack[font['stack']] = font['stack']

                    wp.customize.control('primary_font')['params']['stacks'][font['stack']] = font['stack']

                    // wp.customize.control( 'primary_font' )['params']['stacks'].push(font['stack'])

                    wp.customize.control('primary_font').renderContent();

                    wp.customize.control( 'secondary_font' )['params']['choices'][font['stack']] = font['stack']
                    wp.customize.control( 'secondary_font' ).renderContent();
                }
            );

            control.container.on('change', 'select.weights',
                function (e) {
                    var setting = _.extend({}, control.setting())
                    setting['weights'] = $(this).val()
                    control.setting.set(setting)
                }
            );
            control.container.on('change', 'select.subsets',
                function (e) {
                    var setting = _.extend({}, control.setting())
                    setting['subsets'] = $(this).val()
                    control.setting.set(setting)
                }
            );
        }
    });



    wp.customize.controlConstructor['he_select'] = wp.customize.Control.extend( {
        ready: function() {
            var control = this;

            this.container.on( 'change', 'select',
                function() {
                    control.setting.set( jQuery( this ).val() );
                }
            );
        }
    } );

    wp.customize.controlConstructor['he_typography'] = wp.customize.Control.extend({
        ready: function () {
            var control = this;
            control.container.on('change', 'select.stack',
                function (e) {
                    var setting = _.extend({}, control.setting())
                    setting['stack'] = $(this).val()
                    control.setting.set(setting)
                }
            );

            control.container.on('change', 'select.size',
                function (e) {
                    var setting = _.extend({}, control.setting())
                    setting['size'] = $(this).val()
                    control.setting.set(setting)
                }
            );
            control.container.on('change', 'input.lineHeight',
                function (e) {
                    var setting = _.extend({}, control.setting())
                    setting['line_height'] = $(this).val()
                    control.setting.set(setting)
                }
            );
            control.container.on('change', 'select.weight',
                function (e) {
                    var setting = _.extend({}, control.setting())
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
        url: "https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyDVKxwBB7u0r7p1jNtveJ-GA2EHvbGB6h4",
        // url: "http://localhost/gfonts.json",
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


            $(document).on('keydown.autocomplete', '.he_font_selection', function () {
                $(this).autocomplete({
                    source: data,
                    minLength: 0,
                    select: function (event, ui) {
                        $(this).attr('data-fontOb', JSON.stringify(ui.item.font))
                    }
                });
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
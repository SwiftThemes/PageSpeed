wp.customize.bind('ready', function () {

    wp.customize.control('use_masonry', function (control) {
        var setting = wp.customize('separate_containers');
        control.active.set('large' === setting.get());
        setting.bind(function (value) {
            control.active.set(value);
        });
    });

    wp.customize.control('masonry_column_count', function (control) {
        var setting = wp.customize('use_masonry');
        var setting2 = wp.customize('separate_containers');

        control.active.set(setting.get() && setting2.get());
        setting.bind(function (value) {
            control.active.set(value);
        });
        setting2.bind(function (value) {
            control.active.set(value);
        });
    });

    //Not implementing the same for home page slider since it has a dedicated UI.
});
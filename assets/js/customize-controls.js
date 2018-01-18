/**
 * Created by satish on 17/02/17.
 */
wp.customize.controlConstructor['image_size'] = wp.customize.Control.extend( {
    ready: function() {
        var control = this;
        this.container.on( 'change', 'input',
            function() {
                control.setting.set( jQuery( this ).val() );
            }
        );
    }
} );
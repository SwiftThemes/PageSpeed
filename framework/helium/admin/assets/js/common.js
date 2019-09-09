/**
 * Created by satish on 13/03/17.
 */
(function ($, GLOBAL) {
	'use strict';
	$( document ).ready(
		function () {
			$( '#close-he-license' ).click(
				function () {
					var data = {
						'action': 'helium_dismiss_renew_nag',
					};

					$( this ).parent().hide()
					jQuery.post(
						ajaxurl,
						data,
						function (response) {

						}
					);
				}
			)
		}
	)
})( jQuery )

/**
 * Created by satish on 13/03/17.
 */
(function ($, GLOBAL) {
    'use strict';
    $(document).ready(function () {
        clearSassCache()

        function clearSassCache() {
            $('#clear-sass').click(function (e) {
                $(this).text('Clearing SASS Cache')
                var data = {
                    'action': 'ngbr_clear_sass_cache',
                };

                jQuery.post(ajaxurl, data, function (response) {
                    $('#clear-sass').text('Clear SASS Cache')
                    if(response){
                        $('#clear_cache_results').text('Cleared Cache')
                    }else{
                        $('#clear_cache_results').text('Error clearing cache :-(')
                    }
                });

            })
        }

    })
})(jQuery)
/**
 * Created by satish on 13/03/17.
 */
(function ($, GLOBAL) {
    'use strict';
    $(document).ready(function () {
        clearSassCache()

        function clearSassCache() {
            $('#clear-sass').click(function (e) {
                e.preventDefault();
                e.stopPropagation();

                var button = $(this)
                button.text('Clearing Transients').prop('disabled', true);
                var data = {
                    'action': 'helium_clear_sass_cache',
                };

                jQuery.post(ajaxurl, data, function (response) {
                    $('#clear-sass').text('Clear Transients').prop('disabled', false)
                    if (response) {
                        $('#clear_cache_results').text('Cleared transients')
                    } else {
                        $('#clear_cache_results').text('Error clearing transients :-(')
                    }
                });

            })
        }

        updateFileSystemStatus()

        function updateFileSystemStatus() {
            $('#update-write-status').click(function (e) {
                e.preventDefault();
                e.stopPropagation();

                var button = $(this)
                button.text('Updating File System Status').prop('disabled', true);
                var data = {
                    'action': 'helium_update_file_system_status',
                };

                jQuery.post(ajaxurl, data, function (response) {
                    $('#update-write-status').text('Update File System Status').prop('disabled', false)
                    if (response) {
                        $('#clear_write_status_results').text(response)
                    } else {
                        $('#clear_write_status_results').text('Error checking status :-(')
                    }
                });

            })
        }


        var $form = $('#helium_theme_options'),
            originalThemeOptions = $form.serialize()

        $('#helium_theme_options :input').on('change input', function () {
            if ($form.serialize() !== originalThemeOptions) {
                $('#options-saved').hide()
                $('#options-save-error').hide()
                $('#options-changed').show()
            } else {
                $('#options-changed').hide()
            }
        });


    })
})(jQuery)
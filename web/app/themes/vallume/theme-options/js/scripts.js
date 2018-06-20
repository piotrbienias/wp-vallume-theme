jQuery(document).ready(function($) {

    $('.upload_image_button').click(function(e) {
        e.preventDefault();

        var imageUploader = wp.media({
            title: 'Select image',
            button: {
                text: 'Upload'
            },
            multiple: false
        })
        .on('select', function() {
            var attachment = imageUploader.state().get('selection').first().toJSON();
            $('#home_page_background_img').attr('src', attachment.url);
            $('input[name="home_page_background_img"]').val(attachment.url);
        })
        .open();
    });

});
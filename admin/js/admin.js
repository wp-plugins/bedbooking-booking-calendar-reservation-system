console.log('admin js bb');
//$ = jQuery.noConflict();






jQuery('document').ready(function () {

    var inProgress = false;
    jQuery('#bedbooking-saveall').on('click', function () {
        if (inProgress)
            return;
        inProgress = true;
        jQuery('.error').addClass('hidden');
        jQuery('.data-save').addClass('hidden');

        jQuery.ajax({
            url: "https://panel.bed-booking.com/api/getcalendaridentifierbycredentials",
//            url: "http://dev.bedbooking.pl//api/getcalendaridentifierbycredentials",
            jsonp: "callback",
            dataType: "jsonp",
            type: 'POST',
            data: {
                username: jQuery('#bedbooking-username').val(),
                password: jQuery('#bedbooking-password').val(),
                format: "json"
            },
            // Work with the response
            success: function (response) {
                console.log(response); // server response
                inProgress = false;
                if (response.credentials == 'ok') {
                    saveBBPluginData(response);
                    jQuery('.data-save').removeClass('hidden');
                    jQuery('.bb-status-indicator').attr('src', imageSucces);
                    jQuery('.bedbooking-complete').removeClass('hidden');
                } else {
                    jQuery('.credentials-error').removeClass('hidden');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                inProgress = false;
            }
        });
    });


    jQuery('#bb-plugin-remove').on('click', function (e) {
        e.preventDefault();
        if (inProgress)
            return;
        inProgress = true;
        var d = {
            action: 'bedbooking_ajax_save_action_callback',
            data: {
                remove: true
            }
        };
        jQuery.post(ajaxurl, d, function (response) {
            inProgress = false;
            location.reload();
        }, 'json');

    });

});


function saveBBPluginData(data) {
    var d = {
        action: 'bedbooking_ajax_save_action_callback',
        data: {
            username: jQuery('#bedbooking-username').val(),
            password: jQuery('#bedbooking-password').val(),
            calendarcode: data.code,
            userId: data.userId,
            objectId: data.objectId,
        }
    };
    jQuery.post(ajaxurl, d, function (response) {
        console.log(response);

    }, 'json');
}


jQuery(document).ready(function ()
{

    jQuery('.wp-bbregister').click(function () {
        jQuery('.wp-bbregister').removeClass('wpbbunactive');
        jQuery('.wp-bbregister').addClass('wpbbactive');
        jQuery('.wp-bblogin').removeClass('wpbbactive');
        jQuery('.wp-bblogin').addClass('wpbbunactive');
        jQuery('#widgets-right').delay(10).hide();
        jQuery('#widgets-left').delay(10).fadeIn('slow');
    });

    jQuery('.wp-bblogin').click(function () {
        jQuery('.wp-bbregister').addClass('wpbbunactive');
        jQuery('.wp-bbregister').removeClass('wpbbactive');
        jQuery('.wp-bblogin').addClass('wpbbactive');
        jQuery('.wp-bblogin').removeClass('wpbbunactive');
        jQuery('#widgets-left').delay(10).hide();
        jQuery('#widgets-right').delay(10).fadeIn('slow');
    });


});





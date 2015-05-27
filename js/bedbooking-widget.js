//jQuery('document').ready(function () {
//    bedbooking_update();
//    jQuery('document').on('change', '#widget-bedbooking_widget-2-bb-widget-type', function () {
//        console.log(jQuery(this).val())
//        bedbooking_selected = jQuery(this).val();
//    });
//
//    jQuery('document').on('change', '#widget-bedbooking_widget-2-bb-widget-language', function () {
//        bedbooking_selectedLang = jQuery(this).val();
//    });
//});

function bedbooking_update() {
    jQuery.ajax({
        url: "https://panel.bed-booking.com/api/getwserwidgetoptions",
        jsonp: "callback",
        dataType: "jsonp",
        type: 'POST',
        data: {
            username: bedbooking_username,
            password: bedbooking_password,
            format: "json"
        },
        // Work with the response
        success: function (response) {
            var options = '';
            jQuery.each(response['rooms'], function (i, v) {
                var s = v['roomId'] == bedbooking_selected ? 'selected="selected"' : '';

                options += '<option ' + s + ' value="' + v['roomId'] + '">' + v['name'] + '</option>';
            });
            jQuery('.bedbooking-widget-type-select').html(options);
            jQuery('.bedbooking-language').val(bedbooking_selectedLang);
        },
        error: function (jqXHR, textStatus, errorThrown) {
        }
    });
}
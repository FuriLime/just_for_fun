$("#add_dicription").click(function () {
    $('#descprip').attr('style', 'display:block');
    $('#add_dicription').attr('style', 'display:none');
    $('#hide_dicription').attr('style', 'display:block');
});

$("#hide_dicription").click(function () {
    $('#descprip').attr('style', 'display:none');
    $('#add_dicription').attr('style', 'display:block');
    $('#hide_dicription').attr('style', 'display:none');
});

$('#time_change').click(function(){
    $('#time_zone_change').attr('style', 'display:block');
    $('#end_time_event').attr('style', 'display:block');
    $('#change_time_zone').attr('style', 'display:none');
    $('.select2-container--default').attr('style', 'width:70%');

});

window.onload=function(){
    var autocomplete = new google.maps.places.Autocomplete(document.getElementById('location'), {
    });
}//]]>
$('#reset_loc').click(function(){
    $('.locale').attr('style', 'display:block');
    $('.fields_map').attr('style', 'display:none');
    $('#location').val('');

})

// Get timezone of the place
// 3 steps: get entered place, find it`s location (coordinates), find its timezone
$('#location').change(function () {
    $('.locale').attr('style', 'display:none');
    $('.fields_map').attr('style', 'display:block');
    setTimeout(function get_timezone() {
        var map;
        var service;
        var infowindow;

        function initialize2() {
            map = new google.maps.Map(document.getElementById('map'));
            var request = {
                query: $('#location').val()
            };
            service = new google.maps.places.PlacesService(map);
            service.textSearch(request, callback);
        }

        function callback(results, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
                for (var i = 0; i < results.length; i++) {
                    var place = results[i];
                    break;
                }
                var locale = ($('#location').val());
                var splits = '';
                var sity = '';
                var street = '';
                var state = '';
                var country = '';
                var num_house = '';

                if (results[0]) {
                    locale = results[0].formatted_address;
                    splits = locale.split(',');
                    console.log(locale);
//
                    if (splits.length == 2) {
                        sity = splits[0].replace(/(^\s*)|(\s*)$/g, '');
                        $('#city').val(sity);
                        country = splits[1];
                        $('#country').val(country);
                        $('#street').attr('style', 'display:none');
                        $('#state').attr('style', 'display:none');
                        $('#city').attr('style', 'display:block');
                        $('#country').attr('style', 'display:block');
                    }

                    if (splits.length == 3) {
                        street = splits[0].replace(/(^\s*)|(\s*)$/g, '');
                        $('#street').val(num_house + ' ' + street);
                        sity = splits[1].replace(/(^\s*)|(\s*)$/g, '');
                        $('#city').val(sity);
                        country = splits[2];
                        $('#country').val(country);
                        $('#state').attr('style', 'display:none');
                        $('#city').attr('style', 'display:block');
                        $('#street').attr('style', 'display:block');
                        $('#country').attr('style', 'display:block');
                    }

                    if (splits.length >= 4) {

                        if($.isNumeric(splits[1])){
                            street = splits[0] + ' ' +splits[1].replace(/(^\s*)|(\s*)$/g, '');
                            $('#street').val(street);

//                                street = splits[1].replace(/(^\s*)|(\s*)$/g, '');
                            sity = splits[2].replace(/(^\s*)|(\s*)$/g, '');
                            $('#city').val(sity);

                            state = splits[3].replace(/(^\s*)|(\s*)$/g, '');
                            $('#state').val(state);

                            country = splits[4];
                            $('#country').val(country);
                        }else{
                            street = splits[0].replace(/(^\s*)|(\s*)$/g, '');
                            $('#street').val(street);
                            sity = splits[1].replace(/(^\s*)|(\s*)$/g, '');
                            $('#city').val(sity);

                            state = splits[2].replace(/(^\s*)|(\s*)$/g, '');
                            $('#state').val(state);

                            country = splits[3];
                            $('#country').val(country);
                        }



                        $('#country').attr('style', 'display:block');
                        $('#state').attr('style', 'display:block');
                        $('#city').attr('style', 'display:block');
                        $('#street').attr('style', 'display:block');

                    }
                }

                var place_id = place["place_id"];
                location_lat = place["geometry"]["location"].lat();
                location_lng = place["geometry"]["location"].lng();

                var pyrmont = new google.maps.LatLng(location_lat, location_lng);
                map = new google.maps.Map(document.getElementById('map'), {
                    center: pyrmont,
                    zoom: 15
                });
                var request = {
                    query: $('#location').val()
                };
                var marker = new google.maps.Marker({
                    position: pyrmont,
                    map: map
                });
                service = new google.maps.places.PlacesService(map);
            }
        }

        initialize2();
    }, 200);
});

$( document ).ready(function() {
    if($('#location').val()) {
//            $('#location').change(function () {
        $('.locale').attr('style', 'display:none');
        $('.fields_map').attr('style', 'display:block');
        setTimeout(function get_timezone() {
            var map;
            var service;
            var infowindow;

            function initialize2() {
                map = new google.maps.Map(document.getElementById('map'));
                var request = {
                    query: $('#location').val()
                };
                service = new google.maps.places.PlacesService(map);
                service.textSearch(request, callback);
            }

            function callback(results, status) {
                if (status == google.maps.places.PlacesServiceStatus.OK) {
                    for (var i = 0; i < results.length; i++) {
                        var place = results[i];
                        break;
                    }
                    var locale = ($('#location').val());
                    var splits = '';
                    var sity = '';
                    var street = '';
                    var state = '';
                    var country = '';
                    var num_house = '';

                    if (results[0]) {
                        locale = results[0].formatted_address;
                        splits = locale.split(',');
                        console.log(splits);
//
                        if (splits.length == 2) {
                            sity = splits[0].replace(/(^\s*)|(\s*)$/g, '');
                            $('#street').val(sity);
                            country = splits[1];
                            $('#state').val(country);
                            $('#country').attr('style', 'display:none');
                            $('#state').attr('style', 'display:none');
                        }

                        if (splits.length == 3) {
                            street = splits[0].replace(/(^\s*)|(\s*)$/g, '');
                            $('#street').val(num_house + ' ' + street);
                            sity = splits[1].replace(/(^\s*)|(\s*)$/g, '');
                            $('#city').val(sity);
                            country = splits[2];
                            $('#country').val(country);
                            $('#state').attr('style', 'display:none');
                            $('#city').attr('style', 'display:block');
                            $('#street').attr('style', 'display:block');
                            $('#country').attr('style', 'display:block');
                        }

                        if (splits.length >= 4) {
                            if($.isNumeric(splits[1])){
                                street = splits[0] + ' ' +splits[1].replace(/(^\s*)|(\s*)$/g, '');
                                $('#street').val(street);

//                                street = splits[1].replace(/(^\s*)|(\s*)$/g, '');
                                sity = splits[2].replace(/(^\s*)|(\s*)$/g, '');
                                $('#city').val(sity);

                                state = splits[3].replace(/(^\s*)|(\s*)$/g, '');
                                $('#state').val(state);

                                country = splits[4];
                                $('#country').val(country);
                            }else{
                                street = splits[0].replace(/(^\s*)|(\s*)$/g, '');
                                $('#street').val(street);
                                sity = splits[1].replace(/(^\s*)|(\s*)$/g, '');
                                $('#city').val(sity);

                                state = splits[2].replace(/(^\s*)|(\s*)$/g, '');
                                $('#state').val(state);

                                country = splits[3];
                                $('#country').val(country);
                            };

                            $('#country').attr('style', 'display:block');
                            $('#state').attr('style', 'display:block');
                            $('#city').attr('style', 'display:block');
                            $('#street').attr('style', 'display:block');

                        }
                    }

                    var place_id = place["place_id"];
                    location_lat = place["geometry"]["location"].lat();
                    location_lng = place["geometry"]["location"].lng();

                    var pyrmont = new google.maps.LatLng(location_lat, location_lng);
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: pyrmont,
                        zoom: 15
                    });
                    var request = {
                        query: $('#location').val()
                    };
                    var marker = new google.maps.Marker({
                        position: pyrmont,
                        map: map
                    });
                    service = new google.maps.places.PlacesService(map);
                }
            }

            initialize2();
        }, 200);
    }
});
$('#timezone').select2();
//	$("#datestart").on("dp.change", function (e) {
//		$('#datefinish').data("DateTimePicker").minDate(e.date);
//	});
//	// run second calendar after closing of first
//	$("#datestart").on("dp.hide", function (e) {
//		$('#datefinish .glyphicon-calendar').click();
//	});

$("#datestart").on("dp.change", function (e) {
    $('#datefinish').data("DateTimePicker").minDate(e.date);
});
$(function(){
    $('input#title').maxlength({
    //alwaysShow: true,
    threshold: 25,
    warningClass: "label label-success",
    limitReachedClass: "label label-danger",
    preText: '@lang('frontend.you_typed') ',
    separator: ' @lang('frontend.chars_out_of') ',
    postText: ' @lang('frontend.chars')',
    validate: true
    });
    $('textarea#description').maxlength({
        threshold: 500,
        warningClass: "label label-success",
        limitReachedClass: "label label-danger",
        preText: '@lang('frontend.you_typed') ',
        separator: ' @lang('frontend.chars_out_of') ',
        postText: ' @lang('frontend.chars')',
        validate: true
    });
    $('#url, #location').maxlength({
        threshold: 60,
        warningClass: "label label-success",
        limitReachedClass: "label label-danger",
        preText: '@lang('frontend.you_typed') ',
        separator: ' @lang('frontend.chars_out_of') ',
        postText: ' @lang('frontend.chars')',
        validate: true
    });
});
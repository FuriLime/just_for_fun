
        function wheretoplace(){
            var width = window.innerWidth;
            if (width <= 900) {
                return 'left';
            } else {
                return 'right';
            }
        }

        $("#add_dicription").click(function () {
            $('#descprip').attr('style', 'display:block');
            $('#add_dicription').attr('style', 'display:none');
            $('#hide_dicription').attr('style', 'display:inline-block');
        });

        $("#hide_dicription").click(function () {
            $('#descprip').attr('style', 'display:none');
            $('#add_dicription').attr('style', 'display:inline-block');
            $('#hide_dicription').attr('style', 'display:none');
        });

        $("#add_dicription").on('mouseenter', function () {
            $('#descprip').attr('style', 'display:block');
            $('#add_dicription').attr('style', 'display:none');
            $('#hide_dicription').attr('style', 'display:inline-block');
        });

        $("#hide_dicription").on('mouseenter', function () {
            $('#descprip').attr('style', 'display:none');
            $('#add_dicription').attr('style', 'display:inline-block');
            $('#hide_dicription').attr('style', 'display:none');
        });

        $('#time_change').click(function(){
            $('#time_zone_change').attr('style', 'display:block');
            $('#end_time_event').attr('style', 'display:block');
            $('#change_time_zone').attr('style', 'display:none');
        });
        $('#time_change').on('mouseenter',function(){
            $('#time_zone_change').attr('style', 'display:block');
            $('#end_time_event').attr('style', 'display:block');
            $('#change_time_zone').attr('style', 'display:none');
        });

        window.onload=function(){
            var autocomplete = new google.maps.places.Autocomplete(document.getElementById('location'), {
            });
        }//]]>
        $('#reset_loc').click(function(){
            $('.locale').attr('style', 'display:block');
            $('#location').val('');
            $('#street').attr('value', '');
            $('#street').attr('style', 'display: inline-block');
            $('#state').attr('value', '');
            $('#state').attr('style', 'display: inline-block');
            $('#city').attr('value', '');
            $('#city').attr('style', 'display: inline-block');
            $('#country').attr('value', '');
            $('#country').attr('style', 'display: inline-block');
            $('.fields_map').attr('style', 'display:none');
        });


        // Get timezone of the place
        // 3 steps: get entered place, find it`s location (coordinates), find its timezone
        $('#location').change(function () {
            $('.publish').focus();
            $('.draft').focus();
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

                        var place_id = place["place_id"];
                        location_lat = place["geometry"]["location"].lat();
                        location_lng = place["geometry"]["location"].lng();
                        $('#lat').val(location_lat);
                        $('#lng').val(location_lng);
                        var geocoder = new google.maps.Geocoder();
                        var address = document.getElementById('location').value;
                        geocoder.geocode({'address': address}, function(results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                if (results[0]) {
                                    var address_components = results[0].address_components;
                                    var components={};
                                    jQuery.each(address_components, function(k,v1) {
                                        jQuery.each(v1.types, function(k2, v2){
                                            components[v2]=v1.long_name
                                        });
                                    })
                                    console.log(components.street_number);
                                    console.log(components.route);
                                    console.log(components.locality);
                                    console.log(components.administrative_area_level_1);
                                    console.log(components.country);
                                    if(components.street_number != undefined && components.route!= undefined
                                            && components.locality!=undefined && components.administrative_area_level_1 !=undefined
                                            && components.country!=undefined ){
                                        $('#street').attr('value', components.route + ' ' + components.street_number);
                                        $('#city').attr('value', components.locality);
                                        $('#state').attr('value', components.administrative_area_level_1);
                                        $('#country').attr('value', components.country);
                                    }else if(components.street_number == undefined && components.route!= undefined
                                            && components.locality!=undefined && components.administrative_area_level_1 !=undefined
                                            && components.country!=undefined ){
                                        $('#street').attr('value', components.route);
                                        $('#city').attr('value', components.locality);
                                        $('#state').attr('value', components.administrative_area_level_1);
                                        $('#country').attr('value', components.country);

                                    }else if(components.street_number == undefined && components.route!= undefined
                                            && components.locality!=undefined && components.administrative_area_level_1 ==undefined
                                            && components.country!=undefined ){
                                        $('#street').attr('value', components.route);
                                        $('#city').attr('value', components.locality);
                                        $('#state').attr('style', 'display:none');
                                        $('#country').attr('value', components.country);

                                    }
                                    else if(components.street_number == undefined && components.route == undefined
                                            && components.locality!=undefined && components.administrative_area_level_1 !=undefined
                                            && components.country!=undefined ){
                                        $('#street').attr('style', 'display:none');
                                        $('#city').attr('value', components.locality);
                                        $('#state').attr('value', components.administrative_area_level_1);
                                        $('#country').attr('value', components.country);
                                    }
                                    else if(components.street_number == undefined && components.route== undefined
                                            && components.locality==undefined && components.administrative_area_level_1 !=undefined
                                            && components.country!=undefined ){
                                        $('#street').attr('style', 'display:none');
                                        $('#city').attr('style', 'display:none');
                                        $('#state').attr('value', components.administrative_area_level_1);
                                        $('#country').attr('value', components.country);
                                    }
                                    else if(components.street_number == undefined && components.route== undefined
                                            && components.locality==undefined && components.administrative_area_level_1 ==undefined
                                            && components.country!=undefined ){
                                        $('#street').attr('style', 'display:none');
                                        $('#city').attr('style', 'display:none');
                                        $('#state').attr('style', 'display:none');
                                        $('#country').attr('value', components.country);
                                    }
                                    else if(components.street_number == undefined && components.route!= undefined
                                            && components.locality==undefined && components.administrative_area_level_1 !=undefined
                                            && components.country!=undefined ) {
                                        $('#street').attr('value', components.route);
                                        $('#city').attr('style', 'display:none');
                                        $('#state').attr('value', components.administrative_area_level_1);
                                        $('#country').attr('value', components.country);
                                    }
                                }
                                else{

                                    console.log('sdsdsdsd');
                                }
                            }
                        });


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
                            var place_id = place["place_id"];
                            location_lat = place["geometry"]["location"].lat();
                            location_lng = place["geometry"]["location"].lng();
                            $('#lat').val(location_lat);
                            $('#lng').val(location_lng);
                            var geocoder = new google.maps.Geocoder();
                            var address = document.getElementById('location').value;
                            geocoder.geocode({'address': address}, function(results, status) {
                                if (status == google.maps.GeocoderStatus.OK) {
                                    if (results[0]) {
                                        var address_components = results[0].address_components;
                                        var components={};
                                        jQuery.each(address_components, function(k,v1) {
                                            jQuery.each(v1.types, function(k2, v2){
                                                components[v2]=v1.long_name
                                            });
                                        })
                                        console.log(components.route);
                                        console.log(components.street_number);
                                        console.log(components.locality);
                                        console.log(components.administrative_area_level_1);
                                        console.log(components.country);
                                        if(components.street_number != undefined && components.route!= undefined
                                                && components.locality!=undefined && components.administrative_area_level_1 !=undefined
                                                && components.country!=undefined ){
                                            $('#street').attr('value', components.route + ' ' + components.street_number);
                                            $('#city').attr('value', components.locality);
                                            $('#state').attr('value', components.administrative_area_level_1);
                                            $('#country').attr('value', components.country);
                                        }else if(components.street_number == undefined && components.route!= undefined
                                                && components.locality!=undefined && components.administrative_area_level_1 !=undefined
                                                && components.country!=undefined ){
                                            $('#street').attr('value', components.route);
                                            $('#city').attr('value', components.locality);
                                            $('#state').attr('value', components.administrative_area_level_1);
                                            $('#country').attr('value', components.country);

                                        }else if(components.street_number == undefined && components.route == undefined
                                                && components.locality!=undefined && components.administrative_area_level_1 !=undefined
                                                && components.country!=undefined ){
                                            $('#city').attr('value', components.locality);
                                            $('#state').attr('value', components.administrative_area_level_1);
                                            $('#country').attr('value', components.country);
                                        }
                                        else if(components.street_number == undefined && components.route== undefined
                                                && components.locality==undefined && components.administrative_area_level_1 !=undefined
                                                && components.country!=undefined ){
                                            $('#street').attr('style', 'display:none');
                                            $('#city').attr('style', 'display:none');
                                            $('#state').attr('value', components.administrative_area_level_1);
                                            $('#country').attr('value', components.country);
                                        }
                                        else if(components.street_number == undefined && components.route== undefined
                                                && components.locality==undefined && components.administrative_area_level_1 ==undefined
                                                && components.country!=undefined ) {
                                            $('#street').attr('style', 'display:none');
                                            $('#city').attr('style', 'display:none');
                                            $('#state').attr('style', 'display:none');
                                            $('#country').attr('value', components.country);
                                        }
                                        else if(components.street_number == undefined && components.route!= undefined
                                                && components.locality==undefined && components.administrative_area_level_1 !=undefined
                                                && components.country!=undefined ) {
                                            $('#street').attr('value', components.route);
                                            $('#city').attr('style', 'display:none');
                                            $('#state').attr('value', components.state);
                                            $('#country').attr('value', components.country);
                                        }
                                        else{
                                            alert('nothing');
                                        }
                                    }
                                    else{
                                        alert('sdsdsdsd');
                                    }
                                }else{
                                    alert('sdsdsdsd');
                                }
                            });

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
                        else {
                            alert();
                        }
                    }

                    initialize2();
                }, 200);
            }
        });

        $('#timezone').select2();

        $("#datestart").on("dp.change", function (e) {
            $('#datefinish').data("DateTimePicker").minDate(e.date);
        });

        $('input#title').maxlength({
            //alwaysShow: true,
            threshold: 25,
            warningClass: "label label-success",
            limitReachedClass: "label label-danger",
            {{--preText: '@lang('frontend.you_typed') ',--}}
            separator: '/',
            {{--postText: ' @lang('frontend.chars')',--}}
            validate: true,
            placement: "bottom-right-inside"
        });
        $('textarea#description').maxlength({
            threshold: 500,
            warningClass: "label label-success",
            limitReachedClass: "label label-danger",
            {{--preText: '@lang('frontend.you_typed') ',--}}
            separator: '/',
            {{--postText: ' @lang('frontend.chars')',--}}
            validate: true,
            placement: "bottom-right-inside"
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
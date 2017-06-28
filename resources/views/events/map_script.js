$(document).ready(function(){
            var geocoder;
            var map;
            var address = $('#address').html();
            function initialize() {
                geocoder = new google.maps.Geocoder();
                var latlng = new google.maps.LatLng(-34.397, 150.644);
                var myOptions = {
                    zoom: 12,
                    center: latlng,
                    mapTypeControl: true,
                    mapTypeControlOptions: {
                        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
                    },
                    navigationControl: true,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                if (geocoder) {
                    geocoder.geocode({
                        'address': address
                    }, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                                map.setCenter(results[0].geometry.location);

                                var infowindow = new google.maps.InfoWindow({
                                    content: '<b>' + address + '</b>',
                                    size: new google.maps.Size(750, 400)
                                });

                                var marker = new google.maps.Marker({
                                    position: results[0].geometry.location,
                                    map: map,
                                    title: address
                                });
                                google.maps.event.addListener(marker, 'click', function() {
                                    infowindow.open(map, marker);
                                });
                                // MAP has a big problem: it won`t work when it`s hidden. Need some fix
                                // when map is ready
                                $('#hidden_address').appendTo( $('#address_wr') ).css('position', 'static');

                            } else {
                                console.log("No results found");
                            }
                        } else {
                            console.log("Geocode was not successful for the following reason: " + status);
                        }
                    });
                }
            }
            google.maps.event.addDomListener(window, 'load', initialize);
            //initialize();
      

        $('#social_but').click(function(){
            $('#social_but').addClass('btn-primary');
            $('#embed_but').removeClass('btn-primary');
            $('#email_but').removeClass('btn-primary');
        });
        $('#embed_but').click(function(){
            $('#embed_but').addClass('btn-primary');
            $('#social_but').removeClass('btn-primary');
            $('#email_but').removeClass('btn-primary');
        });
        $('#email_but').click(function(){
            $('#social_but').removeClass('btn-primary');
            $('#embed_but').removeClass('btn-primary');
            $('#email_but').addClass('btn-primary');
        });


        $('#add-to-calendar-btn').daterangepicker({
                    ranges: {
                        'Google': [moment(), moment()],
                        'Yahoo': [moment().subtract('days', 1), moment().subtract('days', 1)],
                        'Microsoft': [moment().subtract('days', 2), moment().subtract('days', 2)],
                        'iCal': [moment().subtract('days', 2), moment().subtract('days', 2)],
                        'Outlook': [moment().subtract('days', 2), moment().subtract('days', 2)],
                    },
                    startDate: moment().subtract('days', 29),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
        );

        $('#see-details-btn').click(function(){
            $('#events_details').slideToggle();
            $('#see-details-btn .toggle').toggle();
        });

        $('.daterangepicker li').click(function() {
            $('#add-to-calendar-btn .toggle').show();
            $.ajax({
                url:  '{{ route('event.addtocalendar') }}',
                type: 'post',
                data: {
                    uuid: '{{ $event['uuid'] }}',
                    calendar: $(this).html(),
                    _token: $('#token_for_ajax').val()
                },
                success: function(data) {
                    data = $.parseJSON(data);
                    if (data.result == 'success') {
                        window.open(data.calendar_link, '_blank');
                        console.log(data);
                    } else if (data.result == 'success_load') {
                        window.location.href = data.calendar_link;
                    } else if (data.result == 'register') {
                        // tmp
                        alert('This event cant be added by unregistered users anymore. Please, Sign up.');
                    } else if (data.result == 'error') {
                        // tmp
                        alert(data.error_massage);
                    }

                    $('#add-to-calendar-btn .toggle').hide();
                }
            });

        });

            $('#show_detail').click(function(){
                if ($('.share-event-top').hasClass('opened')){
                    $('.show-details')[0].innerText = 'Share your event!';
                    $('.share-event-top').removeClass('opened');
                } else{
                    $('.share-event-top').addClass('opened');
                    $('.show-details')[0].innerText = 'Hide Details';
                }
            });
            $('.exit-show-details').click(function(){
                if ($('.share-event-top').hasClass('opened')){
                    $('.show-details')[0].innerText = 'Share your event!';
                    $('.share-event-top').removeClass('opened');
                } else{
                    $('.share-event-top').addClass('opened');
                    $('.show-details')[0].innerText = 'Hide Details';
                }
            });

  });
 
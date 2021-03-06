$(document).ready(function(){
    var timeOutRange;
    var timeOuts = [];
    if ($('.important-popup').hasClass('enter')){
        $('.important-popup').removeClass('enter');

    } else{
        $('.important-popup').addClass('enter');
    }
    var clearID = setInterval(function(){
        $('.estimated-time span')[0].innerHTML = parseInt($('.estimated-time span')[0].innerHTML - 1);
        if ($('.estimated-time span')[0].innerHTML == 0){
            clearInterval(clearID);
            $('.succ-btn').addClass('enabled-btn');
            $('.succ-btn').attr('href', '/events');
        }
    }, 1000)
    var number_of_events = $('.popup-events-list li').length;
    for (var i=1; i<=number_of_events; i++){
        timeOutRange = getRandomInt(100, 1000);
        trickyLoading(i, timeOutRange)
    }

    function trickyLoading (i, time_Range){
        if (i == number_of_events){
            timeOuts[i] = setInterval(function(){
                $('.popup-events-list li:nth-child('+i+')').addClass('done');
                clearInterval(timeOuts[i]);
            }, 10000);
        } else{
            timeOuts[i] = setInterval(function(){
                $('.popup-events-list li:nth-child('+i+')').addClass('done');
                clearInterval(timeOuts[i]);
            }, i*1000+time_Range);
        }
    }

    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min)) + min;
    }

})
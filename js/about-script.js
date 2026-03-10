
$(function () {
    'use strict';

    /*--------------------------------------------------------------
        Partner slider
    --------------------------------------------------------------*/
    $('.partner-slider').owlCarousel({
        items: 4,
        itemsDesktop: [1199, 4],
        autoPlay: true,
        pagination: true,
        navigation: true,
        navigationText: ["<i class='flaticon-arrows-3'></i>", "<i class='flaticon-arrows-1'></i>"],
        mouseDrag: false
    });



    /*--------------------------------------------------------------
        Fun fact section animate numbers
    --------------------------------------------------------------*/
    $('.fun-fact .container .row').each(function () {
        var $this = $(this);

        $this.appear(function () {
            $('#happy-clients').animateNumber({ number: 8450 }, 2000);
            $('#awards').animateNumber({ number: 12500 }, 2000);
            $('#coffee').animateNumber({ number: 5200 }, 2000);
            $('#works').animateNumber({ number: 15400 }, 2000);
        });
    });



    /*--------------------------------------------------------------
        Expart section animation
    --------------------------------------------------------------*/
    $('.exparts .content').each(function () {
        var $this = $(this);
        var myVal = $(this).data("value");

        $this.appear(function () {
            $('.exparts #left-member').addClass('fadeInLeft');
            $('.exparts #right-member').addClass('fadeInRight');
        });
    });


}); //end of document.ready
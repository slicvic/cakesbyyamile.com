jQuery(document).ready(function($) {

    var slider_auto, slider_loop, slider_control, rtl, animation;
    
    if (bakes_and_cakes_data.auto == '1') {
        slider_auto = true;
    } else {
        slider_auto = false;
    }

    if (bakes_and_cakes_data.loop == '1') {
        slider_loop = true;
    } else {
        slider_loop = false;
    }

    if (bakes_and_cakes_data.pager == '1') {
        slider_control = true;
    } else {
        slider_control = false;
    }

    if (bakes_and_cakes_data.rtl == '1') {
        rtl = true;
    } else {
        rtl = false;
    }
    if (bakes_and_cakes_data.animation == 'slide') {
        animation = '';
    } else if (bakes_and_cakes_data.animation == 'fade') {
        animation = 'fadeOut';
    }

    /** Home Page Slider */
    $('#slider').owlCarousel({
        items: 1,
        margin: 0,
        animateOut: animation, //fade, slide//
        autoplaySpeed: bakes_and_cakes_data.a_speed, //ms'
        autoplay: slider_auto,
        loop: slider_loop,
        autoplayTimeout: bakes_and_cakes_data.speed,
        dots: slider_control,
        rtl: rtl,
        mouseDrag: false,
        nav: false,
    });

    $("#site-navigation ul li a").focus(function(){
       $(this).parents("li").addClass("hover");
   }).blur(function(){
       $(this).parents("li").removeClass("hover");
   });

    $('.btn-top').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    $('.map').click(function() {
        $('.map iframe').css("pointer-events", "auto");
    });

    $(".map").mouseleave(function() {
        $('.map iframe').css("pointer-events", "none");
    });


    $("#carousel").owlCarousel({
        margin: 15,
        nav: true,
        dots: false,
        rtl: rtl,
        mouseDrag: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 4
            },
            1200: {
                items: 5
            }
        }
    });

    $(".featured-slider").owlCarousel({
        items: 4,
        margin: 0,
        autoplaySpeed: 600, //ms'
        autoplayTimeout: 6000,
        dots: false,
        rtl: rtl,
        mouseDrag: false,
        nav: true,
        responsive: {
            0: {
                items: 1,
            },
            767: {
                items: 3,
            },
            992: {
                items: 4,
            }
        }

    });

    $(".tabset").owlCarousel({
        items: 5,
        margin: 20,
        autoplaySpeed: 600, //ms'
        autoplayTimeout: 6000,
        rtl: rtl,
        dots: false,
        nav: true,
        responsive: {
            0: {
                items: 3,
            },
            769: {
                items: 5,
            }
        }
    });

    $('.img-btn').click(function(e) {

        id = $(this).attr('id');
        console.log(id);
        $('.img-btn').removeClass('current');
        $(this).addClass('current');

        $.ajax({
            type: 'post',
            url: bakes_and_cakes_data.url,
            data: { 'action': 'bakes_and_cakes_team_ajax', 'id': id },
            beforeSend: function() {
                $('#loader').fadeIn(500);
            },
            success: function(response) {
                $('.our-staff .holder').html(response);
            },
            complete: function() {
                $('#loader').fadeOut(500);
            }
        });


    });

    // Script for back to top
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.btn-top').fadeIn();
        } else {
            $('.btn-top').fadeOut();
        }
    });

    $('.btn-top').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    //mobile-menu
    var winWidth = $(window).width();
    if (winWidth < 1025) {
        $('.menu-opener').click(function() {
            $('body').addClass('menu-open');

            $('.overlay').click(function() {
                $('body').removeClass('menu-open');
            });

            $('.btn-close-menu').click(function() {
                $('body').removeClass('menu-open');
            });
        });

        $('.main-navigation ul .menu-item-has-children').append('<div class="angle-down"></div>');
        $('.main-navigation').prepend('<div class="btn-close-menu"></div>');
        $('.main-navigation ul li .angle-down').click(function() {
            $(this).prev().slideToggle();
            $(this).toggleClass('active');
        });
    }
});

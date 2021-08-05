$(document).ready(function () {
    AOS.init();

    $(".burger_menu").on("click", function () {
        $(".nav_toggle").toggleClass("active");
        $(".nav").toggleClass("active");
        $(".header_inner").toggleClass("active");
        $("html").toggleClass("active");
    });

    $(".certificate_item").magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    $(".map_content").on("click", function () {
        $(".map_content").removeClass("active");
        $(this).addClass("active");
    });


    $(".show_certificate").on("click", function (event) {
        event.preventDefault();
        $(".certificate, .shadow").addClass("active");
    });
    $(".close_modal, .shadow").on("click", function () {
        $(".certificate, .shadow, .recall_modal").removeClass("active");
    });

    $(".call_me").on("click", function (event) {
        event.preventDefault();
        $(".recall_modal, .shadow").addClass("active");
    });


    $('.certificate_slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 980,
                settings: {
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 630,
                settings: {
                    slidesToShow:   2,
                }
            },
            {
                breakpoint: 520,
                settings: {
                    slidesToShow:   1,
                }
            }
        ]
    });
    $('.faq_slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        responsive: [
            {
                breakpoint: 1291,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 841,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 550,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
    $('.gallery_slider').slick({
        slidesToShow: 3,
        rows: 2,
        slidesToScroll: 1,
        infinite: true,
        responsive: [
            {
                breakpoint: 940,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 550,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
    let scrollPos = $(window).scrollTop();

    $(window).on("scroll resize load", function () {

        scrollPos = $(this).scrollTop();
        if (scrollPos > 1) {
            $(".header").addClass("active");
        } else {
            $(".header").removeClass("active");
        }
    });

});

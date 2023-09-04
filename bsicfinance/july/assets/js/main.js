(function ($) {
    "use strict";
    
    jQuery(document).ready(function($){
        

        $('#server-time').jsclock();
       

        //======================================
        //======== Testimonial slider ==========
        //======================================
        $(function () {

            var methodCarousel = $('.payment-methods');
            methodCarousel.owlCarousel({
                loop: true,
                dots: false,
                dotData: false,
                startPosition: 2,
                nav: false,
                item: 5,
                navText: ['<i class="fas fa-long-arrow-alt-left"></i>', '<i class="fas fa-long-arrow-alt-right"></i>'],
                autoplay: true,
                margin: 30,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                smartDataSpeed: 3000,
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    960: {
                        items: 5
                    },
                    1200: {
                        items: 5
                    },
                    1920: {
                        items: 5
                    }
                }
            });

        });
        
        /*=======================================
           testimonial carousel
       ========================================*/
        var testimonialCarousel = $('.testimonial-slider');
        testimonialCarousel.owlCarousel({
            loop: true,
            dots: false,
            nav: false,
            autoplay: true,
            margin: 30,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                960: {
                    items: 2
                },
                1200: {
                    items: 2
                },
                1920: {
                    items: 2
                }
            }
        }); 


        //======================================
        //========== venobox video ============
        //======================================
        $(function(){
            $('.venobox').venobox(); 
        });

        
        $('.scroll-to-top').on('click', function () {
            $("html,body").animate({
                scrollTop: 0
            }, 1000);
        });

 
    });

    //======================================
    //=========== Fixed navbar =============
    //======================================
    $(window).on('scroll', function(){
        var headerSection = $('.header');

        if ($(window).scrollTop() > 100) {
            headerSection.addClass('fixed-header');
            if ($(window).width() < 960) {
                $('.header').removeClass('fixed-header');
             }
        } else {
            headerSection.removeClass('fixed-header');
        }
    });  


    $(window).on('load',function(){
        /*-----------------
            preloader
        ------------------*/
        var preLoder = $(".sec");
        preLoder.fadeOut(1000);
       
    });


    
}(jQuery));	








    $('ul.nav li.dropdown').hover(function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });

    $('li.menu-item-has-children').addClass('dropdown');
    $('ul.sub-menu').addClass('dropdown-menu one-column');
    $('li.menu-item').addClass('ya-menu-custom');
    $('ul.nav.navbar-nav.ext-menu li:first-child').addClass('active');
    $(document).ready(function() {
        $(window).on('scroll', function () {
            if ($(window).scrollTop() > 70)
            {
                $("#nav-top-menu").addClass('fixedHeader');
            }
            else
            {
                $("#nav-top-menu").removeClass('fixedHeader');
            }
            /************ Menu Active on Scroll **********************/
            Scroll();
        });

 
    });
            // User define function
        function Scroll() {
            var contentTop = [];
            var contentBottom = [];
            var winTop = $(window).scrollTop();
            var rangeTop = 200;
            var rangeBottom = 500;
            $('.mainMenu').find('.scroll > a').each(function () {
                var atr = $(this).attr('href');
                if ($(atr).length > 0)
                {
                    contentTop.push($($(this).attr('href')).offset().top);
                    contentBottom.push($($(this).attr('href')).offset().top + $($(this).attr('href')).height());
                }
            });
            $.each(contentTop, function (i) {

                if (winTop > contentTop[i] - rangeTop) {

                    $('.mainMenu li.scroll')
                            .removeClass('active')
                            .eq(i).addClass('active');
                }
            });
        };



    jQuery(function($){



            // back to top
            $("#totop").hide();
            $(function () {
                var wh = $(window).height();
                var whtml = $(document).height();
                $(window).scroll(function () {
                    if ($(this).scrollTop() > whtml/10) {
                            $('#totop').fadeIn();
                        } else {
                            $('#totop').fadeOut();
                        }
                    });
                $('#totop').click(function () {
                    $('body,html').animate({
                        scrollTop: 0
                    }, 800);
                    return false;
                    });
            });
            // end back to top

                   $(".owl-carousel-lastest-product").owlCarousel({
                //dotsContainer: '#customDots',
                loop:true,
                margin:10,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        dots :false,
                        nav:false
                    },
                    600:{
                        items:1,
                        dots :false,
                        nav:false
                    },
                    1000:{
                        items:1,
                        dots :false,
                        nav:false,
                        loop:false
                    }
                }
              });

            owl = $('.owl-carousel-lastest-product').owlCarousel();
            $(".prev-bs").click(function () {
                owl.trigger('prev.owl.carousel');
            });

            $(".next-bs").click(function () {
                owl.trigger('next.owl.carousel');
            });

            $(".owl-carousel-lastest-post").owlCarousel({
                //dotsContainer: '#customDots',
                loop:true,
                margin:10,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        dots :false,
                        nav:false
                    },
                    600:{
                        items:1,
                        dots :false,
                        nav:false
                    },
                    1000:{
                        items:1,
                        dots :true,
                        nav:false,
                        loop:false
                    }
                }
              });

            owl2 = $('.owl-carousel-lastest-post').owlCarousel();
            $(".prev-bs-2").click(function () {
                owl2.trigger('prev.owl.carousel');
            });

            $(".next-bs-2").click(function () {
                owl2.trigger('next.owl.carousel');
            });


            $(".owl-carousel-featured-list").owlCarousel({
                //dotsContainer: '#customDots',
                loop:true,
                margin:10,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        dots :false,
                        nav:false
                    },
                    600:{
                        items:2,
                        dots :false,
                        nav:false
                    },
                    1000:{
                        items:3,
                        dots :false,
                        nav:false,
                        loop:false
                    }
                }
              });

            owl3 = $('.owl-carousel-featured-list').owlCarousel();
            $(".prev-bs-3").click(function () {
                owl3.trigger('prev.owl.carousel');
            });

            $(".next-bs-3").click(function () {
                owl3.trigger('next.owl.carousel');
            });
    }); 
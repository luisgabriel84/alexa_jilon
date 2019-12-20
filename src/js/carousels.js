$(document).ready(function(){
    $(".home-slider").owlCarousel({
        items:1,
        nav:true,
        loop: true,
        autoplay:true,
        autoplayTimeout:5000,
        mouseDrag:false,
        navText : ['<img src="img/left_03.jpg" />','<img src="img/right_03.jpg" />']
    });

    $(".mini-slider__carousel").owlCarousel({
        items:1,
        nav:true,
        loop: true,
        dots:false,
        navText : ['<img src="img/left_03.jpg" />','<img src="img/right_03.jpg" />']
    });

    $(".slider-instagram__carousel").owlCarousel({
        items:6,
        nav:false,
        loop: true,
        margin:20,
        responsive:{
            0:{
                items:2,
                dotsEach: 2,
               
            },
            600:{
                items:3,
                dotsEach: 2,
            },
            800:{
                items:6,
                dotsEach: 2,
            }

        },

       
    });

    $(".business-line-slider__carousel").owlCarousel({
        nav:true,
        loop: true,
        navText : ['<img src="img/left_03.jpg" />','<img src="img/right_03.jpg" />'],
        responsive:{
            0:{
                items:1,
                dotsEach: 2,
               
            },
            600:{
                items:1,
                dotsEach: 2,
            },
            800:{
                items:3,
                dotsEach: 2,
                
            }

        },
    });
    $(".detail__carousel").owlCarousel({
        nav:true,
        loop: false,
        navText : ['<img src="img/left_03.jpg" />','<img src="img/right_03.jpg" />'],
        autoplay:true,
        autoplayTimeout:5000,
        responsive:{
            0:{
                items:1,
                dotsEach: 2,
               
            },
            600:{
                items:1,
                dotsEach: 2,
            },
            800:{
                items:3,
                dotsEach: 2
            }

        },
    });

    $(".contact-carousel").owlCarousel({
        autoplay:true,
        autoplayTimeout:5000,
        dots: false,
        loop: false,
        animateOut: 'fadeOut',
        responsive:{
            0:{
                items:1,
               
               
            },
            600:{
                items:1,
              
            },
            800:{
                items:1,
               
            }

        },
        
    });
    
    $('.vestido_carusel').owlCarousel({
        autoplay:true,
        nav:true,
        autoplayTimeout:5000,
        dots: false,
        loop: false,
        navText : ['<img src="img/left_03.jpg" />','<img src="img/right_03.jpg" />'],
        responsive:{
            0:{
                items:1,
               
               
            },
            600:{
                items:1,
              
            },
            800:{
                items:1,
               
            }

        },
    });


    
  });


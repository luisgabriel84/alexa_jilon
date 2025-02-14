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

    $(".business-line-slider__carousel").owlCarousel({
        autoplay:true,
        autoplayTimeout:5000,
        nav:true,
        loop: true,
        navText : ['<img src="img/left_03.jpg" />','<img src="img/right_03.jpg" />'],
        
        responsive:{
            0:{
                items:1,
                dotsEach: 2,
                dots:true,
            },
            600:{
                items:2,
                dotsEach: 2,
                dots:true,
            },
            800:{
                items:3,
                dotsEach: 2,
                dots:true,
            },
            1000:{
                items:3,
                dotsEach: 2,
                dots:true,
                
            },
            1200:{
                items:4,
                dotsEach: 2,
                dots:true,
                
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
                items:2,
                dotsEach: 2,
            },
            800:{
                items:3,
                dotsEach: 2,
            },
            1000:{
                items:3,
                dotsEach: 2,
                
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
        autoplay:false,
        nav:true,
        autoplayTimeout:6000,
        dots: true,
        loop: true,
        mouseDrag:false,
        navText : ['<img src="img/left_03.jpg" />','<img src="img/right_03.jpg" />'],
        responsive:{
            0:{
                items:1,
                nav:false,
               
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


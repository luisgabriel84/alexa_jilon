$(document).ready(function(){
    $(".home-slider").owlCarousel({
        items:1,
        nav:true,
        loop: true,
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
                items:1,
                dotsEach: 2,
               
            },
            600:{
                items:1,
                dotsEach: 2,
            },

        },
        onTranslate: function() {
            $('.owl-item').find('video').each(function() {
                this.pause();
            });
        }
       
    });


    
  });

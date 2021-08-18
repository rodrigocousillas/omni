$(document).ready(function() {
    new WOW().init();
    
            // Add minus icon for collapse element which 
            // is open by default 
            $(".collapse.show").each(function() { 
                $(this).prev(".card-header").find(".fa") 
                    .addClass("fa-minus").removeClass("fa-plus"); 
            }); 
  
            // Toggle plus minus icon on show hide 
            // of collapse element 
            $(".collapse").on('show.bs.collapse', function() { 
                $(this).prev(".card-header").find(".fa") 
                    .removeClass("fa-plus").addClass("fa-minus"); 
            }).on('hide.bs.collapse', function() { 
                $(this).prev(".card-header").find(".fa") 
                    .removeClass("fa-minus").addClass("fa-plus"); 
            }); 

     $(".regular").slick({
        arrows: false,  
        dots: true,
        autoplay: false, /* this is the new line */
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplaySpeed: 5000
      });

     $(".regularHome").slick({
        arrows: true,  
        dots: false,
        autoplay: true, /* this is the new line */
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplaySpeed: 5000
      });

     $(".variable").slick({
        //dots: true,
  infinite: true,
  centerMode: true,
  centerPadding: '10%',
  slidesToShow: 3,
  speed: 500,
  responsive: [{

    breakpoint: 992,
    settings: {
      slidesToShow: 1,
       centerPadding: '5%',
       arrows: false
    }

  }]
});

     $('.center').slick({
         arrows: true,
  centerMode: true,
  centerPadding: '60px',
  slidesToShow: 1,
        slidesToScroll: 1,
  delay: 200,
  responsive: [
    {
      breakpoint: 768,
      settings: {
      
        arrows: true,
        centerMode: true,
        centerPadding: '15px',
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

    $('.sliderCenter').slick({
        centerMode: true,
        centerPadding: '300px',
        slidesToShow: 1,
        arrows: true,
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    centerPadding: '150px',
                }
            },
            {
                breakpoint: 780,
                settings: {
                    centerPadding: '50px',
                }
            },

            {
                breakpoint: 500,
                settings: {
                    centerPadding: '0px',
                }
            },

        ]
    });

     $(".lazy").slick({
          lazyLoad: 'ondemand', // ondemand progressive anticipated
          draggable:true,
          autoplay: true, /* this is the new line */
          autoplaySpeed: 5000,
          speed: 3000,
          arrows: false,
          dots: true,
          infinite: true
        });

    $('.sliderHero').royalSlider({
       // SLIDER 
       arrowsNav: false,
        autoScaleSlider: true,

        fullscreen: {
            // fullscreen options go gere
            enabled: true,
            nativeFS: true
        },

        
        loop: true,
        keyboardNavEnabled: false,
        controlsInside: false,
        imageScaleMode: 'fill',
        arrowsNavAutoHide: false,
        controlNavigation: 'bullets',
        navigateByClick: false,
        startSlideId: 0,
        slidesSpacing: 0,
        imageAlignCenter: false,
        autoPlay: {
            enabled: true,
            pauseOnHover: true,
            delay: 4500
        },              
        transitionType:'fade',
        globalCaption: false,
        deeplinking: {
            enabled: true,
            change: false
        },
        block: {
          // animated blocks options go gere
          fadeEffect: false,
          moveEffect: 'bottom',
          moveOffset: 30,
          delay: 200,
          easing: 'easeOutSine'
        }     
    });

    $('.sliderHome').slick({
        slidesToShow: 1,
        arrows: true
    });

    /*$('.sliderHero').slick({
        slidesToShow: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 2000,
        fade: true,
        infinite: true
    });*/

    $('.carrousel').slick({
        slidesToShow: 3,
        dots: true,
        slidesToScroll: 1,
        padding: 0,
        arrows: true,
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },

        ]
    });

    $('.carrouselDos').slick({
        slidesToShow: 3,
        dots: true,
        slidesToScroll: 1,
        padding: 0,
        arrows: true,
        responsive: [
            {
                breakpoint: 1281,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },

            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },

        ]
    });


    /*$('.catalogoFotos').slick({
        slidesToShow: 3,
        dots: false,
        slidesToScroll: 1,
        padding: 0,
        arrows: true,
        responsive: [
            {
                breakpoint: 1920,
                settings: {
                    settings: "unslick"
                }
            },

            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },

        ]
    });*/

    // Add smooth scrolling to all links
  $(".scroll").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1000, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });

  $('.btnProductos').on('click', function(e){
   e.preventDefault();
   $('.dropProductos').slideToggle();
  })

  $('.dropProductos a').on('mouseenter', function(){
    var img = $(this).attr('data-img');
    $('.imagen').html('<img src="'+img+'" class="img-fluid">')
  });
  $('.dropProductos a').on('mouseleave', function(){
    var img = $(this).attr('data-img');
    $('.imagen').html('');
  });
            
}); 



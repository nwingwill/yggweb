(function ($) {
    "use strict";
  var isEditMode = false;

 	

  var rtoleft = false;
  if($('body').hasClass('rtl')){
      var rtoleft = true;
  }

/* --------------------------------------------------------------------------------------------------------------------------- */
/**
* Accesspress Parallax Shop
*/
var APPshop = function( $scope, $){
	$('.ap-shop-wrapper .ap-product-wrapper').each(function (){
		$('.ap-shop-wrapper .ap-product-wrapper').not('.slick-initialized').slick({
		  	infinite: true,
		  	slidesToShow: 3,
		  	slidesToScroll: 3,
		  	arrows: false,
	  		rtl: rtoleft,
		  	dots: true,
		  	responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2
		      }
		    },
		    {
		      breakpoint: 500,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		  ]
		});
	});	
}

/* --------------------------------------------------------------------------------------------------------------------------- */
/**
* Accesspress Parallax Progress Bar
*/
var APPprogress = function( $scope, $){
    $('.ap-progress-section').each(function() { 
        $(this).waypoint(function() {
            var progressWidth = $(this).find('.ap-progress-bar-percentage').data('value') + '%';
            $(this).find('.ap-progress-bar-percentage').css('width',0).animate({width: progressWidth}, 2000);
            $(this).find('.widget-percent').prop('Counter',0).animate({
               Counter: progressWidth,
            }, {
                duration: 2000,
                easing: 'swing',
                step: function (now) {
                   $(this).text(Math.ceil(now)+ '%');
                }
            });
        }, {
        offset: '100%',
        });
    }); 
}

var APPtestimonial = function( $scope, $){
    $('.ap-testimonial-slider-section').each(function() { 
        $(this).find('.ap-testimonial-slider-wrapper').not('.slick-initialized').slick({
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          rtl: rtoleft,
          dots: true,
      });
    }); 
}



 	$(window).on('elementor/frontend/init', function () {
        if(elementorFrontend.isEditMode()) {
            isEditMode = true;
        }        
        elementorFrontend.hooks.addAction('frontend/element_ready/ap-shop-slider.default', APPshop);
        elementorFrontend.hooks.addAction('frontend/element_ready/ap-progress.default', APPprogress);
        elementorFrontend.hooks.addAction('frontend/element_ready/ap-testimonial-slider.default', APPtestimonial);       
    });

}(jQuery));
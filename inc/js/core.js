//@prepros-prepend jquery.magnific-popup.js
//@prepros-prepend mixitup.js
//@prepros-prepend mixitup-pagination.js
//@prepros-prepend jquery.magnific-popup.js
//@prepros-prepend owl.carousel.min.js

jQuery(document).ready(function( $ ) {

/* ADD CLASS ON LOAD*/

    $("html").delay(100).queue(function(next) {
        $(this).addClass("loaded");

        next();
    });

/* ADD CLASS ON SCROLL*/

	$(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 100) {
            $("body").addClass("scrolled");
        } else {
            $("body").removeClass("scrolled");
        }
    });
    
/* File upload name */

	$(document).ready(function(){
        $('input#fileupload').change(function(){
	        var file = $("input[type=file]")[0].files;
	        var name = file.length > 0 ? file[0].name : "";
	        
	        if(file.length > 0 && name) {
		        $('.custom-file-upload').addClass('attached');
	        }
	        
	        $(".file-name").text(name);
        });
    });

/* CLASS AND FOCUS ON CLICK */

    $(".trigger-copy-expand").click(function(event) {
      $('.collapsed-content').addClass("expand");
      $(this).hide();
       $('.trigger-copy-collapse').show();     
    });

    $(".trigger-copy-collapse").click(function(event) {
        $('.collapsed-content').removeClass("expand");
        $(this).hide();
        $('.trigger-copy-expand').show();     
    });

    $(".trigger-expand").click(function(event) {
        $(this).closest('.expanding-copy').addClass("expand");
    });

    $(".trigger-collapse").click(function(event) {
        $(this).closest('.expanding-copy').removeClass("expand");
    });

    $(".toggle").click(function() {   
      	$('.toggle.active').removeClass("active"); 
        $(this).addClass("active");   
    });
    
    $(".search i").click(function() {
	    $(".search div").toggleClass("visible");
    });
    
    $(".selector").click(function() {
	    $(".action").removeClass("active");
	    $(".action." + $(this).attr("name")).addClass("active");
	    
	    $(this).siblings().removeClass("active");
	    $(this).addClass("active");
    });
    
    $(".filter .label").click(function() {
		$(this).next().slideToggle();
		$(this).find("i").toggleClass("closed");
    });
    
    $(".see-tours").click(function() {
	    $(this).parents(".wrapper-itinerary").find(".tours").slideToggle();
    });

/* GLOBAL OWL CAROUSEL SETTINGS */

    $('.carousel').owlCarousel({
        animateOut: 'fadeOut',
        loop:true,
        margin:10,
        nav:true,
    	navClass: ['owl-prev', 'owl-next'],
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

    $('.testimonial-slider').owlCarousel({
        autoplay:true,
        autoplayTimeout:10000,
        loop:true,
        margin:10,
        nav: false,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            2000:{
                items:1
            }
        }
    });

/* FILTER SAFARIS */

	$(".filter .checkbox input").change(function() {
		
		// Destination
		
		var destinations = $(".filter .wrapper-checkbox.destination input:checked").map(function() {
			return $(this).val();
		}).toArray();
		
		var styles = $(".filter .wrapper-checkbox.style input:checked").map(function() {
			return $(this).val();
		}).toArray();
		
		var months = $(".filter .wrapper-checkbox.dates input:checked").map(function() {
			return $(this).val();
		}).toArray();
		
		$(".wrapper-itinerary").each(function() {
			var itinerary     = $(this);
			var isDestination = false;
			var isStyle       = false;
			
			var show = false;
			
			// Destination
			if(destinations.length > 0) {
				for(var i = 0; i < destinations.length; i++)
					if(itinerary.hasClass(destinations[i]))
						isDestination = true;
			} else {
				isDestination = true;
			}
			
			// Style			
			if(styles.length > 0) {
				for(var i = 0; i < styles.length; i++)
					if(itinerary.hasClass(styles[i]))
						isStyle = true;
			} else {
				isStyle = true;
			}
			
			if(isDestination && isStyle) {
				
				itinerary.find(".wrapper-tour").each(function() {
					var tour = $(this);
					var isMonth = false;
					
					// Month
					if(months.length > 0) {
						var date_from = tour.attr("date-from");
						var date_to   = tour.attr("date-to");
						
						for(var i = 0; i < months.length; i++)
							if(date_from == months[i] || date_to == months[i])
								isMonth = true;
					} else {
						isMonth = true;
					}
					
					
					if(isMonth) {
						
						if(itinerary.css("display") == "none") {
							tour.css("display", "grid");
						} else {
							tour.slideDown();
						}
						
						show = true;
							
					} else {
						tour.slideUp();
					}
				});
				
			} else {
				show = false;
			}
			
			if(show)
				itinerary.slideDown();
			else
				itinerary.slideUp();
		});
	});

// ========== Add class if in viewport on page load

$.fn.isOnScreen = function(){
    
    var win = $(window);
    
    var viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();
    
    var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();
    
    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
    
};

	$('.slide-up').each(function() {
		if ($(this).isOnScreen()) {
			$(this).addClass('active');    
		} 
	});
	
	$('.slide-down').each(function() {
		if ($(this).isOnScreen()) {
			$(this).addClass('active');    
		} 
	});
	
	$('.slide-right').each(function() {
		if ($(this).isOnScreen()) {
			$(this).addClass('active');    
		}
	});
	
	$('.slow-fade').each(function() {
		if ($(this).isOnScreen()) {
			$(this).addClass('active');    
		}
	});

// ========== Add class on entering viewport

$.fn.isInViewport = function() {
var elementTop = $(this).offset().top;
var elementBottom = elementTop + $(this).outerHeight();
var viewportTop = $(window).scrollTop();
var viewportBottom = viewportTop + $(window).height();
return elementBottom > viewportTop && elementTop < viewportBottom;
};

$(window).on('resize scroll', function() {
	$('.experience-level').each(function() {
		if ($(this).isInViewport()) {
			$(this).addClass('active');
		}
	});
	
	$('.slide-up').each(function() {
		if ($(this).isInViewport()) {
			$(this).addClass('active');    
		} 
	});
	
	$('.slide-down').each(function() {
		if ($(this).isInViewport()) {
			$(this).addClass('active');    
		} 
	});
	 
	$('.slide-right').each(function() {
		if ($(this).isInViewport()) {
			$(this).addClass('active');    
		} 
	});
	
	$('.slow-fade').each(function() {
		if ($(this).isInViewport()) {
			$(this).addClass('active');    
		}
	});
    
});

});//Don't remove ---- end of jQuery wrapper


//@prepros-prepend jquery.magnific-popup.js
//@prepros-prepend mixitup.js
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

//SMOOTH SCROLL TO ANCHOR 

$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top -250 }, 1000);
        return false;
      }
    }
  });
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
	    $(".search form").toggleClass("visible");
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
    
    $(".wrapper-countries .country").click(function() {
	    $(this).next().slideToggle();
	    $(this).toggleClass("opened");
    });
    
    $(".wrapper-guides .guide").click(function() {
	    $(this).parent().siblings().find(".guide").removeClass("opened");
	    $(this).parent().siblings().find(".info").slideUp();
	    $(this).toggleClass("opened");
	    $(this).next().slideToggle("slow","swing", function(){
		    $('html, body').animate({
				scrollTop: $(this).offset().top - $("nav").height() - 90
			}, 500);
		});
	    
	    
    });
    
    $(".wrapper-questions .question").click(function() {
	    $(this).next().slideToggle();
	    $(this).toggleClass("opened");
	    $(this).parent().siblings().find(".question").removeClass("opened");
	    $(this).parent().siblings().find(".answer").slideUp();
    });
    
    $(".contact-us .more-info").click(function() {
	    $(".contact-us .extra-fields").slideDown();
	    $(".contact-us .submit-button").slideUp();
    });
    
    $(".modal-toggle").click(function() {
	    $(".modal").toggleClass("is-visible");
		$("html").toggleClass("no-scroll");
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

	$(".find-safari .filter .checkbox input").change(function() {
		
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
		
		var availability = $(".filter .wrapper-checkbox.availability input:checked").map(function() {
			return {
				"min-value": parseInt($(this).attr("min-avail")),
				"max-value": parseInt($(this).attr("max-avail"))
			};
		}).toArray();
		
		var prices = $(".filter .wrapper-checkbox.price input:checked").map(function() {
			return {
				"min-value": parseInt($(this).attr("min-price")),
				"max-value": parseInt($(this).attr("max-price"))
			};
		}).toArray();
		
		
		
		// Search Text
		
		var search = $(".your-search .search-block").map(function() {
			return $(this).text();
		}).toArray();
		
		$(".filter .wrapper-checkbox input").each(function() {
			var text = $(this).next().text();
			
			if($(this).prop("checked")) {
				if(!search.includes(text)) {
					var searchBlock = $("<div class='search-block'><div>" + text + "</div></div>").addClass("hidden").appendTo(".your-search");
					
					searchBlock.css("opacity");
					searchBlock.css("transform");
					searchBlock.addClass("visible");
					
					if($(".your-search .search-block").length == 0) {
						$(".your-search").removeClass("pb2");
					} else {
						$(".your-search").addClass("pb2");
					}
				}
			} else {
				if(search.includes(text)) {
					var searchBlock = $(".your-search .search-block div:contains(" + text + ")").parent();
					searchBlock.removeClass("visible");
					
					setTimeout(function() {
						searchBlock.remove();
						
						if($(".your-search .search-block").length == 0) {
							$(".your-search").removeClass("pb2");
						} else {
							$(".your-search").addClass("pb2");
						}
					}, 400);
				}
			}
			
		});
		
		$(".search-block").click(function() {
			$(".filter .checkbox label:contains(" + $(this).text() + ")").prev().prop("checked", false).change();
		});
		
		
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
					var data = JSON.parse(tour.attr("data-attr"));
					var isMonth     = false;
					var isAvailable = false;
					var isPrice     = false;
					
					// Month
					if(months.length > 0) {
						var date_from = data.date_from;
						var date_to   = data.date_to;
						
						for(var i = 0; i < months.length; i++)
							if(date_from == months[i] || date_to == months[i])
								isMonth = true;
					} else {
						isMonth = true;
					}
					
					// Availability
					if(availability.length > 0) {
						var places = data.availability;
						
						for(var i = 0; i < availability.length; i++) {
							var min_value = availability[i]["min-value"];
							var max_value = availability[i]["max-value"];
							
							if(min_value && max_value) {
								if(places >= min_value && places <= max_value)
									isAvailable = true;
							} else if(min_value) {
								if(places >= min_value)
									isAvailable = true;
							} else if(max_value) {
								if(places <= max_value)
									isAvailable = true;
							}
						}
					} else {
						isAvailable = true;
					}
					
					// Price
					if(prices.length > 0) {
						var cost = data.cost;
						
						for(var i = 0; i < prices.length; i++) {
							var min_value = prices[i]["min-value"];
							var max_value = prices[i]["max-value"];
							
							if(min_value && max_value) {
								if(cost >= min_value && cost <= max_value)
									isPrice = true;
							} else if(min_value) {
								if(cost >= min_value)
									isPrice = true;
							} else if(max_value) {
								if(cost <= max_value)
									isPrice = true;
							}
						}
					} else {
						isPrice = true;
					}
					
					
					if(isMonth && isAvailable && isPrice) {
						
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
	
// ========== Filtering controller (mixitup)

if($('#mixitup-gallery').length) {

var campsMixer = mixitup('#mixitup-gallery', {
    load: {
        filter: 'all'
    },
    selectors: {
        control: '.mixitup-control',
        target: '.gallery-item'
    }
});
}

// ========== Map Initial Configuration

if($("#map-itinerary").length > 0 && JSON.parse($("#map-itinerary").attr("points")) && JSON.parse($("#map-itinerary").attr("config"))) {
	var config = JSON.parse($("#map-itinerary").attr("config"));
    var points = JSON.parse($("#map-itinerary").attr("points"));
    
    mapboxgl.accessToken = 'pk.eyJ1Ijoic2lsdmVybGVzcyIsImEiOiJjaXNibDlmM2gwMDB2Mm9tazV5YWRmZTVoIn0.ilTX0t72N3P3XbzGFhUKcg';
    
	var map = new mapboxgl.Map({
	    container:  'map-itinerary',
	    style:      'mapbox://styles/silverless/cjvnw465y0bl91cmionu5nqmo',
	    center:     [config.center_long, config.center_lat],
	    zoom:       config.zoom_level, 
	    scrollZoom: config.zoom_level
	});
	
	map.addControl(new mapboxgl.NavigationControl(), 'bottom-right');
	
	var geocoder = new MapboxGeocoder({
		accessToken: mapboxgl.accessToken,
		marker: {
			color: 'grey'
		},
		mapboxgl: mapboxgl,
		flyTo: false
	});
	
	map.addControl(geocoder, 'bottom-left');
	
	var geojson = {
		type: 'FeatureCollection',
		features: points
	};
	
	var coorPoints = [];
	
	geojson.features.forEach(function(marker) {

		var el = document.createElement('div');
		el.className = 'marker';
		
		new mapboxgl.Marker(el)
			.setLngLat(marker.geometry.coordinates)
			.setPopup(new mapboxgl.Popup({
				offset: 25,
			})
			.setHTML(
		    	'<div class="heading">'    + marker.properties.heading     + '</div>' +
		    	'<div class="detail">' + marker.properties.detail  + '</div>' ))
			.addTo(map);
		
		el.addEventListener('click', function(e){
			position = marker.geometry.coordinates[1];
			map.flyTo({
			    center: [marker.geometry.coordinates[0], position],
			    zoom: config.zoom_level
		    });
		});
		
		coorPoints.push(new mapboxgl.LngLat(marker.geometry.coordinates[0], marker.geometry.coordinates[1]));
	});
	
	$(window).bind('mousewheel DOMMouseScroll', function(event) {
	    if(event.ctrlKey == true) {
	        map['scrollZoom'].enable();
	    }
	    else {
	        map['scrollZoom'].disable();
	    }
	});
}

if($('.gallery').length) {

	$('.gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title');
			}
		}
	});

}

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


/*--------------------------------------------------------------
>>> TABLE OF CONTENTS:
----------------------------------------------------------------
# Navigation
# Projects Categories menu
# Slick Slider
# Isotope
# Google maps
--------------------------------------------------------------*/
import $ from 'jquery';
import "slick-carousel/slick/slick.js";
import Isotope from "isotope-layout";
import jQueryBridget from 'jquery-bridget';
jQueryBridget( 'isotope', Isotope, $ );

	console.log('Made with love by bloom!!');

	/*--------------------------------------------------------------
	# Navigation
	--------------------------------------------------------------*/
	var menuIsOpened = false;

	$('.hamburger').click(function(e) {
		e.preventDefault();
		$(this).toggleClass('is-active');
		$('.hamburger-wrapper').toggleClass('is-active');
		$('.main-navigation').toggleClass('main-navigation--open');
		if(!menuIsOpened) {
			menuIsOpened = true;
		} else {
			menuIsOpened = false;
		}
	});

	// Change hamburger color when it's over an element with class .changeHamburger
	function changeHamburger() {
		var scrollTop = $(window).scrollTop();
		var currentBackground = $('.current-bg');

		$('.changeHamburger').each(function() {
			var $this = $(this);
			var topOfElement = $this.offset().top;
			var bottomOfElement = $this.offset().top + $this.outerHeight(true);
			var visible = false;

			if(scrollTop >= topOfElement && scrollTop < bottomOfElement) {
				visible = true;
				$this.addClass('current-bg');
			} else {
				$this.removeClass('current-bg');
			}
		});

		if(currentBackground.length) {
			if(scrollTop >= currentBackground.offset().top && scrollTop < currentBackground.offset().top + currentBackground.outerHeight(true) && !menuIsOpened) {
				$('.hamburger-wrapper').addClass('hamburger-dark');
			} else {
				$('.hamburger-wrapper').removeClass('hamburger-dark');
			}
		}
	}
	changeHamburger();
	$(window).on('scroll', changeHamburger);

	$('.changeHamburger').each(function() {
		var $this = $(this);
		var topOfElement = $this.offset().top;
		var bottomOfElement = $this.offset().top + $this.outerHeight(true);

		if($(window).scrollTop() >= topOfElement && $(window).scrollTop() <= bottomOfElement ) {
			$this.addClass('current-bg');
		}
	});

	if($('.current-bg').length) {
		if($(window).scrollTop() >= $('.current-bg').offset().top) {
			$('.hamburger-wrapper').addClass('hamburger-dark');
		}
	}

	$('#categories-collapsable').on('show.bs.collapse', function() {
		$('.hamburger-wrapper').addClass('hamburger-light');
		$('.hamburger-wrapper').removeClass('hamburger-dark');
	});

	$('#categories-collapsable').on('hide.bs.collapse', function() {
		$('.hamburger-wrapper').removeClass('hamburger-light');
	});

	/*--------------------------------------------------------------
	# Projects Categories menu
	--------------------------------------------------------------*/
	$('#categories-show-btn').click(function(e) {
		e.preventDefault();
		$(this).hide();
		$('#categories-collapsable').collapse('show');
		$('.hamburger-wrapper').removeClass('hamburger-dark');
	});

	$('#categories-hide-btn').click(function(e) {
		e.preventDefault();
		$('#categories-show-btn').show();
		$('#categories-collapsable').collapse('hide');
		$('.hamburger-wrapper').addClass('hamburger-dark');
	});

	/*--------------------------------------------------------------
	# Slick Slider
	--------------------------------------------------------------*/
	$('.welcome-hero-slider').slick({
		arrows: false,
		autoplay: true,
		fade: true,
		pauseOnFocus: false,
		pauseOnHover: false
	});

 	$('.project-slider').each(function() {
 		var $this = $(this);
		$($this).slick({
			prevArrow: '',
			nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
			appendArrows: $this.parent().find('.project-slider-arrows')
		});
 		var numberOfSlides = $this.slick('getSlick').slideCount;
 		var currentSlide = $this.slick('slickCurrentSlide') + 1;

 		var slidesCounter = 	'<div class="project-slider__counter">' +
 								'<span class="current-slide">' + currentSlide + '</span>/' +
 								'<span class="slides-number">' + numberOfSlides + '</span>' +
 								'</div>';
 		$this.parent().find('.project-slider-meta').prepend(slidesCounter);

 		$this.on('afterChange', function(event, slick, currentSlide, nextSlide) {
 			$this.parent().find('.current-slide').html(currentSlide + 1);
 		});
 	});

 	$('.client-slider').slick({
 		slidesToShow: 5,
 		slidesToScroll: 5,
 		arrows: false,
 		dots: true
 	});

	$('.filiales-slider').slick({
		slidesToShow: 5,
		slidesToScroll: 5,
		arrows: false,
		dots: true,
		responsive: [
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});

 	$('a[href="#filiales"]').on('shown.bs.tab', function (e) {
	 	$('.filiales-slider').slick({
	 		slidesToShow: 5,
	 		slidesToScroll: 5,
	 		arrows: false,
	 		dots: true
	 	});
	});

	$('a[href="#filiales"]').on('hidden.bs.tab', function() {
		$('.filiales-slider').slick('unslick');
	});

	$('a[href="#bolsa-trabajo"]').on('shown.bs.tab', function() {
		$('.bolsa-trabajo-slider').slick({
			slidesToShow: 2,
			slidesToScroll: 2,
			arrows: false,
			dots: true
		});
	});

	$('a[href="#bolsa-trabajo"]').on('hidden.bs.tab', function() {
		$('.bolsa-trabajo-slider').slick('unslick');
	});

	/*--------------------------------------------------------------
	# Isotope
	--------------------------------------------------------------*/
	$('.grid').isotope({
		itemSelector: '.grid-item'
	});

	$('.category-filter').each(function() {
		var $this = $(this);
		$this.on('click', function(e) {
			e.preventDefault();
			$('#categories-collapsable').collapse('hide');
			$('#categories-show-btn').show();
			$('.hamburger-wrapper').addClass('hamburger-dark');
			var filterValue = $this.attr('data-filter');
			$('.grid').isotope({ filter: filterValue });
		});
	});


/*--------------------------------------------------------------
# Google maps
--------------------------------------------------------------*/
var mapStyle = [
    {
        "featureType": "all",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            },
            {
                "saturation": "-100"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "saturation": 36
            },
            {
                "color": "#000000"
            },
            {
                "lightness": 40
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "off"
            },
            {
                "color": "#000000"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 17
            },
            {
                "weight": 1.2
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#4d6059"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#4d6059"
            }
        ]
    },
    {
        "featureType": "landscape.natural",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#4d6059"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "lightness": 21
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#4d6059"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#4d6059"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#7f8d89"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#7f8d89"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#7f8d89"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#7f8d89"
            },
            {
                "lightness": 29
            },
            {
                "weight": 0.2
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 18
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#7f8d89"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#7f8d89"
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#7f8d89"
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#7f8d89"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 19
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#2b3638"
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#2b3638"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#24282b"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#24282b"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    }
];

var map;
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 20.072641, lng: -98.797384},
        zoom: 8,
        styles: mapStyle
    });
}

window.initMap = initMap;

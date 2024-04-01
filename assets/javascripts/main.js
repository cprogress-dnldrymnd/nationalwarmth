jQuery(document).ready(function($) {
	swiper_slider();
	mobile_menu();
	sticky_header();
	fixed_font_display();
	pseudo_add_to_wishlist();
	pseudo_submit();
});

function pseudo_submit() {
	jQuery('.pseudo-submit').click(function(event) {
		jQuery(this).parents('.subscribe-box').find('input[type="submit"]').click();
	});
}

function pseudo_add_to_wishlist() {
	jQuery('.pseudo-add-to-wishlist.not-in-wishlist').click(function(event) {
		console.log('test');
		jQuery('.single_add_to_wishlist').click();
		jQuery(this).addClass('in-wishlist').removeClass('not-in-wishlist');
	});
}

function fixed_font_display() {
	setTimeout(function() {
		jQuery('.hero-banner-slider').addClass('display-font');
	}, 500);
}


function mobile_menu() {
	jQuery('.navbar-toggler').click(function(event) {
		jQuery('html').toggleClass('menu-active');
	});
}

function sticky_header() {
	
	var stickyNavTopElement = jQuery('.header-navigation + .header-bottom .header-bottom-holder');


	var stickyNavTop = stickyNavTopElement.offset().top ;

	var stickyNav = function(){
		if(jQuery('body').hasClass('admin-bar')) {
			var scrollTop = jQuery(window).scrollTop() + 32; 
		} else {
			var scrollTop = jQuery(window).scrollTop(); 
		}

		if (scrollTop > stickyNavTop) { 
			stickyNavTopElement.addClass('sticky');
		} else {
			stickyNavTopElement.removeClass('sticky'); 
		}
	};

	stickyNav();

	jQuery(window).scroll(function() {
		stickyNav();
	});

}
function swiper_slider() {
	var logoSwiper = new Swiper(".mySwiper-logoSwiper", {
		loop: true,
		autoplay: {
			delay: 5000,
			disableOnInteraction: true,
		},
		breakpoints: {
			0: {
				slidesPerView: 2,
			},
			768: {
				slidesPerView: 3,
			},
			1200: {
				slidesPerView: 4,
			},
			1400: {
				slidesPerView: 5,
			},
		},

	});

	var testimonialSwiper = new Swiper(".mySwiper-Testimonial", {
		loop: true,
		spaceBetween: 30,
		autoHeight: true,
		autoplay: {
			delay: 5000,
			disableOnInteraction: true,
		},
		breakpoints: {
			0: {
				slidesPerView: 1,
			},
			576: {
				slidesPerView: 2,
			},
			992: {
				slidesPerView: 3,
			},
		},
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
	});

	var logoSwiperFooter = new Swiper(".mySwiper-logoSwiperFooter", {
		loop: true,
		autoplay: {
			delay: 5000,
			disableOnInteraction: true,
		},
		breakpoints: {
			0: {
				slidesPerView: 2,
			},
			576: {
				slidesPerView: 3,
			},
			1200: {
				slidesPerView: 4,
			},
			1400: {
				slidesPerView: 6,
			},
		},

	});
	
}

document.addEventListener("DOMContentLoaded", function(){
	if (window.innerWidth > 992) {

		document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){

			everyitem.addEventListener('mouseover', function(e){

				let el_link = this.querySelector('a[data-bs-toggle]');

				if(el_link != null){
					let nextEl = el_link.nextElementSibling;
					el_link.classList.add('show');
					nextEl.classList.add('show');
				}

			});
			everyitem.addEventListener('mouseleave', function(e){
				let el_link = this.querySelector('a[data-bs-toggle]');

				if(el_link != null){
					let nextEl = el_link.nextElementSibling;
					el_link.classList.remove('show');
					nextEl.classList.remove('show');
				}


			})
		});

	}
}); 
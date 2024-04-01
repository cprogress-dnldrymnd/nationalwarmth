jQuery(document).ready(function ($) {
	swiper_slider();
	mobile_menu();
	sticky_header();
	fixed_font_display();
	nice_select();
	ajax_form();
});


function ajax_form() {
	jQuery("#archive-form-filter").change(function (e) {
		e.preventDefault();
		ajax(0);
	});

	jQuery("#location").change(function (e) {
		e.preventDefault();
		careers_ajax(0);
	});
}

function load_more_button_listener($) {
	jQuery(document).on("click", '#load-more', function (event) {
		event.preventDefault();
		var offset = jQuery('.post-item').length;
		ajax(offset, 'append');
	});

}

function ajax($offset, $event_type = 'html') {
	var $loadmore = jQuery('#load-more');

	var $archive_section = jQuery('.archive-section');

	var $result_holder = jQuery('#results .results-holder');

	var $category = jQuery("select[name='category']").val();

	var $post_type = jQuery("input[name='post-type']").val();

	var $taxonomy = jQuery("input[name='taxonomy']").val();

	var $sortby = jQuery("select[name='sortby']").val();

	$loading = jQuery('<div class="loading-results"> <div class="fa-spinner d-inline-block"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--> <path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z" /> </svg> </div></div>');

	$archive_section.addClass('loading-post');

	if ($event_type == 'html') {
		jQuery('#results  .results-holder').html($loading);
		$loadmore.addClass('d-none');
	} else {
		$loadmore.addClass('loading');
		$loadmore.find('span').text('Loading');
	}

	jQuery.ajax({

		type: "POST",

		url: "/wp-admin/admin-ajax.php",

		data: {

			action: 'archive_ajax',

			category: $category,

			post_type: $post_type,

			taxonomy: $taxonomy,

			sortby: $sortby,

			offset: $offset


		},

		success: function (response) {
			if ($event_type == 'append') {
				$result_holder_row = $result_holder.find('.row');
				jQuery(response).appendTo($result_holder_row);
			} else {
				$result_holder.html(response);
			}
			$loadmore.removeClass('d-none loading');

			$loadmore.find('span').text('Load more');

			$archive_section.removeClass('loading-post');

		}

	});

}

function nice_select() {
	jQuery('.nice-select-js').niceSelect();
}



function fixed_font_display() {
	setTimeout(function () {
		jQuery('.hero-banner-slider').addClass('display-font');
	}, 500);
}


function mobile_menu() {
	jQuery('.navbar-toggler').click(function (event) {
		jQuery('html').toggleClass('menu-active');
	});
}

function sticky_header() {

	var stickyNavTopElement = jQuery('.header-navigation + .header-bottom .header-bottom-holder');


	var stickyNavTop = stickyNavTopElement.offset().top;

	var stickyNav = function () {
		if (jQuery('body').hasClass('admin-bar')) {
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

	jQuery(window).scroll(function () {
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
				slidesPerView: 3,
			},
			768: {
				slidesPerView: 3,
			},
			1200: {
				slidesPerView: 5,
			},
			1400: {
				slidesPerView: 6,
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

document.addEventListener("DOMContentLoaded", function () {
	if (window.innerWidth > 992) {

		document.querySelectorAll('.navbar .nav-item').forEach(function (everyitem) {

			everyitem.addEventListener('mouseover', function (e) {

				let el_link = this.querySelector('a[data-bs-toggle]');

				if (el_link != null) {
					let nextEl = el_link.nextElementSibling;
					el_link.classList.add('show');
					nextEl.classList.add('show');
				}

			});
			everyitem.addEventListener('mouseleave', function (e) {
				let el_link = this.querySelector('a[data-bs-toggle]');

				if (el_link != null) {
					let nextEl = el_link.nextElementSibling;
					el_link.classList.remove('show');
					nextEl.classList.remove('show');
				}


			})
		});

	}
}); 
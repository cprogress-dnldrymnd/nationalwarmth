<?php
/*-----------------------------------------------------------------------------------*/
/* Template Name: Modules
/*-----------------------------------------------------------------------------------*/
?>

<?php get_header(); ?>
<?php 
$Modules = new Modules();
$SVG = new SVG;
$hide_page_banner = carbon_get_the_post_meta('hide_page_banner');

?>
<main id="main" class="page-components">
	<?php while ( have_posts() ) { the_post(); ?>
		<div class="page-title" role="banner">
			<h1><?php the_title() ?></h1>
		</div>

		<?php 
		if(!$hide_page_banner) {
			get_template_part('template-parts/section/content', 'banner');
		}
		get_template_part('template-parts/section/content', 'after-banner');
		$Modules->modules_section(get_the_ID());
		?>
	<?php } ?>

	<section class="logo-slider md-padding">
		<div class="container large-container">
			<div class="heading-box text-center mb-5">
				<h2>
					We're partnered with the best
				</h2>
			</div>
			<div class="logo-slider">
				<div class="swiper mySwiper-logoSwiper">
					<div class="swiper-wrapper text-center align-items-center">
						<div class="swiper-slide">
							<div class="image-box">
								<img src="/wp-content/uploads/2022/07/e-on-black.png" alt="">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="image-box">
								<img src="/wp-content/uploads/2022/07/vaillant-logo-black.png" alt="">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="image-box">
								<img src="/wp-content/uploads/2022/07/sentinel-logo-black.png" alt="">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="image-box">
								<img src="/wp-content/uploads/2022/07/stelrad-logo.png" alt="">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="image-box">
								<img src="/wp-content/uploads/2022/07/daikin-logo-black.png" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="grid-section">
		<div class="container-fluid gx-0">
			<div class="row g-3">
				<div class="col-lg-4 col-6">
					<div class="column-holder h-100">
						<div class="grid-box d-flex flex-column justify-content-end h-100 position-relative text-white text-center	">
							<div class="background-image">
								<img src="/wp-content/uploads/2022/07/image-1.jpg" alt="">
							</div>
							<div class="heading-box mb-4">
								<h3>
									Boilers
								</h3>
							</div>
							<div class="button-box button-accent medium-text">
								<a href="#">Learn more</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-6">
					<div class="column-holder h-100">
						<div class="grid-box d-flex flex-column justify-content-end h-100 position-relative text-white text-center	">
							<div class="background-image">
								<img src="/wp-content/uploads/2022/07/image-2.jpg" alt="">
							</div>
							<div class="heading-box mb-4">
								<h3>
									Heating Systems
								</h3>
							</div>
							<div class="button-box button-accent medium-text">
								<a href="#">Learn more</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-6">
					<div class="column-holder h-100">
						<div class="grid-box d-flex flex-column justify-content-end h-100 position-relative text-white text-center	">
							<div class="background-image">
								<img src="/wp-content/uploads/2022/07/image-3.jpg" alt="">
							</div>
							<div class="heading-box mb-4">
								<h3>
									Insulation
								</h3>
							</div>
							<div class="button-box button-accent medium-text">
								<a href="#">Learn more</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-6">
					<div class="column-holder h-100">
						<div class="grid-box d-flex flex-column justify-content-end h-100 position-relative text-white text-center	">
							<div class="background-image">
								<img src="/wp-content/uploads/2022/07/image-1.jpg" alt="">
							</div>
							<div class="heading-box mb-4">
								<h3>
									Heat Pumps
								</h3>
							</div>
							<div class="button-box button-accent medium-text">
								<a href="#">Learn more</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-6">
					<div class="column-holder h-100">
						<div class="grid-box d-flex flex-column justify-content-end h-100 position-relative text-white text-center	">
							<div class="background-image">
								<img src="/wp-content/uploads/2022/07/image-2.jpg" alt="">
							</div>
							<div class="heading-box mb-4">
								<h3>
									Solar PV
								</h3>
							</div>
							<div class="button-box button-accent medium-text">
								<a href="#">Learn more</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-6">
					<div class="column-holder h-100">
						<div class="grid-box d-flex flex-column justify-content-end h-100 position-relative text-white text-center	">
							<div class="background-image">
								<img src="/wp-content/uploads/2022/07/image-3.jpg" alt="">
							</div>
							<div class="heading-box mb-4">
								<h3>
									ECO4 / BUS Grants
								</h3>
							</div>
							<div class="button-box button-accent medium-text">
								<a href="#">Learn more</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<section class="image-info-boxes lg-padding">
		<div class="container text-center">
			<div class="heading-box">
				<h2>
					Save in three simple steps
				</h2>
			</div>
			<div class="row mb-5">
				<div class="col-lg-4">
					<div class="column-holder">
						<div class="image-info-box mb-5 mb-lg-0">
							<div class="image-box top-icon text-center text-lg-start mb-5 ">
								<img src="/wp-content/uploads/2022/07/1-icon.svg" alt="">
							</div>
							<div class="image-box mb-3">
								<img src="/wp-content/uploads/2022/07/icon-2.png" alt="">
							</div>
							<div class="heading-box medium-heading h2 mb-4">
								<h3>
									Selection
								</h3>
							</div>
							<div class="description-box light-color">
								<p>
									Use our handy online tool to get an instant quote
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="column-holder">
						<div class="image-info-box mb-5 mb-lg-0">
							<div class="image-box top-icon text-center text-lg-start mb-5 ">
								<img src="/wp-content/uploads/2022/07/2-icon.svg" alt="">
							</div>
							<div class="image-box mb-3">
								<img src="/wp-content/uploads/2022/07/icon-1.png" alt="">
							</div>
							<div class="heading-box medium-heading h2 mb-4">
								<h3>
									Information
								</h3>
							</div>
							<div class="description-box light-color">
								<p>
									Use our handy online tool to get an instant quote
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="column-holder">
						<div class="image-info-box mb-5 mb-lg-0">
							<div class="image-box top-icon text-center text-lg-start mb-5 ">
								<img src="/wp-content/uploads/2022/07/3-icon.svg" alt="">
							</div>
							<div class="image-box mb-3">
								<img src="/wp-content/uploads/2022/07/icon-3.png" alt="">
							</div>
							<div class="heading-box medium-heading h2 mb-4">
								<h3>
									Installation
								</h3>
							</div>
							<div class="description-box light-color">
								<p>
									Use our handy online tool to get an instant quote
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="button-box button-secondary button-big">
				<a href="#">Get an instant quote</a>
			</div>
		</div>
	</section>

	<section class="testimonials background-gray md-padding">
		<div class="container">
			<div class="heading-box text-center">
				<h2>
					Hundreds of warmer customers nationwide
				</h2>
			</div>
			<div class="testimonial-box position-relative">
				<div class="swiper mySwiper-Testimonial">
					<div class="swiper-wrapper">
						<div class="swiper-slide h-100">
							<div class="swiper-holder h-100">
								<div class="rating-box d-flex justify-content-between mb-3">
									<div class="stars ">
										<div class="stars-holder d-flex align-items-center">
											<?= $SVG->star ?>
											<?= $SVG->star ?>
											<?= $SVG->star ?>
											<?= $SVG->star ?>
											<?= $SVG->star ?>
										</div>
									</div>
									<div class="day small-text light-color">
										4 days ago
									</div>
								</div>
								<div class="inner">
									<div class="heading-box fw-semibold">
										<h4>Absolutely speechless</h4>
									</div>
									<div class="description-box medium-text mb-3">
										<p>
											Service of this company was just marvellous! I will definitely use their products again.
										</p>
									</div>
									<div class="author-box light-color small-text">
										<span>David Narrator</span>
									</div>
								</div>
							</div>
						</div>
						<div class="swiper-slide h-100">
							<div class="swiper-holder h-100">
								<div class="rating-box d-flex justify-content-between mb-3">
									<div class="stars ">
										<div class="stars-holder d-flex align-items-center">
											<?= $SVG->star ?>
											<?= $SVG->star ?>
											<?= $SVG->star ?>
											<?= $SVG->star ?>
											<div class="gray-star">
												<?= $SVG->star ?>
											</div>
										</div>
									</div>
									<div class="day small-text light-color">
										4 days ago
									</div>
								</div>
								<div class="inner">
									<div class="heading-box fw-semibold">
										<h4>Highly Recommended</h4>
									</div>
									<div class="description-box medium-text mb-3">
										<p>
											I can recommend this company without any doubt. Good job, guys!
										</p>
									</div>
									<div class="author-box light-color small-text">
										<span>John Doe</span>
									</div>
								</div>
							</div>
						</div>
						<div class="swiper-slide h-100">
							<div class="swiper-holder h-100">
								<div class="rating-box d-flex justify-content-between mb-3">
									<div class="stars ">
										<div class="stars-holder d-flex align-items-center">
											<?= $SVG->star ?>
											<?= $SVG->star ?>
											<?= $SVG->star ?>
											<?= $SVG->star ?>
											<?= $SVG->star ?>
										</div>
									</div>
									<div class="day small-text light-color">
										4 days ago
									</div>
								</div>
								<div class="inner">
									<div class="heading-box fw-semibold">
										<h4>Highly Recommended</h4>
									</div>
									<div class="description-box medium-text mb-3">
										<p>
											I tried a lot of other services, but this one was the best and completely fulfilled my expectations
										</p>
									</div>
									<div class="author-box light-color small-text">
										<span>Jane Doe</span>
									</div>
								</div>
							</div>
						</div>
						<div class="swiper-slide h-100">
							<div class="swiper-holder h-100">
								<div class="rating-box d-flex justify-content-between mb-3">
									<div class="stars ">
										<div class="stars-holder d-flex align-items-center">
											<?= $SVG->star ?>
											<?= $SVG->star ?>
											<?= $SVG->star ?>
											<?= $SVG->star ?>
											<div class="gray-star">
												<?= $SVG->star ?>
											</div>
										</div>
									</div>
									<div class="day small-text light-color">
										4 days ago
									</div>
								</div>
								<div class="inner">
									<div class="heading-box fw-semibold">
										<h4>Highly Recommended</h4>
									</div>
									<div class="description-box medium-text mb-3">
										<p>
											I can recommend this company without any doubt. Good job, guys!
										</p>
									</div>
									<div class="author-box light-color small-text">
										<span>John Doe</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>
		</section>


		<section class="image-section lg-padding">
			<div class="container text-center">
				<div class="heading-box no-margin">
					<h2>
						Energy Matters magazine
					</h2>
				</div>
				<div class="description-box mb-5 light-color">
					<p>
						Packed with energy-saving tips.
					</p>
				</div>
				<div class="image-box mb-5">
					<img class="d-none d-lg-inline" src="http://nationalwarmth.co.uk/wp-content/uploads/2022/07/Magazine-1.png" alt="">
					<img class="d-inline d-lg-none"src="http://nationalwarmth.co.uk/wp-content/uploads/2022/07/Magazine-mobile.png" alt="">
				</div>
				<div class="subscribe-box">
					<div class="description-box text-center medium-text light-color mb-4">
						<p>
							Enter your email address below to subscribe to our quarterly magazine.
						</p>
					</div>
					<div class="form-box">
						<?= do_shortcode('[contact-form-7 id="85" title="Subscribe Form"]') ?>
					</div>
				</div>
			</div>
		</section>


	</main>
	<?php get_footer(); ?>


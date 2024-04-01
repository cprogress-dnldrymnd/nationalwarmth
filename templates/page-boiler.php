<?php
/*-----------------------------------------------------------------------------------*/
/* Template Name: Boiler Page
/*-----------------------------------------------------------------------------------*/
?>

<?php get_header(); ?>

<?php 
?>

<main id="main" class="page-components">
	<?= get_template_part('template-parts/section/content', 'banner'); ?>
	<section class="logo-slider md-padding">
		<div class="container large-container">
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
	<section class="xl-padding" style="border-top: 3px solid #F3F3F3">
		<div class="container">
			<img style="width: 100%" src="http://nationalwarmth.co.uk/wp-content/uploads/2022/07/screencapture-xd-adobe-view-ba75312f-57a2-46f8-b76a-844fafcc7666-ef26-screen-694c1bcf-f45b-429c-bfbc-b5c20e0e74fa-specs-2022-07-13-00_19_46.png" alt="">
		</div>
	</section>
</main>
<?php get_footer(); ?>
<?php 
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$SVG = new SVG;

$heading = $module['heading'];
$description = $module['description'];
$icon = $module['icon'];
$disable_module = $module['disable_module'];
$gallery = $module['gallery'];
$gallery_images = $GetData->get_gallery_images_id($gallery);
?>
<?php if(!$disable_module) { ?>
	<!-- <section <?= $GetData->get_attributes('hero-banner-slider text-center centered', $module_id, $template_class) ?>>
		<?php if($template_class) { ?>
			<?= $Helpers->get_edit_url('post.php?post='.$postid.'&action=edit', 'Edit Template') ?>
		<?php } ?>
		<?php 
		$DisplayData->slides(array(
			'slides' => $gallery_images,
		));
		?>
		<div class="container small-container text-white">
			<?php
			$DisplayData->image(array(
				'image_id' => $icon,
				'size' => 'medium',
			), 'mb-3', 'fade-left');
			$DisplayData->heading(array(
				'heading' => $heading,
			), 'big', 'fade-right');
			$DisplayData->description(array(
				'description' => $description
			), false, 'fade-right');
			if(isset($module['hero_banner_button_type'])) {
				$DisplayData->button(
					$module['hero_banner_button_text'], 
					$module['hero_banner_'.$module['hero_banner_button_type']],
					$module['hero_banner_button_action'],
					'button-white',
					'fade-left'
				);
			}
			?>
		</div>
	</section> -->
<?php } ?>

<section class="hero-banner-slider">
	<div class="container-fluid padding-left-right">
		<div class="swiper mySwiper-Hero-Slider background-primary">
			<div class="swiper-wrapper text-white">
				<div class="swiper-slide">
					<div class="image-box background-image">
						<img src="https://cocoa.theprogressteam.com/wp-content/uploads/2022/06/hero-slide-image-1.jpg" alt="">
					</div>
					<div class="container">
						<div class="container-holder">
							<div class="heading-box accent-font">
								<h2>HAND-MADE, ORGANIC CHOCOLATE BARS</h2>
							</div>
							<div class="description-box">
								<p>
									All made by hand in the Scottish Highlands with organic <br>chocolate sourced from the Dominican Republic.
								</p>
							</div>
							<div class="button-box button-bordered">
								<a href="#">
									<span>SHOP NOW</span>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="swiper-slide">
					<div class="image-box background-image">
						<img src="https://cocoa.theprogressteam.com/wp-content/uploads/2022/06/hero-slide-image-1.jpg" alt="">
					</div>
					<div class="container">
						<div class="container-holder">
							<div class="heading-box accent-font">
								<h2>HAND-MADE, ORGANIC CHOCOLATE BARS</h2>
							</div>
							<div class="description-box">
								<p>
									All made by hand in the Scottish Highlands with organic <br>chocolate sourced from the Dominican Republic.
								</p>
							</div>
							<div class="button-box button-bordered">
								<a href="#">
									<span>SHOP NOW</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
			<div class="swiper-pagination"></div>
		</div>
	</div>
</section>

<section class="featured-products product-slider large-padding-top large-padding-bottom text-center padding-left-right">
	<div class="container-fluid p-0">
		<div class="container">
			<div class="heading-box text-center">
				<h2>CHOCOLATES FOR THIS SEASON</h2>
			</div>
			<?= do_shortcode( '[featured_products]' ) ?>
		</div>
	</div>
</section>

<section class="two-column-image-text">
	<div class="container-fluid padding-left-right">
		<div class="row">
			<div class="col-md-6">
				<div class="column-holder image-holder">
					<div class="image-box">
						<img src="https://cocoa.theprogressteam.com/wp-content/uploads/2022/06/cocoa-mountain-btw.jpg" alt="">
					</div>
				</div>
			</div>
			<div class="col-md-6 background-pattern">
				<div class="column-holder text-holder align-center">
					<div class="inner">
						<div class="heading-box">
							<h2>
								THE MOST GEOGRAPHICALLY REMOTE CHOCOLATIERS IN EUROPE
							</h2>
						</div>
						<div class="description-box secondary-font">
							<p>
								Paul and James founded Cocoa Mountain in June 2006 with the simple aim to produce the most delicious, fresh, and innovative chocolates on the planet. We are probably the most geographically remote chocolate producer in Europe, and feel that the beauty of our surroundings should be reflected in the quality of our products. We are fortunate to be able to produce a fantastic product that makes people smile and be happy - and as a small but growing team, we all take satisfaction and enjoyment from our daily work!
							</p>
						</div>
						<div class="button-group-box ">
							<div class="button-box button-primary">
								<a href=""> <span>About Us</span> </a>
							</div>
							<div class="button-box button-bordered">
								<a href=""> <span>VISIT US</span> <span class="icon"><?= $SVG->location ?></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="featured-boxes large-padding-top text-white">
	<div class="container-fluid">
		<div class="container-holder">
			<div class="row">
				<div class="col-md-6">
					<div class="column-holder align-end text-end">
						<div class="inner">
							<div class="image-box background-image m-0">
								<img src="https://cocoa.theprogressteam.com/wp-content/uploads/2022/06/d-40-crop-1.jpg" alt="">
							</div>
							<div class="heading-box accent-font">
								<h2>LUXURY<br> COLLECTIONS<br> & GIFT BOXES</h2>
							</div>
							<div class="button-box button-bordered">
								<a href="">SHOP NOW</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="column-holder align-flex-end">
						<div class="inner">
							<div class="image-box background-image m-0">
								<img src="https://cocoa.theprogressteam.com/wp-content/uploads/2022/06/collection_of_6bars.jpg" alt="">
							</div>
							<div class="heading-box accent-font">
								<h2>HAND-MADE, <br>ORGANIC<br> CHOCOLATE BARS</h2>
							</div>
							<div class="button-box button-bordered">
								<a href="">SHOP NOW</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="newsletter large-padding-top large-padding-bottom text-center">
	<div class="container">
		<div class="inner">
			<div class="heading-box">
				<h2>
					GET 10% OFF YOUR FIRST ORDER
				</h2>
			</div>
			<div class="description-box secondary-font">
				<p>
					Join our mailing list and get 10% off your first order.
				</p>
			</div>
			<div class="shortcode-box">
				<?= do_shortcode( '[contact-form-7 id="120" title="Mailing List"]' ) ?>
			</div>
		</div>
	</div>
</section>

<section class="background-image-with-text  padding-left-right">
	<div class="container-fluid bg-image text-center text-white" style="background-image: url(https://cocoa.theprogressteam.com/wp-content/uploads/2022/06/bg-image.jpg)">
		<div class="inner">
			<h3>
				"You are to the chocolate industry what Einstein was to physics"
			</h3>
		</div>
	</div>
</section>
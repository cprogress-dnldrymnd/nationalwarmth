<?php 
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$heading = $module['heading'];
$description = $module['description'];
$gallery = $module['gallery'];
$disable_module = $module['disable_module'];
$gallery_images = $GetData->get_gallery_images_id($gallery);
?>
<?php if(!$disable_module) { ?>
	<section <?= $GetData->get_attributes('slider background-pattern text small-padding-top small-padding-bottom', $module_id, $template_class) ?>>
		<div class="container text-center" data-aos="fade-up">
			<?php 
			$DisplayData->heading(array(
				'heading' => $heading,
			), '', false);
			?>
			<?php if($gallery_images) { ?>
				<div class="logo-slider">
					<div class="swiper logoSwiper">
						<div class="swiper-wrapper align-items-center">
							<?php foreach($gallery_images as $image) { ?>
								<div class="swiper-slide">
									<?php 
									$DisplayData->image(array(
										'image_id' => $image,
										'size' => 'medium',
									));
									?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</section>
	<?php } ?>
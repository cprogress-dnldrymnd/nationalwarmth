<?php 
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$Theme_Options = new Theme_Options;
$heading = $module['heading'];
$description = $module['description'];
$disable_module = $module['disable_module'];
$gallery = $module['gallery'];
$gallery_images = $GetData->get_gallery_images_id($gallery);

if(!$disable_module) {
	?>
	<section <?= $GetData->get_attributes('text-with-images small-padding-top small-padding-bottom', $module_id, $template_class) ?>>
		<?php if($template_class) { ?>
			<?= $Helpers->get_edit_url('post.php?post='.$postid.'&action=edit', 'Edit Template') ?>
		<?php } ?>
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="column-holder">
						<?php 
						$DisplayData->heading(array(
							'heading' => $heading,
							'tag' => 'h4',
						), false, 'fade-right');
						$DisplayData->description(array(
							'description' => $description
						), '', 'fade-left');
						if(isset($module['text_images_button_type'])) {
							$DisplayData->button(
								$module['text_images_button_text'], 
								$module['text_images_'.$module['text_images_button_type']],
								$module['text_images_button_action'],
								'',
								'fade-left'
							);
						}
						?>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="column-holder column-images">
						<div class="row align--center">
							<div class="col-md-6 mb-0">
								<?php
								if( $gallery_images[0] ) { 
									$DisplayData->image(array(
										'image_id' => $gallery_images[0],
										'size' => 'large',
									), '', 'zoom-in');
								}
								?>
							</div>
							<div class="col-md-6">
								<?php
								if( $gallery_images[1] ) { 
									$DisplayData->image(array(
										'image_id' => $gallery_images[1],
										'size' => 'large',
									), '', 'zoom-in');
								}
								?>
								<?php
								if( $gallery_images[2] ) { 
									$DisplayData->image(array(
										'image_id' => $gallery_images[2],
										'size' => 'large',
									), '', 'zoom-in');
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>
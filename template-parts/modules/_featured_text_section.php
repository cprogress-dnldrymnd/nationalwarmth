<?php 
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$Theme_Options = new Theme_Options;
$heading = $module['heading'];
$description = $module['description'];
$bg_image = $module['bg_image'];
$disable_module = $module['disable_module'];
?>
<?php if(!$disable_module) { ?>
	<section <?= $GetData->get_attributes('featured-text small-padding-top small-padding-bottom align-flex-end fullheight-desktop bg-image bg-fixed', $module_id, $template_class) ?> <?= $GetData->get_background_image($bg_image) ?> >
		<?php if($template_class) { ?>
			<?= $Helpers->get_edit_url('post.php?post='.$postid.'&action=edit', 'Edit Template') ?>
		<?php } ?>
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="column-holder text-white" data-aos="fade-right">
						<?php 
						$DisplayData->heading(array(
							'heading' => $heading,
						), false, false);
						$DisplayData->description(array(
							'description' => $description
						), 'with-separator', false);

						if(isset($module['featured_button_type'])) {
							$DisplayData->button(
								$module['featured_button_text'], 
								$module['featured_'.$module['featured_button_type']],
								$module['featured_button_action'],
								'button-white',
								false
							);
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>
<?php 
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$heading = $module['heading'];
$description = $module['description'];
$icon = $module['icon'];
$image = $module['image'];
$disable_module = $module['disable_module'];
?>
<?php if(!$disable_module) { ?>
	<section <?= $GetData->get_attributes('two-columns small-padding-top small-padding-bottom background-gray', $module_id, $template_class) ?>>
		<?php if($template_class) { ?>
			<?= $Helpers->get_edit_url('post.php?post='.$postid.'&action=edit', 'Edit Template') ?>
		<?php } ?>
		<div class="container">
			<div class="row align--center">
				<div class="col-lg-5">
					<div class="column-holder text-center">
						<?php 
						$DisplayData->image(array(
							'image_id' => $icon,
							'size' => 'medium',
						), 'mb-4', 'fade-left');
						$DisplayData->heading(array(
							'heading' => $heading,
						), false, 'fade-right');
						$DisplayData->description(array(
							'description' => $description
						), false, 'fade-left');
						if(isset($module['two_column_button_type'])) {
							$DisplayData->button(
								$module['two_column_button_text'], 
								$module['two_column_'.$module['two_column_button_type']],
								$module['two_column_button_action'],
								false,
								'fade-right'
							);
						}
						?>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="column-holder">
						<?php 
						$DisplayData->image(array(
							'image_id' => $image,
							'size' => 'full',
						), false, 'fade-left');
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>
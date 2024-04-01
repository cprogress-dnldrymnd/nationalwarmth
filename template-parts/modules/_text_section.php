<?php 
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$Theme_Options = new Theme_Options;

$icon = $module['icon'];
$heading = $module['heading'];
$description = $module['description'];
$disable_module = $module['disable_module'];
if(!$disable_module) {
	?>
	<section <?= $GetData->get_attributes('text-section extra-large-padding-bottom extra-large-padding-top background-pattern text-center', $module_id, $template_class) ?>>
		<?php if($template_class) { ?>
			<?= $Helpers->get_edit_url('post.php?post='.$postid.'&action=edit', 'Edit Template') ?>
		<?php } ?>
		<div class="container small-container">
			<?php 
			$DisplayData->image(array(
				'image_id' => $icon,
				'size' => 'medium',
			), 'mb-2', 'fade-left');
			$DisplayData->heading(array(
				'heading' => $heading,
			), false, 'fade-right');
			$DisplayData->description(array(
				'description' => $description
			), 'with-separator', 'fade-left');
			?>
		</div>
	</section>

	<?php } ?>
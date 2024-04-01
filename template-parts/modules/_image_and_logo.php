<?php 
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$Theme_Options = new Theme_Options;
$image = $module['image'];
$disable_module = $module['disable_module'];
?>
<section <?= $GetData->get_attributes('image-logo', $module_id, $template_class) ?>>
	<?php if($template_class) { ?>
		<?= $Helpers->get_edit_url('post.php?post='.$postid.'&action=edit', 'Edit Template') ?>
	<?php } ?>
	<div class="container-fluid no-gutters gx-0">
		<div class="row align--center">
			<div class="col-md-7 m-0" data-aos="fade-left">
				<div class="column-holder">
					<?php 
					$DisplayData->image(array(
						'image_id' => $image,
						'size' => 'full',
					),false, false);
					?>
				</div>
			</div>
			<div class="col-md-5 hide-xs">
				<div class="column-holder text-center logo-holder px-3 small-padding-top small-padding-bottom">
					<div class="image-box" data-aos="fade-up">
						<img src="<?= $Theme_Options->alt_logo_url ?>" alt="Site Logo">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$Theme_Options = new Theme_Options;
$heading = $module['heading'];
$description = $module['description'];
$wysiwyg = $module['wysiwyg'];
$wysiwyg2 = $module['wysiwyg2'];
$disable_module = $module['disable_module'];
$two_columns = $module['two_columns'];

if (!$disable_module) { ?>
	<section <?= $GetData->get_attributes('wysiwyg text-section md-padding', $module_id, $template_class) ?>>
		<?php if ($template_class) { ?>
			<?= $Helpers->get_edit_url('post.php?post=' . $postid . '&action=edit', 'Edit Template') ?>
		<?php } ?>
		<div class="container" data-aos="fade-in">
			<div class="row g-5">
				<div class="col-12">
					<div class="content-margin">
						<?php
						$DisplayData->heading(array(
							'heading' => $heading
						));
						$DisplayData->description(array(
							'description' => $description
						), 'content-margin', false);
						?>
					</div>
				</div>

				<div class="<?= $two_columns ? 'col-lg-6' : 'col-12' ?>">
					<?php
					$DisplayData->description(array(
						'description' => $wysiwyg
					), 'content-margin', false);

					?>
				</div>

				<?php if ($two_columns) { ?>
					<div class="<?= $two_columns ? 'col-lg-6' : 'col-12' ?>">
						<?php
						$DisplayData->description(array(
							'description' => $wysiwyg2
						), 'content-margin', false);
						?>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>
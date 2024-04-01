<?php 
$DisplayData = new DisplayData();
$Theme_Options = new Theme_Options();

$hide_page_banner = carbon_get_the_post_meta('hide_page_banner');
$page_banner_style = carbon_get_the_post_meta('page_banner_style');
$page_banner_description = carbon_get_the_post_meta('page_banner_description');

$background = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $Theme_Options->default_page_banner;
$title = get_the_title();
$SVG = new SVG;
?>
<section class="page-banner text-center centered xl-padding background-secondary <?= $page_banner_style ?>">
	<div class="background-image bg-image" style="background-image: url(<?= $background ?>)">
		
	</div>
	<div class="container medium-container">
		<div class="container-holder">
			<?php 
			$DisplayData->heading(array(
				'heading' => $title,
			), 'text-white big-heading fw-bold', false);
			$DisplayData->description(array(
				'description' => $page_banner_description,
			), 'text-white', false);
			?>
		</div>
		<?php if($page_banner_style == 'style-2') { ?>
			<div class="stars d-inline-flex align-items-center">
				<div class="text me-3 text-white medium-text fw-semibold">
					Excellent
				</div>
				<div class="stars">
					<div class="stars-holder d-flex align-items-center">
						<?= $SVG->star ?>
						<?= $SVG->star ?>
						<?= $SVG->star ?>
						<?= $SVG->star ?>
						<?= $SVG->star ?>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</section>

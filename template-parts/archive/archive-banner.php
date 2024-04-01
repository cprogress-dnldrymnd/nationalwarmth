<?php
$DisplayData = new DisplayData;
if (is_single()) {
	$title = 'Blog: '.get_the_title();
} else {
	if (is_home()) {
		$alt_title = carbon_get_theme_option('post_alt_title');
		$page_for_posts = get_option('page_for_posts');
		$title = $alt_title ? $alt_title : get_the_title($page_for_posts);
		$description = carbon_get_theme_option('post_description');
	}
	if (is_search()) {
		$title = 'Search results for ' . $_GET['s'];
	} else {
		$alt_title = carbon_get_theme_option(get_post_type() . '_alt_title');
		$title = $alt_title ? $alt_title : get_the_archive_title();
		$description = get_the_archive_description() ? get_the_archive_description() : carbon_get_theme_option(get_post_type() . '_description');
	}
}
?>
<section class="project-title-section archive-banner md-padding" data-aos="fade-left">
	<div class="container">
		<h1 class="mb-4"><?= $title ?></h1>
		<?php
		if (isset($description)) {
			$DisplayData->description(array(
				'description' => $description,
			));
		}
		?>

		<?php if (is_search()) { ?>
			<div class="searchwp-modal-form__content banner-search">
				<form role="search" method="get" id="searchform" class="searchform" action="https://katlas.theprogressteam.com/">
					<div>
						<label class="screen-reader-text" for="s">Search for:</label>
						<input type="text" value="<?= isset($_GET['s']) ? $_GET['s'] : '' ?>" name="s" id="s" class="filled">
						<input type="submit" id="searchsubmit" value="Search">
					</div>
				</form>
			</div>
		<?php } ?>
	</div>
</section>
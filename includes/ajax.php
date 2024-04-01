<?php
add_action('wp_ajax_nopriv_archive_ajax', 'archive_ajax'); // for not logged in users
add_action('wp_ajax_archive_ajax', 'archive_ajax');
function archive_ajax()
{
	$DisplayData = new DisplayData();
	$category = $_POST['category'];
	$taxonomy = $_POST['taxonomy'];
	$post_type = $_POST['post_type'];
	$offset = $_POST['offset'];
	$sortby = $_POST['sortby'];
	$posts_per_page = 6;

	$args = array(
		'post_type' => $post_type,
		'posts_per_page' => $posts_per_page,
	);

	if ($offset) {
		$args['offset'] = $offset;
	}

	if ($sortby) {
		if ($sortby == 'oldest') {
			$args['order'] = 'ASC';
		} else if ($sortby == 'title') {
			$args['orderby'] = 'title';
			$args['order'] = 'ASC';
		}
	}

	if ($category) {
		if ($taxonomy != 'category') {
			$args['tax_query'] = array(
				array(
					'taxonomy' => $taxonomy,
					'field'    => 'term_id',
					'terms'    => $category,
				),
			);
		} else {
			$args['cat'] = $category;
		}
	}

	$the_query = new WP_Query($args);

	$count = $the_query->found_posts;
	echo hide_load_more($count, $offset, $posts_per_page);
?>
	<?php if (!$offset) { ?>
		<div class="row">
		<?php } ?>
		<?php
		if ($the_query->have_posts()) {
			while ($the_query->have_posts()) {
				$the_query->the_post();
				$permalink = get_the_permalink();
				$target = '';
		?>
				<div class="col-lg-4 col-md-6 post-item">
					<div class="column-holder post-holder">
						<article class="post post-<?= get_the_ID()  ?>">
							<a href="<?= $permalink ?>" class="post-image-link" <?= $target ?>>
								<?php
								if(get_post_thumbnail_id()) {
								$DisplayData->image(array(
									'image_id' => get_post_thumbnail_id(),
									'size' => 'large',
								));
								} else {
									echo '<div class="image-box"></div>';
								}
								?>
								<?php if ($post_type == 'post') { ?>
									<div class="date">
										<?= get_the_date('jS F Y') ?>
									</div>
								<?php } ?>
							</a>
							<div class="content-holder ">
								<?php get_template_part('template-parts/archive/archive', 'category') ?>

								
								<a href="<?= $permalink ?>" <?= $target ?>>
									<?php
									$DisplayData->heading(array(
										'heading' => get_the_title(),
										'tag' => 'h3'
									))
									?>
								</a>
							</div>

							<a href="<?= $permalink ?>" class="arrow-con background-accent arrow-box" <?= $target ?>>
								<span class="arrow right"><span></span></span>
							</a>
						</article>
					</div>
				</div>
			<?php }
		} else {
			?>
			<h2>No Results Found</h2>
		<?php
		}
		wp_reset_postdata();
		?>
		<?php if (!$offset) { ?>
		</div>
	<?php } ?>


<?php

	die();
}


function hide_load_more($count, $offset, $posts_per_page)
{
	if ($count == ($offset + $posts_per_page) || $count < ($offset + $posts_per_page) || $count < $posts_per_page + 1) {
		return '<style>.load-more {display: none} </style>';
	}
}

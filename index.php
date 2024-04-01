<?php

/**
 * The template for displaying any archive page.
 */
get_header();
$DisplayData = new DisplayData();
$post_type = get_post_type();
?>
<main id="main">
	<div class="show-sticky"></div>
	<?php get_template_part('template-parts/archive/archive', 'banner') ?>

	<?php
	if (!is_search()) {
		get_template_part('template-parts/archive/archive', 'filter');
	}
	?>
	<?php if (have_posts()) :
		// Do we have any posts/pages in the databse that match our query?
	?>
		<?php if (!is_search()) { ?>
			<section class="archive-section md-padding background-light">
				<div class="container ">
					<div id="results">
						<div class="results-holder">

						</div>
					</div>


					<div class="load-more text-center">
						<a href="#" id="load-more" class="d-none underline-link">
							<span>Load more</span>
							<div class="fa-spinner">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
									<path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z" />
								</svg>
							</div>
						</a>
					</div>
				</div>
			</section>
		<?php } else { ?>
			<section class="archive-section background-light search">
				<div class="container">
					<div class="row">
						<?php while (have_posts()) {
							the_post();  ?>
							<?php $DisplayData = new DisplayData(); ?>
							<div class="col-lg-4 col-md-6 post-item">
								<div class="column-holder post-holder">
									<article class="post post-<?= get_the_ID()  ?>">
										<a href="<?php the_permalink() ?>" class="post-image-link">
											<?php
											$DisplayData->image(get_post_thumbnail_id(), 'large', false);
											$post_type_obj = get_post_type_object(get_post_type());
											$post_type = $post_type_obj->labels->singular_name;
											$company_logo = carbon_get_the_post_meta('company_logo');
											?>
											<?php if ($post_type == 'Post') { ?>
												<div class="date">
													<?= get_the_date('jS F Y') ?>
												</div>
											<?php } ?>
											<span class="post-type">
												<?php if ($post_type == 'Post') { ?>
													Blog
												<?php } else { ?>
													<?= $post_type ?>
												<?php } ?>
											</span>
										</a>
										<div class="content-holder <?= $company_logo ? 'has-logo' : '' ?>">
											<?php get_template_part('template-parts/archive/archive', 'category') ?>

											<?php if ($company_logo) { ?>
												<?php $DisplayData->image($company_logo, 'medium', false, 'company-logo') ?>
											<?php } ?>

											<a href="<?php the_permalink() ?>">
												<?php
												$DisplayData->heading(get_the_title(), 'h3', false, false)
												?>
											</a>
										</div>

										<a href="<?php the_permalink() ?>" class="arrow-con background-accent arrow-box">
											<span class="arrow right"><span></span></span>
										</a>
									</article>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</section>
		<?php } ?>
	<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) 
	?>
		<section class="archive-section background-light search">
			<div class="container">
				<h2>Nothing posted yet</h2>
			</div>
		</section>
	<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) 
	?>

	<?php
	if (!is_search() && get_post_type() != 'post') {
		get_template_part('template-parts/footer/content', 'sticky-cta');
	}
	?>
</main>



<?php get_footer(); ?>

<script>
	jQuery(document).ready(function($) {
		jQuery('#archive-form-filter').change();
	});
</script>
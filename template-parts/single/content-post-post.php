<?php
get_template_part('template-parts/single/section/section', 'title');

?>
<section class="md-padding the-content ">
	<div class="container small-container">
		<div class="image-box">
			<?php the_post_thumbnail('full') ?>
		</div>
		<?php the_content() ?>
		<div class="back-to mt-5 text-center">
			<a href="<?= get_permalink(get_option('page_for_posts')) ?>" class="underline-link">
				Back to blog
			</a>
		</div>
	</div>
</section>

<?php
get_template_part('template-parts/global/post', 'slider');
?>
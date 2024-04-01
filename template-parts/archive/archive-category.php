<?php 
$post_type = get_post_type();
if($post_type == 'usecases') {
	$taxonomy = 'sectors';
} else if($post_type == 'casestudies') {
	$taxonomy = 'sectors';
} else if($post_type == 'post') {
	$taxonomy = 'category';
}

if(isset($taxonomy)) {
$terms = get_the_terms( get_the_ID(), $taxonomy );
?>
<?php if($terms) { ?>
	<div class="category-links">
		<?php foreach($terms as $term) { ?>
			<a href="<?= get_term_link($term->term_id) ?>"><?= $term->name ?></a>
		<?php } ?>
	</div>
<?php }
}
?>


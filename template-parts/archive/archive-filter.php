<?php
$GetData = new GetData;
$post_type = get_post_type();
$main_query = get_queried_object();
if ($post_type == 'usecases' || $post_type == 'casestudies') {
	$taxonomy = 'sectors';
	$label = 'All Sectors';
} else {
	$taxonomy = 'category';
	$label = 'All Categories';
}

$terms = $GetData->get_terms_details($taxonomy);

?>
<section class="archive-filter">
	<div class="container">
		<form id="archive-form-filter" class="archive-form-filter">
			<input type="hidden" name="post-type" value="<?= $post_type ?>">
			<input type="hidden" name="taxonomy" value="<?= $taxonomy ?>">
			<div class="row">
				<div class="col-6">
					<?php if (!is_post_type_archive('inthepress')) { ?>
						<div class="column-holder category-filter">
							<select id="category" name="category" class="nice-select-js nice-select-style-1">
								<option value=""><?= $label ?></option>
								<?php if ($terms) { ?>
									<?php foreach ($terms as $key => $term) { ?>
										<?php
										if ($main_query->term_id == $key) {
											$selected = 'selected';
										} else {
											$selected = '';
										}
										?>
										<option <?= $selected ?> value="<?= $key ?>"> <?= $term['name'] ?> </option>
									<?php } ?>
								<?php } ?>
							</select>
						</div>
					<?php } ?>
				</div>
				<div class="col-6">
					<div class="column-holder text-end">
						<span class="label">Sort by</span>
						<select name="sortby" id="sortby" class="nice-select-js nice-select-style-1">
							<option value="">Newest First</option>
							<option value="oldest">Oldest First</option>
							<option value="title">Title</option>
						</select>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>
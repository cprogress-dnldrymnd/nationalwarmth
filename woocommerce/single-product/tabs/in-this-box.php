<?php 
$DisplayData = new DisplayData;
$in_this_box = carbon_get_the_post_meta('in_this_box');
?>
<div class="in-this-box">
	<div class="row">
		<?php foreach($in_this_box as $box) { ?>
			<div class="col-lg-3 col-md-6">
				<div class="column-holder">
					<?php 
					$DisplayData->image(array(
						'image_id' => $box['product_image']
					), 'image-absolute', false);
					$DisplayData->heading(array(
						'heading' => $box['product_name'],
						'tag' => 'h4',
					), false, false);
					$DisplayData->description(array(
						'description' => $box['product_description'],
					), 'secondary-font', false);
					?>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
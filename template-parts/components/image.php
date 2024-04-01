<?php 
$GetData = new GetData;
$image_url = wp_get_attachment_image_url($data['image_id'], $data['size']);
?>
<?php if($image_url) { ?>
	<div class="image-box<?= $GetData->get_class($class) ?>" <?= $GetData->get_data_aos($data_aos) ?>>
		<img src="<?= $image_url ?>" alt="<?= $GetData->get_image_alt($data['image_id']) ?>">
	</div>
	<?php } ?>
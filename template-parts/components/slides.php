<?php 
$GetData = new GetData;
$slides = $data['slides'];
?>
<?php if($slides) { ?>
	<div id="slides" class="slides<?= $GetData->get_class($class) ?>">
		<?php foreach($slides as $slide) { ?>
			<?php $image_url = wp_get_attachment_image_url($slide, 'full'); ?>
			<div class="slide">
				<span class="animate left" style="background-image: url(<?= $image_url ?>)"></span>
			</div>
		<?php } ?>
	</div>
	<?php } ?>
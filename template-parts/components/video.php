<?php 
$GetData = new GetData;
?>
<?php if($video) { ?>
	<div class="video-box" <?= $GetData->get_data_aos($data_aos) ?>>
		<video autoplay loop muted>
			<source src="<?= wp_get_attachment_url( $video ) ?>"/>
				Your browser does not support the video tag.
			</video> 
		</div>
		<?php } ?>
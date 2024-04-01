<?php 
$GetData = new GetData;
?>
<?php 
$button_type = $button_type ? $button_type : '';
$button_link = get_permalink($button_type) ? get_permalink($button_type) : $button_type;
?>
<div class="button-box <?= $button_class ?>" <?= $GetData->get_data_aos($data_aos) ?>>
	<a href="<?= $button_link ?>" <?= $button_action ?>>
		<span><?= $button_text ? $button_text : get_the_title($button_type) ?></span>
		<span class="arrow right white"><span></span></span>
	</a>
</div>
<?php

<?php 
class DisplayData {
	function heading($data, $class='',  $data_aos='fade-up') {
		ob_start();
		include locate_template('template-parts/components/heading.php');
		echo ob_get_clean();
	}
	function description($data, $class='',  $data_aos='fade-up') {
		ob_start();
		include locate_template('template-parts/components/description.php');
		echo ob_get_clean();
	}
	function button($button_text, $button_type, $button_action, $button_class = 'accent-button', $data_aos='fade-up') {
		ob_start();
		include locate_template('template-parts/components/button.php');
		echo ob_get_clean();
	}
	function video($video, $data_aos='fade-up') {
		ob_start();
		include locate_template('template-parts/components/video.php');
		echo ob_get_clean();
	}
	function image($data, $class='', $data_aos='fade-up') {
		ob_start();
		include locate_template('template-parts/components/image.php');
		echo ob_get_clean();
	}
	function slides($data, $class='') {
		ob_start();
		include locate_template('template-parts/components/slides.php');
		echo ob_get_clean();
	}
}
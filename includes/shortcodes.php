<?php



class Shortcodes {
	function accordion($atts, $content = null) {
		$Helpers = new Helpers();
		extract(shortcode_atts(array(
			'id' => '',
		), $atts));
		$accordion = carbon_get_post_meta($id, 'accordion');
		if($accordion) {
			ob_start();
			global $section_id;
			$accordion_id = $section_id . '-' . $id;
			?>
			<div class="accordion-box has-edit accordion-<?= $accordion_id ?>">
				<?= $Helpers->get_edit_url('post.php?post='.$id.'&action=edit', 'Edit Accordion') ?>
				<div class="accordion text-left" id="accordion-<?= $accordion_id ?>">
					<?php foreach($accordion as $key => $item) { ?>
						<?php 
						$active_class = $key == 0 ? 'show' : '';
						$button_class = $key == 0 ? '' : 'collapsed';
						$area_expanded_class = $key == 0 ? 'true' : 'false';
						?>
						<div class="accordion-item accordion-item-<?= $accordion_id ?>-<?=$key ?>">
							<h2 class="accordion-header" id="heading-<?= $accordion_id ?>-<?=$key ?>">
								<button class="accordion-button justify--space-between <?= $button_class ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $accordion_id ?>-<?=$key ?>" aria-expanded="<?= $area_expanded_class ?>" aria-controls="collapse-<?= $accordion_id ?>-<?=$key ?>">
									<span class="color-secondary"><?= $item['accordion_title'] ?> <span class="color-accent">...</span> </span>
									<span class="icon color-secondary"></span>
								</button>
							</h2>
							<div id="collapse-<?= $accordion_id ?>-<?=$key ?>" class="accordion-collapse collapse <?= $active_class ?>" aria-labelledby="heading-<?= $accordion_id ?>-<?=$key ?>" data-bs-parent="#accordion-<?= $accordion_id ?>" style="">
								<div class="accordion-body">
									<?= wpautop( do_shortcode( $item['accordion_content'] ) ) ?>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			<?php
			return ob_get_clean();
		}
	}

	function phone_number() {
		$Theme_Options = new Theme_Options();
		return $Theme_Options->phone_number;
	}

	function phone_number_text() {
		$Theme_Options = new Theme_Options();
		return $Theme_Options->phone_number_text;
	}

	function phone_number_url() {
		$Theme_Options = new Theme_Options();
		return $Theme_Options->phone_number_url;
	}

	function email_address() {
		$Theme_Options = new Theme_Options();
		return $Theme_Options->email_address;
	}

	function email_address_text() {
		$Theme_Options = new Theme_Options();
		return $Theme_Options->email_address_text;
	}

	function email_address_url() {
		$Theme_Options = new Theme_Options();
		return $Theme_Options->email_address_url;
	}

	function post_title() {
		$alt_title = carbon_get_the_post_meta('alt_title');
		if($alt_title) {
			return strtolower($alt_title);
		} else {
			return strtolower(get_the_title());
		}
	}
	
	function button($atts, $content = null) {
		extract(shortcode_atts(array(
			'button_text' => '',
			'button_link' => '',
			'new_window' => '',
			'button_type' => 'button-accent'
		), $atts));
		$new_window = $new_window != 'false' ? 'target="_blank"' : '';
		$DisplayData = new DisplayData();
		if($button_text) {
			return $DisplayData->button(array(
				'link_text' => $button_text,
				'link' => $button_link,
				'link_action' => $new_window,
				'class' => 'button-accent'
			), false);
		}
	}

	function get_param($atts) {
		extract(shortcode_atts(array(
			'value' => '',
		), $atts));
		if(isset($_GET[$value])) {
			return $_GET[$value];
		}
	}

	function contact_details() {
		$SVG = new SVG;
		$Theme_Options = new Theme_Options();
		ob_start();
		?>
		<h5 class="widget-title">CONTACT</h5>
		<ul class="icon-box">
			<?php if($Theme_Options->phone_number) { ?>
				<li>
					<span class="icon"><?= $SVG->phone_alt ?></span>
					<span> <?= $Theme_Options->phone_number ?> </span>
				</li>
			<?php } ?>
			<?php if($Theme_Options->email_address) { ?>
				<li>
					<span class="icon"><?= $SVG->email ?></span>
					<span> <?= $Theme_Options->email_address ?> </span>
				</li>
			<?php } ?>
			<?php if($Theme_Options->location_1) { ?>
				<li>
					<span class="icon"><?= $SVG->location_alt ?></span>
					<span> <?= $Theme_Options->location_1 ?> </span>
				</li>
			<?php } ?>
			<?php if($Theme_Options->location_2) { ?>
				<li>
					<span class="icon"><?= $SVG->location_alt ?></span>
					<span> <?= $Theme_Options->location_2 ?> </span>
				</li>
			<?php } ?>
		</ul>
		<?php
		return ob_get_clean();	
	}

	function social_links() {
		$SVG = new SVG;
		ob_start();
		?>
		<ul class="icon-list-box align-center">
			<li><a href=""><?= $SVG->facebook ?></a></li>
			<li><a href=""><?= $SVG->twitter ?></a></li>
			<li><a href=""><?= $SVG->instagram ?></a></li>
		</ul>
		<?php
		return ob_get_clean();
	}

}
$Shortcodes = new Shortcodes;
add_shortcode( 'phone_number_text', array( $Shortcodes, 'phone_number_text' ) );
add_shortcode( 'phone_number', array( $Shortcodes, 'phone_number' ) );
add_shortcode( 'phone_number_url', array( $Shortcodes, 'phone_number_url' ) );
add_shortcode( 'email_address_text', array( $Shortcodes, 'email_address_text' ) );
add_shortcode( 'email_address', array( $Shortcodes, 'email_address' ) );
add_shortcode( 'email_address_url', array( $Shortcodes, 'email_address_url' ) );
add_shortcode( 'button', array( $Shortcodes, 'button' ) );
add_shortcode( 'accordion', array( $Shortcodes, 'accordion' ) );
add_shortcode( 'post_title', array( $Shortcodes, 'post_title' ) );
add_shortcode( 'get_param', array( $Shortcodes, 'get_param' ) );
add_shortcode( 'contact_details', array( $Shortcodes, 'contact_details' ) );
add_shortcode( 'social_links', array( $Shortcodes, 'social_links' ) );
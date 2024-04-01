<?php 
class GetData {
	function get_terms_details($taxonomy, $hide_empty=false) {
		$terms = get_terms(array(
			'taxonomy' => $taxonomy,
			'hide_empty' => $hide_empty,
			'orderby' => 'id',
			'order' => 'ASC',
		));
		if(!$terms) return;
		$term_array = array();
		foreach($terms as $term) {
			$term_array[$term->term_id] = array(
				'name' => $term->name,
				'short_description' => carbon_get_term_meta($term->term_id, 'short_description'),
				'icon' => carbon_get_term_meta($term->term_id, 'icon'),
			);
		}
		return $term_array;
	}
	function get_post_terms_id($taxonomy) {
		$terms = get_the_terms(get_the_ID(), $taxonomy);
		if(!$terms) return;
		$term_array = array();
		foreach($terms as $term) {
			$term_array[$term->term_id] = $term->term;
		}
		return $term_array;
	}
	function get_post_terms($taxonomy) {
		$terms = get_post_terms_id($taxonomy);
		if(!$terms) return;
		ob_start();
		foreach($terms as $key => $term) {
			?>
			<a class="button primary-button small" href="<?= get_term_link( $key ); ?>"><?= $term ?></a>
			<?php
		}
		return ob_get_clean();
	}
	function get_posts($post_type, $label = 'Select Post', $posts_per_page = -1, $post_status = 'publish') {
		$return = array();
		if($label) {
			$return[''] = $label;
		}
		$args = array(
			'post_type' => $post_type,
			'posts_per_page' => $posts_per_page,
			'post_status ' => $post_status
		);

		$posts = get_posts( $args );
		foreach ($posts as $post_val) {
			$return[$post_val->ID] = $post_val->post_title;
		}

		return $return;
	}
	function get_post_type_details($post_type, $posts_per_page, $post_status, $display) {
		$args = array(
			'numberposts' => $posts_per_page,
			'post_type'   => $post_type,
			'post_status ' => $post_status
		);

		$post_list = get_posts( $args );
		$return = array();
		foreach ( $post_list as $post ) {
			if($display) {
				$return[$post->ID] = array(
					'post_title' => '<a class="color-secondary d-block" href="'.get_permalink($post->ID).'">'.$this->get_heading(array(
						'heading' => $post->post_title,
						'tag'=>'h3',
						'data_aos' => 'fade-up',
						'class' => 'smaller'
					)).'</a>',
					'post_excerpt' => $this->get_description(array(
						'description' => get_the_excerpt( $post->ID )
					)),
					'post_image' => '<a class="color-secondary d-block" href="'.get_permalink($post->ID).'">'.$this->get_image(array(
						'image' => get_post_thumbnail_id($post->ID, 'large'),
						'data_aos' => 'fade-up',
						'wrapper_class' => 'image-absolute zoom-on-hover'
					)).'</a>',
					'post_button' => $this->get_button(array(
						'link_text' => 'READ MORE',
						'class' => 'button-secondary button-border button-smaller-padding',
					)),
				); 
			} else {
				$return[$post->ID] = array(
					'post_title' => $post->post_title,
					'post_excerpt' => get_the_excerpt( $post->ID ),
					'post_permalink' => get_permalink($post->ID),
					'post_image' => get_post_thumbnail_id($post->ID, 'large')
				); 
			}
		}

		return $return;
	}


	function get_socials($socials, $class='') {
		ob_start();
		?>
		<ul class="socials list-inline mb-0 d-flex-al-center <?= $class ?>">
			<?php if($class == 'style-1') { ?>
				<li>
					<span class="item-wrapper item-label text-white">Find us on</span>
				</li>
			<?php } ?>
			<?php foreach ($socials as $social) { ?>
				<li>
					<a class="item-wrapper text-white social-icon" href="<?= $social['social_url'] ?>" target="_blank"><i class="<?= $social['social_name'] ?>"></i></a>
				</li>
			<?php } ?>
		</ul>

		<?php
		return ob_get_clean();
	}

	function get_meta_data($name, $label, $icon) {
		ob_start();
		if($this->cb($name)) {
			?>
			<li>
				<div class="icon-holder">
					<span class="label">
						<i class="<?= $icon ?>"></i>
						<?= $label ?>
					</span>
					<span class="value">
						<?= $this->cb($name); ?>
					</span>
				</div>
			</li>
			<?php
		}
		return ob_get_clean();
	}

	function get_size($size = 'medium', $sizedeskop='large') {
		if(wp_is_mobile()) {
			$size = $size;
		} else {
			$size = $sizedeskop;
		}
		return $size;
	}

	function get_image_alt($val) {
		$image_alt = get_post_meta($val, '_wp_attachment_image_alt', TRUE);
		$image_title = get_the_title($val);
		if($image_alt) {
			$alt = $image_alt;
		} else {
			$alt = $image_title;
		}
		return $alt;
	}

	function get_contact_forms() {
		$return = array('Select Form');
		$args_wp = array(
			'post_type' => 'wpcf7_contact_form',
			'posts_per_page' => -1,
			'post_status ' => 'publish'
		);
		$wp_query = new WP_Query($args_wp);
		while ($wp_query->have_posts()) {
			$wp_query->the_post();
			$shortcode = '[contact-form-7 id="'.get_the_ID().'" title="'.get_the_title().'"]';
			$return[$shortcode] = get_the_title();
		}
		wp_reset_postdata();
		return $return;
	}

	function get_contact_form_box($contact_form) {
		if($contact_form) {
			ob_start();
			?>
			<div class="contact-form-box" data-aos="fade-up">
				<?= do_shortcode( $contact_form )?>
			</div>
			<?php
			return ob_get_clean();
		}
	}

	function pagination( $the_query ) {
		$total_pages = $the_query->max_num_pages;
		$big = 999999999; 
		if ($total_pages > 1) {
			$current_page = max(1, get_query_var('paged'));
			echo '<div class="pagination">';
			echo paginate_links(array(
				'prev_text' => '<span><i class="fas fa-chevron-left"></i></span>',
				'next_text' => '<span><i class="fas fa-chevron-right"></i></span>',
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => $current_page,
				'total' => $total_pages,

			));
			echo '</div>';
		}
	}

	function get_title() {
		if(is_tax()) {
			$term = get_queried_object();
			$args = array(
				'heading' => $term->name
			);
			return $this->get_heading($args);
		} else {
			$alt_title = carbon_get_the_post_meta('alt_title');

			if($alt_title) {
				$args = array(
					'heading' => $alt_title
				);
				return $this->get_heading($args);
			} else {
				$args = array(
					'heading' => get_the_title()
				);
				return $this->get_heading($args);
			}
		}
	}

	function get_background_image($background, $size = 'full') {
		$background_url = wp_get_attachment_image_url( $background, $size);
		if($background_url) {
			return 'style="background-image: url('.$background_url.')"';
		}
	}

	function get_data_aos($data_aos) {
		if($data_aos) {
			return 'data-aos="'.$data_aos.'"';
		}
	}

	function get_class($class) {
		if($class) {
			return ' '.$class;
		}
	}

	function get_attributes($class, $id, $template_class) {
		$attributes = '';
		$template_class_val =  $template_class ? $template_class . ' has-edit' : '';
		if($class) {
			$attributes .= 'class="'.$class.' '.$template_class_val.'"';
		} 

		if($id) {
			$attributes .= 'id="'.$id.'"';
		}

		return $attributes;
	}

	function get_gallery_images_id($gallery_id) {
		$gallery = carbon_get_post_meta($gallery_id, 'gallery');
		return $gallery;
	}

	function in_wislish($product_id) {
		if ( function_exists( 'YITH_WCWL' ) ) {
			if(YITH_WCWL()->is_product_in_wishlist( $product_id )) {
				return 'in-wishlist';
			} else {
				return 'not-in-wishlist';
			}
		}
	}
}
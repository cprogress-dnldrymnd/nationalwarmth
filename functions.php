<?php
/*-----------------------------------------------------------------------------------*/
/* Define the version so we can easily replace it throughout the theme
/*-----------------------------------------------------------------------------------*/
define( 'TISSUE-PAPER', 1.0 );
define( 'theme_dir', get_template_directory_uri().'/');
define( 'assets_dir', theme_dir.'/assets/');
define( 'image_dir', assets_dir.'/images/');
define( 'vendor_dir', assets_dir . '/vendors/' );
/*-----------------------------------------------------------------------------------*/
/* After Theme Setup
/*-----------------------------------------------------------------------------------*/
function action_after_setup_theme() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	
	global $modules_section, $theme_settings;
	$modules_section = array(
		array(
			'id' => 'templates',
			'label' => 'Templates'
		),
		array(
			'id' => 'cta',
			'label' => 'CTA'
		),
		array(
			'id' => 'cta_v2',
			'label' => 'CTA V2'
		),
		array(
			'id' => 'services_grid',
			'label' => 'Services Grid'
		),
		array(
			'id' => 'logo_slider',
			'label' => 'Logo Slider'
		),
		array(
			'id' => 'image_info_boxes',
			'label' => 'Image Info Boxes'
		),
		array(
			'id' => 'testimonials',
			'label' => 'Testimonials'
		),
		array(
			'id' => 'two_column_image_text',
			'label' => 'Two Column Image Text'
		),
		array(
			'id' => 'accordion',
			'label' => 'Accordion'
		),
		array(
			'id' => 'accordion_right',
			'label' => 'Accordion Right'
		),
		array(
			'id' => 'icon_section',
			'label' => 'Icon Section'
		),
		array(
			'id' => 'contact_form',
			'label' => 'Contact Form'
		),
		array(
			'id' => 'teams',
			'label' => 'Teams'
		),
		array(
			'id' => 'wysiwyg',
			'label' => 'Wysiwyg'
		),

	);

	
	$theme_settings = array(
		array(
			'id' => 'general_settings',
			'label' => 'General Settings'
		),
		array(
			'id' => 'after_banner',
			'label' => 'After Banner'
		),
		array(
			'id' => 'before_footer',
			'label' => 'Before Footer'
		),
		array(
			'id' => 'brand_details',
			'label' => 'Brand Details'
		),
		array(
			'id' => 'header_settings',
			'label' => 'Header Settings'
		),
		array(
			'id' => 'footer_settings',
			'label' => 'Footer Settings'
		),
		array(
			'id' => 'sticky_cta',
			'label' => 'Sticky CTA'
		)
	);
	require_once( 'plugins/carbon-fields/vendor/autoload.php' );
	\Carbon_Fields\Carbon_Fields::boot();

}
add_action( 'after_setup_theme', 'action_after_setup_theme' );

/*-----------------------------------------------------------------------------------*/
/* Register Carbofields
/*-----------------------------------------------------------------------------------*/
add_action('carbon_fields_register_fields', 'tissue_paper_register_custom_fields');
function tissue_paper_register_custom_fields(){
	require_once('includes/post-meta.php');
}
/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/
function enqueue_scripts()  { 
	wp_enqueue_style('tissue-paper-swiper-css', vendor_dir.'swiper/swiper-bundle.min.css');
	wp_enqueue_style('tissue-paper-style', theme_dir . 'style.css');


	wp_enqueue_script('jquery');
	wp_enqueue_script('tissue-paper-bootstrap-js', vendor_dir.'bootstrap/bootstrap.min.js');
	wp_enqueue_script('tissue-paper-swiper-js', vendor_dir.'swiper/swiper-bundle.min.js');
	wp_enqueue_script('tissue-paper-main-fontawesome-js', vendor_dir . 'fontawesome/all.min.js');
	wp_enqueue_script('tissue-paper-main-aos-js', vendor_dir . 'aos/aos.js');
	wp_enqueue_script('tissue-paper-js', assets_dir . 'javascripts/main.js');

	
	$Theme_Options = new Theme_Options();
	if($Theme_Options->disable_gutenberg) {
		wp_dequeue_style( 'wp-block-library' );
	}
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header


function action_wp_footer() {
	$page_footer_scripts = carbon_get_the_post_meta('page_footer_scripts');

	if($page_footer_scripts) {
		echo $page_footer_scripts;
	}
	?>
	<script>
		jQuery(document).ready(function($) {
			setTimeout(function() {
				AOS.init({
					duration: 1000,
					once: true,
				});
			}, 1000);
		});
	</script>
	<?php
}
add_action( 'wp_footer', 'action_wp_footer' ); 

/*-----------------------------------------------------------------------------------*/
/* Require Files
/*-----------------------------------------------------------------------------------*/
require_once('includes/_required_files.php');

/*-----------------------------------------------------------------------------------*/
/* Admin Settings
/*-----------------------------------------------------------------------------------*/
function action_admin_enqueue_scripts( $hook ) {

	wp_enqueue_style( 'my_custom_script', get_template_directory_uri() . '/admin/css/admin-css.css', array(), '1.1' );

	wp_enqueue_style( 'select_2_css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css', array(), '1.0' );

	wp_enqueue_style( 'karla', 'https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,400;0,700;1,400;1,700&display=swap', array(), '1.0' );

	wp_enqueue_script( 'select_2_js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js', array(), '1.0' );

	wp_enqueue_script( 'admin_js', get_template_directory_uri() . '/admin/js/admin-js.js', array(), '1.3' );

}
add_action( 'admin_enqueue_scripts', 'action_admin_enqueue_scripts' );


/*-----------------------------------------------------------------------------------*/
/* Code Miror
/*-----------------------------------------------------------------------------------*/
add_action('admin_enqueue_scripts', 'codemirror_enqueue_scripts');

function codemirror_enqueue_scripts($hook) {
	$cm_settings = array(
		'ce_css' => wp_enqueue_code_editor(array('type' => 'text/css')),
		'ce_html' => wp_enqueue_code_editor(array('type' => 'text/html'))
	);
	wp_localize_script( 'jquery', 'cm_settings', $cm_settings );

	wp_enqueue_style('wp-codemirror');
}
<?php 
class Theme_Options extends Helpers {
	function __construct() {
		$this->site_logo = wp_get_attachment_image_url(carbon_get_theme_option('logo'), 'large');
		$this->alt_logo_url = wp_get_attachment_image_url(carbon_get_theme_option('alt_logo'), 'large');
		$this->disable_gutenberg = carbon_get_theme_option('disable_gutenberg');
		$this->default_page_banner = wp_get_attachment_image_url(carbon_get_theme_option('default_page_banner'), 'full');


		$this->logo = '<a class="site-logo" href="'.get_site_url().'"> <img src="'.wp_get_attachment_image_url(carbon_get_theme_option('logo'), 'medium').'" alt="Logo"> </a>';
		$this->alt_logo = '<a class="site-logo" href="'.get_site_url().'"> <img src="'.wp_get_attachment_image_url(carbon_get_theme_option('alt_logo'), 'large').'" alt="Logo"></a>';
		$this->phone_number_text  = carbon_get_theme_option('phone_number');
		$this->phone_number_url = 'tel:'.$this->clean_string($this->phone_number_text, '');
		$this->phone_number  = '<a href="'.$this->phone_number_url.'">'.$this->phone_number_text.'</a>';

		$this->email_address_text  = carbon_get_theme_option('email_address');
		$this->email_address_url = 'mailto:'.$this->email_address_text;
		$this->email_address  = '<a href="'.$this->email_address_url.'">'.$this->email_address_text.'</a>';

		$this->location_1 = carbon_get_theme_option('location_1');
		$this->location_2 = carbon_get_theme_option('location_2');

		$this->footer_text = wpautop(carbon_get_theme_option('footer_text'));
		$this->footer_logo = '<a class="site-logo" href="'.get_site_url().'"> <img src="'.wp_get_attachment_image_url(carbon_get_theme_option('footer_logo'), 'medium').'" alt="Logo"> </a>';

		$this->footer_cta_heading = carbon_get_theme_option('footer_cta_heading');
		$this->footer_cta_description = carbon_get_theme_option('footer_cta_description');

		$this->sticky_cta_heading = carbon_get_theme_option('sticky_cta_heading');
		$this->sticky_cta_description = carbon_get_theme_option('sticky_cta_description');
	}
}
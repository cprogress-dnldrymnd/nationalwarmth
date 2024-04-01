<?php

use Carbon_Fields\Container;
use Carbon_Fields\Complex_Container;
use Carbon_Fields\Field;

class PostMeta extends GetData
{
	function _button($id, $separator = '')
	{
		$link_type = array(
			''                    => 'None',
			'page_button'         => 'Page',
			'post_button'         => 'Post',
			'services_button'     => 'Service',
			'landingpages_button' => 'Landing Page',
			'custom_button'       => 'Custom',
		);

		$buttons = array(
			Field::make('select', $id . '_button_type', __('Button Type'))
				->set_width(20)
				->set_options($link_type),
			Field::make('text', $id . '_button_text', 'Button Text')
				->set_help_text('Leave blank to use post title. Does not work with custom button')
				->set_width(20)
				->set_conditional_logic(
					array(
						array(
							'field'   => $id . '_button_type',
							'value'   => array('page_button', 'post_button', 'services_button', 'landingpages_button', 'custom_button'),
							'compare' => 'IN'
						)
					)
				),
			Field::make('select', $id . '_page_button', 'Page Link')
				->set_width(20)
				->set_options($this->get_posts('page'))
				->set_conditional_logic(
					array(
						array(
							'field' => $id . '_button_type',
							'value' => 'page_button',
						)
					)
				),
			Field::make('select', $id . '_post_button', 'Post Link')
				->set_options($this->get_posts('post'))
				->set_width(20)
				->set_conditional_logic(
					array(
						array(
							'field' => $id . '_button_type',
							'value' => 'post_button',
						)
					)
				),
			Field::make('select', $id . '_landingpages_button', 'Landing Page Link')
				->set_width(20)
				->set_options($this->get_posts('landingpages'))
				->set_conditional_logic(
					array(
						array(
							'field' => $id . '_button_type',
							'value' => 'landingpages_button',
						)
					)
				),
			Field::make('select', $id . '_services_button', 'Service Link')
				->set_width(20)
				->set_options($this->get_posts('services'))
				->set_conditional_logic(
					array(
						array(
							'field' => $id . '_button_type',
							'value' => 'services_button',
						)
					)
				),
			Field::make('text', $id . '_custom_button', 'Custom Link')
				->set_width(20)
				->set_conditional_logic(
					array(
						array(
							'field' => $id . '_button_type',
							'value' => 'custom_button',
						)
					)
				),
			Field::make('select', $id . '_button_action', 'Button Action')
				->set_options(
					array(
						''                => 'Same Window',
						'target="_blank"' => 'New Tab',
					)
				)
				->set_width(20)
				->set_conditional_logic(
					array(
						array(
							'field'   => $id . '_button_type',
							'value'   => array('page_button', 'post_button', 'services_button', 'landingpages_button', 'custom_button'),
							'compare' => 'IN'
						)
					)
				),
			Field::make('select', $id . '_button_icon', 'Button Icon')
				->set_conditional_logic(
					array(
						array(
							'field'   => $id . '_button_type',
							'value'   => array('page_button', 'post_button', 'services_button', 'landingpages_button', 'custom_button'),
							'compare' => 'IN'
						)
					)
				)
				->set_options(svg_list())
				->set_classes('select-button-icon ')
				->set_width(20),
			/*Field::make('html',  $id . '_button_select_icon', 'Select Icon')
																												->set_html('<a class="button button-primary button-large thickbox select-icon" href="#TB_inline?width=600&height=550&inlineId=modal-svg-" >SELECT ICON</a>')
																												->set_conditional_logic(array(
																													array(
																														'field' => $id . '_button_type',
																														'value' => array('page_button', 'post_button', 'services_button', 'custom_button'),
																														'compare' => 'IN'
																													)
																												))
																												->set_width(20)*/

		);

		if ($separator) {
			return array_merge(
				array(
					Field::make('html', $id . '_sep')
						->set_html('<label>' . $separator . '</label>')
						->set_classes('seperator ')
				),
				$buttons
			);
		} else {
			return $buttons;
		}
	}

	function _button_full_width($id, $separator = '')
	{
		$link_type = array(
			''                => 'None',
			'page_button'     => 'Page',
			'post_button'     => 'Post',
			'services_button' => 'Service',
			'custom_button'   => 'Custom',
		);

		$buttons = array(
			Field::make('select', $id . '_button_type', __('Button Type'))
				->set_options($link_type),
			Field::make('text', $id . '_button_text', 'Button Text')
				->set_help_text('Leave blank to use post title. Does not work with custom button')
				->set_conditional_logic(
					array(
						array(
							'field'   => $id . '_button_type',
							'value'   => array('page_button', 'post_button', 'services_button', 'custom_button'),
							'compare' => 'IN'
						)
					)
				),
			Field::make('select', $id . '_page_button', 'Page Link')
				->set_options($this->get_posts('page'))
				->set_conditional_logic(
					array(
						array(
							'field' => $id . '_button_type',
							'value' => 'page_button',
						)
					)
				),
			Field::make('select', $id . '_post_button', 'Post Link')
				->set_options($this->get_posts('post'))
				->set_conditional_logic(
					array(
						array(
							'field' => $id . '_button_type',
							'value' => 'post_button',
						)
					)
				),
			Field::make('select', $id . '_services_button', 'Service Link')
				->set_options($this->get_posts('Service_button'))
				->set_conditional_logic(
					array(
						array(
							'field' => $id . '_button_type',
							'value' => 'services_button',
						)
					)
				),
			Field::make('text', $id . '_custom_button', 'Custom Link')
				->set_conditional_logic(
					array(
						array(
							'field' => $id . '_button_type',
							'value' => 'custom_button',
						)
					)
				),
			Field::make('select', $id . '_button_action', 'Button Action')
				->set_options(
					array(
						''                => 'Same Window',
						'target="_blank"' => 'New Tab',
					)
				)
				->set_conditional_logic(
					array(
						array(
							'field'   => $id . '_button_type',
							'value'   => array('page_button', 'post_button', 'services_button', 'custom_button'),
							'compare' => 'IN'
						)
					)
				),
			Field::make('select', $id . '_button_icon', 'Button Icon')
				->set_conditional_logic(
					array(
						array(
							'field'   => $id . '_button_type',
							'value'   => array('page_button', 'post_button', 'services_button', 'custom_button'),
							'compare' => 'IN'
						)
					)
				)
				->set_options(svg_list())

		);

		if ($separator) {
			return array_merge(
				array(
					Field::make('html', $id . '_sep')
						->set_html('<label>' . $separator . '</label>')
						->set_classes('seperator ')
				),
				$buttons
			);
		} else {
			return $buttons;
		}
	}

	function after_banner_fields($id = '')
	{
		$after_banner = carbon_get_theme_option('after_banner');
		$after_banner_container_fields = array();
		foreach ($after_banner as $after_banner_template) {
			$after_banner_container_fields[] = Field::make('checkbox', $id . 'hide_after_header_' . $after_banner_template['template'], 'HIDE ' . strtoupper(get_the_title($after_banner_template['template'])));
		}
		return $after_banner_container_fields;
	}

	function before_footer_fields($id = '')
	{
		$after_banner = carbon_get_theme_option('before_footer');
		$after_banner_container_fields = array();
		foreach ($after_banner as $after_banner_template) {
			$after_banner_container_fields[] = Field::make('checkbox', $id . 'hide_before_footer_' . $after_banner_template['template'], 'HIDE ' . strtoupper(get_the_title($after_banner_template['template'])));
		}
		return $after_banner_container_fields;
	}
}
class ModulesFields extends GetData
{
	function before_module_fields()
	{
		return array(
			Field::make('html', 'html_styles')
				->set_html('<label>TITLE AND SECTION ID</label>')
				->set_classes('seperator '),
			Field::make('text', 'title', 'Title')->set_width(33),
			Field::make('text', 'id', 'Section ID')->set_width(33),
			Field::make('checkbox', 'disable_module', 'Disable Module')->set_width(33),
		);
	}

	function module_fields($module_fields)
	{
		return $module_fields;
	}

	function templates_fields()
	{
		return array(
			Field::make('text', 'title', 'Title'),
			Field::make('select', 'template', 'Template')
				->set_options($this->get_posts('nwtemplates', 'Select Template')),
		);
	}

	function form_fields()
	{
		return array(
			Field::make('text', 'title', 'Title'),
			
		);
	}

	function cta_fields()
	{
		$PostMeta = new PostMeta;
		return array_merge(
			$this->before_module_fields(),
			$this->module_fields(
				array_merge(
					array(
						Field::make('html', 'seperator_1')->set_html('<label>CONTENTS</label>')->set_classes('seperator '),
						Field::make('select', 'background_color', 'Background Color')
							->set_options(
								array(
									'background-primary'   => 'Primary',
									'background-secondary' => 'Secondary',
									'background-accent'    => 'Accent',
								)
							),
						Field::make('text', 'heading', 'Heading'),
						Field::make('textarea', 'description', 'Description'),
					),
					$PostMeta->_button('cta', 'Button')
				)
			)
		);
	}

	function cta_v2_fields()
	{
		$PostMeta = new PostMeta;
		return array_merge(
			$this->before_module_fields(),
			$this->module_fields(
				array_merge(
					array(
						Field::make('html', 'seperator_1')->set_html('<label>CONTENTS</label>')->set_classes('seperator '),
						Field::make('select', 'icon_type', 'Icon Type')
							->set_options(
								array(
									'svg'   => 'SVG',
									'image' => 'Image'
								)
							),
						Field::make('image', 'icon_image', 'Icon Image')
							->set_conditional_logic(
								array(
									array(
										'field' => 'icon_type',
										'value' => 'image',
									)
								)
							),
						Field::make('select', 'icon_svg', 'Icon SVG')
							->set_options(svg_list())
							->set_conditional_logic(
								array(
									array(
										'field' => 'icon_type',
										'value' => 'svg',
									)
								)
							),
						Field::make('text', 'heading', 'Heading'),
						Field::make('textarea', 'description', 'Description'),
					),
					$PostMeta->_button('cta', 'BUTTON[1]'),
					$PostMeta->_button('cta_2', 'BUTTON[2]'),
				)
			)
		);
	}

	function services_grid_fields()
	{
		return array_merge(
			$this->before_module_fields(),
			$this->module_fields(
				array(
					Field::make('html', 'seperator_1')->set_html('<label>CONTENTS</label>')->set_classes('seperator '),
					Field::make('association', 'services', __(''))
						->set_types(
							array(
								array(
									'type'      => 'post',
									'post_type' => 'services',
								)
							)
						),
				)
			)
		);
	}


	function logo_slider_fields()
	{
		return array_merge(
			$this->before_module_fields(),
			$this->module_fields(
				array(
					Field::make('html', 'seperator_1')->set_html('<label>CONTENTS</label>')->set_classes('seperator '),
					Field::make('text', 'heading', 'Heading'),
					Field::make('media_gallery', 'logo_slider', __('Logos'))
				)
			)
		);
	}


	
	function partners_fields()
	{
		return array_merge(
			$this->before_module_fields(),
			$this->module_fields(
				array(
					Field::make('html', 'seperator_1')->set_html('<label>CONTENTS</label>')->set_classes('seperator '),
					Field::make('text', 'heading', 'Heading'),
					Field::make('html', 'html_partners', __('Logos'))
					->set_html('This module will display Partners List. Manage Partners <a target="_blank" href="/wp-admin/edit.php?post_type=partners"> here </a>.'),
			)
		);
	}

	function image_info_boxes_fields()
	{
		$PostMeta = new PostMeta;
		return array_merge(
			$this->before_module_fields(),
			$this->module_fields(
				array_merge(
					array(
						Field::make('html', 'seperator_1')->set_html('<label>CONTENTS</label>')->set_classes('seperator '),
						Field::make('text', 'heading', 'Heading'),
						Field::make('complex', 'items', 'Items')
							->add_fields(
								array(
									Field::make('select', 'icon_type', 'Icon Type')
										->set_options(
											array(
												'svg'   => 'SVG',
												'image' => 'Image'
											)
										),
									Field::make('image', 'icon_image', 'Icon Image')
										->set_conditional_logic(
											array(
												array(
													'field' => 'icon_type',
													'value' => 'image',
												)
											)
										),
									Field::make('select', 'icon_svg', 'Icon SVG')
										->set_options(svg_list())
										->set_conditional_logic(
											array(
												array(
													'field' => 'icon_type',
													'value' => 'svg',
												)
											)
										),

									Field::make('image', 'image', 'Image')->set_width(80),
									Field::make('text', 'heading', 'Heading'),
									Field::make('textarea', 'description', 'Description'),

								)
							)
							->set_layout('tabbed-vertical')
							->set_header_template('<%- heading  %>')

					),
					$PostMeta->_button('info_box', 'Button')
				)
			)
		);
	}

	function testimonials_fields()
	{
		return array_merge(
			$this->before_module_fields(),
			$this->module_fields(
				array(
					Field::make('html', 'seperator_1')->set_html('<label>CONTENTS</label>')->set_classes('seperator '),
					Field::make('html', 'testimonial')
						->set_html('This module will display testimonial. Manage testitimonial <a target="_blank" href="/wp-admin/edit.php?post_type=testimonials"> here </a>.'),
				)
			)
		);
	}

	function accordion_fields()
	{
		$PostMeta = new PostMeta;
		return array_merge(
			$this->before_module_fields(),
			$this->module_fields(
				array(
					Field::make('html', 'seperator_1')->set_html('<label>CONTENTS</label>')->set_classes('seperator '),
					Field::make('complex', 'accordion_items', 'Accordion Items')
						->add_fields(
							array_merge(
								array(
									Field::make('text', 'heading', 'Heading'),
									Field::make('textarea', 'description', 'Description'),


								),
								$PostMeta->_button('accordion', 'Button')
							)
						)
						->set_layout('tabbed-vertical')
						->set_header_template('<%- heading  %>')

				)
			)
		);
	}

	function accordion_right_fields()
	{
		$PostMeta = new PostMeta;
		return array_merge(
			$this->before_module_fields(),
			$this->module_fields(
				array_merge(
					array(
						Field::make('html', 'seperator_1')->set_html('<label>CONTENTS</label>')->set_classes('seperator '),
						Field::make('text', 'heading', 'Heading'),
						Field::make('textarea', 'description', 'Description'),
						Field::make('complex', 'accordion_items', 'Accordion Items')
							->add_fields(
								array(
									Field::make('text', 'heading', 'Heading'),
									Field::make('textarea', 'description', 'Description'),

								)
							)
							->set_layout('tabbed-vertical')
							->set_header_template('<%- heading  %>')

					),
					$PostMeta->_button('accordion', 'Button')
				)
			)
		);
	}


	function icon_section_fields()
	{
		$PostMeta = new PostMeta;
		return array_merge(
			$this->before_module_fields(),
			$this->module_fields(
				array_merge(
					array(
						Field::make('html', 'seperator_1')->set_html('<label>CONTENTS</label>')->set_classes('seperator '),
						Field::make('select', 'background_color', 'Background Color')
							->set_options(
								array(
									'background-primary'   => 'Primary',
									'background-secondary'   => 'Secondary',
									'background-accent'   => 'Accent',
									'background-light'   => 'Light',
									'background-none'   => 'None',
								)
							),
						Field::make('select', 'text_align', 'Text Align')
							->set_options(
								array(
									'text-center'   => 'Center',
									'text-start'   => 'Left',
									'text-end'   => 'Right',
									'text-justify'   => 'Justify',
								)
							),
						Field::make('text', 'heading', 'Heading'),
						Field::make('textarea', 'subheading', 'Subheading'),
						Field::make('complex', 'items', 'Items')
							->add_fields(
								array(
									Field::make('select', 'icon_type', 'Icon Type')
										->set_options(
											array(
												'svg'   => 'SVG',
												'image' => 'Image'
											)
										),
									Field::make('image', 'icon_image', 'Icon Image')
										->set_conditional_logic(
											array(
												array(
													'field' => 'icon_type',
													'value' => 'image',
												)
											)
										),
									Field::make('select', 'icon_svg', 'Icon SVG')
										->set_options(svg_list())
										->set_conditional_logic(
											array(
												array(
													'field' => 'icon_type',
													'value' => 'svg',
												)
											)
										),
									Field::make('text', 'heading', 'Heading'),
									Field::make('textarea', 'description', 'Description'),

								)
							)
							->set_layout('tabbed-vertical')
							->set_header_template('<%- heading  %>')

					),
					$PostMeta->_button('icon', 'Button')
				)
			)
		);
	}

	function two_column_image_text_fields()
	{
		$PostMeta = new PostMeta;
		return array_merge(
			$this->before_module_fields(),
			$this->module_fields(
				array_merge(
					array(
						Field::make('html', 'seperator_1')->set_html('<label>CONTENTS</label>')->set_classes('seperator '),
						Field::make('checkbox', 'reverse_column', 'Reverse Column')->set_width(25),
						Field::make('checkbox', 'with_decoration', 'With Decoration')->set_width(75),
						Field::make('image', 'image', 'Image'),
						Field::make('text', 'heading', 'Heading'),
						Field::make('textarea', 'description', 'Description'),
					),
					$PostMeta->_button('two_col', 'Button')
				)
			)
		);
	}

	function contact_form_fields()
	{

		return array_merge(
			$this->before_module_fields(),
			$this->module_fields(
				array(
					Field::make('html', 'seperator_1')->set_html('<label>CONTENTS</label>')->set_classes('seperator '),
					Field::make('text', 'heading', 'Heading'),
					Field::make('select', 'contact_form', 'Contact Form')
						->set_options($this->get_contact_forms())
				)
			)
		);
	}

	function wysiwyg_fields()
	{
		return array_merge(
			$this->before_module_fields(),
			$this->module_fields(
				array(
					Field::make('html', 'seperator_1')->set_html('<label>CONTENTS</label>')->set_classes('seperator '),
					Field::make('text', 'heading', 'Heading'),
					Field::make('textarea', 'description', 'Description'),
					Field::make('checkbox', 'two_columns', 'Two Columns'),
					Field::make('rich_text', 'wysiwyg', 'Wsiwyg'),
					Field::make('rich_text', 'wysiwyg2', 'Wsiwyg 2')
						->set_conditional_logic(
							array(
								array(
									'field'   => 'two_columns',
									'value'   => true,
								)
							)
						),
				)
			)
		);
	}
	function teams_fields()
	{
		return array_merge(
			$this->before_module_fields(),
			$this->module_fields(
				array(
					Field::make('html', 'seperator_1')->set_html('<label>CONTENTS</label>')->set_classes('seperator '),
					Field::make('html', 'html')->set_html('This will display the team members.'),
				)
			)
		);
	}
}


/*-----------------------------------------------------------------------------------*/
/* Theme Settings
/*-----------------------------------------------------------------------------------*/
class ThemeOptionsMeta extends PostMeta
{
	function theme_options()
	{
		global $theme_settings;
		$theme_settings_container = Container::make('theme_options', __('Theme Settings'))->set_page_parent('themes.php');
		foreach ($theme_settings as $theme_setting) {
			$theme_settings_container->add_tab($theme_setting['label'], $this->{$theme_setting['id'] . '_fields'}());
		}
		return $theme_settings_container;
	}

	function theme_options_single()
	{
		global $theme_settings;

		foreach ($theme_settings as $theme_setting) {
			$theme_settings_container = Container::make('theme_options', __('→' . $theme_setting['label']))->set_page_parent('themes.php');
			$theme_settings_container->add_fields($this->{$theme_setting['id'] . '_fields'}());
		}
		return $theme_settings_container;
	}

	function general_settings_fields()
	{
		return array(
			Field::make('image', 'default_page_banner', 'Default Page Banner'),
		);
	}
	function brand_details_fields()
	{
		return array(
			Field::make('image', 'logo', 'Logo')->set_width(33),
			Field::make('image', 'alt_logo', 'Alt Logo')->set_width(33),
			Field::make('image', 'footer_logo', 'Footer Logo')->set_width(33),
			Field::make('text', 'phone_number', 'Phone Number'),
			Field::make('text', 'email_address', 'Email Address'),
			Field::make('textarea', 'office_hours', 'Office Hours'),
			Field::make('text', 'facebook_url', 'Facebook URL'),
			Field::make('text', 'twitter_url', 'Twitter URL'),
			Field::make('text', 'instagram_url', 'Instagram URL'),
			Field::make('text', 'whats_app_rul', __('WHATSAPP URL'))
		);
	}

	function header_settings_fields()
	{
		$PostMeta = new PostMeta;
		return array(
			Field::make('html', 'header_icon_menu_html')->set_html('<label>ICON MENUS</label>')->set_classes('seperator '),
			Field::make('association', 'header_icon_menu', __('Icon Menu Left'))
				->set_types(
					array(
						array(
							'type'      => 'post',
							'post_type' => 'services',
						)
					)
				)
		);
	}

	function footer_settings_fields()
	{
		return array(
			Field::make('textarea', 'copyright_text', 'Footer Text'),
			Field::make('media_gallery', 'footer_logos', 'Footer Logos'),
		);
	}

	function sticky_cta_fields()
	{
		$PostMeta = new PostMeta;
		return array_merge(
			array(
				Field::make('checkbox', 'enable_sticky_cta', 'Enable Sticky CTA'),
				Field::make('text', 'sticky_heading', 'Heading'),
				Field::make('textarea', 'sticky_description', 'Description'),
			),
			$PostMeta->_button('sticky', 'STICKY CTA DESKTOP BUTTON'),
			$PostMeta->_button('button_sticky', 'STICKY CTA MOBILE BUTTON')
		);
	}
	function after_banner_fields($id = '')
	{
		return array(
			Field::make('complex', 'after_banner', 'Template')
				->add_fields(
					array(
						Field::make('text', 'title', 'Title'),
						Field::make('text', 'class', 'Template Class'),
						Field::make('select', 'template', 'Template')
							->set_options($this->get_posts('nwtemplates', 'Select Template')),
					)
				)
				->set_header_template('<%- title  %>')
		);
	}

	function before_footer_fields($id = '')
	{
		return array(
			Field::make('complex', 'before_footer', 'Template')
				->add_fields(
					array(
						Field::make('text', 'title', 'Title'),
						Field::make('text', 'class', 'Template Class'),
						Field::make('select', 'template', 'Template')
							->set_options($this->get_posts('nwtemplates', 'Select Template')),
					)
				)
				->set_header_template('<%- title  %>')
		);
	}
}

$ThemeOptionsMeta = new ThemeOptionsMeta();

$ThemeOptionsMeta->theme_options();

$ThemeOptionsMeta->theme_options_single();

$PostMeta = new PostMeta();

/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
/* Page Banner
/*-----------------------------------------------------------------------------------*/
Container::make('post_meta', 'Page Banner')
	->where('post_type', '=', 'page')
	->where('post_template', '!=', 'templates/landing-page.php')
	->where('post_template', '!=', 'templates/page-thank-you.php')
	->or_where('post_type', '=', 'services')
	->add_fields(
		array_merge(
			array(
				Field::make('image', 'desktop_image', 'Desktop BG Image')->set_width(20),
				Field::make('image', 'mobile_image', 'Mobile BG Image')->set_width(80),
				Field::make('checkbox', 'hide_page_banner', 'Hide Page Banner'),
				//Field::make('checkbox', 'display_review', 'Display Review'),
				Field::make('text', 'alt_title', 'Alt Title'),
				Field::make('textarea', 'page_banner_description', 'Page Banner Description'),
				Field::make('select', 'page_banner_style', 'Page Banner Style')
					->set_options(
						array(
							'style-1' => 'Style 1',
							'style-2' => 'Style 2',
							'style-3' => 'Style 3',
						)
					),
			),
			$PostMeta->_button_full_width('page_banner')
		)
	);

/*-----------------------------------------------------------------------------------*/
/* Thank you page
/*-----------------------------------------------------------------------------------*/
Container::make('post_meta', 'Thank you page')
	->where('post_template', '=', 'templates/page-thank-you.php')
	->add_fields(array(
		Field::make('image', 'icon', 'Icon'),
		Field::make('image', 'image', 'Image'),
	));

/*
Container::make('post_meta', 'Page Icon')
 ->or_where('post_type', '=', 'services')
 ->set_context('side')
 ->add_fields(
	 array(
		 Field::make('select', 'icon_svg', '')
			 ->set_options(svg_list())
	 )
 );
*/

/*-----------------------------------------------------------------------------------*/
/* Testimonial
/*-----------------------------------------------------------------------------------*/
Container::make('post_meta', 'Testimonial Content')
	->where('post_type', '=', 'testimonials')
	->add_fields(
		array(
			Field::make('text', 'testimonial_title', 'Testimonial Title'),
			Field::make('textarea', 'testimonial_content', 'Testimonial Content'),
		)
	);

/*-----------------------------------------------------------------------------------*/
/* CSS, Header, Body and Footer Scripts
/*-----------------------------------------------------------------------------------*/
Container::make('post_meta', 'Custom CSS / Header Scripts / Body Scripts / Footer Scripts')
	->set_priority('high')
	->where('post_type', '=', 'post')
	->or_where('post_type', '=', 'page')
	->or_where('post_type', '=', 'services')
	->or_where('post_type', '=', 'landingpages')
	->add_fields(
		array(
			Field::make('textarea', 'page_custom_css', 'Custom CSS'),
			Field::make('header_scripts', 'page_header_scripts', __('Header Scripts')),
			Field::make('textarea', 'page_body_scripts', __('Body Scripts')),
			Field::make('footer_scripts', 'page_footer_scripts', __('Footer Scripts')),
		)
	);


/*-----------------------------------------------------------------------------------*/
/* Modules
/*-----------------------------------------------------------------------------------*/
$Modules = new Modules();
Container::make('post_meta', 'Modules')
	->set_priority('high')
	->where('post_template', '=', 'templates/modules.php')
	->or_where('post_type', '=', 'services')
	->or_where('post_type', '=', 'nwtemplates')
	->add_fields(array($Modules->modules_post_meta()));



/*-----------------------------------------------------------------------------------*/
/* Documentaton
/*-----------------------------------------------------------------------------------*/
/*Container::make( 'theme_options', __( 'Documentation' ) )
->add_fields(array(
	$PostMeta->_html( 'docx', $PostMeta->_documentation()),
));*/

/*-----------------------------------------------------------------------------------*/
/* Header, Body and Footer Scripts
/*-----------------------------------------------------------------------------------*/
Container::make('theme_options', __('→Header, Body and Footer Scripts'))
	->set_page_parent('themes.php')
	->add_fields(
		array(
			Field::make('header_scripts', 'header_scripts', __('Header Scripts')),
			Field::make('textarea', 'body_scripts', __('Body Scripts')),
			Field::make('footer_scripts', 'footer_scripts', __('Footer Scripts'))
		)
	);



/*-----------------------------------------------------------------------------------*/
/* Testimonials
/*-----------------------------------------------------------------------------------*/
Container::make('theme_options', __('Settings'))
	->set_page_parent('edit.php?post_type=testimonials')
	->add_fields(
		array(
			Field::make('text', 'testimonial_heading', 'Heading'),
			Field::make('textarea', 'testimonial_description', 'Description'),
		)
	);

/*-----------------------------------------------------------------------------------*/
/* Services
/*-----------------------------------------------------------------------------------*/
Container::make('post_meta', 'Grid Image')
	->set_context('side')
	->where('post_type', '=', 'services')
	->add_fields(
		array(
			Field::make('image', 'grid_image', '')
				->set_help_text('Will use featured image if empty')
		)
	);

/*-----------------------------------------------------------------------------------*/
/* After Banner
/*-----------------------------------------------------------------------------------*/
if ($PostMeta->after_banner_fields()) {
	Container::make('post_meta', 'After Banner')
		->where('post_type', '=', 'page')
		->or_where('post_type', '=', 'services')
		->or_where('post_type', '=', 'landingpages')
		->set_context('side')
		->add_fields($PostMeta->after_banner_fields());
}

/*-----------------------------------------------------------------------------------*/
/* Before Footer
/*-----------------------------------------------------------------------------------*/
if ($PostMeta->before_footer_fields()) {
	Container::make('post_meta', 'Before Footer')
		->where('post_type', '=', 'page')
		->or_where('post_type', '=', 'services')
		->or_where('post_type', '=', 'landingpages')
		->set_context('side')
		->add_fields($PostMeta->before_footer_fields());
}


/*-----------------------------------------------------------------------------------*/
/* Landing pages
/*-----------------------------------------------------------------------------------*/
Container::make('post_meta', 'Page Components')
	->where('post_type', '=', 'landingpages')
	->or_where('post_template', '=', 'templates/landing-page.php')
	->add_tab(
		'Form Settings',
		array(
			Field::make('image', 'background_image', 'Background Image Desktop')
				->set_help_text('Will use default page banner if empty')->set_width(20),
			Field::make('image', 'background_image_mobile', 'Background Image Mobile')
				->set_help_text('Will use default page banner or desktop if empty')->set_width(80),
			Field::make('text', 'heading', 'Heading'),
			Field::make('text', 'subheading', 'Subheading'),
			Field::make('textarea', 'description', 'Description'),
			Field::make('text', 'contact_form', 'Contact Form')

		)
	)
	->add_tab(
		'Text Bar',
		array(
			Field::make('text', 'text_bar_heading', 'Heading'),
			Field::make('textarea', 'text_bar_description', 'Description'),
		)
	)
	->add_tab(
		'Modules',
		array($Modules->modules_post_meta())
	);

/*-----------------------------------------------------------------------------------*/
/* Header, Body and Footer Scripts
/*-----------------------------------------------------------------------------------*/
Container::make('theme_options', __('Landing Page Settings'))
	->set_page_parent('edit.php?post_type=landingpages')
	->add_fields(
		array(
			Field::make('html', 'html_top_bar')
				->set_html('<label>TOP BAR</label>')
				->set_classes('seperator '),
			Field::make('image', 'landing_top_bar_logo', __('Top Bar Logo')),
			Field::make('textarea', 'landing_top_bar_text', __('Top Bar Text')),

			Field::make('html', 'html_hero')
				->set_html('<label>Hero Banner</label>')
				->set_classes('seperator '),
			Field::make('image', 'hero_banner_logo', __('Hero Logo')),
		)
	);


/*-----------------------------------------------------------------------------------*/
/* Post Settings
/*-----------------------------------------------------------------------------------*/
Container::make('theme_options', __('Post Settings'))
	->set_page_parent('edit.php')
	->add_tab('General Settings', array(
		Field::make('text', 'post_alt_title', 'Alt Title'),
		Field::make('textarea', 'post_description', 'Description'),
	));



/*-----------------------------------------------------------------------------------*/
/* Teams 
/*-----------------------------------------------------------------------------------*/
Container::make('post_meta', 'Team Settings')
	->where('post_type', '=', 'teams')
	->add_fields(
		array(
			Field::make('text', 'position', 'Position'),
		)
	);

Container::make('theme_options', __('Teams Settings'))
	->set_page_parent('edit.php?post_type=teams')
	->add_tab('General Settings', array(
		Field::make('text', 'teams_alt_title', 'Alt Title'),
		Field::make('textarea', 'teams_description', 'Description'),
	));

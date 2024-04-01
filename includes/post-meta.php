<?php

use Carbon_Fields\Container;
use Carbon_Fields\Complex_Container;
use Carbon_Fields\Field;

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
				Field::make('rich_text', 'page_banner_description', 'Page Banner Description'),
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
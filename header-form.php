<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="author" content="">
    <meta name="format-detection" content="telephone=no">
    <title>
        <?php bloginfo('name'); // show the blog name, from settings 
        ?> |
        <?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page 
        ?>
    </title>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php wp_head(); ?>

    <!--[if lte IE 9]>
		<link href="stylesheets/non-responsive.css" rel="stylesheet" />
	<![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body <?php body_class(); ?>>

    <header class="form-header xs-padding">
        <div class="container">
            <a href="<?= get_site_url() ?>">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50.941" height="56.015" viewBox="0 0 50.941 56.015">
                    <defs>
                        <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
                            <stop offset="0" stop-color="#fa971d" />
                            <stop offset="1" stop-color="#e9591f" />
                        </linearGradient>
                        <linearGradient id="linear-gradient-2" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
                            <stop offset="0" stop-color="#f0761e" />
                            <stop offset="1" stop-color="#dd1b1d" />
                        </linearGradient>
                    </defs>
                    <g id="Group_166" data-name="Group 166" transform="translate(-1894.808 765.019)">
                        <path id="Subtraction_2" data-name="Subtraction 2" d="M7.334,30.745h0a16.922,16.922,0,0,1-5.327-5.924A16.768,16.768,0,0,1,0,16.842a16.966,16.966,0,0,1,.342-3.394A16.75,16.75,0,0,1,2.876,7.425a16.891,16.891,0,0,1,7.41-6.1A16.757,16.757,0,0,1,13.448.342,16.966,16.966,0,0,1,16.842,0,16.771,16.771,0,0,1,22.9,1.121l-11.11,11.11A18.164,18.164,0,0,0,7.333,30.745Zm21.328-1.9h0l-3.294-3.392,8.316-8.716c0,.02,0,.04,0,.061v.049a16.962,16.962,0,0,1-.349,3.426,16.753,16.753,0,0,1-2.581,6.069,16.966,16.966,0,0,1-2.093,2.5Z" transform="translate(1895.308 -758.043)" fill="#15a198" stroke="rgba(0,0,0,0)" stroke-width="1" />
                        <path id="Path_193" data-name="Path 193" d="M3379.34-2191.181a16.842,16.842,0,0,0,0,23.818h0l11.91,11.909,11.909-11.909-11.269-11.605,19.648-20.591-11.91-11.909Z" transform="translate(-1470.721 1446.45)" fill="url(#linear-gradient)" />
                        <path id="Path_194" data-name="Path 194" d="M3447.174-2187.65l-8.378,8.378a16.842,16.842,0,0,0,0,23.818h0l20.287-20.287a16.842,16.842,0,0,0,0-23.818h0l-11.909-11.909A16.843,16.843,0,0,1,3447.174-2187.65Z" transform="translate(-1518.267 1446.45)" fill="url(#linear-gradient-2)" />
                    </g>
                </svg>
            </a>
        </div>
    </header>
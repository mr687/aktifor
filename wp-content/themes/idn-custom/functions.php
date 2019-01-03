<?php 

function use_my_resources()
{
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style('owl.carousel.min', get_template_directory_uri()."/owl/assets/owl.carousel.min.css");
	wp_enqueue_style('owl.theme.default.min', get_template_directory_uri()."/owl/assets/owl.theme.default.min.css");
	wp_enqueue_style('dashicons');
}

add_action('wp_enqueue_scripts', 'use_my_resources');

register_nav_menus(array(
	'Primary' => __('Primary Menus'),
));

function make_widget_area()
{
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => 'Sidebar 1',
	));
}

add_action('widgets_init', 'make_widget_area');

add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
) );


function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


add_theme_support( 'post-thumbnails' );
 ?>
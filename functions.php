<?php

function wpHostel_setup() {

  load_theme_textdomain('wpHostel');

  add_theme_support('title-tag');

  add_theme_support('custom-logo', array(
		'height' => 171,
		'width' => 160,
		'flex-height' => true
	));
}
add_action('after_setup_theme', 'wpHostel_setup');

function wpHostel_scripts() {

	wp_enqueue_style( 'style-css', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'libs', get_template_directory_uri() . '/js/libs.min.js');

}
add_action( 'wp_enqueue_scripts', 'wpHostel_scripts' );

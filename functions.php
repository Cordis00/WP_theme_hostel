<?php

function wpHostel_setup() {

  load_theme_textdomain('wpHostel');

  add_theme_support('title-tag');

  add_theme_support('custom-logo', array(
		'height' => 193,
		'width' => 180,
		'flex-height' => true
	));

  add_theme_support('post-thumbnails');
  set_post_thumbnail_size(121, 121);

  add_theme_support('html5', array(
		'search_form',
		'comment_form',
		'comment_list',
		'gallery',
		'caption'
	));

  add_theme_support('post-formats', array(
		'aside',
		'image',
		'video',
		'gallery'
	));

  register_nav_menu('primary', 'Primary menu');
}

add_action('after_setup_theme', 'wpHostel_setup');

function wpHostel_scripts() {

	wp_enqueue_style( 'style-css', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'libs', get_template_directory_uri() . '/js/libs.min.js');

}
add_action( 'wp_enqueue_scripts', 'wpHostel_scripts' );


function wpHostel_customize_register( $wp_customize ) {

	$wp_customize->add_setting( 'header_products' , array(
    'default'   => __('+7 922 155-155-5', 'wpHostel'),
    'transport' => 'refresh',
	));

	$wp_customize->add_section( 'products_section' , array(
    'title'      => __('Номер телефона', 'wpHostel'),
    'priority'   => 30,
	));

	$wp_customize->add_control(
	'header_products',
	array(
		'label'    => __( 'Введите номер телефона:', 'wpHostel'),
		'section'  => 'products_section',
		'settings' => 'header_products',
		'type'     => 'text',
	));
}
add_action( 'customize_register', 'wpHostel_customize_register' );

add_image_size( 'custom-thumbnail', 250, 170, true );

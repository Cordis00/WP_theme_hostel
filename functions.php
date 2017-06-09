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

  wp_deregister_script('jquery');

  wp_register_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js", false, '1.12.2');
  wp_enqueue_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'wpHostel_scripts' );


function wpHostel_customize_register( $wp_customize ) {

	$wp_customize->add_setting( 'header_number' , array(
    'default'   => __('+7 922 155-155-5', 'wpHostel'),
    'transport' => 'refresh',
	));
  $wp_customize->add_setting( 'caption' , array(
    'default'   => __('Открытие летнего сезона 201', 'wpHostel'),
    'transport' => 'refresh',
	));
  $wp_customize->add_setting( 'invitation' , array(
    'default'   => __('Приглашаем наших дорогих гостей в наши номер', 'wpHostel'),
    'transport' => 'refresh',
	));

	$wp_customize->add_section( 'number' , array(
    'title'      => __('Номер телефона', 'wpHostel'),
    'priority'   => 30,
	));
  $wp_customize->add_section( 'poster' , array(
    'title'      => __('Афиша', 'wpHostel'),
    'priority'   => 30,
	));

	$wp_customize->add_control(
	'header_number',
	array(
		'label'    => __( 'Введите номер телефона:', 'wpHostel'),
		'section'  => 'number',
		'settings' => 'header_number',
		'type'     => 'text',
	));
  $wp_customize->add_control(
	'caption',
	array(
		'label'    => __( 'Заголовок', 'wpHostel'),
		'section'  => 'poster',
		'settings' => 'caption',
		'type'     => 'text',
	));
  $wp_customize->add_control(
	'invitation',
	array(
		'label'    => __( 'Приглашение', 'wpHostel'),
		'section'  => 'poster',
		'settings' => 'invitation',
		'type'     => 'text',
	));
}
add_action( 'customize_register', 'wpHostel_customize_register' );

add_image_size( 'custom-thumbnail', 250, 170, true );
add_image_size( 'poster', 326, 326, true );

remove_filter('the_content', 'wpautop');
remove_filter('the_custom_logo', 'wpautop');

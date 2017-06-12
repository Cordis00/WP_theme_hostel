<?php
// require get_template_directory() . '/inc/class-wpHostel-subscribe-form-widget.php';
// function wpHostel_register_widget() {
//   register_widget('WpHostel_Widget_Subscribe');
// }
// add_action( 'widgets_init', 'wpHostel_register_widget' );

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
  register_nav_menu('primary_en', 'Primary menu EN');
  register_nav_menu('language', 'Language menu');
}

add_action('after_setup_theme', 'wpHostel_setup');

function wpHostel_scripts() {

	wp_enqueue_style( 'style-css', get_stylesheet_uri() );

  wp_deregister_script('jquery');
  wp_register_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js", false, '1.12.2');
  wp_enqueue_script('jquery');
  wp_enqueue_script( 'maps', get_template_directory_uri() . '/js/maps.js');
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
  $wp_customize->add_setting( 'sidebar_header' , array(
    'default'   => __('Бронирование номер', 'wpHostel'),
    'transport' => 'refresh',
	));
  $wp_customize->add_setting( 'sidebar_caption' , array(
    'default'   => __('Гарантия лучшей цены <br> в нашей гостиниц', 'wpHostel'),
    'transport' => 'refresh',
	));
  $wp_customize->add_setting( 'caption_en' , array(
    'default'   => __('Opening of the summer season 201', 'wpHostel'),
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting( 'invitation_en' , array(
    'default'   => __('We invite our dear guests to our room', 'wpHostel'),
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting( 'sidebar_header_en' , array(
    'default'   => __('Room reservatio', 'wpHostel'),
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting( 'sidebar_caption_en' , array(
    'default'   => __('Best price guarantee in our hote', 'wpHostel'),
    'transport' => 'refresh',
  ));

	$wp_customize->add_section( 'number' , array(
    'title'      => __('Номер телефона(Phone number)', 'wpHostel'),
    'priority'   => 30,
	));
  $wp_customize->add_section( 'poster' , array(
    'title'      => __('Афиша(Poster)', 'wpHostel'),
    'priority'   => 30,
	));
  $wp_customize->add_section( 'sidebar' , array(
    'title'      => __('Sidebar', 'wpHostel'),
    'priority'   => 30,
	));

	$wp_customize->add_control(
	'header_number',
	array(
		'label'    => __( 'Введите номер телефона(Enter phone number):', 'wpHostel'),
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
  $wp_customize->add_control(
	'sidebar_header',
	array(
		'label'    => __( 'Заголовок', 'wpHostel'),
		'section'  => 'sidebar',
		'settings' => 'sidebar_header',
		'type'     => 'text',
	));
  $wp_customize->add_control(
	'sidebar_caption',
	array(
		'label'    => __( 'Описание', 'wpHostel'),
		'section'  => 'sidebar',
		'settings' => 'sidebar_caption',
		'type'     => 'text',
	));
  $wp_customize->add_control(
	'caption_en',
	array(
		'label'    => __( 'Caption', 'wpHostel'),
		'section'  => 'poster',
		'settings' => 'caption_en',
		'type'     => 'text',
	));
  $wp_customize->add_control(
	'invitation_en',
	array(
		'label'    => __( 'Invitation', 'wpHostel'),
		'section'  => 'poster',
		'settings' => 'invitation_en',
		'type'     => 'text',
	));
  $wp_customize->add_control(
	'sidebar_header_en',
	array(
		'label'    => __( 'Caption', 'wpHostel'),
		'section'  => 'sidebar',
		'settings' => 'sidebar_header_en',
		'type'     => 'text',
	));
  $wp_customize->add_control(
	'sidebar_caption_en',
	array(
		'label'    => __( 'Description', 'wpHostel'),
		'section'  => 'sidebar',
		'settings' => 'sidebar_caption_en',
		'type'     => 'text',
	));
}
add_action( 'customize_register', 'wpHostel_customize_register' );

// function wpHostel_widgets_init() {
//     register_sidebar( array(
//         'name'          => __( 'Sidebar', 'wpHostel' ),
//         'id'            => 'sidebar-1',
//         'description'   => __( 'Настройка сайдбара', 'wpHostel' ),
//         'before_widget' => '<div id="%1$s" class="header-form__right %2$s">',
//         'after_widget'  => '</div>',
//         'before_title'  => '<div class="form-main"><h3 class="form-main__title">',
//         'after_title'   => '</h3></div>',
//     ));
// }
// add_action( 'widgets_init', 'wpHostel_widgets_init' );

add_image_size( 'custom-thumbnail', 250, 170, true );
add_image_size( 'poster', 326, 326, true );

remove_filter('the_content', 'wpautop');
remove_filter('the_custom_logo', 'wpautop');

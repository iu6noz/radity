<?php
function enqueue_scripts() {

	// Bootstrap JavaScript
	wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.7.0.min.js');

	// Bootstrap JavaScript
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js');
	
    // jQuery UI JavaScript
    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.js');
	
	//Swiper 
	wp_enqueue_script( 'swiper', 'https://unpkg.com/swiper/swiper-bundle.min.js');

    // jQuery UI CSS
    wp_enqueue_style('jquery-ui-css', get_template_directory_uri() . '/css/jquery-ui.min.css', array(), '1.12.1', 'all');

    // Bootstrap CSS
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.3.0', 'all');
	
	// Responsive CSS
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css' );
	
	// Custom CSS
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.css' );

    // Theme styles
    wp_enqueue_style('theme-style', get_stylesheet_uri());

	//Swiper Styles
	wp_enqueue_style( 'swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css' );

    // Your custom script
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/js/script.js', array('jquery' ,'bootstrap-js', 'jquery-ui'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

add_theme_support('post-thumbnails');

function theme_setup() {
    register_nav_menus( array(
        'primary-menu' => esc_html__( 'Primary Menu', 'radity' ),
    ) );
}
add_action( 'after_setup_theme', 'theme_setup' );





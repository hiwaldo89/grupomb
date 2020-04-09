<?php

function grupomb_setup() {

	// Make theme available for translation.
	load_theme_textdomain( 'grupomb', get_template_directory() . '/languages' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'grupomb' ),
	) );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
add_action( 'after_setup_theme', 'grupomb_setup' );

function grupomb_scripts() {
	wp_enqueue_style( 'bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css' );
	wp_enqueue_style( 'robot_mono', 'https://fonts.googleapis.com/css?family=Roboto+Mono:300,400,500' );
	wp_enqueue_style( 'grupomb-style', get_stylesheet_uri(), '', get_the_time() );

	// Include custom jQuery
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', '', '', true );
	wp_enqueue_script( 'jquery-migrate', 'https://code.jquery.com/jquery-migrate-3.0.1.min.js', array('jquery'), '3.0.1', true );

	wp_enqueue_script( 'popper_js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'fontawesome-solid-js', 'https://pro.fontawesome.com/releases/v5.1.0/js/solid.js', '', '', true );
	wp_enqueue_script( 'fontawesome-js', 'https://pro.fontawesome.com/releases/v5.1.0/js/fontawesome.js', '', '', true );
	wp_enqueue_script( 'vendors-js', get_template_directory_uri() . '/js/vendor/vendors.js', array('jquery'), '', true );
	wp_enqueue_script( 'grupomb_js', get_template_directory_uri() . '/js/theme-scripts.js', '', '', true );

	if(is_page('contacto')) {
		wp_enqueue_script( 'google_maps', 'https://maps.googleapis.com/maps/api/js?key=' . get_field('google_maps_api_key', 'option') . '&callback=initMap', '', '', true );
	}

	wp_localize_script( 'grupomb_js', 'site', array(
		'is_contact'		=> is_page('contacto')
	) );
}
add_action( 'wp_enqueue_scripts', 'grupomb_scripts' );

// Define custom taxonomy to be used with Projects post type
function grupomb_project_category() {
	if(post_type_exists('proyecto')) {
		register_taxonomy(
        	'project-category',
        	array('proyecto'),
        	array(
            	'hierarchical' => true,
            	'label' => 'Categorías del proyecto',
            	'query_var' => true,
            	'rewrite' => array( 'slug' => 'categoría')
        	)
    	);
	}
}
add_action( 'init', 'grupomb_project_category' );

// Add ACF option's page
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title'	=> 'General',
		'parent_slug'	=> 'theme-general-settings',
	));
}

// Load Gravity Forms compatibility file.
require get_template_directory() . '/inc/grupomb_gravity_forms.php';

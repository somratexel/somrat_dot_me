<?php
/**
 * Starter functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Starter
 * @since Starter 1.0
 */



/**
 * Starter only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'starter_setup' ) ) :
/**
 * Starter setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Starter 1.0
 */
function starter_setup() {

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'starter-full-width', 1038, 576, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'starter' ),
		'secondary' => __( 'Secondary menu', 'starter' ),
	) );

}
endif; // twentyfourteen_setup
add_action( 'after_setup_theme', 'starter_setup' );
add_post_type_support( 'post', 'page-attributes' );

/**
 * Register Starter widget areas.
 */
function starter_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'starter' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on ...', 'starter' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'starter' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Additional sidebar that appears on ...', 'starter' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'starter' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section...', 'starter' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'starter_widgets_init' );

/**
 * Making woocommerce compatible
 *
 * @since Starter 1.0
 */



/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Starter 1.0
 */
function starter_scripts() {
	
	// Add Bootstrap used in the main stylesheet.
	//wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap-3.2.0/css/bootstrap.min.css', array(), '3.2.0' );
	// Add Bootstrap js file.
	//wp_enqueue_script( 'bootsrtap-script', get_template_directory_uri() . '/bootstrap-3.2.0/js/bootstrap.min.js', array( 'jquery' ), '20140616', true );
	
	wp_enqueue_script(
		'angularjs',
		get_stylesheet_directory_uri() . '/node_modules/angular/angular.min.js'
	);
	wp_enqueue_script(
		'angularjs-route',
		get_stylesheet_directory_uri() . '/node_modules/angular-route/angular-route.min.js'
	);

	wp_register_script(
		'angularjs-sanitize',
		get_stylesheet_directory_uri() . '/node_modules/angular-sanitize/angular-sanitize.min.js'
	);

	wp_enqueue_script(
		'my-scripts',
		get_stylesheet_directory_uri() . '/js/scripts.js',
		array( 'angularjs', 'angularjs-route','angularjs-sanitize' )
	);

	wp_localize_script(
		'my-scripts',
		'myLocalized',
		array(
			'partials' => trailingslashit( get_template_directory_uri() ) . 'partials/'
			)
	);

}
add_action( 'wp_enqueue_scripts', 'starter_scripts' );





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
	
	//adding fonts
	wp_enqueue_style( 'roboto', 'https://fonts.googleapis.com/css?family=Oswald', array(), '1.0.0' );
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', array(), '4.4.0' );
	//adding css files
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.min.css', array(), '3.3.5' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/node_modules/slick/slick.css', array(), '1.5.7' );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/node_modules/slick/slick-theme.css', array(), '1.5.7' );
	wp_enqueue_style( 'wow', get_template_directory_uri() . '/node_modules/wow/animate.css', array(), '1.1.2' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/node_modules/fancybox/jquery.fancybox.css', array(), '3.0.0' );
	wp_enqueue_style( 'exela-style', get_template_directory_uri() . '/style.css', array(), '1.0.0' );
	//adding js files
	wp_enqueue_script( 'bootsrtap-script', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js', array( 'jquery' ), '3.3.5', true );
	//wp_enqueue_script( 'bootsrtap-progress-bar', get_template_directory_uri() . '/node_modules/bootstrap-progress-bar/bootstrap-progressbar.min.js', array( 'jquery' ), '3.3.5', true );
	wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/node_modules/slick/slick.min.js', array( 'jquery' ), '1.5.7', true );
	wp_enqueue_script( 'wow-script', get_template_directory_uri() . '/node_modules/wow/wow.min.js', array( 'jquery' ), '1.1.2', true );
	wp_enqueue_script( 'fancybox-script', get_template_directory_uri() . '/node_modules/fancybox/jquery.fancybox.js', array( 'jquery' ), '3.0.0', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '1.0.0', true );
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
			'partials' => trailingslashit( get_template_directory_uri() ) . 'partials/',
			'ajaxurl'          => admin_url( 'admin-ajax.php' )
			)
	);

}
add_action( 'wp_enqueue_scripts', 'starter_scripts' );

/**
 * Get the bootstrap!
 */
if ( file_exists(  __DIR__ . '/inc/cmb2/init.php' ) ) {
  require_once  __DIR__ . '/inc/cmb2/init.php';
} elseif ( file_exists(  __DIR__ . '/inc/CMB2/init.php' ) ) {
  require_once  __DIR__ . '/inc/CMB2/init.php';
}

/**
 * Config the bootstrap
 */

if ( file_exists(  __DIR__ . '/inc/exela-app-bootstrap.php' ) ) {
  require_once  __DIR__ . '/inc/exela-app-bootstrap.php';
} 


/**
 * Adding portfolio meta data in json api
 */
add_filter( 'json_prepare_post', function ($data, $post, $context) {
	global $cmb_portfolio;
	$data['portfolio_meta_data'] = array(
	    $cmb_portfolio.'meta_images' => get_post_meta( $post['ID'], $cmb_portfolio.'meta_images', true ),
	    $cmb_portfolio.'meta_url' => get_post_meta( $post['ID'], $cmb_portfolio.'meta_url', true ),
	);
return $data;
}, 10, 3 );

/**
 * Adding portfolio meta data in json api
 */
add_filter( 'json_prepare_post', function ($data, $post, $context) {

	$data['post_navigation'] = array(
		    'previous_post_link' => get_previous_post_slug( $post['ID'] ),
		    'next_post_link'	 => get_next_post_slug( $post['ID'] )
	);
return $data;
}, 10, 3 );

function get_previous_post_slug( $post_id ) {
    // Get a global post reference since get_adjacent_post() references it
    global $post;

    // Store the existing post object for later so we don't lose it
    $oldGlobal = $post;

    // Get the post object for the specified post and place it in the global variable
    $post = get_post( $post_id );

    // Get the post object for the previous post
    $previous_post = get_previous_post();

    $postSlug = esc_url( get_permalink($previous_post->ID) );

    // Reset our global object
    $post = $oldGlobal;

    if ( '' == $previous_post ) 
        return '';

    return $postSlug;
}

function get_next_post_slug( $post_id ) {
    // Get a global post reference since get_adjacent_post() references it
    global $post;

    // Store the existing post object for later so we don't lose it
    $oldGlobal = $post;

    // Get the post object for the specified post and place it in the global variable
    $post = get_post( $post_id );

    // Get the post object for the previous post
    $next_post = get_next_post();
    $postSlug = esc_url( get_permalink($next_post->ID) );

    // Reset our global object
    $post = $oldGlobal;

    if ( '' == $next_post ) 
        return '';

    return $postSlug;
}


/*add_action( 'wp_ajax_nopriv_get-theme-option-data', 'get_theme_option_data' );
add_action( 'wp_ajax_get-theme-option-data', 'get_theme_option_data' );

function get_theme_option_data(){
	
	$response = json_encode( array( 'success' => true, 'message' => 'custom message' ) );
    // response output
    print_r($response);
    exit;
}*/


/**
 * Getting theme options form rest api
 */

if ( file_exists(  __DIR__ . '/inc/exela-theme-options-api.php' ) ) {
  require_once  __DIR__ . '/inc/exela-theme-options-api.php';
} 


if ( ! function_exists ( 'wp_json_theme_options_init' ) ) :

	/**
	 * Init JSON REST API Theme options routes
	 */
	function wp_json_theme_options_init() {

		$class = new WP_JSON_ThemeOptions();
		add_filter( 'json_endpoints', array( $class, 'register_routes' ) );

	}
	add_action( 'wp_json_server_before_serve', 'wp_json_theme_options_init' );

endif;

/**
* Hide admin bar from front end
**/
show_admin_bar( false );


/**
* Adding skills shortcode
**/
add_shortcode('exela_skills', 'exela_skills_view');

function exela_skills_view(){
	global $cmb_skill;
	$output = '';
	$args = array(
					'post_type'=> 'skill',
					'order'    => 'ASC',
					'order_by' => 'menu_order',
					'posts_per_page' => -1
				);
	$the_query = new WP_Query( $args );
	$counter = 1;
	if ( $the_query->have_posts() ) :
		$output .= '<div class="row skills-container">';
		while ( $the_query->have_posts() ) : $the_query->the_post();
			$skill_percent = get_post_meta( get_the_id(), $cmb_skill.'meta_percentage', true );
			$skill_color = get_post_meta( get_the_id(), $cmb_skill.'meta_percentage_color', true );
			$output .= '<div class="col-md-1 col-xs-2 col-sm-2 skill-percent no-padding-right"><div class="skill-bar-container"><div class="skill-bar wow pulse" data-wow-duration="'.$counter.'s" style="height:'.$skill_percent.'%; background-color:'.$skill_color.';"><small>' . get_the_title(). '</small></div></div></div>';
		$counter++;
		endwhile;
		$output .= '</div>';
		wp_reset_postdata();
	else:
		$output = '';
	endif;	

	return $output;
}
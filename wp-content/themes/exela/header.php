<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Starter
 * @since Starter 1.0
 */
?><!DOCTYPE html>
<html ng-app="exela" ng-controller="mainCtrl">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?> | {{page.title}}</title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<base href="/somrat_dot_me/">
	<?php wp_head(); ?>
</head>

<body>

<div class="bg-slider-container hidden-xs hidden-sm">	
<?php 
	if ( function_exists( 'ot_get_option' ) ) {

	  /* get the slider array */
	  $background_slider = ot_get_option( 'background_slider', array() );
	  
	  if ( ! empty( $background_slider ) ) {
	  	echo '<div class="bg-slider">';
	    foreach( $background_slider as $slide ) {
	      echo '
	      <div class="bg-single-img"><img class="img-responsive" src="' . $slide['image'] . '" alt="' . $slide['title'] . '" /></div>';
	    }
	    echo '</div>';
	  }
	  
	}
?>
</div>

<div class="overlay">
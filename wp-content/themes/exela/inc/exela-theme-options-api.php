<?php
/**
 * WP JSON API Theme options routes
 *
 * @package WP_JSON_ThemeOptions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'WP_JSON_ThemeOptions' ) ) :

	/**
	 * WP JSON Theme options class
	 *
	 * @package WP API Themeoptions
	 *
	 * @since 1.0.0
	 */
	class WP_JSON_ThemeOptions {

		/**
		 * Register theme options routes for WP API
		 *
		 * @since 1.0.0
		 *
		 * @param  array $routes Existing routes
		 * @return array Modified routes
		 */
		public function register_routes( $routes ) {

			// all theme options
			$routes['/theme-options'] = array(
				array( array( $this, 'get_theme_options' ), WP_JSON_Server::READABLE ),
			);

			return $routes;
		}

		/**
		 * Get theme options
		 *
		 * @since 1.0.0
		 *
		 * @return array All registered theme options
		 */
		public static function get_theme_options() {

			$json_url = get_json_url() . '/theme-options/';
			$json_data = array();

			if ( function_exists( 'ot_get_option' ) ) {
			  /* get the slider array */
			  $background_slider = ot_get_option( 'background_slider', array() );
			  $json_data['background_slider'] = $background_slider;
			  
			}
			
			$json_data['meta']['links']['collection'] = $json_url;
			$json_data['meta']['links']['self'] = $json_url;

			return $json_data;
		}

	}	

endif;

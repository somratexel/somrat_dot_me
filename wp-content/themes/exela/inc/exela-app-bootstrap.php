<?php

	/**
	 * Exela Portfolio Management System
	 * @package Wordpress
	 * @subpackage Exela
	 * @version 1.0
	 * @author somrat
	 * @link http://somrat.me
	 */

	//Vairables used in exela app
	$cmb_portfolio = "exela_portfolio_";
	$cmb_theme_option = "exela_theme_option_";

	// Register Custom Post Type
	function register_portfolio() {

		$labels = array(
			'name'                => _x( 'Portfolio', 'Post Type General Name', 'text_domain' ),
			'singular_name'       => _x( 'portfolio', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'           => __( 'Portfolios', 'text_domain' ),
			'name_admin_bar'      => __( 'Portfolios', 'text_domain' ),
			'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
			'all_items'           => __( 'All Portfolios', 'text_domain' ),
			'add_new_item'        => __( 'Add New Portfolio', 'text_domain' ),
			'add_new'             => __( 'Add New', 'text_domain' ),
			'new_item'            => __( 'New Item', 'text_domain' ),
			'edit_item'           => __( 'Edit Item', 'text_domain' ),
			'update_item'         => __( 'Update Item', 'text_domain' ),
			'view_item'           => __( 'View Item', 'text_domain' ),
			'search_items'        => __( 'Search Item', 'text_domain' ),
			'not_found'           => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
		);
		$args = array(
			'label'               => __( 'portfolio', 'text_domain' ),
			'description'         => __( 'Add Custom Portfolio', 'text_domain' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'page-attributes'),
			'taxonomies'          => array( 'category', 'post_tag' ),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => false,     
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'menu_icon'			  => 'dashicons-portfolio'

		);
		register_post_type( 'portfolio', $args );

	}

	add_action( 'init', 'register_portfolio', 0 );

	//adding meta boxes to the portfolio section
	function portfolioMetaBox(){
		global $cmb_portfolio;
		$cmb_portfolio_fields = new_cmb2_box( array(
			'id'               => $cmb_portfolio . 'meta',
			'title'            => __( 'Portfolio Information', 'cmb2' ),
			'object_types'     => array( 'portfolio' ),
			'show_names'       => true,
		) );

		$cmb_portfolio_fields->add_field( array(
			'name'        => __('Portfolio Images', 'cmb2'),
			'id'          => $cmb_portfolio . 'meta_images',
			'type'        => 'file_list',
			'preview_size' => array( 150, 150 ),
		));

		$cmb_portfolio_fields->add_field( array(
			'name' => __( 'Project URL', 'cmb2' ),
			'id'   => $cmb_portfolio . 'meta_url',
			'type' => 'text_url',
		) );
	}

	add_action( 'cmb2_init', 'portfolioMetaBox' );


	
	

	
	
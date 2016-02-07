<?php
/**
 * a4c functions and definitions.
 *
 * @package a4c
 */

add_action( 'init', 'sliders_init' );
/**
 * Register a slide post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function sliders_init() {
	$labels = array(
		'name'               	=> _x( 'Slides', 'a4c' ),
		'singular_name'      	=> _x( 'Slide', 'a4c' ),
	);

	$args = array(
		'labels'             	=> $labels,
        'description'        	=> __( 'Slides for the homepage.', 'a4c' ),
		'public'             	=> true,
		'publicly_queryable' 	=> false,
		'show_ui'            	=> true,
		'show_in_menu'       	=> true,
		'query_var'          	=> true,
		'capability_type'    	=> 'post',
		'has_archive'        	=> false,
		'hierarchical'       	=> false,
		'menu_position'     	=> null,
		'supports'          	=> array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'slide', $args );

}

add_action( 'init', 'staff_init' );
/**
 * Register a staff membera post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function staff_init() {
	$labels = array(
		'name'               	=> _x( 'Staff Members', 'a4c' ),
		'singular_name'      	=> _x( 'Staff Member', 'a4c' ),
	);

	$args = array(
		'labels'             	=> $labels,
        'description'        	=> __( 'Staff members', 'a4c' ),
		'public'             	=> true,
		'publicly_queryable' 	=> true,
		'show_ui'            	=> true,
		'show_in_menu'       	=> true,
		'query_var'          	=> true,
		'capability_type'    	=> 'page',
		'has_archive'        	=> false,
		'hierarchical'       	=> false,
		'menu_position'     	=> null,
		'supports'          	=> array( 'title', 'editor', 'thumbnail', 'excerpt' )
	);

	register_post_type( 'staff§', $args );

}
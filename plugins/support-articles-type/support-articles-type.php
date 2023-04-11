<?php global $wp_query;
/**
 * Plugin Name: Support Articles Type
 * Plugin URI: http://www.immedia-creative.com
 * Description: Creates a manual type.
 * Version: 1.0.0
 * Author: Chris Brown
 * Author URI: http://www.brownbearmedia.com
 * License: GPL2
 */
	

function create_supporttype() {

	register_post_type( 'support',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Support' ),
				'singular_name' => __( 'Article' ),
			),
			'public' => true,
			'publicly_queryable' => true, // Set to false hides Single Pages
			'show_ui'=> true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'support'),
			'show_in_menu' => true,
			'menu_position' => 2,
			'supports' => array( 'title','editor','author','revisions','post-formats','thumbnail','excerpt'),	
			'menu_icon'           => 'dashicons-book',
		)
	);
}


add_action( 'init', 'create_supporttype' );

// Create Support tags
function create_support_tag() {
	register_taxonomy(
		'support-tag',
		array('support','userguide'),
		array(
		'labels' => array(
			'name'          => 'Support Tags',
			'singular_name' => 'Support Tag',
		),
		'hierarchical' => false
	));
}

add_action( 'init', 'create_support_tag' );

// Create Support cats
function create_support_cat() {
	register_taxonomy(
		'support-cat',
		array('support','userguide'),
		array(
		'labels' => array(
			'name'          => 'Support Categories',
			'singular_name' => 'Support Category',
		),
		'hierarchical' => true
	));
}

add_action( 'init', 'create_support_cat' );
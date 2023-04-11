<?php global $wp_query;
/**
 * Plugin Name: App Articles Type
 * Plugin URI: http://www.immedia-creative.com
 * Description: Creates an Education type.
 * Version: 1.0.0
 * Author: Chris Brown
 * Author URI: http://www.brownbearmedia.com
 * License: GPL2
 */


 
function create_app_articles() {

	register_post_type( 'app-articles',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Education' ),
				'singular_name' => __( 'Article' ),
			),
			'public' => true,
			'publicly_queryable' => true, // Set to false hides Single Pages
			'show_ui'=> true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'education'),
			'show_in_menu' => true,
			'menu_position' => 5,
			'hierarchical' => true,
			'supports' => array( 'title','editor','author','revisions','post-formats','thumbnail','excerpt','page-attributes'),
			'show_in_rest' => true,			
			'menu_icon'           => 'dashicons-media-text',
		)
	);
}


add_action( 'init', 'create_app_articles' );

/*
function create_education_taxonomy() {
	register_taxonomy(
		'education',
		'app-articles',
		array(
			'label' => 'Education',
			'hierarchical' => true,
		)
	);
}

add_action( 'init', 'create_education_taxonomy' );

*/

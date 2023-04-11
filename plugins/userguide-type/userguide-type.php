<?php global $wp_query;
/**
 * Plugin Name: User Guide Type
 * Plugin URI: http://www.immedia-creative.com
 * Description: Creates a userguide type.
 * Version: 1.0.0
 * Author: Chris Brown
 * Author URI: http://www.brownbearmedia.com
 * License: GPL2
 */
	

function create_userguidetype() {

	register_post_type( 'userguide',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'User Guide' ),
				'singular_name' => __( 'Chapter' ),
			),
			'public' => true,
			'publicly_queryable' => true, // Set to false hides Single Pages
			'show_ui'=> true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'userguide'),
			'show_in_menu' => true,
			'menu_position' => 3,
			'supports' => array( 'title','editor','author','revisions','post-formats','thumbnail','excerpt'),	
			'menu_icon'           => 'dashicons-book',
		)
	);
}


add_action( 'init', 'create_userguidetype' );



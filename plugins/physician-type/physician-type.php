<?php global $wp_query;
/**
 * Plugin Name: Physician Type
 * Plugin URI: http://www.immedia-creative.com
 * Description: Creates a physician type.
 * Version: 1.0.0
 * Author: Chris Brown
 * Author URI: http://www.brownbearmedia.com
 * License: GPL2
 */
 


 
function create_physiciantype() {

	register_post_type( 'physician',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Physician' ),
				'singular_name' => __( 'Physician' ),
			),
			'public' => true,
			'publicly_queryable' => false, // Set to false hides Single Pages
			'show_ui'=> true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'blog'),
			'show_in_menu' => true,
			'menu_position' => 5,
			'supports' => array( 'title','editor','author','revisions','post-formats'),	
			'menu_icon'           => 'dashicons-welcome-write-blog',
		)
	);
}


add_action( 'init', 'create_physiciantype' );





<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package immedia
 */


/*$siteLayout = esc_attr( get_option( 'site_layout' ) );
if($siteLayout == 'Normal'){
get_header();
}
elseif($siteLayout == 'Linear'){
get_header("linear");
}
else{
get_header();	
}*/
get_header('healthcare-professionals');	
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
		
		<?php dynamic_sidebar('News Head'); ?>

		
		<?php
			if ( function_exists('yoast_breadcrumb') ) {
			  yoast_breadcrumb( '<p id="breadcrumbs" class="breadcrumb">','</p>' );
			}
		?>
 
			<div class="row">
			
			<?php
			$args = (array(
				'posts_per_page'	=> -1
			));
	
			$query = new WP_Query( $args );


			  // Start looping over the query results.
			while ( $query->have_posts() ) {
		 
				$query->the_post();
			
				echo '<div class="article-col col-md-6 col-lg-6">';
			
					echo '<a class="article-link" href="'.get_permalink().'">';
					
					echo '<div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_10 vc_sep_border_width_3 vc_sep_pos_align_left vc_separator_no_text vc_sep_color_blue  wpb_animate_when_almost_visible wpb_left-to-right left-to-right wpb_animate_when_almost_visible wpb_left-to-right left-to-right wpb_start_animation animated">';
						echo '<span class="vc_sep_holder vc_sep_holder_l">';
							echo '<span class="vc_sep_line"></span>';
						echo '</span>';
						echo '<span class="vc_sep_holder vc_sep_holder_r">';
							echo '<span class="vc_sep_line"></span>';
						echo '</span>';
					echo '</div>';
					
							 
								$str = get_the_title(); 
								echo '<h3>' . $str . '</h3>';
								
								if (has_excerpt()) { 
									$excerpt = get_the_excerpt();
									echo  '<p class="excerpt">'. $excerpt . '</p>';
								}
								
								$date = get_the_date();
								echo '<div class="article-date">'. $date . '</div>';
						
					echo '</a>';

				echo '</div>';
				// Contents of the queried post results go here.
		 
			}
			?>
			</div>
		<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();

<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package immedia
 */

$siteLayout = esc_attr( get_option( 'site_layout' ) );
if($siteLayout == 'Normal'){
get_header();
}
elseif($siteLayout == 'Linear'){
get_header("linear");
}
else{
get_header();	
}?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<?php dynamic_sidebar('Chapter Head'); ?>

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() ); ?>

			<div class="vc_row wpb_row vc_row-fluid">
				<div class="wpb_column vc_column_container vc_col-sm-2">
					<div class="vc_column-inner">
					</div>
				</div>
				<div class="wpb_column vc_column_container vc_col-sm-8">
					<div class="vc_column-inner">
						<div class="navigation boxed-content">
							<?php previous_post_link('%link', '<strong>Next article:</strong> %title'); ?>
							<?php if (strlen(get_next_post()->post_title) > 0 && strlen(get_previous_post()->post_title) > 0) { ?>
							<div class="spacer-wrapper">
								<div class="visible-xs" style="height:10px"></div>
								<div class="visible-sm" style="height:10px"></div>
								<div class="visible-md" style="height:10px"></div>
								<div class="visible-lg" style="height:10px"></div>
							</div>
							<?php } ?>
							<?php next_post_link('%link', '<strong>Previous article:</strong> %title'); ?>	
						</div>
					</div>
				</div>
				<div class="wpb_column vc_column_container vc_col-sm-2">
					<div class="vc_column-inner">
					</div>
				</div>
			</div>

<?php
		endwhile; // End of the loop.
		?>


		<?php 
		/*
		$term_obj_list = get_the_terms( $post->ID, 'support-tag' );
		$terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
		echo $terms_string;
		
			
		add_shortcode( 'single-support-articles', 'single_support_articles' );

		function single_support_articles(){ 
		
			
			$args = (array(
				'post_type' => 'support',
				'showposts' => -1,
				'tax_query' => array(
							array(
								'taxonomy'  => 'support-tag',
								'terms'     => 'using',
								'field'     => 'slug'
							)
						)
			));
			
	
			$string = '';
			$string .= '<div class="row">';
	
			$query = new WP_Query( $args );


			  // Start looping over the query results.
			while ( $query->have_posts() ) {
				
				$string .= '<div class="col-md-4">';
		 
				$query->the_post();
			
			
					$string .= '<a class="article-link" href="'.get_permalink().'">';			
				
								
							$string .= '<div class="article-content">';
		 
								$str = get_the_title(); 
								$string .= '<h3>' . $str . ' </h3>';
								
								if (has_excerpt()) { 
									$excerpt = get_the_excerpt();
									$string .= '<p class="excerpt">'. $excerpt . '</p>';
								
								} else {
											
										$content = get_the_content();
										$content = strip_shortcodes( $content );
										$string .=  '<p class="excerpt">' . wp_trim_words( $content, 18 ) . '</p>';

									} 
					
							
							$string .= '</div>';
							
					$string .= '</a>';

				// Contents of the queried post results go here.
				$string .= '</div>';
			}
			wp_reset_postdata();
			$string .= '</div>';

			return $string;
			
		}
		
		do_shortcode('[single-support-articles]');
		*/
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();

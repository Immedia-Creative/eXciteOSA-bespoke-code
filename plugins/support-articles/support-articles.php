<?php

/**
 * Plugin Name: Display support articles
 * Plugin URI: http://www.immedia-creative.com
 * Description: This plugin displays the support grid.
 * Version: 1.0.0
 * Author: Cameron
 * Author URI: http://www.immedia-creative.com
 * License: GPL2
 */


    add_shortcode( 'support-articles', 'support_articles' );

    function support_articles(){ ?>

			<div class="row">
				
			<?php
			// Get all the categories
			$categories = get_terms( 'support-tag' );

			// Loop through all the returned terms
			foreach ( $categories as $category ){

				// set up a new query for each category, pulling in related posts.
				$conditions = new WP_Query(
					array(
						'post_type' => 'support',
						'showposts' => -1,
						'orderby'  => 'name',
						'order'    => 'ASC', 
						'tax_query' => array(
							array(
								'taxonomy'  => 'support-tag',
								'terms'     => array( $category->slug ),
								'field'     => 'slug'
							)
						)
					)
				);

				$cat = $category->name;
				//$catID = str_replace(array( '(', ')' ), '', $cat);
				$catID = preg_replace("/[^a-zA-Z0-9\s]/", "", $cat);
				$catID = preg_replace('/\s+/', '_', $catID);
				
				?>
				
				<div class="col-md-6" id="<?php echo strtolower($catID);?>">
		

						<h3 class="archive-heading"><?php echo $cat ?></h3>

						<div class="row">
						<?php while ($conditions->have_posts()) : $conditions->the_post(); ?>
							<div class="col-md-12 col-lg-12">
								<a class="service-box-cont" href="<?php the_permalink(); ?>">
									<div class="service-box">
										<h4><?php the_title(); ?></h4>
										<?php
											if (has_excerpt()) { 
											?>
												<p><?php get_the_excerpt() ?></p>
												<?php	
											} else {
													
												$content = get_the_content();
												$content = strip_shortcodes( $content );?>
												<p>
												<?php echo wp_trim_words( $content, 18 ); ?>
												</p>
												<?php 
												} 
												?>
									</div>
								</a>
							</div>
						<?php endwhile; ?>
						</div>

						<?php
							// Reset things, for good measure
							$conditions = null;
							wp_reset_postdata();

						// end the loop

						?>				
				
					
				</div>

			<?php
			}
			?>
			</div>
	<?php }
		?>
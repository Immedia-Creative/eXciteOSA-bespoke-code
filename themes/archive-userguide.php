<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
		
		<?php dynamic_sidebar('Userguide Head'); ?>

		<?php
		if ( have_posts() ) : ?>
		
		<div class="vc_row wpb_row vc_row-fluid">
	<div class="wpb_column vc_column_container vc_col-sm-2">
		<div class="vc_column-inner">
			<div class="wpb_wrapper"></div>
		</div>
	</div>

	<div class="wpb_column vc_column_container vc_col-sm-8">
		<div class="vc_column-inner">
			<div class="wpb_wrapper">

				<div class="vc_row wpb_row vc_inner vc_row-fluid boxed-content vc_row-o-equal-height vc_row-o-content-middle vc_row-flex">
					<div class="wpb_column vc_column_container vc_col-sm-12">
						<div class="vc_column-inner">
							<div class="wpb_wrapper">
							
							<h2 class="small">Table of contents</h2>
							
			<?php
		
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-userguide' );
				

			endwhile;
			
			?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="wpb_column vc_column_container vc_col-sm-2">
		<div class="vc_column-inner">
			<div class="wpb_wrapper"></div>
		</div>
	</div>
</div>				
			
			<?php

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();

<?php
/**
 * Template Name: Search Page
 * The template for displaying the search page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
		
		<?php dynamic_sidebar('Search Head'); ?>

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();

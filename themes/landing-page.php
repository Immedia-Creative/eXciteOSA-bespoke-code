<?php
/**
 * Template Name: Landing Page
 *
 * This is the template that displays the landing page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package immedia
 */


get_header('landing');	
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

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
get_footer('landing');

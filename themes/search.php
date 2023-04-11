<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<?php dynamic_sidebar('Search Head'); ?>
		
		<div class="row">
		<div class="col-sm-2">
		</div>
		<div class="col-sm-8">
		
		<div class="spacer-wrapper">
			<div class="visible-xs" style="height:50px"></div>
			<div class="visible-sm" style="height:90px"></div>
			<div class="visible-md" style="height:90px"></div>
			<div class="visible-lg" style="height:90px"></div>
		</div>
		
		<?php
		if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		
		<div class="spacer-wrapper">
			<div class="visible-xs" style="height:50px"></div>
			<div class="visible-sm" style="height:90px"></div>
			<div class="visible-md" style="height:90px"></div>
			<div class="visible-lg" style="height:90px"></div>
		</div>
		
		</div>
		
		<div class="col-sm-2">
		</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
//get_sidebar();
get_footer();

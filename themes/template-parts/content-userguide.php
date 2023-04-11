<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package immedia
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="entry-content">
		<?php $str = get_the_title(); 
				echo '<a href="' . get_permalink() . '"><p class="big">' . $str . '</p></a>';
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

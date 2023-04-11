<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package immedia
 */

?>
<!-- Counter JS -->



	</div><!-- #content -->
	
	<?php $containBody = esc_attr( get_option( 'contain_body' ) ); ?>
	<?php if($containBody == 'Yes' || $containBody == ''){?></div><?php } ?><!-- #container -->
	

</div><!-- #page -->

<?php get_template_part( 'snoozeal-modal' ); ?>

<?php wp_footer(); ?>
<!-- website by www.immedia-creative.com //-->
</body>
</html>
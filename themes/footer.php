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
	
	<footer id="colophon" class="site-footer" role="contentinfo">
	
	<div id="upper-footer">
	
	<?php $containUpperFooter = esc_attr( get_option( 'contain_upper_footer' ) ); ?>
	<?php if($containUpperFooter == 'Yes' || $containUpperFooter == ''){?><div class="container"><?php } ?>
	
		<div class="row">
		
		<?php  $upperFooter = esc_attr( get_option( 'upper_footer' ) ); ?>
			<?php if($upperFooter == 'oneCol'){ ?>
				<div class="col-md-12"><?php dynamic_sidebar( 'upper-footer-1' ); ?></div>
			<?php } elseif($upperFooter == 'twoCol'){ ?>
				<div class="col-md-6"><?php dynamic_sidebar( 'upper-footer-1' ); ?></div>
				<div class="col-md-6"><?php dynamic_sidebar( 'upper-footer-2' ); ?></div>
			<?php } elseif($upperFooter == 'threeCol'){ ?>	
				<div class="col-md-4"><?php dynamic_sidebar( 'upper-footer-1' ); ?></div>
				<div class="col-md-4"><?php dynamic_sidebar( 'upper-footer-2' ); ?></div>
				<div class="col-md-4"><?php dynamic_sidebar( 'upper-footer-3' ); ?></div>
			<?php } elseif($upperFooter == 'fourCol'){ ?>		
				<div class="col-md-3"><?php dynamic_sidebar( 'upper-footer-1' ); ?></div>
				<div class="col-md-3"><?php dynamic_sidebar( 'upper-footer-2' ); ?></div>
				<div class="col-md-3"><?php dynamic_sidebar( 'upper-footer-3' ); ?></div>
				<div class="col-md-3"><?php dynamic_sidebar( 'upper-footer-4' ); ?></div>
			<?php } ?>
			
		<?php if($containUpperFooter == 'Yes' || $containUpperFooter == ''){?></div><?php } ?>
		
		</div>
	
	</div>
	
	<div id="lower-footer">
	
	<?php $containLowerFooter = esc_attr( get_option( 'contain_lower_footer' ) ); ?>
	<?php if($containLowerFooter == 'Yes' || $containLowerFooter == ''){?><div class="container"><?php } ?>
	
		<div class="row">
		
		<?php  $lowerFooter = esc_attr( get_option( 'lower_footer' ) ); ?>
			<?php if($lowerFooter == 'oneCol'){ ?>
				<div class="col-md-12"><?php dynamic_sidebar( 'lower-footer-1' ); ?></div>
			<?php } elseif($lowerFooter == 'twoCol'){ ?>
				<div class="col-md-6"><?php dynamic_sidebar( 'lower-footer-1' ); ?></div>
				<div class="col-md-6"><?php dynamic_sidebar( 'lower-footer-2' ); ?></div>
			<?php } elseif($lowerFooter == 'threeCol'){ ?>	
				<div class="col-md-4"><?php dynamic_sidebar( 'lower-footer-1' ); ?></div>
				<div class="col-md-4"><?php dynamic_sidebar( 'lower-footer-2' ); ?></div>
				<div class="col-md-4"><?php dynamic_sidebar( 'lower-footer-3' ); ?></div>
			<?php } elseif($lowerFooter == 'fourCol'){ ?>		
				<div class="col-md-3"><?php dynamic_sidebar( 'lower-footer-1' ); ?></div>
				<div class="col-md-3"><?php dynamic_sidebar( 'lower-footer-2' ); ?></div>
				<div class="col-md-3"><?php dynamic_sidebar( 'lower-footer-3' ); ?></div>
				<div class="col-md-3"><?php dynamic_sidebar( 'lower-footer-4' ); ?></div>
			<?php } ?>
			
		<?php if($containLowerFooter == 'Yes' || $containLowerFooter == ''){?></div><?php } ?>
		
		</div>
	
	</div>
	
	<div class="site-info">
		</div><!-- .site-info -->
	
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php get_template_part( 'main-modal' ); ?>

<?php wp_footer(); ?>
<!-- website by www.immedia-creative.com //-->
<!-- Start of signifiermedical Zendesk Widget script -->
<script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=e9594bf8-5f48-434c-b6d4-715521e70cb4"> </script>
<!-- End of signifiermedical Zendesk Widget script -->
<script type="text/javascript"> _linkedin_partner_id = "3337529"; window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || []; window._linkedin_data_partner_ids.push(_linkedin_partner_id); </script><script type="text/javascript"> (function(){var s = document.getElementsByTagName("script")[0]; var b = document.createElement("script"); b.type = "text/javascript";b.async = true; b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js"; s.parentNode.insertBefore(b, s);})(); </script> <noscript> <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=3337529&fmt=gif" /> </noscript>
</body>
</html>
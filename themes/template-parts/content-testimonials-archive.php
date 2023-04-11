<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package immedia
 */

?>

<div class="col-md-6 col-lg-4">
	<a class="service-box-cont" href="<?php the_permalink(); ?>">
		<div class="service-box">
		
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="thumb">
					<?php
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium'); 
						echo '<img src="' . $featured_img_url . '" alt="clinician image" />';
					?>
				</div>
			<?php } ?>
			
			<div class="service-content">
				<h3><?php the_title(); ?></h3>
				<?php if (has_excerpt()) { 
				$excerpt = get_the_excerpt(); ?>
					<p class="excerpt"><?php echo $excerpt; ?></p>
				<?php } ?>
				<div class="vc_btn3-container vc_btn3-inline ">
					<button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-round vc_btn3-style-flat vc_btn3-icon-right vc_btn3-color-blue" title="">Watch now <i class="vc_btn3-icon fas fa-chevron-right" aria-hidden="true"></i></button>
				</div>
			</div>
			
		</div>
	</a>
</div>
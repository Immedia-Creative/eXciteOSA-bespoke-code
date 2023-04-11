<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package immedia
 */

?>

<div class="article-col col-md-12">
			
	<a class="article-link" href="<?php echo get_permalink(); ?>">
						
		<div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_10 vc_sep_border_width_3 vc_sep_pos_align_left vc_separator_no_text vc_sep_color_blue  wpb_animate_when_almost_visible wpb_left-to-right left-to-right wpb_animate_when_almost_visible wpb_left-to-right left-to-right wpb_start_animation animated">
			<span class="vc_sep_holder vc_sep_holder_l">
				<span class="vc_sep_line"></span>
			</span>
			<span class="vc_sep_holder vc_sep_holder_r">
				<span class="vc_sep_line"></span>
			</span>
		</div>
							
									 
		<?php $str = get_the_title();  ?>
		<h3><?php echo $str ?></h3>
		
		<?php if (has_excerpt()) { 
			$excerpt = get_the_excerpt(); ?>
			<p><?php echo $excerpt; ?></p>
		<?php } else { ?>
			<p><?php echo kc_excerpt(); ?></p>
		<?php }
		
		$date = get_the_date(); ?>
		<div class="article-date"><?php echo $date; ?></div>
							
	</a>

</div>
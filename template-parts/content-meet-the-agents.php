<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package a4c
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

	<div class="feature_vid">
		<?php $feature_video_image = get_field('feature_video_thumbnail');
		if( !empty($feature_video_image) ): 
			// vars
			$url = $feature_video_image['url'];
			$title = $feature_video_image['title'];
			$alt = $feature_video_image['alt'];
			$caption = $feature_video_image['caption'];
		?>
		<div class="video-file">
			<a href="<?php the_field('feature_video_url'); ?>" id="link-to-vid" class="fancybox.iframe" title="<?php echo $title; ?>">
				<img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />
				<div class="overlay"><i class="fa fa-play-circle-o"></i></div>
			</a>
		</div>
		<?php endif; ?>
	</div>

</article><!-- #post-## -->

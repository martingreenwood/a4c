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

		<?php if(get_field('feature_video_url')): ?>
		<div class="box">
		<div class="video">
			<div class="playme">
				<a href="#" title="Press or click to play introductary video">
					<i class="fa fa-play"></i>
					<p class="screen-reader-text">Press or click to play the video</p>
				</a>
			</div>
			<div class="embed-container">
			<?php 
			// get iframe HTML
			$iframe = get_field('feature_video_url');
			
			// use preg_match to find iframe src
			preg_match('/src="(.+?)"/', $iframe, $matches);
			$src = $matches[1];

			// add extra params to iframe src
			$params = array(
			    'controls'		=> 1,
			    'hd'        	=> 1,
			    'rel'			=> 0,
			    'showinfo'		=> 0,
			    'autohide'    	=> 1
			);

			$new_src = add_query_arg($params, $src);

			$iframe = str_replace($src, $new_src, $iframe);

			// add extra attributes to iframe html
			$attributes = 'frameborder="0" id="introvid" width="1280" height="720"';

			$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

			// echo $iframe
			echo $iframe;

			?>
			</div>
		</div>
		</div>
		<?php endif; ?>

	</div>

</article><!-- #post-## -->

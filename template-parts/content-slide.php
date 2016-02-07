<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package a4c
 */

?>

<div class="slide">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if (has_post_thumbnail( $post->ID ) ): ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<section id="feature-image" style="background-image: url('<?php echo $image[0]; ?>')">
		</section>
		<?php endif; ?>
		<div class="intro">
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php the_content(); ?>
			</header><!-- .entry-header -->
		</div>

	</article><!-- #post-## -->

</div>
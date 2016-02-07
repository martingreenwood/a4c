<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package a4c
 */

?>

<div class="blog-item <?php echo get_post_type() ?>">

	<article id="post-<?php the_ID(); ?>" <?php post_class('resource'); ?>>

		<?php if ( has_post_thumbnail() ): ?>
		<section id="image">
		<a href="<?php the_permalink(); ?>">	
			<?php the_post_thumbnail('hot'); ?>
		</a>
		</section>
		<?php endif; ?>

		<div class="text">
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
			
		</div>
		
	</article><!-- #post-## -->
	
</div>
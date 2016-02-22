<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package a4c
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php the_post_thumbnail(); ?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php a4c_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php $embedly = get_field('embedly'); if ($embedly): ?>
	<div class="feature-content">
		<blockquote class="embedly-card" data-card-chrome="0"><h4><a href="<?php echo $embedly; ?>"></a></h4></blockquote>
		<script async src="//cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>
	</div>
	<?php endif; ?>

	<?php $file = get_field('document_url'); if( $file ): ?>
	<div class="feature-content">
		<a class="download button" href="<?php echo $file['url']; ?>"><?php echo $file['filename']; ?></a>
	</div><!-- .feature-content -->
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
	
</article><!-- #post-## -->


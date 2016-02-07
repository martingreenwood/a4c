<?php
/**
 * Template part for displaying posts.
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

			<footer class="entry-footer">
				<?php
				$cats = array();
				foreach(wp_get_post_categories(get_the_id()) as $c)
				{
					$cat = get_category($c);
					array_push($cats, $cat->name);
				}

				if(sizeOf($cats)==0) 
				{
					$post_categories = "Not Assigned";
				}
				else 
				{
					$post_categories = $cats;
				}
				?>
				<p class="left"><span><?php echo get_the_date(); ?></span> | <?php echo $post_categories[0]; //the_category(); ?></p>
			</footer><!-- .entry-footer -->
			
		</div>
		
	</article><!-- #post-## -->
	
</div>
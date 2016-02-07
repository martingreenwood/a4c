<?php
/**
 * The template for displaying the contact page.
 *
 * @package a4c
 */

get_header(); ?>

	<header id="page-header">
		<div class="inner">
			<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
			<?php if(function_exists('bcn_display')) {
				bcn_display();
			} ?>
			</div>
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
		</div>
	</header><!-- .entry-header -->

	<div id="content" class="site-content inner contact-info">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'contact' ); ?>

				<?php endwhile; // End of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>

<?php get_footer(); ?>

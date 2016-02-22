<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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

	<div id="content" class="site-content internal inner">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php endwhile; // End of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>

	<section id="article-form">
		<div class="inner">
		<?php 
	    	gravity_form_enqueue_scripts(5, true);
	    	gravity_form(5, false, false, false, '', true, 1); 
		?>
		</div>
	</section>

<?php get_footer(); ?>

<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
			<h1 class="page-title">RESOURCES</h1>
		</div>
	</header><!-- .entry-header -->

	<div id="content" class="site-content internal inner">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						get_template_part( 'template-parts/content', 'resources' );
					?>

				<?php endwhile; ?>

				<?php wp_pagenavi() //replaces the_posts_navigation(); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div>

<?php get_footer(); ?>

<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
			<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'a4c' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</div>
	</header><!-- .entry-header -->

	<div id="content" class="site-content internal inner">
		<section id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );
					?>

				<?php endwhile; ?>

			<?php endif; ?>

			</main><!-- #main -->
		</section><!-- #primary -->

		<?php get_sidebar(); ?>

	</div>

<?php get_footer(); ?>

<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package a4c
 */

get_header(); ?>

	<div id="content" class="site-content inner internal">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'a4c' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'a4c' ); ?></p>

						<?php get_search_form(); ?>

					</div><!-- .page-content -->

				</section><!-- .error-404 -->


			</main><!-- #main -->
		</div><!-- #primary -->

	</div>

	<div id="fresh">

		<div class="inner">

			<header>
				<h1>FRESH OFF THE PRESS</h1>
			</header>

			<div id="fresh-posts">
				<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array( 'ignore_sticky_posts' => 1, 'posts_per_page' => 3, 'paged' => $paged );
					$query = new WP_Query( $args );
					while ( $query->have_posts() ) : $query->the_post();
					get_template_part( 'template-parts/content', 'fresh' );
					endwhile;
					wp_reset_query();
				?>
			</div>

			<div class="more">
				<a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">More Articles</a>
			</div>

		</div>

	</div>


<?php get_footer(); ?>

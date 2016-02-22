<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
			<h1 class="page-title">Agent: <?php the_title(); ?></h1>
		</div>
	</header><!-- .entry-header -->

	<div class="poat-nav"><div class="inner">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_post_navigation(); ?>
	<?php endwhile; ?>
	</div></div>

	<div id="content" class="site-content inner internal">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'single-staff' ); ?>

			<?php endwhile; // End of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>

	<section id="contact-form">
		<div class="inner">
		<?php 
	    	gravity_form_enqueue_scripts(4, true);
	    	gravity_form(4, true, true, true, '', true, 1); 
		?>
		</div>
	</section>
	
<?php get_footer(); ?>

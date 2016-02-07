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
<?php $bgimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>

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

	<div id="content" class="site-content" <?php if($bgimage): ?>style="background-image: url('<?php echo $bgimage[0]; ?>')"<?php endif; ?>>

		<div class="inner">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/content', 'getting-involved' ); ?>

					<?php endwhile; // End of the loop. ?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div>

	<section id="help">
		
		<div class="inner">
			
			<header>
				<h2><?php the_field('additional_content_header'); ?></h2>
			</header>
			<?php

			if( have_rows('additional_content_columns') ):
		    while ( have_rows('additional_content_columns') ) : the_row(); ?>

			<div class="text">
				<?php the_sub_field('column_one'); ?>
			</div>
			<div class="text">
				<?php the_sub_field('column_two'); ?>
			</div>

		    <?php 
		    endwhile;
			endif;
			?>

		</div>

	</section>

	<section id="get-involved-form">
		
		<div class="inner">
			
			<div class="text">
			<?php 
				$form_object = get_field('form');
				gravity_form_enqueue_scripts($form_object['id'], true);
				gravity_form($form_object['id'], true, true, true, '', true, 1); 
			?>
			</div>

		</div>

	</section>

<?php get_footer(); ?>

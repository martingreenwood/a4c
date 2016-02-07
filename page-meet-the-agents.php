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
			<h1 class="page-title"><?php echo get_the_title(); ?></h1>
		</div>
	</header><!-- .entry-header -->

	<div id="content" class="site-content inner">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'meet-the-agents' ); ?>

				<?php endwhile; // End of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->

	</div>

	<section id="staff">

		<div class="inner">	

			<header>
				<h2>Meet The Agents</h2>
			</header>

			<?php 
			$staff_args = array( 'post_type' => 'staff', 'posts_per_page' => 3 ); 
			$staff_loop = new WP_Query( $staff_args ); 
			while ( $staff_loop->have_posts() ) : $staff_loop->the_post(); ?>
				
			<div class="staff-member">
				<div class="image">
					<?php the_post_thumbnail(); ?>
					<div class="overlay">
						<?php the_excerpt(); ?>
						<ul class="social">
							<li>
								<a href="<?php the_field('facebook'); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
							</li>
							<li>
								<a href="<?php the_field('twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
							</li>
							<li>
								<a href="<?php the_field('instagram'); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
							</li>
							<li>
								<a href="<?php the_field('linkedin'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
							</li>
						</ul>
					</div>
				</div>

				<div class="text">
					<?php the_title('<h3>', '</h3>'); ?>
					<h4><?php the_field('job_title'); ?></h4>
				</div>
			</div>

			<?php 
			endwhile; 
			wp_reset_query();
			?>
		</div>

		<div class="inner">
			<div class="more">
				<a title="Meet the rest of the team at An Agent for Change" href="<?php echo esc_url( home_url( '/' ) ); ?>">Meet the Rest</a>
			</div>
		</div>

	</section>

	<section id="change">
		
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

<?php get_footer(); ?>

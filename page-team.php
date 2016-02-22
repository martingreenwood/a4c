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


	<section id="team-full">

		<div class="inner">	

			<header>
				<h2>Meet The Agents</h2>
			</header>

			<div class="staff-profiles">
			<?php 
			$staff_args = array( 'post_type' => 'staff', 'posts_per_page' => 9 ); 
			$staff_loop = new WP_Query( $staff_args ); 
			while ( $staff_loop->have_posts() ) : $staff_loop->the_post(); ?>
				
			<div class="staff-member">
				
				<div class="image">
					<?php the_post_thumbnail(); ?>
					<div class="overlay">
						<?php the_excerpt(); ?>
						<a class="button" href="<?php the_permalink(); ?>">Read More about <?php the_title(); ;?></a>
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
					<a href="<?php the_permalink(); ?>">
						<?php the_title('<h3>', '</h3>'); ?>
						<h4><?php the_field('job_title'); ?></h4>
					</a>
				</div>

			</div>
			<?php 
			endwhile;
			wp_reset_query();
			?>
			</div>
		</div>
	</section>


<?php get_footer(); ?>

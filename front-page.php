<?php
/**
 * The Front Page Template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package a4c
 */

$HPBGimg = get_field('hompage_bg_image', 'option');
get_header(); ?>

	<div id="foreword" <?php if ($HPBGimg): ?>style="background-image: url(<?php echo $HPBGimg['url']; ?>);"<?php endif; ?>>
	
		<div class="overlay"></div>

			<div class="wrapper">
				<div class="inner">
					<div class="box">
						<?php while ( have_posts() ) : the_post(); ?>

							<?php
								get_template_part( 'template-parts/content', 'page' );
							?>

						<?php endwhile; ?>

					</div>
				</div>
			</div>
			
		</div>

	</div>

	<?php if( have_rows('cta') ): ?>
	<div id="cta">

		<div class="inner">
			
			<?php while ( have_rows('cta') ) : the_row(); ?>
			<div class="cta-text">
				<header>
					<h2><?php the_sub_field('title'); ?></h2>
				</header>
				<div class="text">
					<p><?php the_sub_field('text'); ?></p>
				</div>
				<div class="link">
					<a href="<?php the_sub_field('link'); ?>" title="Read more about - <?php the_sub_field('title'); ?>">lobortis accumsan dui</a>
				</div>
			</div>
			<?php endwhile; ?>

		</div>

	</div>
	<?php endif; ?>

	<?php if( have_rows('homepage_boxes') ): ?>
	<div id="intro">

		<div class="inner">
		<?php while ( have_rows('homepage_boxes') ) : the_row(); ?>
			<div class="box">
				<?php the_sub_field('icon'); ?>
				<h3><?php the_sub_field('heading'); ?></h3>
				<p><?php the_sub_field('text'); ?></p>
			</div>
			<?php endwhile; ?>
		</div>

	</div>
<?php endif; ?>

	<div id="content" class="site-content">
	
		<div id="primary" class="content-area">
		
			<main id="main" class="site-main" role="main">		

				<div id="hot">

					<div class="inner">

						<header>
							<h1>POPULAR ARTICLES RIGHT NOW</h1>
						</header>

						<div id="hot-posts">
							<?php
								base_display_popular_posts(6);
							?>
						</div>

						<div class="more">
							<a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">More Articles</a>
						</div>

					</div>

				</div>

				<div id="twitter" class="" role="complementary">
					
					<div class="inner">

						<div class="icon">
							<i class="fa fa-twitter"></i>
						</div>

						<?php dynamic_sidebar( 'Twitter Sidebar' ); ?>

					</div><!-- #second sidebar -->

				</div><!-- #secondary -->

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

			</main>

		</div>

	</div>

<?php get_footer(); ?>

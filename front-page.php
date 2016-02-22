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

		<?php if(get_field('homepage_video')): ?>
		<div class="box">
		<div class="video">
			<div class="playme">
				<a href="#" title="Press or click to play introductary video">
					<i class="fa fa-play"></i>
					<p class="screen-reader-text">Press or click to play introductary video</p>
				</a>
			</div>
			<div class="embed-container">
			<?php 
			// get iframe HTML
			$iframe = get_field('homepage_video');
			
			// use preg_match to find iframe src
			preg_match('/src="(.+?)"/', $iframe, $matches);
			$src = $matches[1];

			// add extra params to iframe src
			$params = array(
			    'controls'		=> 1,
			    'hd'        	=> 1,
			    'rel'			=> 0,
			    'showinfo'		=> 0,
			    'autohide'    	=> 1
			);

			$new_src = add_query_arg($params, $src);

			$iframe = str_replace($src, $new_src, $iframe);

			// add extra attributes to iframe html
			$attributes = 'frameborder="0" id="introvid" width="1280" height="720"';

			$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

			// echo $iframe
			echo $iframe;

			?>
			</div>
		</div>
		</div>
		<?php endif; ?>
	</div>
	
	<div id="intro">
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

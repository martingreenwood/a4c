<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package a4c
 */

?>


	<?php if( have_rows('cta', 'option') ): ?>
	<div id="cta">

		<div class="inner">
			
			<?php while ( have_rows('cta', 'option') ) : the_row(); ?>
			<div class="cta-text">
				<header>
					<h3><?php the_sub_field('title'); ?></h3>
				</header>
				<div class="text">
					<p><?php the_sub_field('text'); ?></p>
				</div>
				<div class="link">
					<a href="<?php the_sub_field('link'); ?>" title="Read more about - <?php the_sub_field('title'); ?>">Submit an Article</a>
				</div>
			</div>
			<?php endwhile; ?>

		</div>

	</div>
	<?php endif; ?>

	<footer id="footer" class="site-footer" role="contentinfo">
		
		<div class="site-info inner">
			
			<div class="left">
				<p>&copy; <?php echo date('Y'); ?> <?php echo bloginfo('name'); ?>. All Rights Reserved. <a title="Back to top" class="skip-link" href="#masthead"><?php esc_html_e( 'Back to top', 'a4c' ); ?></a></p>
			</div>
			
			<div class="right">
				<?php if( have_rows('social_profiles', 'option') ): ?>
				<div id="socilites">

					<?php while ( have_rows('social_profiles', 'option') ) : the_row(); ?>
					<a href="<?php the_sub_field('url'); ?>" title="<?php the_sub_field('link_title_text'); ?>" target="_blank" rel="social">
						<?php the_sub_field('icon'); ?>
					</a>
					<?php endwhile; ?>

				</div>
				<?php endif; ?>				
			</div>
		</div><!-- .site-info -->

		<div class="credit inner">
			<span>
				<a href="<?php echo esc_url( __( 'http://www.pixelpudu.com/', 'a4c' ) ); ?>"><?php printf( esc_html__( 'Built by  %s', 'a4c' ), 'Pixel Pudu' ); ?></a>
			</span>
		</div>

		<a title="Back to top" class="to-top" href="#masthead"><i class="fa fa-angle-up"></i> <span class="screen-reader-text"><?php esc_html_e( 'Back to top', 'a4c' ); ?></span></a

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

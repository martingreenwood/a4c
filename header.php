<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package a4c
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="<?php echo $pagename; ?>">

<div id="loader">

	<div class="mikepad-loading">
		<div class="binding"></div>
		<div class="pad">
			<div class="line line1"></div>
			<div class="line line2"></div>
			<div class="line line3"></div>
		</div>
		<div class="text">
			Page is loading...
		</div>
	</div>

</div>

<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

<div id="page" class="hfeed site">
	
	<header id="masthead" class="site-header" role="banner" <?php if(!is_front_page()): ?>style="background-image: url(<?php echo $feat_image; ?>);"<?php endif; ?>>

		<div id="top">
			
			<a class="toggle" title="Open Sidebar" href=""><span class="screen-reader-text">Open Sidebar</span><i class="fa fa-angle-double-down"></i></a>
			
			<div class="helper">

				<div class="inner">

					<div class="left">
						<a title="Skip to content" class="skip-link" href="#content"><i class="fa fa-angle-down"></i> <?php esc_html_e( 'Skip to content', 'ramps' ); ?></a>
						<a title="Skip to footer" class="skip-link" href="#colophon"><i class="fa fa-angle-down"></i> <?php esc_html_e( 'Skip to footer', 'ramps' ); ?></a>

						<div class="reciteme"><i class="fa fa-toggle-on"></i> Enable Recite</div>

						<?php //dynamic_sidebar( 'Top Sidebar' ); ?>

					</div>

					<div class="top-sidebar">
						<a id="search-link" href=""><i class="fa fa-search"></i></a>
						<div id="search-box"><?php get_search_form('true'); ?></div>
					</div><!-- #second sidebar -->

				</div>

			</div>

		</div>

		<div class="heading inner">

			<div class="site-branding">
				<h1 class="site-title">
					<a title="<?php bloginfo( 'description' ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php if (get_field('white_logo_svg', 'option')): ?>
						<img src="<?php the_field('white_logo_svg', 'option'); ?>"  alt="Logo for <?php bloginfo( 'name' ); ?>" width="250" height="">
					<?php endif; ?>
					</a>
				</h1>
			</div><!-- .site-branding -->

			<div id="navigation">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i><span class="screen-reader-text"><?php esc_html_e( 'Menu', 'a4c' ); ?></span></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?> 
				</nav><!-- #site-navigation -->
			</div>

		</div>

		<?php if(!is_front_page()): ?><div class="overlay"></div><?php endif; ?>
	</header><!-- #masthead -->

<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package a4c
 */

?>

<div id="secondary" class="widget-area" role="complementary">
	<div class="sidebar">
		<?php dynamic_sidebar( 'Main Sidebar' ); ?>
	</div><!-- #main sidebar -->
	<div class="sidebar">
		<?php dynamic_sidebar( 'Extra Sidebar' ); ?>
	</div><!-- #second sidebar -->
</div><!-- #secondary -->

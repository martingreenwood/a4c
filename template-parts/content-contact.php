<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package a4c
 */

?>

<div id="contact-info">
	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->

	</article><!-- #post-## -->

</div>


<section id="contact-form">
	
	<div class="text">
	<?php 
		$form_object = get_field('form');
		gravity_form_enqueue_scripts($form_object['id'], true);
		gravity_form($form_object['id'], false, false, false, '', false, 1); 
	?>
	</div>
		
</section>


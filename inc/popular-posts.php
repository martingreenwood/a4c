<?php
/**
 * Popular posts tracking
 *
 * Tracks the number of logged out user views for a post in a custom field
 */
function base_track_popular_posts() {

	// Only run the process for single posts, pages and post types when the user is logged out
	if ( is_singular() && !is_user_logged_in() ) {
		
		global $post;
		$custom_field = '_base_popular_posts_count';
		
		// Set/check session
		//if ( !session_id() ) {
		//	session_start();
		//}
		
		// Only track a one view per post for a single visitor session to avoid duplications
		if ( !isset( $_SESSION["popular-posts-count-{$post->ID}"] ) ) {
			
			// Update view count 
			$view_count = get_post_meta( $post->ID, $custom_field, true );
			$stored_count = ( isset($view_count) && !empty($view_count) ) ? ( intval($view_count) + 1 ) : 1;
			$update_meta = update_post_meta( $post->ID, $custom_field, $stored_count );
			
			// Check for errors
			if ( is_wp_error($update_meta) )
				error_log( $update_meta->get_error_message(), 0 );
			
			// Store session in "viewed" state
			$_SESSION["popular-posts-count-{$post->ID}"] = 1;
		}

		// Show view the count for testing purposes (add "?show_count=1" onto the URL)
		if ( isset($_GET['show_count']) && intval($_GET['show_count']) == 1 ) {
			echo '<p style="color:red; text-align:center; margin:1em 0;">';
			echo get_post_meta( $post->ID, $custom_field, true );
			echo ' views of this post</p>';
		}
	}
}
add_action('wp_head', 'base_track_popular_posts');

/**
 * Popular posts display
 *
 * Display a list of popular posts without the containing element (just LI's)
 *
 * @param $size The number of posts to display
 */
function base_display_popular_posts( $size = 6 ) {

	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	// Query arguments
	$popular_args = array(
		'meta_key' => '_base_popular_posts_count',
		'orderby' => 'meta_value_num',
		'ignore_sticky_posts' => 1,
		'posts_per_page' => $size,
		'paged' => $paged
	);

	// The query
	$popular_posts = new WP_Query( $popular_args );

	// The loop
	while ( $popular_posts->have_posts() ) {
		$popular_posts->the_post();
		get_template_part( 'template-parts/content', 'hot' );
	}

	// Reset post data
	wp_reset_postdata();
}
<?php
/**
 * a4c functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package a4c
 */

if ( ! function_exists( 'a4c_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function a4c_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on a4c, use a find and replace
	 * to change 'a4c' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'a4c', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'sticky', 1280, 840, true ); // Hard Crop Mode
	add_image_size( 'hot', 600, 250, true ); // Hard Crop Mode

	//add_image_size( 'homepage-thumb', 220, 180 ); // Soft Crop Mode
	//add_image_size( 'singlepost-thumb', 590, 9999 ); // Unlimited Height Mode

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'a4c' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );
}
endif; // a4c_setup
add_action( 'after_setup_theme', 'a4c_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function a4c_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'a4c_content_width', 1280 );
}
add_action( 'after_setup_theme', 'a4c_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function a4c_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'a4c' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Extra Sidebar', 'a4c' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Twitter Sidebar', 'a4c' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	

	register_sidebar( array(
		'name'          => esc_html__( 'Top Sidebar', 'a4c' ),
		'id'            => 'sidebar-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	
}
add_action( 'widgets_init', 'a4c_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function a4c_scripts() {
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'slick-css', 'https://cdn.jsdelivr.net/jquery.slick/1.5.7/slick.css' );	
	wp_enqueue_style( 'fancy-css', get_template_directory_uri() .'/assets/fancybox/jquery.fancybox.css' );
	wp_enqueue_style( 'a4c-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery' );
  	wp_enqueue_script( 'tinymce', '/wp-includes/js/tinymce/tinymce.min.js', '', '', true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', '', '', true );
	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js', '', '', true );
	wp_enqueue_script( 'respond', get_template_directory_uri() . '/js/min/respond-min.js', '', '', true );
	wp_enqueue_script( 'a4c-navigation', get_template_directory_uri() . '/js/min/navigation-min.js', '', '', true );

	wp_enqueue_script( 'recite-js', 'https://api.reciteme.com/asset/js?key=a148cd71bd67b6e9c897aab6b541cbf4425ca2be', '', '', true );
	wp_enqueue_script( 'slick-js', 'https://cdn.jsdelivr.net/jquery.slick/1.5.7/slick.min.js', '', '', true );	
	wp_enqueue_script( 'fancy-js', get_template_directory_uri() . '/assets/fancybox/jquery.fancybox.js', '', '', true );

	wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js', '', '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'a4c_scripts' );

/**
 * Add TypeKit
 */
function a4c_typekit() { ?>
<script>
  (function(d) {
    var config = {
      kitId: 'eme0otq',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>
<?php }
add_action('wp_head', 'a4c_typekit', 99);

function reciteMe() { ?>
<script type="text/javascript">
Recite.load({
    enableButton: '.reciteme'
});
</script><?php
}
add_action('wp_footer', 'reciteMe', 99);

function myTiny() {
	if(!is_admin())
	?>
	<script>
		tinymce.init({ 
			selector:'.gf_html textarea',
			menubar: false,
			content_css : 'wp-includes/js/tinymce/skins/wordpress/wp-content.css',
			//plugins: 'link paste table textcolor',
		});
	</script>
	<?php
}
add_action('wp_footer', 'myTiny', 99);


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Post Types.
 */
require get_template_directory() . '/inc/post-types.php';

/**
 * Popular Posts.
 */
require get_template_directory() . '/inc/popular-posts.php';

/**
 * Theme Options.
 */
require get_template_directory() . '/inc/theme-options.php';

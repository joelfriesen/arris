<?php
/**
 * arrisdesign functions and definitions
 *
 * @package arrisdesign
 */


if ( ! function_exists( 'arrisdesign_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function arrisdesign_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on arrisdesign, use a find and replace
	 * to change 'arrisdesign' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'arrisdesign', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Set the content width based on the theme's design and stylesheet.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
	}	
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'arrisdesign-home', 478, 308, true );
	add_image_size( 'slider-image', 700, 500, true );
	add_image_size( 'single-thumb', 700 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary-menu' => __( 'Primary Menu', 'arrisdesign' ),
		'secondary-menu' => __( 'Mobile menu', 'arrisdesign' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );


	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );
}
endif; // arrisdesign_setup
add_action( 'after_setup_theme', 'arrisdesign_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function arrisdesign_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'arrisdesign' ),
		'id'            => 'page',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'arrisdesign' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer', 'arrisdesign' ),
		'id'            => 'footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );	
	
	//Register the custom widgets
	register_widget( 'arrisdesign_Recent_Posts' );
	register_widget( 'arrisdesign_Recent_Comments' );
	register_widget( 'arrisdesign_Social_Profile' );
	register_widget( 'arrisdesign_Video_Widget' );
}
add_action( 'widgets_init', 'arrisdesign_widgets_init' );
/**
 * Load the custom widgets.
 */
require get_template_directory() . "/widgets/recent-posts.php";
require get_template_directory() . "/widgets/recent-comments.php";
require get_template_directory() . "/widgets/social-profile.php";
require get_template_directory() . "/widgets/video-widget.php";
/**
 * Enqueue scripts and styles.
 */
function arrisdesign_scripts() {
	
	wp_enqueue_style( 'arrisdesign-style', get_stylesheet_uri(), '', '2.34esesds4' );
	
	$headings_font = esc_html(get_theme_mod('headings_fonts'));
	$body_font = esc_html(get_theme_mod('body_fonts'));
	if( $headings_font ) {
		wp_enqueue_style( 'arrisdesign-headings-fonts', '//fonts.googleapis.com/css?family='. $headings_font );	
	} else {
		wp_enqueue_style( 'arrisdesign-headings-fonts', '//fonts.googleapis.com/css?family=Oswald:700');
	}	
	if( $body_font ) {
		wp_enqueue_style( 'arrisdesign-body-fonts', '//fonts.googleapis.com/css?family='. $body_font );	
	} else {
		wp_enqueue_style( 'arrisdesign-body-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700');
	}
	


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( get_theme_mod('arrisdesign_layout') == 'sidebar-content' )  {
		wp_enqueue_style( 'arrisdesign-left-sidebar', get_template_directory_uri() . '/layouts/sidebar-content.css' );
	}	
}
add_action( 'wp_enqueue_scripts', 'arrisdesign_scripts' );


/**
 * Load html5shiv
 */
function arrisdesign_html5shiv() {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action( 'wp_head', 'arrisdesign_html5shiv' ); 
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load the slider.
 */
require get_template_directory() . '/inc/slider/slider.php';

/**
 * Dynamic styles
 */
require get_template_directory() . '/styles.php';
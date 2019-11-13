<?php
/**
 * Functions
 *
 * This file contains general functions
 *
 * @author    Agency Name
 * @copyright 2017 Agency Name
 * @version   1.0
 */

define( 'THEME_DIRECTORY', get_template_directory() );

/*
Body classes
- add more classes to the body to enable more specific targeting if needed
*/
function ambrosite_body_class($classes) 
{$post_name_prefix = 'postname-';
$page_name_prefix = 'pagename-';
$single_term_prefix = 'single-';
$single_parent_prefix = 'parent-';
$category_parent_prefix = 'parent-category-';
$term_parent_prefix = 'parent-term-';
$site_prefix = 'site-';
global $wp_query;
if ( is_single() ) {$wp_query->post = $wp_query->posts[0]; setup_postdata($wp_query->post);$classes[] = $post_name_prefix . $wp_query->post->post_name;$taxonomies = array_filter( get_post_taxonomies($wp_query->post->ID), "is_taxonomy_hierarchical" );
  foreach ( $taxonomies as $taxonomy ) {$tax_name = ( $taxonomy != 'category') ? $taxonomy . '-' : '';$terms = get_the_terms($wp_query->post->ID, $taxonomy);
    if ( $terms ) {
      foreach( $terms as $term ) {
        if ( !empty($term->slug ) )$classes[] = $single_term_prefix . $tax_name . sanitize_html_class($term->slug, $term->term_id);
        while ( $term->parent ) {$term = &get_term( (int) $term->parent, $taxonomy );
          if ( !empty( $term->slug ) )$classes[] = $single_parent_prefix . $tax_name . sanitize_html_class($term->slug, $term->term_id);
          }
        }
      }
    }
  } 
elseif ( is_archive() ) {
  if ( is_category() ) {$cat = $wp_query->get_queried_object();
    while ( $cat->parent ) {$cat = &get_category( (int) $cat->parent);
      if ( !empty( $cat->slug ) )$classes[] = $category_parent_prefix . sanitize_html_class($cat->slug, $cat->cat_ID);
      }
    } 
  elseif ( is_tax() ) {$term = $wp_query->get_queried_object();
    while ( $term->parent ) 
      {$term = get_term( (int) $term->parent, $term->taxonomy );
      if ( !empty( $term->slug ) )$classes[] = $term_parent_prefix . sanitize_html_class($term->slug, $term->term_id);
      }
    }
  } 
  elseif ( is_page() ) {$wp_query->post = $wp_query->posts[0];setup_postdata($wp_query->post);$classes[] = $page_name_prefix . $wp_query->post->post_name;
  }
if ( is_multisite() ) {
  global $blog_id;$classes[] = $site_prefix . $blog_id;
}
return $classes;} add_filter('body_class', 'ambrosite_body_class');
/*
Disable the theme editor
- stop clients from breaking their website
*/
define('DISALLOW_FILE_EDIT', true);

/*
Remove version info
- makes it that little bit harder for hackers
*/
function complete_version_removal() {
    return '';
}
add_filter('the_generator', 'complete_version_removal');

// Allow SVG Uploads

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// function fix_svg_thumb_display() {
//   echo '
//     td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail { 
//       width: 100% !important; 
//       height: auto !important; 
//     }
//   ';
// }
// add_action('admin_head', 'fix_svg_thumb_display');


/*
Remove info from headers
- remove the stuff we don't need
*/
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/*
Excerpt
- this theme supports excerpts
*/
add_post_type_support( 'page', 'excerpt' );

function new_excerpt_more($more) {
     global $post;
	 return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function new_excerpt_length($length) {
	return 40;
}
add_filter('excerpt_length', 'new_excerpt_length');

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt).'...';
  } else {
	$excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
	array_pop($content);
	$content = implode(" ",$content).'...';
  } else {
	$content = implode(" ",$content);
  } 
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}


/*EXCERPT BY ID*/

function get_excerpt_by_id( $post_id ) {
	global $post;
	$save_post = $post;
	$post = get_post( $post_id );
	setup_postdata( $post );
	$excerpt = get_the_excerpt();
	$post = $save_post;
	wp_reset_postdata( $post );
	return $excerpt;
}


/*
Thumbnails
- this theme supports thumbnails
*/
add_theme_support( 'post-thumbnails' );
// add_theme_support('woocommerce');
add_image_size ( 'square', 320, 320, true );

/*
Scripts & Styles
- include the scripts and stylesheets
*/
add_action( 'wp_enqueue_scripts', 'script_enqueues' );

function script_enqueues() {
			
	if ( wp_script_is( 'jquery', 'registered' ) ) {
		
		wp_deregister_script( 'jquery' );
		
	}

	// Add Google Fonts
	wp_register_style( 'google-fonts', '//fonts.googleapis.com/css?family=Cairo:300,400,600,700&display=swap');
	wp_enqueue_style( 'google-fonts' );
	
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', array(), '2.2.4', false );

	wp_enqueue_script( 'vendor_js', get_template_directory_uri() . '/js/vendor.min.js', array( 'jquery' ), '1.0.0', true );
	
	wp_enqueue_script( 'custom_js', get_template_directory_uri() . '/js/main.min.js', array( 'jquery' ), '1.0.0', true );
	
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.min.css', false, '1.0.0', 'all' );
	
}

/*
Menus
- enable WordPress Menus
*/
if (function_exists('register_nav_menus')){register_nav_menus(array(

	'header' => __( 'Main Nav' )


	));}

/*
Menu Classes
- add first and last to menu items
*/
function wpdev_first_and_last_menu_class($items) {
    $items[1]->classes[] = 'first';
    $items[count($items)]->classes[] = 'last';
    return $items;
}
add_filter('wp_nav_menu_objects', 'wpdev_first_and_last_menu_class');

/*
Admin Bar
- hide the admin bar
*/
add_filter('show_admin_bar', '__return_false');
	
/*
AFC Options
- register the AFC options
*/
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}

/*
WordPress Admin
- fix Chrome bug
*/
add_action('admin_enqueue_scripts', 'chrome_fix');
function chrome_fix() {
	if ( strpos( $_SERVER['HTTP_USER_AGENT'], 'Chrome' ) !== false )
		wp_add_inline_style( 'wp-admin', '#adminmenu { transform: translateZ(0); }' );
}

/*
Custom Editor Styles
- add custom styles to the wysiwyg
*/
class Custom_Editor_Styles {
 public $plugin_dir;
 public $plugin_url;
 public function __construct() {
  $this->plugin_dir = dirname( __FILE__ );
  $this->plugin_url = plugins_url( basename( dirname( __FILE__ ) ) );
  add_filter( 'tiny_mce_before_init', array( $this, 'tiny_mce_before_init' ) );
  add_filter( 'mce_buttons_2', array( $this, 'mce_buttons_2' ) );
 }
 public function tiny_mce_before_init( $settings ) {
  $style_formats = array(
	array(  
	    'title' => 'No Margin Bottom',  
	    'selector' => 'p, h1, h2, h3, h4, h5, h6',  
	    'classes' => 'nmb'
   	),

   	array(  
	    'title' => 'Large Margin Bottom',  
	    'selector' => 'p, h1, h2, h3, h4, h5, h6',  
	    'classes' => 'lmb'
   	),

   	array(  
	    'title' => '10px Margin Bottom',  
	    'selector' => 'p, h1, h2, h3, h4, h5, h6',  
	    'classes' => 'tmb'
   	),

   	array(  
	    'title' => '20px Margin Bottom',  
	    'selector' => 'p, h1, h2, h3, h4, h5, h6',  
	    'classes' => 'twmb'
   	),

   	array(  
	    'title' => '30px (Default)',  
	    'selector' => '',  
	    'classes' => 'na'
   	),

   	array(  
	    'title' => '40px Margin Bottom',  
	    'selector' => 'p, h1, h2, h3, h4, h5, h6',  
	    'classes' => 'fmb'
   	),
   	array(  
	    'title' => 'green Text',  
	    'selector' => 'p, h1, h2, h3, h4, h5, h6, a',  
	    'classes' => 'green'
   	),

   	array(  
	    'title' => 'Blue Text',  
	    'selector' => 'p, h1, h2, h3, h4, h5, h6, a',  
	    'classes' => 'blue'
   	),

   	array(  
	    'title' => 'Title Format',  
	    'selector' => 'p, h1, h2, h3, h4, h5, h6, a',  
	    'classes' => 'title'
   	),
   	
  );
  $settings['style_formats'] = json_encode( $style_formats );
  return $settings;
 }
 public function mce_buttons_2( $buttons ) {
  array_unshift( $buttons, 'styleselect' );
  return $buttons;
 }
}
$Custom_Editor_Styles = new Custom_Editor_Styles();
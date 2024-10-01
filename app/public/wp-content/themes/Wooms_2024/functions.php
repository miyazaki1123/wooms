<?php
require_once get_template_directory() . '/config.php';
require_once get_template_directory() . '/function/init.php';
require_once get_template_directory() . '/function/shortcodes.php';
require_once get_template_directory() . '/function/form.php';
require_once get_template_directory() . '/function/script.php';

function mytheme_scripts(){
  wp_enqueue_style('mytheme-style', get_stylesheet_uri());
}
add_filter('script_loader_tag', 'add_async_to_script', 10, 3);
function add_async_to_script($tag, $handle, $src)
{
  if ('js' === $handle) {
    $tag = '<script type="module" src="' . esc_url($src) . '"></script>'. "\n";
  }
  return $tag;
}

function my_scripts(){
	$version = wp_get_theme()->get('Version');
	wp_enqueue_style('style_css', get_template_directory_uri() . '/assets/css/style.css', true,$version);
  wp_enqueue_style('splide_css', get_template_directory_uri() . '/assets/css/splide.min.css', true,$version);
  wp_enqueue_script('splide', get_template_directory_uri() . '/assets/js/splide.min.js', array(), $version, true);
  wp_enqueue_script('sticky', get_template_directory_uri() . '/assets/js/sticky.js', array(), $version, true);
	wp_enqueue_script('js', get_template_directory_uri() . '/assets/js/main.js', array(), $version, true);
  global $post;
}
add_action('wp_enqueue_scripts', 'my_scripts');

function remove_my_global_styles(){
  wp_dequeue_style('classic-theme-styles');
  //wp_dequeue_style('global-styles');
  //wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'remove_my_global_styles');

function my_admin_script(){
  wp_enqueue_style( 'editor_css', get_template_directory_uri().'/assets/css/editor-style.css');
	
}
add_action( 'admin_enqueue_scripts', 'my_admin_script' );

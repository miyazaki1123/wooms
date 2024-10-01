<?php

// 「?author=1」対策
function disable_author_template_redirect() {
  if ( ! is_admin() && is_author() ) {
      wp_redirect( home_url() );
      exit;
  }
}
add_action( 'template_redirect', 'disable_author_template_redirect' );

/*
function deny_rest_rest_pre_dispatch( $result, $wp_rest_server, $request ){
  //permit oembed, Contact Form 7, Akismet
  $permitted_routes = [ 'oembed', 'mw-wp-form', 'akismet', 'all-in-one-seo-pack'];

  $route = $request->get_route();

  foreach ( $permitted_routes as $r ) {
      if ( strpos( $route, "/$r/" ) === 0 ) return $result;
  }

  //permit Gutenberg（ユーザーが投稿やページの編集が可能な場合）
  if ( current_user_can( 'edit_posts' ) || current_user_can( 'edit_pages' )) {
      return $result;
  }
  return new WP_Error( 'rest_disabled', __( 'The REST API on this site has been disabled.' ), array( 'status' => rest_authorization_required_code() ) );
}
add_filter( 'rest_pre_dispatch', 'deny_rest_rest_pre_dispatch', 10, 3 );
*/

//wp-sitemap-users-1.xml 投稿者アーカイブを無効化
function sitemap_hide_user($provider, $name) {
  if ('users' === $name) {
      return false;
  }
  return $provider;
}
add_filter('wp_sitemaps_add_provider', 'sitemap_hide_user', 10, 2);



function add_editor_style_func(){
  add_editor_style();
}

remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');

remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
function disable_emojis()
{
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'disable_emojis');

// Disable because wp-json is not used front side.
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');

// Invalid because it's different from the actual permalink.
remove_action('wp_head', 'wp_shortlink_wp_head');
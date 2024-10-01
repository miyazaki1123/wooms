<?php get_header(); ?>
<main class="site-main">
<?php
	global $post;
  	$slug = $post->post_name;
		if ( have_posts() ) {
			the_post();
					$filename = "template/page/page-".$slug;
					$filename2 = WP_CONTENT_DIR . "/themes/" . get_template() . "/template/page/page-" . $slug . ".php";
				if (file_exists($filename2)) {
					get_template_part($filename); 
				}else{
					get_template_part( 'template/page/page' );
			}
		} else {
			get_template_part( 'template/page/page/', 'none' );
		}
?>

</main>

<?php get_footer(); ?>
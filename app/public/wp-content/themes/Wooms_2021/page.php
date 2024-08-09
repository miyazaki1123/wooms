<?php get_header(); ?>

<article class="<?php 
		$page = get_page(get_the_ID());
		$slug = $page->post_name;
		echo $slug . "-page";
	?>">

<?php while ( have_posts() ) : the_post();?>

<?php the_content();?>


<?php endwhile;?>

</article>

<?php get_footer(); ?>
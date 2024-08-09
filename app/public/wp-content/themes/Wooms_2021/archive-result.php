<?php
/**
 *
 * archive.php
 *
 * The archive template. Used when a category, author, or date is queried.
 * Note that this template will be overridden by category.php, author.php, and date.php for their respective query types. 
 *
 * More detailed information about template’s hierarchy: http://codex.wordpress.org/Template_Hierarchy
 *
 */
get_header(); ?>
			<?php
			if (have_posts()) {
				global $posts;
				$post = $posts[0];

				/*theme_ob_start();*/


				if (is_category()) {
					echo '<h1 class="page_title">' . single_cat_title('',false) . '</h1>'."\n";
				} elseif (is_tag()) {
					echo '<h1 class="page_title">' . single_tag_title('',false) . '</h1>'."\n";
				} elseif (is_day()) {
					echo '<h1 class="page_title">' . sprintf(__('Daily Archives: <span>%s</span>', THEME_NS), get_the_date()) . '</h1>'."\n";
				} elseif (is_month()) {
					echo '<h1 class="page_title">' . sprintf(__('Monthly Archives: <span>%s</span>', THEME_NS), get_the_date('F Y')) . '</h1>'."\n";
				} elseif (is_year()) {
					echo '<h1 class="page_title">' . sprintf(__('Yearly Archives: <span>%s</span>', THEME_NS), get_the_date('Y')) . '</h1>'."\n";
				} elseif (is_author()) {
					the_post();
					echo theme_get_avatar(array('id' => get_the_author_meta('user_email')));
					echo '<h1 class="page_title">' . get_the_author() . '</h1>'."\n";
					$desc = get_the_author_meta('description');
					if ($desc) {
						echo '<div class="author-description">' . sprintf( $desc ) .'</div>'."\n";
					}
					rewind_posts();
				} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
					echo '<h1 class="page_title">' . __('Blog Archives', THEME_NS) . '</h1>'."\n";
				}
/* 追記 				$content = ob_get_clean();
/*				theme_post_wrapper(array('content' => ob_get_clean(), 'class' => 'breadcrumbs'));

				/* Display navigation to next/previous pages when applicable */
/*				if (theme_get_option('theme_top_posts_navigation')) {
					theme_page_navigation();
				}
*/
				?>
			<article class="content">
				<h1>導入事例</h1>
				<ul class="postlist">
<?php 
				/* Start the Loop */
				while (have_posts()) {
					the_post();?>
					<li><p class="title"><a href="<?php the_permalink(); ?>"><?php 
						echo get_the_title();
						
						$rslt_address = get_post_meta(get_the_ID(), '住所',true);
						if(!(empty($rslt_address))){
							echo ' <span class="address">('.$rslt_address.')</span>'."\n";
						}
						
					?></a></p></li>
<?php
					
				}
				
				?>
				
				</ul>
				<div class="navigation"><?php posts_nav_link(); ?></div>
				<?php
				/* Display navigation to next/previous pages when applicable */
/*				if (theme_get_option('theme_bottom_posts_navigation')) {
					theme_page_navigation();
				}
*/			} else {
				theme_404_content();
			}
			?>

<?php get_footer();

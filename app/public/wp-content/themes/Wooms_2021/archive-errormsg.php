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
			
			query_posts($query_string . '&posts_per_page=0');
			
			
			?>
			<h1 class="arcvtitle">エラーコード検索</h1>
			
			
			<?php
			
			
			
			
			errsrch(0);
			
			
			
			
			
			
			
			?>

<?php get_footer();

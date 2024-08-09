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
			$term = $wp_query->queried_object;
			
			query_posts($query_string . '&posts_per_page=-1&orderby=date&order=ASC');
//			query_posts($query_string . '&posts_per_page=-1&orderby=title&order=ASC');
			
			errsrch($term->term_id);
			
			$code = preg_replace('/\-.*/', '', strtoupper (urldecode ( $term->slug )));
			$code = preg_replace('/__/', '-', $code);
			
			echo '<!--'.$a.'-->';
			echo '<h1 class="arcvtitle"> 「'.$code.'」のエラーコード一覧</h1>';
			
			if (have_posts()) {
				global $posts;
				$post = $posts[0];
				
				echo '<table class="errorcodelist">';
				while (have_posts()) {
					the_post();
					
					
					
					
					?>
					
					
					
					<tr>
						<th><?php the_title();?></th>
						<td>
					<?php
										$error_name = get_field('error_name');
										$error_detail = get_field('error_detail');
										$approach = get_field('approach');

						if($error_name){echo '<div class="error_name">'.$error_name.'</div>'."\n";}
						if($error_detail){echo '<div class="error_detail"><p class="title">内容</p>'.$error_detail.'</div>'."\n";}
						if($approach){echo '<div class="approach"><p class="title">対処</p>'.$approach.'</div>'."\n";}
					?>
						</td>
					</tr>
					<?php
					
					
					
					
				}
				echo '</table>';
				
			} else {
				/*
				theme_404_content();
				*/
				echo 'エラーコードが見つかりませんでした。';
			}
			?>

<?php get_footer();

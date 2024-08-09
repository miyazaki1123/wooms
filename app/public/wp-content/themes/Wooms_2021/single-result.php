<?php get_header(); ?>
<script>
	lightbox.option({
	　　　/*オプションの記述の例*/
	　　　　'showImageNumberLabel': false
	});
</script>
<article class="single-inner content single-content">
<p class="jireilogo">導入事例</p>
<?php while ( have_posts() ) : the_post();?>
		
		<?php
		$iconimg = 	array(
			'',
			'cl_result_icon_wd1',
			'cl_result_icon_wd2',
			'cl_result_icon_wd3',
			'cl_result_icon_wash1',
			'cl_result_icon_wash2',
			'cl_result_icon_wash3',
			'cl_result_icon_dry1',
			'cl_result_icon_dry2',
			'cl_result_icon_dry3');
		$iconlabel = 	array(
			'',
			'洗濯乾燥機 特大',
			'洗濯乾燥機 大',
			'洗濯乾燥機 中',
			'乾燥機 特大',
			'乾燥機 大',
			'乾燥機 中',
			'洗濯機 特大',
			'洗濯機 大',
			'洗濯機 中'
		);

		$rslt_icons = get_post_meta(get_the_ID(), '導入機器アイコン',true);
		$rslt_address = get_post_meta(get_the_ID(), '住所',true);
		$rslt_machines = get_post_meta(get_the_ID(), '導入機種',true);
		$rslt_image1 = get_post_meta(get_the_ID(), '画像１',true);
		$rslt_image2 = get_post_meta(get_the_ID(), '画像２',true);
		$rslt_image3 = get_post_meta(get_the_ID(), '画像３',true);
		$rslt_image4 = get_post_meta(get_the_ID(), '画像４',true);

		echo '<div class="titlearea">'."\n";
		echo '<h1 class="single_title">'.get_the_title().'</h1>'."\n";;
		
		if(!(empty($rslt_address))){
			echo '<p class="address">住所:'.$rslt_address.'</p>'."\n";
		}
		echo '</div>'."\n";
		
		
		
		echo '<section class="information">'."\n";
		echo '<div class="machines">'."\n";
		if(!(empty($rslt_machines))){
			echo '<p>導入機種</p>'."\n";
			echo '<dl>'."\n";
			
 			$machines = explode(',', $rslt_machines);
			foreach($machines as $machine){
				$single = explode(':', $machine);
				echo '<dt>'.$single[0].'</dt>'.'<dd>'.$single[1].'台</dd>'."\n";
			}
			echo '</dl>'."\n";
		}
		echo '</div>'."\n";
		


		




		echo '<ul class="icons">'."\n";
		foreach($rslt_icons as $icon){
			echo '<li><img src="'.get_bloginfo ('template_url').'/images/'.$iconimg[$icon].'.png" alt="'.$iconlabel[$icon].'"/></li>'."\n";
		}
		echo '</ul>'."\n";
		echo '</section>'."\n";
		
		echo '<section class="images">'."\n";
		echo '<ul>'."\n";
		if(!(empty($rslt_image1))){
			echo '<li><img src="'.wp_get_attachment_image_src($rslt_image1, 'full' )[0].'" /></li>'."\n";
		}
		if(!(empty($rslt_image2))){
			echo '<li><img src="'.wp_get_attachment_image_src($rslt_image2, 'full' )[0].'" /></li>'."\n";
		}
		if(!(empty($rslt_image3))){
			echo '<li><img src="'.wp_get_attachment_image_src($rslt_image3, 'full' )[0].'" /></li>'."\n";
		}
		if(!(empty($rslt_image4))){
			echo '<li><img src="'.wp_get_attachment_image_src($rslt_image4, 'full' )[0].'" /></li>'."\n";
		}
		echo '</ul>'."\n";
		echo '</section>'."\n";
		
		
		?>				
		<section class="body">
		<?php the_content();?>
		</section>
		
		
		
		
<?php endwhile;?>
<p class="backtolist"><a href="/result/">＜＜  事例一覧へ ＞＞</a></p>
<?php get_footer(); ?>
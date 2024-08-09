<?php get_header(); ?>

<article class="single-inner content single-content">
	<?php while (have_posts()) : the_post(); ?>
		<?php
		$category = get_the_category();
		$cat = $category[0];
		//カテゴリー名
		$cat_name = $cat->name;
		//カテゴリーID
		$cat_id = $cat->cat_ID;
		//カテゴリースラッグ
		$cat_slug = $cat->slug;
		?>
		<?php
		$url_encode = urlencode(get_permalink());
		$title_encode = urlencode(get_the_title()) . '｜' . get_bloginfo('name');
		?>

		<section class="ContentWrap">
			<div class="singlesubWrap">
				<p class="single_cat" category="<?php echo $cat_slug; ?>"><?php echo $cat_name; ?></p>
				<p class="single_date"><?php the_time('Y/m/d'); ?></p>
			</div>
			<h1 class="single_title"><?php the_title(); ?></h1>
			<div class="share">
				<ul>
					<!--ツイートボタン-->
					<li class="tweet">
						<a href="//twitter.com/intent/tweet?url=<?php echo $url_encode ?>&text=<?php echo $title_encode ?>&tw_p=tweetbutton" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
							<span><img src="<?php bloginfo('template_url') ?>/images/twitter0.png"></span>
						</a>
					</li>

					<!--Facebookボタン-->
					<li class="facebooklink">
						<a href="//www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encode; ?>&t=<?php echo $title_encode; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">

							<span><img src="<?php bloginfo('template_url') ?>/images/facebook0.png"></span>
						</a>
					</li>


					<!--LINEボタン-->
					<li class="line">
						<a href="//social-plugins.line.me/lineit/share?url=<?php echo $url_encode; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;">
							<span><img src="<?php bloginfo('template_url') ?>/images/line0.png"></span>
						</a>
					</li>

					<!--Noteボタン-->
					<li class="note">
					<a href="https://note.com/intent/post?url=<?php echo $url_encode; ?>" target="_blank" rel="noopener">
					<span><img src="<?php bloginfo('template_url') ?>/images/Note0.png"></span>
					</a>
					</li>
				</ul>
			</div>

			<div class="SingleMainContent">
				<?php the_content(); ?>
			</div>
			<div class="share">
				<ul>
					<!--ツイートボタン-->
					<li class="tweet">
						<a href="//twitter.com/intent/tweet?url=<?php echo $url_encode ?>&text=<?php echo $title_encode ?>&tw_p=tweetbutton" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
							<span><img src="<?php bloginfo('template_url') ?>/images/twitter0.png"></span>
						</a>
					</li>

					<!--Facebookボタン-->
					<li class="facebooklink">
						<a href="//www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encode; ?>&t=<?php echo $title_encode; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">

							<span><img src="<?php bloginfo('template_url') ?>/images/facebook0.png"></span>
						</a>
					</li>


					<!--LINEボタン-->
					<li class="line">
						<a href="//social-plugins.line.me/lineit/share?url=<?php echo $url_encode; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;">
							<span><img src="<?php bloginfo('template_url') ?>/images/line0.png"></span>
						</a>
					</li>

					<!--Noteボタン-->
					<li class="note">
					<a href="https://note.com/intent/post?url=<?php echo $url_encode; ?>" target="_blank" rel="noopener">
					<span><img src="<?php bloginfo('template_url') ?>/images/Note0.png"></span>
					</a>
					</li>
				</ul>
			</div>
		</section>

	<?php endwhile; ?>
</article>

<?php get_footer(); ?>
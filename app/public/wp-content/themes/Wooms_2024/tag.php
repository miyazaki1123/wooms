<?php get_header(); ?>
<main class="site-main">
	<section class="sec" id="news" data-a data-a-trigger="a1">
		<div class="sec__header">
			<strong>
				<span data-a="slide-bottom" data-a-target="a1" data-a-transition>
				<?php
						 
						$tag = get_queried_object();
						if ($tag) {
							if (is_english($tag->name)) {
								echo esc_html($tag->name);
							}else{
								echo '<small>'.esc_html($tag->name).'</small>';
							}
							
						}
						?> - NEWS
				</span>
			</strong>
		</div>
		<div class="sec__inner page-header">
			<div class="contents"  data-a="slide-bottom" data-a-target="a1" data-a-transition>
				<header class="page-header">
					<div class="txt-title">
						<span>TAG</span>
						<?php
						if ($tag) {
							echo '<h1>' . esc_html($tag->name) . '</h1>';
						}
						?>
					</div>
				</header>
			</div>

			<div class="contents has-sec__header contents__tag">
				<div class="news">
					<div class="news__contents">
						<div class="news__content">
							<?php if (have_posts()) { ?>
								<ul>
									<?php
									while (have_posts()) {
										the_post();
									?>
										<?php get_template_part('template/loop/loop-news');  ?>
									<?php }; ?>
								</ul>
							<?php } else { ?>
								<p class="align--center">
									現在お知らせはございません。
								</p>
							<?php  }; ?>

						</div>
					</div>
					<?php
					if(wp_is_mobile()){
						$midsize = NEWS_MIDSIZE_SP;
					}else{
						$midsize = NEWS_MIDSIZE;
					}
					the_posts_pagination(array(
						'end_size' => 1,
						'mid_size' => $midsize,
						'prev_next' => true,
						'prev_text'     => ('<span class="icon--prev"><span class="screen-reader-text">前へ</span></span>'), // 「前へ」リンクのテキスト
						'next_text'     => ('<span class="icon--next"><span class="screen-reader-text">次へ</span></span>'), // 「次へ」リンクのテキスト
					));
					?>
				</div>

			</div>
			<?php wp_reset_postdata(); ?>

		</div>
	</section>

	<?php
	// 固定ページ "news" の ID を取得
	$news_page = get_page_by_path('news');

	if ($news_page) {
		// 固定ページのコンテンツを取得
		$news_content = $news_page->post_content;

		// ブロックパーサーを使ってブロックを解析
		$blocks = parse_blocks($news_content);

		// 特定のクラス名 'sec__onlineshop' を持つブロックを探して出力
		foreach ($blocks as $block) {
			// ブロックのクラス名をチェック
			if (isset($block['attrs']['className']) && strpos($block['attrs']['className'], 'sec__onlineshop') !== false) {
				
				// ブロックを出力
				$html = render_block($block);

				if ( preg_match('/<h2[^>]* class="wp-block-heading h2_title">(.*?)<\/h2>/', $html, $matches) ) {
					$h2 = $matches[1];
				}
			}
		}
	}
	?>
	<section class="sec" data-a data-a-trigger="a3">
		<header class="sec__header">
			<h2>
				<span data-a="slide-bottom" data-a-target="a3" data-a-transition><?php
			echo $h2;
			?></span>
			</h2>
		</header>
		<div class="sec__inner">
			<div class="contents has-sec__header">
			<?php
			echo $html;
			?>
			</div>
			<?php wp_reset_postdata(); ?>

		</div>
	</section>

</main>

<?php get_footer(); ?>
<?php get_header(); ?>

<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>

<script>
var infScroll = new InfiniteScroll( '.container', { // 記事を挿入していく要素を指定
    append: '.post',             // 各記事の要素
    path: '.next_posts_link a',  // 次のページへのリンク要素を指定
    hideNav: '.next_posts_link', // 指定要素を非表示にする（ここは無くてもOK）
    button: '.view-more-button', // 記事を読み込むトリガーとなる要素を指定
    scrollThreshold: false,      // スクロールで読み込む：falseで機能停止（デフォルトはtrue）
    status: '.page-load-status', // ステータス部分の要素を指定
    history: 'false'             // falseで履歴に残さない
});
</script>

<section class="container">
		<?php query_posts('posts_per_page=3'); ?>
		<?php 
		if (have_posts()){ 

			while (have_posts()) {
				the_post();?>
				<?php
					//カテゴリ出力用
					$cat = get_the_category();
					$catname = $cat[0]->cat_name;
					$catslug = $cat[0]->slug;
				?>
				<article class="post">
					<a class="news" href="<?php the_permalink()?>">
						<div class="news_box">
							<span class="news_list_date"><?php the_time('Y/m/d'); ?></span><span class="news_list_cat <?php echo $catslug; ?>"><?php echo $catname; ?></span><span class="news_list_title"><?php the_title(); ?></span>
						</div>
					</a>
				</article>
				
				
				<?php
			}
			
			
		}
		else{
			echo "<p>記事がありません。</p>";
		}
		?>
		
		<div class="clear"></div>
		<div class="navigation"><p><?php posts_nav_link(); ?></p></div>

</section ><!--content-->

<span class="next_posts_link">
    <?php next_posts_link(); ?>
</span>

<button class="view-more-button" type="button">もっと見る</button>
<div class="page-load-status" style="display:none;">
    <div class="infinite-scroll-request">ロード中</div>
    <p class="infinite-scroll-last">これ以上は記事がありません</p>
    <p class="infinite-scroll-error">読み込むページがありません</p>
</div>

<?php get_footer(); ?>
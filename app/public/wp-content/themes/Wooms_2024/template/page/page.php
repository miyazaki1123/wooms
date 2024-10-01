<section class="sec" id="news" data-a data-a-trigger="a1">
		<div class="sec__header">
			<strong>
				<span data-a="slide-bottom" data-a-target="a1" data-a-transition> 
				<?php
					echo get_the_title();
				?>
				</span>
			</strong>
		</div>
		<div class="sec__inner page-header">
			<div class="contents"  data-a="slide-bottom" data-a-target="a1" data-a-transition>
				<header class="page-header">
					<div class="txt-title">
						<span>CATEGORY</span>
							<?php
							if ($category && !is_wp_error($category)) {
								$category_name = $category->name;
								echo '<h1>' . esc_html($category_name) . '</h1>';
							}
							?>
					</div>
				</header>
			</div>

			<div class="contents has-sec__header contents__category" data-a="fade-in" data-a-delay="300">
				<menu class="cat-menu cat-news">
					<li><a href="<?php get_home_url() ?>/news">ALL</a></li>
					<?php get_template_part('template/parts/category-tab');  ?>
				</menu>

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
									現在「<?php echo $category_name; ?>」に関する<br>お知らせはございません。
								</p>
							<?php  }; ?>

						</div>
					</div>
					<?php
					if(wp_is_mobile()){
						$midsize = NEWS_MIDSIZE / 3;
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
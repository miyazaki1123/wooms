<menu class="cat-menu cat-news">
    <li class="active"><a href="<?php get_home_url() ?>/news">ALL</a></li>
    <?php get_template_part('template/parts/category-tab');  ?>
</menu>
<div class="news">
    <div class="news__contents">
        <div class="news__content">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => get_option('posts_per_page'),
                'paged'       => get_query_var('paged') ? intval(get_query_var('paged')) : 1,
                'post_status' => 'publish',
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) { ?>
                <ul>
                    <?php
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
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
    $GLOBALS['wp_query']->max_num_pages = $the_query->max_num_pages;
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

<?php wp_reset_postdata(); ?>
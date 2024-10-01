<?php
if ($args['cat'] == 'all') {
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => get_option('posts_per_page'),
        'paged'       => get_query_var('paged') ? intval(get_query_var('paged')) : 1,
        'post_status' => 'publish',
        'posts_per_page' => NEWS_VIEWNUM,
    );
} else {
    $category = get_term_by('name', $args['cat'], 'category');
    $category->slug;
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => get_option('posts_per_page'),
        'paged'       => get_query_var('paged') ? intval(get_query_var('paged')) : 1,
        'post_status' => 'publish',
        'posts_per_page' => NEWS_VIEWNUM,
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => $category->slug,
            ),
        ),
    );
}
?>

<?php
$the_query = new WP_Query($args);
if ($the_query->have_posts()) { ?>
    <div class="news__items splide">
        <div class="splide__track">
            <ul class="news_list splide__list">
                <?php
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                ?>
                    <?php get_template_part('template/loop/loop-news');  ?>
                <?php }; ?>
            </ul>
        </div>
        <div class="splide__nav">
            <div class="splide__arrows">
                <button class="splide__arrow splide__arrow--prev"></button>
                <ul class="splide__pagination active"></ul>
                <button class="splide__arrow splide__arrow--next"></button>
            </div>
        </div>
    </div>
<?php } else { ?>
    <p class="align--center">
        現在お知らせはございません。
    </p>
<?php  }; ?>
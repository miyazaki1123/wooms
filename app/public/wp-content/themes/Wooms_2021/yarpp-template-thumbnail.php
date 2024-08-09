<?php
/*
YARPP Template: Thumbnails2
Description: This template returns the related posts as thumbnails in an ordered list. Requires a theme which supports post thumbnails.
Author: YARPP Team
*/
?>

<?php
/*
Templating in YARPP enables developers to uber-customize their YARPP display using PHP and template tags.

The tags we use in YARPP templates are the same as the template tags used in any WordPress template. In fact, any WordPress template tag will work in the YARPP Loop. You can use these template tags to display the excerpt, the post date, the comment count, or even some custom metadata. In addition, template tags from other plugins will also work.

If you've ever had to tweak or build a WordPress theme before, you’ll immediately feel at home.

// Special template tags which only work within a YARPP Loop:

1. the_score()		// this will print the YARPP match score of that particular related post
2. get_the_score()		// or return the YARPP match score of that particular related post

Notes:
1. If you would like Pinterest not to save an image, add `data-pin-nopin="true"` to the img tag.

*/
?>

<?php
/* Pick Thumbnail */
global $_wp_additional_image_sizes;
if (isset($_wp_additional_image_sizes['yarpp-thumbnail'])) {
    $dimensions['size'] = 'full';
} else {
    $dimensions['size'] = 'full'; // default
}
?>

<?php if (have_posts()) : ?>
    <h2 class="rjkj"><img src="<?php bloginfo('template_url') ?>/images/MoreSingle.svg" alt="類似の記事をみる"></h2>
    <div class="NewsListWrap">
<p class="MoveLeft">&lt;</p>
<div class="NewsViewArea">
    <ul class="news_list">
        <?php
        while (have_posts()) :
            the_post();
        ?>

            <?php $days = 10;
            $today = date_i18n('U');
            $entry_day = get_the_time('U');
            $keika = date('U', ($today - $entry_day)) / 86400; ?>
            <?php $category = get_the_category();
            $cat = $category[0];
            $cat_name = $cat->name;
            $cat_id = $cat->cat_ID;
            $cat_slug = $cat->slug; ?>

            <li class="PostWrap">
									<div class="news_list_shadow">
                <a href="<?php echo get_the_permalink()?>" class="LinkMore">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="news_thumbnail"><?php the_post_thumbnail($dimensions['size'], array('data-pin-nopin' => 'true')); ?></div>
                    <?php else : ?>
                        <div class="news_thumbnail"><img src="<?php bloginfo('template_url') ?>/images/NoImages.jpg"></div>
                    <?php endif; ?>
                    <div class="news_contentarea">
                        <?php if ($days > $keika) : ?>
                            <span class="news_newicon">NEW</span>
                        <?php endif; ?>
                        <span class="cat <?php echo $cat_slug; ?>"><?php echo $cat_name; ?></span>
                        <span class="news_title"><?php the_title(); ?></span>
                        <span class="news_date"><?php the_time('Y/m/d'); ?></span>
                        <span href="<?php the_permalink(); ?>" class="LinkMore">MORE</span>
                    </div>
                </a>
										</div>
            </li>
        <?php endwhile; ?>
    </ul>
</div>
<p class="MoveRight">&gt;</p>
                        </div>
    <div class="mbScroller"><div class="LRbtn"><p class="MoveLeft">&lt;</p><p class="MoveRight">&gt;</p></div></div>
    <div class="BTNWrap">
        <a class="BackToNews" href="<?php echo esc_url(home_url('')); ?>/news">お知らせ一覧</a>
    </div>
<?php else : ?>
    <p class="nwhdn">該当する記事はありません。</p>
    <div class="BTNWrap">
        <a class="BackToNews" href="<?php echo esc_url(home_url('')); ?>/news">お知らせ一覧</a>
    </div>
<?php endif; ?>
<li class="PostWrap splide__slide">
  <div class="news_list_shadow">
    <a href="<?php echo get_permalink() ?>" class="LinkMore">
      <?php get_template_part('template/parts/img-news'); ?>
      <div class="news_contentarea">
        <?php
        $cat = get_the_category();
        $catname = $cat[0]->cat_name;
        $catslug = $cat[0]->slug;
        $thumbnail_id = get_post_thumbnail_id();
        $thumb = wp_get_attachment_image_src($thumbnail_id, 'big');
        $sub_title = get_field('subtitle');
        $tags = get_the_tags();

        $days = 10;
        $today = date_i18n('U');
        $entry_day = get_the_time('U');
        $keika = date('U', ($today - $entry_day)) / 86400;
        ?>
        <?php if ($days > $keika) { ?>
          <span class="news_newicon">NEW</span>'
        <?php } ?>

        <?php
        echo '<span class="cat ' . $catslug . '">' . $catname . '</span>';
        if ($tags) {
          echo '<div class="news_tag ' . $catslug . '">';
          foreach ($tags as $tag) {
            echo  '<span>' . $tag->name . '</span>';
          }
          echo  '</div>';
        }
        if ($sub_title) {
          echo '<span class="news_subtitle ' . $catslug . '">' . $sub_title . '</span>';
        }
        ?>
        <span class="news_title"><?php the_title() ?>
        <time class="news_date" datetime="<?php echo get_the_date('Y.m.d'); ?>" class="ff--din2"><?php echo get_the_date('Y.m.d'); ?></time>
        <span class="LinkMore">MORE</span>
      </div>

      


    </a>
  </div>
</li>
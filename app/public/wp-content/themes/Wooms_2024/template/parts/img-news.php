<div  class="news_thumbnail">
      <?php
      if ( has_post_thumbnail() ) {
          the_post_thumbnail('large');
      } else {
          $content = apply_filters('the_content', get_the_content());
          $first_img = '';
          if (preg_match('/<img[^>]+src="([^">]+)"/i', $content, $matches)) {
              $first_img = $matches[1];
          }
          if ( ! empty($first_img) ) {
              echo '<img src="' . esc_url($first_img) . '" alt="' . get_the_title() . '"  class="fullthumb">';
          } else {
              echo '<span>NO IMAGES</span>';
          }
      }
      ?>
</div>

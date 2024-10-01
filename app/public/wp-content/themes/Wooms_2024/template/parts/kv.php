<?php wp_reset_postdata(); ?>
<div class="kv__items splide">
  <div class="splide__track">
    <ul class="splide__list">
      <li class="splide__slide">
        <?php get_template_part('template/parts/ph-wooms-connect'); ?>
      </li>
      <li class="splide__slide">
        <?php get_template_part('template/parts/ph-wooms-connect'); ?>
      </li>
      <li class="splide__slide">
        <?php get_template_part('template/parts/ph-wooms-connect'); ?>
      </li>
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
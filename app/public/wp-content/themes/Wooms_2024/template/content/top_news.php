<?php
    $cat_slug = [];
?>
<div class="cont cont--news">
    <div class="cont--news__inner">
    <menu class="cont--news__tabs">
        <li class="active cont--news__tab">すべて</li>
        <?php 
        $cnt = 0;
        foreach(CAT_ARRAY as $cat){
            $category = get_term_by('name', $cat, 'category');
            $cat_slug[$cnt] = $category->slug;
            ?>
            <li class="cont--news__tab medium border--<?php echo $category->slug  ?>"><?php echo $cat  ?></li>
            <?php
            $cnt++;
        }
        ?>
    </menu>

    <?php 
        $cnt = 0;
        foreach(CAT_ARRAY as $cat){
    ?>
    <div class="cont--news__contents">
        <div class="cont--news__content">
        <?php
            echo $cat_slug[$cnt];
            $args = ['cat' => $cat];
            get_template_part('template/parts/news_list', null, $args);
         ?>
        </div>
    </div>
    <?php  $cnt++; } ?>
  </div>
</div>
<?php wp_reset_postdata(); ?>
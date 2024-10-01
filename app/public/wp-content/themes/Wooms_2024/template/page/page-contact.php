<?php
$parent_id = wp_get_post_parent_id(get_the_ID()); ?>


<section class="sec" data-a data-a-trigger="a1">
    <header class="sec__header">
        <h1><span data-a="slide-bottom" data-a-target="a1" data-a-transition>CONTACT - <?php echo get_the_title($parent_id) ?></span></h1>
    </header>


    <div class="sec__inner page-header">
        <div class="contents" data-a="slide-bottom" data-a-target="a1" data-a-transition>
            <header class="page-header">
                <?php
                $page = get_post($parent_id);
                if ($page) {
                    // 固定ページのコンテンツを取得
                    $news_content = $page->post_content;
                    // ブロックパーサーを使ってブロックを解析
                    $blocks = parse_blocks($news_content);

                    // 特定のクラス名 'sec__onlineshop' を持つブロックを探して出力
                    foreach ($blocks as $block) {
                        // ブロックのクラス名をチェック
                        if (isset($block['attrs']['className']) && strpos($block['attrs']['className'], 'page-header') !== false) {

                            foreach ($block['innerBlocks'] as $blockInner) {
                                if (strpos($blockInner['attrs']['className'], 'page-header__img') !== false) {
                                    echo render_block($blockInner);
                                }
                            }
                        }
                    }
                }
                ?>
            </header>
        </div>
        <div class="contents" data-a="fade-in">
            <?php the_content(); ?>
            <?php
            $form_id = get_field('contact',$parent_id);
            if ($form_id) {
                // MW WP Formのフォームを出力
                echo do_shortcode('[mwform_formkey key="' . esc_attr($form_id) . '"]');
            } else {
                echo 'お問い合わせフォームが選択されていません。';
            }
            ?>
        </div>
    </div>
</section>
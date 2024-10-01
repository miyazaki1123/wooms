
<?php
// 投稿コンテンツを取得
$post_content = get_post_field('post_content', get_the_ID());

// 投稿コンテンツをブロックごとに解析
$blocks = parse_blocks($post_content);
$cnt = 0;
$css = '';
// グループブロック（HTML要素が<section>）を上から順に出力
foreach ( $blocks as $block ) {
    // グループブロックかどうかを確認
    if(isset($block['attrs']['tagName']) && $block['attrs']['tagName'] === 'section'){
        $cnt ++;
        // グループブロックの属性が<section>になっているか確認
            // グループブロックをレンダリングして出力
            if(isset($block['attrs']['className'])){
                $css = $block['attrs']['className'];
            }
            $group_content = render_block( $block );
            $group_content = do_shortcode($group_content);
            $h2 = '';
            // 最初の<h2>タグを正規表現で取得
            if ( preg_match('/<h2[^>]* class="wp-block-heading h2_title">(.*?)<\/h2>/', $group_content, $matches) ) {
                $h2 = $matches[1];
            }
            if(isset($css) && $css == 'page-header'){
                $h2 = get_the_title();
            }
            if ( isset( $block['innerBlocks'] ) && !empty( $block['innerBlocks'] ) ) {
                $flag = 0;
                $gallery = '';
                foreach ( $block['innerBlocks'] as $inner_block ) {
                  
                    // ギャラリーブロックかどうかを確認
                    if ( $inner_block['blockName'] === 'core/gallery' ) {
                        $flag = 1;
                        foreach ( $inner_block['innerBlocks'] as $inner_block2 ) {
                            $image = wp_get_attachment_image_src($inner_block2['attrs']['id'], 'full'); // 'large' 
                                if ($image) {
                                    $gallery .= <<<EOM
                                    <li class="splide__slide"><img src="{$image[0]}" alt=""></li>
                                    EOM;
                                }
                        }
                    }
                }
            }
            if($flag == 0){
                if($cnt == 1){
                    $tag1= '<h1>';
                    $tag2= '</h1>';
                }else{
                    $tag1= '<h2>';
                    $tag2= '</h2>';
                }
                $html = <<<EOM
                <section class="sec {$css} " data-a data-a-trigger="a{$cnt}">
                    <header class="sec__header">
                        {$tag1}<span data-a="slide-bottom" data-a-target="a{$cnt}" data-a-transition>{$h2}</span>{$tag2}
                    </header>
                    <div class="sec__inner">
                        <div class="contents has-sec__header">
                            {$group_content}
                        </div>
                    </div>
                </section>
                EOM;
                echo $html;
            }
        
        if($gallery){
            $html = <<<EOM
                <div class="phots-wrap">
            EOM;
            if(isset($h2)){
                $html .= <<<EOM
                <section class="sec {$css}" data-a data-a-trigger="ag">
                    <header class="sec__header">
                        <h2><span data-a="slide-bottom" data-a-target="ag" data-a-transition>{$h2}</span></h2>
                    </header>
              EOM;
            }
              $html .= <<<EOM
                       <div class="sec__inner">
                        <div>
                            <div class="splide shop-splide" data-a="slide-bottom" data-a-transition data-a-speed="1500">
                                <div class="splide__track">
                                    <ul class="splide__list">
                                    {$gallery}
                                    </ul>
                                </div>
                           </div>
                           <div class="splide thumbnail-carousel contents" data-a="fade-in" data-a-offset="0">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    {$gallery}
                                </ul>
                            </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
            EOM;
             echo $html;
         }
    }else{
        $content = render_block( $block );
        $content = do_shortcode($content);
        echo $content;
    }
}
?>
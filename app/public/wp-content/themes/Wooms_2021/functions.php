<?php

// ウィジェットエリア
// サイドバーのウィジェット
register_sidebar(array(
    'name' => __('Side Widget'),
    'id' => 'side-widget',
    'before_widget' => '<li class="widget-container">',
    'after_widget' => '</li>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

// フッターエリアのウィジェット
register_sidebar(array(
    'name' => __('Footer Widget'),
    'id' => 'footer-widget',
    'before_widget' => '<div class="widget-area"><ul><li class="widget-container">',
    'after_widget' => '</li></ul></div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

// アイキャッチ画像
add_theme_support('post-thumbnails');
set_post_thumbnail_size(220, 165, true); // 幅 220px、高さ 165px、切り抜きモード

// カスタムナビゲーションメニュー
add_theme_support('menus');

// 画像の出力
function getThemeImageDirPath() {
  return get_stylesheet_directory_uri(). '/images/';  
}
function themeImagePath($name) {
  return get_stylesheet_directory_uri(). '/images/'. $name;  
}

// アップロードディレクトリのパスを取得
function getUploadsDirPath() {
  $upload_dir = wp_upload_dir();
  return $upload_dir['baseurl'];
}


//アイキャッチ設定
//アイキャッチがない場合最初の画像を使う
function catch_that_image()
{
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches[1][0];

    if (empty($first_img)) {
        $first_img = get_bloginfo('template_url') . "/images/no_image.jpg";
    }
    return $first_img;
}


function admin_categorybox_height()
{
?><style>
        #errorcat-all {
            max-height: 9999px;
            height: 800px;
        }
    </style><?php
        }
        add_action('admin_head', 'admin_categorybox_height');

        function getNewItems($atts)
        {
            if(isset($_GET['tag'])){
                $tag = $_GET['tag'];
            }else{
                $tag = '';
            }
            extract(shortcode_atts(array(
                "num" => '',
                "cat" => '',
                "listname" => ''
            ), $atts));
									$args = Array(
											'post_type' => 'post',
											'post_status' => 'publish',
											'posts_per_page' => $num,
										'cat' => $cat,
										'tag' => $tag,
										'order'=>'DESC',
										'orderby'=>'post_date',
									);
 
									// クエリの定義
									$wp_query = new WP_Query( $args );
 
            $retHtml = '<ul class="news_list" category="' . $listname . '">';
           if ($wp_query->have_posts()) while ($wp_query->have_posts()) { $wp_query->the_post();
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

                $retHtml .= '<li class="PostWrap"><div class="news_list_shadow">';
											$retHtml .= '<a href="' . get_permalink() . '" class="LinkMore">';
                $retHtml .= '<div class="news_thumbnail"><img class="fullthumb" src="' . $thumb[0] . '"></div><div class="news_contentarea">';
                if ($days > $keika) {
                    $retHtml .= '<span class="news_newicon">NEW</span>';
                }
												

                $retHtml .= '<span class="cat ' . $catslug . '">' . $catname . '</span>';
											if ($tags) {
												$retHtml .= '<div class="news_tag '.$catslug.'">';
																	foreach ( $tags as $tag ) {
																			$retHtml .= '<span>' . $tag->name . '</span>';
																	}
												$retHtml .= '</div>';
											}
											if ($sub_title) {
                    $retHtml .= '<span class="news_subtitle '.$catslug.'">'.$sub_title.'</span>';
                }
                $retHtml .= '<span class="news_title">' . the_title("", "", false) . '</span>';
                $retHtml .= '<span class="news_date">' . get_post_time('Y/n/d') . '</span>';
                $retHtml .= '<span class="LinkMore">MORE</span></div>';
                $retHtml .= '</a></div></li>';
								};
            $retHtml .= '</ul>';
            wp_reset_postdata();
            return $retHtml;
        }
        add_shortcode("news", "getNewItems");


/*お客様の声*/
function getVoiceItems($atts){
            extract(shortcode_atts(array(
                "num" => '',
                "cat" => '',
                "listname" => ''
            ), $atts));
									$args = Array(
											'post_type' => 'post',
											'post_status' => 'publish',
											'posts_per_page' => $num,
											'category_name' => 'interview',
											'meta_query'     => array(
												'relation' => 'AND',
												array(
														'key'     => 'voice', 
														'value'   => true,
														'compare' => '=',
												),
										),
									);
 
									// クエリの定義
									$wp_query = new WP_Query( $args );
 
            $retHtml = '<ul class="news_list" category="' . $listname . '">';
           if ($wp_query->have_posts()) while ($wp_query->have_posts()) { $wp_query->the_post();
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

                $retHtml .= '<li class="PostWrap"><div class="news_list_shadow">';
											$retHtml .= '<a href="' . get_permalink() . '" class="LinkMore">';
                $retHtml .= '<div class="news_thumbnail"><img class="fullthumb" src="' . $thumb[0] . '"></div><div class="news_contentarea">';
											
											if ($sub_title) {
                    $retHtml .= '<span class="news_subtitle '.$catslug.'">'.$sub_title.'</span>';
                }
                $retHtml .= '<span class="news_title">' . the_title("", "", false) . '</span>';
                $retHtml .= '<span class="news_date">' . get_post_time('Y/n/d') . '</span>';
                $retHtml .= '<span class="LinkMore">MORE</span></div>';
                $retHtml .= '</a></div></li>';
								};
            $retHtml .= '</ul>';
            wp_reset_postdata();;
            return $retHtml;
        }
add_shortcode("voice", "getVoiceItems");

function getCaseAct($atts){
            extract(shortcode_atts(array(
                "num" => '',
                "cat" => '',
                "listname" => ''
            ), $atts));
									$args = Array(
											'post_type' => 'post',
											'post_status' => 'publish',
											'posts_per_page' => $num,
											'category_name' => 'case-study',
											'meta_query'     => array(
												'relation' => 'AND',
												array(
														'key'     => 'activation', 
														'value'   => true,
														'compare' => '=',
												),
										),
									);
 
									// クエリの定義
									$wp_query = new WP_Query( $args );
 
            $retHtml = '<ul class="post_list" category="' . $listname . '">';
           if ($wp_query->have_posts()) while ($wp_query->have_posts()) { $wp_query->the_post();
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

                $retHtml .= '<li class="PostWrap"><div class="post_list_shadow">';
											$retHtml .= '<a href="' . get_permalink() . '" class="LinkMore">';
                $retHtml .= '<div class="post_thumbnail"><img class="fullthumb" src="' . $thumb[0] . '"></div><div class="post_contentarea">';
                
                $retHtml .= '<span class="cat ' . $catslug . '">' . $catname . '</span>';
											if ($tags) {
												$retHtml .= '<div class="post_tag '.$catslug.'">';
																	foreach ( $tags as $tag ) {
																			$retHtml .= '<span>' . $tag->name . '</span>';
																	}
												$retHtml .= '</div>';
											}
											if ($sub_title) {
                    $retHtml .= '<span class="post_subtitle '.$catslug.'">'.$sub_title.'</span>';
                }
                $retHtml .= '<strong class="post_title">' . the_title("", "", false) . '</strong>';
                $retHtml .= '<span class="post_date">' . get_post_time('Y/n/d') . '</span>';
                $retHtml .= '<span class="LinkMore">MORE</span></div>';
                $retHtml .= '</a></div></li>';
								};
            $retHtml .= '</ul>';
            wp_reset_postdata();;
            return $retHtml;
        }
add_shortcode("case_act", "getCaseAct");

function getCaseStudy($atts){
            extract(shortcode_atts(array(
                "num" => '',
            ), $atts));
									$args = Array(
											'post_type' => 'posts_case',
											'post_status' => 'publish',
											'posts_per_page' => $num,
									);
 
									// クエリの定義
									$wp_query = new WP_Query( $args );
            $retHtml = '<ul class="post_list post_list--case" category="' . $listname . '">';
           if ($wp_query->have_posts()) while ($wp_query->have_posts()) { $wp_query->the_post();
                $cat = get_the_category();
											$related_post = get_field('related_post');
											$related_post_url = get_permalink($related_post->ID);
											$image = get_field('case_img');
											 if(empty($image)){
												 /*
												$thumbnail_id = get_post_thumbnail_id();
                	$thumb = wp_get_attachment_image_src($thumbnail_id, 'big');
												$thumb_src = $thumb[0];
												*/
												 $related_post_thumbnail_id = get_post_thumbnail_id($related_post->ID);
												 $thumb_src = wp_get_attachment_image_url($related_post_thumbnail_id, 'big');
											}else{
												 $thumb_src = $image['sizes'][ 'big' ];
											 }
                
                $retHtml .= '<li class="PostWrap"><div class="post_list_shadow">';
											$retHtml .= '<a href="' .$related_post_url . '">';
                $retHtml .= '<div class="post_thumbnail"><img class="fullthumb" src="' . $thumb_src . '"></div><div class="post_contentarea">';
											
                $retHtml .= '<strong class="post_case_title">' . get_the_title() . '</strong>';
                $retHtml .= '<p class="post_case_description">' . get_field('zirei_txt') . '</p>';
                $retHtml .= '<span class="LinkDetails">詳しくはこちら</span></div>';
                $retHtml .= '</a></div></li>';
								};
            $retHtml .= '</ul>';
            wp_reset_postdata();;
            return $retHtml;
        }
add_shortcode("case_study", "getCaseStudy");



function getVoiceItems_($atts){
	extract(shortcode_atts(array(
    "num" => '', 
  ), $atts));
     $url = get_home_url()."/wp-json/wp/v2/posts?_embed&categories=3&per_page=".$num;
			$json = file_get_contents($url);
			$arr = json_decode($json,true);
			$retHtml = '<ul class="news_list">';
					
  foreach ($arr as $data):
    $title = $data["title"]["rendered"];
    $date = date('Y/n/d', strtotime($data["date"]));
			$entry_day = date('U', strtotime($data["date"]));
    $link = $data["link"];
			$client = $data["acf"]["client"];
			$days = 10;
     $today = date_i18n('U');
     $keika = date('U', ($today - $entry_day)) / 86400;
				
    $thum = $data["_embedded"]["wp:featuredmedia"][0]["media_details"]["sizes"]["big"]["source_url"];
					
  		$retHtml .= '<li class="PostWrap"><div class="news_list_shadow">';
			$retHtml .= '<a href="' . $link . '">';
    $retHtml .= '<div class="news_thumbnail"><img class="fullthumb" src="' . $thum . '"></div><div class="news_contentarea">';
     if ($days > $keika) {
       $retHtml .= '<span class="news_newicon">NEW</span>';
     }
			$retHtml .= '<span class="news_client">' . $client . '</span>';
    $retHtml .= '<span class="news_title">' . $title . '</span>';
     $retHtml .= '<span class="news_date">' . $date . '</span>';
     $retHtml .= '<span class="LinkMore">MORE</span></div>';
				$retHtml .= '</a>';
  		$retHtml .= '</div></li>';
   endforeach; 
		$retHtml .= '</ul>';
		return $retHtml;
   }

/*ロゴ表示*/
function getLogos($atts) {
	$retHtml = '<ul class="ul--logo">';
  extract(shortcode_atts(array(
    "type" => '',
			"num" => ''
  ), $atts));
	
   $args = array(
     'post_type' => $type,
     'posts_per_page' => $num,
  );
   $query = new WP_Query( $args );
   	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) : $query->the_post();
    
				$retHtml .= '<li>';
				if (get_field('link')) {
					$retHtml .= '<a href="'.get_field('link').'" target="_blank">';
				}else{
					$retHtml .= '<span>';
				}
			$image = get_field('img');
				if( !empty($image) ){
					$thumb = $image['sizes'][ 'big' ];
					$retHtml .= '<img src="'.	$thumb.'" alt="'.get_the_title().'">';
				}else{
					$retHtml .= get_the_title();
				}
				if (get_field('link')) {
					$retHtml .= '</a>';
				}else{
					$retHtml .= '</span>';
				}
				$retHtml .= '</li>';
    endwhile; 
	}
	$retHtml .= '</ul>';
  return $retHtml;
}
add_shortcode('logo', 'getLogos');


        
        //--------------------------------------------------------------------------
        //
        //  メールフォーム iframe
        //
        //--------------------------------------------------------------------------
        function formframe_handler($atts, $content = null)
        {

            $value = '<div style="text-align:center;"><iframe src="/mailform/index.html?17022001" id="mailframe" name="form" width="600" height="860" style="border:none;" scrolling="no"></iframe></div>';


            return $value;
        }
        add_shortcode('formframe', 'formframe_handler');

        function nendebcom_my_block_patterns()
        {

            //ブロックパターンメンテナンス用 カスタム投稿タイプ
            $labels = array(
                'menu_name'          => 'ブロックパターン',          //メニュー名のテキスト
                'singular_name'      => 'ブロックパターン',          //menu
                'all_items'          => 'ブロックパターン一覧',            //menu
                'add_new'            => '新規ブロックパターン追加',      //menu
                'name'               => 'ブロックパターン',
                'add_new_item'       => '新規ブロックパターン追加',
                'edit_item'          => 'ブロックパターンの編集',
            );

            register_post_type(
                'my_block_patterns',
                array(
                    'public'        => true, // 管理画面に表示しサイト上にも表示する
                    'description'       => 'ブロックパターンメンテナンス用',        //投稿タイプの説明
                    'hierarchical'      => false,    //階層構造を許可(親記事を指定できる)
                    'has_archive'       => false,    //この投稿タイプのアーカイブを有効にする
                    'labels'        => $labels,
                    'publicly_queryable'    => false,    //ドメイン/?post_type=xxxxでアーカイブ表示
                    'show_ui'       => true, //管理画面に表示
                    'show_in_menu'      => true, //管理画面左メニューに表示
                    'show_in_nav_menus' => false,    //管理画面->メニューに表示
                    'show_in_admin_bar' => false,    //管理バー(+新規)に表示
                    'capability_type'   => 'post',   //権限設定
                    'menu_position'     => 5,
                    'query_var'     => false,    //この投稿に使用する query_var キーの名前または真偽値
                    'exclude_from_search'   => true,     //サイト内検索から除外するかどうか true:除外
                    'publicly_queryable'    => false,    //フロントエンドで post_type クエリが実行可能かどうか
                    'supports'              => array(    //投稿画面用のパーツ
                        'title',
                        'editor',
                        'author',
                    ),
                    'taxonomies'        => array('my_block_patterns'),
                    'show_in_rest' => true,          //Gutenberg 使う
                )
            );

            //ブロックパターンメンテナンス用 ブロックパターンカテゴリ
            register_taxonomy(
                'my_patterns',      //カテゴリ名
                'my_block_patterns',    //post type名
                array(
                    'hierarchical'      => false,            //階層化
                    'update_count_callback' => '_update_post_term_count',
                    'label'         => 'ブロックパターンカテゴリ',
                    'singular_label'    => 'ブロックパターンカテゴリ',
                    'public'        => false,            //検索可能
                    'show_ui'       => true,
                    'show_in_rest'      => true,         //Gutenberg 使う
                    'meta_box_cb'       => 'post_categories_meta_box',
                )
            );


            //ブロックパターンカテゴリ追加
            $builtin_category = array('header', 'text', 'columns', 'buttons', 'gallery');

            $terms = get_terms(array('taxonomy' => 'my_patterns', 'get' => 'all'));
            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                    //コアのブロックパターンカテゴリと同じ場合は登録をスキップする
                    if (!in_array($term->slug, $builtin_category, true)) {
                        //ブロックパターンカテゴリ追加
                        register_block_pattern_category(
                            $term->slug,
                            array('label' => $term->name)
                        );
                    }
                }
            }


            //ブロックパターン追加
            $args = array(
                'post_type' => array('my_block_patterns'),
                'post_status' => array('publish'),
                'posts_per_page' => -1,
                //'order' => 'DESC',
                //'orderby' => 'date',
            );

            $the_query = new WP_Query($args);

            // The Loop
            if ($the_query->have_posts()) {

                $pattern_count = 1;

                while ($the_query->have_posts()) {
                    $the_query->the_post();

                    //ブロックパターンタイトル
                    $pattern_title = get_the_title();
                    if (!$pattern_title) {
                        $pattern_title = '無題ブロックパターン';
                    }

                    //ブロックHTML
                    $pattern_content = get_the_content();

                    //ブロックパターンカテゴリ
                    $pattern_categories = array();
                    $terms = get_the_terms(0, 'my_patterns');
                    if (!empty($terms) && !is_wp_error($terms)) {
                        foreach ($terms as $term) {
                            $pattern_categories[] = $term->slug;
                        }
                    }

                    //ブロックパターン追加
                    if ($pattern_content) {
                        register_block_pattern(
                            'nendebcom/my-block-pattern' . $pattern_count,      //ブロックパターン名
                            array(
                                'title'      => $pattern_title,      //ブロックパターンのタイトル
                                'content'    => $pattern_content,    //ブロックHTML
                                'categories' => $pattern_categories, //ブロックパターンカテゴリ
                            )
                        );
                        $pattern_count++;
                    }
                }
                wp_reset_postdata();
            }
        }
        add_action('init', 'nendebcom_my_block_patterns');
                

        function my_required_phone( $validation, $data ) {
            $method = $data['種類'];
            if( isset( $method ) && $method === 'お問い合わせ' ) {
              $validation->set_rule( 'お問い合わせ種類', 'required', array( 'message' => 'お問い合わせを選択された場合必須です。') );
            }
            return $validation;
          }
           
          add_filter( 'mwform_validation_mw-wp-form-1219', 'my_required_phone', 10, 2 );


//画像サイズ追加
add_image_size( 'big', 640, 400, true );
/*ダッシュボードにメニューを追加*/
add_action('admin_menu', 'custom_menu_page');
  function custom_menu_page()
  {
    add_menu_page('再利用ブロック', '再利用ブロック', 'manage_options', 'custom_menu_page', 'add_custom_menu_page', 'dashicons-admin-generic', 30);
  }
  function add_custom_menu_page(){
		?>
		<script type="text/javascript">
			 window.location = '/wp-admin/edit.php?post_type=wp_block';
		</script>
		<?php
	}
/*リビジョンを有効にする*/
function my_custom_revision()
{
add_post_type_support( 'voice', 'revisions' );
}
add_action('init', 'my_custom_revision');

//投稿一覧画面の並び順を日付順に（カテゴリーが選択されていない場合)
function set_post_order_in_admin($wp_query)
{
    global $pagenow;
    if (is_admin() && 'edit.php' == $pagenow && !isset($_GET['orderby']) && $wp_query->query_vars['post_type'] == 'post'&& empty($_GET['cat'])) {
        $wp_query->set('orderby', 'DATE');//並び順を設定します。
        $wp_query->set('order', 'DESC');//昇順降順を設定します。
    }
}
add_filter('pre_get_posts', 'set_post_order_in_admin');


//管理画面での投稿一覧に掲載チェック、アイキャッチ表示
add_theme_support('post-thumbnails', array('post'));
set_post_thumbnail_size(50, 50, true);

function manage_posts_columns($columns)
{
	$columns['zirei'] = '掲載チェック';
 	$columns['thumbnail'] = __('Thumbnail');
	unset( $columns['comments'] );
	unset( $columns['author'] );
	
    return $columns;
}
function add_column($column_name, $post_id)
{
 if ( $column_name == 'zirei' ) {
	 $keisai = array();
	 if(get_field( 'voice') == 1){
		 array_push($keisai,"トップページ ");
		}
		if(get_field( 'zirei') == 1){
			array_push($keisai,"事例 ");
		}
		if(get_field( 'activation') == 1){
			array_push($keisai,"アクティベーション");
		}
	 echo implode($keisai);
  }
	
    //アイキャッチ取得 array(サイズ,サイズ)
    if ('thumbnail' == $column_name) {
        $thum = get_the_post_thumbnail($post_id, array(150, 150), 'thumbnail');
    }

    //使用していない場合「なし」を表示
    if (isset($thum) && $thum) {
        echo $thum;
    } else {
        //echo __('None');
    }
}
add_filter('manage_posts_columns', 'manage_posts_columns');
add_action('manage_posts_custom_column', 'add_column', 10, 2);


//エディタのビジュアル・テキスト切替でコード消滅を防止
function my_tiny_mce_before_init( $init_array ) {
    $init_array['valid_elements']          = '*[*]';
    $init_array['extended_valid_elements'] = '*[*]';
    return $init_array;
}
add_filter( 'tiny_mce_before_init' , 'my_tiny_mce_before_init' );

/**
 * ビジュアルエディタに切り替えで、空の span タグや i タグが消されるのを防止
 */
if ( ! function_exists('tinymce_init') ) {
    function tinymce_init( $init ) {
        $init['verify_html'] = false; // 空タグや属性なしのタグを消させない
        $initArray['valid_children'] = '+body[style], +div[div|span|a], +span[span]'; // 指定の子要素を消させない
        return $init;
    }
    add_filter( 'tiny_mce_before_init', 'tinymce_init', 100 );
}
?>

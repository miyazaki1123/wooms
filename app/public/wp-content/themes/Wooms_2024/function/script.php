<?php

//bodyにクラスを付与する
function bodyClass(){
	global $post;
  if(isset($post->post_parent)){
    $parent_id = $post->post_parent;
    $parent_slug = get_post($parent_id)->post_name;
  }else{
    print_r($post);
  }
  
	$html ="";
	if(!is_single()){
		if(isset($post->post_parent)){
      if (preg_match("/^[a-zA-Z0-9_-]+$/", $parent_slug)) {
        $html  .= $parent_slug;
     }
			$html  .= " ".$parent_slug."_".$post->post_name;
		}
		if(!is_front_page()){
			$html .=" page";
		}
	}else{
		$html  .= get_post_type( $post )." single";
	}
  if(is_category()){
		$html  .= " category";
	}
  if(is_tag()){
		$html  .= " tag";
	}
	if(is_post_type_archive()){
		$html  .= get_post_type( $post )." archive";
	}
		echo $html;
}
function bodyID(){
	if(is_front_page()){
			echo 'id="home"';
		}
}

function assets(){
	echo get_template_directory_uri() . '/assets';
}

// カスタム投稿タイプにリビジョン追加
function add_posttype_revisions() {
  // 'revisions' サポートを追加
  /*
  add_post_type_support( 'shop', 'revisions' );
  add_post_type_support( 'staff', 'revisions' );
  */
}
add_action('init', 'add_posttype_revisions');

// アイキャッチ画像をサポートする
add_theme_support('post-thumbnails');


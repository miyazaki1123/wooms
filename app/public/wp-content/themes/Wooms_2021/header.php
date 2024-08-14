<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" xml:lang="ja">


<head>
    
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PMQXC4H');</script>
    <!-- End Google Tag Manager -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width">
    <meta name=”keywords” content="WOOMS,小田急, 廃棄物,ウェイスト,ごみ,サーキュラー,自治体">
    <?php if (is_home() || is_front_page()) : ?>
        <title><?php bloginfo('name'); ?></title>
    <?php else : ?>
        <title><?php wp_title(''); ?> - <?php bloginfo('name'); ?></title>
    <?php endif;?>

    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>" type="text/css" />
	<?php $version = wp_get_theme()->get('Version'); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/style.css?ver=<?php echo $version;?>" type="text/css" />
	
    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url') ?>/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url') ?>/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url') ?>/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php bloginfo('template_url') ?>/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php bloginfo('template_url') ?>/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <?php if(is_page('contact') || is_page('contact_test')): ?>
        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/contact.css?ver=210825" type="text/css" />
    <?php endif; ?>
    <?php if(is_page('term')): ?>
        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/term.css?ver=210825" type="text/css" />
    <?php endif; ?>

    <script async src="https://cdn.st-note.com/js/social_button.min.js"></script>

    <?php if (!is_single()) : ?>
        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/font.css?ver=170727" type="text/css" />
    <?php endif; ?>

    <link rel="stylesheet" href='<?php echo esc_url(home_url('')); ?>/wp-includes/css/dist/block-library/style.min.css?ver=5.2.2' type='text/css' media='all' />

	
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/animation.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/sticky.js"></script>
    <?php if (is_page(LP_DIR)) { ?>
        <script src="<?php bloginfo('template_url'); ?>/js/splide.min.js"></script>
        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/splide.min.css" type="text/css" />
    <?php }; ?>
    <script src="<?php bloginfo('template_url'); ?>/js/script.js" type="module"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.bxslider.js"></script>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url') ?>/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url') ?>/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url') ?>/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php bloginfo('template_url') ?>/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php bloginfo('template_url') ?>/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <?php 
    /**********************
OGP設定
*********************/
if (is_front_page() || is_home() || is_singular()) {
 
    /*初期設定*/
     
    // 画像 （アイキャッチ画像が無い時に使用する代替画像URL）
    $ogp_image = 'https://www.wooms.jp/wp-content/themes/Wooms_2021/images/wooms_ogp_.jpg';
    // Twitterのアカウント名 (@xxx)
    $twitter_site = '';
    // Twitterカードの種類（summary_large_image または summary を指定）
    $twitter_card = 'summary_large_image';
    // Facebook APP ID
    $facebook_app_id = '';
     
    /*初期設定 ここまで*/
     
    global $post;
    $ogp_title = '';
    $ogp_description = '';
    $ogp_url = '';
    $html = '';
	
	$ogp_title = get_the_title().' - '.get_bloginfo('name');
    if (is_single()) {
    // 記事＆固定ページ
    setup_postdata($post);
			$ogp_title = get_the_title().' - '.get_bloginfo('name');
    $ogp_description = mb_substr(get_the_excerpt(), 0, 100);
    $ogp_url = get_permalink();
    wp_reset_postdata();
    } elseif (is_front_page() || is_home() || is_page()) {
    // トップページ
    $ogp_title = get_bloginfo('name');
    $ogp_description = '資源・廃棄物の収集・運搬・排出作業の効率化と資源循環を高めるサービスを提供することで、 “ごみ”という概念の無い持続可能で豊かな循環型社会を目指します。';
    $ogp_url = home_url();
    }
     if(is_page()){
			 $ogp_title = get_the_title().' - '.get_bloginfo('name');
		 }
    // og:type
    $ogp_type = (is_front_page() || is_home()) ? 'website' : 'article';
     
    // og:image
    if (is_singular() && has_post_thumbnail()) {
    $ps_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
    $ogp_image = $ps_thumb[0];
    }
    
    // 出力するOGPタグをまとめる
    $html = "\n";
    $html .= '<meta content="' . esc_attr($ogp_description) . '" name="description">' . "\n";
    $html .= '<meta property="og:title" content="' . esc_attr($ogp_title) . '">' . "\n";
    $html .= '<meta property="og:description" content="' . esc_attr($ogp_description) . '">' . "\n";
    $html .= '<meta property="og:type" content="' . $ogp_type . '">' . "\n";
    $html .= '<meta property="og:url" content="' . esc_url(get_permalink()) . '">' . "\n";
    $html .= '<meta property="og:image" content="' . esc_url($ogp_image) . '">' . "\n";
    $html .= '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
    $html .= '<meta name="twitter:card" content="' . $twitter_card . '">' . "\n";
    $html .= '<meta name="twitter:site" content="' . $twitter_site . '">' . "\n";
    $html .= '<meta property="og:locale" content="ja_JP">' . "\n";
     
    if ($facebook_app_id != "") {
    $html .= '<meta property="fb:app_id" content="' . $facebook_app_id . '">' . "\n";
    }
     
    echo $html;
    }
    
    ?>


<?php if (is_home() || is_front_page()) : ?>
    <script>
        jQuery(document).ready(function($) {
            $('.bxslider').bxSlider({
                auto: true,
                minSlides: 2,
                controls: true,
                touchEnabled: false,
                infiniteLoop: true,
                speed: 500,
                pause: 5000,
                useCSS: false,
            });
        });
    </script>
<?php endif; ?>

<script>
    var lastPageTop = -Infinity;
    $(window).scroll(function(e) {
        var top = e.currentTarget.scrollY;
        if (top >= lastPageTop && e.currentTarget.scrollY > 100) {
            if (!$('#masthead').hasClass("site-header-hide")) {
                $('#masthead').addClass("site-header-hide");
            }
        } else {
            if ($('#masthead').hasClass("site-header-hide")) {
                $('#masthead').removeClass("site-header-hide");
            }
        }
        lastPageTop = top;
    });
</script>


    
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-4HEFGE3WR1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-4HEFGE3WR1');
</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PMQXC4H"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header id="masthead" class="site-header" role="banner">
    
       <div class="menu_wrap">
       <?php if(!is_page(LP_DIR)){?>
					<div class="menu_inner">
						<h1>
							<a class="site_title" href="<?php echo esc_url(home_url('')); ?>" rel="home">WOOMS</a>
						</h1>
                            
						<div class="MvWraper">
							<div id="menu-opener"><span class="headpath"><img src="<?php bloginfo('template_url'); ?>/images/path.svg"></span><span class="bodypath"><img src="<?php bloginfo('template_url'); ?>/images/path.svg"></span><span class="footpath"><img src="<?php bloginfo('template_url'); ?>/images/path.svg"></span>
                            </div>
							<a href="<?php echo esc_url(home_url('')); ?>/contact/" class="MvContactLink">お問い合わせ</a>
					     </div>
                   </div>
                    <nav class="mainmenuwrap" id="gnav">
                         <?php wp_nav_menu(array('menu' => 'headmenu')); ?>
                    </nav>
            <?php }else{ ?>
                <?php get_template_part('template/lp/header');?>
           <?php }?>
        </div>
    </header>
    <?php if(is_page(LP_DIR)){?>
    <div class="nav-toggle-wrap" id="sp-gnav-toggle">
     <div class="nav-toggle">
         <span></span>
          <span></span>
          <span></span>
         </div>
    </div>
    <?php }?>
    <?php
global $is_IE;
if ( $is_IE ) {
// Internet Explorer のときの処理内容
//wp_redirect(‘リダイレクト先’,302); exit;
$alert = "<script type='text/javascript'>alert('ご使用中のブラウザ（InternetExplorer）は表示の崩れや動作が正常に行われない場合がございます。「ご利用にあたって」に掲載されている推奨ブラウザでご利用ください。');</script>";
echo $alert;
}
?>
	
    <div class="hide-when-mobile"></div>
 
    <?php if (!is_front_page()) : ?>
        <div class="bread_wrap">
            <?php if (function_exists('bcn_display')) {
                bcn_display();
            } ?>
        </div>
        <!--.breadcrumbs-->
    <?php endif; ?>

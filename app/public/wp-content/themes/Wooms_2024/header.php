
<!DOCTYPE html>
<html <?php language_attributes(); ?> xml:lang="ja">
<head prefix="og: https://ogp.me/ns#">

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PMQXC4H');</script>
<!-- End Google Tag Manager -->

	<meta charset="UTF-8" />
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
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="apple-touch-icon" sizes="180x180" href="<?php assets(); ?>/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php assets(); ?>/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php assets(); ?>/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php assets(); ?>/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php assets(); ?>/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,300,1,0" />
	
	
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
<body class="<?php echo bodyClass(); ?>" <?php echo bodyID(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PMQXC4H"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="site-wrap">
<header class="site-header">
	<div class="site-header__branding">
		<?php if(is_front_page()){ ?><h1><?php }else{ ?><div><?php }; ?>  
		<a href="<?php echo get_home_url(); ?>" rel="home">
			<img src="<?php assets(); ?>/images/WOOMsLogo.png" alt="Wooms" class="pic">
		</a>
		<?php if(is_front_page()){ ?></h1><?php }else{ ?></div><?php }; ?>	 	
	</div>
	<div class="site-header__menu"> 
		<?php 
			if(!is_page(DIR_LP)){
				get_template_part('template/parts/global-nav');
			}else{ 
				get_template_part('template/lp/header');
			}
		 ?>
	</div>
</header>

<div class="nav-toggle-wrap" id="sp-gnav-toggle">
	<div class="nav-toggle">
		<span></span>
		<span></span>
		<span></span>
	 </div>
</div>

<?php
  function sc_btn_contact($atts){
    ob_start();
    if(get_field('contact')){
      get_template_part('template/parts/btn-contact');
    }
    return ob_get_clean();
  }
  add_shortcode('btn_contact','sc_btn_contact');

  function sc_btn_onlineshop(){
    ob_start();
    get_template_part('template/parts/btn-onlineshop');
    return ob_get_clean();
  }
  add_shortcode('btn_onlineshop','sc_btn_onlineshop');

  function sc_staff_list($atts){
    ob_start();
    if($atts['mod'] == 'shop'){
     get_template_part('template/content/stafflist','',array('mod'=>$atts['mod']));
    }
    if($atts['mod'] == 'all'){
      get_template_part('template/content/stafflist-all');
     }
    return ob_get_clean();
  }
  add_shortcode('staff_list','sc_staff_list');

  function sc_shop_news(){
    ob_start();
    get_template_part('template/content/shopnews');
    return ob_get_clean();
  }
  add_shortcode('shop_news','sc_shop_news');
  
  function sc_shop_outline($atts){
    ob_start();
    get_template_part('template/content/shop_outline','',array('data'=>$atts['data']));
    return ob_get_clean();
  }
  add_shortcode('shop_outline','sc_shop_outline');

  function sc_news_all(){
    ob_start();
    get_template_part('template/content/news');
    return ob_get_clean();
  }
  add_shortcode('news_all','sc_news_all');



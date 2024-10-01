<?php
    $image = get_field($args['field']);
    $size =  $args['size'];
    $alt = $args['alt'];
    if ($image) {
        if($alt!=''){
            $alt2 = $alt;
        }else{
            $alt2 = $image['alt'];
        }
        if($size!=''){
            echo '<img src="' . esc_url($image['sizes'][$size]) . '" alt="' . esc_attr($alt2) . '" />';
        }else{
            echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($alt2) . '" />';
        }
    }
?>
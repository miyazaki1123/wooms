<nav class="global-nav">
    <?php 
    $args = ['mod' => 'header'];
    get_template_part('template/parts/menu',null,$args); ?>
    
    <menu class="contact-nav--tb">
        <li class="bg--brown">
            <a href="<?php echo get_home_url()?>/<?php echo DIR_DL1; ?>">
            <div class="icon"><img src="<?php assets(); ?>/images/icon/icon_dl.svg" alt=""></div>
                <p>収集運搬事業者・自治体向け<br>
                資料ダウンロード</p>
            </a>
        </li>
        <li class="bg--green">
            <a href="<?php echo get_home_url()?>/<?php echo DIR_DL2; ?>">
            <div class="icon"><img src="<?php assets(); ?>/images/icon/icon_dl.svg" alt=""></div>
            <p>排出事業者向け資料ダウンロード</p>
            </a>
        </li>
        <li class="bg--orange">
            <a href="<?php echo get_home_url()?>/<?php echo DIR_DL2; ?>">
                <div class="icon"><img src="<?php assets(); ?>/images/icon/icon_email.svg" alt=""></div>
                <p>お問い合わせ</p>
            </a>
        </li>
    </menu>
    <button class="btn--menu-close">CLOSE</button>
</nav>
<menu class="contact-nav">
    <li class="bg--green show-tb">
        <a href="<?php echo get_home_url()?>/<?php echo DIR_DL; ?>">
        <div class="icon"><img src="<?php assets(); ?>/images/icon/icon_dl.svg" alt=""></div>
        </a>
    </li>
    <li class="bg--brown show-pc">
        <a href="<?php echo get_home_url()?>/<?php echo DIR_DL1; ?>">
        <div class="icon"><img src="<?php assets(); ?>/images/icon/icon_dl.svg" alt=""></div>
            <p>収集運搬事業者・自治体向け<br>
            資料ダウンロード</p>
        </a>
    </li>
    <li class="bg--green show-pc">
        <a href="<?php echo get_home_url()?>/<?php echo DIR_DL2; ?>">
        <div class="icon"><img src="<?php assets(); ?>/images/icon/icon_dl.svg" alt=""></div>
        <p>排出事業者向け<br>
            資料ダウンロード</p>
        </a>
    </li>
    <li class="bg--orange">
        <a href="<?php echo get_home_url()?>/<?php echo DIR_CONTACT; ?>">
            <div class="icon"><img src="<?php assets(); ?>/images/icon/icon_email.svg" alt=""></div>
            <p>お問い合わせ</p>
        </a>
    </li>
</menu>
<footer class="site-footer">
    <div class="site-footer__menu-wrap" data-a="fade-up" data-a-offset="0">
        <div class="site-footer__company-logo">
                <a class="footlogo-F" href="/">
                    <img src="<?php assets(); ?>/images/WOOMsLogo.png">
                </a>
            </div>

            <div class="site-footer__menu">
                <?php
                $args = ['mod' => 'footer'];
                get_template_part('template/parts/menu', null, $args); ?>
            </div>

        
        <menu class="sub-menu">
            <li>
                <a href="<?php echo get_home_url(); ?>/<?php echo DIR_VISION ?>">
                    <div>私たちの想い</div>
                </a>
            </li>
            <li>
                <a href="<?php echo get_home_url(); ?>/<?php echo DIR_NEWS ?>">
                    <div>お知らせ</div>
                </a>
            </li>
            <li>
                <a href="<?php echo get_home_url(); ?>/<?php echo DIR_DL ?>">
                    <div>資料ダウンロード</div>
                </a>
            </li>
            <li>
                <a href="<?php echo get_home_url(); ?>/<?php echo DIR_CONTACT ?>">
                    <div>お問い合わせ</div>
                </a>
            </li>
            <li>
                <a href="<?php echo DIR_COMPANY ?>" target="_blank">
                    <div>会社概要</div>
                </a>
            </li>
        </menu>

        <div class="footPrivacyPolicyLinks">
            <menu>
                <li><a href="<?php echo get_home_url(); ?>/term" target="_blank">ご利用にあたって</a></li>
                <li><a href="https://www.odakyu.jp/privacy/" target="_blank">個人情報保護方針</a></li>
                <li><a href="https://www.odakyu.jp/privacy_statement/" target="_blank">個人情報の取り扱いについて</a></li>
            </menu>
        </div>

        <div class="site-footer__ninsyo-logo">
             <img src="<?php assets(); ?>/images/img_footer_ninsyo.svg" alt="GIJP-1213-IC ISO/IEC27001:2022">
        </div>
    </div>
    <div class="foot-inner">
        <a class="footlogo" href="https://www.odakyu.jp" target="_blank">
            <img src="<?php assets(); ?>/images/odakyu_logo_02.svg" alt="思う 誰かを 今日も ODAKYU">
        </a>
        <p class="copy">Copyright&copy; Odakyu Electric Railway Co., Ltd. All Rights Reserved.</p>
    </div>

</footer>
<?php if(!is_page(LP_DIR)){?>
<div class="footerObiArea">
    <div class="ObiInner">
        <p class="white h pc"><img src="<?php bloginfo('template_url'); ?>/images/WOOMStrialPC.svg" alt="WOOMSを試してみませんか？"></p>
        <p class="white h mb"><img src="<?php bloginfo('template_url'); ?>/images/WOOMStrialMb.svg" alt="WOOMSを試してみませんか？"></p>
        <ul>
								<li><a href="<?php echo esc_url(home_url('')); ?>/contact/">資料請求</a></li>
            <li><a href="<?php echo esc_url(home_url('')); ?>/contact/">お見積り</a></li>
            <li><a href="<?php echo esc_url(home_url('')); ?>/contact/">お問い合わせ</a></li>
        </ul>
        <p class="white f">サービス、共創・協業、お見積りなど、<br class="sp">お気軽にお問い合わせください。</p>
    </div>
</div>
<div class="footerAddBanner">
    <div class="BannerInner">
        <a href="<?php echo esc_url(home_url('/recruit/')) ?>"><img class="BannerPc" src="<?php echo themeImagePath('rec_pc_banner_white.jpg') ?>" alt="WOOMSエンジニア 積極採用中"><img class="BannerSp" src="<?php echo themeImagePath('rec_sp_banner_white.jpg') ?>" alt="WOOMSエンジニア 積極採用中">
		</a>
    </div>
</div>
<footer>

    <div class="foot-menuwrap" data-a="fade-up" data-a-offset="0">
        <div class="foot-menu">
            <div class="foot-menu__01">
                <div>
                    <?php wp_nav_menu(array('menu' => 'footmenu-01')); ?>
                </div>
            </div>
            <div class="foot-menu__02">
                <div>
                    <?php wp_nav_menu(array('menu' => 'footmenu-02')); ?>
                </div>
            </div>
            <div class="foot-menu__03">
                <div>
                    <?php wp_nav_menu(array('menu' => 'footmenu-03')); ?>
                </div>
            </div>
        </div>
        <a class="footlogo-F" href="/">
            <img src="<?php bloginfo('template_url') ?>/images/WOOMsLogo.png">
        </a>

    </div>

    <div class="footPrivacyPolicyLinks">
        <ul>
            <li><a href="<?php echo esc_url(home_url('')); ?>/term">ご利用にあたって</a></li>
            <li><a href="https://www.odakyu.jp/privacy/" target="_blank">個人情報保護方針</a><svg xmlns="http://www.w3.org/2000/svg" width="12.136" height="12.136" viewBox="0 0 12.136 12.136">
                    <path id="Icon_open-external-link" data-name="Icon open-external-link" d="M0,0V12.136H12.136V9.1H10.619v1.517h-9.1v-9.1H3.034V0ZM6.068,0,8.343,2.275,4.551,6.068,6.068,7.585,9.86,3.792l2.275,2.275V0Z" fill="gray" />
                </svg></li>
            <li><a href="https://www.odakyu.jp/privacy_statement/" target="_blank">個人情報の取り扱いについて</a><svg xmlns="http://www.w3.org/2000/svg" width="12.136" height="12.136" viewBox="0 0 12.136 12.136">
                    <path id="Icon_open-external-link" data-name="Icon open-external-link" d="M0,0V12.136H12.136V9.1H10.619v1.517h-9.1v-9.1H3.034V0ZM6.068,0,8.343,2.275,4.551,6.068,6.068,7.585,9.86,3.792l2.275,2.275V0Z" fill="gray" />
                </svg></li>
        </ul>
    </div>

    <div class="foot-inner">
        <p class="copy">Copyright&copy; Odakyu Electric Railway Co., Ltd. All Rights Reserved.</p>
        <a class="footlogo" href="https://www.odakyu.jp" target="_blank">
            <img src="<?php bloginfo('template_url') ?>/images/odakyu_logo.jpg">
        </a>
    </div>

</footer>
<?php }else{?>
<?php get_template_part('template/lp/footer');?>
<?php }?>
<div class="modal-youtube">
	<div class="iframe-wrap"><img class="modal-closer" src="<?php bloginfo('template_url') ?>/images/modal-closer.png" alt="閉じる"><iframe width="560" height="315" src="https://www.youtube.com/embed/j0EXSTkqFyU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe></div>
</div>

<div id="wp-footer">
    <?php wp_footer(); ?>
</div>
</body>

</html>

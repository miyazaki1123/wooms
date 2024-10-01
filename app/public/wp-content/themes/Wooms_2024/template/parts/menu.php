<menu class="main-menu">
    <li class="fc--blue">
        <div>
            <div>収集運搬事業者</div>
        </div>
        <menu class="sub-menu bg--blue">
            <li>
                <a href="<?php echo get_home_url(); ?>/">
                    <div>WOOMS Drive</div>
                </a>
            </li>
            <li>
                <a href="<?php echo get_home_url(); ?>/">
                    <div>WOOMS App & Portal</div>
                </a>
            </li>
        </menu>
    </li>
    <li class="fc--brown">
        <div>
            <div>自治体向け</div>
        </div>
        <menu class="sub-menu bg--brown">
            <li>
                <a href="<?php echo get_home_url(); ?>/">
                    <div>WOOMS Activate</div>
                </a>
            </li>
            <li>
                <a href="<?php echo get_home_url(); ?>/">
                    <div>WOOMS Technology</div>
                </a>
            </li>
            <li>
                <a href="<?php echo get_home_url(); ?>/">
                    <div>WOOMS App & Portal</div>
                </a>
            </li>
        </menu>
    </li>
    <li class="fc--green">
        <div>
            <div>排出事業者向け</div>
        </div>
        <menu class="sub-menu bg--green">
            <li>
                <a href="<?php echo get_home_url(); ?>/">
                    <div>WOOMS Connect</div>
                </a>
            </li>
        </menu>
    </li>
    <?php if ($args['mod'] == 'header') { ?>
        <li class="fc--black">
            <div>
                <div>その他</div>
            </div>
            <menu class="sub-menu bg--black">
                <li>
                    <a href="<?php echo get_home_url(); ?>/<?php echo DIR_VISION ?>">
                        <div>私たちの想い</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo get_home_url(); ?>/<?php echo DIR_FAQ ?>">
                        <div>よくある質問</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo get_home_url(); ?>/<?php echo DIR_NEWS ?>">
                        <div>お知らせ</div>
                    </a>
                </li>
            </menu>
        </li>
    <?php } ?>
</menu>

<?php get_header(); ?>
<main class="site-main">
    <section class="sec sec__404" data-a data-a-trigger="a1">
        <header class="sec__header">
            <h1><span>404 NOT FOUND</span></h1>
        </header>
        <div class="sec__inner">
            <div class="contents">
            <h2>404 NOT FOUND</h2>
           
            <p>
                申し訳ありませんが、<br class="sp">お探しのページは見つかりませんでした。<br>
                ページは存在しないか、<br class="sp">入力されたURLに<br class="sp">誤りがある可能性があります。<br>
                お手数ですが、HOMEページに戻り、<br>
                再度ページをお探しいただけますよう<br class="sp">お願いいたします。
            </p>
            </div>
            <div class="nav-wrap">
                <a href="<?php echo get_home_url(); ?>/staff/" class="btn--underline"><span>トップへ戻る</span></a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
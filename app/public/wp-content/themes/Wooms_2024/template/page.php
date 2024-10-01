<?php get_template_part('template/parts', 'pageheader'); ?>
<section class="sec sec--usage">
                    <div class="sec__icon sec__icon--top">
                        <div>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon_circle_denkyu.svg" alt="" width="160" height="160">
                        </div>
                    </div>
                    <div class="sec__inner">
                        <div class="page-contents page-contents--doc">
                            <div class="page-contents--doc__main">
                                <?php the_content(); ?>
                            </div>
                           <div class="sec__nav">
                                <a href="<?php echo get_home_url(); ?>" class="btn--round">
                                    <span>トップへ戻る</span>
                                    <span class="icon"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>

<?php

//////////////////////////////////////////////////////////
// tailwindcssを利用しています(https://tailwindcss.com/) //
/////////////////////////////////////////////////////////

?>

<script>
    var link = document.createElement("link")
    link.href = "https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
    link.rel = "stylesheet"
    link.type = "text/css"
    document.documentElement.style.opacity = "0"
    link.onload = function() {
        document.documentElement.style.opacity = "1"
    };
    document.head.appendChild(link);
</script>

<?php get_header(); ?>
<style>
    .donyu-box {
        color: #0077c0;
        max-width: 400px;
        height: 82px;
    }

    p {
        line-height: 1.75;
        letter-spacing: 0.08em;
        font-size: 20px;
    }

    .btn {
        background: #0077c0;
        transition: all 0.2s;
        color: white;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
        border-radius: 3px;
        cursor: pointer;
    }

    .btn:hover {
        text-decoration: none !important;
    }

    .btn:hover {
        background: #0063a0;
    }

    .mitsumori-btn {
        max-width: 766px;
        width: 100%;
        height: 86px;
        font-size: 25px;
        font-weight: bold;
        letter-spacing: 0.06em;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .support-info-card {
        background: #F4F9FC;
        padding: 54px;
        height: 100%;
    }

    .yokuaru-shitsumon-box {
        color: #0077c0;
        margin-top: 115px;
        height: 82px;
    }

    .blue-text {
        color: #0063a0;
    }

    h4 {
        letter-spacing: 0.1em;
    }

    * {
        font-weight: 500;
    }

    h1 {
        font-size: 38px;
    }

    .number-ball {
        max-width: 682px;
        margin-left: 56px;
    }

    .number-ball-img {
        width: 154px;
        height: 154px;
    }

    .img1 {
        width: 93px;
        height: 102px;
    }

    .img2 {
        width: 100px;
        height: 100px;
    }

    .img3 {
        width: 105px;
        height: 88;
    }

    .img4 {
        width: 102px;
        height: 92px;
    }

    small {
        font-size: 15px;
    }

    h3 {
        font-size: 26px;
    }

    .optnH {
        max-width: 380px;
    }

    .info-1 {
        margin-bottom: 134px;
    }

    @media screen and (max-width: 640px) {
        .donyu-box{
            margin-top: 48px;
            height: 62px;
        }
        .img1 {
            width: 72px;
            height: 78px;
        }

        .img2 {
            width: 75px;
            height: 75px;
        }

        .img3 {
            width: 78px;
            height: 65px;
        }

        .img4 {
            width: 75px;
            height: 71px;
        }

        h1 {
            font-size: 26px;
        }

        p {
            font-size: 14px;
        }

        .lato-text {
            font-size: 10px;
            font-weight: 400;
        }


        h5 {
            font-size: 12px;
            height: inherit;
        }

        h4 {
            font-size: 18px;
        }

        h3 {
            font-size: 15px;
        }

        .number-ball {
            max-width: 248px;
            margin-left: 10px;
            margin-right: 8px;
        }

        .number-ball-img {
            width: 77px;
            height: 77px;
        }

        small {
            font-size: 12px;
        }

        .optnH {
            max-width: 260px;
        }

        .info-1 {
            margin-bottom: 64px;
        }

        .text-title-subline{
            font-size: 14px!important;
        }
			
    }
</style>
<article class="<?php 
		$page = get_page(get_the_ID());
		$slug = $page->post_name;
		echo $slug . "-page";
	?>">
<div id="primary" class="content-area">
    <div class="hidden sm:block" style="margin-top: 90px;"></div>
    <main class="w-full">
        <div class="flex flex-col w-full justify-center items-center">
        <div class="sm:hidden" style=" margin-top: 50px;"></div>
            <!-- 導入までの流れ -->
					<section class="sec sec--int-flow1">
										<header class="sec__header">
										<h2 class="h--style-01 fc--blue fs-36 fs-sp-24">アクティベーション<br class="sp">提案の流れ</h2>
											<p class="read">ヒアリングを繰り返し、<br class="pc">課題や要望に沿った資源循環につながるご提案をいたします。</p>
										</header>
            <!-- 流れ -->
            <article id="flowPt">
                <section class="flex justify-between items-center">
                    <img class="number-ball-img" src="/wp-content/themes/Wooms_2021/images/flow/1.jpg" />
                    <div class="w-full number-ball">
                        <h3 style="letter-spacing:0.12em">お問い合わせ</h3>
                        <p class="regular mt-3 sm:mt-0">お問い合わせフォームにてご連絡いただくと、折り返し担当者からお電話・メールにてご連絡いたします。</p>
                    </div>
                </section>
                <!--  -->
                <section class="flex justify-between items-center mt-16">
                    <img class="number-ball-img" src="/wp-content/themes/Wooms_2021/images/flow/2.jpg" />
                    <div class="w-full number-ball">
                        <h3 style="letter-spacing:0.12em">ヒアリング</h3>
                        <p class="regular mt-3 sm:mt-0">お客様の課題の共有、現状把握のためヒアリングをおこないます。</p>
                    </div>
                </section>
                <!--  -->
                <section class="flex justify-between items-center mt-16">
                    <img class="number-ball-img" src="/wp-content/themes/Wooms_2021/images/flow/3.jpg" />
                    <div class="w-full number-ball">
                        <h3 style="letter-spacing:0.12em">お見積り・プラン提示</h3>
                        <p class="regular mt-3 sm:mt-0">ヒアリングをもとに得られた課題や目標、実情に沿った最適なプランを、お見積と共に提示いたします。<br>
													<small>※テクノロジー、コミュニティ、プロダクトの3つのサービスを複合したご提案が基本となりますが、サービス単体の導入相談も柔軟に対応いたします。</small></p>
                    </div>
                </section>
                <!--  -->
                <section class="flex justify-between items-center mt-16">
                    <img class="number-ball-img" src="/wp-content/themes/Wooms_2021/images/flow/4.jpg" />
                    <div class="w-full number-ball">
                        <h3 style="letter-spacing:0.12em">解決施策の実行</h3>
                        <p class="regular mt-3 sm:mt-0">プランを元に施策を実行します。<br>
お客様の抱える課題の解決まで伴奏し、サポートいたします。</p>
                    </div>
                </section>
                <!--  -->
                <section class="flex justify-between items-center mt-16">
                    <img class="number-ball-img" src="/wp-content/themes/Wooms_2021/images/flow/5.jpg" />
                    <div class="w-full number-ball">
                        <h3 style="letter-spacing:0.12em">今後のご提案</h3>
                        <p class="regular mt-3 sm:mt-0">解決施策の結果を踏まえて、今後の課題・方向性についてのご提案をさせていただきます。</p>
                    </div>
                </section>
            </article>
						</section>
					<section class="sec sec--int-flow2">
										<header class="sec__header">
										<h2 class="h--style-01 fc--blue fs-36  fs-sp-24">WOOMS<br class="sp">テクノロジー導入の<br class="sp">流れ</h2>
											<p class="read">テクノロジー単体の導入もご検討いただけます。<br class="pc">課題や要望に沿ったシステム導入をサポートいたします。</p>
										</header>
						

            <!-- 流れ -->
            <article id="flowPt2">
                <section class="flex justify-between items-center">
                    <img class="number-ball-img" src="/wp-content/themes/Wooms_2021/images/flow/1.jpg" />
                    <div class="w-full number-ball">
                        <h3 style="letter-spacing:0.12em">お問い合わせ</h3>
                        <p class="regular mt-3 sm:mt-0">お問い合わせフォームにてご連絡いただくと、折り返し担当者からお電話・メールにてご連絡いたします。</p>
                    </div>
                </section>
                <!--  -->
                <section class="flex justify-between items-center mt-16">
                    <img class="number-ball-img" src="/wp-content/themes/Wooms_2021/images/flow/2.jpg" />
                    <div class="w-full number-ball">
                        <h3 style="letter-spacing:0.12em">ヒアリング</h3>
                        <p class="regular mt-3 sm:mt-0">お客様の課題の共有、現状把握のためヒアリングをおこないます。</p>
                    </div>
                </section>
                <!--  -->
                <section class="flex justify-between items-center mt-16">
                    <img class="number-ball-img" src="/wp-content/themes/Wooms_2021/images/flow/3.jpg" />
                    <div class="w-full number-ball">
                        <h3 style="letter-spacing:0.12em">お見積り・プラン提示</h3>
                        <p class="regular mt-3 sm:mt-0">ヒアリングをもとに得られた課題や目標、実情に沿った最適なプランを、お見積と共に提示いたします。<br>
													<small>※必要に応じてApp/Portalのデモをご覧いただけます。</small></p>
                    </div>
                </section>
                <!--  -->
                <section class="flex justify-between items-center mt-16">
                    <img class="number-ball-img" src="/wp-content/themes/Wooms_2021/images/flow/4.jpg" />
                    <div class="w-full number-ball">
                        <h3 style="letter-spacing:0.12em">導入サポート</h3>
                        <p class="regular mt-3 sm:mt-0">定期的に現地にスタッフを派遣することで、ユーザー様の操作理解を深め、スムーズに現場に導入できるようにいたします。</p>
                    </div>
                </section>
                <!--  -->
                <section class="flex justify-between items-center mt-16">
                    <img class="number-ball-img" src="/wp-content/themes/Wooms_2021/images/flow/5.jpg" />
                    <div class="w-full number-ball">
                        <h3 style="letter-spacing:0.12em">アフターサポート</h3>
                        <p class="regular mt-3 sm:mt-0">マニュアル類の提供、電話やメール対応、緊急現地対応など、安心してご利用いただけるバックアップ体制を構築いたします。</p>
                    </div>
                </section>
            </article>
						</section>
     </div>

       <!-- サポート -->
      <section class="sec sec--int-suport" data-a="fade-up">
				<header class="sec__header">
					<p class="read">導入サポートとして、<br>WOOMSテクノロジーの<br class="sp">初期設定と初期支援を行います。</p>
				</header>
				<div class="contents">
					<div class="col2">
						<dl>
							<dt>初期設定</dt>
							<dd>
								<ul>
									<li>● 集積所登録サポート</li>
									<li>● デバイス通信接続サポート</li>
									<li>● 初期登録（車両、拠点他）</li>
								</ul>
								<p>タブレット、管理用パソコンともに、 WOOMSの担当スタッフが機器調達し、 すぐに使用できる状態にまでセットアップをおこないます。オプションで、 集積所登録サポートも対応可能です。</p>
							</dd>
						</dl>
						<dl>
							<dt>初期支援</dt>
							<dd>
								<ul>
									<li>● 操作方法現場サポート</li>
									<li>● 職員・社員向け説明会の開催</li>
									<li>● 現地常駐スタッフ派遣</li>
								</ul>
								<p>WOOMSの専門チームが、職員・社員様へのシステム説明やレクチャーを実施し、いち早くシステムを活用した収集体制を実現します。オプションで、ルート最適化などのコンサルティングサービスも用意しております。</p>
							</dd>
						</dl>
					</div>
				</div>
				</section>
        
<?php while ( have_posts() ) : the_post();?>
<?php the_content();?>
<?php endwhile;?>

        <div style="margin-top: -34px;" class="hidden sm:block"></div>
    </main>
</div><!-- .content-area -->
</article>
<?php // get_sidebar(); 
?>
<?php get_footer(); ?>
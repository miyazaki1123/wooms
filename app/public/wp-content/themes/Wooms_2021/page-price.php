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
    .kakaku-box {
        color: #0077c0;
        width: 126px;
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
        padding-bottom: 3px;
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
        letter-spacing: 0.15em;
    }

    .blue-text {
        color: #0063a0;
    }

    .msg1 {
        line-height: 1.9;
    }

    h5 {
        font-size: 18px;
        line-height: 1.666;
        height: 78px;
    }

    h4 {
        letter-spacing: 0.12em;
    }

    h3 {
        font-size: 26px;
    }

    .lato-text {
        font-size: 12px;
    }

    * {
        font-weight: 500;
    }

    .l1 {
        font-size: 20px;
        height: 37px;
        margin-bottom: 4px
    }

    h1 {
        font-size: 38px;
    }

    .img1,
    .img2,
    .img3 {
        width: 98px;
        height: 98px;
    }

    .msg2 {
        letter-spacing: 0.12em;
    }

    .text-line {
        width: 70px;
        border-bottom: 2px solid #0077c0;
    }

    @media screen and (max-width: 640px) {
        .kakaku-box {
            height: 62px;
            margin-top: 48px;
        }

        .img1 {
            width: 67px;
            height: 67px;
        }

        .img2 {
            width: 55px;
            height: 65px;
        }

        .img3 {
            width: 57px;
            height: 57px;
        }

        h1 {
            font-size: 26px;
        }

        p {
            font-size: 12px;
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
            font-size: 18px;
        }

        .mitsumori-btn {
            height: 44px;
            font-size: 14px;
            font-weight: bold;
            padding-bottom: 1px;
            max-width: 180px;
        }

        .msg1 {
            font-size: 14px;
        }


        .support-info-card {
            padding: 25px;
        }

        .l1 {
            font-size: 12px;
            height: 20px;
        }

        .yokuaru-shitsumon-box {
            margin-top: 24px;
        }

        .msg2 {
            font-size: 20px;
        }

        .text-1 {
            height: 108px;
        }

        .text-line {
            width: 50px;
            border-bottom: 2px solid #0077c0;
        }

        .text-title-subline {
            font-size: 14px !important;
            padding: 0 20px;
            width: 100%;
        }
    }
</style>

<div id="primary" class="content-area">
    <div class="hidden sm:block" style="margin-top: 90px;"></div>
    <main class="w-full">
            <div class="sm:hidden" style="margin-top: 50px;"></div>
            
					
					<section class="sec sec--price">
						<header class="sec__header">
							<h2 class="h--style-01 fs-36">価格</h2>
							<p class="read">
							WOOMSはテクノロジー、コミュニティ、プロダクトの3つのサービスを<br class="pc">組み合わせた料金体系となっています。<br class="pc">サービス単体の導入も対応いたしますのでご相談ください。
							</p>
						</header>
						<div class="contents">
							<div class="content content--app-portal">
							<h3>WOOMS Technology<br class="sp">（App＆Portal）</h3>
							<p class="read">「初期料金」（デバイス関連のみ）と「利用料金」（収集車両台数に応じた月額）とのシンプルな料金体系。<br class="pc">お客様の状況に応じたオプションもご用意。</p>
								
								<div class="content content--price" data-a="fade-up">
								<div>
									<h4>初期料金<span>低コスト</span></h4>
									<div class="main">
										<dl>
										<dt>デバイス提供料</dt>
										<dd>
											<ul>
												<li>・WOOMS Portal用PC</li>
												<li>・車載ホルダーほか備品</li>
											</ul>
										</dd>
										<dt>デバイス設定料</dt>
										<dd>
											<ul>
												<li>・アカウント開設 ※タブレット</li>
												<li>・WOOMS App & Portal設定</li>
											</ul>
										</dd>
										<dt>デバイス操作レクチャー料</dt>
										<dd>
											<ul>
												<li>・お客様ごとにプログラムをご用意<br>例：自治体の場合</li>
											</ul>
										</dd>
										<dt>オプション</dt>
										<dd>
											<ul>
												<li>・収集ポイント入力代行</li>
											</ul>
										</dd>
									</dl>
									</div>
								</div>
								<div>
									<h4>利用料金</h4>
									<div class="main">
										<dl>
										<dt>システム利用料（月額）</dt>
										<dd>
											<ul>
												<li class="not-indent">利用料は、車両台数に応じて算出させていただきます。<br>※保守・サポートも含まれます。
												</li>
											</ul>
										</dd>
										<dt>オプション</dt>
										<dd>
											<ul>
												<li>・デバイス利用料（月額）<br>
													- タブレット利用<br>
													- Wifiルーター利用<br>
													※お客様の方でご用意する場合はかかりません。
												</li>
											</ul>
										</dd>
										<dt>定点レポート</dt>
										<dd>
											<ul>
												<li>※集積所が多く複雑な収集体制の自治体様には、定点レポートをお出しすることも可能です。<br>（お客様の要望に応じて、設計からレポーティングを行います。）</li>
											</ul>
										</dd>
									</dl>
									</div>
								</div>
							</div>
								
							</div>
							
							<div class="content content--activision">
								<h3>WOOMS Activation</h3>
								<p class="read">料金は、お客様が解決したい問題・課題によって異なります。<br>
									まずは、抱えている問題・課題からお気軽にご相談ください。</p>
								<div class="main">
								
								<ul class="ul--style-act col4" data-a="fade-up">
										<li>
										<div>
										<div class="img">
										<img decoding="async" src="/wp-content/themes/Wooms_2021/images/Act_03_img_01.svg" alt="">
										</div>
										<strong class="align--left">収集体制構築の<br>コンサルティング</strong>
										<ul>
										<li>■データ解析による課題導出</li>
										<li>■課題に対する解決策の提案</li>
										</ul>
										</div>
										</li>
									<li><small>※収集データが取得できる環境が前提となります。<br>※上記が無い場合、WOOMS Technologyを利用します。</small></li>
										<li>
										<div>
										<div class="img">
										<img decoding="async" src="/wp-content/themes/Wooms_2021/images/Act_03_img_02.svg" alt="">
										</div>
										<strong class="align--left">資源循環施策の<br>企画・実施</strong>
										<ul>
										<li>■新たなモデルの設計</li>
										<li>■実地による有効性の実証</li>
										<li>■補助金・助成金の活用サポート</li>
										</ul>
										</div>
										</li>
										<li>
										<div>
										<div class="img">
										<img decoding="async" src="/wp-content/themes/Wooms_2021/images/Act_03_img_03.svg" alt="">
										</div>
										<strong class="align--left">実行を促進させる<br>ネットワーキング</strong>
										<ul>
										<li>■共創パートナーのコーディネイト</li>
										<li>■自治体や導入事業者間の交流機会創出</li>
										</ul>
										</div>
										</li>
										<li>
										<div>
										<div class="img">
										<img decoding="async" src="/wp-content/themes/Wooms_2021/images/Act_03_img_04.svg" alt="">
										</div>
										<strong class="align--left">地域で自走する<br>体制構築のサポート</strong>
										<ul>
										<li>■市民への啓発活動支援</li>
										</ul>
										</div>
										</li>
										</ul>
								</div>
							</div>
							
						</div>
					</section>

        <section class="sec sec--mitsumori">
							
							<div class="contents">
										<div class="content">
											<p class="read">
                    ヒアリングをもとに、収集ポイント数、<br class="sp">車両台数、収集品目・<br class="pc">
                    収集品目数など、条件に応じた最適な料金プランをご提案いたします
                </p>
										</div>
								
								<a class="btn mitsumori-btn" href="/contact/">
                無料お見積りへ
            </a>
									</div>
            </section>

        
				<?php while ( have_posts() ) : the_post();?>
				<?php the_content();?>
				<?php endwhile;?>

            
        <div style="margin-top: -34px;" class="hidden sm:block"></div>
    </main>
</div><!-- .content-area -->

<?php // get_sidebar(); 
?>
<?php get_footer(); ?>
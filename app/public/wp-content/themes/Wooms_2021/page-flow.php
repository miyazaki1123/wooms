<?php

/**
 * Template Name: 導入までの流れ
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

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
            max-width: 233px;
            margin-left: 25px;
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

<div id="primary" class="content-area">
    <div class="hidden sm:block" style="margin-top: 90px;"></div>
    <main class="w-full">
        <div class="flex flex-col w-full justify-center items-center">
            <div class="sm:hidden" style=" margin-top: 50px;"></div>
            <!-- 導入までの流れ -->
            <div class="sm:mt-20 donyu-box flex flex-col justify-center items-center">
                <div class="flex-auto"></div>
                <h1 style="font-weight:bold;line-height:1.44;" id="flow1">導入までの流れ</h1>
                <div class="flex-auto"></div>
                <div class="" style="width:70px;border-bottom:2px solid #0077c0;"></div>
            </div>
            <section style="margin-top:38px;"></section>
            <section>
                <p class="sm:text-center text-title-subline">
                    ヒアリングを繰り返し、課題や要望に沿った<br />
                    システム導入をサポート致します。
                </p>
            </section>

            <div class="hidden sm:block" style="margin-top: 98px;"></div>

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
                        <h3 style="letter-spacing:0.12em">ヒアリング・現地調査</h3>
                        <p class="regular mt-3 sm:mt-0">担当者が現地へ伺い、現状把握のためヒアリングをおこない、必要により収集車に乗車して調査いたします。</p>
                    </div>
                </section>
                <!--  -->
                <section class="flex justify-between items-center mt-16">
                    <img class="number-ball-img" src="/wp-content/themes/Wooms_2021/images/flow/3.jpg" />
                    <div class="w-full number-ball">
                        <h3 style="letter-spacing:0.12em">お見積り・プラン提示</h3>
                        <p class="regular mt-3 sm:mt-0">ヒアリングをもとに得られた課題や目標、実情に沿った最適なプランを、お見積と共に提示いたします。</p>
                    </div>
                </section>
                <!--  -->
                <section class="flex justify-between items-center mt-16">
                    <img class="number-ball-img" src="/wp-content/themes/Wooms_2021/images/flow/4.jpg" />
                    <div class="w-full number-ball">
                        <h3 style="letter-spacing:0.12em">導入支援</h3>
                        <p class="regular mt-3 sm:mt-0">ユーザー様にてプロジェクトチームを編成後、現地への派遣スタッフと共に、操作理解を深めていただきます。</p>
                    </div>
                </section>
                <!--  -->
                <section class="flex justify-between items-center mt-16">
                    <img class="number-ball-img" src="/wp-content/themes/Wooms_2021/images/flow/5.jpg" />
                    <div class="w-full number-ball">
                        <h3 style="letter-spacing:0.12em">保守・サポート</h3>
                        <p class="regular mt-3 sm:mt-0">マニュアル類の提供、電話やメール対応、緊急現地対応など、安心してご利用いただけるバックアップ体制を構築いたします。</p>
                    </div>
                </section>
            </article>

            <!-- オプションサポート -->
            <div class="hidden sm:block" style="margin-top: 175px;"></div>
            <div class="donyu-box flex flex-col justify-center items-center">
                <div class="flex-auto"></div>
                <h1 class="optnH" style="font-weight:bold;line-height:1.44;"><img src="<?php bloginfo('template_url') ?>/images/option.png"></h1>
                <div class="flex-auto"></div>
                <div class="" style="width:70px;border-bottom:2px solid #0077c0;"></div>
            </div>

            <div class="hidden sm:block" style="margin-top: 82px;"></div>
            <article class="grid grid-cols-1 sm:grid-cols-2 px-14 gap-40 info-1" style="max-width:1280px;">
                <section class="flex items-center justify-end">
                    <img class="img1" src="/wp-content/themes/Wooms_2021/images/flow/f1.jpg" />
                    <div class="w-full ml-16 sm:ml-10" style="max-width:367;">
                        <h3 style="letter-spacing:0.12em">システムトライアル</h3>
                        <p class="mt-4 regular">本導入前に、小規模で一定期間、WOOMS App・Portalをお試しいただけます。</p>
                    </div>
                </section>
                <!--  -->
                <section class="flex items-center justify-end">
                    <img class="img2" src="/wp-content/themes/Wooms_2021/images/flow/f2.jpg" />
                    <div c class="w-full ml-16 sm:ml-10" style="max-width:324px;">
                        <h3 style="letter-spacing:0.12em">収集ポイント入力</h3>
                        <p class="mt-4 regular">担当スタッフが、既存地図をもとに収集ポイントを事前に登録いたします。</p>
                    </div>
                </section>
                <!--  -->
                <section class="flex items-center justify-end">
                    <img class="img3" src="/wp-content/themes/Wooms_2021/images/flow/f3.jpg" />
                    <div class="w-full ml-16 sm:ml-10" style="max-width:367px;">
                        <h3 style="letter-spacing:0.12em">車両Gセンサー取付</h3>
                        <p class="mt-4 regular">車両に取り付けるセンサーにより、急発進、急停車、急旋回を検知し車両毎に把握いただけます。</p>
                    </div>
                </section>
                <!--  -->
                <section class="flex items-center justify-end">
                    <img class="img4" src="/wp-content/themes/Wooms_2021/images/flow/f4.jpg" />
                    <div class="w-full ml-16 sm:ml-10" style="max-width:324px;">
                        <h3 style="letter-spacing:0.12em">市民公開</h3>
                        <p class="mt-4 regular">住所を入力することにより、収集ポイントおよび収集車の状況を市民に公開いただけます。</p>
                    </div>
                </section>
            </article>
        </div>

        <?php the_content();?>

        <div style="margin-top: -34px;" class="hidden sm:block"></div>
    </main>
</div><!-- .content-area -->

<?php // get_sidebar(); 
?>
<?php get_footer(); ?>
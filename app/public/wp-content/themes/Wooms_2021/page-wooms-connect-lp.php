<?php get_header(); ?>

<article class="<?php 
		$page = get_page(get_the_ID());
		$slug = $page->post_name;
		echo $slug . "-page";
?>">

<?php while ( have_posts() ) : the_post();?>

<div class="page-header">
	<div class="page-header__inner">
		<div class="page-header__img">
			<picture>
				<source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/wooms_connect_lp/header_img@2x.jpg">
				<source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/wooms_connect_lp/header_img_sp.jpg">
				<img src="<?php echo get_template_directory_uri(); ?>/images/wooms_connect_lp/header_img@2x.jpg" alt="">
			</picture>
		</div>
		<div class="page-header-read">
			<div class="page-header-read__inner">
				<div class="page-header-read__obi"><strong>排出事業者向け</strong></div>
				<h2 class="page-header-read__title">
					<strong>資源・廃棄物管理の「見える化」革新</strong>
					<img src="<?php echo get_template_directory_uri(); ?>/images/wooms_connect_lp/header_title.svg" alt="WOOMS Connect">
				</h2>
				<div  class="page-header-read__text">
					<p>廃棄物の見える化サービスで、お客様の廃棄物管理業務を最適化。さらに廃棄物の中から新たな資源価値を創造し、コストと環境負荷を軽減します。<br>
					また、生まれた余力を活用して複数事業者による共創など、新たな施策の企画・実行をサポートします。</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="sec sec--wrap">
	<div class="sec__nav2">
		<div class="sidebar2">
			<div class="sidebar2__top">
				<a href="#">
					<img src="<?php echo get_template_directory_uri(); ?>/images/icon_backtotop_txt.svg" alt="back to top">
					<img src="<?php echo get_template_directory_uri(); ?>/images/icon_backtotop.svg" alt="">
				</a>
			</div>
		</div>
	</div>
	<div>
		<div class="sec__main">
			<div class="sec__nav">
				<div class="sidebar">
					<a href="#contact" class="sidebar__contact">
						<img src="<?php echo get_template_directory_uri(); ?>/images/icon_email.svg" alt=""><img src="<?php echo get_template_directory_uri(); ?>/images/icon_contact_txt.svg" alt="">
					</a>
				</div>
			</div>
			<div class="sec__contents">
				<section class="sec__service" id="service">
					<header class="con__header con__header--mt">
						<h3 class="h--style-01 h--style-01-green">SERVICE</h3>
						<p class="copy">サービス</p>
						<p class="read">サステナブル経営や環境マネジメントの課題である脱炭素の実現には、<br class="pc">エネルギー対策だけではなく資源循環（廃棄物/資源化対策）も効果的です。<br>WOOMSはお客様とともに成果にコミットし、お客様の現在に最適なサービスを提供します。</p>
					</header>
					<section class="sec__contents">
						<div class="con__service-01">
							<div class="container">
								<ol class="ol-style--circle">
									<li class="color-box" data-a="fade-up">
										<h4><div><span>現状把握・戦術策定のための</span>コンサルティング</div></h4>
										<div class="color-box--white">
											<ul class="list--square">
												<li>
													<dl>
														<dt><strong>現状把握</strong></dt>
														<dd>
															<p>資源化の状況、オペレーション、コスト、コンプラなど気になる観点で診断いたします。</p>
															<small>※サンプル調査による診断は無料です。</small>
														</dd>
													</dl>
												</li>
												<li>
													<dl>
														<dt><strong>戦術策定</strong></dt>
														<dd>
															<p>資源化率、Scope3などの目標達成にむけた施策の立案をサポートします。</p>
														</dd>
													</dl>
												</li>
												<li>
													<dl>
														<dt><strong>体制整備</strong></dt>
														<dd>
															<p>戦術を実行するためのオペレーションの最適化を提案します。</p>
														</dd>
													</dl>
												</li>
											</ul>
										</div>
									</li>
									<li class="color-box" data-a="fade-up" data-a-pc-delay="200">
										<h4><div><span>業務最適化のための</span>伴走型業務支援</div></h4>
										<div class="color-box--white">
											<ul class="list--square">
												<li>
												<strong>排出量の見える化</strong>
												</li>
												<li>
													<dl>
														<dt><strong>契約書・許可証の一元管理</strong></dt>
														<dd>
															<small>※クラウドサービスを提供</small>
														</dd>
													</dl>
												</li>
												<li>
													<strong>電子マニフェスト導入・運用</strong></dt>
												</li>
												<li>
													<strong>請求支払おまとめ</strong></dt>
												</li>
												<li>
													<strong>廃棄物事業者との窓口業務</strong></dt>
												</li>
												<li>
													<strong>行政対応支援</strong></dt>
												</li>
												<li>
													<strong>PDCAサイクルの支援</strong></dt>
												</li>
											</ul>
										</div>
									</li>
								</ol>
							</div>
						</div>
					</section>
					<section class="sec__contents">
						<div class="con__service-02">
							<div class="container">
								<div class="con__header con__header--mt">
								<h4 class="copy fc--orange">廃棄物・資源化<br class="sp">無料診断サービス</h4>
								<p class="read">サステナブル経営実践のためのファーストステップは、<br class="tb">排出品目・量と処理方法・事業者の把握です。<br class="pc">
								経験豊富なプロが約3ヶ月間でお客様の資源・廃棄物処理業務を診断します。</p>
								</div>
								<div class="content" data-a="fade-up">
									<ol class="ol-style--icon-flow">
										<li class="color-box" data-a="fade-up">
											<h4><div>STEP</div><img src="<?php echo get_template_directory_uri(); ?>/images/service/icon_mushimegane.svg" alt=""></h4>
											<div class="color-box--white">
												<h5>見える化調査</h5>
												<ul class="list--square">
													<li>
														<strong>排出品目調査</strong>
													</li>
													<li>
														<strong>排出量調査</strong>
													</li>
														<li>
														<strong>廃棄物契約内容調査</strong>
													</li>
												</ul>
											</div>
											<small>※許可業者・処理施設を把握します</small>
										</li>
										<li class="color-box" data-a="fade-up" data-a-pc-delay="200">
											<h4><div>STEP</div><img src="<?php echo get_template_directory_uri(); ?>/images/service/icon_haguruma.svg" alt=""></h4>
											<div class="color-box--white">
												<h5>見える化検証</h5>
												<ul class="list--square">
													<li>
														<strong>リサイクル・有価売却検証</strong>
													</li>
													<li>
														<strong>ボリューム把握・ルート検証</strong>
													</li>
														<li>
														<strong>許可業者選定・処理施設見直し</strong>
													</li>
												</ul>
											</div>
											<small>※現地訪問調査を行う場合もあります</small>
										</li>
										<li class="color-box" data-a="fade-up" data-a-pc-delay="400">
											<h4><div>STEP</div><img src="<?php echo get_template_directory_uri(); ?>/images/service/icon_lecture.svg" alt=""></h4>
											<div class="color-box--white">
												<h5>調査・検証結果報告</h5>
												<ul class="list--square">
													<li>
														<strong>社内業務効率化の提案</strong>
													</li>
													<li>
														<strong>廃棄物処理業務改善策の提案</strong>
													</li>
												</ul>
											</div>
											<small>※必要に応じて、システム活用も提案します</small>
										</li>
									</ol>
									<div class="content__bottom">
										<div>
											<strong class="fc--green">無料診断には以下の情報提供が必要となります。</strong>
											<p><span>契約内容、排出量、請求情報など・</span><span>必要に応じ機密保持契約の締結</span></p>
										</div>
										<div>
										<strong class="fc--green">原則排出量100t/年以上の事業者様が対象となります。</strong>
										</div>
									</div>

									<div class="nav-contact">
										<a href="#contact" class="btn--contact"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_email.svg" alt=""><div><span>無料診断の</span>お問い合わせはこちら</div></a>
									</div>
								</div>
								
							</div>
						</div>
					</section>
				</section>
				<section class="sec__flow" id="flow">
					<div class="con__flow">
						<header class="con__header con__header--mt">
							<h3 class="h--style-01 h--style-01-green">FLOW</h3>
							<p class="copy">導入の流れ</p>
							<p class="read">各ステップごとに状態診断を行いながら、目標達成まで伴走します。</p>
						</header>
						<div class="splide" id="splide-flow" data-a="fade-up">
							<div>
								<div class="splide__track">
									<ul class="splide__list">
										<li class="splide__slide"><img src="<?php echo get_template_directory_uri(); ?>/images/flow/flow_01.svg" alt="データ化・見える化（母数の把握）（定点）"></li>
										<li class="splide__slide"><img src="<?php echo get_template_directory_uri(); ?>/images/flow/flow_02.svg" alt="目標値設定"></li>
										<li class="splide__slide"><img src="<?php echo get_template_directory_uri(); ?>/images/flow/flow_03.svg" alt="データ化・見える化（母数、係数管理）（継続）"></li>
										<li class="splide__slide"><img src="<?php echo get_template_directory_uri(); ?>/images/flow/flow_04.svg" alt="オペレーションの最適化"></li>
										<li class="splide__slide"><img src="<?php echo get_template_directory_uri(); ?>/images/flow/flow_05.svg" alt="新たなリサイクルプランの企画・実行"></li>
									</ul>
								</div>
								<div class="splide__nav">
									<div class="splide__arrows">
										<div><button class="splide__arrow splide__arrow--prev"></button></div>        
										<ul class="splide__pagination  active"></ul>
										<div><button class="splide__arrow splide__arrow--next"></button></div>
									</div>                          
								</div>                                   
							</div>
						</div> 
					</div>
				</section>
				<section class="sec__case-study" id="case-study">
					<div class="con__case-study">
						<header class="con__header con__header--mt">
							<h3 class="h--style-01 h--style-01-green">CASE STUDY</h3>
							<p class="copy">導入事例</p>
						</header>
					</div>
					<div class="con__case-study">
							<div class="container">
								<ol class="ol-style--has-col2">
									<li class="color-box" data-a="fade-up">
										<h4><div>CASE STUDY</div>食品工場（コンビニなどの食品製造）</h4>
										<div class="color-box--white">
											<div class="color-box--white__col2">
												<dl>
													<dt><strong>ソリューション</strong></dt>
													<dd>
														<p>食品製造に使用する型紙が大量に捨てられており、その半数は食品残さが付着していない綺麗な状態であることに着目。リサイクルニーズに合った廃棄物処理業者様をご紹介し、型紙をMIXペーパーとして再生資源にしました。</p>
													</dd>
												</dl>
												<dl>
													<dt><strong>成果</strong></dt>
													<dd>
														<p>一般廃棄物の排出量が半減したため、リサイクル率が大幅に向上。また、一般廃棄物の処分費の削減、MIXペーパーの有価買取への切り替えを実現することで、廃棄物処理費用も大幅削減しました。</p>
													</dd>
												</dl>
											</div>
										</div>
									</li>
									<li class="color-box" data-a="fade-up">
										<h4><div>CASE STUDY</div>スーパー運営</h4>
										<div class="color-box--white">
											<div class="color-box--white__col2">
												<dl>
													<dt><strong>ソリューション</strong></dt>
													<dd>
														<p>廃棄物会社の窓口を代行し、各店舗を担当している廃棄物処理会社から全国300店舗分の廃棄物処理量データを取りまとめました。 また、データを一元的・継続的に管理可能なシステムを導入し、タイムリーに処理量を把握できる体制を構築しました。</p>
													</dd>
												</dl>
												<dl>
													<dt><strong>成果</strong></dt>
													<dd>
														<p>リサイクル率やScope3算定が可能になると共に、各行政に提出する法定書類作成にもデータを活用することで、業務効率が向上しました。創出された余力で、目標設定や達成のための施策立案、そのための予算組みが可能となりました。  </p>
													</dd>
												</dl>
											</div>
										</div>
									</li>
									<li class="color-box" data-a="fade-up">
										<h4><div>CASE STUDY</div>共創による資源化推進​のための取り組み</h4>
										<div class="color-box--white">
											<div class="color-box--white__col2">
												<dl>
													<dt><strong>ソリューション</strong></dt>
													<dd>
														<p>数社でリサイクルを実施し、回収ルートを構築することで、収集車の積載効率を上げ、運搬コストを下げる施策を立案します現在、複数の地域にて、食品などの特定の品目でのモデル実証を計画しております。さまざまな共創パートナーと共に、このような取り組みを実行していきます。</p>
													</dd>
												</dl>
												<div>
													<div class="sp-horizontal-scroll">
														<img src="<?php echo get_template_directory_uri(); ?>/images/case_study/img_0101.svg" alt="" class="sp-horizontal-scroll__main">
													</div>
													<div class="sp-horizontal-scroll__icon">
															<img src="<?php echo get_template_directory_uri(); ?>/images/icon-horizontal-scroll.svg" alt="横スクロールできます">
													</div>
												</div>
											</div>
										</div>
									</li>
								</ol>
							</div>
						</div>
				</section>

				<section class="sec__faq" id="faq">
					<div class="con__faq">
						<header class="con__header con__header--mt">
							<h3 class="h--style-01 h--style-01-green">FAQ</h3>
							<p class="copy">よくある質問</p>
						</header>
					</div>
					<div class="con__faq">
						<div class="container" data-a="fade-up">
							<ul class="faq">
								<li class="faq__list">
									<div class="faq__q">どのような企業が利用できるサービスですか？<span></span></div>
									<div class="faq__a">
										<div>
											<p>企業の規模や業種を問わず、廃棄物の資源化に向けて、次のような課題をお持ちの企業様にご利用いただいております。</p>
											<ul class="list--dots">
												<li>自社で排出している廃棄物の量や廃棄コスト、資源化率など、現状を把握したい</li>
												<li>サステナブル経営の実現に向けて、目標設定、目標達成に向けた計画を策定したい</li>
												<li>廃棄物の資源化率を向上させたい、処理コストを削減したい</li>
												<li>電子マニフェストを導入したい</li>
											</ul>
										</div>
									</div>
								</li>
								<li class="faq__list">
									<div class="faq__q">具体的なサービス内容はどのようなものですか？<span></span></div>
									<div class="faq__a">
										<div>
											<ul class="list--dots">
												<li>廃棄物管理業務の事務委託サービス（アウトソーシング業務）</li>
												<li>廃棄物の資源化・コスト削減・業務効率化などの最適化に向けた、現状把握・戦術策定のためのコンサルティング業務</li>
											</ul>
										</div>
									</div>
								</li>
								<li class="faq__list">
									<div class="faq__q">他社との違いはどのようなものですか？<span></span></div>
									<div class="faq__a">
										<div>
											<ul class="list--dots">
												<li>全国で1,000社以上の廃棄物収集・処理事業者様とネットワークを保有していることから、企業様のニーズにあった業者様をご紹介できます</li>
												<li>リサイクル率向上の施策や、法律面やコストなど複合的な側面からベストな処理体制の構築の立案から実行支援まで行います</li>
												<li>企業様単体では、量やルートの問題で難しかったリサイクルを、弊社の別のお客様とまとめた回収ルートで効率化することで実現します</li>
												<li>排出事業者さまに寄り添った、ベストな提案ができます</li>
											</ul>
										</div>
									</div>
								</li>
								<li class="faq__list">
									<div class="faq__q">廃棄物管理システムの利用はできますか？<span></span></div>
									<div class="faq__a">
										<div>
											<p>クラウドシステム［4-site］を提供させていただきます。<br>
											システム上で各事業所の排出量を確認することができます。行政報告に必要な廃棄量の確認や、リサイクル目標を立てるための根拠として活用できます。<br>
											また、システム上で企業様と廃棄物業者様の契約書や許可証を管理/確認できますが、弊社で随時更新するため、ご利用企業様による更新の手間はございません。</p>
										</div>
									</div>
								</li>
								<li class="faq__list">
									<div class="faq__q">料金体系はどのようなものですか？<span></span></div>
									<div class="faq__a">
										<div>
											<p>事業所の状況を確認をさせて頂いた上でのご提示となりますが、お客様の現状課題とご要望に応じて月額契約と処分量や頻度に応じた従量制契約サービスを組み合わせてご提案いたします。</p>
										</div>
									</div>
								</li>
								<li class="faq__list">
									<div class="faq__q">トライアルはできますか？<span></span></div>
									<div class="faq__a">
										<div>
											<p>まずは、一部の排出拠点をご選択いただき、廃棄物・資源化無料診断サービスをご利用できます。経験豊富なプロが約3ヶ月間でお客様の資源・廃棄物処理業務を診断します。</p>
										</div>
									</div>
								</li>
							</ul>	
						</div>
					</div>
				</section>
			</div>
			
		</div>
		<div class="sec__contact-form" id="contact">
			<section class="con__contact-form">
				<header class="sec__header con__header--mt">
					<h3 class="h--style-01 h--style-01-green">CONTACT</h3>
					<p class="copy">お問い合わせ</p>
				</header>
				<div class="con__contact-form">
					<div class="container">
						<ul class="list--dots">
							<li>お問い合わせの内容によっては、お時間を頂戴する場合がございます。</li>
							<li>提案やご紹介のメールに対しましては、お返事を差し上げられない場合がございます。</li>
						</ul>
						<div class="contact-form-wrap">
						<?php echo do_shortcode('[mwform_formkey key="4959"]'); ?>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<span class="BgPic"></span>
</div>


<?php endwhile;?>

</article>

<?php get_footer(); ?>
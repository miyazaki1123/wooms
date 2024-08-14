import { anchorLink } from "./anchorLink.js";
import { navigation } from "./navigation.js";
import { tabContents } from "./tabContents.js";
import { slideToggle } from "./slideToggle.js";
import { agreeCheck,mailform } from "./mailform.js";

const BRAKE_WIDTH = 767,
PC = '(min-width:' + (BRAKE_WIDTH + 1) + 'px)',
SP = '(max-width:' + BRAKE_WIDTH + 'px)';

const MQ = window.matchMedia("(min-width: "+(BRAKE_WIDTH + 1)+"px)");

function component_commonGetQueryVariable(name) {
  const params = new URLSearchParams(window.location.search);
  return params.get(name);
}

const setFillHeight = function() {
  const vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
  document.documentElement.style.setProperty('--sc', `${vh}`);
}
const setFillHeightFix = function() {
  const vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vhFix', `${vh}px`);
  document.documentElement.style.setProperty('--scFix', `${vh}`);
}
$(function () {
  //メニューオープンクローズ
  $("#menu-opener").click(function () {
    $(".mainmenuwrap").toggleClass("opened");
    $("#menu-opener").toggleClass("opened");
			$("body").toggleClass("opened");
    //console.log("clicked");
  });

  $("a.gototop[href^=#]").click(function () {
    // スクロールの速度
    var speed = 1000; // ミリ秒
    // アンカーの値取得
    var href = $(this).attr("href");
    // 移動先を取得
    var target = $(href == "#" || href == "" ? "html" : href);
    // 移動先を数値で取得
    var position = target.offset().top;
    // スムーススクロール
    $("body,html").animate({ scrollTop: position }, speed, "swing");
    //$($.browser.safari ? 'body' : 'html').animate({scrollTop:position}, speed, 'swing');
    return false;
  });

  
    $('article.activation-page a[href^="#"]').click(function(){
      //スクロールのスピード
      var speed = 0;
      //リンク元を取得
      var href= $(this).attr("href");
      //リンク先を取得
      var target = $(href == "#" || href == "" ? 'html' : href);
      //リンク先までの距離を取得
      var position = target.offset().top;
      //スムーススクロール
      $("html, body").animate({scrollTop:position}, speed, "swing");
      return false;
    });

  //商品ページの横並びul高さ揃え
  $(".xtokucho ul,ul.tokucho").each(function () {
    rep = 0;
    $(this)
      .children()
      .each(function () {
        var itemHeight = parseInt($(this).css("height"));
        if (itemHeight > rep) {
          rep = itemHeight;
        }
      });
    $(this).children().css({ height: rep });
  });

  //ヘッダー カテゴリタイトル
  $("p.category-title").each(function () {
    var width = $(this).width();
    if (width >= 450) {
      $(this).addClass("long-word");
    }
  });

  /*IE等にて画像比率が崩れる問題を暫定処理(2017/08/03)*/
  /*.main_pic img,body.page-parent .products-list_wrap > div img*/
  $(".bread_wrap.child a img").each(function () {
    w = $(this).attr("width");
    h = $(this).attr("height");
    if (w > h) {
      $(this).css("width", "134px");
      $(this).css("height", "auto");
    } else {
      $(this).css("height", "110px");
      $(this).css("width", "auto");
    }
  });
  $(".main_pic img,body.page-parent,.products-list_wrap > div img").each(
    function () {
      w = $(this).width();
      h = $(this).height();
      if (w > h) {
        $(this).css("width", "390px");
        $(this).css("height", "auto");
      }
    }
  );

  //◇ニュース部分

  //最大件数 位置情報付与
  $(".news_list").each(function () {
    var NewsLength = $(this).find("li").length - 3;
    var NewsLengthMb = $(this).find("li").length - 1;
    if (NewsLength < 0) {
      var NewsLength = 0;
    }
    if (NewsLengthMb < 0) {
      var NewsLengthMb = 0;
    }
    $(this).attr("length", NewsLength);
    $(this).attr("lengthMb", NewsLengthMb);
    $(this).attr("position", 0);
    $(this).attr("positionMb", 0);
  });

  $(".news_list:first-child()").addClass("Visible");

  //ニュース横スクロール用クラス切り換え
  $(".NewsListWrap > p").click(function () {
    //スクロール対象を選定 現在位置とスクロール上限取得
    var MoveLength = $(this).parents('.NewsListWrap').find(".news_list.Visible").attr("length");
    var MovePosition = $(this).parents('.NewsListWrap').find(".news_list.Visible").attr("position");
    var MoveLengthMb = $(this).parents('.NewsListWrap').find(".news_list.Visible").attr("lengthMb");
    var MovePositionMb = $(this).parents('.NewsListWrap').find(".news_list.Visible").attr("positionMb");

    if ($(window).width() <= 750) {
      //左ボタンをクリックされた場合
      if ($(this).hasClass("MoveLeft")) {
        //左に振り切っていない場合減算
        if (MovePositionMb != 0) {
          MovePositionMb = Number(MovePositionMb) - 1;
          $(this).find(".news_list.Visible").attr("positionMb", MovePositionMb);
        }

        //右ボタンをクリックされた場合
      } else if ($(this).hasClass("MoveRight")) {
					//console.log($(this).parents('.NewsListWrap').find('.PostWrap').length)
        //右に振り切ってない場合加算
        if (MovePositionMb != MoveLengthMb) {
          MovePositionMb = Number(MovePositionMb) + 1;
          $(this).parents('.NewsListWrap').find(".news_list.Visible").attr("positionMb", MovePositionMb);
        }
      }
    } else {
      //左ボタンをクリックされた場合
      if ($(this).hasClass("MoveLeft")) {
        //左に振り切っていない場合減算
        if (MovePosition != 0) {
          MovePosition = Number(MovePosition) - 1;
          $(this).parents('.NewsListWrap').find(".news_list.Visible").attr("position", MovePosition);
        }

        //右ボタンをクリックされた場合
      } else if ($(this).hasClass("MoveRight")) {
					//console.log($(this).parents('.NewsListWrap').find('.PostWrap').length)
        //右に振り切ってない場合加算
        if (MovePosition != MoveLength) {
          MovePosition = Number(MovePosition) + 1;
          $(this).parents('.NewsListWrap').find(".news_list.Visible").attr("position", MovePosition);
        }
      }
    }
  });

  $(".LRbtn > p").click(function () {
	
    //スクロール対象を選定 現在位置とスクロール上限取得
    var MoveLength = $(this).parents('.mbScroller').prev('.NewsListWrap').find(".news_list.Visible").attr("length");
    var MovePosition = $(this).parents('.mbScroller').prev('.NewsListWrap').find(".news_list.Visible").attr("position");
    var MoveLengthMb = $(this).parents('.mbScroller').prev('.NewsListWrap').find(".news_list.Visible").attr("lengthMb");
    var MovePositionMb = $(this).parents('.mbScroller').prev('.NewsListWrap').find(".news_list.Visible").attr("positionMb");

    if ($(window).width() <= 768) {
      //左ボタンをクリックされた場合
      if ($(this).hasClass("MoveLeft")) {
        //左に振り切っていない場合減算
        if (MovePositionMb != 0) {
          MovePositionMb = Number(MovePositionMb) - 1;
          $(this).parents('.mbScroller').prev('.NewsListWrap').find(".news_list.Visible").attr("positionMb", MovePositionMb);
        }

        //右ボタンをクリックされた場合
      } else if ($(this).hasClass("MoveRight")) {
					//console.log($(this).parents('.NewsListWrap').find('.PostWrap').length)
        //右に振り切ってない場合加算
        if (MovePositionMb != MoveLengthMb) {
          MovePositionMb = Number(MovePositionMb) + 1;
          $(this).parents('.mbScroller').prev('.NewsListWrap').find(".news_list.Visible").attr("positionMb", MovePositionMb);
        }
      }
    } else {
      //左ボタンをクリックされた場合
      if ($(this).hasClass("MoveLeft")) {
        //左に振り切っていない場合減算
        if (MovePosition != 0) {
          MovePosition = Number(MovePosition) - 1;
          $(this).parents('.mbScroller').prev('.NewsListWrap').find(".news_list.Visible").attr("position", MovePosition);
        }

        //右ボタンをクリックされた場合
      } else if ($(this).hasClass("MoveRight")) {
					//console.log($(this).parents('.NewsListWrap').find('.PostWrap').length)
        //右に振り切ってない場合加算
        if (MovePosition != MoveLength) {
          MovePosition = Number(MovePosition) + 1;
          $(this).parents('.mbScroller').prev('.NewsListWrap').find(".news_list.Visible").attr("position", MovePosition);
        }
      }
    }
  });

  //カテゴリ切り換え機能
  $(".select_type li").click(function () {
		$(".select_type li").removeClass("Visible");
		$(this).addClass("Visible");
    var TypeCat = $(this).attr("category");
    $(this).parents('.NewsSelector').next('.NewsListWrap').find('*[category!="' + TypeCat + '"]').removeClass("Visible");
    $(this).parents('.NewsSelector').next('.NewsListWrap').find('*[category="' + TypeCat + '"]').addClass("Visible");
  });

  $("select.MbScSl").change(function () {
    var TypeCat = $(this).val();
    $('*[category!="' + TypeCat + '"]').removeClass("Visible");
    $('*[category="' + TypeCat + '"]').addClass("Visible");
  });

  //画像サイズベースの縦横比調整
  $(window).on("load", function () {
    $(".fullthumb").each(function () {
      var ImgWidth = $(this).innerWidth();
      var ImgHeight = $(this).innerHeight();
      if (ImgWidth > ImgHeight) {
        $(this).addClass("WhScale");
      } else if (ImgHeight > ImgWidth) {
        $(this).addClass("HwScale");
      }
    });
		
		
	
	$('.NewsPageListWrap>div').each(function (index) {	
		if($(this).find('li').length<=15){
			//console.log($(this).attr('class')+' '+$(this).find('li').length)
			$(this).children('.loadMoreBtn').css('display','none');
			
		}
	});
		
  });

  //Q&Aアコーディオン

  $(window).delay(10).on("load resize orientationchange", function () {
    var Wwidth = $(window).width();
      $(".Q-AWrap").each(function () {
        var QHeight = $(this).find(".QuestionOpener").height();
        var SUMHeight = (220 - QHeight) / 2;
        var SUMHeightMB = (151 - QHeight) / 2;
        
        $(this).height(QHeight);

        if(Wwidth > 768){
          $(this).css('padding-top', SUMHeight);
          $(this).css('padding-bottom', SUMHeight);
          $(this).find(".OpenPlus").css('top', -80);
          $(this).find(".CloseMinus").css('top', -80);
        } else if(Wwidth >= 479) {
          $(this).css('padding-top', SUMHeight);
          $(this).css('padding-bottom', SUMHeight);
          $(this).find(".OpenPlus").css('top', SUMHeight * -1);
          $(this).find(".CloseMinus").css('top', SUMHeight * -1);
        } else {
          $(this).css('padding-top', SUMHeightMB);
          $(this).css('padding-bottom', SUMHeightMB);
          $(this).find(".OpenPlus").css('top', (SUMHeightMB + 15) * -1);
          $(this).find(".CloseMinus").css('top', (SUMHeightMB + 15) * -1);
        }
      });
  });

  $(".QuestionOpener").click(function () {
    var QHeight = $(this).height();
    var QHeight2 = $(this).next(".AnswarArea").height();
    if ($(this).parents(".Q-AWrap").hasClass("Q-AOpen")) {
      $(this).parents(".Q-AWrap").height(QHeight);
      $(this).parents(".Q-AWrap").removeClass("Q-AOpen");
    } else {
      $(this)
        .parents(".Q-AWrap")
        .height(QHeight + QHeight2 + 50);
      $(this).parents(".Q-AWrap").addClass("Q-AOpen");
    }
  }).css('cursor','pointer');

  // パララックス
  let bgflag = 0
  function BgPicFUncc(){
    $(".BgPic").each(function () {
      var target1 = $(".BgPic");
      var targetPosOT1 = target1.offset().top;
      var scrollY = $(window).scrollTop();
      target1.css("top", (targetPosOT1 - scrollY) * 0.3 + "px");
    });
  }
  window.addEventListener("load", function(){
    BgPicFUncc();
  });
  window.addEventListener("scroll", function(){
    BgPicFUncc();
  });
  $(window).on("scroll load", function () {
    $(".BeyondArea").each(function () {
      var target12 = $(".BeyondArea");
      var targetPosOT12 = target12.offset().top;
      var targetFactor2 = 0.5;
      var windowH2 = $(window).height();
      var scrollYStart12 = targetPosOT12 / 3;

      var scrollY2 = $(window).scrollTop();
      if (scrollY2 > scrollYStart12 * 2) {
        $(".BeyondArea").addClass("Visible");
      }
    });
  });

  $(window).on("load scroll", function () {
    $(".OverAnm").each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight + 400) {
        $(this).addClass("Visible");
      }
    });

    var Wwidth = $(window).width();
    if(Wwidth > 767){
      $(".normalFadeIn").each(function () {
        var elemPos = $(this).offset().top;
        var scroll = $(window).scrollTop();
        var windowHeight = $(window).height();
        if (scroll > elemPos - windowHeight + 200) {
          $(this).addClass("Visible");
        }
      });
    } else {
      $(".normalFadeIn").each(function () {
        var elemPos = $(this).offset().top;
        var scroll = $(window).scrollTop();
        var windowHeight = $(window).height();
        if (scroll > elemPos - windowHeight) {
          $(this).addClass("Visible");
        }
      });

    }
  });

  //$('.NewsPageListWrap').on('load',function(){
  //	$(this).height($('.NewsPageListWrap .Visible').height());
  //});

  $(".CategoryChanger li").click(function () {
    var newscat = $(this).attr("category");
    $(".CategoryChanger li").removeClass("Visible");
    $(this).addClass("Visible");
    $(".NewsPageListWrap > div").each(function () {
      if ($(this).attr("category") == newscat) {
        $(this).addClass("Visible");
        //$('.NewsPageListWrap').height($(this).height());
      } else {
        $(this).removeClass("Visible");
      }
    });
  });

  $(".yarpp-related").insertAfter(".ContentWrap");

  $(window).on("load scroll", function () {
    var countElm = $(".count"),
      countSpeed = 0.3;

    countElm.each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight) {
        var self = $(this),
          countMax = self.attr("data-num"),
          thisCount = self.text(),
          countTimer;
        //console.log("timer!");

        function timer() {
          countTimer = setInterval(function () {
            var countNext = thisCount--;
            self.text(countNext);

            if (countNext == countMax) {
              clearInterval(countTimer);
            }
          }, countSpeed);
        }
        timer();
      }
    });

    var countElm = $(".countup"),
      countSpeed = 0.3;

    countElm.each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight) {
        var self = $(this),
          countMax = self.attr("data-num"),
          thisCount = self.text(),
          countTimer;
        ////console.log("timer!");

        function timer() {
          countTimer = setInterval(function () {
            var countNext = thisCount++;
            self.text(countNext);

            if (countNext == countMax) {
              clearInterval(countTimer);
            }
          }, countSpeed);
        }
        timer();
      }
    });

    var countElm = $(".countup"),
      countSpeed = 0.3;

    countElm.each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight) {
        var self = $(this),
          countMax = self.attr("data-num"),
          thisCount = self.text(),
          countTimer;
        ////console.log("timer!");

        function timer() {
          countTimer = setInterval(function () {
            var countNext = thisCount++;
            self.text(countNext);

            if (countNext == countMax) {
              clearInterval(countTimer);
            }
          }, countSpeed);
        }
        timer();
      }
    });

    var countElm = $(".countlow"),
      countSpeed = 150;

    countElm.each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight) {
        var self = $(this),
          countMax = self.attr("data-num"),
          thisCount = self.text(),
          countTimer;
        ////console.log("timer!");

        function timer() {
          countTimer = setInterval(function () {
            var countNext = thisCount--;
            self.text(countNext);

            if (countNext == countMax) {
              clearInterval(countTimer);
            }
          }, countSpeed);
        }
        timer();
      }
    });

    var countElm = $(".countdot"),
      countSpeed = 20;

    countElm.each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight) {
        var self = $(this),
          countMax = self.attr("data-num"),
          thisCount = self.text(),
          countTimer;
        ////console.log("timer!");

        function timer() {
          countTimer = setInterval(function () {
            var countNext = thisCount--;
            self.text(countNext / 10);

            if (countNext == countMax) {
              clearInterval(countTimer);
            }
          }, countSpeed);
        }
        timer();
        $(".countdot").removeClass("countdot");
      }
    });
  });

  $(window).on('load',function(){
    var urlhash = $(location).attr('hash');
    if(urlhash == '#interview'){
      $('li[category="interviewList"]').trigger("click");
    }
  });

  $('label').click(function(){
    if($('[value="お問い合わせ"]').prop('checked')){
      $(".typeif").addClass("Visible");
    }else{
      $(".typeif").removeClass("Visible");
    }
  });
  $(window).load(function(){
    $('form').each(function(){
    if($('[value="お問い合わせ"]').prop('checked')){
      $(".typeif").addClass("Visible");
    }
    });
  });

  $('.ytbtrg').click(function(){
    $('.modal-youtube').addClass('visible');
  });

  $('.modal-closer').click(function(){
    $('.modal-youtube').removeClass('visible');
  });

  $('ul#menu-headmenu #menu-item-5 > a').click(function(event){
    event.preventDefault();
  });
  $('ul#menu-headmenu #menu-item-6 > a').click(function(event){
    event.preventDefault();
  });
	if($('.Add--BgPicArea').length){
		 $('.Add--BgPicArea').append('<span class="BgPic" style="top: 106.552px;"></span>');
		
	}
		if($('.NewsListWrap--pc').length){
			//console.log($('.NewsListWrap--pc .PostWrap').length);
				if($('.NewsListWrap--pc .PostWrap').length <= 3){
				$('.btn--more-plus').addClass('pc');
			}
	}

	$(document).on('click','.btn--more-plus', function () {
   $(this).toggleClass('active');
		//console.log($(this).hasClass('active'));
			if($(this).hasClass('active') == true){
			 $(this).html('<i></i>閉じる');
			 }else{
				 $(this).html('<i></i>もっと見る');
			 }
			$('.NewsListWrap--pc').toggleClass('active');
  });
	//お知らせ URLクエリパラメータあり
	const G_NEWS_QUERY = component_commonGetQueryVariable('cat');
	if($('.select_type').length && G_NEWS_QUERY){
	 //console.log(G_NEWS_QUERY)
		
		$(".select_type li").removeClass("Visible");
		$('.border--' + G_NEWS_QUERY).addClass("Visible");
		
    $('.NewsPageListWrap >div').removeClass("Visible");
    $('.NewsPageListWrap').find('*[category="' + G_NEWS_QUERY + 'List"]').addClass("Visible");
		
	}
	const G_NEWS_TAG = component_commonGetQueryVariable('tag');
	
	if(G_NEWS_TAG){
		 $('.NewsSelector').addClass('hasTag');
		$('.Newslink.hasTag').addClass('active');
	 }
	
	if($('.ma-jin-obi').length == 3){
		console.log($('.ma-jin-obi').length);
		 $('.ma-jin-obi:nth-child(3)').addClass('col2');
	}
	
	
	$('.kaigyou .mwform-checkbox-field-text').each(function () {	
  let text = $(this).html();
  	$(this).html(text.replace('（', '<br>（'));
	});

	animation();
	
	
	window.addEventListener("touchstart", function (event) {
  //console.log(event.target)
		//$('#menu-item-132').text(event.target.className)
  });
});


window.addEventListener('load', function(){
  document.querySelector('body').classList.add('active');

  /* アンカーリンク */
  anchorLink(MQ.matches);

  /* メールフォーム */
  if(document.querySelector('contact-form-wrap')){
    mailform();
  }
});


/* 個人情報チェック */
document.addEventListener("DOMContentLoaded", function() {
  if(document.getElementById('privacyPolicyAgreement-1')){
    agreeCheck();
  }
});
if(document.querySelectorAll('.menu_inner__flex').length > 0){
  navigation();
}


function isTouchDevice() {
  return ('ontouchstart' in window || navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0);
};
function sideNav(){
  let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  if(scrollTop > (document.querySelector('.page-header').clientHeight / 1.3)){
    document.querySelector('.sidebar2__top').classList.add('active');
  }else{
    document.querySelector('.sidebar2__top').classList.remove('active');
  }
}
if(document.querySelectorAll('.sidebar').length > 0){
  window.addEventListener("DOMContentLoaded", function(){
    sideNav();
  });
  window.addEventListener("scroll", function(){
    sideNav();
  });
   const sidebar = new StickySidebar('.sec__nav', {
    containerSelector: '.sec__main',
    innerWrapperSelector: '.sidebar',
    topSpacing: 240,
   })
}

function splide(){
  if(document.querySelector('#splide-flow')){
    let splide_flow = new Splide('#splide-flow', {
      fixedWidth : '28.5vw',
      focus:'center',
      trimSpace: false,
      focus    : 'center',
      perPage  : 3,
      flickMaxPages  : 1,
      breakpoints: {
        1180: {
          fixedWidth : '34vw',
          perPage: 2,
        },
        768: {
          fixedWidth : '110vw',
          perPage: 1,
        },
      }
    });
    splide_flow.mount();
  }
}
splide();
faqFunc();
function faqFunc(){
  document.querySelectorAll('.faq__q').forEach(function(index,num){
    let elem = document.querySelectorAll('.faq__a')[num];
    index.addEventListener('click',function(){
      slideToggle(elem,index,300,false,'block');
    });
  });
}


let scrollStartX = 0;
let scrollStartY = 0;
if(!MQ.matches && document.querySelector('.sp-horizontal-scroll__icon')){
  document.querySelectorAll('.sp-horizontal-scroll').forEach(function(touchElement){
    touchElement.addEventListener("touchstart", function(event) {
      //console.log("タッチが開始されました");
      const touch = event.touches[0];
      scrollStartX = touch.clientX;
      scrollStartY = touch.clientY;
    });
    touchElement.addEventListener("touchmove", function(event) {
      const touch = event.touches[0];
      const diffX = touch.clientX - scrollStartX;
      const diffY = touch.clientY - scrollStartY;
      //console.log("タッチが移動しています");
      if (Math.abs(diffX) > Math.abs(diffY)) {
        document.querySelector('.sp-horizontal-scroll__icon').classList.add('hide');
     }
    });
  });
}

document.addEventListener('DOMContentLoaded', function () {
  const targetElement = document.querySelector('.site-footer');
  const targetElement2 = document.querySelector('.sidebar2__top');
  
  const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
          if (entry.isIntersecting) {
              // 要素がスクロール範囲に入ったらクラスを追加
              targetElement2.classList.add('active2');
              
          } else {
              // 要素がスクロール範囲から出たらクラスを削除（オプション）
              targetElement2.classList.remove('active2');
          }
      });
  }, {
      root: null, // ビューポートを基準にする
      rootMargin: '0px', // マージンを追加しない
      threshold: 0 // 要素が少しでも見えたら発火
  });
  let ticking = false;

  window.addEventListener('scroll', () => {
      if (!ticking) {
          window.requestAnimationFrame(() => {
              observer.observe(targetElement);
              ticking = false;
          });
          ticking = true;
      }
  });
  // 対象の要素を監視
});
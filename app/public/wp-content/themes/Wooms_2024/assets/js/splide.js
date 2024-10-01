export function splide(MQ) {
    if(document.querySelector('.kv__items')){
      let splide = new Splide('.kv__items',{
        type   : 'loop',
        pagination: true,
        autoplay: true,
        interval: 6000,
        speed: 1000,
        pauseOnHover: false,
        updateOnMove:true,
      });
      splide.on('mounted', function () {
        document.querySelectorAll('.splide__pagination li button').forEach(function(item) {
          var newSpan = document.createElement('span');
          // スタイルや内容をspanに設定（必要に応じて）
          // button要素の中にspanを追加
          item.appendChild(newSpan);
        });
      });
      splide.on("active", function () {
        splide.Components.Autoplay.play();
      });
      document.querySelectorAll('.page-header').forEach(function(elem){
        elem.addEventListener('mouseover', function() {
          splide.Components.Autoplay.pause();
        });
      });
      document.querySelectorAll('.page-header').forEach(function(elem){
        elem.addEventListener('mouseleave', function() {
          splide.Components.Autoplay.play();
        });
      });
      
      splide.on( 'autoplay:playing', function ( rate ) {
        //console.log( rate ); // 0-1
        //console.log(document.querySelector('.splide__pagination button span') )
        document.querySelector('.splide__pagination button.is-active span').style.transform = 'translateX(' + (-100 + Math.ceil(rate * 100)) + '%)';
      } );
      splide.mount();
      
    }
    if(document.querySelector('.news__items')){
      document.querySelectorAll('.news__items').forEach(function(elem){
        let splide = new Splide(elem,{
          type   : 'slide',
          pagination: true,
          autoplay: false,
          speed: 1000,
          perPage: 3,
          gap:50,
          padding:20,
          pauseOnHover: false,
          updateOnMove:true,
        });
        splide.mount();
      });

      
    }
}
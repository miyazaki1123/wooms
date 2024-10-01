export function pagetotop() {
  const elem = document.querySelector('.back-to-top');
  const scrollElem = document.querySelector('.scroll');
  let mv;
  let mh;
  if(document.querySelector('.kv-wrap')){
    mv = document.querySelector('.kv-wrap');
    mh = mv.clientHeight / 2;
  }else{
    mh = 400;
  }
  document.addEventListener("DOMContentLoaded", function() {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    if(scrollElem){
      if(scrollTop > 0){
        scrollElem.classList.remove('active');
      }else{
        scrollElem.classList.add('active');
      }
    }
    
    if(scrollTop > mh){
      elem.classList.add('active');
    }else{
      elem.classList.remove('active');
    }
  });
  window.addEventListener("scroll", function(){
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    if(scrollElem){
      if(scrollTop > 0){
        scrollElem.classList.remove('active');
      }else{
        scrollElem.classList.add('active');
      }
    }
    if(scrollTop > mh){
      elem.classList.add('active');
    }else{
      elem.classList.remove('active');
    }
  });
}

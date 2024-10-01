export function pulldownMenu(nav,MQ,index) {
  let timer;
  let timer2;
  let zIndex;
  let oldindex = -1;

nav.addEventListener('click',function(e){
    if ('ontouchstart' in window || navigator.maxTouchPoints) {
      if (MQ.matches) {
    if(nav.classList.contains('active')){
      nav.classList.remove('active');
    }else{
      nav.classList.add('active');
      oldindex = index;
    }
    document.querySelectorAll('.global-nav>.main-menu>li').forEach(function(e2,index2){
      if(index2 != oldindex){
        e2.classList.remove('active');
      }
    });
  } 
}
});

  nav.addEventListener('mouseenter',function(e){
    if ('ontouchstart' in window || navigator.maxTouchPoints) {
    }else{
      if (MQ.matches) {
        zIndex ++;
        nav.style.zIndex = zIndex;
          clearTimeout(timer2);
          timer = setTimeout(function () {
            nav.classList.add('active');
          }, 0);
        }
    }
  });
  nav.addEventListener('mouseleave',function(){
    if ('ontouchstart' in window || navigator.maxTouchPoints) {
    }else{
      if (MQ.matches) {
        clearTimeout(timer);
          timer2 = setTimeout(function () {
            nav.style.zIndex = 0;
            nav.classList.remove('active');
        }, 0);
        }
    }
   
  });
};
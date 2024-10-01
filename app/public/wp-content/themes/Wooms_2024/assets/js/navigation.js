
export function navigation(MQ) {
  let cnt = 0;
  let btn_toggle = document.querySelector('.nav-toggle-wrap');
  btn_toggle.addEventListener('click', function(element) {
    cnt++;
    if(cnt == 1){
      btn_toggle.classList.toggle('open');
    }
    this.classList.toggle('active');
    document.querySelector('.global-nav').classList.toggle('active');
    document.querySelector('body').classList.toggle('noscroll');
    this.children[0].children[0].classList.add('active');
    this.children[0].children[2].classList.add('active');
  });
  document.querySelector('.btn--menu-close').addEventListener('click', function(element) {
   
    btn_toggle.classList.remove('active');
    document.querySelector('.global-nav').classList.remove('active');
    document.querySelector('body').classList.remove('noscroll');
    btn_toggle.children[0].children[0].classList.remove('active');
    btn_toggle.children[0].children[2].classList.remove('active');
  });
}

document.querySelectorAll('.global-nav>li').forEach(function(btn,index){
  if(btn.querySelector('.sub-menu')){
    /*
    if (!MQ.matches) {
      pulldownMenu(btn,MQ,index);
    }
      */
  }
});

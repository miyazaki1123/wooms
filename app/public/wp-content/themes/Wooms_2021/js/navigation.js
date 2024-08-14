export function navigation() {
  let cnt = 0;
  document.querySelector('.nav-toggle-wrap').addEventListener('click', function(element) {
    cnt++;
    if(cnt == 1){
      document.querySelector('.nav-toggle-wrap').classList.toggle('open');
    }
    this.classList.toggle('active');
    document.querySelector('.menu-lp').classList.toggle('active');
    document.querySelector('body').classList.toggle('noscroll');
    this.children[0].children[0].classList.add('active');
    this.children[0].children[2].classList.add('active');
  });
}

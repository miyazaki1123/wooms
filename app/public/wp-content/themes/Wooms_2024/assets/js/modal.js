export function modal(MQ) {
 
  let modalElement;
  let startX = 0;
  let startY = 0;
  
  const urlParams = new URLSearchParams(window.location.search);
  const someParam = urlParams.get('md');

  if(someParam){
    //console.log(document.querySelectorAll('[data-m-target="'+someParam+'"]')[0].dataset)
   

    let height = document.querySelector('.site-header').clientHeight + document.querySelector('.global-nav').clientHeight+30;
    let mediaHeight;
    if (MQ) {
      mediaHeight = -height;
    }else{
      mediaHeight = -height;
    }
    
    const targetElement = document.getElementById('self-check').getBoundingClientRect().top + window.pageYOffset + mediaHeight;
    //console.log(window.pageYOffset)
    setTimeout(function () {
      window.scrollTo({
        top: targetElement,
        behavior: "smooth"
      });
    }, 300);

    openModal(document.querySelectorAll('[data-m-target="'+someParam+'"]')[0].dataset);
  }

  document.querySelectorAll('.modal-main__tabs').forEach(function(tab){
    tab.addEventListener('click', function() {
      
      setSize();
    });
  });

  if(!MQ){
    document.querySelectorAll('.img__main').forEach(function(touchElement){
      touchElement.addEventListener("touchstart", function(event) {
        //console.log("タッチが開始されました");
        const touch = event.touches[0];
        startX = touch.clientX;
        startY = touch.clientY;
      });
      touchElement.addEventListener("touchmove", function(event) {
        const touch = event.touches[0];
        const diffX = touch.clientX - startX;
        const diffY = touch.clientY - startY;
        //console.log("タッチが移動しています");
        if (Math.abs(diffX) > Math.abs(diffY)) {
          touchElement.nextElementSibling.classList.add('hide');
      } 
        
      });
    });
  }
  function setSize(){
    if(!MQ){
      startX = 0;
      startY = 0;
      document.querySelectorAll('.img__main').forEach(function(touchElement){
        touchElement.scrollTo(0,0);
      });
      document.querySelectorAll('.img__icon').forEach(function(iconElement){
        iconElement.classList.remove('hide');
      })
    }
    
    if(document.querySelectorAll('.noscroll')[0]){
      let targetElement = document.querySelectorAll('.modal__content');
      targetElement.forEach(function(element){
        if(element.clientHeight + 60 > window.innerHeight){
          //console.log(element.clientHeight + ' ' + window.innerHeight)
          //console.log('over')
          element.parentElement.classList.add('active');
         }else{
          element.parentElement.classList.remove('active');
         }
      });
      
    }
  }
  window.addEventListener('resize', function() {
    setSize();
  });
  function openModal(elem){
 //console.log(element.dataset.mTarget);
    const modal = elem.mTarget;
    //console.log(modal)
    let delete_num;
    modalElement = document.querySelectorAll('[data-m="'+modal+'"]')[0];
    document.querySelectorAll('.modal').forEach(function(e,index){
      if(e.classList.contains('active')){
        delete_num = index;
        e.classList.remove('active');
      }
      
      //e.classList.remove('active');
    })
    modalElement.classList.add('active');
    
    document.querySelector('body').classList.add('noscroll');
    if(elem.mSrc){
      if(fileType(elem.mSrc) == 'pdf'){
        DOMPdf(elem.mSrc);
      }else{
        DOMImg(elem.mSrc);
      }
      
    }else{
      //modalElement.querySelectorAll('.modal__content')[0].classList.add('activre');
    }
    setSize();
  }
  document.querySelectorAll('[data-m-target]').forEach(function(element){
    element.addEventListener('click', function(btn) {
      //console.log(element.dataset)
      openModal(element.dataset);
    });
  });
function fileType(src){
  let srcArray = src.split('.');
  //console.log(srcArray[srcArray.length - 1])
  return srcArray[srcArray.length - 1];
  
}
   if(document.querySelector('[data-m]')){
    document.querySelectorAll('.modal').forEach(function(e,index){
      /*
      e.querySelector('.close-modal').addEventListener('click', function(element) {
        document.querySelector('body').classList.remove('noscroll');
        modalElement.classList.remove('active');
        modalElement.querySelectorAll('.modal__content')[0].classList.remove('active');
        modalElement.querySelectorAll('.modal__content')[0].classList.remove('pdf');
    });
    */
      e.addEventListener('click', function(element) {
        //console.log(element.target)
        if(element.target.closest('.modal-main') === null) {
          document.querySelector('body').classList.remove('noscroll');
          this.classList.remove('active');
          //modalElement.querySelectorAll('.modal__content')[0].classList.remove('active');
          //modalElement.querySelectorAll('.modal__content')[0].classList.remove('pdf');
        }
      });
      
    });
    
  }
  function DOMImg(src){
    if(document.getElementById('modal-img')){
      document.getElementById('modal-img').remove();
    }
    let targetElement = modalElement.querySelectorAll('.modal-main')[0];
    const newElement = document.createElement('div');
    newElement.id = 'modal-img';
    const newImage = document.createElement('img');
    newImage.src = src; // 画像のパスを設定
    newElement.appendChild(newImage);
    targetElement.appendChild(newElement);
    newImage.addEventListener('load', function() {
      setSize();
      modalElement.querySelectorAll('.modal__content')[0].classList.add('active');
    });
  }
  function DOMPdf(src){
    if(document.getElementById('modal-img')){
      document.getElementById('modal-img').remove();
    }
    let targetElement = modalElement.querySelectorAll('.modal-main')[0];
    modalElement.querySelectorAll('.modal__content')[0].classList.add('pdf');
    const newElement = document.createElement('div');
    newElement.id = 'modal-img';
    const newImage = document.createElement('iframe');
    newImage.src = src; // 画像のパスを設定
    newElement.appendChild(newImage);
    targetElement.appendChild(newElement);
    newImage.addEventListener('load', function() {
      setSize();
      modalElement.querySelectorAll('.modal__content')[0].classList.add('active');
    });
  }
}
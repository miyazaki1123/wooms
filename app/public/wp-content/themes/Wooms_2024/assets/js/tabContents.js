import { moveLink } from "./anchorLink.js";
export function tabContents(MQ,tabs,tab,contents) {
  const tabElements = document.querySelectorAll(tab);
  const tabsElements = document.querySelector(tabs);
  const mainElements = document.querySelectorAll(contents);
  let old_num = [];
  let tab_num = [];

 

  if(tabsElements){

    if(!MQ){
      tabsElements.addEventListener('click', function(elem) {
        tabsElements.classList.toggle('active');
      });
    }
    tabElements.forEach(function(tab,index){
      //console.log(tab.classList.contains('active'))
    
      tab.addEventListener('click', function() {
        const itemOffsetLeft = tab.offsetLeft - (document.querySelector('.staff__tabs').clientWidth / 2) + (tab.clientWidth / 2);
        
        setTimeout(function () {
          document.querySelector('.staff__tabs').scrollTo({
            left: itemOffsetLeft, // クリックした要素の左端にスクロール
            behavior: 'smooth' // スムーズにスクロール
          });
        }, 300);
        
        tab_num = tab.dataset.t;
        //console.log(tab.textContent)
        moveLink(MQ,document.getElementById(tab.textContent),600)
        if (!tab.classList.contains('active')) {
          document.querySelectorAll('[data-c]').forEach(function(content){
            content.classList.remove('active');
          });
        }
        if(tab.dataset.t){
          if(!this.classList.contains('active')){
            Array.from(this.parentNode.children).forEach((sibling, siblingIndex) => {
              if (sibling.classList && sibling.classList.contains('active')) {
                if(sibling.classList.contains('active')){
                  sibling.classList.remove('active');
                }
              }
            });
            //console.log(tab.dataset.t)
            if(document.querySelector('[data-c="'+tab.dataset.t+'"]') ){
              document.querySelectorAll('[data-c="'+tab.dataset.t+'"]').forEach(function(content){
                content.classList.add('active');
              });
            }
            if(tab.dataset.t == 'all'){
              document.querySelectorAll('[data-c]').forEach(function(content){
                content.classList.add('active');
              });
            }
            this.classList.add('active');
          }
          
        }
        if(!document.querySelector('.page')){
          if(!this.classList.contains('active')){

            Array.from(this.parentNode.children).forEach((sibling, siblingIndex) => {
              if (sibling.classList && sibling.classList.contains('active')) {
                if(sibling.classList.contains('active')){
                  mainElements[siblingIndex].classList.remove('active');
                  sibling.classList.remove('active');
                }
              }
            });
            this.classList.add('active');
            mainElements[index].classList.add('active');
            
          }
        }
      });
    });
  }

  
}
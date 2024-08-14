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
        tab_num = tab.dataset.t;
        if(tab.dataset.t){
          if(!this.classList.contains('active')){
            Array.from(this.parentNode.children).forEach((sibling, siblingIndex) => {
              if (sibling.classList && sibling.classList.contains('active')) {
                if(sibling.classList.contains('active')){
                  sibling.classList.remove('active');
                  document.querySelector('[data-c="'+sibling.dataset.t+'"]').classList.remove('active');
                }
              }
            });
            
            document.querySelector('[data-c="'+tab.dataset.t+'"]').classList.add('active');
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
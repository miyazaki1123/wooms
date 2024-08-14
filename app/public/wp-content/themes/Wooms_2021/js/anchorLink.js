export function anchorLink(MQ) {
  let height = document.querySelector('.site-header').clientHeight;
  const BASE_OFFSET = 80;
  const elem = document.querySelector('.back-to-top');
  const anchorLinks = document.querySelectorAll('a[href^="#"]');
      anchorLinks.forEach(link => {
          link.addEventListener("click", function(event) {
              event.preventDefault();
              let offset = 0;
              const targetId = this.getAttribute('href');
              console.log(targetId)
              if(targetId!="#"){
                const targetElement = document.querySelector(targetId);
                const currentScrollPosition = window.scrollY;
                const targetPosition = targetElement.getBoundingClientRect().top + window.scrollY;
              }
              if(targetId){
                
                let type;
                if(!MQ){
                  type = 'smooth';
                }else{
                  type = 'smooth';
                }
               if(event.target.classList.contains('smooth')){
               type = 'smooth';
               }
               if(!MQ){
                document.querySelector('.menu-lp').classList.remove('active');
                //document.querySelector('.side-content').classList.remove('hide');
               }
               
                //document.querySelector('.nav-toggle-wrap').classList.remove('active');
                //document.querySelector('body').classList.remove('noscroll');
                if (targetId === "#") {
                  window.scrollTo({
                    top: 0,
                    behavior: type
                });
                
                }else {
                  let mediaHeight;
                  if (MQ) {
                    if (targetPosition > currentScrollPosition) {
                      console.log('目的の要素は下にあります');
                      mediaHeight = 0;
                      offset = 0;
                    } else {
                      mediaHeight = -height;
                      offset = 0;
                    }
                    
                  }else{
                    mediaHeight = -height;
                    offset = 0;
                  }
                  
                  const targetElement = document.querySelector(targetId).
                  getBoundingClientRect().top + window.pageYOffset + mediaHeight - offset;
                  //console.log(targetElement )
                  //console.log(targetElement);
                    window.scrollTo({
                      top: targetElement,
                        behavior: type
                    });
                }
              }
          });
      });
  
    const fragment = window.location.hash;
      if (fragment) {
        let offset = 0;
        let mediaHeight;
        if (MQ) {
          mediaHeight = -height;
          offset = BASE_OFFSET;
        }else{
          mediaHeight = -height;
          offset = BASE_OFFSET / 2;
        }
       //console.log(fragment)
        
          const targetElement = document.querySelector(fragment).
          getBoundingClientRect().top + window.pageYOffset + mediaHeight - offset;
          //console.log(targetElement);
          setTimeout(function () {
            window.scrollTo(0,targetElement);
          }, 300);
      }
}

export function moveLink(MQ,element,speed = 600) {
  let height = document.querySelector('.site-header').clientHeight;
  let mediaHeight;
  if (MQ) {
    mediaHeight = -height;
  }else{
    mediaHeight = -height;
  }
  
  const targetElement = element.getBoundingClientRect().top + window.pageYOffset + mediaHeight;
  //console.log(window.pageYOffset)
  setTimeout(function () {
    window.scrollTo({
      top: targetElement,
      behavior: "smooth"
    });
  }, 300);
}
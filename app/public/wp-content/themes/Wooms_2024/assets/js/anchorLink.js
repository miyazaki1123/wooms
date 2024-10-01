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
              //console.log(targetId)
              if(targetId == '#'){
                setTimeout(function () {
                  elem.classList.add('anime');
                  setTimeout(function () {
                    elem.classList.remove('anime');
                  }, 800);
                }, 600);
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
                document.querySelector('.global-nav').classList.remove('active');
                //document.querySelector('.side-content').classList.remove('hide');
               }
               
                document.querySelector('.nav-toggle-wrap').classList.remove('active');
                //document.querySelector('body').classList.remove('noscroll');
                if (targetId === "#") {
                  window.scrollTo({
                    top: 0,
                    behavior: type
                });
                
                }else {
                  let mediaHeight;
                  if (MQ) {
                    mediaHeight = -height;
                    offset = 0;
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
          offset = 0;
        }else{
          mediaHeight = -height;
          offset = 0;
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
    
    mediaHeight = -height - (window.innerHeight/3);
  }else{
    mediaHeight = -height - 130;
  }
  
  const targetElement = element.getBoundingClientRect().top + window.pageYOffset + mediaHeight;
  //console.log(window.pageYOffset)
  setTimeout(function () {
    window.scrollTo({
      top: targetElement,
      behavior: "smooth"
    });
  }, 0);
}
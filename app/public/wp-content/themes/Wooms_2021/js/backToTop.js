export function backToTop(){
    const targetElement = document.querySelector('.site-footer');
    const targetElement2 = document.querySelector('.sidebar2__top');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                targetElement2.classList.add('active2');
                
            } else {
                targetElement2.classList.remove('active2');
            }
        });
    }, {
        root: null,
        rootMargin: '0px', 
        threshold: 0 
    });
    let ticking = false;
  
    window.addEventListener('scroll', () => {
        if (!ticking) {
            window.requestAnimationFrame(() => {
                observer.observe(targetElement);
                ticking = false;
            });
            ticking = true;
        }
    });
  }
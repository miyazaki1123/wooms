export function backToTop(){
    const targetElement = document.querySelector('.site-footer');
    const targetElement2 = document.querySelector('.sidebar2__top');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // 要素がスクロール範囲に入ったらクラスを追加
                targetElement2.classList.add('active2');
                
            } else {
                // 要素がスクロール範囲から出たらクラスを削除（オプション）
                targetElement2.classList.remove('active2');
            }
        });
    }, {
        root: null, // ビューポートを基準にする
        rootMargin: '0px', // マージンを追加しない
        threshold: 0 // 要素が少しでも見えたら発火
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
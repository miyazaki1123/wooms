export function mailform(MQ){
  if(document.querySelector('.error')){
    let num2 = 0;
    document.querySelectorAll('.error').forEach(function(index,num){
      console.log(index)
      if(num2 == 0){
        if(index.textContent.length){
          num2 ++;
          let height = document.querySelector('.site-header').clientHeight;
          let mediaHeight;
          let offset;
          if (MQ) {
            mediaHeight = -20;
            offset = 0;
          }else{
            mediaHeight = -height;
            offset = 40;
          }
          const targetElement = index.getBoundingClientRect().top + window.pageYOffset + mediaHeight - offset;
          console.log('target' + targetElement);
          setTimeout(function () {
            window.scrollTo({
              top: targetElement,
              behavior: 'auto'
            });
          }, 0);
          
        }
      }else{
        return;
      }
    });
  }
}

export function agreeCheck(){
  let checkbox = document.getElementById('privacyPolicyAgreement-1');
  if (checkbox.checked) {
    document.querySelector('.need-agree').classList.remove('not-active');
  } else {
    document.querySelector('.need-agree').classList.add('not-active');
  }
    checkbox.addEventListener('change', function() {
        if (checkbox.checked) {
           document.querySelector('.need-agree').classList.remove('not-active');
        } else {
          document.querySelector('.need-agree').classList.add('not-active');
        }
    });

}

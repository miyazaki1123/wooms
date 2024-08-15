import { slideToggle } from "./slideToggle.js";
export function faqFunc(){
  document.querySelectorAll('.faq__q').forEach(function(index,num){
    let elem = document.querySelectorAll('.faq__a')[num];
    index.addEventListener('click',function(){
      slideToggle(elem,index,300,false,'block');
    });
  });
}
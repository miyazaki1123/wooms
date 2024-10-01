
/*
import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
*/
import { anchorLink } from "./anchorLink.js";
import { pagetotop } from "./pagetotop.js";
import { animation } from "./animation.js";
import { tabContents } from "./tabContents.js";
import { navigation } from "./navigation.js";
import { slideToggle } from "./slideToggle.js";
import {modal} from "./modal.js";
import {splide} from "./splide.js";
import { pulldownMenu } from "./pulldownMenu.js";
const BLEAKPOINT = 769;
const MQ = window.matchMedia("(min-width: "+BLEAKPOINT+"px)");

const mainListener = function(event) {
  document.location.reload();
};
MQ.addEventListener('change', mainListener);
if(document.querySelector('.back-to-top')){
  pagetotop();
}

splide(MQ.matches);
const setFillHeight = function() {
  const vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
}
const setFillHeight2 = function() {
  const vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vha', `${vh}px`);
}
tabContents()
animation({
  breakPoint: BLEAKPOINT,
  offsetPc: 200,
  offsetSp: 80,
  speed: 1000,
  replay: true,
});
document.addEventListener("DOMContentLoaded", function() {
  setFillHeight();
  setFillHeight2();
  //pagetotop();
  navigation(MQ.matches);
  modal(MQ.matches);
});
window.addEventListener('load', function(){
  document.querySelector('body').classList.add('active');
  anchorLink(MQ.matches);
});
window.addEventListener("resize",  function(){
  setFillHeight2();
});
document.querySelectorAll('.global-nav>.main-menu>li').forEach(function(btn,index){
  if(btn.querySelector('.sub-menu')){
      pulldownMenu(btn,MQ,index);
  }
});

if ('ontouchstart' in window || navigator.maxTouchPoints) {
  document.body.classList.add('touch-device');
  document.querySelectorAll('a').forEach(function(item){
    item.classList.add('nothover');
  });
  document.querySelectorAll('.global-nav>.main-menu>li').forEach(function(item){
    item.classList.add('nothover');
  });
}



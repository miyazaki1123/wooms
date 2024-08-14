/* animation.js ver 5.10 */
let AnimeData;
let AnimePC;
let AnimePositions = [];
let AnimeType = [];
let AnimeWindowHeight;
let AnimeWindowWidth;
let AnimeDataName;
let AnimeMediaQuery;
let AnimeDataElements;
let AnimeDataLoadedElements;
let AnimeLoadedFlag = 0;
export function animation(data) {
  AnimeData = {
    breakPoint: 768,
    offsetPc: 100,
    offsetSp: 50,
    speed: 800,
    replay: false,
  };
  AnimeData.breakPoint =
    data.breakPoint != undefined ? data.breakPoint : AnimeData.breakPoint;
  AnimeData.offsetPc =
    data.offsetPc != undefined ? data.offsetPc : AnimeData.offsetPc;
  AnimeData.offsetSp =
    data.offsetPc != undefined ? data.offsetSp : AnimeData.offsetSp;
  AnimeData.replay =
    data.replay != undefined ? data.replay : AnimeData.replay;
  AnimeData.speed = data.speed != undefined ? data.speed : AnimeData.speed;

  AnimePC = "(min-width:" + (AnimeData.breakPoint + 1) + "px)";
  AnimeMediaQuery = window.matchMedia(AnimePC);
  AnimeDataName = {
    type: "data-a",
    typeSp: "data-a-sp",
    loaded: "data-a-loaded",
    trigger: "data-a-trigger",
    target: "data-a-target",
    targetPc: "data-a-target-pc",
    targetSp: "data-a-target-sp",
    offset: "data-a-offset",
    offsetSp: "data-a-offset-sp",
    delay: "data-a-delay",
    delaySp: "data-a-delay-sp",
    speed: "data-a-speed",
    transition: "data-a-transition",
    replay: "data-a-replay",
    maxw: "data-a-maxw",
    minw: "data-a-minw",
    head: "anime-",
    active: "anime-active",
  };
  AnimeReadElements();
  let resizeTimer;
  function onResizeComplete() {
    // リサイズが終わった後に実行する処理を記述します
    //console.log('Resize completed');
    AnimeReset();
    AnimeSetPos();
  }
  function handleResize() {
    // 既存のタイマーがあればクリアします
    clearTimeout(resizeTimer);
  
    // 新しいタイマーを設定し、指定時間（例: 300ms）後にonResizeCompleteを実行します
    resizeTimer = setTimeout(onResizeComplete, 300);
  }
  // resizeイベントリスナーを追加します
  window.addEventListener("resize", handleResize);
  window.addEventListener("scroll", AnimeOnScroll);
    AnimeReset();
    AnimeSetPos();
    window.addEventListener("load", function () {
      if(document.querySelectorAll('[data-a="addClassLoaded"]').length > 0){
        AnimeDataLoadedElements.forEach(function (element, index) {
          AnimeEffects(AnimePositions[index], AnimePositions[index].id, "in");
        });
      }else{
        document.querySelector('body').classList.add('loaded');
        AnimeLoadedFlag = 11;
        AnimeDataElements.forEach(function (element, index) {
          AnimeEffects(AnimePositions[index], AnimePositions[index].id, "in");
        });
      }
    });  
}
function AnimeReadElements(){
  AnimeDataElements = document.querySelectorAll(
    "[" + AnimeDataName.type + "]"
  );
  AnimeDataLoadedElements = document.querySelectorAll(
    "[" + AnimeDataName.loaded + "]"
  );
  AnimeDataElements.forEach(function (element, index) {
    AnimeType[index] = element.getAttribute(AnimeDataName.type);
  });
}
function AnimeReset() {
  AnimeDataElements.forEach(function (element, index) {
    let mw = element.getAttribute(AnimeDataName.maxw);
    let miw = element.getAttribute(AnimeDataName.minw);
    
    if (mw != null && mw < window.innerWidth) {
      //console.log(element.getAttribute(AnimeDataName.maxw))
      element.removeAttribute("data-a");
    } else {
      if (miw != null && miw > window.innerWidth) {
        //console.log(element.getAttribute(AnimeDataName.maxw))
        element.removeAttribute("data-a");
      } else {
        if(!AnimeMediaQuery.matches && element.getAttribute(AnimeDataName.typeSp)) {
          element.setAttribute("data-a", element.getAttribute(AnimeDataName.typeSp));
        }else{
          element.setAttribute("data-a", AnimeType[index]);
        }
      }
    }
  });
}

function AnimeOnScroll() {
  AnimeLoadedFlag ++;
  //console.log(AnimeLoadedFlag)
  let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  let scrollBottom = scrollTop + AnimeWindowHeight;
  //document.getElementById('test').textContent = scrollBottom;
  if (AnimePositions.length && AnimeLoadedFlag > 10 ) {
    AnimePositions.forEach(function (data) {
      if ((data.flag == undefined || data.flag == 0) && data.target == null && data.loaded == null) {
        if (data.offSet <= scrollBottom) {
          if('count-up' == data.type){
            countUp.start();
          }
          AnimeEffects(data, data.id, "in");
          /* delete array */
          //AnimePositions.splice(cnt, 1);
          if (data.trigger != null) {
            AnimeTrigger(data.trigger, "in");
          }
        }
      }
      if (data.flag == 1 && (AnimeData.replay == true || data.replay != null) && data.target == null && data.loaded == null) {
        if (data.offSet > scrollBottom) {
          AnimeEffects(data, data.id, "out");
          /* delete array */
          //AnimePositions.splice(cnt, 1);
          if (data.trigger != null) {
            AnimeTrigger(data.trigger, "out");
          }
        }
      }
    });
  }
}
function AnimeEffects(data, id, type) {
  if(data.type == 'addClassLoaded'){
    const w = document.querySelector('[data-a="addClassLoaded"]');
    let wd = w.dataset.aDelay;
    //console.log(((w.clientHeight * 0.5)))
    if(document.documentElement.scrollTop > ((w.clientHeight * 0.5) )){
      wd = 0;
    }
    window.setTimeout(function(){
      document.querySelector('body').classList.add('loaded');
      AnimeLoadedFlag = 11;
      AnimeOnScroll();
    }, wd);
  }
  let elem = AnimeDataElements[id];
  if (data.delay != null) {
    if (data.transition == null) {
      elem.style.animationDelay = data.delay;
    } else {
      elem.style.transitionDelay = data.delay;
    }
  }
  if (data.speed != null) {
    if (data.transition == null) {
      elem.style.animationDuration = data.speed;
    } else {
      elem.style.transitionDuration = data.speed;
    }
  }
  if (type == "in") {
    if (data.transition == null) {
      elem.style.animationName = AnimeDataName.head + data.type;
      elem.style.animationTterationCount = 1;
      elem.style.animationFillMode = "both";
    } else {
      elem.classList.add(AnimeDataName.head + data.type);
    }
  } else {
    if (data.transition != null) {
      elem.classList.remove(AnimeDataName.head + data.type);
    } else {
      elem.style.animationName = AnimeDataName.head + data.type + "-out";
    }
  }
  //elem.classList.add(AnimeDataName.active,AnimeDataName.head+data.type);
  if (type == "in") {
    elem.classList.add(AnimeDataName.active);
    data.flag = 1;
  } else {
    elem.classList.remove(AnimeDataName.active);
    data.flag = 0;
  }
}
function AnimeTrigger(key, type) {
  const filteredData = AnimePositions.filter((item) => item.target === key);
  //console.log(filteredData);
  filteredData.forEach(function (data) {
    //console.log(data.id);
    AnimeEffects(data, data.id, type);
  });
}
function AnimeSetPos() {
  AnimeWindowHeight = window.innerHeight;
  AnimeWindowWidth = window.innerWidth;
  AnimePositions = [];
  AnimeDataElements.forEach(function (element, index) {
    //console.log(index + ' ' + element.offsetTop);
    let loaded = setData(AnimeDataName.loaded, index);
    let offSet;
    let dataOffSet;
    function setData(data, index) {
      let elem = AnimeDataElements[index];
      let result;
      if (AnimeMediaQuery.matches) {
        result = elem.getAttribute(data);
      } else {
        result = elem.getAttribute(data + "-sp");
        if (result == null) {
          result = elem.getAttribute(data);
        }
      }
      return result;
    }
    
    if(setData(AnimeDataName.offset, index) == 'center'){
      //console.log(setData(AnimeDataName.offset, index))
      if (AnimeMediaQuery.matches) {
        dataOffSet = window.innerHeight / 2;
      }else{
        dataOffSet = 200;
      }
    }else if(setData(AnimeDataName.offset, index) == 'top'){
      //console.log(setData(AnimeDataName.offset, index))
      if (AnimeMediaQuery.matches) {
        dataOffSet = window.innerHeight - 70;
      }else{
        dataOffSet = window.innerHeight ;
      }
    }else if(setData(AnimeDataName.offset, index) == 'bottom'){
		//console.log(setData(AnimeDataName.offset, index))
		if (AnimeMediaQuery.matches) {
			dataOffSet = window.innerHeight;
		}else{
		  dataOffSet = 200 ;
		}
	  }else{
		dataOffSet = setData(AnimeDataName.offset, index);
		if (!AnimeMediaQuery.matches) {
			if(AnimeDataName.offsetSp){
				dataOffSet = setData(AnimeDataName.offsetSp, index);
			}
		}
      
    }
    
    

    const rect = element.getBoundingClientRect();
    const top = rect.top + window.pageYOffset || document.documentElement.scrollTop;
    //console.log(dataOffSet)
    if (dataOffSet != null) {
      offSet = top + Number(dataOffSet);
    } else {
      if (AnimeMediaQuery.matches) {
        offSet = top + AnimeData.offsetPc;
      } else {
        offSet = top + AnimeData.offsetSp;
      }
    }
    let delay = setData(AnimeDataName.delay, index);
    if (AnimeMediaQuery.matches) {
    } else {
      if (setData(AnimeDataName.delaySp, index) != null) {
        delay = setData(AnimeDataName.delaySp, index);
      }
    }

    if (delay != null) {
      delay = delay / 1000 + "s";
    }
    let speed = setData(AnimeDataName.speed, index);
    if (speed != null) {
      speed = speed / 1000 + "s";
    } else {
      speed = AnimeData.speed / 1000 + "s";
    }
    let target = element.getAttribute(AnimeDataName.target);
    if (AnimeMediaQuery.matches) {
      if (element.getAttribute(AnimeDataName.targetPc) != null) {
        //PCのみ
        target = element.getAttribute(AnimeDataName.targetPc);
      }
    } else {
      if (element.getAttribute(AnimeDataName.targetSp) != null) {
        //SPのみ
        target = element.getAttribute(AnimeDataName.targetSp);
      }
    }
    //console.log(target)
    let position = {
      id: index,
      loaded: loaded,
      type: setData(AnimeDataName.type, index),
      offSet: offSet,
      trigger: element.getAttribute(AnimeDataName.trigger),
      replay: element.getAttribute(AnimeDataName.replay),
      target: target,
      delay: delay,
      speed: speed,
      maxw: element.getAttribute(AnimeDataName.maxw),
      transition: element.getAttribute(AnimeDataName.transition),
    };
    AnimePositions.push(position);
  });
  //console.log(AnimePositions);
  AnimeOnScroll();
}
export function AnimeReflesh(){
    //console.log('reflesh')
    AnimeReadElements();
    AnimeReset();
    AnimeSetPos();
}
export function AnimeDestory(){
  document.querySelectorAll('[data-a]').forEach(function(index){
    delete index.dataset.a;
  })
}
function AnimeIsTouchDevice() {
  return ('ontouchstart' in window || navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0);
};
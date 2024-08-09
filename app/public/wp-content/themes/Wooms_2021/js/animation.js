function animation(data) {
  if (data) {
    MAXWIDTH = data.maxwidth;
    MINWIDTH = data.minwidth;
  } else {
    MAXWIDTH = 767;
    MINWIDTH = 768;
  }
  let aflag = [];
	
  function animaTriggerFunc() {
    $("[data-a]").each(function (index, element) {
			//console.log(index)
      if (aflag[index] != 1) {
        if (
          $(element).attr("data-a-ws") == undefined ||
          $(window).width() > Number($(element).attr("data-a-ws"))
        ) {
          let offset = 0;
          if (window.matchMedia("(max-width: " + MAXWIDTH + "px)").matches) {
            if ($(element).attr("data-a-sp") != undefined) {
              //console.log($(element).attr("data-a-sp"));
              c_name = "anime-" + $(element).attr("data-a-sp");
            } else {
              c_name = "anime-" + $(element).attr("data-a");
            }
          } else {
            c_name = "anime-" + $(element).attr("data-a");
          }

          if ($(element).attr("data-a-offset")) {
            if (window.matchMedia("(min-width: " + MINWIDTH + "px)").matches) {
              offset = $(element).data("a-offset");
            }
          } else {
            if (window.matchMedia("(min-width: " + MINWIDTH + "px)").matches) {
              offset = 180;
            }
          }
          if ($(element).attr("data-a-offset-sp")) {
            if (window.matchMedia("(max-width: " + MAXWIDTH + "px)").matches) {
              offset = $(element).data("a-offset-sp");
            }
          } else {
            if (window.matchMedia("(max-width: " + MAXWIDTH + "px)").matches) {
              offset = 50;
            }
          }
					//console.log(offset);
          if ($(window).scrollTop() + $(window).height() - offset > $(element).offset().top ) {
            //console.log($(element).data('a') +"  " +$(element).data('a-trigger'))
            if ($(element).data("a-trigger") == undefined) {
              if (!$(element).hasClass(c_name)) {
                if (window.matchMedia("(min-width: " + MINWIDTH + "px)").matches) {
                  $(element).css("animation-delay",$(element).data("a-delay") / 1000 + "s");
									if ($(element).attr("data-a-pc-delay")) {
													$(element).css("animation-delay",$(element).data("a-pc-delay") / 1000 + "s");
									}
                } else {
                  if ($(element).attr("data-a-sp-delay")) {
                    $(element).css("animation-delay",$(element).data("a-sp-delay") / 1000 + "s" );
                  } else {
                    $(element).css("animation-delay",$(element).data("a-delay") / 1000 + "s");
                  }
                }
											if($(element).data("a-speed")){
										 			$(element).css("animation-duration",$(element).data("a-speed") / 1000 + "s");
										 		}
                if ($(element).hasClass("odometer")) {
                  $(element).html($(element).data("a-num"));
                } else if ($(element).hasClass("countup")) {
                  countUp(
                    0,
                    $(element).data("a-num"),
                    $(element),
                    $(element).data("a-cu-speed"),
                    $(element).data("a-cu-comma")
                  );
                }
                $(element).addClass(c_name);
                if ($(element).data("a-target") != undefined) {
                  let target = $(element).data("a-target");
                  $("[data-a-trigger]").each(function (index3, element3) {
                    if (
                      $("[data-a-trigger]").eq(index3).data("a-trigger") ==
                      target
                    ) {
                      c_name2 =
                        "anime-" + $("[data-a-trigger]").eq(index3).data("a");
                      if (!$(element3).hasClass(c_name2)) {
                        if (
                          window.matchMedia("(min-width: " + MINWIDTH + "px)")
                            .matches
                        ) {
                          if ($(element3).attr("data-a-delay")) {
                            //console.log($(element3).data("a-delay"));
                            $(element3).css(
                              "animation-delay",
                              $(element3).data("a-delay") / 1000 + "s"
                            );
                          }
													if ($(element3).attr("data-a-pc-delay")) {
													$(element).css("animation-delay",$(element).data("a-pc-delay") / 1000 + "s");
													}
                        } else {
													if ($(element3).attr("data-a-delay")) {
                            //console.log($(element3).data("a-delay"));
                            $(element3).css(
                              "animation-delay",
                              $(element3).data("a-delay") / 1000 + "s"
                            );
                          }
													if ($(element3).attr("data-a-pc-delay")) {
													$(element).css("animation-delay",$(element).data("a-pc-delay") / 1000 + "s");
													}
                          if ($(element3).attr("data-a-sp-delay")) {
                            if (
                              window.matchMedia(
                                "(max-width: " + MAXWIDTH + "px)"
                              ).matches
                            ) {
                              $(element3).css(
                                "animation-delay",
                                $(element3).data("a-sp-delay") / 1000 + "s"
                              );
                            }
                          }
                        }
                      }
																if($(element3).data("a-speed")){
																	$(element3).css("animation-duration",$(element3).data("a-speed") / 1000 + "s");
																}
                      if ($(element3).hasClass("odometer")) {
                        $(element3).html($(element3).data("a-num"));
                      } else if ($(element3).hasClass("countup")) {
                        countUp(
                          0,
                          $(element3).data("a-num"),
                          $(element3),
                          $(element3).data("a-cu-speed"),
                          $(element).data("a-cu-comma")
                        );
                      }
                      $(element3).addClass(c_name2);
                    }
                  });
                }
              }
            }
            aflag[index] = 1;
          }
        } else {
          $(element).css("opacity", 1);
        }
      }
    });
  }
window.addEventListener("load", function() {
    animaTriggerFunc();
  });
  $(window).resize(function () {
    animaTriggerFunc();
  });
  $(window).scroll(function () {
    animaTriggerFunc();
  });
}

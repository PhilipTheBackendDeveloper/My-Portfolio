
$(function () {

  gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

  ScrollTrigger.normalizeScroll(true)

  // create the smooth scroller FIRST!
  let smoother = ScrollSmoother.create({
    smooth: 2,
    effects: true,
  });

});

$(function () {
  var width = $(window).width();
  if (width > 991) {

      let gallery = document.querySelector('.metro .items')
      let wrapper = document.querySelector('.metro')
      let moveVal = 0;
      let dragging = false, mouseLocation, galleryLocation;

      const easeOutQuad = t => {
          return t * (2 - t)
      }

      moveGallery = () => {
          moveVal = easeOutQuad(window.scrollY * .003);
          gallery.style.transform = `translateX(${moveVal}%)`;

          requestAnimationFrame(moveGallery);
      }

      requestAnimationFrame(moveGallery);

      const dragStart = e => {
          dragging = true;
          mouseLocation = e.pageX;
          galleryLocation = wrapper.scrollLeft;
      }

      const dragActive = e => {
          if (!dragging) return;

          let offset = e.pageX - mouseLocation;
          wrapper.scrollLeft = galleryLocation - offset;
      }

      const dragStop = e => {
          dragging = false;
          mouseLocation = e.pageX;
          galleryLocation = wrapper.scrollLeft;
      }

      gallery.addEventListener('mousedown', dragStart);
      gallery.addEventListener('mousemove', dragActive);
      gallery.addEventListener('mouseup', dragStop);

  }
});
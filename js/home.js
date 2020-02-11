var swiper = new Swiper('.news-slider .swiper-container', {
      slidesPerView: 'auto',
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
      992: {
        slidesPerView: 3
      },
      1360: {
        slidesPerView: 1
      }
    }
});

var swiper = new Swiper('.event-slider .swiper-container', {
      slidesPerView: 'auto',
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        992: {
          slidesPerView: 3
        },
        1360: {
          slidesPerView: 1
        }
      }
  });
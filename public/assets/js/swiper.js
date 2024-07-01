new Swiper("#slider_1", {
    centeredSlides: !0,
    loop: !0,
    hashNavigation: {
      watchState: !0,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: !0,
    },
    autoplay: {
      delay: 2500,
      disableOnInteraction: !1,
    },
  }),
    new Swiper("#slider_2", {
      centeredSlides: !0,
      loop: !0,
      hashNavigation: {
        watchState: !0,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: !0,
      },
      autoplay: {
        delay: 2500,
        disableOnInteraction: !1,
      },
    }),
    new Swiper("#testi_3", {
      centeredSlides: !0,
      loop: !0,
      hashNavigation: {
        watchState: !0,
      },
      pagination: {
        el: ".pagination",
        clickable: !0,
      },
      autoplay: {
        delay: 2500,
        disableOnInteraction: !1,
      },
    }),
    new Swiper("#testi_6", {
      slidesPerView: 1,
      centeredSlides: !0,
      loop: !0,
      pagination: {
        el: ".swiper-pagination",
        clickable: !0,
      },
      navigation: {
        nextEl: ".button-next",
        prevEl: ".button-prev",
      },
      autoplay: {
        delay: 2500,
        disableOnInteraction: !1,
      },
      breakpoints: {
        400: {
          slidesPerView: 1,
        },
      },
    });
  var swiper = new Swiper(".mySwiper", {
      spaceBetween: 10,
      slidesPerView: 1,
      freeMode: !0,
      watchSlidesProgress: !0,
      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 40,
        },
        1200: {
          slidesPerView: 4,
          spaceBetween: 50,
        },
      },
    }),
    swiper2 = new Swiper(".mySwiper2", {
      loop: !0,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      autoplay: {
        delay: 2500,
        disableOnInteraction: !1,
      },
      thumbs: {
        swiper: swiper,
      },
    });
  new Swiper("#slider_5", {
    centeredSlides: !0,
    loop: !0,
    hashNavigation: {
      watchState: !0,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: !0,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    autoplay: {
      delay: 3500,
      disableOnInteraction: !1,
    },
  }),
    new Swiper("#testi_6", {
      centeredSlides: !0,
      loop: !0,
      hashNavigation: {
        watchState: !0,
      },
      navigation: {
        nextEl: ".button-next",
        prevEl: ".button-prev",
      },
      pagination: {
        el: ".pagination",
        clickable: !0,
      },
      autoplay: {
        delay: 2500,
        disableOnInteraction: !1,
      },
    });

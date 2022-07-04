$(document).ready(function () {

  var offset_new_numbers = $(".new_numbers").offset().top - 400;
  $(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= offset_new_numbers) {
      if(!$('.new_numbers').hasClass('been_amation')) {
        $(".new_numbers .circle").each(function(index, el) {
          let dasharray = $(this).data('dasharray');
          $(this).css('stroke-dasharray', dasharray + ' 141');
        });
        $('.new_numbers .count').each(function () {
          var $this = $(this);
          jQuery({ Counter: 0 }).animate({ Counter: $this.attr('data-percentage') }, {
            duration: 1000,
            easing: 'swing',
            step: function (now) {
              $this.text(Math.ceil(now));
            }
          });
        });
        $('.new_numbers').addClass('been_amation');
      }
    }

  });
  
  const swiperBanner = new Swiper(".swiperBanner", {
    slidesPerView: 1,
    setWrapperSize: true,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 30000,
      disableOnInteraction: false,
    },
    navigation: false,
    // on: {
    //   afterInit: function () {
    //     let img_height = $('.swiperBanner .swiper-slide:first-child img').height();
    //     console.log(img_height)
    //     $('.swiperBanner .swiper-wrapper').height(img_height);
    //   },
    // }
  });

  const swiperPartner = new Swiper(".swiperPartner", {
    loop: true,
    slidesPerView: 4,
    breakpoints: {
      1080: {
        slidesPerView: 6,
      },
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  const swiperTechnology = new Swiper(".swiperTechnology", {
    loop: true,
    centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    slidesPerView: 1,
  });

  const swiperNews = new Swiper(".swiperNews", {
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  function createVideoYoutube(url) {
    if(url) {
      return `
        <iframe width="100%" height="100%" src="${url}"
          title="YouTube video player" frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen>
        </iframe>
      `
    } else {
      return ""
    }
  }

  $("#play-video").on("click", function() {
    $(".show-intro-video").append(createVideoYoutube("https://www.youtube-nocookie.com/embed/en3bJuHQQWM?autoplay=1&autohide=1&fs=1&rel=0&hd=1&wmode=transparent&enablejsapi=1&html5=1"))
    $(".show-intro-video").addClass("active")
  })

  $(document).on("click", function (e) {
    let tempCheck = $(e.target).attr('class')
    if (tempCheck == "play-video" || tempCheck == "icon") {
        return
    } else {
        let outside_check = $(".pop-up-item")[0] !== e.target
        if (outside_check) {
          $(".show-intro-video").removeClass("active")
          $(".show-intro-video").empty()
        }
    }
  })
});

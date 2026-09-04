jQuery(document).ready(function () {
  // トップスライド
  jQuery("#top_slide_area_magazine .slide_row").slick({
    infinite: true,
    slidesToShow: 1,
    dots: false,
    arrows: false,
    // fade: true,
    speed: 500,
    cssEase: "linear",
    autoplay: true, //自動再生
    autoplaySpeed: 4000,
    arrows: true,
    prevArrow: '<div class="slide-arrow prev-arrow"></div>',
    nextArrow: '<div class="slide-arrow next-arrow"></div>',
    // centerMode: true, //要素を中央寄せ
    // centerPadding: "10px", //両サイドの見えている部分のサイズ
    responsive: [
      {
        breakpoint: 768, // ブレイクポイントを指定
        settings: {
          slidesToShow: 1,
          speed: 600,
        },
      },
    ],
  });
});

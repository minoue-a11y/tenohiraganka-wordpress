jQuery(document).ready(function () {
  // トップスライド
  jQuery("#top_slide_area .slide_row").slick({
    infinite: true,
    slidesToShow: 4,
    dots: true,
    arrows: false,
    // fade: true,
    speed: 500,
    cssEase: "linear",
    autoplay: true, //自動再生
    autoplaySpeed: 1000,
    // centerMode: true, //要素を中央寄せ
    // centerPadding: "10px", //両サイドの見えている部分のサイズ
    responsive: [
      {
        breakpoint: 768, // ブレイクポイントを指定
        settings: {
          slidesToShow: 2,
          speed: 600,
        },
      },
    ],
  });
});

//サイト独自カスタムJS

jQuery(document).ready(function () {
  // ***
  // トップニュース切り替え（本体用）
  if (document.getElementById("topsec_news") != null) {
    jQuery("#topsec_news .cat_buttons li").on("click", function () {
      jQuery(this).closest("ul").find("li").removeClass("cat_active");
      jQuery(this).addClass("cat_active");
      // ニュース一覧の切り替え
      let n = jQuery(this).index();
      jQuery("#topsec_news .news_container").removeClass("cat_active");
      jQuery("#topsec_news .news_container").eq(n).addClass("cat_active");
    });
  }

  // ***
  // self check btn close
  jQuery("#btn_dryeye_selfcheck .close_btn").on("click", function () {
    jQuery("#btn_dryeye_selfcheck").toggleClass("btn_show");
  });

  // マガジン用
  // スクロール量が100px以上になったら、クラスを追加する
  if (window.matchMedia("(max-width:768px)").matches) {
    jQuery(window).on("scroll", function () {
      if (jQuery(window).scrollTop() >= 100) {
        jQuery("#header_fix_container .hs_online_shinryo").addClass("scr_show");
        jQuery("#header-container .header_sitename").addClass("scr_hidden");
      } else {
        jQuery("#header_fix_container .hs_online_shinryo").removeClass("scr_show");
        jQuery("#header-container .header_sitename").removeClass("scr_hidden");
      }
    });
  }

  // マガジン用：
  // サイドメニューから検索が押されたら、検索窓を開く
  jQuery(".hs_search_btn").on("click", function () {
    jQuery("#header_search_container").toggleClass("search_box_open");
    if (jQuery("body").hasClass("drawer-open")) {
      // ドロワーメニューの中の検索ボタンが押されたときは、ドロワーを閉じる
      jQuery("body").toggleClass("drawer-open");
      jQuery(".js-menu").toggleClass("is-visible");
      jQuery(".js-menu-screen").toggleClass("is-visible");
    }
  });

  // アコーディオン：開閉
  jQuery(".faq_container h6").on("click", function () {
    jQuery(this).parent().toggleClass("faq_open");
    jQuery(this).next().slideToggle("fast");
  });
});

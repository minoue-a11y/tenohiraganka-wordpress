/*
 * ドライアイセルフチェックページ：カウントダウンscript
 */

jQuery(document).ready(function () {
  // SVGファイルをHTML内に読み込み
  jQuery(function ($) {
    // 外部SVGファイルを読み込んで表示
    // .load()メソッドは、指定した要素に外部ファイルの内容を挿入します。
    // 第一引数にファイルパスを指定します。
    $(".svg-container").load(
      "/wp-content/themes/hmr_tenohira_eye2025/imgs/count_down.svg",
      function (response, status, xhr) {
        if (status === "error") {
          // ファイルの読み込みに失敗した場合の処理
          console.error("SVGファイルの読み込みに失敗しました: " + xhr.status + " " + xhr.statusText);
          $(this).html("<p>タイマーの表示に失敗しました。</p>");
        }
      }
    );
  });
});

// 角度から座標を計算する関数
function angleToCoordinate(centerX, centerY, radius, angleInDegrees) {
  const angleInRadians = ((angleInDegrees - 90) * Math.PI) / 180;
  return {
    x: centerX + radius * Math.cos(angleInRadians),
    y: centerY + radius * Math.sin(angleInRadians),
  };
}

// 扇形パスを作成する関数
function createPiePath(centerX, centerY, radius, angleInDegrees) {
  const start = angleToCoordinate(centerX, centerY, radius, 0);
  const end = angleToCoordinate(centerX, centerY, radius, angleInDegrees);

  const largeArcFlag = angleInDegrees > 180 ? 1 : 0;

  if (angleInDegrees === 0) {
    return `M ${centerX} ${centerY} L ${start.x} ${start.y}`;
  }

  const pathData = [
    `M ${centerX} ${centerY}`,
    `L ${start.x} ${start.y}`,
    `A ${radius} ${radius} 0 ${largeArcFlag} 1 ${end.x} ${end.y}`,
    "Z",
  ].join(" ");

  return pathData;
}

// 表示角度を更新する関数
function updateReveal(angle) {
  const maskPath = document.getElementById("pie-mask-path");
  const pathData = createPiePath(120, 120, 104, angle);
  maskPath.setAttribute("d", pathData);

  // 回転する円の位置を計算（#bg_whiteの円周上、半径120）
  const rotatePoint = document.querySelector("#rotate_point circle");
  const centerX = 120;
  const centerY = 120;
  const radius = 120; // 元の半径に戻す

  // 角度から座標を計算（12時方向を0度とする）
  const angleRad = ((angle - 90) * Math.PI) / 180;
  const x = centerX + radius * Math.cos(angleRad);
  const y = centerY + radius * Math.sin(angleRad);

  rotatePoint.setAttribute("cx", x);
  rotatePoint.setAttribute("cy", y);
}

// カウントダウンの数字を１つずつ非表示にする
let cur_count_num = 12;
function update_count_num() {
  let num_classname = "count_num";
  let count_num = document.getElementsByClassName(num_classname + cur_count_num);
  count_num[0].style.display = "none";
  cur_count_num--;
}

// イラスト＆スタートボタン非表示
// SVGカウントダウンタイマーの表示
// 結果表示
function elem_show_hide(stat) {
  let stat_illust_start_btn;
  let stat_cont_timer;
  if (stat === "start") {
    // タイマースタート時
    stat_illust_start_btn = "none";
    stat_cont_timer = "block";

    // イラスト非表示、ボタン非表示
    let elem_illust = document.querySelector(".dry_eye_illust");
    let elem_start_btn = document.querySelector(".count_down_start_btn");
    let elem_svg_counter = document.querySelector(".svg-container");
    elem_illust.style.display = stat_illust_start_btn;
    elem_start_btn.style.display = stat_illust_start_btn;
    // カウントダウンタイマー表示
    elem_svg_counter.style.display = stat_cont_timer;
  } else {
    // タイマー終了時
    // 結果表示
    let elem_first_view = document.querySelector(".dryeye_first_view");
    let elem_result_view = document.querySelector(".dryeye_result_view");
    let elem_section_kantan_shinryo = document.querySelector("#topsec_kantan_shinryo");
    elem_first_view.style.display = "none";
    elem_result_view.style.display = "block";
    elem_section_kantan_shinryo.style.display = "block";
  }
}

// アニメーション関数
// 回転アニメーションを開始する
function animateReveal() {
  // イラスト非表示、ボタン非表示
  // カウントダウンタイマー表示
  elem_show_hide("start");

  resetReveal();

  let angle = 0;
  const totalDuration = 12400; // 12.4秒をミリ秒に変換
  const totalSteps = 360; // 360度
  const stepDuration = totalDuration / totalSteps; // 1度あたりの時間

  const interval = setInterval(() => {
    updateReveal(angle);
    angle += 1;
    if (angle > 360) {
      clearInterval(interval);
      angle = 360;
      updateReveal(angle);
      // イラスト表示、ボタン表示
      // カウントダウンタイマー非表示表示
      elem_show_hide("hide");
    } else {
      // 30度のときに、秒数を更新する！！！！！！！！
      if (angle % 30 === 0) {
        update_count_num();
      }
    }
  }, stepDuration);
}

// リセット関数
function resetReveal() {
  updateReveal(0);
  // カウントダウン数字をリセット
  cur_count_num = 12;
  let count_nums = document.getElementsByClassName("cnt_num");
  for (let i = 0; i < count_nums.length; i++) {
    count_nums[i].style.display = "block";
  }
}

// ページ読み込み時に初期状態に設定
window.addEventListener("load", function () {
  resetReveal();
});

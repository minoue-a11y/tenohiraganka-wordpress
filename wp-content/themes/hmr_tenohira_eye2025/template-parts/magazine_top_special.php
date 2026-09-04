<?php

/**
 * Template part for マガジン：投稿一覧
 *
 */

?>

<?php
//日付
$kiji_post_date = mysql2date('Y-m-d', $post->post_date);


// 7日間は　Newマーク表示(72時間)
$new_icon_show = '';
// 現在の日時を取得
$now = new DateTime();

// 投稿の日時をDateTimeオブジェクトに変換
$postDate = new DateTime($post->post_date);

// 二つの日時の差を計算
$dateDiff = $now->diff($postDate);

// 差が7日未満であるかどうかをチェック
if ($dateDiff->days < 7) {
    $new_icon_show = '<span class="new_mark">NEW</span>';
} else {
    $new_icon_show = '';
}



// thumbnail
$thumbnail_srcstr = "";
if (has_post_thumbnail($post->ID)) {
    $thumbnail_id = get_post_thumbnail_id($post->ID);
    $thumbnail_srcstr = wp_get_attachment_image($thumbnail_id, 'large');
} else {
    $thumbnail_srcstr = '<img src="' . get_template_directory_uri() . '/images/img_dummy_news.png" alt="">';
}


// カテゴリー取得
$now_cat = "";
$now_cat_link  = "";
$cur_cats = get_the_category($post->ID);
// タグを取得して表示
$post_tags = get_the_tags($post->ID);

$permalinkurl = get_permalink($post->ID);

// タイトル
$trimword = '';
// $trimword .= mb_strimwidth($post->post_title, 0, 1000, '…');
$trimword .= mb_strimwidth(strip_tags($post->post_title), 0, 140, '…');
$news_title = $trimword;



echo '<div class="sec_col">';
echo '<a href="' . $permalinkurl . '">';
echo '<div class="sec_img">';
echo '<span class="post_date">' . $kiji_post_date . '</span>';
echo '<div class="post_title">';
echo '<h5>' . $news_title . '</h5>';
echo '</div>';
echo $thumbnail_srcstr;
echo '</div>';
echo '</a>';
echo '</div>';


?>
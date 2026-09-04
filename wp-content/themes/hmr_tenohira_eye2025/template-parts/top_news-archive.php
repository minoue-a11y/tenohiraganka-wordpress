<?php

/**
 * Template part for NEWS一覧、アーカイブ用
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



// // thumbnail
// $thumbnail_srcstr = "";
// if (has_post_thumbnail($post->ID)) {
//     $thumbnail_id = get_post_thumbnail_id($post->ID);
//     $thumbnail_srcstr = wp_get_attachment_image($thumbnail_id, 'medium');
// } else {
//     $thumbnail_srcstr = '<img src="' . get_template_directory_uri() . '/images/img_dummy_news.png" alt="">';
// }


// // カテゴリー取得
// $now_term = "";
// $now_term_link  = "";
// if ($cur_terms = get_the_terms($post->ID, 'post_topics_cat')) {
//     $now_term = $cur_terms[0]->name;
//     $now_term_link = get_term_link($cur_terms[0]->slug, 'post_topics_cat');
//     // foreach ( $store_terms as $term ) {

//     // }
// }


$permalinkurl = get_permalink($post->ID);

// タイトル
$trimword = '';
// $trimword .= mb_strimwidth($post->post_title, 0, 1000, '…');
$trimword .= mb_strimwidth(strip_tags($post->post_title), 0, 140, '…');
$news_title = $trimword;



echo '<dl>';
echo '<dt>' . $kiji_post_date . '</dt>';
echo '<dd><a href="' . $permalinkurl . '">';
echo $new_icon_show . $news_title;
echo '</a></dd>';
echo '</dl>';


?>
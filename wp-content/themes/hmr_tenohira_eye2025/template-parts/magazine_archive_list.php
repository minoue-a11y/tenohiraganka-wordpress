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
    $thumbnail_srcstr = wp_get_attachment_image($thumbnail_id, 'medium');
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



echo '<div class="sec_pl_col">';
echo '<a href="' . $permalinkurl . '">';
echo '<div class="slide_pho">' . $thumbnail_srcstr . '</div>';
echo '<p class="slide_date">' . $kiji_post_date . '</p>';
echo '<h5 class="slide_title">';
echo $news_title;
echo '</h5>';
echo '<div class="slide_cate">';
echo '<ul class="cate_label">';
if ($cur_cats) {
    foreach ($cur_cats as $cate) {
        $cate_name = $cate->cat_name;
        echo '<li>' . $cate_name . '</li>';
    }
}
echo '</ul>';
echo '</div>';
echo '<div class="slide_tag">';
echo '<ul class="tag_label">';
if ($post_tags) {
    foreach ($post_tags as $tag) {
        $tag_name = $tag->name;
        echo '<li>' . $tag_name . '</li>';
    }
}
echo '</ul>';
echo '</div>';
echo '</a>';
echo '</div><!-- /sec_col -->';


?>
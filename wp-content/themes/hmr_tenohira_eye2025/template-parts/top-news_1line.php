<?php

/**
 * Template part for トップページ：お知らせ１ライン表示
 *
 */

?>


<?php
$args = array(
    // 投稿から取得
    'post_type' => 'post_emergency',
    // 最新の投稿を取得
    'posts_per_page' => 1,
    'post_status'  => 'publish',
    'order' => 'DESC',
    'orderby' => 'date',
    // 'category_name' => 'news',
);

$myposts = new WP_Query($args);

while ($myposts->have_posts()) {
    $myposts->the_post();
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

    $permalinkurl = get_permalink($post->ID);

    // カテゴリー取得
    $now_term = "";
    $cur_terms = get_the_terms($post->ID, 'post_news_cat');



    // タイトル
    $trimword = '';
    // $trimword .= mb_strimwidth($post->post_title, 0, 1000, '…');
    $trimword .= mb_strimwidth(strip_tags($post->post_title), 0, 140, '…');
    $news_title = $trimword;

    echo '<div class="top_1line_news">';

    echo '<ul>';
    echo '<li>';
    echo '<span class="news_icons">';
    echo '<span class="news_icon">重要なお知らせ</span>';
    echo '</span>';

    echo '<a href="' . $permalinkurl . '">' . $news_title . ' [' . $kiji_post_date . '更新]</a>';
    echo '</li>';
    echo '</ul>';

    echo '</div>';
}
// reset post data
wp_reset_postdata();
?>


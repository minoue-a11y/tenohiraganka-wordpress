<?php

/**
 * Template part for トップページ：スライダーでマガジン記事表示
 *
 */

?>


<?php
// トップスライダー
$args = array(
    // 投稿から取得
    'post_type' => 'post',
    // 最新の投稿を取得
    'posts_per_page' => 10,
    'post_status'  => 'publish',
    'order' => 'DESC',
    'orderby' => 'date',
    // 'category_name' => 'news',
);

$myposts = new WP_Query($args);

while ($myposts->have_posts()) {
    $myposts->the_post();
    get_template_part("template-parts/magazine_top_slide");
}
// reset post data
wp_reset_postdata();
?>
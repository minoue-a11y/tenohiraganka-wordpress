<?php

/**
 * Template part for マガジン：サブページヘッダー
 *
 */

?>

<?php
// // ヘッダー画像：デフォルト
// $thumbnail_srcstr = '<img src="' . get_template_directory_uri() . '/images/subheader_bgimg01.png" alt="画像">';
if (!is_front_page()) {
    // 下層ページ
    $ancestor = "";
    $show_title = "";
    $show_cat_names = [];
    $category_classname = "";
    $category_classnames = [];
    if (is_page()) {
        $org_anc = get_post_ancestors($post->ID);
        $ancestor = array_pop($org_anc);
        if ($ancestor != "") {
            $now_id = $ancestor;
        } else {
            $now_id = $post->ID;
        }
        $show_title = get_the_title($now_id);

        // // thumbnail
        // if (has_post_thumbnail($post->ID)) {
        // 	$thumbnail_id = get_post_thumbnail_id($post->ID);
        // 	$thumbnail_srcstr = wp_get_attachment_image($thumbnail_id, 'full');
        // } else if (has_post_thumbnail($now_id)) {
        // 	$thumbnail_id = get_post_thumbnail_id($now_id);
        // 	$thumbnail_srcstr = wp_get_attachment_image($thumbnail_id, 'full');
        // }
    } else if (is_archive()) {
        if (is_post_type_archive('post_news')) {
            $show_title = esc_html(get_post_type_object(get_post_type())->label);
            $show_title_s = esc_html(get_post_type_object(get_post_type())->description);
        }
        if (is_category()) {
            $cat_id = get_query_var('cat');
            $mycat = get_category($cat_id);
            $show_title = $mycat->cat_name;
            $category_classname = $mycat->category_nicename;
        }
    } else if (is_singular()) {
        if (is_singular('post_news')) {
            $show_title = esc_html(get_post_type_object(get_post_type())->label);
            $show_title_s = esc_html(get_post_type_object(get_post_type())->description);
        }
        if (is_single()) {
            // シングル記事用、カテゴリ表示。
            $post_cats = get_the_category();
            foreach ($post_cats as $post_cat) {
                $show_cat_names[] = $post_cat->cat_name;
                $category_classnames[] = $post_cat->category_nicename;
            }
        }
    } else if (is_search()) {
        $show_title = '検索結果';
    } else if (is_404()) {
        $show_title = 'Not Found';
    }
    // 下層ページヘッダータイトル
    echo '<section id="subpage_header_container">';
    echo '<div class="subpage_header_inner_row">';
    echo '<div class="subpage_header_col">';
    if (is_single()) {
        foreach ($show_cat_names as $i => $cat_name) {
            $cat_classname = isset($category_classnames[$i]) ? $category_classnames[$i] : '';
            echo '<h2 class="' . esc_attr($cat_classname) . '">' . esc_html($cat_name) . '</h2>';
        }
    } else {
        echo '<h2>' . $show_title . '</h2>';
    }
    echo '</div><!-- subpage_header_col -->';
    echo '<div class="subpage_header_tools">';
    echo '<div class="sht_clip_btn">';
    // お気に入りボタン
    echo do_shortcode('[favorite_button post_id="" site_id=""]');
    echo '</div><!-- sht_clip_btn -->';
    echo '<div class="sht_sns_btns">';
    // ▼ SNSボタンを読み込む
    // add To Any SNSボタン
    echo do_shortcode("[addtoany]");
    // get_template_part('template-parts/sns_btns'); // オリジナル作成ボタン（停止）
    echo '</div><!-- sht_sns_btns -->';
    echo '</div><!-- subpage_header_tools -->';
    echo '</div><!-- sebpage_header_inner_row -->';
    echo '</section>';
}
?>


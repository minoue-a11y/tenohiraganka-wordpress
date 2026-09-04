<?php

/**
 * Template part for マガジン：アーカイブ用サブページヘッダー
 *
 */

?>

<?php

if (!is_front_page()) {
    // 下層ページ
    $cat_name = "";

    if (is_archive()) {
        if (is_category()) {
            $cat_id = get_query_var('cat');
            $mycat = get_category($cat_id);
            $cat_name = $mycat->cat_name;
            $category_classname = $mycat->category_nicename;
        }
    }
    // 下層ページヘッダータイトル
    echo '<section id="subpage_header_container">';
    echo '<div class="subpage_header_inner_row">';
    echo '<div class="subpage_header_col">';

    if (is_category()) {
        echo '<h2 class="' . esc_attr($category_classname) . '">' . esc_html($cat_name) . '</h2>';
    }

    echo '</div><!-- subpage_header_col -->';
    echo '</div><!-- sebpage_header_inner_row -->';
    echo '</section>';
}
?>


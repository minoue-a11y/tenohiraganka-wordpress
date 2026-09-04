<?php

/**
 * The sidebar ブログ用：サイドバー
 *
 */

?>

<section id="sidesec_recommend">
    <header class="sec_header">
        <h2>PR</h2>
    </header>
    <?php
    //バナーランダム表示
    echo do_shortcode("[hmr_random_banner parent-tag=div parent-class=recom_items child-tag=div child-class=recom_item]");
    ?>
</section>


<section id="sidesec_ranking">
    <header class="sec_header">
        <h2>人気記事ランキング</h2>
    </header>
    <?php
    // 最も閲覧数の多い投稿
    if (is_active_sidebar('magazine_side_rinking')) {
        dynamic_sidebar('magazine_side_rinking');
    }
    ?>
</section>

<section id="sidesec_category">
    <header class="sec_header">
        <h2>カテゴリー</h2>
    </header>
    <div class="side_cate">
        <ul class="cate_label">
            <?php
            $categories = get_categories(array(
                'orderby'    => 'name',
                'hide_empty' => 1, // 投稿のないカテゴリーは表示しない
            ));
            foreach ($categories as $category) {
                echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
            }
            ?>
        </ul>
    </div>
</section>

<section id="sidesec_tag">
    <header class="sec_header">
        <h2>タグ</h2>
    </header>
    <div class="side_tag">
        <ul class="tag_label">
            <?php
            $tags = get_tags(array(
                'hide_empty' => 1, // 投稿のないタグは表示しない
            ));
            if ($tags) {
                foreach ($tags as $tag) {
                    echo '<li><a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a></li>';
                }
            }
            ?>
        </ul>
    </div>
</section>

<?php
// いつでもどこでもオンライン診療
// クリップした記事をみる
if (is_active_sidebar('magazine_side_etc')) {
    dynamic_sidebar('magazine_side_etc');
}
?>
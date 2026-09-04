<?php

/**
 * Template part for トップページ：お知らせ一覧
 *
 */

?>



<div class="sec_col_lt">
    <ul class="cat_buttons">
        <li class="cat_active">全て</li>
        <?php
        $terms_news = get_terms('post_news_cat'); // ニュースカテゴリー一覧を取得する
        foreach ($terms_news as $term) {
            echo  '<li>' . esc_html($term->name) . '</li>';
        }
        ?>
    </ul>
</div>

<div class="sec_col_rt">

    <div class="news_container cat_active">
        <?php
        // 「全て」のニュース記事を表示する
        $args = array(
            'post_type' => 'post_news',
            'posts_per_page' => 5,
            'post_status'  => 'publish',
            'order' => 'DESC',
            'orderby' => 'date',
        );

        $myposts = new WP_Query($args);

        while ($myposts->have_posts()) {
            $myposts->the_post();
            get_template_part("template-parts/top_news-archive");
        }
        // reset post data
        wp_reset_postdata();
        ?>
    </div><!-- /.news_container -->


    <?php
    // ニュースカテゴリーの数だけループして、カテゴリー別記事を表示する
    $terms_news = get_terms('post_news_cat'); // ニュースカテゴリー一覧を取得する
    foreach ($terms_news as $term) {

        echo '<div class="news_container">';

        $args = array(
            'post_type' => 'post_news',
            'posts_per_page' => 5,
            'post_status' => 'publish',
            'order' => 'DESC',
            'orderby' => 'date',
            'tax_query' => array(
                array(
                    'taxonomy' => 'post_news_cat',
                    'field' => 'slug',
                    'terms' => $term->slug,
                )
            )
        );

        $myposts = new WP_Query($args);

        while ($myposts->have_posts()) {
            $myposts->the_post();
            get_template_part("template-parts/top_news-archive");
        }
        // reset post data
        wp_reset_postdata();

        echo '</div><!-- /.news_container -->';
    }

    ?>
</div>
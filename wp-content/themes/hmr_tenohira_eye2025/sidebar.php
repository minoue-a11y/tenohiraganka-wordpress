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
    // バナーランダム表示
    echo do_shortcode(
        "[hmr_random_banner parent-tag=div parent-class=recom_items child-tag=div child-class=recom_item]"
    );
    ?>
</section>


<section id="sidesec_ranking">
    <header class="sec_header">
        <h2>人気記事ランキング</h2>
    </header>

    <?php
    /**
     * マガジン個別記事の場合
     *
     * 現在の記事と同じタグを1つ以上持つ記事を
     * Post Views Counter の閲覧数順で最大5件表示
     *
     * TOP・カテゴリー・タグ一覧などでは
     * 従来の magazine_side_rinking を表示
     */

    if (is_single() && get_post_type() === 'post') :

        $current_post_id = get_the_ID();
        $current_tags    = get_the_tags($current_post_id);

        /**
         * 現在の記事にタグがある場合
         */
        if (! empty($current_tags)) :

            $tag_ids = wp_list_pluck(
                $current_tags,
                'term_id'
            );

            $ranking_query = new WP_Query(
                array(
                    'post_type'           => 'post',
                    'post_status'         => 'publish',
                    'posts_per_page'      => 5,

                    // 現在の記事自身を除外
                    'post__not_in'        => array(
                        $current_post_id,
                    ),

                    // 現在の記事と同じタグを1つ以上持つ記事
                    'tag__in'             => $tag_ids,

                    // Post Views Counter の閲覧数順
                    'orderby'             => 'post_views',
                    'order'               => 'DESC',

                    'ignore_sticky_posts' => true,
                    'no_found_rows'       => true,
                )
            );

            /**
             * 同一タグの記事が取得できた場合
             */
            if ($ranking_query->have_posts()) :
                ?>

                <ol class="magazine_tag_ranking">

                    <?php
                    $ranking_position = 0;

                    while ($ranking_query->have_posts()) :
                        $ranking_query->the_post();

                        $ranking_position++;
                        ?>

                        <li class="magazine_tag_ranking_item">

                            <span class="magazine_tag_ranking_number">
                                <?php echo esc_html($ranking_position); ?>
                            </span>

                            <a
                                class="magazine_tag_ranking_link"
                                href="<?php echo esc_url(get_permalink()); ?>"
                            >
                                <?php echo esc_html(get_the_title()); ?>
                            </a>

                        </li>

                    <?php endwhile; ?>

                </ol>

                <?php
                wp_reset_postdata();

            /**
             * 同一タグの記事がない場合
             * 従来のランキングを表示
             */
            else :

                if (is_active_sidebar('magazine_side_rinking')) {
                    dynamic_sidebar('magazine_side_rinking');
                }

            endif;

        /**
         * 現在の記事にタグがない場合
         * 従来のランキングを表示
         */
        else :

            if (is_active_sidebar('magazine_side_rinking')) {
                dynamic_sidebar('magazine_side_rinking');
            }

        endif;

    /**
     * TOP・カテゴリー・タグ一覧・アーカイブ等
     * 従来のランキングを1回だけ表示
     */
    else :

        if (is_active_sidebar('magazine_side_rinking')) {
            dynamic_sidebar('magazine_side_rinking');
        }

    endif;
    ?>

</section>


<section id="sidesec_category">
    <header class="sec_header">
        <h2>カテゴリー</h2>
    </header>

    <div class="side_cate">
        <ul class="cate_label">

            <?php
            $categories = get_categories(
                array(
                    'orderby'    => 'name',
                    'hide_empty' => 1,
                )
            );

            foreach ($categories as $category) {

                echo '<li><a href="'
                    . esc_url(
                        get_category_link(
                            $category->term_id
                        )
                    )
                    . '">'
                    . esc_html($category->name)
                    . '</a></li>';
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
            $tags = get_tags(
                array(
                    'hide_empty' => 1,
                )
            );

            if ($tags) {

                foreach ($tags as $tag) {

                    echo '<li><a href="'
                        . esc_url(
                            get_tag_link(
                                $tag->term_id
                            )
                        )
                        . '">'
                        . esc_html($tag->name)
                        . '</a></li>';
                }
            }
            ?>

        </ul>
    </div>
</section>


<?php
/**
 * いつでもどこでもオンライン診療
 * クリップした記事をみる
 */
if (is_active_sidebar('magazine_side_etc')) {
    dynamic_sidebar('magazine_side_etc');
}
?>
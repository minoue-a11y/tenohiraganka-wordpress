<?php

/**
 * Template part for ショートコードで、固定ページ内に投稿一覧を表示する
 * functions.phpのpage_insert_post()より呼ばれる
 */

// functions.phpから渡された$argsを受け取り、デフォルト値とマージします。
$params = wp_parse_args(
    $args,
    array(
        'post_ids'      => array(),
    )
);

if (! empty($params['post_ids'])) :

    $query_args = array(
        'post_type'      => 'post',
        'post__in'       => $params['post_ids'],
        'orderby'        => 'post__in', // ショートコードで指定したIDの順で表示
        'posts_per_page' => -1, // 全ての指定された投稿を取得
        'ignore_sticky_posts' => 1,
    );

    $posts_query = new WP_Query($query_args);

    if ($posts_query->have_posts()) :
?>
        <div class="inserted-posts-wrapper">
            <?php
            while ($posts_query->have_posts()) :
                $posts_query->the_post();
            ?>
                <article class="inserted-post-item">
                    <a href="<?php the_permalink(); ?>">
                        <div class="inserted-post-thumbnail">
                            <?php
                            if (has_post_thumbnail()) {
                                // サムネイル画像を表示（サイズは 'thumbnail', 'medium', 'large' などから選択可能）
                                the_post_thumbnail('thumbnail');
                            } else {
                                // サムネイルがない場合のプレースホルダー画像
                                echo '<img width="150" height="150" src="' . esc_url(get_template_directory_uri()) . '/images/img_dummy_news.png" alt="">';
                            }
                            ?>
                        </div>
                        <div class="inserted-post-summary">
                            <h3 class="inserted-post-title"><?php the_title(); ?></h3>
                            <div class="inserted-post-excerpt">
                                <?php
                                // 投稿の本文を取得し、ショートコードとHTMLタグを除去
                                $content = strip_tags(strip_shortcodes(get_the_content()));
                                // 本文を200文字に丸めて表示
                                $trimmed_content = mb_strimwidth($content, 0, 200, '…');
                                echo '<p>' . esc_html($trimmed_content) . '</p>';
                                ?>
                            </div>
                        </div>
                    </a>
                </article>
            <?php endwhile; ?>
        </div>
<?php
    endif;
    wp_reset_postdata(); // WP_Queryのループの後に必須
endif;
?>
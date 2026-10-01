<?php
/**
 * MAGAZINE
 * あわせて読みたい記事
 *
 * 現在の記事と同じタグを1つ以上持つ記事を
 * 新着順で最大3件表示する
 */

$current_post_id = get_the_ID();

// 現在の記事に設定されているタグを取得
$tags = get_the_tags($current_post_id);

if (empty($tags)) {
    return;
}

// タグIDを取得
$tag_ids = wp_list_pluck(
    $tags,
    'term_id'
);

// 同じタグを1つ以上持つ関連記事を取得
$related_query = new WP_Query(
    array(
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => 3,
        'post__not_in'        => array($current_post_id),
        'tag__in'             => $tag_ids,
        'ignore_sticky_posts' => true,
        'orderby'             => 'date',
        'order'               => 'DESC',
        'no_found_rows'       => true,
    )
);

// 関連記事がない場合は何も表示しない
if (! $related_query->have_posts()) {
    return;
}
?>

<section
    class="magazine_related_posts"
    aria-labelledby="magazine-related-posts-heading"
>

    <div
        id="magazine-related-posts-heading"
        class="magazine_related_posts_heading"
    >
        あわせて読みたい記事
    </div>

    <div class="magazine_related_posts_list">

        <?php
        $position = 0;

        while ($related_query->have_posts()) :
            $related_query->the_post();

            $position++;

            // 関連記事の本文を取得
            $related_content = get_post_field(
                'post_content',
                get_the_ID()
            );

            // ショートコードを削除
            $related_content = strip_shortcodes(
                $related_content
            );

            // Gutenbergコメントを削除
            $related_content = preg_replace(
                '/<!--.*?-->/s',
                '',
                $related_content
            );

            // HTMLタグを削除
            $related_content = wp_strip_all_tags(
                $related_content
            );

            // 改行・連続空白を整理
            $related_content = preg_replace(
                '/\s+/u',
                ' ',
                $related_content
            );

            $related_content = trim(
                $related_content
            );

            // 本文冒頭100文字を取得
            if (function_exists('mb_substr')) {
                $excerpt = mb_substr(
                    $related_content,
                    0,
                    100,
                    'UTF-8'
                );
            } else {
                $excerpt = wp_html_excerpt(
                    $related_content,
                    100,
                    ''
                );
            }
        ?>

            <article class="magazine_related_post">

                <div class="magazine_related_post_thumbnail">

                    <a
                        href="<?php echo esc_url(get_permalink()); ?>"
                        data-link-type="related_article"
                        data-related-position="<?php echo esc_attr($position); ?>"
                        aria-label="<?php echo esc_attr(get_the_title()); ?>"
                    >

                        <?php if (has_post_thumbnail()) : ?>

                            <?php
                            the_post_thumbnail(
                                'medium',
                                array(
                                    'loading' => 'lazy',
                                )
                            );
                            ?>

                        <?php else : ?>

                            <img
                                src="<?php echo esc_url(
                                    get_template_directory_uri()
                                    . '/images/img_dummy_news.png'
                                ); ?>"
                                alt=""
                                loading="lazy"
                            >

                        <?php endif; ?>

                    </a>

                </div>

                <div class="magazine_related_post_body">

                    <div class="magazine_related_post_title">

                        <a
                            href="<?php echo esc_url(get_permalink()); ?>"
                            data-link-type="related_article"
                            data-related-position="<?php echo esc_attr($position); ?>"
                        >
                            <?php echo esc_html(get_the_title()); ?>
                        </a>

                    </div>

                    <?php if ($excerpt !== '') : ?>

                        <p class="magazine_related_post_excerpt">
                            <?php echo esc_html($excerpt); ?>...
                        </p>

                    <?php endif; ?>

                </div>

            </article>

        <?php endwhile; ?>

    </div>

</section>

<?php
// メインクエリの投稿データへ戻す
wp_reset_postdata();
?>
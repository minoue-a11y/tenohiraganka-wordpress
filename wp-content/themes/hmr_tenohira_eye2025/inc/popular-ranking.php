<?php
/**
 * Popular Ranking
 *
 * 人気記事ランキングページ用
 *
 * - Post Views Counter の閲覧数順
 * - 最大10件
 * - カテゴリ絞り込み
 * - 順位表示
 * - 集計根拠表示
 */

if (! defined('ABSPATH')) {
    exit;
}


/**
 * 人気記事ランキング ショートコード
 *
 * Usage:
 * [tenohira_popular_ranking]
 *
 * 表示カテゴリを限定する場合：
 * [tenohira_popular_ranking categories="symptoms,selfcare,online_shinryo"]
 */
function tenohira_popular_ranking_shortcode($atts)
{
    $atts = shortcode_atts(
        array(
            'posts_per_page' => 10,
            'categories'     => '',
        ),
        $atts,
        'tenohira_popular_ranking'
    );

    $posts_per_page = absint($atts['posts_per_page']);

    if ($posts_per_page < 1) {
        $posts_per_page = 10;
    }

    /*
     * ----------------------------------------
     * ランキングで表示するカテゴリを固定
     * 表示順：目の病気 → 目の症状 → 目の治療 → 目の薬 → セルフケア
     * ----------------------------------------
     */

    $ranking_category_names = array(
        '目の病気',
        '目の症状',
        '目の治療',
        '目の薬',
        'セルフケア',
    );

    $categories = array();

    foreach ($ranking_category_names as $ranking_category_name) {
        $ranking_category = get_term_by(
            'name',
            $ranking_category_name,
            'category'
        );

        if (
            $ranking_category
            && ! is_wp_error($ranking_category)
            && (int) $ranking_category->count > 0
        ) {
            $categories[] = $ranking_category;
        }
    }


    /*
     * ----------------------------------------
     * 現在選択されているカテゴリ
     * ----------------------------------------
     */

    $selected_category_slug = '';

    if (
        isset($_GET['ranking_category'])
        && is_string($_GET['ranking_category'])
    ) {
        $selected_category_slug = sanitize_title(
            wp_unslash($_GET['ranking_category'])
        );
    }

    $selected_category = null;

    if ($selected_category_slug !== '') {

        $selected_category = get_category_by_slug(
            $selected_category_slug
        );

        /*
         * 指定5カテゴリ以外、または存在しないカテゴリは
         * 「すべて」に戻す。
         */
        $allowed_category_ids = array_map(
            'intval',
            wp_list_pluck($categories, 'term_id')
        );

        if (
            ! $selected_category
            || ! in_array(
                (int) $selected_category->term_id,
                $allowed_category_ids,
                true
            )
        ) {
            $selected_category_slug = '';
            $selected_category = null;
        }
    }


    /*
     * ----------------------------------------
     * WP_Query
     * ----------------------------------------
     */

    $query_args = array(
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => $posts_per_page,

        /*
         * Post Views Counter が
         * 閲覧数順へ変換する
         */
        'orderby'             => 'post_views',
        'order'               => 'DESC',

        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
    );

    /*
     * カテゴリ指定
     */
    if ($selected_category) {
        $query_args['cat'] = (int) $selected_category->term_id;
    }

    $ranking_query = new WP_Query($query_args);


    /*
     * ----------------------------------------
     * HTML出力
     * ----------------------------------------
     */

    ob_start();
    ?>

    <div class="popular_ranking">

        <section class="popular_ranking_fv" aria-label="人気記事ランキング">

            <div class="popular_ranking_fv_copy">
                <p class="popular_ranking_description">
                    記事公開後から現在までの累計閲覧数をもとに、
                    閲覧数の多い順にランキング形式で掲載しています。
                    ランキングは閲覧状況に応じて自動的に更新されます。
                </p>
            </div>

            <div class="popular_ranking_fv_visual" aria-hidden="true">
                <img
                    src="<?php echo esc_url(get_template_directory_uri() . '/images/popular-ranking/popular-ranking-hero.png'); ?>"
                    alt=""
                    loading="eager"
                    fetchpriority="high"
                    decoding="async"
                >
            </div>

        </section>

        <div class="popular_ranking_info">

            <dl class="popular_ranking_conditions">

                <div class="popular_ranking_condition">
                    <div class="popular_ranking_condition_icon" aria-hidden="true">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/images/popular-ranking/popular-ranking-icon-views.png'); ?>" alt="" loading="lazy" decoding="async">
                    </div>
                    <div class="popular_ranking_condition_text">
                        <dt>集計指標</dt>
                        <dd>記事閲覧数</dd>
                    </div>
                </div>

                <div class="popular_ranking_condition">
                    <div class="popular_ranking_condition_icon" aria-hidden="true">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/images/popular-ranking/popular-ranking-icon-period.png'); ?>" alt="" loading="lazy" decoding="async">
                    </div>
                    <div class="popular_ranking_condition_text">
                        <dt>集計期間</dt>
                        <dd>記事公開後から現在まで</dd>
                    </div>
                </div>

                <div class="popular_ranking_condition">
                    <div class="popular_ranking_condition_icon" aria-hidden="true">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/images/popular-ranking/popular-ranking-icon-order.png'); ?>" alt="" loading="lazy" decoding="async">
                    </div>
                    <div class="popular_ranking_condition_text">
                        <dt>表示順</dt>
                        <dd>閲覧数の多い順</dd>
                    </div>
                </div>

                <div class="popular_ranking_condition">
                    <div class="popular_ranking_condition_icon" aria-hidden="true">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/images/popular-ranking/popular-ranking-icon-update.png'); ?>" alt="" loading="lazy" decoding="async">
                    </div>
                    <div class="popular_ranking_condition_text">
                        <dt>更新</dt>
                        <dd>自動更新</dd>
                    </div>
                </div>

            </dl>

        </div>


        <?php if (! empty($categories)) : ?>

            <nav
                class="popular_ranking_filter"
                aria-label="ランキングのカテゴリを選択"
            >

                <div class="popular_ranking_filter_list">

                    <a
                        href="<?php echo esc_url(get_permalink()); ?>"
                        class="popular_ranking_filter_button<?php
                        echo $selected_category_slug === ''
                            ? ' is-active'
                            : '';
                        ?>"
                    >
                        すべて
                    </a>

                    <?php foreach ($categories as $category) : ?>

                        <?php
                        $category_ranking_url = add_query_arg(
                            'ranking_category',
                            $category->slug,
                            get_permalink()
                        );
                        ?>

                        <a
                            href="<?php echo esc_url($category_ranking_url); ?>"
                            class="popular_ranking_filter_button<?php
                            echo $selected_category_slug === $category->slug
                                ? ' is-active'
                                : '';
                            ?>"
                        >
                            <?php echo esc_html($category->name); ?>
                        </a>

                    <?php endforeach; ?>

                </div>

            </nav>

        <?php endif; ?>


        <?php if ($selected_category) : ?>

            <div class="popular_ranking_current_category">
                「<?php echo esc_html($selected_category->name); ?>」
                の人気記事ランキング
            </div>

        <?php endif; ?>


        <?php if ($ranking_query->have_posts()) : ?>

            <ol class="popular_ranking_list">

                <?php
                $ranking_position = 0;

                while ($ranking_query->have_posts()) :
                    $ranking_query->the_post();

                    $ranking_position++;

                    /*
                     * 本文冒頭100文字
                     */
                    $ranking_content = get_post_field(
                        'post_content',
                        get_the_ID()
                    );

                    $ranking_content = strip_shortcodes(
                        $ranking_content
                    );

                    $ranking_content = preg_replace(
                        '/<!--.*?-->/s',
                        '',
                        $ranking_content
                    );

                    $ranking_content = wp_strip_all_tags(
                        $ranking_content
                    );

                    $ranking_content = preg_replace(
                        '/\s+/u',
                        ' ',
                        $ranking_content
                    );

                    $ranking_content = trim(
                        $ranking_content
                    );

                    if (function_exists('mb_substr')) {

                        $ranking_excerpt = mb_substr(
                            $ranking_content,
                            0,
                            100,
                            'UTF-8'
                        );

                    } else {

                        $ranking_excerpt = wp_html_excerpt(
                            $ranking_content,
                            100,
                            ''
                        );
                    }
                    ?>

                    <li class="popular_ranking_item">

                        <a
                            class="popular_ranking_item_link"
                            href="<?php echo esc_url(get_permalink()); ?>"
                            aria-label="<?php echo esc_attr(get_the_title()); ?>"
                        >

                            <div class="popular_ranking_number">
                                <span class="popular_ranking_number_value">
                                    <?php echo esc_html($ranking_position); ?>
                                </span>
                            </div>


                            <div class="popular_ranking_thumbnail">

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
                                        src="<?php
                                        echo esc_url(
                                            get_template_directory_uri()
                                            . '/images/img_dummy_news.png'
                                        );
                                        ?>"
                                        alt=""
                                        loading="lazy"
                                    >

                                <?php endif; ?>

                            </div>


                            <div class="popular_ranking_body">

                                <div class="popular_ranking_title">
                                    <?php echo esc_html(get_the_title()); ?>
                                </div>


                            <?php if ($ranking_excerpt !== '') : ?>

                                <p class="popular_ranking_excerpt">
                                    <?php
                                    echo esc_html(
                                        $ranking_excerpt
                                    );
                                    ?>...
                                </p>

                            <?php endif; ?>


                            <?php
                            $post_categories = get_the_category();

                            if (! empty($post_categories)) :
                                ?>

                                <div class="popular_ranking_categories">

                                    <?php foreach ($post_categories as $post_category) : ?>

                                        <span class="popular_ranking_category">
                                            <?php
                                            echo esc_html(
                                                $post_category->name
                                            );
                                            ?>
                                        </span>

                                    <?php endforeach; ?>

                                </div>

                            <?php endif; ?>

                            </div>

                        </a>

                    </li>

                <?php endwhile; ?>

            </ol>

            <?php
            wp_reset_postdata();
            ?>

        <?php else : ?>

            <p class="popular_ranking_empty">
                該当する記事はありません。
            </p>

        <?php endif; ?>

    </div>

    <?php

    return ob_get_clean();
}

add_shortcode(
    'tenohira_popular_ranking',
    'tenohira_popular_ranking_shortcode'
);


/**
 * カテゴリ絞り込み後のURLは
 * 検索インデックス対象にしない。
 *
 * /popular_ranking_top/?ranking_category=xxx
 */
function tenohira_popular_ranking_robots($robots)
{
    if (
        is_page('popular_ranking_top')
        && isset($_GET['ranking_category'])
        && $_GET['ranking_category'] !== ''
    ) {
        $robots['noindex'] = true;
        $robots['follow']  = true;
    }

    return $robots;
}

add_filter(
    'wp_robots',
    'tenohira_popular_ranking_robots'
);

/**
 * 人気記事ランキングページの固定ページタイトルを動的に変更
 *
 * - すべて：人気記事ランキング
 * - カテゴリ選択時：{カテゴリ名}の人気記事ランキング
 */
function tenohira_popular_ranking_dynamic_page_title($title, $post_id)
{
    if (is_admin()) {
        return $title;
    }

    $ranking_page = get_page_by_path('popular_ranking_top');

    if (
        ! $ranking_page
        || (int) $post_id !== (int) $ranking_page->ID
    ) {
        return $title;
    }

    $dynamic_title = '人気記事ランキング';

    if (
        isset($_GET['ranking_category'])
        && is_string($_GET['ranking_category'])
    ) {
        $selected_slug = sanitize_title(
            wp_unslash($_GET['ranking_category'])
        );

        if ($selected_slug !== '') {
            $selected_category = get_category_by_slug($selected_slug);

            $allowed_category_names = array(
                '目の病気',
                '目の症状',
                '目の治療',
                '目の薬',
                'セルフケア',
            );

            if (
                $selected_category
                && in_array(
                    $selected_category->name,
                    $allowed_category_names,
                    true
                )
            ) {
                $dynamic_title = sprintf(
                    '%sの人気記事ランキング',
                    $selected_category->name
                );
            }
        }
    }

    return $dynamic_title;
}
add_filter(
    'the_title',
    'tenohira_popular_ranking_dynamic_page_title',
    20,
    2
);

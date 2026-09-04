<?php

/**
 * hmr_s_base-gtn functions and definitions
 *
 */

if (!function_exists('hmr_s_base_gtn_setup')) :
	function hmr_s_base_gtn_setup()
	{
		load_theme_textdomain('hmr___s_base_gtn_base-gtn', get_template_directory() . '/languages');

		add_theme_support('title-tag');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'menu-1' => esc_html__('global_navi', 'hmr___s_base_gtn_base-gtn'),
		));

		// Add support for Block Styles.
		add_theme_support('wp-block-styles');

		add_theme_support('editor-styles');
		add_editor_style('style-editor.css');

		// add テンプレートパーツ
		add_theme_support('block-template-parts');


		// 以下、theme.json追加で自動的に有効のためコメントアウト
		// ===
		// add_theme_support('automatic-feed-links');

		add_theme_support('post-thumbnails');
		// set_post_thumbnail_size(1200, 675, true);



		// add_theme_support('responsive-embeds');

		// add_theme_support('html5', array(
		// 	'search-form',
		// 	'comment-form',
		// 	'comment-list',
		// 	'gallery',
		// 	'caption',
		// ));
	}
endif;
add_action('after_setup_theme', 'hmr_s_base_gtn_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hmr_s_base_gtn_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('hmr_s_base_gtn_content_width', 800);
}
add_action('after_setup_theme', 'hmr_s_base_gtn_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hmr_s_base_gtn_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html__('マガジン：ヘッダー文言'),
		'id'            => 'magazine_header_txt',
		'description'   => esc_html__('ウィジェット追加'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<!-- ',
		'after_title'   => ' -->',
	));
	// メニュー：magazine_global_naviで作成
	// register_sidebar(array(
	// 	'name'          => esc_html__('マガジン：Globalナビ'),
	// 	'id'            => 'magazine_global_navi',
	// 	'description'   => esc_html__('ウィジェット追加'),
	// 	'before_widget' => '',
	// 	'after_widget'  => '',
	// 	'before_title'  => '<!-- ',
	// 	'after_title'   => ' -->',
	// ));
	register_sidebar(array(
		'name'          => esc_html__('マガジン：Globalサイドナビ'),
		'id'            => 'magazine_global_side_navi',
		'description'   => esc_html__('ウィジェット追加'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<!-- ',
		'after_title'   => ' -->',
	));
	register_sidebar(array(
		'name'          => esc_html__('マガジン：Globalサイド：オンライン診療'),
		'id'            => 'magazine_global_side_online_shinryo',
		'description'   => esc_html__('ウィジェット追加'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<!-- ',
		'after_title'   => ' -->',
	));
	register_sidebar(array(
		'name'          => esc_html__('マガジン：Drawer内：オンライン診療：案内、予約'),
		'id'            => 'magazine_online_shinryo_2btn',
		'description'   => esc_html__('ウィジェット追加'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<!-- ',
		'after_title'   => ' -->',
	));
	register_sidebar(array(
		'name'          => esc_html__('マガジン：サイドバー：ランキング'),
		'id'            => 'magazine_side_rinking',
		'description'   => esc_html__('ウィジェット追加'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<!-- ',
		'after_title'   => ' -->',
	));
	register_sidebar(array(
		'name'          => esc_html__('マガジン：サイドバー：その他'),
		'id'            => 'magazine_side_etc',
		'description'   => esc_html__('ウィジェット追加'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<!-- ',
		'after_title'   => ' -->',
	));
	register_sidebar(array(
		'name'          => esc_html__('マガジン：記事フッター問い合わせ'),
		'id'            => 'magazine_kiji_footer_toiawase',
		'description'   => esc_html__('ウィジェット追加'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<!-- ',
		'after_title'   => ' -->',
	));

	register_sidebar(array(
		'name'          => esc_html__('本体：トップメイン画像'),
		'id'            => 'main_site_top_main_img',
		'description'   => esc_html__('ウィジェット追加'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<!-- ',
		'after_title'   => ' -->',
	));
	register_sidebar(array(
		'name'          => esc_html__('本体：Globalナビ'),
		'id'            => 'main_site_global_navi',
		'description'   => esc_html__('ウィジェット追加'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<!-- ',
		'after_title'   => ' -->',
	));
	register_sidebar(array(
		'name'          => esc_html__('本体：Footer SiteMapナビ'),
		'id'            => 'main_site_footer_sitemap_navi',
		'description'   => esc_html__('ウィジェット追加'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<!-- ',
		'after_title'   => ' -->',
	));
	register_sidebar(array(
		'name'          => esc_html__('本体：Drawerナビ'),
		'id'            => 'main_site_drawer_navi',
		'description'   => esc_html__('ウィジェット追加'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<!-- ',
		'after_title'   => ' -->',
	));
	register_sidebar(array(
		'name'          => esc_html__('本体：空き枠確認・予約ボタン'),
		'id'            => 'main_site_aki_kakunin_yoyaku',
		'description'   => esc_html__('ウィジェット追加'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<!-- ',
		'after_title'   => ' -->',
	));

	register_sidebar(array(
		'name'          => esc_html__('本体：フッター問い合わせ'),
		'id'            => 'main_site_footer_toiawase',
		'description'   => esc_html__('ウィジェット追加'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<!-- ',
		'after_title'   => ' -->',
	));
	register_sidebar(array(
		'name'          => esc_html__('フッター：ドライアイセルフチェックボタン'),
		'id'            => 'dry_eye_self_check_btn',
		'description'   => esc_html__('ウィジェット追加'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<!-- ',
		'after_title'   => ' -->',
	));

	// SNSボタンは、AddToAnyプラグインに変更した
	// register_sidebar(array(
	// 	'name'          => esc_html__('マガジン：サイド・フッター用SNSボタン'),
	// 	'id'            => 'side_footer_sns_btn',
	// 	'description'   => esc_html__('ウィジェット追加'),
	// 	'before_widget' => '',
	// 	'after_widget'  => '',
	// 	'before_title'  => '<!-- ',
	// 	'after_title'   => ' -->',
	// ));
	// register_sidebar(array(
	// 	'name'          => esc_html__('本体：フッター用SNSボタン'),
	// 	'id'            => 'main_site_footer_sns_btn',
	// 	'description'   => esc_html__('ウィジェット追加'),
	// 	'before_widget' => '',
	// 	'after_widget'  => '',
	// 	'before_title'  => '<!-- ',
	// 	'after_title'   => ' -->',
	// ));

	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'hmr___s_base_gtn_base-gtn'),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Add widgets here.', 'hmr___s_base_gtn_base-gtn'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'hmr_s_base_gtn_widgets_init');

// 目次は独自のショートコード
require_once __DIR__ . '/index_navigation.php';

// ランダムバナーを表示するショートコード
add_shortcode('hmr_random_banner', function ($atts) {
	global $wpdb, $InxEasyBannerLink;

	$limit = 3;
	$sql = $wpdb->prepare(
		"SELECT * FROM $InxEasyBannerLink->tbl_banner ORDER BY RAND() LIMIT %d ",
		$limit
	);
	$data_arr = $wpdb->get_results($sql);
	if (! $data_arr) {
		return ''; // バナーがない場合は何も表示しない
	}

	$out_result = '';
	if (! empty($data_arr)) {
		$a_class = isset($atts['a-class']) ? $atts['a-class'] : '';
		$img_class = isset($atts['img-class']) ? $atts['img-class'] : '';

		$parent_tag = 'ul';
		if (isset($atts['parent-tag'])) {
			if (empty($atts['parent-tag'])) {
				$parent_tag = '';
			} else {
				$parent_tag = $atts['parent-tag'];
			}
		}

		$child_tag = 'li';
		if (isset($atts['child-tag'])) {
			if (empty($atts['child-tag'])) {
				$child_tag = '';
			} else {
				$child_tag = $atts['child-tag'];
			}
		}

		$parent_class = isset($atts['parent-class']) ? $atts['parent-class'] : '';
		$child_class = isset($atts['child-class']) ? $atts['child-class'] : '';

		foreach ($data_arr as $num => $arr) {
			$link_arr = array("", "");
			if (! empty($arr->url)) {
				$a_target = '';
				if ($arr->target > 0) {
					$a_target = ' target="_blank"';
				}
				$link_arr[0] = '<a class="' . $a_class . '" href="' . $arr->url . '"' . $a_target . '>';
				$link_arr[1] = '</a>';
			}

			if (empty($child_tag)) {
				$out_result .= $link_arr[0];
				$out_result .= '<img class="' . $img_class . '" src="' . $arr->banner_img . '" />';
				$out_result .= $link_arr[1];
			} else {
				$out_result .= '<' . $child_tag . ' class="' . $child_class . '">';
				$out_result .= $link_arr[0];
				$out_result .= '<img class="' . $img_class . '" src="' . $arr->banner_img . '" />';
				$out_result .= $link_arr[1];
				$out_result .= '</' . $child_tag . '>';
			}
		}

		if (empty($parent_tag)) {
			$out_result = $out_result;
		} else {
			$out_result = '<' . $parent_tag . ' class="' . $parent_class . '">' . $out_result . '</' . $parent_tag . '>';
		}
	}

	return $out_result;
});

/**
 * Enqueue scripts and styles.
 */
function hmr_s_base_gtn_scripts()
{
	wp_enqueue_style('hmr___s_base_gtn_base-gtn-style', get_stylesheet_uri());

	// == add
	wp_enqueue_script('hmr_custom-moveTomin', get_template_directory_uri() . '/js/moveTo.min.js', array('jquery'), '202509001');
	wp_enqueue_script('hmr_custom-pagetopscroll', get_template_directory_uri() . '/js/pagetopscroll.js', array('jquery'), '202509001');
	wp_enqueue_script('hmr_custom-custom_drawer', get_template_directory_uri() . '/js/custom_drawer.js', array('jquery'), '202509001');
	wp_enqueue_script('hmr_custom-color_change', get_template_directory_uri() . '/js/color_change.js', array('jquery'), '202509001');
	wp_enqueue_script('hmr_custom-custom_script', get_template_directory_uri() . '/js/custom_script.js', array('jquery'), '202509001');
	wp_enqueue_script('hmr_custom-slick_min_js', get_template_directory_uri() . '/slick/slick.min.js', array('jquery'), '202509001');

	//	slick 
	wp_enqueue_style('hmr_custom-slick_css', get_template_directory_uri() . '/slick/slick.css', "", '202509001', 'all');
	wp_enqueue_style('hmr_custom-slick-theme_css', get_template_directory_uri() . '/slick/slick-theme.css', "", '202509001', 'all');


	// reset.cssは、header.phpの一番初めに直接記述：
	// wp_enqueue_style('hmr_custom-reset_css', get_template_directory_uri() . '/css/destyle.min.css', "", '202509001', 'all');

	if (is_front_page()) {
		// フロントページ
		wp_enqueue_style('hmr_custom-design_css', get_template_directory_uri() . '/css/style_design.css', "", '202509001', 'all');
		wp_enqueue_style('hmr_custom-toppage_css', get_template_directory_uri() . '/css/component/toppage.css', "", '202509001', 'all');
		wp_enqueue_script('hmr_custom-top_slick', get_template_directory_uri() . '/js/top_slick.js', array('jquery'), '202509001');
	} else {
		if (is_page('magazine')) {
			// 固定ページ「magazine_top」スラッグ
			wp_enqueue_style('hmr_custom-design_magazine_css', get_template_directory_uri() . '/css_magazine/style_design.css', "", '202509001', 'all');
			wp_enqueue_style('hmr_custom-toppage_magazine_css', get_template_directory_uri() . '/css_magazine/component/toppage.css', "", '202509001', 'all');
			wp_enqueue_script('hmr_custom-top_slick_magazine', get_template_directory_uri() . '/js/top_slick_magazine.js', array('jquery'), '202509001');
		} elseif (is_singular('post_news') || is_post_type_archive('post_news') || is_tax('post_news_cat') || is_singular('post_emergency') || is_post_type_archive('post_emergency')) {
			// 本体用：お知らせsingle
			wp_enqueue_style('hmr_custom-design_css', get_template_directory_uri() . '/css/style_design.css', "", '202509001', 'all');
			wp_enqueue_style('hmr_custom-page_css', get_template_directory_uri() . '/css/component/page.css', "", '202509001', 'all');
		} elseif (is_page(array('popular_ranking', 'page_favorites', 'eye_symptoms', 'eye_diseases', 'eye_selfcare', 'eye_online_shinryo', 'column_newinfo'))) {
			// マガジン用固定ページ
			wp_enqueue_style('hmr_custom-design_magazine_css', get_template_directory_uri() . '/css_magazine/style_design.css', "", '202509001', 'all');
			wp_enqueue_style('hmr_custom-page_magazine_css', get_template_directory_uri() . '/css_magazine/component/page.css', "", '202509001', 'all');
		} elseif (is_page()) {
			// 本体用固定ページ
			wp_enqueue_style('hmr_custom-design_css', get_template_directory_uri() . '/css/style_design.css', "", '202509001', 'all');
			wp_enqueue_style('hmr_custom-page_css', get_template_directory_uri() . '/css/component/page.css', "", '202509001', 'all');
			if (is_page('dryeye_selfcheck')) {
				// ドライアイセルフチェックページ
				wp_enqueue_script('hmr_custom-dryeye_count_down', get_template_directory_uri() . '/js/dryeye_count_down.js', array('jquery'), '202509001');
			}
		} elseif (is_search()) {
			// 検索結果ページの処理を分離
			$post_types = get_query_var('post_type');
			if (!empty($post_types) && (in_array('post', (array)$post_types) || $post_types === 'post')) {
				// searchform-post_only.phpからの検索（投稿のみ）
				wp_enqueue_style('hmr_custom-design_magazine_css', get_template_directory_uri() . '/css_magazine/style_design.css', "", '202509001', 'all');
				wp_enqueue_style('hmr_custom-page_magazine_css', get_template_directory_uri() . '/css_magazine/component/page.css', "", '20260303', 'all');
			} else {
				// searchform.phpからの検索（全体検索）
				wp_enqueue_style('hmr_custom-design_css', get_template_directory_uri() . '/css/style_design.css', "", '202509001', 'all');
				wp_enqueue_style('hmr_custom-page_css', get_template_directory_uri() . '/css/component/page.css', "", '202509001', 'all');
			}
		} elseif (is_single() || is_category() || is_tag() || is_author() || is_date() || is_archive()) {
			// 投稿・投稿アーカイブ
			wp_enqueue_style('hmr_custom-design_magazine_css', get_template_directory_uri() . '/css_magazine/style_design.css', "", '202509001', 'all');
			wp_enqueue_style('hmr_custom-page_magazine_css', get_template_directory_uri() . '/css_magazine/component/page.css', "", '20260303', 'all');
		} else {
			wp_enqueue_style('hmr_custom-design_css', get_template_directory_uri() . '/css/style_design.css', "", '202509001', 'all');
			wp_enqueue_style('hmr_custom-page_css', get_template_directory_uri() . '/css/component/page.css', "", '202509001', 'all');
		}
	}

	wp_enqueue_style('hmr_custom-print-css', get_template_directory_uri() . '/css/print.css', "", '202509001', 'print');
}
add_action('wp_enqueue_scripts', 'hmr_s_base_gtn_scripts');


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';
// ブロックテーマでもメニューに「カスタマイズ」の項目を出力させる
add_action('customize_register', '__return_true');



// == add

/* 画像ページをインデックスから除外 */
function custom_add_noindex_attachment()
{
	if (is_attachment()) {
		echo '<meta name="robots" content="noindex,nofollow">';
	}
}
add_action('wp_head', 'custom_add_noindex_attachment');


/* 絵文字除去 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');


/* wp-json除去 */
remove_action('wp_head', 'rest_output_link_wp_head');
/* meta generator除去 */
remove_action('wp_head', 'wp_generator');
/* 短縮URL除去 */
remove_action('wp_head', 'wp_shortlink_wp_head');
/* コメント用rss除去 */
remove_action('wp_head', 'feed_links_extra', 3);
/* xmlrpc除去 */
add_filter('xmlrpc_enabled', '__return_false');
/* ヘッダー情報消去 */
function remove_x_pingback($headers)
{
	unset($headers['X-Pingback']);
	return $headers;
}
add_filter('wp_headers', 'remove_x_pingback');

/* セルフピンバックの停止 */
function no_self_ping(&$links)
{
	$home = get_option('home');
	foreach ($links as $l => $link)
		if (0 === strpos($link, $home))
			unset($links[$l]);
}
add_action('pre_ping', 'no_self_ping');

/* ブログ投稿ツール除去 */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

/* attachmentページでステータス404を返す */
add_action('template_redirect', 'status404');
function status404()
{
	// attachmentページだった場合
	if (is_attachment()) {
		global $wp_query;
		$wp_query->set_404();
		status_header(404);
	}
}

/* Editor-style キャッシュしない */
function extend_tiny_mce_before_init($mce_init)
{
	$mce_init['cache_suffix'] = 'v=' . time();
	return $mce_init;
}
add_filter('tiny_mce_before_init', 'extend_tiny_mce_before_init');

/* ブロックエディタ　自動保存間隔 */
function change_autosave($editor_settings)
{
	$editor_settings['autosaveInterval'] = 300;
	return $editor_settings;
}
add_filter('block_editor_settings_all', 'change_autosave');

/* canonicalタグ削除 */
remove_action('wp_head', 'rel_canonical');



// XMLサイトマップから著者アーカイブを消す
add_filter('wp_sitemaps_add_provider', function ($provider, $name) {
	if ('users' === $name) {
		return false;
	}
	return $provider;
},  10, 2);


// 投稿者アーカイブのリダイレクトを無効化する
function disable_author_archive_query()
{
	if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING']) && !preg_match('/post_author=/i', $_SERVER['QUERY_STRING'])) {
		wp_redirect(home_url());
		exit;
	}
}
add_action('init', 'disable_author_archive_query');


/* 検索結果テンプレート切り替え */
add_filter('template_include', 'custom_search_template');
function custom_search_template($template)
{
	if (is_search()) {
		$post_types = get_query_var('post_type');

		// post_typeが指定されている場合（投稿のみの検索）
		if (!empty($post_types)) {
			if (is_array($post_types)) {
				$post_type = $post_types[0];
			} else {
				$post_type = $post_types;
			}

			// search-post.phpテンプレートがあるかチェック
			$custom_template = locate_template(array("search-{$post_type}.php"));
			if ($custom_template) {
				return $custom_template;
			}
		}

		// デフォルトのsearch.phpテンプレートを使用
		$default_template = locate_template(array('search.php'));
		if ($default_template) {
			return $default_template;
		}
	}

	return $template;
}



/* ログインロゴ変更 */
/* 「横：320px まで」「縦：50～80px」  */

function theme_login_style()
{ ?>
	<style>
		body.login div#login h1 a {
			background-image: url("<?php echo esc_url(get_template_directory_uri()); ?>/images/login_logo.png");
			background-size: contain;
			height: 147px;
			width: 100%;
		}
	</style>
<?php }
add_action('login_enqueue_scripts', 'theme_login_style');



/*
	* トップページ：お知らせ
	*
*/

function top_whatsnew()
{
	ob_start();

	get_template_part("template-parts/top-news-list");

	$template_retval = ob_get_contents();
	ob_end_clean();
	return $template_retval;
}
add_shortcode('top-news-list', 'top_whatsnew');


/*
	* トップページ：スライダー
	*
*/

function top_sliderpost()
{
	ob_start();

	get_template_part("template-parts/top-slider_post");

	$template_retval = ob_get_contents();
	ob_end_clean();
	return $template_retval;
}
add_shortcode('top-slider_post', 'top_sliderpost');

/*
	* 固定ページ内に投稿一覧を表示
	*（パラメータ：post_id）
 * 使用例: [page-insert-post post_id="123,456"]
*/
function page_insert_post($atts)
{
	// ショートコードの属性を解析し、デフォルト値を設定
	$args = shortcode_atts(array(
		'post_id'       => '', // 必須：表示する投稿のID。カンマ区切りで複数指定可能。
	), $atts);

	if (empty($args['post_id'])) {
		return '<!-- post_idが指定されていません -->';
	}

	// カンマ区切りのID文字列を整数の配列に変換
	$post_ids = array_map('absint', explode(',', $args['post_id']));
	// 0や空の値を除外
	$post_ids = array_filter($post_ids);

	if (empty($post_ids)) {
		return '<!-- 有効なpost_idが指定されていません -->';
	}

	// テンプレートに渡す引数を準備
	$template_args = array(
		'post_ids'      => $post_ids,
	);

	ob_start();

	get_template_part("template-parts/page-insert-post", null, $template_args);

	$template_retval = ob_get_contents();
	ob_end_clean();
	return $template_retval;
}
add_shortcode('page-insert-post', 'page_insert_post');


/* get_search_form()をショートコードで呼び出す関数 
 * 本体用のウィジェット：ドロワーメニューの中で使用
*/
function shortcode_get_search_form($atts = array())
{
	ob_start();
	get_search_form();
	return ob_get_clean();
}
add_shortcode('get_search_form', 'shortcode_get_search_form');



// //外観の使用可。編集者（一度設定すると、コメントアウトしても、設定が有効のまま）
// function add_theme_caps()
// {
// 	$role = get_role('editor');
// 	$role->add_cap('edit_theme_options');
// }
// add_action('admin_init', 'add_theme_caps');


/*
	* メニューをショートコードで出力
	* [print_navmenu name="メニュー名" class="クラス名"]
*/
// function print_menu_shortcode($atts, $content = null)
// {
// 	extract(shortcode_atts(array('name' => null, 'class' => null), $atts));
// 	return wp_nav_menu(array('menu' => $name, 'menu_class' => $class, 'echo' => false));
// 	// ulで囲まないときは下記
// 	// return wp_nav_menu(array('menu' => $name, 'container' => false, 'items_wrap' => '%3$s', 'echo' => false));
// }
// add_shortcode('print_navmenu', 'print_menu_shortcode');





/*
 * 編集者のメニュー項目を調整
 * 使用するものをコメントアウトする
*/
// function remove_menus(){
// 	if( current_user_can( 'editor' ) ){
// 		remove_menu_page( 'index.php' ); //ダッシュボード
// 		//remove_menu_page( 'edit.php' ); //投稿メニュー
// 		remove_menu_page( 'upload.php' ); //メディア
// 		remove_menu_page( 'edit.php?post_type=page' ); //ページ追加
// 		remove_menu_page( 'edit-comments.php' ); //コメントメニュー
// 		remove_menu_page( 'themes.php' ); //外観メニュー
// 		remove_menu_page( 'plugins.php' ); //プラグインメニュー
// 		remove_menu_page( 'tools.php' ); //ツールメニュー
// 		remove_menu_page( 'options-general.php' ); //設定メニュー
// 	}
// }
// add_action( 'admin_menu', 'remove_menus' );




/* カスタムメニュー li class除去 */
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
// function my_css_attributes_filter($var) {
// 	return is_array($var) ? array_intersect($var, array('current-menu-item','current-page-ancestor','current_page_item')) : '';
// }





/*
* 同じ内容の記事を出力する
*/
// function duplicate_pages($atts) {
// 	$args = shortcode_atts(array(
//         'showpageid' => "",
//     ), $atts);
// 	$showpageid = $args["showpageid"];
//     if ( $showpageid ) {
// 		$mypost = get_post( $showpageid );
// 		$showcode = apply_filters('the_content', $mypost->post_content);
// 	    return $showcode;
//     } else {
//     	return $showpageid;
//     }
// }
// add_shortcode('duplicatepages', 'duplicate_pages');



/* カテゴリータイトル　「カテゴリー：」非表示 */
/*
function custom_archive_title( $title ){
	if ( is_tax() ) {       
		$title = single_tag_title( '', false );
    } elseif( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	}
    return $title;
}
add_filter( 'get_the_archive_title', 'custom_archive_title', 10 );

*/
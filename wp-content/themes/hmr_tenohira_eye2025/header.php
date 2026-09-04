<?php

/**
 * The header for our theme
 *
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- 旧サイトより引継ぎ -->
	<!-- gtag関数のフォールバックを追加 -->
	<script>
		// gtagが未定義の場合のフォールバック
		window.gtag = window.gtag || function() {
			(window.dataLayer = window.dataLayer || []).push(arguments);
		};
	</script>

	<!-- Google Tag Manager -->
	<script data-cfasync="false" data-pagespeed-no-defer>
		var gtm4wp_datalayer_name = "dataLayer";
		var dataLayer = dataLayer || [];
	</script>
	<!-- End Google Tag Manager  -->

	<!-- Google Tag Manager  -->
	<!-- GTM Container placement set to automatic -->
	<script data-cfasync="false" data-pagespeed-no-defer type="text/javascript">
		var dataLayer_content = {
			"pagePostType": "frontpage"
		};
		dataLayer.push(dataLayer_content);
	</script>
	<script data-cfasync="false" data-pagespeed-no-defer type="text/javascript">
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'//www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-5C2PJBB4');
	</script>
	<!-- End Google Tag Manager  -->
	<!-- ＝＝＝旧サイトより引継ぎ　ここまで -->


	<?php
	// reset.css：一番先に読み込むため
	echo '<link href="' . get_template_directory_uri() . '/css/destyle.min.css"  rel="stylesheet" type="text/css" media="all">';
	?>
	<?php wp_head(); ?>

	<!-- google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">

</head>

<body <?php
		if (is_front_page()) {
			// トップページ
			body_class('toppage drawer drawer--right');
		} else if (is_page()) {
			// 固定ページのときclass付与
			if ($post->ancestors) {
				$now_anc_id = get_post_ancestors($post->ID);
				$ancestor = array_pop($now_anc_id); // 現在のページが属する、一番上位の親ページの取得
				body_class(get_post($ancestor)->post_name . ' drawer drawer--right'); // ページスラッグを取得して、クラス名として表示させる
			} else {
				body_class(get_post($post->ID)->post_name . ' drawer drawer--right');
			}
		} else {
			body_class('drawer drawer--right');
		}
		?>>
	<!-- 旧サイトより引継ぎ -->
	<!-- Google Tag Manager (noscript) -->
	<noscript>
		<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5C2PJBB4"
			height="0" width="0" style="display:none;visibility:hidden"></iframe>
	</noscript>
	<!-- End Google Tag Manager (noscript) -->

	<a class="skip-link screen-reader-text" href="#contents-container"><?php esc_html_e('Skip to content', 'hmr___s_base_gtn_base-gtn'); ?></a>

	<button type="button" class="drawer-toggle drawer-hamburger">
		<span class="dh_icons">
			<span class="drawer-hamburger-icon dhi01"></span>
			<span class="drawer-hamburger-icon dhi02"></span>
			<span class="drawer-hamburger-icon dhi03"></span>
			<span class="dhi-text">MENU</span>
		</span>
	</button>
	<nav class="js-menu sliding-menu-content" role="navigation">
		<?php
		// ドロワーナビ
		if (is_active_sidebar('main_site_drawer_navi')) {
			dynamic_sidebar('main_site_drawer_navi');
		}
		?>
	</nav>
	<div class="js-menu-screen menu-screen"></div>

	<header class="page-header">
		<div id="header-container">
			<div class="header_sitename">
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<?php if ( is_front_page() ): ?>
					<h1>てのひら眼科　Tenohira Eye Clinic</h1>
					<?php else : ?>
					<p>てのひら眼科　Tenohira Eye Clinic</p>
					<?php endif; ?>
				</a>
				<div class="online_shinryo_btn">
					<!-- スマホスクロール時に表示予定 -->
					<a href="">オンライン診療</a>
				</div>
			</div>
			<div class="header_rt">
				<div class="header_tools">
					<nav id="hdaer_navi">
						<ul>
							<?php
							wp_nav_menu(array('menu' => 'header_navi', 'container' => '', 'items_wrap' => '%3$s'));
							?>
						</ul>
					</nav>
					<div class="header_colors">
						<span class="col_md">背景色</span>
						<ul class="color-list">
							<li data-theme="white">白</li>
							<li data-theme="black">黒</li>
							<li data-theme="blue">青</li>
						</ul>
					</div>
					<div class="header_search">
						<?php get_search_form(); ?>
					</div>
					<div class="header_lang">
						<?php echo do_shortcode("[gtranslate]"); ?>
					</div>
				</div>
				<nav id="gnavi">
					<?php
					// グローバルナビ
					if (is_active_sidebar('main_site_global_navi')) {
						dynamic_sidebar('main_site_global_navi');
					}
					?>
				</nav>
			</div>
			<!-- /.header_rt -->
		</div>
		<!-- /header-container -->
	</header>

	<?php if (is_front_page()) { ?>
		<aside id="top_mainimg_container">
			<div class="top_mainimg_inner">
				<?php
				// グローバルナビ
				if (is_active_sidebar('main_site_top_main_img')) {
					dynamic_sidebar('main_site_top_main_img');
				}
				?>
			</div>
		</aside>
		<!-- /#top_mainimg_container -->

	<?php } ?>

	<?php if (!is_page(array('houjin_jichitai', 'recruit', 'contact'))) { ?>
		<aside id="top_1line_news_yoyakubtn">
			<?php
			// １行ニュース
			get_template_part("template-parts/top-news_1line");
			// 空き枠確認・予約ボタン
			if (is_active_sidebar('main_site_aki_kakunin_yoyaku')) {
				dynamic_sidebar('main_site_aki_kakunin_yoyaku');
			}
			?>
		</aside>
	<?php } ?>

	<?php
	$category_classname = "";
	// // ヘッダー画像：デフォルト
	// $thumbnail_srcstr = '<img src="' . get_template_directory_uri() . '/images/subheader_bgimg01.png" alt="画像">';
	if (!is_front_page()) {
		// 下層ページ
		$ancestor = "";
		$show_title = "";
		if (is_page()) {
			// $org_anc = get_post_ancestors($post->ID);
			// $ancestor = array_pop($org_anc);
			// if ($ancestor != "") {
			// 	$now_id = $ancestor;
			// } else {
			// 	$now_id = $post->ID;
			// }
			// $show_title = get_the_title($now_id);

			$show_title = get_the_title($post->ID);

			// // thumbnail
			// if (has_post_thumbnail($post->ID)) {
			// 	$thumbnail_id = get_post_thumbnail_id($post->ID);
			// 	$thumbnail_srcstr = wp_get_attachment_image($thumbnail_id, 'full');
			// } else if (has_post_thumbnail($now_id)) {
			// 	$thumbnail_id = get_post_thumbnail_id($now_id);
			// 	$thumbnail_srcstr = wp_get_attachment_image($thumbnail_id, 'full');
			// }
		} else if (is_archive()) {
			if (is_post_type_archive('post_news') || is_tax('post_news_cat')) {
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
				// シングル記事用、カテゴリ表示。1つの記事に複数のカテゴリを持っていると、どれか一つだけ表示になる。
				$post_cats = get_the_category();
				foreach ($post_cats as $post_cat) {
					$show_title = $post_cat->cat_name;
					$category_classname = $post_cat->category_nicename;
				}
			}
		} else if (is_search()) {
			$show_title = '検索結果';
		} else if (is_404()) {
			$show_title = 'Not Found';
		}
		// 下層ページヘッダータイトル
		echo '<section id="subpage_header_container">';
		echo '<div class="subpage_header_inner">';
		echo '<h1>' . $show_title . '</h1>';
		echo '</div>';
		echo '</section>';

		// // 下層ページ：ヘッダー画像
		// echo $thumbnail_srcstr;

		// パンクズ表示
		echo '<nav><div id="breadcrumb"><ul><li>';
		if (function_exists('bcn_display')) {
			bcn_display();
		}
		echo '</li></ul></div></nav>';
	}
	?>

	<div id="contents-container">
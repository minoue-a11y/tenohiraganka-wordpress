<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package hmr___s_base_gtn_base-gtn
 */

get_header();

$page_404 = get_page_by_path('page-404');
?>

<style>
body.error404 #breadcrumb,
body.page-id-4941 #breadcrumb,
body.error404 #subpage_header_container,
body.page-id-4941 #subpage_header_container,
body.error404 .entry-title, 
body.page-id-4941 .entry-title{
	display: none !important;
}

body.error404 .error-404-search,
body.page-id-4941 .error-404-search {
	max-width: 760px;
	margin: 40px auto 70px;
	padding: 28px 32px;
	border: 2px solid #2e66ed;
	border-radius: 18px;
	background: rgba(255, 255, 255, .72);
}

body.error404 .error-404-search__title,
body.page-id-4941 .error-404-search__title {
	margin: 0 0 14px;
	color: #2e66ed;
	font-size: 1.25rem;
	font-weight: 700;
	line-height: 1.6;
}

body.error404 .error-404-search .searchform,
body.page-id-4941 .error-404-search .searchform {
	display: flex;
	gap: 10px;
	align-items: stretch;
	margin: 0;
}

body.error404 .error-404-search .head-sitesearch,
body.page-id-4941 .error-404-search .head-sitesearch {
	flex: 1;
	min-width: 0;
	height: 52px;
	padding: 0 18px;
	border: 2px solid #d7dfef;
	border-radius: 999px;
	background: #fff;
	color: #333;
	font-size: 1rem;
	line-height: 52px;
}

body.error404 .error-404-search .head-sitesearch:focus,
body.page-id-4941 .error-404-search .head-sitesearch:focus {
	border-color: #2e66ed;
	outline: none;
	box-shadow: 0 0 0 4px rgba(46, 102, 237, .14);
}

body.error404 .error-404-search .search-submit,
body.page-id-4941 .error-404-search .search-submit {
	min-width: 110px;
	height: 52px;
	padding: 0 24px;
	border: 2px solid #2e66ed;
	border-radius: 999px;
	background: #2e66ed;
	color: #fff;
	font-size: 1rem;
	font-weight: 700;
	cursor: pointer;
	transition: opacity .2s ease;
}

body.error404 .error-404-search .search-submit:hover,
body.page-id-4941 .error-404-search .search-submit:hover {
	opacity: .84;
}

@media screen and (max-width: 767px) {
	body.error404 .error-404-search,
	body.page-id-4941 .error-404-search {
		margin: 32px auto 56px;
		padding: 22px 18px;
		border-radius: 14px;
	}

	body.error404 .error-404-search .searchform,
	body.page-id-4941 .error-404-search .searchform {
		flex-direction: column;
	}

	body.error404 .error-404-search .search-submit,
	body.page-id-4941 .error-404-search .search-submit {
		width: 100%;
	}
}
</style>

<div id="main-contents">

	<section class="error-404 not-found">
		<div class="page-content">

			<?php if ($page_404) : ?>
				<header class="entry-title">
					<h2 class="entry-title"><?php echo esc_html(get_the_title($page_404)); ?></h2>
				</header><!-- .page-header -->

				<div class="error-404-page-content">
					<?php echo apply_filters('the_content', $page_404->post_content); ?>
				</div>
			<?php else : ?>
				<header class="entry-title">
					<h2 class="entry-title"><?php esc_html_e('お探しのページは見つかりませんでした', 'hmr___s_base_gtn_base-gtn'); ?></h2>
				</header><!-- .page-header -->

				<p>
					<?php esc_html_e('ページのURLが変更されたか、公開を終了した可能性があります。', 'hmr___s_base_gtn_base-gtn'); ?><br>
					<?php esc_html_e('目の症状やオンライン診療についてお探しの場合は、以下のページからご確認いただけます。', 'hmr___s_base_gtn_base-gtn'); ?>
				</p>
			<?php endif; ?>

			<section class="error-404-search" aria-labelledby="error-404-search-title">
				<p id="error-404-search-title" class="error-404-search__title"><?php esc_html_e('キーワードで探す', 'hmr___s_base_gtn_base-gtn'); ?></p>

				<?php
				get_search_form();
				?>
			</section>
			<br><br><br>
		</div><!-- .page-content -->
	</section><!-- .error-404 -->

</div><!-- #main -->

<?php
get_footer();

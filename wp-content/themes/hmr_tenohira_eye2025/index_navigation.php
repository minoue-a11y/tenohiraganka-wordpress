<?php

/**
 * 武川さん作成ファイル
 *
 */

add_shortcode('index_navigation', function () {
	if (! is_single()) {
		return ''; // ショートコードが投稿ページ以外で使用された場合は何も表示しない
	}
	// index_navigation 以降のh2,h3タグへのアンカーリンクを生成するショートコード
	// ここでは、h2とh3のタグを探し、それらにアンカーリンクを追加します。
	$output = '<div class="index_navigation"><h2 class="index_navigation_title">目次</h2></div>
<script type="text/javascript" src="' . get_template_directory_uri() . '/js/index_navigation.js"></script>';
	return $output;
});

// ブロックエディタ用のブロック要素を作成
add_action('enqueue_block_editor_assets', function () {
	wp_enqueue_script(
		'index-navigation-block',
		get_template_directory_uri() . '/js/index_navigation_block.js',
		array('wp-blocks', 'wp-element', 'wp-editor'),
		filemtime(get_template_directory() . '/js/index_navigation_block.js')
	);
});

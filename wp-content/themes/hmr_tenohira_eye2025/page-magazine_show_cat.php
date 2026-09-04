<?php

/**
 * Template Name: マガジン：カテゴリー指定表示
 * カスタムフィールドから、表示したいカテゴリーを取得してリスト表示する
 */

get_header('magazine');
?>


<?php
// カスタムフィールドから、表示したいカテゴリーを取得
$show_cat_slug_str = sanitize_text_field(get_field('show_category_slugs'));
?>

<div id="main-contents">
	<div id="top_mid_row">
		<div id="top_mid_col_lt">

			<?php
			// ▼ マガジンアーカイブ用ヘッダー を読み込む
			get_template_part('template-parts/magazine_archive_subheader');
			?>


			<section id="magazine_list_container">
				<header class="sec_header">
					<?php the_title('<h2 class="entry-title">', '</h2>'); ?>
				</header><!-- .entry-header -->
				<?php
				// カスタムフィールドにカテゴリー（カンマ区切りのスラッグ）が指定されている場合
				if (!empty($show_cat_slug_str)) {

					$args = array(
						'post_type'      => 'post',
						'posts_per_page' => 12,
						'post_status'    => 'publish',
						'category_name' => $show_cat_slug_str,
						'paged'          => (get_query_var('paged')) ? get_query_var('paged') : 1,
						// 'tag'            => $show_tags_str, // WP_Queryはカンマ区切りのスラッグを扱える
					);

					$myposts = new WP_Query($args);

					if ($myposts->have_posts()) {
						echo '<div class="sec_post_list_row">';
						while ($myposts->have_posts()) {
							$myposts->the_post();
							get_template_part("template-parts/magazine_archive_list");
						}
						echo '</div>';

						// ページネーション
						if (function_exists('wp_pagenavi')) {
							wp_pagenavi(array('query' => $myposts));
						}
					} else {
						// 投稿が見つからなかった場合
						echo '<p>該当する記事はありませんでした。</p>';
					}
					wp_reset_postdata();
				} else {
					// カテゴリーが指定されていないか、存在しない場合
					echo '<p>表示するカテゴリーが指定されていません。</p>';
				}
				?>

			</section>
			<!-- /#magazine_list_container -->
		</div>
		<!-- /top_mid_col_lt -->

		<div id="top_mid_col_sidebar">
			<?php
			get_sidebar();
			?>
		</div>
		<!-- /top_mid_col_rt -->
	</div>
	<!-- /.top_mid_row -->

</div><!-- #main -->


<?php
get_footer('magazine');

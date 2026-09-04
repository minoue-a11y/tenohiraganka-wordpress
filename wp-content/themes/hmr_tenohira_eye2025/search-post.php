<?php

/**
 * The template for 投稿のみ検索結果表示テンプレート
 * searchform-post_only.phpから検索すると、このテンプレートが呼び出される
 * functions.phpの「検索結果テンプレート切り替え」で設定している
 */

get_header('magazine');
?>


<div id="main-contents">
	<div id="top_mid_row">
		<div id="top_mid_col_lt">
			<?php if (have_posts()) : ?>
				<?php
				// ▼ マガジンアーカイブ用ヘッダー を読み込む
				get_template_part('template-parts/magazine_archive_subheader');
				?>


				<section id="magazine_list_container">
					<header class="sec_header">
						<h2>
							<?php
							printf(esc_html__('Search Results for: %s', 'hmr___s_base_gtn_base-gtn'), '<span>' . get_search_query() . '</span>');
							?>
						</h2>
					</header>

					<div class="sec_post_list_row">
						<?php
						while (have_posts()) :
							the_post();
							get_template_part("template-parts/magazine_archive_list");
						endwhile; // End of the loop.
						?>
					</div>
					<!-- /sec_post_list_row -->

					<?php
					// the_posts_navigation();
					// Previous/next page navigation.
					if (function_exists('wp_pagenavi')) :
						wp_pagenavi();
					endif;
					?>


				</section>
				<!-- /#magazine_list_container -->

			<?php else : ?>
				<?php
				echo '<h2 style="margin-top: 30px;margin-left: 1em;">Nothing Found</h2>';
				?>
			<?php endif; ?>
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

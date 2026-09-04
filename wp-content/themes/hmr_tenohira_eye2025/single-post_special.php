<?php

/**
 * Template Name: 特集記事single
 * 
 */

get_header('magazine');
?>

<div id="main-contents">
	<div id="top_mid_row">
		<div id="top_mid_col_lt">

			<?php
			// // ▼ マガジンアーカイブ用ヘッダー を読み込む
			// get_template_part('template-parts/magazine_archive_subheader');
			?>

			<section id="main-contents-inner" class="blog_contents">
				<?php
				while (have_posts()) :
					the_post();
				?>

					<header class="entry-title">
						<?php the_title('<h2 class="entry-title">', '</h2>'); ?>
					</header><!-- .entry-header -->

					<?php
					the_content();

					// wp_link_pages( array(
					// 	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hmrhmr_s_base_gtn_base-gtn' ),
					// 	'after'  => '</div>',
					// ) );
					?>

				<?php
				endwhile; // End of the loop.
				?>

				<section class="page_btm_container">
					<div class="sht_toiawase_btn">
						<?php
						// お問い合わせボタン
						if (is_active_sidebar('magazine_kiji_footer_toiawase')) {
							dynamic_sidebar('magazine_kiji_footer_toiawase');
						}
						?>
					</div>
					<div class="sht_clip_snn_btns">
						<div class="sht_clip_btn">
							<?php
							// お気に入りボタン
							// echo do_shortcode('[favorite_button post_id="" site_id=""]');
							?>
						</div>
						<div class="sht_sns_btns">
							<?php
							// ▼ SNSボタンを読み込む
							// add To Any SNSボタン
							echo do_shortcode("[addtoany]");
							// get_template_part('template-parts/sns_btns'); // オリジナル作成ボタン（停止）
							?>
						</div>
					</div>
				</section>

			</section>
			<!-- /#main-contents-inner -->
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

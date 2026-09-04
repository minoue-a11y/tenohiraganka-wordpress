<?php

/**
 * The template for マガジン：投稿single
 *
 */

get_header('magazine');
?>

<div id="main-contents">

	<div id="top_mid_row">
		<div id="top_mid_col_lt">

			<?php
			// ▼ magazine_subheader.php を読み込む
			get_template_part('template-parts/magazine_subheader');
			?>

			<section id="main-contents-inner" class="blog_contents">
				<?php
				while (have_posts()) :
					the_post();
				?>

					<div class="post_extinfo">
						<!--
						<p class="post_date">
							<span class="post_date_inner"><?php echo get_the_date(); ?></span>
						</p>
						-->
						<p class="post_date">
						<span style="font-weight:normal!important;font-size:80%!important;">公開日:</span> <span class="post_date_inner"><?php the_time('Y/m/d'); ?>
						<?php if (get_the_modified_date('Y/m/d') != get_the_time('Y/m/d')) : ?></span>
						  <span style="font-weight:normal!important;font-size:80%!important;">更新日:</span> <span class="post_date_inner"><?php the_modified_date('Y/m/d'); ?></span> 
						<?php endif; ?>
						</p>						
					</div>
					<header class="entry-title">
						<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
					</header><!-- .entry-header -->

					<div class="post_extinfo">
						<div class="post_tags">
							<?php
							$tags = get_the_tags();
							if (! empty($tags)) {
								echo '<ul class="tag_label">';
								foreach ($tags as $tag) {
									echo '<li><a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a></li>';
								}
								echo '</ul>';
							}
							?>
						</div>
					</div>


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
							echo do_shortcode('[favorite_button post_id="" site_id=""]');
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

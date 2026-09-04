<?php

/**
 * Template Name: マガジンサブページ用
 *
 */

get_header('magazine');
?>


<div id="main-contents">
	<div id="top_mid_row">
		<div id="top_mid_col_lt">

			<?php
			// ▼ magazine_subheader.php を読み込む
			// get_template_part('template-parts/magazine_subheader');
			?>

			<section id="main-contents-inner">
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
					<div class="sht_clip_btn">
						<?php
						// お気に入りボタン
						// echo do_shortcode('[favorite_button post_id="" site_id=""]');
						?>
					</div>
					<div class="sht_sns_btns">
						<?php
						// ▼ SNSボタンを読み込む
						// get_template_part('template-parts/sns_btns');
						?>
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

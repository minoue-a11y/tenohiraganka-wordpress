<?php

/**
 * The template for マガジン：archive一覧
 *
 */

get_header('magazine');
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
					<?php
					the_archive_title('<h2 class="entry-title">', '</h2>');
					?>
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

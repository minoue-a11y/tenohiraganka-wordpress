<?php

/**
 * The template for displaying the footer
 *
 */

?>

</div><!-- #contens-container -->

<aside id="btn_dryeye_selfcheck" class="btn_show">
	<div class="dryeye_inner">
		<?php
		// ドライアイセルフチェックボタン
		if (is_active_sidebar('dry_eye_self_check_btn')) {
			dynamic_sidebar('dry_eye_self_check_btn');
		}
		?>
	</div>
</aside>

<footer class="page-footer">
	<div id="footer-container">
		<?php
		// フッターサイトマップ
		if (is_active_sidebar('main_site_footer_sitemap_navi')) {
			dynamic_sidebar('main_site_footer_sitemap_navi');
		}
		?>
	</div>
	<!-- /footer-container -->

	<div id="footer_bottom">
		<div class="ft_row">
			<div class="ft_col">
				<div class="ft_inner_row">
					<h5>てのひら眼科</h5>
					<?php
					// add To Any SNSボタン
					echo do_shortcode("[addtoany]");
					// // フッターSNSボタン（停止）
					// if (is_active_sidebar('main_site_footer_sns_btn')) {
					// 	dynamic_sidebar('main_site_footer_sns_btn');
					// }
					?>
					<a href="https://lin.ee/96o36Mm" target="_blank" rel="noreferrer noopener"><img src="https://scdn.line-apps.com/n/line_add_friends/btn/ja.png" alt="友だち追加" width="120"></a>
				</div>
			</div>
			<!-- ft_col -->
			<div class="ft_col ft_toiawase">
				<?php
				// フッター問い合わせ
				if (is_active_sidebar('main_site_footer_toiawase')) {
					dynamic_sidebar('main_site_footer_toiawase');
				}
				?>
			</div>
		</div>
		<!-- ft_row -->
		<nav id="ft_navi">
			<ul>
				<?php
				wp_nav_menu(array('menu' => 'footer_navi', 'container' => '', 'items_wrap' => '%3$s'));
				?>
			</ul>
		</nav>
		<p class="ft_copyright"><small>&copy; Tenohiraganka</small></p>
	</div>
</footer>

<?php wp_footer(); ?>

</body>

</html>
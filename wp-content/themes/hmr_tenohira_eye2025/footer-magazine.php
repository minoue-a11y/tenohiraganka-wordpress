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
		<div class="ft_inner">
			<h5>てのひら眼科</h5>
			<?php
			// add To Any SNSボタン
			echo do_shortcode("[addtoany]");
			// // ▼ フッター・サイドバー用SNSボタン（停止）
			// if (is_active_sidebar('side_footer_sns_btn')) {
			// 	dynamic_sidebar('side_footer_sns_btn');
			// }
			?>
		</div>

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
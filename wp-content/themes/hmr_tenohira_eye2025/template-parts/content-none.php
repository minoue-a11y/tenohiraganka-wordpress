<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hmr___s_base_gtn_base-gtn
 */

?>

<section class="no-results not-found">
	<header class="entry-title">
		<h2 class="entry-title"><?php esc_html_e( 'Nothing Found', 'hmr___s_base_gtn_base-gtn' ); ?></h2>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			// printf(
			// 	'<p>' . wp_kses(
			// 		/* translators: 1: link to WP admin new post page. */
			// 		__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'hmr___s_base_gtn_base-gtn' ),
			// 		array(
			// 			'a' => array(
			// 				'href' => array(),
			// 			),
			// 		)
			// 	) . '</p>',
			// 	esc_url( admin_url( 'post-new.php' ) )
			// );

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( '検索用語に一致するものはありませんでした。別のキーワードでもう一度お試しください。', 'hmr___s_base_gtn_base-gtn' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( '検索用語に一致するものはありませんでした。別のキーワードでもう一度お試しください。', 'hmr___s_base_gtn_base-gtn' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->

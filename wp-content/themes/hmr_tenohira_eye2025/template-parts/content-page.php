<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hmr___s_base_gtn_base-gtn
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-title">
		<?php the_title('<h2 class="entry-title">', '</h2>'); ?>
	</header><!-- .entry-header -->

	<?php hmr_s_base_gtn_post_thumbnail(); ?>

	<div class="entry-content is-layout-flow">
		<?php
		the_content();

		// wp_link_pages( array(
		// 	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hmr___s_base_gtn_base-gtn' ),
		// 	'after'  => '</div>',
		// ) );
		?>
	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->
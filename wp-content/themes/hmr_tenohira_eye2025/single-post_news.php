<?php

/**
 * The template for 本体：お知らせsingle
 *
 */

get_header();
?>


<div id="main-contents">
	<?php
	while (have_posts()) :
		the_post();
	?>

		<header class="entry-title">
			<?php
			the_title('<h2 class="entry-title">', '</h2>');
			?>
		</header>

		<?php
		the_content();

		// wp_link_pages( array(
		// 	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hmrhmr_s_base_gtn_base-gtn' ),
		// 	'after'  => '</div>',
		// ) );
		?>

	<?php
	endwhile;
	?>

</div><!-- /main-contents -->


<?php
get_footer();

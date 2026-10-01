<?php

/**
 * The template for displaying all pages
 *
 */

get_header();
?>


<main
    id="main-contents"
    <?php if (is_page('popular_ranking_top')) : ?>
        class="main-contents-popular-ranking"
    <?php endif; ?>
>

	<?php
	while (have_posts()) :
		the_post();
	?>

		<?php if (! is_page('popular_ranking_top')) : ?>
			<header class="entry-title">
				<?php
					the_title('<h2 class="entry-title">', '</h2>');
				?>
			</header>
		<?php endif; ?>

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

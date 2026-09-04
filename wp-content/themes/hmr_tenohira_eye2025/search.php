<?php

/**
 * The template for displaying search results pages
 *
 */

get_header();
?>

<div id="main-contents" class="site-main">

	<?php if (have_posts()) : ?>

		<header class="entry-title">
			<h2 class="entry-title">
				<?php
				printf(esc_html__('Search Results for: %s', 'hmr___s_base_gtn_base-gtn'), '<span>' . get_search_query() . '</span>');
				?>
			</h2>
		</header><!-- .page-header -->

		<?php
		while (have_posts()) :
			the_post();
			get_template_part('template-parts/content', 'search');

		endwhile;

		// the_posts_navigation();
		// Previous/next page navigation.
		if (function_exists('wp_pagenavi')) :
			wp_pagenavi();
		endif;
		?>
	<?php else : ?>
		<?php
		get_template_part('template-parts/content', 'none');
		?>
	<?php endif; ?>

</div><!-- #main -->
<?php
get_footer();

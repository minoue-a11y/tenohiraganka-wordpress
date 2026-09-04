<?php

/**
 * The template for 本体：お知らせタクソノミー一覧
 *
 */

get_header();
?>

<div id="main-contents">

	<?php if (have_posts()) : ?>

		<header class="entry-title">
			<?php
			the_archive_title('<h2 class="entry-title">', '</h2>');
			?>
		</header><!-- .page-header -->

		<?php

		echo '<div class="news_container cat_active">';
		/* Start the Loop */
		while (have_posts()) :
			the_post();
			get_template_part("template-parts/top_news-archive");

		endwhile;
		echo '</div><!-- /.news_container -->';

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

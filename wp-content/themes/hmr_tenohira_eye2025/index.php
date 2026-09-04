<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hmr___s_base_gtn_base-gtn
 */

get_header();
?>

<div id="main-contents">

	<?php if (have_posts()) : ?>
		<?php if (is_home() && !is_front_page()) : ?>
			<header>
				<h2 class="entry-title screen-reader-text"><?php single_post_title(); ?></h2>
			</header>
		<?php endif; ?>
		<?php
		while (have_posts()) :
			the_post();
			get_template_part('template-parts/content', get_post_type());

		endwhile;
		the_posts_navigation();
		?>
	<?php else : ?>
		<?php
		get_template_part('template-parts/content', 'none');
		?>
	<?php endif; ?>

</div><!-- #main -->

<?php
get_sidebar();
get_footer();

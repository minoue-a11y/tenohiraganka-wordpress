<?php

/**
 * Template Name: サイトマップページ用
 *
 */

get_header(); ?>

<div id="main-contents">

	<?php
	while (have_posts()) {
		the_post();
		// echo '<header class="entry-header">';
		// echo '<h2 class="entry-title">' . get_the_title() . '<span class="pagetitle-icon"></span></h2>';
		// echo '</header><!-- .entry-header -->';
	}
	?>

	<?php

	$args = array(
		'authors'      => '',
		'child_of'     => 0,
		'date_format'  => get_option('date_format'),
		'depth'        => 0,
		'echo'         => 1,
		'exclude'      => '',
		'include'      => '',
		'link_after'   => '',
		'link_before'  => '',
		'post_type'    => 'page',
		'post_status'  => 'publish',
		'show_date'    => '',
		'sort_column'  => 'menu_order',
		'sort_order'   => 'ASC',
		'title_li'     => ''
	);
	echo '<ul class="sitemap">';
	wp_list_pages($args);
	echo '</ul>';
	?>

</div><!-- #main -->


<?php get_footer(); ?>
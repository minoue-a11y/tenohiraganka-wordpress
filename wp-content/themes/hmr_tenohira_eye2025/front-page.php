<?php

/**
 * Template Name: フロントページ用
 *
 */

get_header();
?>

<div id="top_contents">

	<?php
	while (have_posts()) :
		the_post();
	?>

		<article>
			<?php
			the_content();
			?>
		</article>

	<?php
	endwhile;
	?>

</div><!-- /top_contents -->

<?php
get_footer();

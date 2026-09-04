<?php
/**
 * Template part for displaying results in search pages
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="search-item">
        <?php the_title( sprintf( '<h5 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>

        <?php 
		// hmr_s_base_gtn_post_thumbnail(); 
		?>

        <?php the_excerpt(); ?>
    </div><!-- .search-item -->

</article><!-- #post-<?php the_ID(); ?> -->
<form class="searchform" action="<?php echo home_url(); ?>" method="get" role="search">
	<input type="text" name="s" class="head-sitesearch" title="サイト内検索" placeholder="サイト内検索" value="<?php the_search_query(); ?>">
	<input type="submit" class="search-submit" value="検索">
</form>
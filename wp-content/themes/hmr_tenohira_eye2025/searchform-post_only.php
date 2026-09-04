<form class="searchform" action="<?php echo home_url(); ?>" method="get" role="search">
	<input type="text" name="s" class="head-sitesearch" title="キーワードで検索" placeholder="キーワードで検索" value="<?php the_search_query(); ?>">
	<input type="hidden" name="post_type" value="post">
	<input type="submit" class="search-submit" value="検索">
</form>
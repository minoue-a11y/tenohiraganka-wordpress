<?php

/**
 * Template Name: マガジントップページ用
 *
 */

get_header('magazine');
?>


<div id="top_contents">


	<section id="topsec_head_slider">
		<div id="top_slide_area_magazine">
			<div class="slide_row">
				<?php
				// トップスライダー
				$args = array(
					// 投稿から取得
					'post_type' => 'post',
					// 最新の投稿を取得
					'posts_per_page' => 2,
					'post_status'  => 'publish',
					'order' => 'DESC',
					'orderby' => 'date',
					// 'category_name' => 'news',
				);

				$myposts = new WP_Query($args);

				while ($myposts->have_posts()) {
					$myposts->the_post();
					get_template_part("template-parts/magazine_top_slide");
				}
				// reset post data
				wp_reset_postdata();
				?>
			</div>
		</div>
		<!-- /#top_slider_area -->
	</section>
	<!-- /#topsec_head_slider -->

	<section id="topsec_keyword">
		<header class="sec_header">
			<h2>注目タグ</h2>
		</header>
		<div class="sec_inner">
			<ul class="tag_label">
				<?php
				$tags = get_tags(array(
					'hide_empty' => 1, // 投稿のないタグは表示しない
				));
				if ($tags) {
					foreach ($tags as $tag) {
						// ACFの 'show_feature_keyword' フィールドが true の場合のみ表示
						if (get_field('show_feature_keyword', $tag)) {
							echo '<li><a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a></li>';
						}
					}
				}
				?>
			</ul>
		</div>
	</section>

	<section id="topsec_special">
		<header class="sec_header">
			<h2>注目の特集</h2>
		</header>

		<div class="sec_row">

			<?php
			// 特集記事
			$args = array(
				// 投稿から取得
				'post_type' => 'post_special',
				// 最新の投稿を取得
				'posts_per_page' => 2,
				'post_status'  => 'publish',
				'order' => 'DESC',
				'orderby' => 'date',
				// 'category_name' => 'news',
			);

			$myposts = new WP_Query($args);

			while ($myposts->have_posts()) {
				$myposts->the_post();
				get_template_part("template-parts/magazine_top_special");
			}
			// reset post data
			wp_reset_postdata();
			?>
		</div>
	</section>


	<div id="top_mid_row">
		<div id="top_mid_col_lt">

			<section id="topsec_recommend">
				<header class="sec_header">
					<h2>おすすめ記事</h2>
					<div class="detail_link"><a href="<?php echo esc_url(get_term_link('recommend', 'post_tag')); ?>">一覧はこちら</a></div>
				</header>

				<div class="sec_post_list_row">
					<?php
					$args = array(
						// 投稿から取得
						'post_type' => 'post',
						// 最新の投稿を取得
						'posts_per_page' => 6,
						'post_status'  => 'publish',
						'order' => 'DESC',
						'orderby' => 'date',
						'tag' => 'recommend',
					);

					$myposts = new WP_Query($args);

					while ($myposts->have_posts()) {
						$myposts->the_post();
						get_template_part("template-parts/magazine_archive_list");
					}
					// reset post data
					wp_reset_postdata();
					?>

				</div>
			</section>

			<section id="topsec_eye_symptom">
				<?php
				// 目の症状から探す
				// スラッグ '/magazine/eye_symptoms' のページオブジェクトを取得
				$eye_symptoms_page = get_page_by_path('/magazine/eye_symptoms');
				$eye_symptoms_cats = '';
				$eye_symptoms_title = '';
				$eye_symptoms_url = '';

				// ページが存在すれば、そのページのカスタムフィールド 'show_category_slugs' から値を取得
				if ($eye_symptoms_page) {
					$eye_symptoms_cats = sanitize_text_field(get_field('show_category_slugs', $eye_symptoms_page->ID));
					$eye_symptoms_title = get_the_title($eye_symptoms_page->ID); // ページタイトルを取得
					$eye_symptoms_url = get_permalink($eye_symptoms_page->ID);   // ページURLを取得
				}

				echo '<header class="sec_header">';
				echo '<h2>' . $eye_symptoms_title . '</h2>';
				echo '<div class="detail_link"><a href="' . $eye_symptoms_url . '">一覧はこちら</a></div>';
				echo '</header>';
				?>

				<div class="sec_post_list_row">
					<?php
					// 取得したタグが空でなければ、そのタグで記事を検索
					if (!empty($eye_symptoms_cats)) :
						$args = array(
							'post_type'      => 'post',
							'posts_per_page' => 3,
							'post_status'    => 'publish',
							'category_name'            => $eye_symptoms_cats, // 取得したタグ（カンマ区切り）を使用
						);

						$myposts = new WP_Query($args);

						while ($myposts->have_posts()) {
							$myposts->the_post();
							get_template_part("template-parts/magazine_archive_list");
						}
						wp_reset_postdata();
					endif;
					?>

				</div>
			</section>

			<section id="topsec_sickness_symptom">
				<?php
				// 目の病気から探す
				// スラッグ '/magazine/eye_diseases' のページオブジェクトを取得
				$eye_diseases_page = get_page_by_path('/magazine/eye_diseases');
				$eye_diseases_cats = '';
				$eye_diseases_title = '';
				$eye_diseases_url = '';

				// ページが存在すれば、そのページのカスタムフィールド 'show_category_slugs' から値を取得
				if ($eye_diseases_page) {
					$eye_diseases_cats = sanitize_text_field(get_field('show_category_slugs', $eye_diseases_page->ID));
					$eye_diseases_title = get_the_title($eye_diseases_page->ID); // ページタイトルを取得
					$eye_diseases_url = get_permalink($eye_diseases_page->ID);   // ページURLを取得
				}

				echo '<header class="sec_header">';
				echo '<h2>' . $eye_diseases_title . '</h2>';
				echo '<div class="detail_link"><a href="' . $eye_diseases_url . '">一覧はこちら</a></div>';
				echo '</header>';
				?>

				<div class="sec_post_list_row">
					<?php
					// 取得したタグが空でなければ、そのタグで記事を検索
					if (!empty($eye_diseases_cats)) :
						$args = array(
							'post_type'      => 'post',
							'posts_per_page' => 3,
							'post_status'    => 'publish',
							'category_name'            => $eye_diseases_cats, // 取得したタグ（カンマ区切り）を使用
						);

						$myposts = new WP_Query($args);

						while ($myposts->have_posts()) {
							$myposts->the_post();
							get_template_part("template-parts/magazine_archive_list");
						}
						wp_reset_postdata();
					endif;
					?>

				</div>
			</section>

			<section id="topsec_medicine_selfcare">
				<?php
				// セルフケア
				// スラッグ '/magazine/eye_selfcare' のページオブジェクトを取得
				$eye_selfcare_page = get_page_by_path('/magazine/eye_selfcare');
				$eye_selfcare_cats = '';
				$eye_selfcare_title = '';
				$eye_selfcare_url = '';

				// ページが存在すれば、そのページのカスタムフィールド 'show_category_slugs' から値を取得
				if ($eye_selfcare_page) {
					$eye_selfcare_cats = sanitize_text_field(get_field('show_category_slugs', $eye_selfcare_page->ID));
					$eye_selfcare_title = get_the_title($eye_selfcare_page->ID); // ページタイトルを取得
					$eye_selfcare_url = get_permalink($eye_selfcare_page->ID);   // ページURLを取得
				}

				echo '<header class="sec_header">';
				echo '<h2>' . $eye_selfcare_title . '</h2>';
				echo '<div class="detail_link"><a href="' . $eye_selfcare_url . '">一覧はこちら</a></div>';
				echo '</header>';
				?>

				<div class="sec_post_list_row">
					<?php
					// 取得したタグが空でなければ、そのタグで記事を検索
					if (!empty($eye_selfcare_cats)) :
						$args = array(
							'post_type'      => 'post',
							'posts_per_page' => 3,
							'post_status'    => 'publish',
							'category_name'            => $eye_selfcare_cats, // 取得したタグ（カンマ区切り）を使用
						);

						$myposts = new WP_Query($args);

						while ($myposts->have_posts()) {
							$myposts->the_post();
							get_template_part("template-parts/magazine_archive_list");
						}
						wp_reset_postdata();
					endif;
					?>

				</div>
			</section>

			<section id="topsec_online_shinryo">
				<?php
				// オンライン診療
				// スラッグ '/magazine/eye_online_shinryo' のページオブジェクトを取得
				$eye_online_shinryo_page = get_page_by_path('/magazine/eye_online_shinryo');
				$eye_online_shinryo_cats = '';
				$eye_online_shinryo_title = '';
				$eye_online_shinryo_url = '';

				// ページが存在すれば、そのページのカスタムフィールド 'show_category_slugs' から値を取得
				if ($eye_online_shinryo_page) {
					$eye_online_shinryo_cats = sanitize_text_field(get_field('show_category_slugs', $eye_online_shinryo_page->ID));
					$eye_online_shinryo_title = get_the_title($eye_online_shinryo_page->ID); // ページタイトルを取得
					$eye_online_shinryo_url = get_permalink($eye_online_shinryo_page->ID);   // ページURLを取得
				}

				echo '<header class="sec_header">';
				echo '<h2>' . $eye_online_shinryo_title . '</h2>';
				echo '<div class="detail_link"><a href="' . $eye_online_shinryo_url . '">一覧はこちら</a></div>';
				echo '</header>';
				?>

				<div class="sec_post_list_row">
					<?php
					// 取得したタグが空でなければ、そのタグで記事を検索
					if (!empty($eye_online_shinryo_cats)) :
						$args = array(
							'post_type'      => 'post',
							'posts_per_page' => 3,
							'post_status'    => 'publish',
							'category_name'            => $eye_online_shinryo_cats, // 取得したタグ（カンマ区切り）を使用
						);

						$myposts = new WP_Query($args);

						while ($myposts->have_posts()) {
							$myposts->the_post();
							get_template_part("template-parts/magazine_archive_list");
						}
						wp_reset_postdata();
					endif;
					?>

				</div>
			</section>

			<section id="topsec_column_whatsnew">
				<?php
				// コラム・最新情報
				// スラッグ '/magazine/column_newinfo' のページオブジェクトを取得
				$column_newinfo_page = get_page_by_path('/magazine/column_newinfo');
				$column_newinfo_cats = '';
				$column_newinfo_title = '';
				$column_newinfo_url = '';

				// ページが存在すれば、そのページのカスタムフィールド 'show_category_slugs' から値を取得
				if ($column_newinfo_page) {
					$column_newinfo_cats = sanitize_text_field(get_field('show_category_slugs', $column_newinfo_page->ID));
					$column_newinfo_title = get_the_title($column_newinfo_page->ID); // ページタイトルを取得
					$column_newinfo_url = get_permalink($column_newinfo_page->ID);   // ページURLを取得
				}

				echo '<header class="sec_header">';
				echo '<h2>' . $column_newinfo_title . '</h2>';
				echo '<div class="detail_link"><a href="' . $column_newinfo_url . '">一覧はこちら</a></div>';
				echo '</header>';
				?>

				<div class="sec_post_list_row">
					<?php
					// 取得したタグが空でなければ、そのタグで記事を検索
					if (!empty($column_newinfo_cats)) :
						$args = array(
							'post_type'      => 'post',
							'posts_per_page' => 3,
							'post_status'    => 'publish',
							'category_name'            => $column_newinfo_cats, // 取得したタグ（カンマ区切り）を使用
						);

						$myposts = new WP_Query($args);

						while ($myposts->have_posts()) {
							$myposts->the_post();
							get_template_part("template-parts/magazine_archive_list");
						}
						wp_reset_postdata();
					endif;
					?>

				</div>
			</section>

		</div>
		<!-- /top_mid_col_lt -->


		<div id="top_mid_col_sidebar">
			<?php
			get_sidebar();
			?>
		</div>
		<!-- /top_mid_col_rt -->
	</div>
	<!-- /.top_mid_row -->

	<section id="topsec_btm_search">
		<header class="sec_header">
			<h2>記事検索</h2>
		</header>

		<div class="search_inner">
			<?php get_template_part('searchform-post_only'); ?>
			<div class="search_cate">
				<ul class="cate_label">
					<?php
					$categories = get_categories(array(
						'orderby'    => 'name',
						'hide_empty' => 1, // 投稿のないカテゴリーは表示しない
					));
					foreach ($categories as $category) {
						echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
					}
					?>
				</ul>
			</div>
			<div class="search_tag">
				<ul class="tag_label">
					<?php
					$tags = get_tags(array(
						'hide_empty' => 1, // 投稿のないタグは表示しない
					));
					if ($tags) {
						foreach ($tags as $tag) {
							echo '<li><a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a></li>';
						}
					}
					?>
				</ul>
			</div>
		</div>
	</section>

	<?php
	// いつでもどこでもスマホから簡単診療
	the_content();
	?>


</div><!-- /top_contents -->


<?php
get_footer('magazine');

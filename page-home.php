<?php get_header(); ?>

<main id="site-content" class="home">
	<!--　背景パララックス用 -->
	<div class="parallax">
		<!--↓ fv ↓-->
		<div class="fv">
			<img src="<?php echo get_template_directory_uri(). '/assets/img/fv@2x.png'; ?>" alt="">
			<section id="fv">
				<div class="logo col2">
					<img src="<?php echo get_template_directory_uri(). '/assets/img/LOGO_hy_p-10.png'; ?>" alt="">
				</div>
				<!--↓ TOP・PCメニュー ↓-->
				<ul class="fv-nav col2">
					<li class="nav-item">
						<a href="<?php echo get_page_link(9); ?>">ABOUT</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo get_post_type_archive_link('services'); ?>">SERVICE</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo get_post_type_archive_link('works'); ?>">WORKS</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo get_page_link(111); ?>">BLOG</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo get_page_link(117); ?>">CONTACT</a>
					</li>
				</ul>
				<!--↑ TOP・PCメニュー ↑-->
			</section>
		</div>
		<!--↑ fv ↑-->
		<!--↓ introduction ↓-->
		<div class="section-title">
			<h2>What Do You Want?</h2>
		</div>
		<section id="introduction">
			<!-- ↓ サービスジャンルのループ(CustomPostType:services taxonomy:genre) ↓ -->
			<?php
			$args = array(
				'taxonomy' => 'genres',
				'hide_empty' => false,
				'orderby' => 'term_id',
				'order' => 'ASC'
			);
			$genres = get_terms($args);
			foreach ($genres as $index => $genre) :
				$taxonomy = $genre->taxonomy;
				$id = $genre->term_id;
				$relation = $taxonomy . "_" . $id;
				$wants = get_fields($relation); //カスタム投稿タイプのカスタムフィールドを取得
				$no = $index + 1;
			?>
				<div class="col3">
					<!-- ニーズ -->
					<ul>
						<!--↓ ニーズのループ ↓-->
						<?php foreach ($wants as $want) : ?>
							<li><?php echo $want ?></li>
						<?php endforeach; ?>
						<!--↑ ニーズのループ ↑-->
					</ul>
					<div class="arrow">
						<span></span>
					</div>
					<!-- サービスカテゴリ -->
					<a href="#<?php echo $genre->name; ?>" class="card">
						<div class="description">
							<!-- サービスカテゴリ名 -->
							<h3><?php echo $genre->name; ?></h3>
							<!-- サービスカテゴリ説明 -->
							<p><?php echo $genre->description; ?></p>
						</div>
						<!-- サービスカテゴリイメージ画像(画像名で指定) -->
						<img src="<?php echo get_template_directory_uri() . '/assets/img/card_' . $no . '@2x.png'; ?>" alt="">
					</a>
				</div>
			<?php endforeach; ?>
			<!-- ↑ サービスジャンルのループ(CPT:services taxonomy:genre) ↑-->
		</section>
		<!--↑ introduction ↑-->
		<!--↓ サービス一覧 ↓-->
		<div class="section-title">
			<h2>How Can I Help You?</h2>
		</div>
		<section id="service">
			<!--↓ サービスカテゴリのループ(CustomPostType:services taxonomy:genre) ↓-->
			<?php
			$args = array(
				'taxonomy' => 'genres',
				'hide_empty' => false,
				'orderby' => 'term_id',
				'order' => 'ASC'
			);
			$genres = get_terms($args);
			foreach ($genres as $index => $genre) : ?>
				<!-- サービスカテゴリ -->
				<div class="service-genre" id="<?php echo $genre->name; ?>">
					<a href="<?php echo get_term_link($genre); ?>">
						<!-- サービスカテゴリ名 -->
						<h2><?php echo $genre->name; ?></h2>
						<!-- サービスカテゴリ説明 -->
						<p class="fs18"><?php echo $genre->description; ?></p>
					</a>
					<div class="services">
						<!--↓ サービスのループ ↓-->
						<?php
						$args = array(
							'orderby' => 'ID',
							'order' => 'ASC',
							'post_type' => 'services',
							'tax_query' => array(
								array(
									'taxonomy' => 'genres',
									'field' => 'name',
									'terms' => $genre->name,
								),
							),
						);
						$query = new WP_Query($args);
						if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
								<div class="service col4">
									<p>
										<!-- サービス名 -->
										<?php echo the_title(); ?>
									</p>
								</div>
						<?php
							endwhile;
							wp_reset_postdata();
						endif; ?>
						<!--↑ サービスのループ ↑-->
					</div>
				</div>
			<?php endforeach; ?>
			<!--↑ サービスカテゴリのループ(CustomPostType:services taxonomy:genre) ↑-->
		</section>
		<!--↑ サービス一覧 ↑-->
		<!--↓ ポートフォリオ一覧 ↓-->
		<div class="section-title">
			<h2>Check It Out My Works!</h2>
		</div>
		<section id="work">
			<!--↓ ポートフォリオのループ ↓-->
			<?php
			$args = array(
				'orderby' => 'ID',
				'order' => 'ASC',
				'post_type' => 'works',
				'meta_key' => 'sticky_top',
				'meta_value' => true
			);
			$query = new WP_Query($args);
			if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
					$thumb_id = get_field('thumbnail');
					$front_tags = $query->post->front_end;
					$back_tags = $query->post->back_end;
					$image_id = get_field('image');
			?>
					<div class="work">
						<!-- パーマリンク -->
						<a href="<?php the_permalink(); ?>">
							<div class="thumb-wrap col3">
								<!-- サムネイル -->
								<?php echo the_post_thumbnail(); ?>
							</div>
							<div class="description-wrap col3">
								<div class="description">
									<div class="work-title">
										<!-- タイトル -->
										<h3><?php echo the_title(); ?></h3>
										<!-- 投稿日時 -->
										<time datetime=""><?php echo the_date('Y.m'); ?></time>
									</div>
									<p><?php echo get_field('description'); ?></p>
								</div>
								<div class="tags-wrap">
									<div class="category">
										<p class="cat-name">Front-end</p>
										<ul class="tags">
											<?php foreach ($front_tags as $tag) : ?>
												<li><?php echo $tag; ?></li>
											<?php endforeach; ?>
										</ul>
									</div>
									<div class="category">
										<p class="cat-name">Back-end</p>
										<ul class="tags">
											<?php foreach ($back_tags as $tag) : ?>
												<li><?php echo $tag; ?></li>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>
							</div>
							<div class="image-wrap col3">
								<img src="<?php echo wp_get_attachment_image_src($image_id, 'full')[0]; ?>" alt="">
								<object data="" type="">
									<a href="<?php echo the_field('image_attribute_url'); ?>"><small><?php echo the_field('image_attribute_text'); ?></small></a>
								</object>
							</div>
						</a>
					</div>
			<?php endwhile;
				wp_reset_postdata();
			endif; ?>
			<!--↑ ポートフォリオのループ ↑-->
			<div class="view-more">
				<a href="<?php echo get_post_type_archive_link('works'); ?>">VIEW MORE</a>
			</div>
		</section>
		<!--↑ ポートフォリオ一覧 ↑-->
		<!--↓ お問い合わせ ↓-->
		<div class="section-title">
			<h2>Are You Interested?</h2>
		</div>
		<section id="contact">
			<div class="icon col2">
				<img src="<?php echo get_template_directory_uri(). '/assets/img/LOGO_hy_p-08.png'; ?>" alt="">
			</div>
			<div class="buttons col2">
				<p>ご相談だけでもお伺いいたします。<br>お気軽にお問い合わせください</p>
				<a href="<?php echo get_post_type_archive_link('services'); ?>" class="btn purple">PRICE LIST</a>
				<a href="<?php echo get_page_link(117); ?>" class="btn pink">CONTACT ME</a>
				<div class="sns">
					<a href="https://www.instagram.com/hrm20311721/"><i class="fab fa-instagram"></i></a>
					<a href="https://github.com/hrm20311721"><i class="fab fa-github"></i></a>
				</div>
			</div>
		</section>
		<!--↑ お問い合わせ ↑-->
	</div>
</main>

<?php get_footer(); ?>
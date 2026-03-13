<?php get_header(); ?>

<main class="portfolio">
  <section>
    <div class="works-nav">
      <h2>PORTFOLIO</h2>
      <?php
      $args = array(
        'taxonomy' => 'genres',
        'hide_empty' => false,
        'orderby' => 'term_id',
        'order' => 'ASC'
      );
      $genres = get_terms($args)
      ?>
      <ul class="nav-list">
        <li class="nav-item fs18 active"><a value="all">All</a></li>
        <?php foreach ($genres as $genre) : ?>
          <li class="nav-item"><a value="<?php echo $genre->term_id; ?>"><?php echo $genre->name; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="works-block">
      <?php if (have_posts()) : ?>
        <ul class="works-list">
          <?php while (have_posts()) : the_post(); ?>
            <li class="work-item col3 fadeIn">
              <a href="<?php echo the_permalink(); ?>">
                <?php echo the_post_thumbnail(); ?>
                <div class="description">
                  <p class="work-title fs18"><?php echo the_title(); ?></p>
                  <?php $term = get_the_terms($post->ID,'genres')[0]; ?>
                  <p><?php echo $term->name; ?></p>
                  <ul class="tag_list">
                    <?php
                    $tags = get_the_tags();
                    foreach ($tags as $tag) : ?>
                      <li>
                        <p><?php echo $tag->name; ?></P>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </a>
            </li>
          <?php endwhile; ?>
        </ul>
      <?php wp_reset_postdata();
      endif; ?>
      <div class="loading">
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
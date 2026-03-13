<?php get_header(); ?>

<main>
  <?php
  if (function_exists('yoast_breadcrumb')) :
    yoast_breadcrumb('
      <p class="yoast-breadcrumbs">', '</p>');
  endif; ?>
  <section class="single-works">
    <div class="work-header">
      <div class="work-thumb col3">
        <?php echo the_post_thumbnail(); ?>
      </div>
      <div class="details">
        <div class="work-title">
          <h3 class="section-title"><?php echo the_title(); ?></h3>
          <time><?php echo the_time('Y.m'); ?></time>
        </div>
        <p><?php echo get_field('description'); ?></p>
        <div class="tags-wrap">
          <div class="category">
            <p class="cat-name">Front-end</p>
            <?php
            $front_tags = $post->front_end;
            $back_tags = $post->back_end;
            ?>
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
    </div>
    <p class="fs16">ギャラリー</p>
    <div class="content">
      <?php the_content(); ?>
    </div>

  </section>
</main>


<?php get_footer(); ?>
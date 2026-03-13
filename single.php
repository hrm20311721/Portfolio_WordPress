<?php get_header(); ?>

<main>
  <?php
  if (function_exists('yoast_breadcrumb')) :
    yoast_breadcrumb('
      <p class="yoast-breadcrumbs">', '</p>');
  endif; ?>
  <section class="single">
    <div class="single-fv">
      <?php echo get_the_post_thumbnail($post,'post-thumbnail'); ?>
    </div>
    <div class="page-content">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <h2 class="post-title"><?php echo the_title(); ?></h2>
          <div class="post-content"><?php echo the_content(); ?></div>
      <?php endwhile;
      endif; ?>
    </div>
  </section>
</main>


<?php get_footer(); ?>
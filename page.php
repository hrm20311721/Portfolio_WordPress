<?php get_header(); ?>

<main>
  <?php
  if (function_exists('yoast_breadcrumb')) :
    yoast_breadcrumb('
      <p class="yoast-breadcrumbs">', '</p>');
  endif; ?>
  <h2 class="section-title">
    <?php echo get_the_title(); ?>
  </h2>
  <section id="page-<?php echo get_the_title(); ?>" class="page">
    <div class="page-content">
      <?php
      if (have_posts()) : while (have_posts()) : the_post();
          echo the_content();

        endwhile;
        wp_reset_postdata();
      endif; ?>
    </div>
  </section>
</main>


<?php get_footer(); ?>
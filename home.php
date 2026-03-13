<?php get_header(); ?>

<main>
  <div class="wrapper">
    <div class="sidebar-left">
      <?php get_sidebar(); ?>
    </div>
    <div class="container">
      <?php
      if (function_exists('yoast_breadcrumb')) :
        yoast_breadcrumb('
      <p class="yoast-breadcrumbs">', '</p>');
      endif; ?>
      <h2 class="section-title">
        <?php single_post_title(); ?>記事一覧
      </h2>
      <?php get_template_part('list','posts') ?>
    </div>
  </div>

</main>


<?php get_footer(); ?>
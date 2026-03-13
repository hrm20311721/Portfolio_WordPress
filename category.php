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
      <?php $category = get_the_category(); ?>
      <h2 class="section-title">
        <?php single_cat_title('',true); ?>に関する記事一覧
      </h2>
      <section>
        <?php get_template_part('list','posts');?>
      </section>
    </div>
  </div>

</main>


<?php get_footer(); ?>
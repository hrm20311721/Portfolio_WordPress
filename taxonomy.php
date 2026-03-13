<?php get_header(); ?>

<main>
  <!-- fv -->
  <?php
  $term = get_queried_object();
  $term_title = $term->slug;
  $page = get_posts([
    'name'        => $term_title,
    'post_type'   => 'page',
    'numberposts' => 1,
  ]);

  $page = $page ? $page[0] : null;

  wp_reset_postdata();
  $page = get_page_by_path($term_title, OBJECT, 'page');


  ?>


  <div class="page-fv">
    <?php echo get_the_post_thumbnail($page->ID, 'full'); ?>
    <div class="page-fv-lead">
      <p><?php echo get_field('lead_catchcopy', $page->ID); ?></p>
    </div>
  </div>
  <?php
  if (function_exists('yoast_breadcrumb')) :
    yoast_breadcrumb('<p class="yoast-breadcrumbs">', '</p>');
  endif; ?>
  <h2 class="section-title"><?php single_term_title('', true); ?></h2>
  <section class="page">
    <div class="service-items">
      <?php
      $arg = array(
        'post_type'   => 'services',
        'taxonomy'    => $term->taxonomy,
        'term'        => $term->slug,
        'orderby'     => 'ID',
        'order'       => 'ASC'
      );
      $query = new WP_Query($arg);
      if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

          <p><?php echo the_title(); ?></p>

      <?php endwhile;
      endif; ?>
    </div>
    <h3 class="service-catch"><?php echo $term->description; ?></h3>
    <?php
    $term = get_queried_object();
    $term_title = $term->slug;
    $page = get_posts([
      'name'        => $term_title,
      'post_type'   => 'page',
      'numberposts' => 1,
    ]);

    $page = $page ? $page[0] : null;

    wp_reset_postdata();
    $page = get_page_by_path($term_title, OBJECT, 'page');
    ?>
    <div class="page-content">
      <?php echo $page->post_content; ?>
    </div>


  </section>

</main>


<?php get_footer(); ?>
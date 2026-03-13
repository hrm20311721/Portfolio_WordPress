<?php get_header(); ?>

<main>
  <?php
  $page = get_page_by_path('services');
  ?>

  <!-- fv -->
  <?php if ($page && isset($page->ID)): ?>
    <div class="page-fv">
      <?php echo get_the_post_thumbnail($page->ID, 'full'); ?>
      <div class="page-fv-lead">
        <p><?php echo get_field('lead_catchcopy', $page->ID); ?></p>
      </div>
    </div>
  <?php endif; ?>
  <!-- fv -->
  <!-- bradcrumb -->
  <?php
  if (function_exists('yoast_breadcrumb')) :
    yoast_breadcrumb('
      <p class="yoast-breadcrumbs">', '</p>');
  endif; ?>
  <!-- bradcrumb -->
  <!-- title -->
  <h2 class="section-title"><?php post_type_archive_title('', true); ?></h2>
  <!-- title -->
  <section>
    <div class="page-content">
      <?php echo apply_filters('the_content', $page->post_content); ?>
    </div>

    <div class="service-list">
      <?php
      $args = array(
        'taxonomy' => 'genres',
        'hide_empty' => false,
        'orderby' => 'term_id',
        'order' => 'ASC'
      );
      $genres = get_terms($args); ?>
      <?php foreach ($genres as $index => $genre) :
        $no = $index + 1; ?>
        <a href="<?php echo get_term_link($genre); ?>" class="service-genre-card">
          <img src="<?php echo get_template_directory_uri() . '/assets/img/card_' . $no . '@2x.png'; ?>" alt="">
          <div class="card-title">
            <h2><?php echo $genre->name; ?></h2>
            <p><?php echo $genre->description; ?></p>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </section>

</main>


<?php get_footer(); ?>
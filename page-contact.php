<?php get_header(); ?>

<main class="contact">
  <?php
  if (function_exists('yoast_breadcrumb')) :
    yoast_breadcrumb('
      <p class="yoast-breadcrumbs">', '</p>');
  endif; ?>
  <section id="page-<?php echo get_the_title(); ?>" class="page">
    <div class="wrapper">
      <?php
      if (have_posts()) : while (have_posts()) : the_post();
          echo the_content();

        endwhile;
        wp_reset_postdata();
      endif; ?>

      <p class="gallary_text">RPA? 売れるHP? 業務効率化?<br>一つでも気になったら<br>お気軽にご連絡ください。<br>現場を経験しているからこそ<br>使いやすく売れるモノを提供いたします。</p>
    </div>
    <div class="gallary">
      <?php
      $args = array(
        'orderby' => 'ID',
        'order' => 'ASC',
        'post_type' => 'works',
        'meta_key' => 'sticky_top',
        'meta_value' => true
      );
      $query = new WP_Query($args);
      if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
          <!-- ポートフォリオのループ -->
          <div class="gallary_card">
            <?php echo the_post_thumbnail('full', array('class' => 'gallary_img')); ?>
          </div>

      <?php endwhile;
      endif; ?>

      <!-- ポートフォリオ数が少なかった 場合-->
      <?php
      if ($query->post_count < 20) :
        $count = $query->post_count;
        while ($count < 20) :
          while ($query->have_posts() && $count < 20) :
            $query->the_post(); ?>
            <div class="gallary_card">
              <?php echo the_post_thumbnail('full', array('class' => 'gallary_img')); ?>
            </div>
      <?php
            $count += 1;
          endwhile;
        endwhile;
        wp_reset_postdata();
      endif; ?>

    </div>
  </section>
</main>


<?php get_footer(); ?>
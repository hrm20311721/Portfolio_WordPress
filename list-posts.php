<section class="post-list">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <a href="<?php echo get_permalink(get_the_ID()); ?>" class="post-card col3">
        <?php the_post_thumbnail(); ?>
        <div class="post-lead">
          <h3 class="post-title fs18"><?php echo the_title(); ?></h3>
          <p class="post-date"><?php echo the_date(); ?></p>
          <?php echo the_excerpt(); ?>
        </div>
      </a>

  <?php endwhile;
    wp_reset_postdata();
  endif; ?>
</section>
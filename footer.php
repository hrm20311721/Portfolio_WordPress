    <footer>
      <div class="footer-inner">
        <h2 class="footer-logo">
          <img src="<?php echo get_template_directory_uri() . '/assets/img/LOGO_hy_p-07.png'; ?>" alt="">
        </h2>
        <div class="footer-menu">
          <div class="footer-col">
            <dl>
              <dt>ABOUT</dt>
              <dd><a href="<?php echo get_page_link(9); ?>">Profile</a></dd>
              <dd><a href="<?php echo get_post_type_archive_link('works'); ?>">Portfolio</a></dd>
              <!-- <dd><a href="<?php echo get_page_link(111); ?>">Blog</a></dd> -->
            </dl>
          </div>
          <div class="footer-col">
            <?php
            $args = array(
              'taxonomy' => 'genres',
              'hide_empty' => false
            );
            $genres = get_terms($args);
            ?>
            <dl>
              <dt>SERVICE</dt>
              <?php foreach ($genres as $genre) : ?>
                <dd class="fs16"><a href="<?php echo get_term_link($genre); ?> "><?php echo $genre->name; ?></a></dd>
              <?php endforeach; ?>
            </dl>
          </div>
          <div class="footer-col">
            <dl>
              <dt>CONTACT</dt>
              <dd><a href="<?php echo get_page_link(117); ?>">Contact Form</a></dd>
              <aside>
                <a href="https://www.instagram.com/hrm20311721/"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://github.com/hrm20311721"><i class="fa-brands fa-github"></i></a>
              </aside>
              <dt>ATTRIBUTE</dt>
              <dd><a href="https://storyset.com/">Storyset</a></dd>
              <dd><a href="https://www.sui-sai.jp/">Sui-Sai</a></dd>
            </dl>
          </div>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
    </body>

    </html>
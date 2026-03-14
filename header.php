<!DOCTYPE html>
<html lang="ja">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="<?php bloginfo('html_type'); ?>" charset="<?php bloginfo('charset'); ?>">
  <script src="https://kit.fontawesome.com/eef91d5f84.js" crossorigin="anonymous"></script>
  <?php wp_head(); ?>
</head>

<body>
  <header class="<?php if(is_front_page()): echo 'home'; endif; ?>">
    <div class="header-inner fs16">
      <h2 class="header-logo"><a href="/"><img src="<?php echo get_template_directory_uri() . '/assets/img/LOGO_hy_p-06.png'; ?>" alt=""></a></h2>
      <div class="header-menu">
        <ul class="header-list">
          <li class="header-item">
            <a href="<?php echo get_page_link(9); ?>">ABOUT</a>
          </li>
          <li class="header-item">
            <a href="<?php echo get_post_type_archive_link('services'); ?>">SERVICE</a>
          </li>
          <li class="header-item"><a href="<?php echo get_post_type_archive_link('works'); ?>">WORKS</a>
          </li>
          <!-- <li class="header-item">
            <a href="<?php echo get_page_link(111); ?>">BLOG</a>
          </li> -->
          <li class="header-item">
            <a href="<?php echo get_page_link(117); ?>">CONTACT</a>
          </li>
        </ul>
      </div>
      <div class="sp menu-button">
        <button>
          <span></span>
        </button>
      </div>
    </div>
  </header>

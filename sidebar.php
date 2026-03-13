<?php
$categories = get_categories(); ?>
<div class="sidebar-nav">
  <p class="nav-title fs16">カテゴリー</p>
  <ul class="category-list">
    <?php wp_list_categories(array(
      'title_li' => '',
      'show_option_all' => '記事一覧'
    )); ?>
  </ul>


</div>
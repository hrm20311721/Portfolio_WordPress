<?php


//css読み込み
function enqueue_styles()
{
  wp_enqueue_style('destyle', get_template_directory_uri() . '/assets/css/destyle.css', array(), false, 'all');
  wp_enqueue_style('slick', get_template_directory_uri() . '/assets/slick/slick.css', array('destyle'), false, 'all');
  wp_enqueue_style('slick-theme', get_template_directory_uri() . '/assets/slick/slick-theme.css', array('destyle', 'slick'), false, 'all');
  wp_enqueue_style('style', get_stylesheet_uri(), array('destyle', 'slick', 'slick-theme'), false, 'all');
}

add_action('wp_enqueue_scripts', 'enqueue_styles');

//js読み込み
function enqueue_scripts()
{
  wp_enqueue_script('slick', get_template_directory_uri() . '/assets/slick/slick.min.js', array('jquery'), false, true);
  wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array('jquery', 'slick'), false, true);

  //javascriptに変数受け渡し
  wp_localize_script(
    'script',
    'WorksData',
    array(
      'nonce' => wp_create_nonce()
    )
  );

  wp_localize_script(
    'script',
    'ThemeData',
    array(
      'url' => get_template_directory_uri()
    )
  );
}

add_action('wp_enqueue_scripts', 'enqueue_scripts');

//投稿のアイキャッチ有効化
add_theme_support('post-thumbnails');

function default_thumbnail( $post_id )
{
  //デフォルト画像ID指定
  $default_thumbnail_id = '153';
  //通常投稿の場合カテゴリーごとにデフォルト画像設定
  if (get_post_type($post_id) == 'post') {
    $cat = get_the_category($post_id)[0]->slug;
    switch ($cat) {
      case 'web-development':
        $default_thumbnail_id = '153';
        break;
      case 'coding':
        $default_thumbnail_id = '153';
        break;
      case 'steamline':
        $default_thumbnail_id = '102';
        break;
    }
  }
  if (!has_post_thumbnail($post_id)) {
    update_post_meta($post_id, '_thumbnail_id', $default_thumbnail_id);
  } 
}
add_action('save_post', 'default_thumbnail');

//コンテンツ抜粋表示設定
function custom_excerpt_length()
{
  return 40;
}
add_filter('excerpt_length', 'custom_excerpt_length');

function custom_excerpt_more($more)
{
  return '…more';
}
add_filter('excerpt_more', 'custom_excerpt_more');



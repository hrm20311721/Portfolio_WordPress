<?php

require_once( dirname(__FILE__,6) . '/wp-load.php');
//リクエストデータを受け取る
$request = json_decode( file_get_contents( "php://input" ), true);

//nonceチェック
if(!wp_verify_nonce($request['nonce'])){
  die('unverified_nonce');
}
  
//wp_query用
$args = array(
'orderby'         => 'ID',
'order'           => 'ASC',
'post_type'       => 'works',
'tax_query'       => array(
                      array(
                          'taxonomy'    => 'genres',
                          'field'       => 'term_id',
                          'terms'       => $request['value']
                        ),
                      ),
);

//選択されたカテゴリがALLだった場合
if($request['value'] == 'all') {
  $args['tax_query'] = null;
}
 
$query = new WP_Query( $args );
$works = null;

while($query->have_posts()) {
  $query->the_post();
  $thumb_id = get_field('thumbnail');
  $term = get_the_terms($post->ID, 'genres')[0];
  $tags = get_the_tags();
  $work = array(
    'image_src' => get_the_post_thumbnail(),
    'title' => get_the_title(),
    'genre' => $term->name,
    'tags'  => $tags,
    'url'   => get_the_permalink()
  );
  $works[]= $work;
}
$flag = true;

//レスポンスデータをjsonに整形
$json = json_encode( $works );

//レスポンスヘッダーをセット
header('Content-Type: application/json; X-Content-Type-Options: nosniff; charset=utf-8');

//レスポンス送信
echo $json;
 
die();
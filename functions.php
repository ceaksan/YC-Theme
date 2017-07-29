<?php
// IMPORTS
require_once(get_template_directory().'/assets/func/breadcrumbs.php');

/* featured image */
  add_theme_support( 'post-thumbnails' );

/* thumbnails */
/*
  add_image_size( 'featured-post', 875, 9999, false );
  add_image_size( 'featured-single', 2100, 9999, true );
  add_image_size( 'popular-posts', 600, 9999, false );
  add_image_size( 'category-posts', 450, 9999, false );
  add_image_size( 'content-featured', 9999, 210, false );
  add_image_size( 'content-thumb', 600, 9999, false );
  add_image_size( 'card-featured', 9999, 375, false );
*/
  add_image_size( 'parallax-image', 1200, 9999, true );


add_filter( 'intermediate_image_sizes', '__return_empty_array' );

  /* reading time */
  function reading_time() {
      $content = get_post_field( 'post_content', $post->ID );
      $word_count = str_word_count( strip_tags( $content ) );
      $readingtime = ceil($word_count / 200);

      if ($readingtime == 1) { $timer = " dakika"; } else { $timer = " dakika"; }
      $totalreadingtime = '<li>Ortalama okuma süresi: <strong>'.$readingtime . $timer.'</strong></li><li>Kelime sayısı: <strong>'. $word_count .'</strong></li>';
      return $totalreadingtime;
  }

/* adminbar disable */
// show_admin_bar(false);

/* popular posts */
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/* youtube last video */
function myLastYoutubeVideo(){
  $id = NULL;
  $channel_id = 'UCir6j5omrnC-RJM4kyVveBg';
  $xml = simplexml_load_file(sprintf('https://www.youtube.com/feeds/videos.xml?channel_id=%s', $channel_id));
  if (!empty($xml->entry[0]->children('yt', true)->videoId[0])){
    $id = $xml->entry[0]->children('yt', true)->videoId[0];
  }
  return $id;
}

/* get expcerpt */
function get_excerpt($limit, $source = null){
    if($source == "content" ? ($excerpt = get_the_content()) : ($excerpt = get_the_excerpt()));
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    $excerpt = $excerpt.'...';
    return $excerpt;
}

/* innerBoxShortCode */
function innerBoxShortCode( $atts , $content = null ) {
	$atts = shortcode_atts(
		array(
			'type' => 'quote',
			'link' => '#',
			'position' => 'left',
		),
		$atts,
		'innerBox'
	);
}
add_shortcode( 'innerBox', 'innerBoxShortCode' );

/* comment area submit button add a class */
function as_adapt_comment_form( $arg ) {
  $arg['class_submit'] = 'btn black waves-effect waves-light white-text';
  $arg['comment_field'] = '
  <div class="comment-form-comment input-field col s12">
    <textarea id="comment" class="materialize-textarea" name="comment" aria-required="true"></textarea>
    <label for="comment">' . _x( 'Yorumunuz', 'noun' ) . '</label>
  </div>';

    return $arg;
}
add_filter( 'comment_form_defaults', 'as_adapt_comment_form' );

/* Contact Form 7 */
/*
add_filter( 'wpcf7_form_class_attr', 'custom_custom_form_class_attr' );
function custom_custom_form_class_attr( $class ) {
  $class .= ' col s12 xl12';
  return $class;
}
*/
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    return $content;
});
?>

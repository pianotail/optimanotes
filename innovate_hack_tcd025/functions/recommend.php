<?php

function add_custom_meta_boxes() {
 add_meta_box(
  'wp_recommend_post',//ID of meta box
  __('Recommend post', 'tcd-w'),//label
  'recommend_post',//callback function
  'post',// post type
  'side'
 );
}
add_action('add_meta_boxes', 'add_custom_meta_boxes');

function recommend_post(){

    global $post;
    $recommend_post = get_post_meta($post->ID,'recommend_post',true);
    $recommend_post2 = get_post_meta($post->ID,'recommend_post2',true);
    $recommend_post3 = get_post_meta($post->ID,'recommend_post3',true);
    $recommend_post4 = get_post_meta($post->ID,'recommend_post4',true);
    $recommend_post5 = get_post_meta($post->ID,'recommend_post5',true);

    echo '<input type="hidden" name="recommend_post_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

?>
<p><?php _e('Check if you wan\'t to show this post for recommend post.', 'tcd-w');  ?></p>
<ul>
 <li><label><input type="checkbox" name="recommend_post" value="on" <?php if( $recommend_post == 'on' ) { ?>checked="checked"<?php } ?> />  <?php _e('特集記事へ表示', 'tcd-w');  ?></label></li>
 <li><label><input type="checkbox" name="recommend_post2" value="on" <?php if( $recommend_post2 == 'on' ) { ?>checked="checked"<?php } ?> />  <?php _e('おすすめ記事へ表示', 'tcd-w');  ?></label></li>
 <li><label><input type="checkbox" name="recommend_post3" value="on" <?php if( $recommend_post3 == 'on' ) { ?>checked="checked"<?php } ?> />  <?php _e('人気の記事へ表示', 'tcd-w');  ?></label></li>
 <li><label><input type="checkbox" name="recommend_post4" value="on" <?php if( $recommend_post4 == 'on' ) { ?>checked="checked"<?php } ?> />  <?php _e('Show this post for recommend post4.', 'tcd-w');  ?></label></li>
 <li><label><input type="checkbox" name="recommend_post5" value="on" <?php if( $recommend_post5 == 'on' ) { ?>checked="checked"<?php } ?> />  <?php _e('Show this post for recommend post5.', 'tcd-w');  ?></label></li>
</ul>
<?php
}

// Save data from meta box
add_action('save_post', 'save_recommend_post_meta_box');
function save_recommend_post_meta_box( $post_id ) {

  // verify nonce
  if (!isset($_POST['recommend_post_meta_box_nonce']) || !wp_verify_nonce($_POST['recommend_post_meta_box_nonce'], basename(__FILE__))) {
    return $post_id;
  }

  // check autosave
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return $post_id;
  }

  // check permissions
  if ('page' == $_POST['post_type']) {
    if (!current_user_can('edit_page', $post_id)) {
      return $post_id;
    }
  } elseif (!current_user_can('edit_post', $post_id)) {
      return $post_id;
  }

  // save or delete
  if (isset($_POST['recommend_post']) ) {
   update_post_meta($post_id, 'recommend_post', $_POST['recommend_post'] );
  } else {
   delete_post_meta( $post_id, 'recommend_post') ;
  };
  if (isset($_POST['recommend_post2']) ) {
   update_post_meta($post_id, 'recommend_post2', $_POST['recommend_post2'] );
  } else {
   delete_post_meta( $post_id, 'recommend_post2') ;
  };
  if (isset($_POST['recommend_post3']) ) {
   update_post_meta($post_id, 'recommend_post3', $_POST['recommend_post3'] );
  } else {
   delete_post_meta( $post_id, 'recommend_post3') ;
  };
  if (isset($_POST['recommend_post4']) ) {
   update_post_meta($post_id, 'recommend_post4', $_POST['recommend_post4'] );
  } else {
   delete_post_meta( $post_id, 'recommend_post4') ;
  };
  if (isset($_POST['recommend_post5']) ) {
   update_post_meta($post_id, 'recommend_post5', $_POST['recommend_post5'] );
  } else {
   delete_post_meta( $post_id, 'recommend_post5') ;
  };

}


/**
 * Add custom fields to post list in admin
 */
 
function manage_posts_columns($columns) {
	$columns['recommend_post'] = __('Recommend post', 'tcd-w');
	return $columns;
}
function add_column($column_name, $post_id) {
	if( $column_name == 'recommend_post' ) {
		if(get_post_meta($post_id, 'recommend_post', true)) {  _e('特集記事<br />', 'tcd-w'); };
		if(get_post_meta($post_id, 'recommend_post2', true)) {  _e('おすすめ記事<br />', 'tcd-w'); };
		if(get_post_meta($post_id, 'recommend_post3', true)) {  _e('人気の記事<br />', 'tcd-w'); };
		if(get_post_meta($post_id, 'recommend_post4', true)) {  _e('Recommend post4<br />', 'tcd-w'); };
		if(get_post_meta($post_id, 'recommend_post5', true)) {  _e('Recommend post5<br />', 'tcd-w'); };
  }
}
add_filter( 'manage_posts_columns', 'manage_posts_columns' );
add_action( 'manage_posts_custom_column', 'add_column', 10, 2 );


?>
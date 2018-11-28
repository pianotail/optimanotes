<?php
/*
Template Name:Author Profile
*/
?>
<?php get_header(); $options = get_desing_plus_option(); ?>

<div id="main_col">

 <div id="main_contents" class="clearfix">

  <h2 class="archive_headline"><span><?php _e('Author List', 'tcd-w'); ?></span></h2>
  <div id="profile_author_list">
   <ul>
    <?php
         $users = get_users( array('orderby' => 'ID', 'order' => 'ASC') );
         if ($users) {
          foreach ($users as $bloguser) {
          $user_id = $bloguser->ID;
          $user_data = get_userdata($user_id);
          if($user_data->show_author == true) {
    ?>
    <li class="author_info clearfix">
     <div class="author_info_avatar"><?php echo get_avatar($user_data->ID, 70); ?></div>
     <div class="author_info_meta clearfix">
      <h2 class="author_info_name"><?php echo $user_data->display_name; ?><?php if($user_data->post_name) { ?><span class="author_info_name2"><?php echo $user_data->post_name; ?></span><?php }; ?></h2>
      <a class="author_info_link" href="<?php echo get_author_posts_url($user_data->ID); ?>"><?php _e("Author archive","tcd-w"); ?></a>
      <?php if($user_data->profile2) { ?>
      <div class="author_info_desc">
       <?php echo wpautop($user_data->profile2); ?>
      </div>
      <?php }; ?>
     </div>
    </li>
    <?php }; }; }; ?>
   </ul>
  </div>

 </div><!-- END #main_contents -->

</div><!-- END #main_col -->

<?php get_template_part('sidebar'); ?>

<?php get_footer(); ?>
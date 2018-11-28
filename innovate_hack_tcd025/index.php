<?php get_header(); $options = get_desing_plus_option(); ?>

<div id="main_col">

 <?php if(is_front_page() && !is_paged()) { ?>
 <?php if($options['show_header_slider']) { ?>
 <div id="top_slider" class="flexslider">
  <ul class="slides">
   <?php
        $post_type = $options['header_slider_type'];
        $post_order = $options['header_slider_order'];
        if($post_order == 'date' || $post_order == 'no_slider_date') {
          $args = array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => '6', 'meta_key' => $post_type, 'meta_value' => 'on');
        } elseif($post_order == 'rand' || $post_order == 'no_slider_rand') {
          $args = array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => '6', 'meta_key' => $post_type, 'meta_value' => 'on', 'orderby' => 'rand');
        } else {
          $args = array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => '6');
        };
        $top_slider = new WP_Query($args);
        $post_count = $top_slider->post_count;
        if ($top_slider->have_posts()) :
   ?>
   <li>
    <?php $i = 1; while ($top_slider->have_posts()) : $top_slider->the_post(); ?>
    <div class="post<?php echo $i; ?>">
     <a class="link" href="<?php the_permalink() ?>">
      <span class="image"><?php if ( has_post_thumbnail()) { the_post_thumbnail('size2'); } else { echo '<img src="'; bloginfo('template_url'); echo '/img/common/no_image3.gif" alt="" title="" />'; }; ?></span>
      <span class="title_area">
       <span class="title"><?php the_title(); ?></span>
       <span class="desc"><?php if (has_excerpt()) { the_excerpt(); } else { new_excerpt(70); }; ?></span>
      </span>
     </a>
    </div>
    <?php $i++; endwhile; wp_reset_postdata(); ?>
   </li>
   <?php endif; ?>
   <?php
        if($post_order == 'date' || $post_order == 'rand') {
        if($post_order == 'date') {
          $args = array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => '6', 'offset' => '6', 'meta_key' => $post_type, 'meta_value' => 'on');
        } else {
          $args = array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => '6', 'meta_key' => $post_type, 'meta_value' => 'on', 'orderby' => 'rand');
        };
        $top_slider2 = new WP_Query($args);
        $post_count = $top_slider2->post_count;
        if ($top_slider2->have_posts()) :
   ?>
   <li>
    <?php $i = 7; while ($top_slider2->have_posts()) : $top_slider2->the_post(); ?>
    <div class="post<?php echo $i; ?>">
     <a class="link" href="<?php the_permalink() ?>">
      <span class="image"><?php if ( has_post_thumbnail()) { the_post_thumbnail('size2'); } else { echo '<img src="'; bloginfo('template_url'); echo '/img/common/no_image3.gif" alt="" title="" />'; }; ?></span>
      <span class="title_area">
       <span class="title"><?php the_title(); ?></span>
       <span class="desc"><?php if (has_excerpt()) { the_excerpt(); } else { new_excerpt(70); }; ?></span>
      </span>
     </a>
    </div>
    <?php $i++; endwhile; wp_reset_postdata(); ?>
   </li>
   <?php endif; }; ?>
   <?php
        if($post_order == 'date' || $post_order == 'rand') {
        if($post_order == 'date') {
          $args = array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => '6', 'offset' => '12', 'meta_key' => $post_type, 'meta_value' => 'on');
        } else {
          $args = array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => '6', 'meta_key' => $post_type, 'meta_value' => 'on', 'orderby' => 'rand');
        };
        $top_slider3 = new WP_Query($args);
        $post_count = $top_slider3->post_count;
        if ($top_slider3->have_posts()) :
   ?>
   <li>
    <?php $i = 13; while ($top_slider3->have_posts()) : $top_slider3->the_post(); ?>
    <div class="post<?php echo $i; ?>">
     <a class="link" href="<?php the_permalink() ?>">
      <span class="image"><?php if ( has_post_thumbnail()) { the_post_thumbnail('size2'); } else { echo '<img src="'; bloginfo('template_url'); echo '/img/common/no_image3.gif" alt="" title="" />'; }; ?></span>
      <span class="title_area">
       <span class="title"><?php the_title(); ?></span>
       <span class="desc"><?php if (has_excerpt()) { the_excerpt(); } else { new_excerpt(70); }; ?></span>
      </span>
     </a>
    </div>
    <?php $i++; endwhile; wp_reset_postdata(); ?>
   </li>
   <?php endif; }; ?>
  </ul>
 </div>
 <?php }; ?>
 <?php }; ?>

 <?php if (is_category()) { ?>
 <h2 class="archive_headline"><span><?php printf(__('Archive for the &#8216; %s &#8217; Category', 'tcd-w'), single_cat_title('', false)); ?></span></h2>
 <?php } elseif( is_tag() ) { ?>
 <h2 class="archive_headline"><span><?php printf(__('Posts Tagged &#8216; %s &#8217;', 'tcd-w'), single_tag_title('', false) ); ?></span></h2>
 <?php } elseif (is_day()) { ?>
 <h2 class="archive_headline"><span><?php printf(__('Archive for &#8216; %s &#8217;', 'tcd-w'), get_the_time(__('F jS, Y', 'tcd-w'))); ?></span></h2>
 <?php } elseif (is_month()) { ?>
 <h2 class="archive_headline"><span><?php printf(__('Archive for &#8216; %s &#8217;', 'tcd-w'), get_the_time(__('F, Y', 'tcd-w'))); ?></span></h2>
 <?php } elseif (is_year()) { ?>
 <h2 class="archive_headline"><span><?php printf(__('Archive for &#8216; %s &#8217;', 'tcd-w'), get_the_time(__('Y', 'tcd-w'))); ?></span></h2>
 <?php } elseif (is_author()) { ?>
 <h2 class="archive_headline"><span><?php _e('Author archive', 'tcd-w'); ?></span></h2>
 <?php
      global $wp_query;
      $author_id = $wp_query->query_vars['author'];
      $user_data = get_userdata($author_id);
 ?>
 <?php
       if($user_data->show_author == true) {
 ?>
 <div class="author_info clearfix">
  <div class="author_info_avatar"><?php echo get_avatar($author_id, 70); ?></div>
  <div class="author_info_meta">
   <h4 class="author_info_name"><?php echo $user_data->display_name; ?><?php if($user_data->post_name) { ?><span class="author_info_name2"><?php echo $user_data->post_name; ?></span><?php }; ?></h4>
   <?php if($user_data->description) { ?>
   <div class="author_info_desc">
    <?php echo wpautop($user_data->description); ?>
   </div>
   <?php }; ?>
  </div>
 </div>
 <?php }; ?>
 <?php } elseif (is_search()) { ?>
 <h2 class="archive_headline"><span><?php printf(__('Search results for - [ %s ]', 'tcd-w'), esc_attr(get_search_query()) ); ?></span></h2>
 <?php } elseif(is_archive()) { ?>
 <h2 class="archive_headline"><span><?php _e('Blog Archives', 'tcd-w'); ?></span></h2>
 <?php }; ?>

 <?php if(is_home() && !is_paged()) { ?>
 <ul id="post_list_tab" class="clearfix">
  <?php if($options['show_index_post_list'] == 1) { ?><li id="post_list_button1"><a href="#"><?php echo $options['label_index_post_list']; ?></a></li><?php }; ?>
  <?php if($options['show_recommend_post1'] == 1) { ?><li id="post_list_button2"><a href="#"><?php echo $options['label_recommend_post1']; ?></a></li><?php }; ?>
  <?php if($options['show_recommend_post2'] == 1) { ?><li id="post_list_button3"><a href="#"><?php echo $options['label_recommend_post2']; ?></a></li><?php }; ?>
  <?php if($options['show_recommend_post3'] == 1) { ?><li id="post_list_button4"><a href="#"><?php echo $options['label_recommend_post3']; ?></a></li><?php }; ?>
  <?php if($options['show_recommend_post4'] == 1) { ?><li id="post_list_button5"><a href="#"><?php echo $options['label_recommend_post4']; ?></a></li><?php }; ?>
  <?php if($options['show_recommend_post5'] == 1) { ?><li id="post_list_button6"><a href="#"><?php echo $options['label_recommend_post5']; ?></a></li><?php }; ?>
 </ul>
 <?php }; ?>

 <div id="post_list_wrap">

 <?php if( ($options['show_index_post_list'] == 1) || !is_home() ) { ?>
 <div id="post_list1">
  <div id="post_list" class="post_list">

   <?php $i = 1; if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   <?php if($i == 4) { ?>
   <?php
        // banner top *********************************************************************************
        if($options['pl_top_ad_code1']||$options['pl_top_ad_image1']||$options['pl_top_ad_code2']||$options['pl_top_ad_image2']) {
   ?>
   <ul class="post_list_banner clearfix">
    <?php
         if($options['pl_top_ad_code1']||$options['pl_top_ad_image1']) {
           if ($options['pl_top_ad_code1']) { echo '<li class="banner1">' . $options['pl_top_ad_code1'] . '</li>'; } else {
    ?>
    <li class="banner1"><a href="<?php esc_attr_e( $options['pl_top_ad_url1'] ); ?>" target="_blank"><img src="<?php esc_attr_e( $options['pl_top_ad_image1'] ); ?>" alt="" title="" /></a></li>
    <?php
           };
         };
    ?>
    <?php
         if($options['pl_top_ad_code2']||$options['pl_top_ad_image2']) {
           if ($options['pl_top_ad_code2']) { echo '<li class="banner2">' . $options['pl_top_ad_code2'] . '</li>'; } else {
    ?>
    <li class="banner2"><a href="<?php esc_attr_e( $options['pl_top_ad_url2'] ); ?>" target="_blank"><img src="<?php esc_attr_e( $options['pl_top_ad_image2'] ); ?>" alt="" title="" /></a></li>
    <?php
           };
         };
    ?>
   </ul><!-- END post_list_banner -->
   <?php }; ?>
   <div class="post_item clearfix<?php if (!has_post_thumbnail()) { echo ' no_thumbnail'; }; ?>">
    <?php if ( has_post_thumbnail()) { ?><a class="image" href="<?php the_permalink() ?>"><?php the_post_thumbnail('size1'); ?></a><?php }; ?>
    <div class="post_info">
     <?php if ($options['show_date'] && $options['show_category']) { ?>
     <ul class="meta clearfix">
      <?php if ($options['show_date']){ ?><li class="post_date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y/n/j'); ?></time></li><?php }; ?>
      <?php if ($options['show_category']){ ?><li class="post_category"><?php the_category(', '); ?></li><?php }; ?>
     </ul>
     <?php }; ?>
     <h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
     <p class="desc"><?php if (has_excerpt()) { the_excerpt(); } else { new_excerpt(120); }; ?></p>
    </div>
    <a class="link" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
   </div>
   <?php } else { ?>
   <div class="post_item clearfix<?php if (!has_post_thumbnail()) { echo ' no_thumbnail'; }; ?>">
    <?php if ( has_post_thumbnail()) { ?><a class="image" href="<?php the_permalink() ?>"><?php the_post_thumbnail('size1'); ?></a><?php }; ?>
    <div class="post_info">
     <?php if ($options['show_date'] && $options['show_category']) { ?>
     <ul class="meta clearfix">
      <?php if ($options['show_date']){ ?><li class="post_date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y/n/j'); ?></time></li><?php }; ?>
      <?php if ($options['show_category']){ ?><li class="post_category"><?php the_category(', '); ?></li><?php }; ?>
     </ul>
     <?php }; ?>
     <h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
     <p class="desc"><?php if (has_excerpt()) { the_excerpt(); } else { new_excerpt(120); }; ?></p>
    </div>
    <a class="link" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
   </div>
   <?php }; ?>
   <?php $i++; endwhile; else: ?>
   <div class="post_item no_post">
    <h3><?php _e("There is no registered post.","tcd-w"); ?></h3>
   </div>
   <?php endif; ?>

  </div><!-- #post_list -->
  <div id="load_post"><?php next_posts_link( __( 'read more', 'tcd-w' ) ); ?></div>
 </div><!-- #post_list1 -->
 <?php }; ?>

 <?php // #post_list2 *************************************************************************************************** ?>
 <?php if(is_home() && !is_paged()) { ?>
 <?php if($options['show_recommend_post1'] == 1) { ?>
 <div id="post_list2" class="post_list">
  <?php
       $post_num = $options['recommend_post_num1'];
       $post_order = $options['recommend_post_order1'];
       if($post_order == 'date') {
         $args = array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => $post_num, 'meta_key' => 'recommend_post', 'meta_value' => 'on');
       } else {
         $args = array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => $post_num, 'meta_key' => 'recommend_post', 'meta_value' => 'on', 'orderby' => 'rand');
       };
       $recommend_post1 = get_posts($args);
       if ($recommend_post1) {
         foreach ($recommend_post1 as $post) : setup_postdata ($post);
  ?>
  <div class="post_item clearfix<?php if (!has_post_thumbnail()) { echo ' no_thumbnail'; }; ?>">
   <?php if ( has_post_thumbnail()) { ?><a class="image" href="<?php the_permalink() ?>"><?php the_post_thumbnail('size1'); ?></a><?php }; ?>
   <div class="post_info">
    <?php if ($options['show_date'] && $options['show_category']) { ?>
    <ul class="meta clearfix">
     <?php if ($options['show_date']){ ?><li class="post_date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y/n/j'); ?></time></li><?php }; ?>
     <?php if ($options['show_category']){ ?><li class="post_category"><?php the_category(', '); ?></li><?php }; ?>
    </ul>
    <?php }; ?>
    <h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
    <p class="desc"><?php if (has_excerpt()) { the_excerpt(); } else { new_excerpt(120); }; ?></p>
   </div>
   <a class="link" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
  </div>
  <?php endforeach; wp_reset_query(); }; ?>
 </div><!-- #post_list2 -->
 <?php }; ?>
 <?php }; ?>


 <?php // #post_list3 *************************************************************************************************** ?>
 <?php if(is_home() && !is_paged()) { ?>
 <?php if($options['show_recommend_post2'] == 1) { ?>
 <div id="post_list3" class="post_list">
  <?php
       $post_num = $options['recommend_post_num2'];
       $post_order = $options['recommend_post_order2'];
       if($post_order == 'date') {
         $args = array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => $post_num, 'meta_key' => 'recommend_post2', 'meta_value' => 'on');
       } else {
         $args = array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => $post_num, 'meta_key' => 'recommend_post2', 'meta_value' => 'on', 'orderby' => 'rand');
       };
       $recommend_post2 = get_posts($args);
       if ($recommend_post2) {
         foreach ($recommend_post2 as $post) : setup_postdata ($post);
  ?>
  <div class="post_item clearfix<?php if (!has_post_thumbnail()) { echo ' no_thumbnail'; }; ?>">
   <?php if ( has_post_thumbnail()) { ?><a class="image" href="<?php the_permalink() ?>"><?php the_post_thumbnail('size1'); ?></a><?php }; ?>
   <div class="post_info">
    <?php if ($options['show_date'] && $options['show_category']) { ?>
    <ul class="meta clearfix">
     <?php if ($options['show_date']){ ?><li class="post_date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y/n/j'); ?></time></li><?php }; ?>
     <?php if ($options['show_category']){ ?><li class="post_category"><?php the_category(', '); ?></li><?php }; ?>
    </ul>
    <?php }; ?>
    <h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
    <p class="desc"><?php if (has_excerpt()) { the_excerpt(); } else { new_excerpt(120); }; ?></p>
   </div>
   <a class="link" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
  </div>
  <?php endforeach; wp_reset_query(); }; ?>
 </div><!-- #post_list3 -->
 <?php }; ?>
 <?php }; ?>


 <?php // #post_list4 *************************************************************************************************** ?>
 <?php if(is_home() && !is_paged()) { ?>
 <?php if($options['show_recommend_post3'] == 1) { ?>
 <div id="post_list4" class="post_list">
  <?php
       $post_num = $options['recommend_post_num3'];
       $post_order = $options['recommend_post_order3'];
       if($post_order == 'date') {
         $args = array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => $post_num, 'meta_key' => 'recommend_post3', 'meta_value' => 'on');
       } else {
         $args = array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => $post_num, 'meta_key' => 'recommend_post3', 'meta_value' => 'on', 'orderby' => 'rand');
       };
       $recommend_post3 = get_posts($args);
       if ($recommend_post3) {
         foreach ($recommend_post3 as $post) : setup_postdata ($post);
  ?>
  <div class="post_item clearfix<?php if (!has_post_thumbnail()) { echo ' no_thumbnail'; }; ?>">
   <?php if ( has_post_thumbnail()) { ?><a class="image" href="<?php the_permalink() ?>"><?php the_post_thumbnail('size1'); ?></a><?php }; ?>
   <div class="post_info">
    <?php if ($options['show_date'] && $options['show_category']) { ?>
    <ul class="meta clearfix">
     <?php if ($options['show_date']){ ?><li class="post_date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y/n/j'); ?></time></li><?php }; ?>
     <?php if ($options['show_category']){ ?><li class="post_category"><?php the_category(', '); ?></li><?php }; ?>
    </ul>
    <?php }; ?>
    <h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
    <p class="desc"><?php if (has_excerpt()) { the_excerpt(); } else { new_excerpt(120); }; ?></p>
   </div>
   <a class="link" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
  </div>
  <?php endforeach; wp_reset_query(); }; ?>
 </div><!-- #post_list4 -->
 <?php }; ?>
 <?php }; ?>


 <?php // #post_list5 *************************************************************************************************** ?>
 <?php if(is_home() && !is_paged()) { ?>
 <?php if($options['show_recommend_post4'] == 1) { ?>
 <div id="post_list5" class="post_list">
  <?php
       $post_num = $options['recommend_post_num4'];
       $post_order = $options['recommend_post_order4'];
       if($post_order == 'date') {
         $args = array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => $post_num, 'meta_key' => 'recommend_post4', 'meta_value' => 'on');
       } else {
         $args = array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => $post_num, 'meta_key' => 'recommend_post4', 'meta_value' => 'on', 'orderby' => 'rand');
       };
       $recommend_post4 = get_posts($args);
       if ($recommend_post4) {
         foreach ($recommend_post4 as $post) : setup_postdata ($post);
  ?>
  <div class="post_item clearfix<?php if (!has_post_thumbnail()) { echo ' no_thumbnail'; }; ?>">
   <?php if ( has_post_thumbnail()) { ?><a class="image" href="<?php the_permalink() ?>"><?php the_post_thumbnail('size1'); ?></a><?php }; ?>
   <div class="post_info">
    <?php if ($options['show_date'] && $options['show_category']) { ?>
    <ul class="meta clearfix">
     <?php if ($options['show_date']){ ?><li class="post_date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y/n/j'); ?></time></li><?php }; ?>
     <?php if ($options['show_category']){ ?><li class="post_category"><?php the_category(', '); ?></li><?php }; ?>
    </ul>
    <?php }; ?>
    <h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
    <p class="desc"><?php if (has_excerpt()) { the_excerpt(); } else { new_excerpt(120); }; ?></p>
   </div>
   <a class="link" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
  </div>
  <?php endforeach; wp_reset_query(); }; ?>
 </div><!-- #post_list5 -->
 <?php }; ?>
 <?php }; ?>


 <?php // #post_list6 *************************************************************************************************** ?>
 <?php if(is_home() && !is_paged()) { ?>
 <?php if($options['show_recommend_post5'] == 1) { ?>
 <div id="post_list6" class="post_list">
  <?php
       $post_num = $options['recommend_post_num5'];
       $post_order = $options['recommend_post_order5'];
       if($post_order == 'date') {
         $args = array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => $post_num, 'meta_key' => 'recommend_post5', 'meta_value' => 'on');
       } else {
         $args = array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => $post_num, 'meta_key' => 'recommend_post5', 'meta_value' => 'on', 'orderby' => 'rand');
       };
       $recommend_post5 = get_posts($args);
       if ($recommend_post5) {
         foreach ($recommend_post5 as $post) : setup_postdata ($post);
  ?>
  <div class="post_item clearfix<?php if (!has_post_thumbnail()) { echo ' no_thumbnail'; }; ?>">
   <?php if ( has_post_thumbnail()) { ?><a class="image" href="<?php the_permalink() ?>"><?php the_post_thumbnail('size1'); ?></a><?php }; ?>
   <div class="post_info">
    <?php if ($options['show_date'] && $options['show_category']) { ?>
    <ul class="meta clearfix">
     <?php if ($options['show_date']){ ?><li class="post_date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y/n/j'); ?></time></li><?php }; ?>
     <?php if ($options['show_category']){ ?><li class="post_category"><?php the_category(', '); ?></li><?php }; ?>
    </ul>
    <?php }; ?>
    <h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
    <p class="desc"><?php if (has_excerpt()) { the_excerpt(); } else { new_excerpt(120); }; ?></p>
   </div>
   <a class="link" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
  </div>
  <?php endforeach; wp_reset_query(); }; ?>
 </div><!-- #post_list6 -->
 <?php }; ?>
 <?php }; ?>


 </div><!-- END #post_list_wrap -->

</div><!-- END #main_col -->

<?php get_template_part('sidebar'); ?>

<?php get_footer(); ?>
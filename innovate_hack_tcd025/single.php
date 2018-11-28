<?php get_header(); $options = get_desing_plus_option(); ?>

<div id="main_col">

 <div id="main_contents" class="clearfix">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <ul class="post_meta clearfix">
   <?php if ($options['show_date']){ ?><li class="post_date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y/n/j'); ?></time></li><?php }; ?>
   <?php if ($options['show_category']){ ?><li class="post_category"><?php the_category(', '); ?></li><?php }; ?>
   <?php if ($options['show_tag']): ?><?php the_tags('<li class="post_tag">',', ','</li>'); ?><?php endif; ?>
   <?php if ($options['show_comment']) : if (comments_open()){ ?><li class="post_comment"><a href="#comment_headline"><?php comments_number( '0','1','%' ); ?></a></li><?php }; endif; ?>
   <?php if ($options['show_author']) : ?><li class="post_author"><?php if (function_exists('coauthors_posts_links')) { coauthors_posts_links(', ',', ','','',true); } else { the_author_posts_link(); }; ?></li><?php endif; ?>
  </ul>

  <?php if ( has_post_thumbnail() and $page=='1') { if ($options['show_thumbnail']) : ?><div class="post_image"><?php the_post_thumbnail('size3'); ?></div><?php endif; }; ?>

  <h2 class="post_title"><?php the_title(); ?></h2>

  <div class="post_content clearfix">
   <?php the_content(__('Read more', 'tcd-w')); ?>
   <?php custom_wp_link_pages(); ?>
   <?php if($options['show_bookmark']) { get_template_part('bookmark'); };?>
   <!-- author info -->
   <?php
    // author info *******************************************************************************
    if ($page == $numpages) :
     if (function_exists('get_coauthors')) {
      $author_ids = get_coauthors($post->ID);
     } else {
      $author_ids = array(get_the_author_meta('ID'));
     }
     foreach($author_ids as $_row) :
      if (!empty($_row->ID)) {
        $author_id = $_row->ID;
      } elseif (is_numeric($_row)) {
        $author_id = asbint($_row);
      } else {
        continue;
      }
      $user_data = get_userdata($author_id);
      if (!$user_data->show_author) continue;
   ?>
   <div class="author_info clearfix">
    <a class="author_info_avatar" href="<?php echo get_author_posts_url($author_id); ?>"><?php echo get_avatar($author_id, 70); ?></a>
    <div class="author_info_meta clearfix">
     <h4 class="author_info_name"><a href="<?php echo get_author_posts_url($author_id); ?>"><?php echo esc_html($user_data->display_name); ?></a><?php if($user_data->post_name) { ?><span class="author_info_name2"><?php echo esc_html($user_data->post_name); ?></span><?php }; ?></h4>
     <a class="author_info_link" href="<?php echo esc_attr(get_author_posts_url($author_id)); ?>"><?php _e("Author archive","tcd-w"); ?></a>
     <?php if($user_data->profile2) { ?>
     <div class="author_info_desc">
      <?php echo wpautop($user_data->profile2); ?>
     </div>
     <?php }; ?>
     <?php if($user_data->author_twitter or $user_data->author_facebook) { ?>
     <ul class="author_social_link clearfix">
      <?php if($user_data->user_url) { ?><li class="author_link"><a href="<?php echo esc_attr($user_data->user_url); ?>" target="_blank">WEB</a></li><?php }; ?>
      <?php if($user_data->author_twitter) { ?><li class="twitter"><a href="<?php echo esc_attr($user_data->author_twitter); ?>" target="_blank">Twitter</a></li><?php }; ?>
      <?php if($user_data->author_facebook) { ?><li class="facebook"><a href="<?php echo esc_attr($user_data->author_facebook); ?>" target="_blank">Facebook</a></li><?php }; ?>
     </ul>
     <?php }; ?>
    </div><!-- END author_meta -->
   </div><!-- END .author_info -->
   <?php
     endforeach;
    endif;
   ?>
  </div>

  <?php if ($options['show_next_post']) : ?>
  <div id="previous_next_post" class="clearfix">
   <p id="previous_post"><?php previous_post_link('%link') ?></p>
   <p id="next_post"><?php next_post_link('%link') ?></p>
  </div>
  <?php endif; ?>

  <?php endwhile; endif; ?>

  <div class="clearfix">

  <?php
       // related post *******************************************************************************
       if ($options['show_related_post']) :
       $categories = get_the_category($post->ID);
       if ($categories) {
       $category_ids = array();
        foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
         $args=array(
                     'category__in' => $category_ids,
                     'post__not_in' => array($post->ID),
                     'showposts'=>5,
                     'orderby' => 'rand'
                   );
        $my_query = new wp_query($args);
        if($my_query->have_posts()) {
  ?>
  <div id="related_post">
   <h2 class="single_headline"><?php _e("Related post","tcd-w"); ?></h2>
   <ol class="clearfix">
    <?php while ($my_query->have_posts()) { $my_query->the_post(); ?>
    <li class="clearfix">
     <a class="image" href="<?php the_permalink() ?>"><?php if ( has_post_thumbnail()) { the_post_thumbnail('size1'); } else { echo '<img src="'; bloginfo('template_url'); echo '/img/common/no_image1.gif" alt="" title="" />'; }; ?></a>
     <h4 class="title"><a href="<?php the_permalink() ?>"><?php trim_title(32); ?></a></h4>
    </li>
    <?php }; ?>
   </ol>
  </div>
  <?php }; }; wp_reset_postdata(); ?>
  <?php endif; ?>

  <?php
       // recommend post ******************************************************************************
       if ($options['show_recommend']) :
       $args = array('post_type' => 'post', 'posts_per_page' => 5, 'order_by' => 'rand', 'meta_key' => 'recommend_post', 'meta_value' => 'on');
       $recommend_query = new WP_Query($args);
       if($recommend_query->have_posts()) {
  ?>
  <div id="single_recommend_post">
   <h2 class="single_headline"><?php _e("Recommend post","tcd-w"); ?></h2>
   <ol>
    <?php while($recommend_query->have_posts()): $recommend_query->the_post(); ?>
    <li class="clearfix">
     <a class="image" href="<?php the_permalink() ?>"><?php if ( has_post_thumbnail()) { the_post_thumbnail('size1'); } else { echo '<img src="'; bloginfo('template_url'); echo '/img/common/no_image1.gif" alt="" title="" />'; }; ?></a>
     <h4 class="title"><a href="<?php the_permalink() ?>"><?php trim_title(32); ?></a></h4>
    </li>
    <?php endwhile;  wp_reset_postdata(); ?>
   </ol>
  </div>
  <?php }; endif; ?>

  </div>

  <?php if ($options['show_comment']) : if (function_exists('wp_list_comments')) { comments_template('', true); } else { comments_template(); }; endif; ?>

 </div><!-- END #main_contents -->

</div><!-- END #main_col -->

<?php get_template_part('sidebar'); ?>

<?php get_footer(); ?>
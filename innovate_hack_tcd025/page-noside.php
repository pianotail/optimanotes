<?php
/*
Template Name:No side
*/
?>
<?php get_header(); $options = get_desing_plus_option(); ?>

<div id="main_col">

 <div id="main_contents" class="clearfix">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <h2 class="post_title" id="page_title"><?php the_title(); ?></h2>

  <div class="post_content clearfix">
   <?php the_content(__('Read more', 'tcd-w')); ?>
   <?php custom_wp_link_pages(); ?>
  </div>

  <?php if ($options['show_comment']) : if (function_exists('wp_list_comments')) { comments_template('', true); } else { comments_template(); }; endif; ?>

  <?php endwhile; endif; ?>

 </div><!-- END #main_contents -->

</div><!-- END #main_col -->

<?php get_footer(); ?>
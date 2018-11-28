<?php
/*
Template Name:No side, No comment
*/
?>
<?php get_header(); ?>

<div id="main_col">

 <div id="main_contents" class="clearfix">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <h2 class="post_title" id="page_title"><?php the_title(); ?></h2>

  <div class="post_content clearfix">
   <?php the_content(__('Read more', 'tcd-w')); ?>
   <?php custom_wp_link_pages(); ?>
  </div>

  <?php endwhile; endif; ?>

 </div><!-- END #main_contents -->

</div><!-- END #main_col -->

<?php get_footer(); ?>
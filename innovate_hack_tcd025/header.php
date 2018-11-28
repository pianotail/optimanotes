<?php $options = get_desing_plus_option(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title><?php wp_title('|', true, 'right'); ?></title>
<meta name="description" content="<?php seo_description(); ?>">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php wp_enqueue_style('style', get_stylesheet_uri(), false, version_num(), 'screen'); wp_enqueue_script( 'jquery' ); if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/Icon-60@3x.png">
<meta name="google-site-verification" content="6GdDhasBo4JSZi_i398bxXxKEAe5ut3PUwbx9hyl0TA" />
</head>
<body <?php body_class(); ?>>

 <!-- global menu -->
 <?php
      if (has_nav_menu('global-menu')) {
      $menu_to_count = wp_nav_menu(array('echo' => false, 'depth' => '1', 'theme_location' => 'global-menu'));
      $menu_items = substr_count($menu_to_count,'class="menu-item ');
 ?>
 <div id="global_menu_wrap">
  <a href="#" class="menu_button"><?php _e('menu', 'tcd-w'); ?></a>
  <div id="global_menu" class="clearfix num<?php echo $menu_items; ?>">
   <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'global-menu' , 'container' => '' ) ); ?>
  </div>
 </div>
 <?php }; ?>

 <div id="header">

  <div id="header_inner">

   <!-- logo -->
   <?php the_dp_logo(); ?>

   <!-- banner1 -->
   <?php if(!is_mobile()) { ?>
   <?php if($options['header_ad_code1']||$options['header_ad_image1']) { ?>
   <div id="header_banner1">
    <?php if ($options['header_ad_code1']) { ?>
     <?php echo $options['header_ad_code1']; ?>
    <?php } else { ?>
     <a href="<?php esc_attr_e( $options['header_ad_url1'] ); ?>" target="_blank"><img src="<?php esc_attr_e( $options['header_ad_image1'] ); ?>" alt="" title="" /></a>
<?php }; ?>
   </div>
   <?php }; ?>
   <?php }; ?>
   

 </div><!-- END #header_inner -->
 </div><!-- END #header -->

 <!-- tagline -->
 <div id="header_bottom">
  <?php if(is_front_page()) { ?>
  <h2 id="site_description"><?php echo bloginfo('description'); ?></h2>
  <?php } else { ?>
  <?php get_template_part('breadcrumb'); ?>
  <?php }; ?>
 </div>

 <div id="contents" class="clearfix">
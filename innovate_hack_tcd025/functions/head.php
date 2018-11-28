<?php
     function tcd_head() {
       $options = get_desing_plus_option();
       $logo = dp_logo_to_display();
?>

<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js?ver=<?php echo version_num(); ?>"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jscript.js?ver=<?php echo version_num(); ?>"></script>

<link rel="stylesheet" media="screen and (max-width:641px)" href="<?php echo get_template_directory_uri(); ?>/responsive.css?ver=<?php echo version_num(); ?>">

<?php if (strtoupper(get_locale()) == 'JA') : //to fix the font-size for japanese font ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/japanese.css?ver=<?php echo version_num(); ?>">
<?php endif; ?>

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js?ver=<?php echo version_num(); ?>"></script>
<![endif]-->

<link rel="stylesheet" media="screen and (max-width:641px)" href="<?php echo get_template_directory_uri(); ?>/style_plus.css?ver=<?php echo version_num(); ?>">

<style type="text/css">

body { font-size:<?php echo $options['content_font_size']; ?>px; }

<?php if($logo) { ?>
#logo { top:<?php echo ($options['logotop'] - 50); ?>px; left:<?php echo $options['logoleft']; ?>px; }
<?php }; ?>

a:hover, #header_button li a:hover, #header_button li a.active, #header_menu li a:hover, #copyright_area a:hover, #bread_crumb .last, .styled_post_list1 li a:hover, .post_meta a:hover
 { color:#<?php echo $options['pickedcolor1']; ?>; }

.design_date, #load_post a:hover, #header_category_list, #header_tag_list, #header_button li#category_button a:before, #header_button li#recommend_button a:before, #header_button li#tag_button a:before, #header_button li#misc_button a:before, #header_recommend_list a:before, #header_misc_list a:before,
 .pc #global_menu ul a:hover, .pc #global_menu ul ul a:hover, #post_list_tab li a:hover, #return_top a:hover, #wp-calendar td a:hover, #wp-calendar #prev a:hover, #wp-calendar #next a:hover, .widget_search #search-btn input:hover, .widget_search #searchsubmit:hover,
  #related_post .image:hover img, #submit_comment:hover, #post_pagination a:hover, #post_pagination p, .tcdw_category_list_widget a:hover, .mobile #global_menu ul a:hover, a.menu_button:hover, #load_post a:hover, #footer_social_link li a:hover, .author_info_link:hover, .author_info .author_social_link li.author_link a:hover
   { background-color:#<?php echo $options['pickedcolor1']; ?>; }

#comment_textarea textarea:focus, #guest_info input:focus, .single_headline, #related_post .image:hover img, .post_list .image:hover img, .styled_post_list1 .image:hover img
 { border-color:#<?php echo $options['pickedcolor1']; ?>; }

<?php if($options['css_code']) { echo $options['css_code']; };?>

</style>

<?php if(is_home() || is_archive() || is_search()) { ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.infinitescroll.min.js?ver=<?php echo version_num(); ?>"></script>
<script type="text/javascript">
  jQuery(document).ready(function($){
    $('#post_list').infinitescroll({
      navSelector  : '#load_post',
      nextSelector : '#load_post a',
      itemSelector : '.post_item',
      animate      : true,
      extraScrollPx: 300,
      errorCallback: function() { 
          $('#infscr-loading').animate({opacity: 0.8},1000).fadeOut('normal');
      },
      loading: {
          msgText : '<?php _e('Loading post...', 'tcd-w');  ?>',
          finishedMsg : '<?php _e('No more post', 'tcd-w');  ?>',
          img : '<?php bloginfo('template_url'); ?>/img/common/loader.gif'
        }
      },function(arrayOfNewElems){
          $('#load_post a').show();
      }
    );
    $(window).unbind('.infscr');
    $('#load_post a').click(function(){
     $('#load_post a').hide();
     $('#post_list').infinitescroll('retrieve');
     $('#load_post').show();
     return false;
    });
  });
</script>
<?php }; ?>

<?php
     if(is_front_page()) {
       if ($options['show_header_slider']){
         $post_order = $options['header_slider_order'];
         if($post_order == 'date' || $post_order == 'rand') {
?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.easing.js?ver=<?php echo version_num(); ?>"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider-min.js?ver=<?php echo version_num(); ?>"></script>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/flexslider.css?ver=<?php echo version_num(); ?>">
<script type="text/javascript">
jQuery(window).on('load',function() {
 jQuery('.flexslider').flexslider({
   animation: 'slide',
   easing: 'easeOutExpo',
   animationSpeed: 800,
   slideshowSpeed: 5000,
   animationLoop: true,
   useCSS: true,
   pauseOnHover: true,
   touch: true,
   smoothHeight: true,
   directionNav: false
 });
});
</script>
<?php }; }; }; ?>

<?php if($options['label_footer_slider']) { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/owl.carousel.css?ver=<?php echo version_num(); ?>" type="text/css" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/owl.carousel.min.js?ver=<?php echo version_num(); ?>"></script>
<script type="text/javascript">
jQuery(window).on('load',function() {
 jQuery("#recent_post_slider").owlCarousel({
  loop: true,
  autoplay: true,
  autoplaySpeed: 700,
  autoplayTimeout: 7000,
  autoplayHoverPause: true,
  responsive:{
    0:{ items:2, margin:10, nav:false },
    640:{ items:5, margin:10, nav:true, navSpeed:700 }
  }
 });
});
</script>
<?php }; ?>

<?php
     };
     add_action("wp_head", "tcd_head");
?>
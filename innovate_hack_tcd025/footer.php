<?php $options = get_desing_plus_option(); ?>

 </div><!-- END #contents -->

 <?php if($options['label_footer_slider']) { ?>
 <div id="footer_slider">
  <div id="recent_post_slider_wrap">
   <h4 class="headline"><?php echo $options['label_footer_slider']; ?></h4>
   <div id="recent_post_slider" class="owl-carousel">
    <?php
         $post_num = $options['footer_slider_num'];
         $post_type = $options['footer_slider_type'];
         $post_order = $options['footer_slider_order'];
         if($post_order == 'date') {
           $args = array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => $post_num, 'meta_key' => $post_type, 'meta_value' => 'on');
         } else {
           $args = array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => $post_num, 'meta_key' => $post_type, 'meta_value' => 'on', 'orderby' => 'rand');
         };
         $slider_post = get_posts($args);
         if ($slider_post) {
           foreach ($slider_post as $post) : setup_postdata ($post);
    ?>
    <div class="item">
     <a href="<?php the_permalink() ?>">
      <?php if ( has_post_thumbnail()) { the_post_thumbnail('size2'); } else { echo '<img src="'; bloginfo('template_url'); echo '/img/common/no_image2.gif" alt="" title="" />'; }; ?>
      <span class="title"><?php trim_title(28); ?></span>
     </a>
    </div>
    <?php endforeach; wp_reset_query(); }; ?>
   </div>
  </div>
 </div>
 <?php }; ?>

 <div id="footer">
  <div id="footer_inner" class="clearfix">

   <?php
        if(!is_mobile()) {
          if(is_active_sidebar('footer_widget')){
   ?>
   <div id="footer_widget1">
    <?php dynamic_sidebar('footer_widget'); ?>
   </div><!-- END #footer_widget1 -->
   <?php
          };
          if(is_active_sidebar('footer_widget2')){
   ?>
   <div id="footer_widget2">
    <?php dynamic_sidebar('footer_widget2'); ?>
   </div><!-- END #footer_widget2 -->
   <?php
          };
        } else {
          if(is_active_sidebar('mobile_widget_footer')){
   ?>
   <div id="footer_widget">
    <?php dynamic_sidebar('mobile_widget_footer'); ?>
   </div><!-- END #footer_widget -->
   <?php
          };
        };
   ?>

   <!-- social button -->
   <?php if ($options['show_rss'] or $options['twitter_url'] or $options['facebook_url']) { ?>
   <ul class="clearfix" id="footer_social_link">
    <?php if ($options['twitter_url']) : ?>
    <li class="twitter"><a class="target_blank" href="<?php echo $options['twitter_url']; ?>">Twitter</a></li>
    <?php endif; ?>
    <?php if ($options['facebook_url']) : ?>
    <li class="facebook"><a class="target_blank" href="<?php echo $options['facebook_url']; ?>">Facebook</a></li>
    <?php endif; ?>
    <?php if ($options['show_rss']) : ?>
    <li class="rss"><a class="target_blank" href="<?php bloginfo('rss2_url'); ?>">RSS</a></li>
    <?php endif; ?>
   </ul>
   <?php }; ?>

  </div><!-- END #footer_inner -->
 </div><!-- END #footer -->

 <div id="return_top">
  <a href="#header_top"><img src="<?php bloginfo('template_url'); ?>/img/footer/return_top.png" alt="" title="" /><?php _e('PAGE TOP', 'tcd-w'); ?></a>
 </div>

 <div id="copyright_area">
  <div id="copyright_area_inner" class="clearfix">
   <!-- footer menu -->
   <?php if (has_nav_menu('footer-menu')) { ?>
   <div id="footer_menu">
    <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'depth' => '1', 'theme_location' => 'footer-menu' , 'container' => '' ) ); ?>
   </div>
   <?php };?>
   <p id="copyright"><?php _e('Copyright &copy;&nbsp; ', 'tcd-w'); ?><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a> All rights reserved.</p>
  </div>
 </div>

 <?php if(!is_home()) { ?>
 <!-- facebook share button code -->
 <div id="fb-root"></div>
 <script>(function(d, s, id) {
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) return;
   js = d.createElement(s); js.id = id;
   js.src = "//connect.facebook.net/<?php if (strtoupper(get_locale()) == 'JA') { echo "ja_JP"; } else { echo "en_US"; }; ?>/all.js#xfbml=1";
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));</script>
 <?php }; ?>
<!-- iTunes code start-->
<script type='text/javascript'>var _merchantSettings=_merchantSettings || [];_merchantSettings.push(['AT', '10l87d']);(function(){var autolink=document.createElement('script');autolink.type='text/javascript';autolink.async=true; autolink.src= ('https:' == document.location.protocol) ? 'https://autolinkmaker.itunes.apple.com/js/itunes_autolinkmaker.js' : 'http://autolinkmaker.itunes.apple.com/js/itunes_autolinkmaker.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(autolink, s);})();</script>
<!-- iTunes code last-->
<?php wp_footer(); ?>
</body>
</html>
<?php

 // Start class widget //
 class tcdw_category_list_widget extends WP_Widget {

 // Constructor //
 function tcdw_category_list_widget() {
  $widget_ops = array( 'classname' => 'tcdw_category_list_widget', 'description' => __('Displays designed category list.', 'tcd-w') ); // Widget Settings
  $control_ops = array( 'id_base' => 'tcdw_category_list_widget' ); // Widget Control Settings
  parent::__construct( 'tcdw_category_list_widget', __('Category list (tcd ver)', 'tcd-w'), $widget_ops, $control_ops ); // Create the widget
 }

 // Extract Args //
 function widget($args, $instance) {
  extract( $args );
   $title = apply_filters('widget_title', $instance['title']); // the widget title
   $exclude_cat_num = $instance['exclude_cat_num']; // category id to exclude

   // Before widget //
   echo $before_widget;

   // Title of widget //
   if ( $title ) { echo $before_title . $title . $after_title; }

   // Widget output //
?>
<ul>
 <?php wp_list_categories('title_li=&exclude='.$exclude_cat_num); ?>
</ul>
<?php

   // After widget //
   echo $after_widget;

} // end function widget


 // Update Settings //
 function update($new_instance, $old_instance) {
  $instance['title'] = strip_tags($new_instance['title']);
  $instance['exclude_cat_num'] = $new_instance['exclude_cat_num'];
  return $instance;
 }

 // Widget Control Panel //
 function form($instance) {
  $defaults = array( 'title' => __('Category list', 'tcd-w'), 'exclude_cat_num' => '');
  $instance = wp_parse_args( (array) $instance, $defaults );
?>
<p>
 <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tcd-w'); ?></label>
 <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>'" type="text" value="<?php echo $instance['title']; ?>" />
</p>
<p>
 <label for="<?php echo $this->get_field_id('exclude_cat_num'); ?>"><?php _e('Categories To Exclude:', 'tcd-w'); ?></label>
 <input class="widefat" id="<?php echo $this->get_field_id('exclude_cat_num'); ?>" name="<?php echo $this->get_field_name('exclude_cat_num'); ?>'" type="text" value="<?php echo $instance['exclude_cat_num']; ?>" />
 <span><?php _e('Enter a comma-seperated list of category ID numbers, example 2,4,10<br />(Don\'t enter comma for last number).', 'tcd-w'); ?></span>
</p>
<?php
 } // end function form
}

// End class widget
add_action('widgets_init', create_function('', 'return register_widget("tcdw_category_list_widget");'));
?>
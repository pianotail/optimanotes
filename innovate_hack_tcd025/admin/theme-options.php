<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * オプション初期値
 * @var array 
 */
global $dp_default_options;
$dp_default_options = array(
	'pickedcolor1' => 'e02e14',
	'logotop' => 0,
	'logoleft' => 0,
	'content_font_size' => '14',
	'show_date' => 1,
	'show_category' => 1,
	'show_tag' => 1,
	'show_comment' => 1,
	'show_author' => 1,
	'show_trackback' => 1,
	'show_related_post' => 1,
	'show_next_post' => 1,
	'show_thumbnail' => 1,
	'show_bookmark' => 1,
	'show_rss' => 1,
	'show_recommend' => 1,
	'twitter_url' => '',
	'facebook_url' => '',
	'header_ad_code1' => '',
	'header_ad_url1' => '',
	'header_ad_image1' => false,

	'pl_top_ad_code1' => '',
	'pl_top_ad_url1' => '',
	'pl_top_ad_image1' => false,
	'pl_top_ad_code2' => '',
	'pl_top_ad_url2' => '',
	'pl_top_ad_image2' => false,

	'label_index_post_list' => __('Latest post', 'tcd-w'),
	'label_recommend_post1' => __('Recommend post', 'tcd-w'),
	'label_recommend_post2' => __('Recommend post', 'tcd-w'),
	'label_recommend_post3' => __('Recommend post', 'tcd-w'),
	'label_recommend_post4' => __('Recommend post', 'tcd-w'),
	'label_recommend_post5' => __('Recommend post', 'tcd-w'),
	'recommend_post_order1'  => 'date',
	'recommend_post_order2'  => 'date',
	'recommend_post_order3'  => 'date',
	'recommend_post_order4'  => 'date',
	'recommend_post_order5'  => 'date',
	'recommend_post_num1' => '10',
	'recommend_post_num2' => '10',
	'recommend_post_num3' => '10',
	'recommend_post_num4' => '10',
	'recommend_post_num5' => '10',
	'show_index_post_list' => 1,
	'show_recommend_post1' => 0,
	'show_recommend_post2' => 0,
	'show_recommend_post3' => 0,
	'show_recommend_post4' => 0,
	'show_recommend_post5' => 0,


	'label_footer_slider' => '',
	'footer_slider_order'  => 'date',
	'footer_slider_num' => '10',
	'footer_slider_type'  => 'recommend_post',

	'show_header_slider' => 0,
	'header_slider_order'  => 'date',
	'header_slider_type'  => 'recommend_post',

	'css_code' => '',

);

/**
 * Design Plusのオプションを返す
 * @global array $dp_default_options
 * @return array 
 */
function get_desing_plus_option(){
	global $dp_default_options;
	return shortcode_atts($dp_default_options, get_option('dp_options', array()));
}


// 登録
function theme_options_init(){
 register_setting( 'design_plus_options', 'dp_options', 'theme_options_validate' );
}


// ロード
function theme_options_add_page() {
 add_theme_page( __( 'Theme Options', 'tcd-w' ), __( 'Theme Options', 'tcd-w' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}


/**
 * おすすめ記事の並び順初期設定
 * @var array 
 */
global $recommend_post_order_options1;
$recommend_post_order_options1 = array(
 'date' => array( 'value' => 'date', 'label' => __( 'Order by Date', 'tcd-w' )),
 'rand' => array( 'value' => 'rand', 'label' => __( 'Order by Random', 'tcd-w' ))
);
global $recommend_post_order_options2;
$recommend_post_order_options2 = array(
 'date' => array( 'value' => 'date', 'label' => __( 'Order by Date', 'tcd-w' )),
 'rand' => array( 'value' => 'rand', 'label' => __( 'Order by Random', 'tcd-w' ))
);
global $recommend_post_order_options3;
$recommend_post_order_options3 = array(
 'date' => array( 'value' => 'date', 'label' => __( 'Order by Date', 'tcd-w' )),
 'rand' => array( 'value' => 'rand', 'label' => __( 'Order by Random', 'tcd-w' ))
);
global $recommend_post_order_options4;
$recommend_post_order_options4 = array(
 'date' => array( 'value' => 'date', 'label' => __( 'Order by Date', 'tcd-w' )),
 'rand' => array( 'value' => 'rand', 'label' => __( 'Order by Random', 'tcd-w' ))
);
global $recommend_post_order_options5;
$recommend_post_order_options5 = array(
 'date' => array( 'value' => 'date', 'label' => __( 'Order by Date', 'tcd-w' )),
 'rand' => array( 'value' => 'rand', 'label' => __( 'Order by Random', 'tcd-w' ))
);


/**
 * フッタースライダーの初期設定
 * @var array 
 */
global $footer_slider_order_options;
$footer_slider_order_options = array(
 'date' => array( 'value' => 'date', 'label' => __( 'Order by Date', 'tcd-w' )),
 'rand' => array( 'value' => 'rand', 'label' => __( 'Order by Random', 'tcd-w' ))
);
global $footer_slider_type_options;
$footer_slider_type_options = array(
 'recommend_post' => array( 'value' => 'recommend_post', 'label' => __( 'Recommend post1', 'tcd-w' )),
 'recommend_post2' => array( 'value' => 'recommend_post2', 'label' => __( 'Recommend post2', 'tcd-w' )),
 'recommend_post3' => array( 'value' => 'recommend_post3', 'label' => __( 'Recommend post3', 'tcd-w' )),
 'recommend_post4' => array( 'value' => 'recommend_post4', 'label' => __( 'Recommend post4', 'tcd-w' )),
 'recommend_post5' => array( 'value' => 'recommend_post5', 'label' => __( 'Recommend post5', 'tcd-w' ))
);


/**
 * ヘッダースライダーの初期設定
 * @var array 
 */
global $header_slider_order_options;
$header_slider_order_options = array(
 'date' => array( 'value' => 'date', 'label' => __( 'Order by Date (use slider)', 'tcd-w' )),
 'no_slider_date' => array( 'value' => 'no_slider_date', 'label' => __( 'Order by Date (no slider)', 'tcd-w' )),
 'rand' => array( 'value' => 'rand', 'label' => __( 'Order by Random (use slider)', 'tcd-w' )),
 'no_slider_rand' => array( 'value' => 'no_slider_rand', 'label' => __( 'Order by Random (no slider)', 'tcd-w' ))
);
global $header_slider_type_options;
$header_slider_type_options = array(
 'recommend_post' => array( 'value' => 'recommend_post', 'label' => __( 'Recommend post1', 'tcd-w' )),
 'recommend_post2' => array( 'value' => 'recommend_post2', 'label' => __( 'Recommend post2', 'tcd-w' )),
 'recommend_post3' => array( 'value' => 'recommend_post3', 'label' => __( 'Recommend post3', 'tcd-w' )),
 'recommend_post4' => array( 'value' => 'recommend_post4', 'label' => __( 'Recommend post4', 'tcd-w' )),
 'recommend_post5' => array( 'value' => 'recommend_post5', 'label' => __( 'Recommend post5', 'tcd-w' ))
);


// テーマオプション画面の作成
function theme_options_do_page() {
 global $recommend_post_order_options1, $recommend_post_order_options2, $recommend_post_order_options3, $recommend_post_order_options4, $recommend_post_order_options5, $footer_slider_order_options, $footer_slider_type_options, $header_slider_order_options, $header_slider_type_options, $dp_upload_error;
 $options = get_desing_plus_option(); 

 if ( ! isset( $_REQUEST['settings-updated'] ) )
  $_REQUEST['settings-updated'] = false;

?>

<div class="wrap">

 <?php screen_icon(); echo "<h2>" . __( 'Theme Options', 'tcd-w' ) . "</h2>"; ?>

 <?php // 更新時のメッセージ
       if ( false !== $_REQUEST['settings-updated'] ) :
 ?>
 <div class="updated fade"><p><strong><?php _e('Updated', 'tcd-w');  ?></strong></p></div>
 <?php endif; ?>

 <?php /* ファイルアップロード時のメッセージ */ if(!empty($dp_upload_error['message'])): ?>
  <?php if($dp_upload_error['error']): ?>
   <div id="error" class="error"><p><?php echo $dp_upload_error['message']; ?></p></div>
  <?php else: ?>
   <div id="message" class="updated fade"><p><?php echo $dp_upload_error['message']; ?></p></div>
  <?php endif; ?>
 <?php endif; ?>

 <div id="my_theme_option" class="cf">

  <div id="my_theme_left">
   <ul id="theme_tab" class="cf">
    <li><a href="#tab-content1"><?php _e('Basic', 'tcd-w');  ?></a></li>
    <li><a href="#tab-content2"><?php _e('Logo', 'tcd-w');  ?></a></li>
    <li><a href="#tab-content3"><?php _e('Index Page', 'tcd-w');  ?></a></li>
    <li><a href="#tab-content4"><?php _e('Post List Banner', 'tcd-w');  ?></a></li>
    <li><a href="#tab-content5"><?php _e('Header Banner', 'tcd-w');  ?></a></li>
   </ul>
  </div>

  <div id="my_theme_right">

  <form method="post" action="options.php" enctype="multipart/form-data">

  <?php settings_fields( 'design_plus_options' ); ?>

  <div id="tab-panel">

  <!-- #tab-content1 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
  <div id="tab-content1">

   <?php // サイトカラー ?>
   <div id="color_pattern">
    <div class="theme_option_field cf">
     <h3 class="theme_option_headline"><?php _e('Primary color setting', 'tcd-w');  ?></h3>
     <input type="text" id="color1" class="color" name="dp_options[pickedcolor1]" value="<?php esc_attr_e( $options['pickedcolor1'] ); ?>" />
     <input type="button" style="margin:2px 0 0 15px;" class="button-secondary" value="<?php _e('Default color', 'tcd-w');  ?>" onClick="document.getElementById('color1').color.fromString('e02e14')">
     <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
    </div>
   </div>

   <?php // フォントサイズ ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Font size', 'tcd-w');  ?></h3>
    <p><?php _e('Font size of single page and wp-page.', 'tcd-w');  ?></p>
    <input id="dp_options[content_font_size]" class="font_size hankaku" type="text" name="dp_options[content_font_size]" value="<?php esc_attr_e( $options['content_font_size'] ); ?>" /><span>px</span>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // 投稿者名・タグ・コメント ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Display Setup', 'tcd-w');  ?></h3>
    <ul>
     <li><label><input id="dp_options[show_date]" name="dp_options[show_date]" type="checkbox" value="1" <?php checked( '1', $options['show_date'] ); ?> /> <?php _e('Display date', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_category]" name="dp_options[show_category]" type="checkbox" value="1" <?php checked( '1', $options['show_category'] ); ?> /> <?php _e('Display category', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_tag]" name="dp_options[show_tag]" type="checkbox" value="1" <?php checked( '1', $options['show_tag'] ); ?> /> <?php _e('Display tags', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_author]" name="dp_options[show_author]" type="checkbox" value="1" <?php checked( '1', $options['show_author'] ); ?> /> <?php _e('Display author', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_comment]" name="dp_options[show_comment]" type="checkbox" value="1" <?php checked( '1', $options['show_comment'] ); ?> /> <?php _e('Display comment', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_thumbnail]" name="dp_options[show_thumbnail]" type="checkbox" value="1" <?php checked( '1', $options['show_thumbnail'] ); ?> /> <?php _e('Display thumbnail at single post page', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_bookmark]" name="dp_options[show_bookmark]" type="checkbox" value="1" <?php checked( '1', $options['show_bookmark'] ); ?> /> <?php _e('Display bookmark at single post page', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_trackback]" name="dp_options[show_trackback]" type="checkbox" value="1" <?php checked( '1', $options['show_trackback'] ); ?> /> <?php _e('Display trackbacks at single post page', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_related_post]" name="dp_options[show_related_post]" type="checkbox" value="1" <?php checked( '1', $options['show_related_post'] ); ?> /> <?php _e('Display related post at single post page', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_next_post]" name="dp_options[show_next_post]" type="checkbox" value="1" <?php checked( '1', $options['show_next_post'] ); ?> /> <?php _e('Display next previous post link at single post page', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_recommend]" name="dp_options[show_recommend]" type="checkbox" value="1" <?php checked( '1', $options['show_recommend'] ); ?> /> <?php _e('Display recommend post list at single post page', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_rss]" name="dp_options[show_rss]" type="checkbox" value="1" <?php checked( '1', $options['show_rss'] ); ?> /> <?php _e('Display RSS at footer', 'tcd-w');  ?></label></li>
    </ul>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>


   <?php // フッターのスライダーの設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Footer Slider setup', 'tcd-w');  ?></h3>
    <h4 class="theme_option_headline2"><?php _e('Name of the Footer Slider', 'tcd-w');  ?></h4>
    <ul style="margin-bottom:35px;">
     <li>
      <input id="dp_options[label_footer_slider]" class="regular-text" type="text" name="dp_options[label_footer_slider]" value="<?php esc_attr_e( $options['label_footer_slider'] ); ?>" />
     </li>
    </ul>
    <h4 class="theme_option_headline2"><?php _e('Type of post', 'tcd-w');  ?></h4>
    <ul style="margin-bottom:35px;">
     <li>
      <select name="dp_options[footer_slider_type]">
      <?php
           foreach ( $footer_slider_type_options as $option ) :
           $label = $option['label'];
           $selected = '';
           if ( $options['footer_slider_type'] == $option['value']) {
             $selected = 'selected="selected"';
           } else {
             $selected = '';
           }
           echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
           endforeach;
      ?>
      </select>
     </li>
    </ul>
    <h4 class="theme_option_headline2"><?php _e('Number of post', 'tcd-w');  ?></h4>
    <p><?php _e('If you want to show all post in foooter slider, enter <strong>-1</strong>', 'tcd-w');  ?></p>
    <ul style="margin-bottom:35px;">
     <li>
      <input id="dp_options[footer_slider_num]" class="font_size hankaku" type="text" name="dp_options[footer_slider_num]" value="<?php esc_attr_e( $options['footer_slider_num'] ); ?>" />
     </li>
    </ul>
    <h4 class="theme_option_headline2"><?php _e('Order of post', 'tcd-w');  ?></h4>
    <p><?php _e('You can set the order of recommend post.', 'tcd-w');  ?></p>
    <ul style="margin-bottom:10px;">
     <li>
      <select name="dp_options[footer_slider_order]">
      <?php
           foreach ( $footer_slider_order_options as $option ) :
           $label = $option['label'];
           $selected = '';
           if ( $options['footer_slider_order'] == $option['value']) {
             $selected = 'selected="selected"';
           } else {
             $selected = '';
           }
           echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
           endforeach;
      ?>
      </select>
     </li>
    </ul>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>


   <?php // facebook twitter ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('twitter and facebook setup', 'tcd-w');  ?></h3>
    <p><?php _e('When it is blank, twitter and facebook icon will not displayed on a site.', 'tcd-w');  ?></p>
    <ul>
     <li>
      <label style="display:inline-block; min-width:140px;"><?php _e('your twitter URL', 'tcd-w');  ?></label>
      <input id="dp_options[twitter_url]" class="regular-text" type="text" name="dp_options[twitter_url]" value="<?php esc_attr_e( $options['twitter_url'] ); ?>" />
     </li>
     <li>
      <label style="display:inline-block; min-width:140px;"><?php _e('your facebook URL', 'tcd-w');  ?></label>
      <input id="dp_options[facebook_url]" class="regular-text" type="text" name="dp_options[facebook_url]" value="<?php esc_attr_e( $options['facebook_url'] ); ?>" />
     </li>
    </ul>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>


   <?php // ユーザーCSS用の自由記入欄 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Free input area for user definition CSS.', 'tcd-w');  ?></h3>
    <p><?php _e('Code example:<br /><strong>.example { font-size:12px; }</strong>', 'tcd-w');  ?></p>
    <textarea id="dp_options[css_code]" class="large-text" cols="50" rows="10" name="dp_options[css_code]"><?php echo esc_textarea( $options['css_code'] ); ?></textarea>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

  </div><!-- END #tab-content1 -->




  <!-- #tab-content2 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
  <div id="tab-content2">

   <?php // ステップ１ ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Step 1 : Upload image to use for logo.', 'tcd-w');  ?></h3>
    <p><?php _e('Upload image to use for logo from your computer.<br />You can resize your logo image in step 2 and adjust position in step 3.', 'tcd-w');  ?></p>
    <div class="button_area cf">
     <label for="dp_image"><?php _e('Select image to use for logo from your computer.', 'tcd-w');  ?></label>
     <input type="file" name="dp_image" id="dp_image" value="" />
     <input type="submit" class="button-ml" value="<?php _e('Upload', 'tcd-w');  ?>" />
    </div>
    <?php if(dp_logo_exists()): $info = dp_logo_info(); ?>
    <div class="uploaded_logo">
     <h4><?php _e('Uploaded image.', 'tcd-w');  ?></h4>
     <div class="uploaded_logo_image" id="original_logo_size">
      <?php dp_logo_img_tag(false, '', '', 9999); ?>
     </div>
     <p><?php printf(__('Original image size : width %1$dpx, height %2$dpx', 'tcd-w'), $info['width'], $info['height']); ?></p>
    </div>
    <?php else: ?>
    <div class="uploaded_logo">
     <h4><?php _e('The image has not been uploaded yet.<br />A normal text will be used for a site logo.', 'tcd-w');  ?></h4>
    </div>
    <?php endif; ?>
   </div>

   <?php // ステップ２ ?>
   <?php if(dp_logo_exists()): ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Step 2 : Resize uploaded image.', 'tcd-w');  ?></h3>
    <?php if(dp_logo_exists()): ?>
    <p><?php _e('You can resize uploaded image.<br />If you don\'t need to resize, go to step 3.', 'tcd-w');  ?></p>
    <div class="uploaded_logo">
     <h4><?php _e('Please drag the range to cut off.', 'tcd-w');  ?></h4>
     <div class="uploaded_logo_image">
      <?php dp_logo_resize_base(9999); ?>
     </div>
     <div class="resize_amount">
      <label><?php _e('Ratio', 'tcd-w');  ?>: <input type="text" name="dp_resize_ratio" id="dp_resize_ratio" value="100" />%</label>
      <label><?php _e('Width', 'tcd-w');  ?>: <input type="text" name="dp_resized_width" id="dp_resized_width" />px</label>
      <label><?php _e('Height', 'tcd-w');  ?>: <input type="text" name="dp_resized_height" id="dp_resized_height" />px</label>
     </div>
     <div id="resize_button_area">
      <input type="submit" class="button-primary" value="<?php _e('Resize', 'tcd-w'); ?>" />
     </div>
    </div>
    <?php if($info = dp_logo_info(true)): ?>
    <div class="uploaded_logo">
     <h4><?php printf(__('Resized image : width %1$dpx, height %2$dpx', 'tcd-w'), $info['width'], $info['height']); ?></h4>
     <div class="uploaded_logo_image">
      <?php dp_logo_img_tag(true, '', '', 9999); ?>
     </div>
    </div>
    <?php endif; ?>
    <?php endif; ?>
   </div>
   <?php endif; ?>

   <?php // ステップ３ ?>
   <?php if(dp_logo_exists()): ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Step 3 : Adjust position of logo.', 'tcd-w');  ?></h3>
    <?php if(dp_logo_exists()): ?>
    <p><?php _e('Drag the logo image and adjust the position.', 'tcd-w');  ?></p>
    <div id="tcd-w-logo-adjuster" class="ratio-<?php echo '760-760'; ?>">
     <?php if(dp_logo_resize_tag(760, 760, $options['logotop'], $options['logoleft'])): ?>
     <?php else: ?>
     <span><?php _e('Logo size is too big. Please resize your logo image.', 'tcd-w');  ?></span>
     <?php endif; ?>
    </div>
    <div class="hide">
     <label><?php _e('Top', 'tcd-w');  ?>: <input type="text" name="dp_options[logotop]" id="dp-options-logotop" value="<?php esc_attr_e( $options['logotop'] ); ?>" />px </label>
     <label><?php _e('Left', 'tcd-w');  ?>: <input type="text" name="dp_options[logoleft]" id="dp-options-logoleft" value="<?php esc_attr_e( $options['logoleft'] ); ?>" />px </label>
     <input type="button" class="button" id="dp-adjust-realvalue" value="adjust" />
    </div>
    <p><input type="submit" class="button-ml" value="<?php _e('Save the position', 'tcd-w');  ?>" /></p>
    <?php endif; ?>
   </div>
   <?php endif; ?>

   <?php // 画像の削除 ?>
   <?php if(dp_logo_exists()): ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Delete logo image.', 'tcd-w');  ?></h3>
    <p><?php _e('If you delete the logo image, normal text will be used for a site logo.', 'tcd-w');  ?></p>
    <p><a class="button-ml" href="<?php echo wp_nonce_url(admin_url('themes.php?page=theme_options'), 'dp_delete_image_'.  get_current_user_id()); ?>" onclick="if(!confirm('<?php _e('Are you sure to delete logo image?', 'tcd-w'); ?>')) return false;"><?php _e('Delete Image', 'tcd-w');  ?></a></p>
   </div>
   <?php endif; ?>

  </div><!-- END #tab-content2 -->




  <!-- #tab-content3 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
  <div id="tab-content3">

   <?php // スライダーの設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Slider setup', 'tcd-w');  ?></h3>
    <p><?php _e('Maximum number of post shown in slider is 18.', 'tcd-w');  ?></p>
    <h4 class="theme_option_headline2"><?php _e('Check if you want to show slider', 'tcd-w');  ?></h4>
    <ul style="margin-bottom:35px;">
     <li><label><input id="dp_options[show_header_slider]" name="dp_options[show_header_slider]" type="checkbox" value="1" <?php checked( '1', $options['show_header_slider'] ); ?> /> <?php _e('Display Slider', 'tcd-w');  ?></label></li>
    </ul>
    <h4 class="theme_option_headline2"><?php _e('Type of post', 'tcd-w');  ?></h4>
    <ul style="margin-bottom:35px;">
     <li>
      <select name="dp_options[header_slider_type]">
      <?php
           foreach ( $header_slider_type_options as $option ) :
           $label = $option['label'];
           $selected = '';
           if ( $options['header_slider_type'] == $option['value']) {
             $selected = 'selected="selected"';
           } else {
             $selected = '';
           }
           echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
           endforeach;
      ?>
      </select>
     </li>
    </ul>
    <h4 class="theme_option_headline2"><?php _e('Slider pattern', 'tcd-w');  ?></h4>
    <p><?php _e('You can set the order of recommend post slider.<br />If you choose No Slider, non animated post list will be shown.<br />To use slider function, you need to set at least 6 or more recommmend posts<br />The maximum slider page is 3 pages.', 'tcd-w');  ?></p>
    <ul style="margin-bottom:10px;">
     <li>
      <select name="dp_options[header_slider_order]">
      <?php
           foreach ( $header_slider_order_options as $option ) :
           $label = $option['label'];
           $selected = '';
           if ( $options['header_slider_order'] == $option['value']) {
             $selected = 'selected="selected"';
           } else {
             $selected = '';
           }
           echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
           endforeach;
      ?>
      </select>
     </li>
    </ul>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // 新着タブの設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Recent post tab setup', 'tcd-w');  ?></h3>
    <p style="margin-bottom:30px;"><?php _e('Latest post will be shown for recent post tab.', 'tcd-w');  ?></p>
    <div class="theme_option_content">
     <h4 class="theme_option_headline2"><?php _e('Check if you want to show recent post tab', 'tcd-w');  ?></h4>
     <p><label><input id="dp_options[show_index_post_list]" name="dp_options[show_index_post_list]" type="checkbox" value="1" <?php checked( '1', $options['show_index_post_list'] ); ?> /> <?php _e('Display recent post tab', 'tcd-w');  ?></label></p>
    </div>
    <div class="theme_option_content">
     <h4 class="theme_option_headline2"><?php _e('Name of recent post tab', 'tcd-w');  ?></h4>
     <p><input id="dp_options[label_index_post_list]" class="regular-text hankaku" type="text" name="dp_options[label_index_post_list]" value="<?php esc_attr_e( $options['label_index_post_list'] ); ?>" /></p>
    </div>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // タブ記事一覧1の設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Tab post list1 setup', 'tcd-w');  ?></h3>
    <p><?php _e('Please check the recommend post checkbox in post edit page before you use this function.<br />When it is blank, tab and the post list will not be display in front page.', 'tcd-w');  ?></p>
    <div class="theme_option_content">
     <h4 class="theme_option_headline2"><?php _e('Check if you want to show tab post list1', 'tcd-w');  ?></h4>
     <p><label><input id="dp_options[show_recommend_post1]" name="dp_options[show_recommend_post1]" type="checkbox" value="1" <?php checked( '1', $options['show_recommend_post1'] ); ?> /> <?php _e('Display tab post list1', 'tcd-w');  ?></label></p>
    </div>
    <div class="theme_option_content">
     <h4 class="theme_option_headline2"><?php _e('Name of post list', 'tcd-w');  ?></h4>
     <p><input id="dp_options[label_recommend_post1]" class="regular-text" type="text" name="dp_options[label_recommend_post1]" value="<?php esc_attr_e( $options['label_recommend_post1'] ); ?>" /></p>
    </div>
    <div class="theme_option_content">
     <h4 class="theme_option_headline2"><?php _e('Number of post', 'tcd-w');  ?></h4>
     <p><input id="dp_options[recommend_post_num1]" class="regular-text hankaku" type="text" name="dp_options[recommend_post_num1]" value="<?php esc_attr_e( $options['recommend_post_num1'] ); ?>" /></p>
    </div>
    <div class="theme_option_content">
     <h4 class="theme_option_headline2"><?php _e('Order of post', 'tcd-w');  ?></h4>
     <ul style="margin-bottom:10px;">
      <li>
       <select name="dp_options[recommend_post_order1]">
       <?php
            foreach ( $recommend_post_order_options1 as $option ) :
            $label = $option['label'];
            $selected = '';
            if ( $options['recommend_post_order1'] == $option['value']) {
              $selected = 'selected="selected"';
            } else {
              $selected = '';
            }
            echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
            endforeach;
       ?>
       </select>
      </li>
     </ul>
    </div>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // タブ記事一覧2の設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Tab post list2 setup', 'tcd-w');  ?></h3>
    <p><?php _e('Please check the recommend post checkbox in post edit page before you use this function.<br />When it is blank, tab and the post list will not be display in front page.', 'tcd-w');  ?></p>
    <div class="theme_option_content">
     <h4 class="theme_option_headline2"><?php _e('Check if you want to show tab post list2', 'tcd-w');  ?></h4>
     <p><label><input id="dp_options[show_recommend_post2]" name="dp_options[show_recommend_post2]" type="checkbox" value="1" <?php checked( '1', $options['show_recommend_post2'] ); ?> /> <?php _e('Display tab post list2', 'tcd-w');  ?></label></p>
    </div>
    <div class="theme_option_content">
     <h4 class="theme_option_headline2"><?php _e('Name of post list', 'tcd-w');  ?></h4>
     <p><input id="dp_options[label_recommend_post2]" class="regular-text" type="text" name="dp_options[label_recommend_post2]" value="<?php esc_attr_e( $options['label_recommend_post2'] ); ?>" /></p>
    </div>
    <div class="theme_option_content">
     <h4 class="theme_option_headline2"><?php _e('Number of post', 'tcd-w');  ?></h4>
     <p><input id="dp_options[recommend_post_num2]" class="regular-text hankaku" type="text" name="dp_options[recommend_post_num2]" value="<?php esc_attr_e( $options['recommend_post_num2'] ); ?>" /></p>
    </div>
    <div class="theme_option_content">
     <h4 class="theme_option_headline2"><?php _e('Order of post', 'tcd-w');  ?></h4>
     <ul style="margin-bottom:10px;">
      <li>
       <select name="dp_options[recommend_post_order2]">
       <?php
            foreach ( $recommend_post_order_options2 as $option ) :
            $label = $option['label'];
            $selected = '';
            if ( $options['recommend_post_order2'] == $option['value']) {
              $selected = 'selected="selected"';
            } else {
              $selected = '';
            }
            echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
            endforeach;
       ?>
       </select>
      </li>
     </ul>
    </div>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // タブ記事一覧3の設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Tab post list3 setup', 'tcd-w');  ?></h3>
    <p><?php _e('Please check the recommend post checkbox in post edit page before you use this function.<br />When it is blank, tab and the post list will not be display in front page.', 'tcd-w');  ?></p>
    <div class="theme_option_content">
     <h4 class="theme_option_headline2"><?php _e('Check if you want to show tab post list3', 'tcd-w');  ?></h4>
     <p><label><input id="dp_options[show_recommend_post3]" name="dp_options[show_recommend_post3]" type="checkbox" value="1" <?php checked( '1', $options['show_recommend_post3'] ); ?> /> <?php _e('Display tab post list3', 'tcd-w');  ?></label></p>
    </div>
    <div class="theme_option_content">
     <h4 class="theme_option_headline2"><?php _e('Name of post list', 'tcd-w');  ?></h4>
     <p><input id="dp_options[label_recommend_post3]" class="regular-text" type="text" name="dp_options[label_recommend_post3]" value="<?php esc_attr_e( $options['label_recommend_post3'] ); ?>" /></p>
    </div>
    <div class="theme_option_content">
     <h4 class="theme_option_headline2"><?php _e('Number of post', 'tcd-w');  ?></h4>
     <p><input id="dp_options[recommend_post_num3]" class="regular-text hankaku" type="text" name="dp_options[recommend_post_num3]" value="<?php esc_attr_e( $options['recommend_post_num3'] ); ?>" /></p>
    </div>
    <div class="theme_option_content">
     <h4 class="theme_option_headline2"><?php _e('Order of post', 'tcd-w');  ?></h4>
     <ul style="margin-bottom:10px;">
      <li>
       <select name="dp_options[recommend_post_order3]">
       <?php
            foreach ( $recommend_post_order_options3 as $option ) :
            $label = $option['label'];
            $selected = '';
            if ( $options['recommend_post_order3'] == $option['value']) {
              $selected = 'selected="selected"';
            } else {
              $selected = '';
            }
            echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
            endforeach;
       ?>
       </select>
      </li>
     </ul>
    </div>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // タブ記事一覧4の設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Tab post list4 setup', 'tcd-w');  ?></h3>
    <p><?php _e('Please check the recommend post checkbox in post edit page before you use this function.<br />When it is blank, tab and the post list will not be display in front page.', 'tcd-w');  ?></p>
    <div class="theme_option_content">
     <h4 class="theme_option_headline2"><?php _e('Check if you want to show tab post list4', 'tcd-w');  ?></h4>
     <p><label><input id="dp_options[show_recommend_post4]" name="dp_options[show_recommend_post4]" type="checkbox" value="1" <?php checked( '1', $options['show_recommend_post4'] ); ?> /> <?php _e('Display tab post list4', 'tcd-w');  ?></label></p>
    </div>
    <div class="theme_option_content">
     <h4 class="theme_option_headline2"><?php _e('Name of post list', 'tcd-w');  ?></h4>
     <p><input id="dp_options[label_recommend_post4]" class="regular-text" type="text" name="dp_options[label_recommend_post4]" value="<?php esc_attr_e( $options['label_recommend_post4'] ); ?>" /></p>
    </div>
    <div class="theme_option_content">
     <h4 class="theme_option_headline2"><?php _e('Number of post', 'tcd-w');  ?></h4>
     <p><input id="dp_options[recommend_post_num4]" class="regular-text hankaku" type="text" name="dp_options[recommend_post_num4]" value="<?php esc_attr_e( $options['recommend_post_num4'] ); ?>" /></p>
    </div>
    <div class="theme_option_content">
     <h4 class="theme_option_headline2"><?php _e('Order of post', 'tcd-w');  ?></h4>
     <ul style="margin-bottom:10px;">
      <li>
       <select name="dp_options[recommend_post_order4]">
       <?php
            foreach ( $recommend_post_order_options4 as $option ) :
            $label = $option['label'];
            $selected = '';
            if ( $options['recommend_post_order4'] == $option['value']) {
              $selected = 'selected="selected"';
            } else {
              $selected = '';
            }
            echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
            endforeach;
       ?>
       </select>
      </li>
     </ul>
    </div>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // タブ記事一覧5の設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Tab post list5 setup', 'tcd-w');  ?></h3>
    <p><?php _e('Please check the recommend post checkbox in post edit page before you use this function.<br />When it is blank, tab and the post list will not be display in front page.', 'tcd-w');  ?></p>
    <div class="theme_option_content">
     <h4 class="theme_option_headline2"><?php _e('Check if you want to show tab post list5', 'tcd-w');  ?></h4>
     <p><label><input id="dp_options[show_recommend_post5]" name="dp_options[show_recommend_post5]" type="checkbox" value="1" <?php checked( '1', $options['show_recommend_post5'] ); ?> /> <?php _e('Display tab post list5', 'tcd-w');  ?></label></p>
    </div>
    <div class="theme_option_content">
     <h4 class="theme_option_headline2"><?php _e('Name of post list', 'tcd-w');  ?></h4>
     <p><input id="dp_options[label_recommend_post5]" class="regular-text" type="text" name="dp_options[label_recommend_post5]" value="<?php esc_attr_e( $options['label_recommend_post5'] ); ?>" /></p>
    </div>
    <div class="theme_option_content">
     <h4 class="theme_option_headline2"><?php _e('Number of post', 'tcd-w');  ?></h4>
     <p><input id="dp_options[recommend_post_num5]" class="regular-text hankaku" type="text" name="dp_options[recommend_post_num5]" value="<?php esc_attr_e( $options['recommend_post_num5'] ); ?>" /></p>
    </div>
    <div class="theme_option_content">
     <h4 class="theme_option_headline2"><?php _e('Order of post', 'tcd-w');  ?></h4>
     <ul style="margin-bottom:10px;">
      <li>
       <select name="dp_options[recommend_post_order5]">
       <?php
            foreach ( $recommend_post_order_options5 as $option ) :
            $label = $option['label'];
            $selected = '';
            if ( $options['recommend_post_order5'] == $option['value']) {
              $selected = 'selected="selected"';
            } else {
              $selected = '';
            }
            echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
            endforeach;
       ?>
       </select>
      </li>
     </ul>
    </div>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

  </div><!-- END #tab-content3 -->




  <!-- #tab-content4 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
  <div id="tab-content4">

  <?php // 記事一覧の広告の登録 -------------------------------------------------------------------------------------------- ?>
  <?php for($i = 1; $i <= 2; $i++): ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Post list Top area banner setup', 'tcd-w'); echo $i; ?></h3>

    <div class="sub_box cf" style="margin:0 0 10px 0;">
     <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
     <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
     <textarea id="dp_options[pl_top_ad_code<?php echo $i; ?>]" class="large-text" cols="50" rows="10" name="dp_options[pl_top_ad_code<?php echo $i; ?>]"><?php echo esc_textarea( $options['pl_top_ad_code'.$i] ); ?></textarea>
     <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
    </div>

    <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>

    <div class="sub_box cf" style="margin:0 0 10px 0;">
     <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w');  ?></h4>
     <div class="image_box cf">
      <div class="upload_banner_button_area">
       <div class="hide"><input type="text" size="36" name="dp_options[pl_top_ad_image<?php echo $i; ?>]" value="<?php esc_attr_e( $options['pl_top_ad_image'.$i] ); ?>" /></div>
       <input type="file" name="pl_top_ad_image_file<?php echo $i; ?>" id="pl_top_ad_image_file<?php echo $i; ?>" />
       <input type="submit" class="button-ml" value="<?php echo __( 'Save Image', 'tcd-w' ); ?>" />
      </div>
      <?php if($options['pl_top_ad_image'.$i]) { ?>
       <div class="uploaded_banner_image">
        <img src="<?php esc_attr_e( $options['pl_top_ad_image'.$i] ); ?>" alt="" title="" />
       </div>
       <?php if(dp_is_uploaded_img($options['pl_top_ad_image'.$i])): ?>
       <div class="delete_uploaded_banner_image">
        <a href="<?php echo wp_nonce_url(admin_url('themes.php?page=theme_options'), 'dp_delete_pl_top_ad_image'.$i) ?>" class="button" onclick="if(!confirm('<?php _e('Are you sure to delete this image?', 'tcd-w'); ?>')) return false;"><?php _e('Delete Image', 'tcd-w'); ?></a>
       </div>
      <?php endif; ?>
      <?php }; ?>
     </div>
    </div>

    <div class="sub_box">
     <h4 class="theme_option_headline2"><?php _e('Register affiliate code or link url for registered image', 'tcd-w');  ?></h4>
     <input id="dp_options[pl_top_ad_url<?php echo $i; ?>]" class="regular-text" type="text" name="dp_options[pl_top_ad_url<?php echo $i; ?>]" value="<?php esc_attr_e( $options['pl_top_ad_url'.$i] ); ?>" />
     <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
    </div>

  </div>
  <?php endfor; ?>

  </div><!-- END #tab-content4 -->




  <!-- #tab-content5 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
  <div id="tab-content5">

  <?php // ヘッダー広告の登録 -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Header banner setup', 'tcd-w'); ?></h3>

    <div class="sub_box">
     <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
     <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
     <textarea id="dp_options[header_ad_code1]" class="large-text" cols="50" rows="10" name="dp_options[header_ad_code1]"><?php echo esc_textarea( $options['header_ad_code1'] ); ?></textarea>
     <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
    </div>

    <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>

    <div class="sub_box cf" style="margin:0 0 10px 0;">
     <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); _e('Recommend size. Width:728px Height:90px', 'tcd-w'); ?></h4>
     <div class="image_box cf">
      <div class="upload_banner_button_area">
       <div class="hide"><input type="text" size="36" name="dp_options[header_ad_image1]" value="<?php esc_attr_e( $options['header_ad_image1'] ); ?>" /></div>
       <input type="file" name="header_ad_image_file1" id="header_ad_image_file1" />
       <input type="submit" class="button-ml" value="<?php echo __( 'Save Image', 'tcd-w' ); ?>" />
      </div>
      <?php if($options['header_ad_image1']) { ?>
       <div class="uploaded_banner_image">
        <img src="<?php esc_attr_e( $options['header_ad_image1'] ); ?>" alt="" title="" />
       </div>
       <?php if(dp_is_uploaded_img($options['header_ad_image1'])): ?>
       <div class="delete_uploaded_banner_image">
        <a href="<?php echo wp_nonce_url(admin_url('themes.php?page=theme_options'), 'dp_delete_header_ad_image1') ?>" class="button" onclick="if(!confirm('<?php _e('Are you sure to delete this image?', 'tcd-w'); ?>')) return false;"><?php _e('Delete Image', 'tcd-w'); ?></a>
       </div>
      <?php endif; ?>
      <?php }; ?>
     </div>
    </div>

    <div class="sub_box">
     <h4  class="theme_option_headline2"><?php _e('Register affiliate code or link url for registered image', 'tcd-w');  ?></h4>
     <input id="dp_options[header_ad_url1]" class="regular-text" type="text" name="dp_options[header_ad_url1]" value="<?php esc_attr_e( $options['header_ad_url1'] ); ?>" />
     <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
    </div>

   </div>

  </div><!-- END #tab-content5 -->


  </div><!-- END #tab-panel -->

  </form>

  </div><!-- END #my_theme_right -->

 </div><!-- END #my_theme_option -->

</div><!-- END #wrap -->

<?php

 }


/**
 * チェック
 */
function theme_options_validate( $input ) {
 global $recommend_post_order_options1, $recommend_post_order_options2, $recommend_post_order_options3, $recommend_post_order_options4, $recommend_post_order_options5, $footer_slider_order_options, $footer_slider_type_options, $header_slider_order_options, $header_slider_type_options;

 // 色の設定
 $input['pickedcolor1'] = wp_filter_nohtml_kses( $input['pickedcolor1'] );

 // フォントサイズ
 $input['content_font_size'] = wp_filter_nohtml_kses( $input['content_font_size'] );

 // 投稿者・タグ・コメント
 if ( ! isset( $input['show_date'] ) )
  $input['show_date'] = null;
  $input['show_date'] = ( $input['show_date'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_category'] ) )
  $input['show_category'] = null;
  $input['show_category'] = ( $input['show_category'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_tag'] ) )
  $input['show_tag'] = null;
  $input['show_tag'] = ( $input['show_tag'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_comment'] ) )
  $input['show_comment'] = null;
  $input['show_comment'] = ( $input['show_comment'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_trackback'] ) )
  $input['show_trackback'] = null;
  $input['show_trackback'] = ( $input['show_trackback'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_related_post'] ) )
  $input['show_related_post'] = null;
  $input['show_related_post'] = ( $input['show_related_post'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_next_post'] ) )
  $input['show_next_post'] = null;
  $input['show_next_post'] = ( $input['show_next_post'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_thumbnail'] ) )
  $input['show_thumbnail'] = null;
  $input['show_thumbnail'] = ( $input['show_thumbnail'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_rss'] ) )
  $input['show_rss'] = null;
  $input['show_rss'] = ( $input['show_rss'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_bookmark'] ) )
  $input['show_bookmark'] = null;
  $input['show_bookmark'] = ( $input['show_bookmark'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_author'] ) )
  $input['show_author'] = null;
  $input['show_author'] = ( $input['show_author'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_recommend'] ) )
  $input['show_recommend'] = null;
  $input['show_recommend'] = ( $input['show_recommend'] == 1 ? 1 : 0 );

 // フッターのスライダー
 $input['label_footer_slider'] = wp_filter_nohtml_kses( $input['label_footer_slider'] );
 $input['footer_slider_num'] = wp_filter_nohtml_kses( $input['footer_slider_num'] );
 if ( ! isset( $input['footer_slider_order'] ) )
  $input['footer_slider_order'] = null;
 if ( ! array_key_exists( $input['footer_slider_order'], $footer_slider_order_options ) )
  $input['footer_slider_order'] = null;
 if ( ! isset( $input['footer_slider_type'] ) )
  $input['footer_slider_type'] = null;
 if ( ! array_key_exists( $input['footer_slider_type'], $footer_slider_type_options ) )
  $input['footer_slider_type'] = null;

 // ヘッダーのスライダー
 if ( ! isset( $input['show_header_slider'] ) )
  $input['show_header_slider'] = null;
  $input['show_header_slider'] = ( $input['show_header_slider'] == 1 ? 1 : 0 );
 if ( ! isset( $input['header_slider_order'] ) )
  $input['header_slider_order'] = null;
 if ( ! array_key_exists( $input['header_slider_order'], $header_slider_order_options ) )
  $input['header_slider_order'] = null;
 if ( ! isset( $input['header_slider_type'] ) )
  $input['header_slider_type'] = null;
 if ( ! array_key_exists( $input['header_slider_type'], $header_slider_type_options ) )
  $input['header_slider_type'] = null;

 // トップページのおすすめ記事一覧
 if ( ! isset( $input['show_index_post_list'] ) )
  $input['show_index_post_list'] = null;
  $input['show_index_post_list'] = ( $input['show_index_post_list'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_recommend_post1'] ) )
  $input['show_recommend_post1'] = null;
  $input['show_recommend_post1'] = ( $input['show_recommend_post1'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_recommend_post2'] ) )
  $input['show_recommend_post2'] = null;
  $input['show_recommend_post2'] = ( $input['show_recommend_post2'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_recommend_post3'] ) )
  $input['show_recommend_post3'] = null;
  $input['show_recommend_post3'] = ( $input['show_recommend_post3'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_recommend_post4'] ) )
  $input['show_recommend_post4'] = null;
  $input['show_recommend_post4'] = ( $input['show_recommend_post4'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_recommend_post5'] ) )
  $input['show_recommend_post5'] = null;
  $input['show_recommend_post5'] = ( $input['show_recommend_post5'] == 1 ? 1 : 0 );
 $input['label_index_post_list'] = wp_filter_nohtml_kses( $input['label_index_post_list'] );
 $input['label_recommend_post1'] = wp_filter_nohtml_kses( $input['label_recommend_post1'] );
 $input['label_recommend_post2'] = wp_filter_nohtml_kses( $input['label_recommend_post2'] );
 $input['label_recommend_post3'] = wp_filter_nohtml_kses( $input['label_recommend_post3'] );
 $input['label_recommend_post4'] = wp_filter_nohtml_kses( $input['label_recommend_post4'] );
 $input['label_recommend_post5'] = wp_filter_nohtml_kses( $input['label_recommend_post5'] );
 $input['recommend_post_num1'] = wp_filter_nohtml_kses( $input['recommend_post_num1'] );
 $input['recommend_post_num2'] = wp_filter_nohtml_kses( $input['recommend_post_num2'] );
 $input['recommend_post_num3'] = wp_filter_nohtml_kses( $input['recommend_post_num3'] );
 $input['recommend_post_num4'] = wp_filter_nohtml_kses( $input['recommend_post_num4'] );
 $input['recommend_post_num5'] = wp_filter_nohtml_kses( $input['recommend_post_num5'] );
 if ( ! isset( $input['recommend_post_order1'] ) )
  $input['recommend_post_order1'] = null;
 if ( ! array_key_exists( $input['recommend_post_order1'], $recommend_post_order_options1 ) )
  $input['recommend_post_order1'] = null;
 if ( ! isset( $input['recommend_post_order2'] ) )
  $input['recommend_post_order2'] = null;
 if ( ! array_key_exists( $input['recommend_post_order2'], $recommend_post_order_options2 ) )
  $input['recommend_post_order2'] = null;
 if ( ! isset( $input['recommend_post_order3'] ) )
  $input['recommend_post_order3'] = null;
 if ( ! array_key_exists( $input['recommend_post_order3'], $recommend_post_order_options3 ) )
  $input['recommend_post_order3'] = null;
 if ( ! isset( $input['recommend_post_order4'] ) )
  $input['recommend_post_order4'] = null;
 if ( ! array_key_exists( $input['recommend_post_order4'], $recommend_post_order_options4 ) )
  $input['recommend_post_order4'] = null;
 if ( ! isset( $input['recommend_post_order5'] ) )
  $input['recommend_post_order5'] = null;
 if ( ! array_key_exists( $input['recommend_post_order5'], $recommend_post_order_options5 ) )
  $input['recommend_post_order5'] = null;

 // twitter,facebook URL
 $input['twitter_url'] = wp_filter_nohtml_kses( $input['twitter_url'] );
 $input['facebook_url'] = wp_filter_nohtml_kses( $input['facebook_url'] );

 // オリジナルスタイルの設定
 $input['css_code'] = $input['css_code'];

 // ヘッダーの広告バナー
 $input['header_ad_code1'] = $input['header_ad_code1'];
 $input['header_ad_image1'] = wp_filter_nohtml_kses( $input['header_ad_image1'] );
 $input['header_ad_url1'] = wp_filter_nohtml_kses( $input['header_ad_url1'] );

 // 記事一覧の広告バナー（トップページ）
 $input['pl_top_ad_code1'] = $input['pl_top_ad_code1'];
 $input['pl_top_ad_image1'] = wp_filter_nohtml_kses( $input['pl_top_ad_image1'] );
 $input['pl_top_ad_url1'] = wp_filter_nohtml_kses( $input['pl_top_ad_url1'] );
 $input['pl_top_ad_code2'] = $input['pl_top_ad_code2'];
 $input['pl_top_ad_image2'] = wp_filter_nohtml_kses( $input['pl_top_ad_image2'] );
 $input['pl_top_ad_url2'] = wp_filter_nohtml_kses( $input['pl_top_ad_url2'] );

 //ロゴの位置
 if(isset($input['logotop'])){
	 $input['logotop'] = intval($input['logotop']);
 }
 if(isset($input['logoleft'])){
	 $input['logoleft'] = intval($input['logoleft']);
 }

 //ファイルアップロード
 if(isset($_FILES['dp_image'])){
	$message = _dp_upload_logo();
	add_settings_error('design_plus_options', 'default', $message['message'], ($message['error'] ? 'error' : 'updated'));
 }

 //画像リサイズ
 if(isset($_REQUEST['dp_logo_resize_left'], $_REQUEST['dp_logo_resize_top']) && is_numeric($_REQUEST['dp_logo_resize_left']) && is_numeric($_REQUEST['dp_logo_resize_top'])){
	$message = _dp_resize_logo();
	add_settings_error('design_plus_options', 'default', $message['message'], ($message['error'] ? 'error' : 'updated'));
 }

 // ヘッダー画像の登録
	 if(isset($_FILES['header_ad_image_file1'])){
		 //画像のアップロードに問題はないか
		 if($_FILES['header_ad_image_file1']['error'] === 0){
			 $name = sanitize_file_name($_FILES['header_ad_image_file1']['name']);
			 //ファイル形式をチェック
			 if(!preg_match("/\.(png|jpe?g|gif)$/i", $name)){
				 add_settings_error('design_plus_options', 'dp_uploader', sprintf(__('You uploaded %s but allowed file format is PNG, GIF and JPG.', 'tcd-w'), $name), 'error');
			 }else{
				//ディレクトリの存在をチェック
				if(
					(
						(file_exists(dp_logo_basedir()) && is_dir(dp_logo_basedir()) && is_writable(dp_logo_basedir()) )
							||
						@mkdir(dp_logo_basedir())
					)
						&&
					move_uploaded_file($_FILES['header_ad_image_file1']['tmp_name'], dp_logo_basedir().DIRECTORY_SEPARATOR.$name)
				){
					$input['header_ad_image1'] = dp_logo_baseurl().'/'.$name;
				}else{
					add_settings_error('default', 'dp_uploader', sprintf(__('Directory %s is not writable. Please check permission.', 'tcd-w'), dp_logo_basedir()), 'error');
				}
			 }
		 }elseif($_FILES['header_ad_image_file1']['error'] !== UPLOAD_ERR_NO_FILE){
			 add_settings_error('default', 'dp_uploader', _dp_get_upload_err_msg($_FILES['header_ad_image_file1']['error']), 'error');
		 }
	 }


 // 記事一覧（上部）画像の登録
 for($i = 1; $i <= 2; $i++){
	 if(isset($_FILES['pl_top_ad_image_file'.$i])){
		 //画像のアップロードに問題はないか
		 if($_FILES['pl_top_ad_image_file'.$i]['error'] === 0){
			 $name = sanitize_file_name($_FILES['pl_top_ad_image_file'.$i]['name']);
			 //ファイル形式をチェック
			 if(!preg_match("/\.(png|jpe?g|gif)$/i", $name)){
				 add_settings_error('design_plus_options', 'dp_uploader', sprintf(__('You uploaded %s but allowed file format is PNG, GIF and JPG.', 'tcd-w'), $name), 'error');
			 }else{
				//ディレクトリの存在をチェック
				if(
					(
						(file_exists(dp_logo_basedir()) && is_dir(dp_logo_basedir()) && is_writable(dp_logo_basedir()) )
							||
						@mkdir(dp_logo_basedir())
					)
						&&
					move_uploaded_file($_FILES['pl_top_ad_image_file'.$i]['tmp_name'], dp_logo_basedir().DIRECTORY_SEPARATOR.$name)
				){
					$input['pl_top_ad_image'.$i] = dp_logo_baseurl().'/'.$name;
				}else{
					add_settings_error('default', 'dp_uploader', sprintf(__('Directory %s is not writable. Please check permission.', 'tcd-w'), dp_logo_basedir()), 'error');
					break;
				}
			 }
		 }elseif($_FILES['pl_top_ad_image_file'.$i]['error'] !== UPLOAD_ERR_NO_FILE){
			 add_settings_error('default', 'dp_uploader', _dp_get_upload_err_msg($_FILES['pl_top_ad_image_file'.$i]['error']), 'error');
			 continue;
		 }
	 }
 }


 return $input;
}

?>
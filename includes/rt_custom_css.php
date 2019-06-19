<?php
function rado_typography_custom_css() {
  global $elements;
  global $devices_width;

  $rt_custom_css = '';

  foreach ($devices_width as $device) {
    $screen_sizes_array = explode("_", $device);
    foreach ($elements as $element) {
       if(get_option( $element . '_enable_element' ) == 1 && (empty($device) || get_option( $element . '_enable_device' . $device ) == 1) ) :
        if(!empty($device)) :
          $rt_custom_css .= '@media (max-width: ' . $screen_sizes_array[1] . ') and (min-width:' . $screen_sizes_array[3] . ')  {';
        endif;
          $rt_custom_css .= $element . ' {';
          $rt_custom_css .= 'font-size: ' . get_option( $element . '_font_size' . $device ) . 'px !important;';
          $rt_custom_css .= 'color: ' . get_option( $element . '_color' . $device ) . ' !important;';
          $rt_custom_css .= 'font-weight: ' . get_option( $element . '_font_weight' . $device ) . ' !important;';
          $rt_custom_css .= 'line-height: ' . get_option( $element . '_line_height' . $device ) . ' !important;';
          $rt_custom_css .= 'padding-top: ' . get_option( $element . '_padding_top' . $device ) . 'px !important;';
          $rt_custom_css .= 'padding-bottom: ' . get_option( $element . '_padding_bottom' . $device ) . 'px !important;';
          $rt_custom_css .= 'margin-top: ' . get_option( $element . '_margin_top' . $device ) . 'px !important;';
          $rt_custom_css .= 'margin-bottom: ' . get_option( $element . '_margin_bottom' . $device ) . 'px !important;';
          $rt_custom_css .= '}';
        if(!empty($device)) :
          $rt_custom_css .= '}';
        endif;
       endif;
    }
  }

?>
<style type="text/css"><?php echo $rt_custom_css; ?></style>
    <?php
}
add_action('wp_head', 'rado_typography_custom_css');

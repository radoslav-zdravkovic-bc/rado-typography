<?php
function register_rado_typography_settings() { // whitelist options
  global $elements;
  global $devices_width;
	foreach ($elements as $element) {
    foreach ($devices_width as $device) {
  		register_setting( 'rado-typography-options-group', $element . '_font_size' . $device );
      register_setting( 'rado-typography-options-group', $element . '_color' . $device );
  		register_setting( 'rado-typography-options-group', $element . '_font_weight' . $device );
  		register_setting( 'rado-typography-options-group', $element . '_line_height' . $device );

      register_setting( 'rado-typography-options-group', $element . '_padding_top' . $device );
      register_setting( 'rado-typography-options-group', $element . '_padding_bottom' . $device );
      register_setting( 'rado-typography-options-group', $element . '_margin_top' . $device );
      register_setting( 'rado-typography-options-group', $element . '_margin_bottom' . $device );

      if($device !== '') {
          register_setting( 'rado-typography-options-group', $element . '_enable_device' . $device );
      }
    }

    register_setting( 'rado-typography-options-group', $element . '_enable_element' );
  }
}

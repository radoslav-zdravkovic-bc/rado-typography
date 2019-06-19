<?php
function rado_typography_options() {
  global $elements;
  global $devices_width;
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	} ?>

	<div class="wrap">
    <div class="jumbotron">
      <h1>Rado Typography</h1>
      <p>On this page, you will style your headings and paragraphs.</p>
    </div>

    <form method="post" action="options.php">
			<?php settings_fields( 'rado-typography-options-group' ); ?>
			<?php do_settings_sections( 'rado-typography-options-group' ); ?>
    <div id="accordion">
      <?php foreach ($elements as $element) { ?>
      <div class="card">
        <div class="card-header" id="heading_<?php echo $element; ?>" data-toggle="collapse" data-target="#collapse_<?php echo $element; ?>" aria-expanded="false" aria-controls="collapse_<?php echo $element; ?>">
          <h5 class="mb-0 element-header">
              <?php echo $element; ?> styles
          </h5>
        </div>
        <input class="enable-element-checkbox" name="<?php echo $element . '_enable_element'; ?>" type="checkbox" value="1" <?php checked( '1', get_option( $element . '_enable_element' ) ); ?> />
        <div id="collapse_<?php echo $element; ?>" class="collapse" aria-labelledby="heading_<?php echo $element; ?>" data-parent="#accordion">
          <div class="card-body">
            <div class="row">
            <?php foreach ($devices_width as $device) { ?>
            <div class="col-lg-3 col-md-6 col-xs-12">
              <p class="device-styles-heading"><strong>
                <?php if(!empty($device)) { ?>
                    <input class="enable-device-checkbox" name="<?php echo $element . '_enable_device' . $device; ?>" type="checkbox" value="1"
                    <?php checked( '1', get_option( $element . '_enable_device' . $device ) ); ?> /><?php echo  str_replace('_',' ', $device); ?>
                <?php  } else {
                    echo 'Desktop styles';
                  }
               ?>
             </strong></p>
              <table class="form-table">
        					<tr valign="top">
        					<th scope="row">Font size:</th>
        					<td><input type="number" min="12" max="78" name="<?php echo $element . '_font_size' . $device; ?>" value="<?php echo esc_attr( get_option( $element . '_font_size' . $device ) ); ?>" /> px</td>
        					</tr>
        					<tr valign="top">
        					<th scope="row">Font color:</th>
        					<td><input type="text" name="<?php echo $element . '_color' . $device; ?>" value="<?php echo esc_attr( get_option( $element . '_color' . $device ) ); ?>" class="element-color-picker" /></td>
        					</tr>
                  <tr valign="top">
        					<th scope="row">Font weight:</th>
        					<td>
                    <select name="<?php echo $element . '_font_weight' . $device; ?>">
                      <?php $font_weights = array('100', '200', '300', '400', '500', '600', '700', '800', '900');
                        foreach ($font_weights as $font_weight) { ?>
                          <option value="<?php echo $font_weight; ?>" <?php selected( get_option( $element . '_font_weight' . $device ), $font_weight ); ?>><?php echo $font_weight; ?></option>
                      <?php } ?>
                    </select>
                  </td>
        					</tr>
                  <tr valign="top">
        					<th scope="row">Line height:</th>
        					<td><input type="number" min="0" max="5" step="0.1" name="<?php echo $element . '_line_height' . $device; ?>" value="<?php echo esc_attr( get_option( $element . '_line_height' . $device ) ); ?>" /></td>
        					</tr>
        			</table>
              <hr class="dashed-line">
              <table class="form-table">
                <tr valign="top">
                <th scope="row">Padding top:</th>
                <td><input type="number" name="<?php echo $element . '_padding_top' . $device; ?>" value="<?php echo esc_attr( get_option( $element . '_padding_top' . $device ) ); ?>" /> px</td>
                </tr>
                <tr valign="top">
                <th scope="row">Padding bottom:</th>
                <td><input type="number" name="<?php echo $element . '_padding_bottom' . $device; ?>" value="<?php echo esc_attr( get_option( $element . '_padding_bottom' . $device ) ); ?>" /> px</td>
                </tr>
                <tr valign="top">
                <th scope="row">Margin top:</th>
                <td><input type="number" name="<?php echo $element . '_margin_top' . $device; ?>" value="<?php echo esc_attr( get_option( $element . '_margin_top' . $device ) ); ?>" /> px</td>
                </tr>
                <tr valign="top">
                <th scope="row">Margin bottom:</th>
                <td><input type="number" name="<?php echo $element . '_margin_bottom' . $device; ?>" value="<?php echo esc_attr( get_option( $element . '_margin_bottom' . $device ) ); ?>" /> px</td>
                </tr>
              </table>
            </div>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      <?php submit_button(); ?>
      </div>
      </form>
	</div>

<?php }

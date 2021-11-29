<?php
/*
Plugin Name: VC dropdown multiple
Description: Multiple select field type for WPBakery Page Builder.
Version:     1.0.0
Author:      Le Web simple <pascal@lewebsimple.ca>
Author URI:  https://lewebsimple.ca
Text Domain: vc-dropdown-multi
Domain Path: /languages
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( function_exists( 'vc_add_shortcode_param' ) ) {
	vc_add_shortcode_param( 'dropdown_multi', 'vc_dropdown_multi_settings_field' );
}
function vc_dropdown_multi_settings_field( $settings, $value ) {
	$value = is_array( $value ) ? $value : explode( ',', $value );
	ob_start();
	?>
	<select multiple name="<?= esc_attr( $settings['param_name'] ) ?>"
	        class="wpb_vc_param_value wpb-input wpb-select <?= esc_attr( $settings['param_name'] ) ?> <?= esc_attr( $settings['type'] ) ?>"
	        style="height: 300px;">
		<?php foreach ( $settings['value'] as $label => $val ):
			if ( is_numeric( $label ) && ( is_string( $val ) || is_numeric( $val ) ) ) {
				$label = $val;
			}
			$selected = in_array( $val, $value ) ? 'selected="selected"' : '';
			?>
			<option value="<?= $val ?>" <?= $selected ?>><?= $label ?></option>
		<?php endforeach; ?>
	</select>
	<?php

	return ob_get_clean();
}

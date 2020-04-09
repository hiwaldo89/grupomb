<?php

if ( class_exists( 'GFCommon' ) ) {

	// Move Gravity Forms Scripts after jQuery is loaded
	add_filter("gform_init_scripts_footer", "init_scripts");
	function init_scripts() {
		return true;
	}

	// Allow labels to be hidden
	add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

	// Avoid form from dissappearing with ajax
	add_filter( 'gform_confirmation', 'grupomb_custom_confirmation', 10, 4 );
	function grupomb_custom_confirmation( $confirmation, $form, $entry, $ajax ) {
		//add_filter("gform_init_scripts_footer", "init_scripts");
		add_filter( 'wp_footer', 'ag_overlay');
    	$thisform = $form['id'];
		return '[gravityform id=' . $thisform . ' title=false description=false]' . $confirmation;
	}

	// Change default error message
	add_filter( 'gform_validation_message', 'grupomb_error_message', 10, 2 );
	function grupomb_error_message($message, $form) {
		return "<div class='validation_error'>" . esc_html__( 'Ocurrió un error, inténtalo de nuevo.', 'grupomb' ) . "</div>";
	}

}
<?php

// Defines
define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );

// Classes
require_once 'classes/class-fl-child-theme.php';

// Actions
add_action( 'wp_enqueue_scripts', 'FLChildTheme::enqueue_scripts', 1000 );

/*---------------------------------------------*/
/* ADD CUSTOM IMAGE SIZES
/*---------------------------------------------*/

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'project-image', 872, 560, true );
	add_image_size( 'diensten-banner', 1920, 410, true );
}

add_filter( 'image_size_names_choose', 'insert_custom_image_sizes' );
function insert_custom_image_sizes( $sizes ) {
	global $_wp_additional_image_sizes;
	if ( empty($_wp_additional_image_sizes) )
		return $sizes;

	foreach ( $_wp_additional_image_sizes as $id => $data ) {
		if ( !isset($sizes[$id]) )
			$sizes[$id] = ucfirst( str_replace( '-', ' ', $id ) );
	}

	return $sizes;
}

/*---------------------------------------------*/
/* GRAVITY FORMS HIDE FIELD LABEL FUNCTION
/*---------------------------------------------*/
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );
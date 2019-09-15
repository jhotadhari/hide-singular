<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function hisi_redirect_singular() {
	global $post;

	if ( ! is_singular() )
		return;

	if ( hisi_post_is_hidden( $post->ID ) ) {

		$redirect_url = hisi_get_redirect_url();
		$status_code = apply_filters( 'hisi_redirect_url', 301 );

		wp_redirect( $redirect_url, $status_code );
		exit;
    }
}
add_action( 'template_redirect', 'hisi_redirect_singular' );


?>
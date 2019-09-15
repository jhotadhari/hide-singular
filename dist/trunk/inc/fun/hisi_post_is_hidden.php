<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function hisi_post_is_hidden( $post_id ) {
	return '1' === get_post_meta( $post_id, 'hisi_hide_singular', true );
}

?>
<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function hisi_include_fun() {

	$paths = array(
		'/inc/fun/hisi_expa_remove_link.php',
		'/inc/fun/hisi_get_redirect_url.php',
		'/inc/fun/hisi_post_is_hidden.php',
		'/inc/fun/hisi_redirect_singular.php',
		'/inc/fun/hisi_register_meta.php',
		'/inc/fun/hisi_wpseo_breadcrumb_remove_link.php',
	);

	if ( count( $paths ) > 0 ) {
		foreach( $paths as $path ) {
			include_once( hisi\Hisi::get_instance()->dir_path . $path );
		}
	}

}

?>
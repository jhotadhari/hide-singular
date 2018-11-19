<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function hisi_get_redirect_url() {
	$redirect_url = home_url();

	// use breadcrumbs
	if ( class_exists( 'WPSEO_Options' ) && ! is_front_page() && WPSEO_Options::get( 'breadcrumbs-enable', false ) ) {
		$breadcrumbs = WPSEO_Breadcrumbs::get_instance()->get_links();
		$breadcrumb_urls = array();
		for ( $i = 0; $i < ( count( $breadcrumbs ) - 1 ); $i++ ) {
			if ( array_key_exists( 'url', $breadcrumbs[$i] ) )
				$breadcrumb_urls[] = $breadcrumbs[$i]['url'];
		}
		if ( count( $breadcrumb_urls ) > 0 )
			return array_values( array_slice( $breadcrumb_urls, -1))[0];
	}

	return $redirect_url;
}

?>
<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

use croox\wde\utils\Arr;

function hisi_wpseo_breadcrumb_remove_link( $link_info, $index, $crumbs ) {
	$crumb = $crumbs[ $index ];

	$link_info['url'] =  array_key_exists( 'id', $crumb ) && hisi_post_is_hidden( $crumb['id'] )
		? ''
		: Arr::get( $link_info, 'url', '' );

	return $link_info;
}
add_filter( 'wpseo_breadcrumb_single_link_info', 'hisi_wpseo_breadcrumb_remove_link', 10, 3 );
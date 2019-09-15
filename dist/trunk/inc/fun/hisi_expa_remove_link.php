<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Add plugin support for `Extra Post Attributes`
 *
 * @link https://github.com/jhotadhari/extra-post-attributes
 */
function hisi_expa_remove_link( $item_link, $item ) {
	return hisi_post_is_hidden( $item->ID ) ? false : $item_link;
}
add_filter( 'expa_item_link', 'hisi_expa_remove_link', 10, 2 );


?>
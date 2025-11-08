<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Hide hidden posts from search results.
 *
 * https://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts
 *
 * Note: $query is passed by reference
 */
function hisi_search_exclude( $query ) {
    if ( ! is_admin() && is_search() ) {
        $query->set( 'post__not_in', array_unique( array_merge(
            $query->get( 'post__not_in' ),
            hisi\Remember_Hidden::get_hidden_post_ids( true )   // skip db query. use transient instead. transient gets updated on update plugin version and on post edit/delete. .
        ) ) );
    }
}
add_action( 'pre_get_posts', 'hisi_search_exclude', 10, 1 );


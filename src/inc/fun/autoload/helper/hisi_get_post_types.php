<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Returns an array of post types
 *
 * Includes all custom post types and 'post', 'page'.
 * $args->publicly_queryable defaults to true, because only those have singular views.
 * $args->_builtin defaults to false. Because the funtion doesn't query 'post' or 'page' with get_post_types.
 *
 * @since 0.0.1
 *
 * @param string		$return_type		'array_keys'|'array_key_label' default: 'array_keys'.
 * @param array			$exclude			Post Type keys to exclude
 * @param array			$args				$args parameter. See https://codex.wordpress.org/Function_Reference/get_post_types#Parameters
 * @return depending on $return_type, an array of post type keys or an associative array with key => label
 */
function hisi_get_post_types( $return_type = 'array_keys', $exclude = array(), $args = array() ){

	$exclude = wp_parse_args( $exclude, array() );

	$args = wp_parse_args( $args, array(
		'_builtin' => false,
		'publicly_queryable' => true,
	) );

	switch( $return_type) {
		case 'array_keys':
			$post_types = array( 'post', 'page' );

			foreach ( get_post_types( $args, 'names' ) as $post_type ) {
			   array_push( $post_types, $post_type );
			}

			return array_filter( $post_types, function( $val ) use ( $exclude ){
				return ( in_array( $val, $exclude ) ? false : true );
			} );
			break;
		case 'array_key_label':
			$post_types = array(
				'post' => __('Post','hisi'),
				'page' => __('Page','hisi')
			);

			foreach ( get_post_types( $args, 'objects' ) as $post_type ) {
			   $post_types[$post_type->name] =  __( $post_type->labels->name, 'hisi' );
			}

			return array_filter( $post_types, function( $key ) use ( $exclude ){
				return ( in_array( $key, $exclude ) ? false : true );
			}, ARRAY_FILTER_USE_KEY );
			break;
	};

}


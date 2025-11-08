<?php

namespace hisi;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use croox\wde\utils\Arr;

class Remember_Hidden {

    public static $transient_handle = 'hisi_hidden_post_ids';

    public static function init() {


        // add_action( 'wp', array( __CLASS__, 'update_transient' ), 100, 0 );


        // Setup hooks when post gets updated or deleted. Update the transients.
        add_action( 'edit_post', array( __CLASS__, 'update_transient' ), 100, 0 );
        add_action( 'trashed_post', array( __CLASS__, 'update_transient' ), 100, 0 );
    }

    public static function get_hidden_post_ids( $skip_update = false ) {
		$hidden_post_ids = get_transient( static::$transient_handle );
		if ( ! $skip_update && false === $hidden_post_ids ) {
            $hidden_post_ids = static::get_hidden_post_ids__skip_transient();
            if ( set_transient(
                static::$transient_handle,
                $hidden_post_ids,
                0   // no expiration
            ) ) {
                error_log( sprintf( 'Hisi set transient for hidden posts', static::$transient_handle ) );
            }
        }
		return is_array( $hidden_post_ids ) ? $hidden_post_ids : array();
    }

    protected static function get_hidden_post_ids__skip_transient() {
        return get_posts( array(
            'numberposts' => -1,
            'fields'	=> 'ids',
            'post_type'	=> get_post_types(),
            'meta_query' => array(
                array(
                    'key'       => 'hisi_hide_singular',
                    'value'     => '1',
                )
            ),
        ) );
    }

    public static function update_transient() {
        delete_transient( static::$transient_handle );
        static::get_hidden_post_ids();
    }

}
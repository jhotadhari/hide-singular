<?php

namespace hisi;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

use croox\wde;


function list_table_column_render_cb( $column, $post_id ) {
	switch ( $column ) {
		case 'hisi_hide_singular':
			if ( '1' === get_post_meta( $post_id, 'hisi_hide_singular', true ) ) {
				echo '<span class="dashicons dashicons-hidden"></span>';
			} else {
				echo '<span class="dashicons dashicons-visibility"></span>';
			}
			break;
	}
}

class Hisi extends wde\Plugin {

	public function hooks(){
        parent::hooks();

        // // Fix WPML global active language variable for REST Requests.
        // if ( class_exists( 'SitePress' ) ) {
        // 	add_action( 'after_setup_theme', array( 'croox\wde\utils\Wpml', 'rest_setup_switch_lang' ) );
        // }

		// add_action( 'init', array( $this, 'do_something_on_init' ), 10 );
		add_action( 'admin_init', array( $this, 'list_table_column' ), 10 );

		Editor_Plugin::get_instance();


	}

	public function list_table_column(){

		$post_types = Editor_Plugin::get_instance()->get_post_types();

		new wde\List_Table_Meta_Column(
			$post_types,
			array(
				'key' => 'hisi_hide_singular',
				'metakey' => 'hisi_hide_singular',
				'title' => __( 'Singular view', 'hisi' ),
				'render_cb'	=> 'hisi\list_table_column_render_cb',
				// 'sortable' => true,
			)
		);

		self::get_instance()->register_style( array(
			'handle'			=> 'hisi_list_table',
			'enqueue'			=> true,
		) );
	}

	// public function custom_columns_data( $column, $post_id ) {
	// 	switch ( $column ) {
	// 	case 'hisi_hide_singular':
	// 		if ( '1' === get_post_meta( $post_id, 'hisi_hide_singular', true ) ) {
	// 			echo '<span class="dashicons dashicons-hidden"></span>';
	// 		} else {
	// 			echo '<span class="dashicons dashicons-visibility"></span>';
	// 		}
	// 		break;
	// 	}
	// }

	// public function do_something_on_init(){
	// 	// ...
	// }

	// public function enqueue_scripts_admin(){
    //     parent::enqueue_scripts_admin();

    //     $handle = $this->prefix . '_script_admin';

    //     $this->register_script( array(
	// 		'handle'	=> $handle,
	// 		'deps'		=> array(
	// 			'jquery',
	// 			// 'wp-hooks',
	// 			// 'wp-api',
	// 			// 'wp-data',
	// 			// 'wp-i18n',
	// 		),
	// 		'in_footer'	=> true,	// default false
	// 		'enqueue'	=> true,
	// 	) );

	// }

}
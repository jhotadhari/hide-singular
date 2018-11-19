<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Hisi_List_Table_Column {

	protected static $instance = null;

	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
			self::$instance->hooks();
		}
		return self::$instance;
	}

	public function hooks() {
		add_filter( 'manage_posts_columns' , array( $this, 'custom_columns' ) );
		add_action( 'manage_posts_custom_column' , array( $this, 'custom_columns_data' ), 10, 2 );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_assets' ) );
	}

	public function custom_columns( $columns ) {
		// we don't need to check the screen, because we did it prior initializing

		$insert_after = 'title';

		if ( ! array_key_exists( $insert_after, $columns ) )
			throw new Exception( 'Key to insert after not found' );

		$newColumns = array();
		foreach ( $columns as $key => $value ) {
			$newColumns[$key] = $value;
			if ( $key === $insert_after ) {
				$newColumns['hisi_hide_singular'] = __( 'Singular view', 'hisi' );
			}
		}

		return $newColumns;
	}

	public function custom_columns_data( $column, $post_id ) {
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
	public function enqueue_assets() {
		// we don't need to check the screen, because we did it prior initializing

		$handle = 'hisi_list_table';
		wp_register_style(
			$handle,
			Hisi_Hide_Singular::plugin_dir_url() . '/css/' . $handle . '.min.css'
		);
		wp_enqueue_style( $handle );

	}
}

// initialize
function hisi_list_table_column( $screen ) {

	$post_types = Hisi_Editor_Plugin::get_instance()->get_post_types();

	if ( ( ! in_array( $screen->post_type, $post_types ) ) || 'edit' !== $screen->base )
		return;

	return Hisi_List_Table_Column::get_instance();
}
add_action( 'current_screen', 'hisi_list_table_column' );

?>
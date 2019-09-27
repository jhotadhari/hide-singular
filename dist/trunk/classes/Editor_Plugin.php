<?php

namespace hisi;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


use croox\wde;

class Editor_Plugin {

	protected static $instance = null;

	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
			self::$instance->hooks();
		}

		return self::$instance;
	}

	protected function __construct() {
		// ... silence
	}

	public function get_post_types(){
		$post_types = apply_filters( 'hisi_post_types_set', array() );
		$post_types = empty( $post_types )
			? wde\utils\Post_Type::get_all()
			: $post_types;

		return apply_filters( 'hisi_post_types', $post_types );
	}

	/**
	 * Initiate our hooks
	 * @since 0.0.1
	 */
	protected function hooks() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_editor_assets' ), 10, 0 );
	}

	protected function get_localize_data(){
		global $post;
		if ( ! $post instanceof WP_Post )
			return array();

		return array(
			'post_types' => $this->get_post_types(),
		);
	}

	/**
	 * Register script/style
	 * @since 0.0.1
	 */
	public function enqueue_editor_assets(){
		$screen = get_current_screen();

		if ( ! ( ( in_array( $screen->post_type, $this->get_post_types() ) ) && ( 'post' === $screen->base ) ) )
			return;

		$handle = 'hisi_editor_plugin_editor';

		Hisi::get_instance()->register_script( array(
			'handle'		=> $handle,
			'deps'			=> array(
				'wp-i18n',
				'wp-edit-post',
			),
			'in_footer'		=> true,
			// 'localize_data'	=> $this->get_localize_data(),
			'localize_data'	=> array(
				'post_types' => $this->get_post_types(),
			),
			'enqueue'		=> true,
		) );

		Hisi::get_instance()->register_style( array(
			'handle'		=> $handle,
			'enqueue'		=> true,
		) );
	}

}
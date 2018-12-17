<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Hisi_Editor_Plugin {

	protected static $instance = null;

	protected $post_types;

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
		if ( empty( $this->post_types ) )
			$this->post_types = hisi_get_post_types();
		return $this->post_types;
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
		if ( ! $post instanceof WP_Post ) return array();
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

		wp_register_script(
			$handle,
			Hisi_Hide_Singular::plugin_dir_url() . '/js/' . $handle . '.min.js',
			array(
				'wp-i18n',
				'wp-edit-post',
			),
			false,
			true
		);

		wp_localize_script( $handle, 'hisiData', $this->get_localize_data() );
		wp_set_script_translations( $handle, 'hisi', Hisi_Hide_Singular::plugin_dir_path() . 'languages' );
		wp_enqueue_script( $handle );

		wp_register_style(
			$handle,
			Hisi_Hide_Singular::plugin_dir_url() . '/css/' . $handle . '.min.css'
		);
		wp_enqueue_style( $handle );
	}

}

function hisi_editor_plugin() {
	return Hisi_Editor_Plugin::get_instance();
}
hisi_editor_plugin();

?>
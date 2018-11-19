<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Hisi_Meta {

	/**
	 * Holds an instance of the object
	 *
	 * @var Hisi_Meta
	 * @since 0.0.1
	 */
	protected static $instance = null;

	protected $fields;

	/**
	 * Returns the running object
	 *
	 * @return Hisi_Meta
	 * @since 0.0.1
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
			self::$instance->hooks();
		}
		return self::$instance;
	}

	/**
	 * Constructor
	 * @since 0.0.1
	 */
	protected function __construct() {
	}

	/**
	 * Initiate our hooks
	 * @since 0.0.1
	 */
	public function hooks() {
		add_action( 'init', array( $this, 'set_fields' ) );
		add_action( 'rest_api_init', array( $this, 'api_register_meta' ) );
	}

	public function set_fields() {

		$fields = array();

		array_push( $fields, array(
			'title' => array(
				'key' => 'hisi_hide_singular',
				'val' => 'Type',
			),
			'schema' => array(
				'type' => 'bool',		// will be registered as string
			),
		) );

		$this->fields = $fields;
	}

	public function get_fields() {
		return is_array( $this->fields ) ? $this->fields : array();
	}

	public function api_register_meta(){

		$fields = $this->fields;

		$post_types = Hisi_Editor_Plugin::get_instance()->get_post_types();

		if ( ! empty( $fields ) ) {
			foreach( $fields as $field ){
				if ( array_key_exists( 'title', $field ) && ! empty( $field['title'] ) ){
					if ( array_key_exists( 'key', $field['title'] ) && ! empty( $field['title']['key'] ) ){

						$schema = array();
						$schema['description'] = $field['title']['val'];
						$schema['context'] =  array( 'view', 'edit' );
						$schema['type'] = 'bool' === $field['schema']['type'] ? 'string' : $field['schema']['type'];

						foreach( $post_types as $post_type ) {
							register_rest_field(
								$post_type,
								$field['title']['key'],
								array(
									'get_callback'      => array( $this, 'api_field_get_cb' ),
									'update_callback'   => array( $this, 'api_field_update_cb' ),
									'schema'            => $schema
								)
							);
						}
					}
				}
			}
		}
	}

	public function api_field_get_cb( $object, $field_name, $request ) {
		$meta = get_post_meta( $object['id'], sanitize_key( $field_name ), true );
		switch( $field_name ) {
			case 'hisi_hide_singular':
				return '1' === $meta ? '1' : '0';
				break;
			default:
				return $meta;
		}
	}

	public function api_field_update_cb( $value, $object, $field_name ) {
		switch( $field_name ) {
			case 'hisi_hide_singular':
				if ( '1' === $value ) {
					return update_post_meta( $object->ID, $field_name, true );
				} else {
					return delete_post_meta( $object->ID, $field_name );
				}
				break;
			default:
				return false;
		}
	}

}

function hisi_meta() {
	return Hisi_Meta::get_instance();
}
hisi_meta();

?>
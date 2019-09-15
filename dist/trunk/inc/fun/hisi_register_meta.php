<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function hisi_register_meta() {

	$fields = array(
		array(
			'title' => array(
				'key' => 'hisi_hide_singular',
				'val' => 'Type',
			),
			'schema' => array(
				'type' => 'bool',		// will be registered as string
			),
		),
	);

	return hisi\Register_Meta::get_instance( array(
		'post_types' => hisi\Editor_Plugin::get_instance()->get_post_types(),
		'fields' => $fields,
	) );
}
hisi_register_meta();

?>
<?php
/*
	Plugin Name: Hide Singular
	Plugin URI: https://github.com/jhotadhari/hide-singular
	Description: Hide singular view for a specific post
	Version: 0.1.7
	Author: jhotadhari
	Author URI: https://github.com/jhotadhari
	License: GNU General Public License v2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
	Text Domain: hisi
	Domain Path: /languages
	Tags: gutenberg,hide,singular,single,post
	GitHub Plugin URI: https://github.com/jhotadhari/hide-singular
	Release Asset: true
*/
?><?php
/**
 * Hide Singular Plugin init
 *
 * @package hide-singular
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

include_once( dirname( __FILE__ ) . '/vendor/autoload.php' );

function hisi_init() {

	$init_args = array(
		'version'		=> '0.1.7',
		'slug'			=> 'hide-singular',
		'name'			=> 'Hide Singular',
		'prefix'		=> 'hisi',
		'textdomain'	=> 'hisi',
		'project_kind'	=> 'plugin',
		'FILE_CONST'	=> __FILE__,
		'db_version'	=> 0,
		'wde'			=> array(
			'generator-wp-dev-env'	=> '0.15.0',
			'wp-dev-env-grunt'		=> '0.9.10',
			'wp-dev-env-frame'		=> '0.9.0',
		),
		'deps'			=> array(
			'php_version'	=> '7.0.0',		// required php version
			'wp_version'	=> '5.0.0',			// required wp version
			'plugins'    	=> array(
				/*
				'woocommerce' => array(
					'name'              => 'WooCommerce',               // full name
					'link'              => 'https://woocommerce.com/',  // link
					'ver_at_least'      => '3.0.0',                     // min version of required plugin
					'ver_tested_up_to'  => '3.2.1',                     // tested with required plugin up to
					'class'             => 'WooCommerce',               // test by class
					//'function'        => 'WooCommerce',               // test by function
				),
				*/
			),
			'php_ext'     => array(
				/*
				'xml' => array(
					'name'              => 'Xml',                                           // full name
					'link'              => 'http://php.net/manual/en/xml.installation.php', // link
				),
				*/
			),
		),
	);

	// see ./classes/Hisi.php
	return hisi\Hisi::get_instance( $init_args );
}
hisi_init();

?>
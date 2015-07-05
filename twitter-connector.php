<?php
/**
* Plugin Name: Twitter Connector
* Plugin URI: https://github.com/josefdolezal/twitter-connector
* Description: Simple Wordpress plugin that links hashtags and usernames to the twitter.
* Version: 0.1
* Author: Josef Dolezal
* Author URI: http://badluckjosev.cz
* License: MIT
* Text Domain: twitcon
**/

if ( !function_exists( 'add_action' ) ) {
	echo ':(';
	exit;
}

define( 'TWITCON__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'TWITCON__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( TWITCON__PLUGIN_DIR . 'class.twitcon.php' );

add_action( 'init', array( 'Twitcon', 'init' ) );
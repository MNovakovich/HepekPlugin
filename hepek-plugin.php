<?php 

/**
 *   @package HepekPlugin
 */

 /*
   Plugin Name: HepekPlugin
   Plugin URI: http://novakovicmarko.com/plugins
   Description: This is my first plugin
   Version: 1.0.0
   Author: Marko Novakovic
   Author URI: http://novakovicmarko.com
   License: GPLv2 or later
   Text Domain:hepek-plugin

 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// require once the Composer Autoload
if( file_exists( dirname( __FILE__ ). '/vendor/autoload.php')){
    require_once dirname( __FILE__ ). '/vendor/autoload.php';
}

// Difane CONSTANTS
define('PLUGIN_PATH', plugin_dir_path(__FILE__) );
define('PLUGIN_URL',  plugin_dir_url( __FILE__ ) );
define('PLUGIN',  plugin_basename( __FILE__ ) );  // display name of plugin

use Inc\Base\Activate;
use Inc\Base\Deactivate;

/** 
* The code that runs during plugin activation
*/
function activate_hepek_plugin(){
    Activate::activate();
}

register_activation_hook(__FILE__, 'activate_hepek_plugin');

/***
* The code that run during plugin deactivation
*/
function deactivate_hepek_plugin(){
    Deactivate::deactivate();
}

//  require_once plugin_dir_path(__FILE__).'inc/hepek-plugin-deactivate.php';
register_deactivation_hook(__FILE__, 'deactivate_hepek_plugin');
   
if ( class_exists('Inc\\Init')) {
     Inc\Init::register_services();
}
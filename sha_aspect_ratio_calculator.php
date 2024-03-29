<?php
/**
 * @author Sharun John <sharun@gmail.com>
 * @package ShaanzWPVue
 * @license GPLv3
 * @version 1.3.2
 */


/**
 * Plugin Name: WP Aspect Ratio Calculator
 * Description: An enhanced aspect ratio calulator built on VueJS for Wordpress.
 * Version: 1.3.2
 * Author: Sharun John
 * Author URI: https://shaanz.com
 * License: GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */


 // Abort if called direclty
defined( 'ABSPATH' ) or die( 'You can\t access this file.' );

// Require once the composer autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

// Initializing all the core classes of the plugin
if(class_exists( 'Sha_IARC_Inc\Sha_Iarc_Init' ) )
{
    Sha_IARC_Inc\Sha_Iarc_Init::registerServices();
}

add_action( 'wp_enqueue_scripts', array( 'Sha_IARC_Inc\Sha_Iarc_Enqueue' , 'registerAllScripts' ) );

add_shortcode( 'wparc', array( 'Sha_IARC_Inc\Sha_Iarc_Shortcode', 'sha_Aspect_Ratio_Calculator' ) );


use Sha_IARC_Inc\Updater\Sha_WP_Github_Updater;

// Initializing updater classes
if(class_exists( 'Sha_IARC_Inc\Updater\Sha_WP_Github_Updater' ) )
{
    if ( is_admin() ) {
        new Sha_WP_Github_Updater( __FILE__, 'shaan07', "wp-aspect-ratio-calculator" );
    }
}


?>
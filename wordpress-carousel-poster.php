<?php
/**
 * Plugin Name: WordPress Carousel Poster
 * Plugin URI: http://robertochoa.com.ve
 * Description: Plugin para carousel via OwlCarousel adjuntado a un custom post type
 * Version: 1.2.0
 * Author: Robert Ochoa
 * Author URI: http://robertochoa.com.ve
 * License: GPL2+
 * Text Domain: wordpress-carousel-poster
 * Domain Path: /languages/
 *
 */


// Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
    exit;
}


add_action( 'init', 'wcp_init_plugin' );

function wcp_init_plugin() {
    /* --------------------------------------------------------------
    AGREGAR SOPORTE PARA CPT
    -------------------------------------------------------------- */
    include( plugin_dir_path( __FILE__ ) . 'inc/class-wcp-cpt.php' );

    /* --------------------------------------------------------------
    AGREGAR FUNCIONES PRINCIPALES
    -------------------------------------------------------------- */
    include( plugin_dir_path( __FILE__ ) . 'inc/class-wcp-functions.php' );

    /* --------------------------------------------------------------
    AGREGAR FUNCION DEL SHORTCODE
    -------------------------------------------------------------- */
    include( plugin_dir_path( __FILE__ ) . 'inc/class-wcp-shortcode.php' );

}

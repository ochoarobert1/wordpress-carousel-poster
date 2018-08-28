<?php
/* --------------------------------------------------------------
CUSTOM CSS FOR ADMIN
-------------------------------------------------------------- */
add_action('admin_init', 'wcp_css_admin_handler');

function wcp_css_admin_handler() {
    $version_remove = NULL;
    wp_register_style('wp-admin-style', get_template_directory_uri() . '/css/custom-wordpress-admin-style.css', false, $version_remove, 'all');
    wp_enqueue_style('wp-admin-style');
}




/* --------------------------------------------------------------
CUSTOM AREA FOR OPTIONS DATA - wordpress-carousel-poster
-------------------------------------------------------------- */

add_menu_page( __('Carousel Slider', 'wordpress-carousel-poster'), __('Carousel Slider', 'wordpress-carousel-poster'), 'manage_options', 'wordpress-carousel-poster-admin', 'wcp_admin_dashboard_function', get_template_directory_uri() . '/images/logo-icon.png' , 0 );
add_submenu_page( 'wordpress-carousel-poster-admin', __( 'Slides', 'wordpress-carousel-poster' ), __( 'Slides', 'wordpress-carousel-poster' ), 'manage_options', 'edit.php?post_type=wcp-slide');

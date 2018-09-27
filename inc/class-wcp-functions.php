<?php
/* --------------------------------------------------------------
CUSTOM CSS FOR ADMIN
-------------------------------------------------------------- */
add_action('admin_enqueue_scripts', 'wcp_css_admin_handler');

function wcp_css_admin_handler() {
    $version_remove = NULL;
    wp_register_style('wcp-admin-style', plugins_url('/wordpress-carousel-poster/css/wcp-admin-style.css', '__FILE__'), false, $version_remove, 'all');
    wp_enqueue_style('wcp-admin-style');
}

/* --------------------------------------------------------------
CUSTOM AREA FOR OPTIONS DATA - WCP
-------------------------------------------------------------- */

add_menu_page( __('Carousel Slider', 'wordpress-carousel-poster'), __('Carousel Slider', 'wordpress-carousel-poster'), 'manage_options', 'wordpress-carousel-poster-admin', 'wcp_admin_dashboard_function', 'dashicons-slides' , 0 );
add_submenu_page( 'wordpress-carousel-poster-admin', __( 'Slides', 'wordpress-carousel-poster' ), __( 'Slides', 'wordpress-carousel-poster' ), 'manage_options', 'edit.php?post_type=wcp-slide');
add_submenu_page( 'wordpress-carousel-poster-admin', __( 'Sliders', 'wordpress-carousel-poster' ), __( 'Sliders', 'wordpress-carousel-poster' ), 'manage_options', 'edit-tags.php?taxonomy=wcp-slide-selector');


/* --------------------------------------------------------------
ADMIN DASHBOARD - WCP
-------------------------------------------------------------- */

function wcp_admin_dashboard_function() {
?>
<div class="wcp-admin-header">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
</div>
<div class="wcp-admin-content">
    <h3><?php _e('Instrucciones de Uso:', 'wordpress-carousel-poster'); ?></h3>
    <div class="wcp-admin-content-text">
        <ol>
            <li>Agregar los Slides con su fotografía y link de enlace.</li>
            <li>Crear un Slider al cual asignar varios Slides.</li>
            <li>Usar el siguiente shortcode para ingresar el slider:</li>
        </ol>
        <pre>
       [wcp-slider cantidad=5 slider="nombre_del_slider"]
   </pre>
        <p>En la cual: La cantidad se puede asignar cambiando el número.</p>
        <p>Slider asignará que serie de slides asignados debe mostrarse.</p>


    </div>
</div>
<?php
                                        }


/* --------------------------------------------------------------
OWL CAROUSEL FILES FOR FRONT-END
-------------------------------------------------------------- */

add_action('wp_enqueue_scripts', 'wcp_css_front_handler');

function wcp_css_front_handler() {
    $version_remove = NULL;
    /* CSS */
    wp_register_style('wcp-owl-style', plugins_url('/wordpress-carousel-poster/css/owl.carousel.min.css', '__FILE__'), false, $version_remove, 'all');
    wp_enqueue_style('wcp-owl-style');
    wp_register_style('wcp-owl-theme', plugins_url('/wordpress-carousel-poster/css/owl.theme.default.min.css', '__FILE__'), false, $version_remove, 'all');
    wp_enqueue_style('wcp-owl-theme');
    /* JS */
    wp_register_script('wcp-owl-js', plugins_url('/wordpress-carousel-poster/js/owl.carousel.min.js', '__FILE__'), array('jquery'), '2.3.4', true);
    wp_enqueue_script('wcp-owl-js');
}

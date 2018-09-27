<?php

/* --------------------------------------------------------------
AGREGAR EL SHORTCODE Y LA FUNCION QUE LO GENERA
-------------------------------------------------------------- */
/* AGREGO SHORTCODE */
/* E.G.: [wcp-slider cantidad=5]  */
add_shortcode( 'wcp-slider', 'wcp_slider_shortcode' );

/* GENERAR LA FUNCION DEL SHORTCODE */
function wcp_slider_shortcode($args, $content) {
    $atts = shortcode_atts( array(
        'cantidad' => 'cantidad',
        'slider'   => 'slider'
    ), $atts, 'wcp-slider' );
    $number = (empty($args['cantidad'])) ? 5 : $args['cantidad'];
    $slider = (empty($args['slider'])) ? '' : $args['slider'];

    /* GENERAR EL SCRIPT PARA CREAR EL SLIDER */
    if( wp_script_is( 'jquery', 'done' ) ) {
?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery(".owl-carousel").owlCarousel({
            items: <?php echo $number; ?>,
            loop: true,
            margin: 25,
            center: true,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive : {
                0 : {
                    items: 1
                },
                480 : {
                    items: 2
                },
                768 : {
                    items: 3
                },
                1280 : {
                    items: <?php echo $number; ?>
                }
            },

        });
    });
</script>
<?php
    }
    /* GENERAR LA DATA PARA RELLENAR EL SLIDER */
    $args = array('post_type' => 'wcp-slide', 'posts_per_page' => $number, 'order' => 'DESC', 'orderby' => 'date', 'tax_query' => array( array( 'taxonomy' => 'wcp-slide-selector', 'field' => 'slug', 'terms' => $slider )));
    query_posts($args);
    if (have_posts()) :
    $content .= '<div class="owl-carousel owl-theme">';
    while (have_posts()) : the_post();
    $content .= '<div><a href="'. get_post_meta(get_the_ID(), 'wcp_slide_link', true) .'"><img src="'. get_the_post_thumbnail_url(get_the_ID(), 'full').'"/></a></div>';
    endwhile;
    $content .= '</div>';
    endif;
    wp_reset_query();
    return $content;
}


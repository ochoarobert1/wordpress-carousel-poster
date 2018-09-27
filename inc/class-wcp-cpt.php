<?php

/* --------------------------------------------------------------
AGREGAR CUSTOM POST TYPE PARA SLIDES
-------------------------------------------------------------- */
$labels = array(
    'name'                  => _x( 'Slides', 'Post Type General Name', 'wordpress-carousel-poster' ),
    'singular_name'         => _x( 'Slide', 'Post Type Singular Name', 'wordpress-carousel-poster' ),
    'menu_name'             => __( 'Slides', 'wordpress-carousel-poster' ),
    'name_admin_bar'        => __( 'Slides', 'wordpress-carousel-poster' ),
    'archives'              => __( 'Archivo de Slides', 'wordpress-carousel-poster' ),
    'attributes'            => __( 'Atributo de Slide', 'wordpress-carousel-poster' ),
    'parent_item_colon'     => __( 'Slide Padre:', 'wordpress-carousel-poster' ),
    'all_items'             => __( 'Todos los Slides', 'wordpress-carousel-poster' ),
    'add_new_item'          => __( 'Agregar Nuevo Slide', 'wordpress-carousel-poster' ),
    'add_new'               => __( 'Agregar Nuevo', 'wordpress-carousel-poster' ),
    'new_item'              => __( 'Nuevo Slide', 'wordpress-carousel-poster' ),
    'edit_item'             => __( 'Editar Slide', 'wordpress-carousel-poster' ),
    'update_item'           => __( 'Actualizar Slide', 'wordpress-carousel-poster' ),
    'view_item'             => __( 'Ver Slide', 'wordpress-carousel-poster' ),
    'view_items'            => __( 'Ver Slides', 'wordpress-carousel-poster' ),
    'search_items'          => __( 'Buscar Slide', 'wordpress-carousel-poster' ),
    'not_found'             => __( 'No hay resultados', 'wordpress-carousel-poster' ),
    'not_found_in_trash'    => __( 'No hay resultados en papelera', 'wordpress-carousel-poster' ),
    'featured_image'        => __( 'Imagen del Slide', 'wordpress-carousel-poster' ),
    'set_featured_image'    => __( 'Colocar Imagen del Slide', 'wordpress-carousel-poster' ),
    'remove_featured_image' => __( 'Remover Imagen del Slide', 'wordpress-carousel-poster' ),
    'use_featured_image'    => __( 'Usar como Imagen del Slide', 'wordpress-carousel-poster' ),
    'insert_into_item'      => __( 'Insertar en Slide', 'wordpress-carousel-poster' ),
    'uploaded_to_this_item' => __( 'Cargado a este Slide', 'wordpress-carousel-poster' ),
    'items_list'            => __( 'Listado de Slides', 'wordpress-carousel-poster' ),
    'items_list_navigation' => __( 'Navegación del Listado de Slides', 'wordpress-carousel-poster' ),
    'filter_items_list'     => __( 'Filtro del Listado de Slides', 'wordpress-carousel-poster' ),
);
$args = array(
    'label'                 => __( 'Slide', 'wordpress-carousel-poster' ),
    'description'           => __( 'Slides del Carousel', 'wordpress-carousel-poster' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => false,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-format-gallery',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => false,
    'exclude_from_search'   => true,
    'publicly_queryable'    => true,
    'capability_type'       => 'post',
    'show_in_rest'          => true,
);

register_post_type( 'wcp-slide', $args );

/* --------------------------------------------------------------
AGREGAR TAXONOMY PARA SLIDES
-------------------------------------------------------------- */

$labels = array(
    'name'                       => _x( 'Sliders', 'Taxonomy General Name', 'wordpress-carousel-poster' ),
    'singular_name'              => _x( 'Slider', 'Taxonomy Singular Name', 'wordpress-carousel-poster' ),
    'menu_name'                  => __( 'Sliders', 'wordpress-carousel-poster' ),
    'all_items'                  => __( 'Todos los Sliders', 'wordpress-carousel-poster' ),
    'parent_item'                => __( 'Slider Padre', 'wordpress-carousel-poster' ),
    'parent_item_colon'          => __( 'Slider Padre', 'wordpress-carousel-poster' ),
    'new_item_name'              => __( 'Nuevo Slider', 'wordpress-carousel-poster' ),
    'add_new_item'               => __( 'Agregar Nuevo Slider', 'wordpress-carousel-poster' ),
    'edit_item'                  => __( 'Editar Slider', 'wordpress-carousel-poster' ),
    'update_item'                => __( 'Actualizar Slider', 'wordpress-carousel-poster' ),
    'view_item'                  => __( 'Ver Slider', 'wordpress-carousel-poster' ),
    'separate_items_with_commas' => __( 'Separar Sliders por Comas', 'wordpress-carousel-poster' ),
    'add_or_remove_items'        => __( 'Agregar o Remover Slider', 'wordpress-carousel-poster' ),
    'choose_from_most_used'      => __( 'Usar de los mas usados', 'wordpress-carousel-poster' ),
    'popular_items'              => __( 'Slider Populares', 'wordpress-carousel-poster' ),
    'search_items'               => __( 'Buscar Slider', 'wordpress-carousel-poster' ),
    'not_found'                  => __( 'No hay resultados', 'wordpress-carousel-poster' ),
    'no_terms'                   => __( 'No hay Sliders', 'wordpress-carousel-poster' ),
    'items_list'                 => __( 'Listado de Slider', 'wordpress-carousel-poster' ),
    'items_list_navigation'      => __( 'Navegación del Listado de Sliders', 'wordpress-carousel-poster' ),
);
$args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'show_in_rest'               => true,
);

register_taxonomy( 'wcp-slide-selector', array( 'wcp-slide' ), $args );

/* --------------------------------------------------------------
AGREGAR METABOX PARA EL CAMPO DEL LINK
-------------------------------------------------------------- */

/* AGREGO EL METABOX */
add_action( 'add_meta_boxes', 'wcp_custom_metabox' );
function wcp_custom_metabox()
{
    add_meta_box( 'wcp-metabox', 'Datos Adicionales del Slide', 'wcp_meta_box_cb', 'wcp-slide', 'normal', 'high' );
}

/* AGREGO EL POST META */
function wcp_meta_box_cb( $post )
{
    $values = get_post_custom( $post->ID );
    $text = isset( $values['wcp_slide_link'] ) ? esc_attr( $values['wcp_slide_link'][0] ) : '';

    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'wcp_meta_box_nonce', 'meta_box_nonce' );
?>
<p>
    <label for="wcp_slide_link">Link del Slide:</label>
    <input type="text" name="wcp_slide_link" id="wcp_slide_link" value="<?php echo $text; ?>" class="text" size="100" />
</p>
<?php
}

/* GUARDO EL POST META */
add_action( 'save_post', 'wcp_meta_box_save' );
function wcp_meta_box_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'wcp_meta_box_nonce' ) ) return;

    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;

    // now we can actually save the data
    $allowed = array(
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );

    // Make sure your data is set before trying to save it
    if( isset( $_POST['wcp_slide_link'] ) )
        update_post_meta( $post_id, 'wcp_slide_link', wp_kses( $_POST['wcp_slide_link'], $allowed ) );
}

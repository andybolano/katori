
<?php
function banner_post_type() {

    $labels = array(
            'name'                => _x( 'Banners', 'Post Type General Name', 'katori' ),
            'singular_name'       => _x( 'Banner', 'Post Type Singular Name', 'katori' ),
            'menu_name'           => __( 'Banners', 'katori' ),
            'all_items'           => __( 'Todos los Banners', 'katori' ),
            'view_item'           => __( 'Ver Banner', 'katori' ),
            'add_new_item'        => __( 'Agregar Nuevo Banner', 'katori' ),
            'add_new'             => __( 'Agregar Banner', 'katori' ),
            'edit_item'           => __( 'Editar Banner', 'katori' ),
            'update_item'         => __( 'Actualizar Banner', 'katori' ),
            'search_items'          => __( 'Buscar Banners', 'katori' ),
            'not_found'           => __( 'Not Found', 'katori' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'katori' ),
    );

    $supports = array(
        'title',
        'thumbnail',
    );

    $args = array(
        'labels'               => $labels,
        'supports'             => $supports,
        'public'               => true,
        'capability_type'      => 'post',
        'rewrite'              => array( 'slug' => 'banners' ),
        'has_archive'          => true,
        'menu_position'        => 4,
        'menu_icon'            => 'dashicons-slides',
        'register_meta_box_cb' => 'add_link_metaboxes',
    );

    register_post_type('banners', $args );
}
add_action( 'init', 'banner_post_type' );

function add_link_metaboxes() {
    add_meta_box(
        'field_link',
        'Enlace de Banner',
        'field_link',
        'banners',
        'side',
        'default'
    );
}

function field_link() {
    global $post;
    wp_nonce_field( basename( __FILE__ ), 'link_fields' );
    $link = get_post_meta( $post->ID, 'link', true );
    echo '<input type="text" name="link" value="' . esc_textarea( $link )  . '"  class="widefat">';
}

function save_link_meta( $post_id, $post ) {
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }
    if ( ! isset( $_POST['link'] ) || ! wp_verify_nonce( $_POST['link_fields'], basename(__FILE__) ) ) {
        return $post_id;
    }
    $events_meta['link'] = esc_textarea( $_POST['link'] );
    foreach ( $events_meta as $key => $value ) :
        if ( 'revision' === $post->post_type ) {
            return;
        }
        if ( get_post_meta( $post_id, $key, false ) ) {
            update_post_meta( $post_id, $key, $value );
        } else {
            add_post_meta( $post_id, $key, $value);
        }

        if ( ! $value ) {
            delete_post_meta( $post_id, $key );
        }
    endforeach;
}

add_action( 'save_post', 'save_link_meta', 1, 2 );
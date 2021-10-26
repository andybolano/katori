<?php
function product_post_type() {

    $labels = array(
            'name'                => _x( 'Productos', 'Post Type General Name', 'katori' ),
            'singular_name'       => _x( 'Producto', 'Post Type Singular Name', 'katori' ),
            'menu_name'           => __( 'Productos', 'katori' ),
            'all_items'           => __( 'Todos los Productos', 'katori' ),
            'view_item'           => __( 'Ver Producto', 'katori' ),
            'add_new_item'        => __( 'Agregar Nuevo Producto', 'katori' ),
            'add_new'             => __( 'Agregar Producto', 'katori' ),
            'edit_item'           => __( 'Editar Producto', 'katori' ),
            'update_item'         => __( 'Actualizar Producto', 'katori' ),
            'search_items'          => __( 'Buscar Productos', 'katori' ),
            'not_found'           => __( 'Not Found', 'katori' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'katori' ),
    );

    $supports = array(
        'title',
        'editor',
        'thumbnail',
        'page-attributes'
    );

    $args = array(
        'labels'               => $labels,
        'supports'             => $supports,
        'public'               => true,
        'hierarchical'         => true,
        'show_ui'              => true,
        'publicly_queryable'   => true,
        'exclude_from_search'  => false,
        'menu_position'        => 4,
        'has_archive'          => true,
        'rewrite' => array( 'slug' => 'producto'),
        'menu_icon'            => 'dashicons-cart',
        'show_in_nav_menus' => true
    );

    register_post_type('products', $args );
}
add_action( 'init', 'product_post_type' );
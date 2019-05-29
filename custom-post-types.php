<?php
/*
// ========= Custom Post Types - Safari ============
*/

add_action( 'init', 'custom_post_type_itinerary', 0 );
add_action( 'init', 'custom_post_type_safari', 0 );

// ====== Itinerary
function custom_post_type_itinerary() {
	
    $labels = array(
        'name'                => _x( 'Itineraries', 'Post Type General Name',  'letaka' ),
        'singular_name'       => _x( 'Itinerary',   'Post Type Singular Name', 'letaka' ),
        'menu_name'           => __( 'Itineraries',        'letaka' ),
        'parent_item_colon'   => __( 'Parent Itinerary',   'letaka' ),
        'all_items'           => __( 'All Itineraries',    'letaka' ),
        'view_item'           => __( 'View Itinerary',     'letaka' ),
        'add_new_item'        => __( 'Add New Itinerary',  'letaka' ),
        'add_new'             => __( 'Add Itinerary',      'letaka' ),
        'edit_item'           => __( 'Edit Itinerary',     'letaka' ),
        'update_item'         => __( 'Update Itinerary',   'letaka' ),
        'search_items'        => __( 'Search Itineraries', 'letaka' ),
        'not_found'           => __( 'Not Found',          'letaka' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'letaka' )
    );
    
    $args = array(
        'label'               => __( 'itinerary', 'letaka' ),
        'description'         => __( 'itinerary', 'letaka' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'taxonomies' ),
        'taxonomies'          => array( 'itinerary' ),
        'menu_icon'			  => 'dashicons-location',
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 110,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
    register_post_type( 'itinerary', $args );
}



// ====== Safari
function custom_post_type_safari() {
	
    $labels = array(
        'name'                => _x( 'Safaris', 'Post Type General Name',  'letaka' ),
        'singular_name'       => _x( 'Safari',  'Post Type Singular Name', 'letaka' ),
        'menu_name'           => __( 'Safaris',        'letaka' ),
        'parent_item_colon'   => __( 'Parent Safari',  'letaka' ),
        'all_items'           => __( 'Safaris',        'letaka' ),
        'view_item'           => __( 'View Safari',    'letaka' ),
        'add_new_item'        => __( 'Add New Safari', 'letaka' ),
        'add_new'             => __( 'Add Safari',     'letaka' ),
        'edit_item'           => __( 'Edit Safari',    'letaka' ),
        'update_item'         => __( 'Update Safari',  'letaka' ),
        'search_items'        => __( 'Search Safaris', 'letaka' ),
        'not_found'           => __( 'Not Found',      'letaka' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'letaka' )
    );
    
    $args = array(
        'label'               => __( 'safari', 'letaka' ),
        'description'         => __( 'safari', 'letaka' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'taxonomies' ),
        'taxonomies'          => array( 'safari' ),
        'menu_icon'			  => 'dashicons-palmtree',
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 110,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
    register_post_type( 'safari', $args );
}

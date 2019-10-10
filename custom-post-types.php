<?php
/*
// ========= Custom Post Types - Itinerary, Safari, Agent ============
*/

add_action( 'init', 'custom_post_type_itinerary', 0 );
add_action( 'init', 'custom_post_type_safari', 0 );
add_action( 'init', 'custom_post_type_agent', 0 );
add_action( 'init', 'custom_post_type_special_safaris', 0 );
add_action( 'init', 'custom_post_type_special_uploads', 0 );
add_action( 'init', 'custom_post_type_testimonial', 0 );

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
        'supports'            => array( 'title', 'taxonomies', 'page-attributes' ),
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
        'all_items'           => __( 'All Safaris',    'letaka' ),
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

// ====== Agent
function custom_post_type_agent() {
	
    $labels = array(
        'name'                => _x( 'Agents', 'Post Type General Name',  'letaka' ),
        'singular_name'       => _x( 'Agent',  'Post Type Singular Name', 'letaka' ),
        'menu_name'           => __( 'Agents',        'letaka' ),
        'parent_item_colon'   => __( 'Parent Agent',  'letaka' ),
        'all_items'           => __( 'All Agents',    'letaka' ),
        'view_item'           => __( 'View Agent',    'letaka' ),
        'add_new_item'        => __( 'Add New Agent', 'letaka' ),
        'add_new'             => __( 'Add Agent',     'letaka' ),
        'edit_item'           => __( 'Edit Agent',    'letaka' ),
        'update_item'         => __( 'Update Agent',  'letaka' ),
        'search_items'        => __( 'Search Agents', 'letaka' ),
        'not_found'           => __( 'Not Found',     'letaka' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'letaka' )
    );
    
    $args = array(
        'label'               => __( 'agent', 'letaka' ),
        'description'         => __( 'agent', 'letaka' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'taxonomies' ),
        'taxonomies'          => array( 'safari' ),
        'menu_icon'			  => 'dashicons-businessman',
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
    register_post_type( 'agents', $args );
}

// ====== Special Safaris
function custom_post_type_special_safaris() {
	
    $labels = array(
        'name'                => _x( 'Special Safaris', 'Post Type General Name',  'letaka' ),
        'singular_name'       => _x( 'Special Safari',  'Post Type Singular Name', 'letaka' ),
        'menu_name'           => __( 'Special Safaris',        'letaka' ),
        'parent_item_colon'   => __( 'Parent Safari',          'letaka' ),
        'all_items'           => __( 'All Special Safaris',    'letaka' ),
        'view_item'           => __( 'View Special Safaris',   'letaka' ),
        'add_new_item'        => __( 'Add New Special Safari', 'letaka' ),
        'add_new'             => __( 'Add Special Safari',     'letaka' ),
        'edit_item'           => __( 'Edit Special Safari',    'letaka' ),
        'update_item'         => __( 'Update Special Safari',  'letaka' ),
        'search_items'        => __( 'Search Special Safaris', 'letaka' ),
        'not_found'           => __( 'Not Found',     'letaka' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'letaka' )
    );
    
    $args = array(
        'label'               => __( 'special_safaris', 'letaka' ),
        'description'         => __( 'special_safaris', 'letaka' ),
        'labels'              => $labels,
        'supports'            => array( 'title' ),
        'menu_icon'			  => 'dashicons-businessman',
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => false,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 110,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
    register_post_type( 'special_safaris', $args );
}

// ====== Special Uploads
function custom_post_type_special_uploads() {
	
    $labels = array(
        'name'                => _x( 'Special Uploads', 'Post Type General Name',  'letaka' ),
        'singular_name'       => _x( 'Special Upload',  'Post Type Singular Name', 'letaka' ),
        'menu_name'           => __( 'Special Uploads',        'letaka' ),
        'parent_item_colon'   => __( 'Parent Upload',          'letaka' ),
        'all_items'           => __( 'All Special Uploads',    'letaka' ),
        'view_item'           => __( 'View Special Uploads',   'letaka' ),
        'add_new_item'        => __( 'Add New Special Upload', 'letaka' ),
        'add_new'             => __( 'Add Special Upload',     'letaka' ),
        'edit_item'           => __( 'Edit Special Upload',    'letaka' ),
        'update_item'         => __( 'Update Special Upload',  'letaka' ),
        'search_items'        => __( 'Search Special Uploads', 'letaka' ),
        'not_found'           => __( 'Not Found',     'letaka' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'letaka' )
    );
    
    $args = array(
        'label'               => __( 'special_uploads', 'letaka' ),
        'description'         => __( 'special_uploads', 'letaka' ),
        'labels'              => $labels,
        'supports'            => array( 'title' ),
        'menu_icon'			  => 'dashicons-businessman',
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => false,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 110,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
    register_post_type( 'special_uploads', $args );
}


// ====== Testimonials
function custom_post_type_testimonial() {
	
    $labels = array(
        'name'                => _x( 'Testimonials', 'Post Type General Name',  'letaka' ),
        'singular_name'       => _x( 'Testimonial',   'Post Type Singular Name', 'letaka' ),
        'menu_name'           => __( 'Testimonials',        'letaka' ),
        'parent_item_colon'   => __( 'Parent Testimonial',   'letaka' ),
        'all_items'           => __( 'All Testimonials',    'letaka' ),
        'view_item'           => __( 'View Testimonial',     'letaka' ),
        'add_new_item'        => __( 'Add New Testimonial',  'letaka' ),
        'add_new'             => __( 'Add Testimonial',      'letaka' ),
        'edit_item'           => __( 'Edit Testimonial',     'letaka' ),
        'update_item'         => __( 'Update Testimonial',   'letaka' ),
        'search_items'        => __( 'Search Testimonials', 'letaka' ),
        'not_found'           => __( 'Not Found',          'letaka' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'letaka' )
    );
    
    $args = array(
        'label'               => __( 'testimonial', 'letaka' ),
        'description'         => __( 'testimonial', 'letaka' ),
        'labels'              => $labels,
        'supports'            => array( 'title' ),
        'menu_icon'			  => 'dashicons-admin-comments',
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
    register_post_type( 'testimonial', $args );
}

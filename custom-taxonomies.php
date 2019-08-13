<?php
/*
// ========= Custom Taxonomies - Location, Style, Type, Country ============
*/

add_action( 'init', 'destination_cpt_taxonomy', 0 );
add_action( 'init', 'style_cpt_taxonomy', 0 );
add_action( 'init', 'guide_cpt_taxonomy', 0 );
add_action( 'init', 'type_cpt_taxonomy', 0 );
add_action( 'init', 'country_cpt_taxonomy', 0 );


// ====== Destination
function destination_cpt_taxonomy() {
 
	$labels = array(
		'name' 				=> _x( 'Destination', 'taxonomy general name' ),
		'singular_name' 	=> _x( 'Destination', 'taxonomy singular name' ),
		'search_items' 		=> __( 'Search Destination'   ),
		'all_items'			=> __( 'All Destinations'     ),
		'parent_item' 		=> __( 'Parent Destination'   ),
		'parent_item_colon' => __( 'Parent Destination:'  ),
		'edit_item' 		=> __( 'Edit Destination'     ), 
		'update_item' 		=> __( 'Update Destination'   ),
		'add_new_item' 		=> __( 'Add New Destination'  ),
		'new_item_name' 	=> __( 'New Destination Name' ),
		'menu_name' 		=> __( 'Destinations'         )
	); 	
	
	register_taxonomy( 'destinations', array( 'itinerary' ), array(
		'hierarchical' 		=> true,
		'labels' 			=> $labels,
		'show_ui' 			=> true,
		'show_admin_column' => true,
		'query_var' 		=> true,
		'rewrite' 			=> array( 'slug' => 'destinations', 'hierarchical' => true )
	));
}

// ====== Style
function style_cpt_taxonomy() {
 
	$labels = array(
		'name' 				=> _x( 'Style', 'taxonomy general name' ),
		'singular_name' 	=> _x( 'Style', 'taxonomy singular name' ),
		'search_items' 		=> __( 'Search Styles'   ),
		'all_items'			=> __( 'All Styles'     ),
		'parent_item' 		=> __( 'Parent Style'   ),
		'parent_item_colon' => __( 'Parent Style:'  ),
		'edit_item' 		=> __( 'Edit Style'     ), 
		'update_item' 		=> __( 'Update Style'   ),
		'add_new_item' 		=> __( 'Add New Style'  ),
		'new_item_name' 	=> __( 'New Style Name' ),
		'menu_name' 		=> __( 'Styles'         )
	); 	
	
	register_taxonomy( 'style', array( 'itinerary' ), array(
		'hierarchical' 		=> true,
		'labels' 			=> $labels,
		'show_ui' 			=> true,
		'show_admin_column' => true,
		'query_var' 		=> true,
		'rewrite' 			=> array( 'slug' => 'style', 'hierarchical' => true )
	));
}

// ====== Guides
function guide_cpt_taxonomy() {
 
	$labels = array(
		'name' 				=> _x( 'Guides', 'taxonomy general name' ),
		'singular_name' 	=> _x( 'Guide', 'taxonomy singular name' ),
		'search_items' 		=> __( 'Search Guides'   ),
		'all_items'			=> __( 'All Guides'     ),
		'parent_item' 		=> __( 'Parent Guide'   ),
		'parent_item_colon' => __( 'Parent Guide:'  ),
		'edit_item' 		=> __( 'Edit Guide'     ), 
		'update_item' 		=> __( 'Update Guide'   ),
		'add_new_item' 		=> __( 'Add New Guide'  ),
		'new_item_name' 	=> __( 'New Guide Name' ),
		'menu_name' 		=> __( 'Guides'         )
	); 	
	
	register_taxonomy( 'guide', array( 'safari', 'itinerary' ), array(
		'hierarchical' 		=> true,
		'labels' 			=> $labels,
		'show_ui' 			=> true,
		'show_admin_column' => true,
		'query_var' 		=> true,
		'rewrite' 			=> array( 'slug' => 'guide', 'hierarchical' => true )
	));
}

// ====== Type
function type_cpt_taxonomy() {
 
	$labels = array(
		'name' 				=> _x( 'Types', 'taxonomy general name'  ),
		'singular_name' 	=> _x( 'Type',  'taxonomy singular name' ),
		'search_items' 		=> __( 'Search Type'   ),
		'all_items'			=> __( 'All Types'     ),
		'parent_item' 		=> __( 'Parent Type'   ),
		'parent_item_colon' => __( 'Parent Type:'  ),
		'edit_item' 		=> __( 'Edit Type'     ), 
		'update_item' 		=> __( 'Update Type'   ),
		'add_new_item' 		=> __( 'Add New Type'  ),
		'new_item_name' 	=> __( 'New Type Name' ),
		'menu_name' 		=> __( 'Types'         )
	); 	
	
	register_taxonomy( 'type', array( 'agents' ), array(
		'hierarchical' 		=> true,
		'labels' 			=> $labels,
		'show_ui' 			=> true,
		'show_admin_column' => true,
		'query_var' 		=> true,
		'rewrite' 			=> array( 'slug' => 'type', 'hierarchical' => true )
	));
}

// ====== Country
function country_cpt_taxonomy() {
 
	$labels = array(
		'name' 				=> _x( 'Countries', 'taxonomy general name'  ),
		'singular_name' 	=> _x( 'Country',   'taxonomy singular name' ),
		'search_items' 		=> __( 'Search Country'   ),
		'all_items'			=> __( 'All Countries'    ),
		'parent_item' 		=> __( 'Parent Country'   ),
		'parent_item_colon' => __( 'Parent Country:'  ),
		'edit_item' 		=> __( 'Edit Country'     ), 
		'update_item' 		=> __( 'Update Country'   ),
		'add_new_item' 		=> __( 'Add New Country'  ),
		'new_item_name' 	=> __( 'New Country Name' ),
		'menu_name' 		=> __( 'Countries'        )
	); 	
	
	register_taxonomy( 'country', array( 'agents' ), array(
		'hierarchical' 		=> true,
		'labels' 			=> $labels,
		'show_ui' 			=> true,
		'show_admin_column' => true,
		'query_var' 		=> true,
		'rewrite' 			=> array( 'slug' => 'country', 'hierarchical' => true )
	));
}

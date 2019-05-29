<?php
/*
// ========= Safari Custom Taxonomies (itinerary, location, style, guides) ============
*/

add_action( 'init', 'location_cpt_taxonomy', 0 );
add_action( 'init', 'style_cpt_taxonomy', 0 );
add_action( 'init', 'guide_cpt_taxonomy', 0 );


// ====== Location
function location_cpt_taxonomy() {
 
	$labels = array(
		'name' 				=> _x( 'Location', 'taxonomy general name' ),
		'singular_name' 	=> _x( 'Location', 'taxonomy singular name' ),
		'search_items' 		=> __( 'Search Location'   ),
		'all_items'			=> __( 'All Locations'     ),
		'parent_item' 		=> __( 'Parent Location'   ),
		'parent_item_colon' => __( 'Parent Location:'  ),
		'edit_item' 		=> __( 'Edit Location'     ), 
		'update_item' 		=> __( 'Update Location'   ),
		'add_new_item' 		=> __( 'Add New Location'  ),
		'new_item_name' 	=> __( 'New Location Name' ),
		'menu_name' 		=> __( 'Locations'         )
	); 	
	
	register_taxonomy( 'location', array( 'itinerary' ), array(
		'hierarchical' 		=> true,
		'labels' 			=> $labels,
		'show_ui' 			=> true,
		'show_admin_column' => true,
		'query_var' 		=> true,
		'rewrite' 			=> array( 'slug' => 'location', 'hierarchical' => true )
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
	
	register_taxonomy( 'guide', array( 'safari' ), array(
		'hierarchical' 		=> true,
		'labels' 			=> $labels,
		'show_ui' 			=> true,
		'show_admin_column' => true,
		'query_var' 		=> true,
		'rewrite' 			=> array( 'slug' => 'guide', 'hierarchical' => true )
	));
}




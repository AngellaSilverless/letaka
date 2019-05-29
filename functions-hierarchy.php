<?php
	
/****************************************************************/
/*          Hooks for creating a Child Custom Post Type          /
/****************************************************************/

/*
* Add meta box in Safari Page (to link to a Itinerary)
*/
add_action( 'add_meta_boxes', 'fh_add_meta_boxes' );

/*
* Check if the user selected a parent in Safari Page
*/
add_action( 'save_post', 'fh_validate_meta' );

/*
* Add script if is on page to add or edit Safari
*/
add_action( 'admin_enqueue_scripts', 'fh_load_admin_scripts' );

/*
* Add custom column to Itinerary page - Get Safari
*/
add_filter( 'manage_itinerary_posts_columns', 'fh_add_columns_itinerary' );

/*
* Add data to custom column in Itinerary page - Get Safari
*/
add_action( 'manage_itinerary_posts_custom_column' , 'fh_custom_itinerary_column', 10, 2 );

/*
* Add custom column to Safari page
*/
add_filter( 'manage_safari_posts_columns', 'fh_add_columns_safari' );

/*
* Add data to custom column in Safari page
*/
add_action( 'manage_safari_posts_custom_column' , 'fh_custom_safari_column', 10, 2 );

/*
* Make custom column sortable in Safari page
*/
add_filter( 'manage_edit-safari_sortable_columns', 'fh_sortable_safari_column' );

/*
* Assign filter to custom column
*/
add_action( 'restrict_manage_posts', 'fh_add_filter_column' );

/*
* Alter filter query to get custom column values
*/
add_filter( 'parse_query', 'fh_post_fiter' );



/****************************************************************/
/*                  Functions used in the hooks                  /
/****************************************************************/

function fh_add_meta_boxes() {
    add_meta_box('safari-parent', 'Itinerary', 'fh_safari_attributes_meta_box', 'safari', 'side', 'default');
};

function fh_safari_attributes_meta_box($post) {
    $pages = wp_dropdown_pages(array('post_type' => 'itinerary', 'selected' => $post->post_parent, 'name' => 'parent_id', 'show_option_none' => __('Select an itinerary'), 'sort_column'=> 'menu_order, post_title', 'echo' => 0));
    if ( ! empty($pages) ) {
        echo $pages;
    }
}

function fh_validate_meta($post_id) {
	if(isset($_POST['post_type']) && 'safari' == $_POST['post_type']) {
		
	    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
	      return $post_id;
		
		if(sizeof($_POST) > 0 ) {
			
		    if ( 'safari' == $_POST['post_type'] )
		        if ( !current_user_can( 'edit_page', $post_id ) )
		            return $post_id;
		    else if ( !current_user_can( 'edit_post', $post_id ) )
		        return $post_id;
		
		    if(!isset($_POST['post_parent']) || empty($_POST['post_parent']) || !$_POST['post_parent'])
		        $validated = false;
		    else
		        $validated = true;
		
		    if(!$validated)
		        wp_delete_post($post_id, true);
		    else
		        return $post_id;
		}
	}
	return $post_id;
}

function fh_load_admin_scripts( $hook ) {
	if ('safari' !== get_post_type())
		return;
	if ($hook != 'post-new.php' && $hook != 'post.php')
		return;
		
	wp_enqueue_script( 'admin_scripts', get_template_directory_uri() . '/inc/js/verify-post-type.js', array( 'jquery' ) );
}

function fh_add_columns_safari($columns) {
	
    $columns['itinerary'] = __( 'Itinerary', 'itinerary' );

    return $columns;
}

function fh_custom_safari_column( $column, $post_id ) {
	
	if($column == "itinerary") {
		$parent = wp_get_post_parent_id( $post_id );
		
        echo "<a href=". get_edit_post_link( $parent ) .">" . get_the_title( $parent ) . "</a>";
	}
}

function fh_sortable_safari_column( $columns ) {
    $columns['itinerary'] = 'itinerary';
 
    return $columns;
}

function fh_add_filter_column(){
	global $wpdb; 
	
    $type = 'post';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }

    if ('safari' == $type){
	    
	    $itineraries = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'itinerary' and post_status = 'publish'");
		
		$values = array();
		
		foreach($itineraries as $itinerary) {
			$values[$itinerary->post_title] = $itinerary->ID;
		}
		
        echo '<select name="f_itinerary">';
        echo '<option value="">All Itineraries</option>';

        $current_v = isset($_GET['f_itinerary'])? $_GET['f_itinerary']:'';
        foreach ($values as $label => $value) {
            printf
                (
                    '<option value="%s"%s>%s</option>',
                    $value,
                    $value == $current_v? ' selected="selected"':'',
                    $label
                );
            }
            
        echo '</select>';
    }
}

function fh_post_fiter( $query ){
    global $pagenow;
    
    $type = 'post';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }
    
    if ( 'safari' == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['f_itinerary']) && $_GET['f_itinerary'] != '') {
        $query->query_vars['post_parent__in'] = array($_GET['f_itinerary']);
    }
}

function fh_add_columns_itinerary($columns) {
	
    $columns['safari'] = __( 'Safari', 'safari' );

    return $columns;
}

function fh_custom_itinerary_column( $column, $post_id ) {
	
	if($column == "safari") {
		
		$link = get_admin_url() . "edit.php?s&post_status=all&post_type=safari&action=-1&m=0&f_itinerary={$post_id}&filter_action=Filter&paged=1&action2=-1";
		
        echo "<a href='{$link}'>View Safaris</a>";
	}
}

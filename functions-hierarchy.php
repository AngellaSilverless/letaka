<?php
	
	require('fpdf/fpdf.php');
	
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

/*
* Remove column Date from posts
*/
add_action( 'manage_posts_columns', 'fh_manage_columns' );

/*
* Add data to custom column in Agents
*/
add_action( 'manage_agents_posts_custom_column' , 'fh_custom_agent_column', 10, 2 );

/*
* Add custom column to Agents page
*/
add_filter( 'manage_agents_posts_columns', 'fh_add_columns_agent' );

/*
* Adjust order by
*/
add_action( 'pre_get_posts', 'fh_orderby' );

/*
* Join posts table with itself to get parent name
*/
add_filter('posts_join', 'fh_table_join_parent_name' );

/*
* Add export button
*/
add_action( 'restrict_manage_posts', 'fh_add_export_button' );

/*
* Export CSV and PDF
*/
add_action( 'init', 'fh_export' );

/*
* Create dropdown to filter safari by date
*/
add_action( 'restrict_manage_posts', 'fh_dropdown_time_safari' );
add_filter( 'parse_query', 'fh_filter_time_safari' );

/*
* Order posts by itinerary
*/
add_filter('posts_orderby', 'orderby_pages_callback', 10, 2);

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
    
    $columns = array(
		'cb'               => '&lt;input type="checkbox" />',
		'title'            => __( 'Title' ),
		'itinerary'        => __( 'Itinerary' ),
		'date-from'        => __( 'Start Date' ),
		'date-to'          => __( 'End Date' ),
		'cost'             => __( 'Cost' ),
		'availability'     => __( 'Availability' )
	);

    return $columns;
}

function fh_custom_safari_column( $column, $post_id ) {
	
	if($column == "itinerary") {
		$parent = wp_get_post_parent_id( $post_id );
        echo "<a href=". get_edit_post_link( $parent ) .">" . get_the_title( $parent ) . "</a>";
	} else if($column == "date-from") {
		$date_from = new DateTime(get_field("date_from", $post_id));
		echo $date_from->format("d M Y");
	} else if($column == "date-to") {
		$date_to = new DateTime(get_field("date_to", $post_id));
		echo $date_to->format("d M Y");
	} else if($column == "cost") {
		echo number_format(get_field("cost", $post_id));
	} else if($column == "availability") {
		echo get_field("availability", $post_id);
	}
}

function fh_sortable_safari_column( $columns ) {
    $columns['itinerary'] = 'itinerary';
    $columns['date-from'] = 'date-from';
    $columns['date-to'] = 'date-to';
    $columns['cost'] = 'cost';
    $columns['availability'] = 'availability';
 
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
            printf(
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
		
        echo "<a href='{$link}'><i class='fa fa-eye' aria-hidden='true' style='font-size: 1.2em'></i></i> View Safaris</a>";
	}
}

function fh_manage_columns( $columns ) {
	global $typenow;
	
	if($typenow == "itinerary" || $typenow == "agent" || $typenow == "safari")
		unset($columns['date']);
	
	return $columns;
}

function fh_add_columns_agent($columns) {
	
	$columns = array(
		'cb'               => '&lt;input type="checkbox" />',
		'title'            => __( 'Name' ),
		'telephone'        => __( 'Telephone' ),
		'email'            => __( 'Email' ),
		'taxonomy-type'    => __( 'Type' ),
		'taxonomy-country' => __( 'Country' )
	);

    return $columns;
}

function fh_custom_agent_column( $column, $post_id ) {
	
	if($column == "telephone") {
		
		$phone = get_post_meta( $post_id, 'telephone', true );
		
		printf( __( '%s' ), $phone );
		
	} else if($column == "email") {
		
		$email = get_post_meta( $post_id, 'email', true );
		
		printf( __( '%s' ), $email );
	}
}

function fh_orderby( $query ) {
    if( ! is_admin() )
        return;
 
    $orderby = $query->get( 'orderby');
    
	if($orderby == "date-from") {
        $query->set('meta_key','date_from');
        $query->set('orderby','meta_value_num');
    } else if($orderby == "date-to") {
        $query->set('meta_key','date_to');
        $query->set('orderby','meta_value_num');
    } else if($orderby == "cost") {
        $query->set('meta_key','cost');
        $query->set('orderby','meta_value_num');
    } else if($orderby == "availability") {
        $query->set('meta_key','availability');
        $query->set('orderby','meta_value_num');
    }
}

function fh_add_export_button( $post_type ) {
	if($post_type == "safari") { ?>
	
	    <input type="submit" name="export_csv" id="export_csv" class="button button-primary" value="Export to CSV" style="margin-right: 6px">
	    <input target='_blank' type="submit" name="export_pdf" id="export_pdf" class="button button-primary" value="Export to PDF">
	    <script type="text/javascript">
	        jQuery(function($) {
	            $('#export_csv').insertAfter('#post-query-submit');
	            $('#export_pdf').insertAfter('#export_csv');
	        });
	    </script>
	    <?php
    
    }
}

function fh_export() {
	$type = false;
	
	// Check if the hook is to export a CSV or PDF file
	
	if(isset($_GET['export_csv']))
		$type = "csv";
	else if(isset($_GET['export_pdf']))
		$type = "pdf";
		
	if($type) {	
		
		global $wpdb;
		
		$query = "SELECT p.ID,
				   p.post_title,
				   p2.post_title AS parent_name,
				   pm1.meta_value AS start_date,
				   pm2.meta_value AS end_date,
				   pm3.meta_value AS cost,
				   pm4.meta_value AS availability
				FROM {$wpdb->prefix}posts p
				    INNER JOIN {$wpdb->prefix}posts p2     ON p.post_parent = p2.ID
				    INNER JOIN {$wpdb->prefix}postmeta pm1 ON p.ID = pm1.post_id AND pm1.meta_key = 'date_to'
				    INNER JOIN {$wpdb->prefix}postmeta pm2 ON p.ID = pm2.post_id AND pm2.meta_key = 'date_from'
				    INNER JOIN {$wpdb->prefix}postmeta pm3 ON p.ID = pm3.post_id AND pm3.meta_key = 'cost'
				    INNER JOIN {$wpdb->prefix}postmeta pm4 ON p.ID = pm4.post_id AND pm4.meta_key = 'availability'";
		
		// Set WHERE conditions
		
		$where = array("p.post_status = 'publish'");
		
		if($_GET["s"])
			array_push($where, "p.post_title LIKE '%" . $_GET["s"] . "%'");
		
		if($_GET["m"])
			array_push($where, "pm1.meta_value LIKE '" . $_GET["m"] . "%'");
		
		if($_GET["f_itinerary"])
			array_push($where, "p2.ID = " . $_GET["f_itinerary"]);
		
		switch($_GET["date-safaris"]) {
			case "old-safaris":
				array_push($where, "pm1.meta_value < " . date('Ymd', strtotime('now'))); break;
			case "future-safaris":
				array_push($where, "pm1.meta_value >= " . date('Ymd', strtotime('now'))); break;
		}
		
		// Set ORDER BY
		
		if(isset($_GET["orderby"])) {
		
			switch($_GET["orderby"]) {
				case "title":
					$orderby = "p.post_title"; break;
				case "itinerary":
					$orderby = "parent_name";  break;
				case "date-from":
					$orderby = "cast(start_date as unsigned)";   break;
				case "date-to":
					$orderby = "cast(end_date as unsigned)";     break;
				case "cost":
					$orderby = "cast(cost as unsigned)";         break;
				case "availability":
					$orderby = "cast(availability as unsigned)"; break;
			}
			
			if(isset($_GET["order"])) {
				$orderby = $orderby . " " . $_GET["order"];
				$orderby = $orderby . ", parent_name, cast(start_date as unsigned)";
			}
				
				
		} else {
			$orderby = "parent_name, cast(start_date as unsigned)";
		}
		
		// Concatenate query
		
		$where = " WHERE  " . implode(" AND ", $where);
		
		$orderby = " ORDER BY " . $orderby;
		
		$query = $query . $where . $orderby;
		
		$safaris = $wpdb->get_results($query);
				
		if($type == "csv")
			func_export_csv($safaris);
		else if($type == "pdf")
			func_export_pdf($safaris);
	}
}

function func_export_csv($safaris) {
    
    if(sizeof($safaris) > 0) {

        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename="letaka-safaris.csv"');
        header('Pragma: no-cache');
        header('Expires: 0');

        $file = fopen('php://output', 'w');

        fputcsv($file, array('Safari', 'Itinerary', 'Start Date', 'End Date', 'Cost', 'Availability'));

        foreach($safaris as $safari) {
            
            $date_from = new DateTime(get_field("date_from", $safari->ID));
            $date_from = $date_from->format("d/m/Y");
            
            $date_to = new DateTime(get_field("date_to", $safari->ID));
            $date_to = $date_to->format("d/m/Y");
            
            $data = array(
                $safari->post_title,
                $safari->parent_name,
                $date_from,
                $date_to,
                "$" . number_format($safari->cost),
                $safari->availability
            );
            
            fputcsv($file, $data);
        }

        exit();
    }
}

function func_export_pdf($safaris) {
    
    if(sizeof($safaris) > 0) {
        
        $pdf = new FPDF();
		$pdf->SetAuthor('Silverless');
		$pdf->SetTitle('Letaka Safaris');
		$pdf->AddPage('P');
		
		// HEADER
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(0,10,'LETAKA SAFARIS',0, 0, "C");
		$pdf->Ln();
    
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(20, 5, 'Safari', 0);
		$pdf->Cell(70, 5, 'Itinerary', 0);
		$pdf->Cell(25, 5, 'Start Date', 0, 0, "R");
		$pdf->Cell(25, 5, 'End Date', 0, 0, "R");
		$pdf->Cell(25, 5, 'Cost', 0, 0, "R");
		$pdf->Cell(20, 5, 'Avail.', 0, 0, "R");
		$pdf->Ln();
		
		
		// CONTENT
		$pdf->SetFont('Arial','',10);
		
        foreach ($safaris as $safari) {
            
            $date_from = new DateTime(get_field("date_from", $safari->ID));
            $date_from = $date_from->format("d/m/Y");
            
            $date_to = new DateTime(get_field("date_to", $safari->ID));
            $date_to = $date_to->format("d/m/Y");
            
			$pdf->Cell(20, 5, $safari->post_title, 0);
			$pdf->Cell(70, 5, $safari->parent_name, 0);
			$pdf->Cell(25, 5, $date_from, 0, 0, "R");
			$pdf->Cell(25, 5, $date_to, 0, 0, "R");
			$pdf->Cell(25, 5, "$" . number_format($safari->cost), 0, 0, "R");
			$pdf->Cell(20, 5, $safari->availability, 0, 0, "R");
			$pdf->Ln();
        }
        
		$pdf->Output('letaka-safaris.pdf','I');
		
		exit();
	}
}

function fh_dropdown_time_safari(){
    $type = 'post';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }

    if ('safari' == $type){
        $values = array(
            'All Safaris' => 'all-safaris', 
            'Old Safaris' => 'old-safaris',
            'Future Safaris' => 'future-safaris',
        );
        
        echo '<select name="date-safaris">';
        
        $current_v = isset($_GET['date-safaris'])? $_GET['date-safaris']:'';
        foreach ($values as $label => $value) {
            printf(
                '<option value="%s"%s>%s</option>',
                $value,
                $value == $current_v? ' selected="selected"':'',
                $label
            );
        }
        
        echo '</select>';
    }
}

function fh_filter_time_safari( $query ){
    global $pagenow;
    $type = 'post';
    if(isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }
    if('safari' == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['date-safaris']) && $_GET['date-safaris'] != '') {
	    
	    if (! $query->get( 'meta_query' )) {
	    
	    	switch($_GET["date-safaris"]) {
	    
		    	case "all-safaris":
			
					$query->set( 'meta_query', [[]]);
					
				break;
					
				case "old-safaris":
			
					$query->set( 'meta_query', [[
						'key'     => 'date_from',
						'value'   => date('Ymd', strtotime('now')),
						'type'    => 'numeric',
						'compare' => '<'
					]]);
					
				break;
				
				case "future-safaris":
			
					$query->set( 'meta_query', [[
						'key'     => 'date_from',
						'value'   => date('Ymd', strtotime('now')),
						'type'    => 'numeric',
						'compare' => '>='
					]]);
					
				break;
			}
		}
    }
}

function fh_table_join_parent_name ($join) {
	global $typenow;
	
    if(isset($_GET["orderby"]) && $_GET["orderby"] == "itinerary" && $typenow == "safari") {
        global $wpdb;
        $join .= " LEFT JOIN (SELECT ID AS post_parent, post_title AS parent_name FROM {$wpdb->prefix}posts) table_parent ON {$wpdb->prefix}posts.post_parent = table_parent.post_parent";
    }
    return $join;
}

function orderby_pages_callback($orderby_statement, $wp_query) {
	if ($wp_query->get("post_type") === "safari" && $wp_query->get("orderby") === "itinerary") {
		return "table_parent.parent_name " . $wp_query->get("order");
	} else {
		return $orderby_statement;
	}
}

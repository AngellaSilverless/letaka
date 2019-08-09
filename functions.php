<?php
/**
 * letaka functions and definitions
 *
 * @package letaka
 */

/** = Ditch Junk = */ 

remove_action('wp_head', 'print_emoji_detection_script', 7);

remove_action('wp_print_styles', 'print_emoji_styles');

/** = Enqueue scripts and styles = */ 

function letaka_scripts() {
	
	wp_enqueue_style( 'letaka-style', get_stylesheet_uri() );

	wp_enqueue_script( 'letaka-core-js', get_template_directory_uri() . '/inc/js/compiled.js', array('jquery'), true); 

	wp_enqueue_script( 'mapbox-gl', get_template_directory_uri() . '/inc/js/mapbox-gl.js', array(), true );
	
	wp_enqueue_script( 'mapbox-gl-geocoder', get_template_directory_uri() . '/inc/js/mapbox-gl-geocoder.min.js', array(), true );
	
}

add_action( 'wp_enqueue_scripts', 'letaka_scripts' );

/**= Add Menus =**/

function sl_custom_menu() {

	register_nav_menus(
		array(
		    'main-menu-t'      => __( 'Main Menu - Top' ),
		    'main-menu-b'      => __( 'Main Menu - Bottom' ),
		    'footer-countries' => __( 'Footer - Countries' ),
            'safari' => __('Safari Menu'),
            'destinations' => __('Destinations Menu')
    )
  );

}
add_action( 'init', 'sl_custom_menu' );

/* Dashboard Config */

add_action('wp_dashboard_setup', 'sl_dashboard_widget');
  
function sl_dashboard_widget() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('custom_help_widget', 'Silverless Support', 'custom_dashboard_help');
}
function custom_dashboard_help() {
?>

<img src="https://silverless.co.uk/wp-content/themes/silverless/images/logo__silverless.svg" style="max-width:100%;
height:auto;"/>

<img src="https://silverless.co.uk/wp-content/uploads/2016/10/icon-screen-delete.svg" style=" display: inline-block; width: 60px; margin: 2em calc(50% - 30px) 1em;"/>

<p>For support or general enquiries please contact us directly at <a href="mailto:hello@silverless.co.uk">hello@silverless.co.uk</a> or call <a href="tel:+44 (0)1672 556532">01672 556532</a></p>
<p>We aim to respond within 60 minutes during hours (Mon to Fri 9am - 5pm)</p>

<?php
}

/* Dashboard Style */

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '
<style>
#menu-posts-camp .dashicons-admin-post:before{font-family:dashicons;content:"\f102"}#toplevel_page_testimonials .dashicons-admin-generic:before{font-family:dashicons;content:"\f101"}#toplevel_page_call-to-action .dashicons-admin-generic:before{font-family:dashicons;content:"\f488"}.taxonomy-where tr.form-field.term-description-wrap,body.taxonomy-what .form-field.term-description-wrap,body.taxonomy-when .form-field.term-description-wrap,body.taxonomy-where .form-field.term-description-wrap{display:none}#wpcontent,#wpfooter,#wpwrap{background:#cdc7c0}#adminmenu,#adminmenu .wp-submenu,#adminmenuback,#adminmenuwrap,#wpadminbar{background-color:#362b3a}#adminmenu .wp-has-current-submenu .wp-submenu,#adminmenu .wp-has-current-submenu .wp-submenu.sub-open,#adminmenu .wp-has-current-submenu.opensub .wp-submenu,#adminmenu a.wp-has-current-submenu:focus+.wp-submenu,.no-js li.wp-has-current-submenu:hover .wp-submenu{background-color:#302036}#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head,#adminmenu .wp-menu-arrow,#adminmenu .wp-menu-arrow div,#adminmenu li.current a.menu-top,#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu,.folded #adminmenu li.current.menu-top,.folded #adminmenu li.wp-has-current-submenu{background:#312036;color:#e57732}ul#adminmenu a.wp-has-current-submenu:after,ul#adminmenu>li.current>a.current:after{border-right-color:#cdc7c0}#adminmenu .wp-submenu a:focus,#adminmenu .wp-submenu a:hover,#adminmenu a:hover,#adminmenu li.menu-top>a:focus{color:#e4652f}

.post-type-page .acf-postbox {
  background: hsl(283, 14%, 20%);
  border-color: hsl(283, 14%, 20%);
}

.post-type-page #poststuff h2 {
  font-size: 14px;
  color: hsl(32, 12%, 78%);
  border:none;
  }

.post-type-page .acf-fields>.acf-field {
  border-color: hsl(30, 9%, 71%) !important;
}

.post-type-page .acf-flexible-content .layout {
  background: hsl(32, 12%, 78%);
  border: none;
  margin-bottom:50px;
}

.post-type-page .acf-flexible-content .layout .acf-fc-layout-handle {
    font-size:18px;
    text-transform:uppercase;
    font-weight:900;}

.post-type-page .acf-flexible-content .layout .acf-fc-layout-order {
  background: hsl(15, 73%, 46%);
  font-size: 12px;
  color: hsl(0, 0%, 100%);
}

.post-type-page .acf-flexible-content .no-value-message {
  color: hsl(0, 0%, 100%);
}

.post-type-page .inside.acf-fields > .acf-field > .acf-label {
    color: hsl(0, 0%, 100%);
    text-transform: uppercase;
    font-size: 24px;
    }

#wpwrap #col-left,
#wpwrap #col-right {
    width: 50%;
}

#wpwrap #edittag {
    max-width: none;
}

.submenu-parent {
	font-weight: bold !important;
	text-transform: uppercase;
}

.submenu-child {
	padding-left: 1.5em !important;
}

.custom_region_fields {
	display: none;
}

#custom_current_price input {
	pointer-events:none;
	background: #f8f8f8;
	border-color: rgba(222,222,222,.75);
	box-shadow: inset 0 1px 2px rgba(0,0,0,.04);
	color: rgba(51,51,51,.5);
}

#titlediv #title:read-only {
	background: #eaeaea;
}

</style>';
}

/**
 * ACF Options Pages.
 */
 
 if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'site-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}
 
/**= Remove Default Menu Items =**/
 
function remove_menus(){

  remove_menu_page( 'edit-comments.php' );          //Comments
  
}
add_action( 'admin_menu', 'remove_menus' );

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
 
  global $wp_version;
  if ( $wp_version !== '5.2.2' ) {
     return $data;
  }
 
  $filetype = wp_check_filetype( $filename, $mimes );
 
  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];
 
}, 10, 4 );
 
function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );
 
function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );

/**= Add javascript to admin page =**/

add_action( 'admin_enqueue_scripts', 'enqueue_script_admin' );

function enqueue_script_admin($hook) {
	global $typenow, $current_screen;
	
	// Control display of country fields and region fields in Destinations page (ADMIN)
	
	if(($hook == "edit-tags.php" || $hook == "term.php") && $typenow == "itinerary" && $current_screen->taxonomy == "destinations") {
	
	?>
	
	<script>
		
		window.onload = function() {
			var destination_parent = document.getElementById("parent");
			if(destination_parent.options[destination_parent.selectedIndex].value == -1) {
				document.getElementsByClassName("custom_country_fields")[0].style.display = "table-row";
				document.getElementsByClassName("custom_region_fields")[0].style.display = "none";
			} else {
				document.getElementsByClassName("custom_country_fields")[0].style.display = "none";
				document.getElementsByClassName("custom_region_fields")[0].style.display = "table-row";
			}
			
			destination_parent.addEventListener('change', function() {
				if(destination_parent.options[destination_parent.selectedIndex].value == -1) {
					document.getElementsByClassName("custom_country_fields")[0].style.display = "table-row";
					document.getElementsByClassName("custom_region_fields")[0].style.display = "none";
				} else {
					document.getElementsByClassName("custom_country_fields")[0].style.display = "none";
					document.getElementsByClassName("custom_region_fields")[0].style.display = "table-row";
				}
			}, false);
		}
		
	</script>
	
	<?php
		
	}

}

/**= Change Title and Cost of Special Safari =**/

add_action('acf/input/admin_head', 'change_special_safari_title');

function change_special_safari_title() {
	global $typenow; 
		
	if($typenow == "special_safaris") { ?>

	<script type="text/javascript">
		
	jQuery(function($){
		
		var currentPrice = $("#custom_current_price input");
		var titleLabel   = $("#title-prompt-text");
		var titleInput   = $("#title");
		
		currentPrice[0].readOnly = true;
		titleInput[0].readOnly   = true;

		titleLabel.text("Choose a safari reference");
		
		$("#safari_reference select").on("change", function() {
			var post_id = this.value;
			
			$.ajax({
				type : "POST",
				dataType : "JSON",
				url : "<?php echo admin_url( 'admin-ajax.php' ); ?>",
				data : {
					action: "safari_current_price",
					postID: post_id
				},
				success: function(response) {
					if(response && response.success) {
						titleInput.val(response.success.post_title);
						titleLabel.text("");
						currentPrice.val(response.success.cost);
					}
				}
			});
		});
	});
	
	</script>

	<?php
	
	}

}

/**= AJAX calls for Special Safaris =**/

add_action( 'wp_ajax_safari_current_price', 'safari_current_price' );
add_action( 'wp_ajax_nopriv_safari_current_price', 'safari_current_price' );

function safari_current_price() {
	$id = $_REQUEST["postID"];
	$result = array();
	
	if($id) {
		$title = get_the_title($id);
		$cost  = get_post_meta($id, "cost", true);
		
		$result = array("success" => array(
			"post_title" => $title . " (Special)",
			"cost"       => $cost
		));
		
	}
	
	echo json_encode($result);
	die();
}


add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**= Change title before  =**/

add_filter( 'wp_insert_post_data' , 'filter_post_data' , '99', 2 );

function filter_post_data( $data , $postarr ) {
	if($data["post_type"] != "special_safaris") {
		return $data;
	}
	
	if($data["post_status"] == "trash" || $data["post_status"] == "auto-draft" || !$postarr["acf"]) {
		return $data;
	}
	
	$title = get_the_title($postarr["acf"]["field_5d498707fa518"]);
	$data["post_title"] = $title . " (Special)";
	$data['post_name'] = sanitize_title($data["post_title"]);
    return $data;
}


/**= Social Sharing Buttons =**/

function letaka_social_sharing_buttons($content) {
	global $post;
	if(is_singular() || is_home()){
	
		// Get current page URL 
		$letakaURL = urlencode(get_permalink());
 
		// Get current page title
		$letakaTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
		// $letakaTitle = str_replace( ' ', '%20', get_the_title());
		
		// Get Post Thumbnail for pinterest
		$letakaThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$letakaTitle.'&amp;url='.$letakaURL.'&amp;via=Crunchify';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$letakaURL;
 
		// Based on popular demand added Pinterest too
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$letakaURL.'&amp;media='.$letakaThumbnail[0].'&amp;description='.$letakaTitle;
 
		// Add sharing button at the end of page/page content
		$content .= '<!-- Implement your own superfast social sharing buttons without any JavaScript loading. No plugin required. Detailed steps here: http://crunchify.me/1VIxAsz -->';
		$content .= '<div class="contactSocials"><h5 class="heading heading__sm">SHARE </h5>';
		$content .= ' <a href="'. $twitterURL .'" target="_blank"><i class="fab fa-twitter"></i></a>';
		$content .= '<a href="'.$facebookURL.'" target="_blank"><i class="fab fa-facebook-square"></i></a>';
		$content .= '</div>';
		
		return $content;
	}else{
		// if not a post/page then don't include sharing button
		return $content;
	}
};
//add_filter( 'the_content', 'letaka_social_sharing_buttons');

/**= Add Custom Post Types and Taxonomies =**/

require_once ('custom-taxonomies.php');
require_once ('custom-post-types.php');

/**= Add Child Custom Post Types =**/

require_once ('functions-hierarchy.php');

/**= Filter Custom Type Job =**/

function template_chooser($template) {    
	global $wpdb;
	
	global $wp_query;
	
	$post_type = get_query_var('post_type');
	
	if( $wp_query->is_search && $post_type == 'job' ) {
		
		$job = get_query_var('s');
		
		$location = get_query_var('location');
	
		$salary = $_GET['salary'];
		
		$tax_query = array(
			"relation" => "AND"
		);
		
		if($location) {
			$locationID = get_terms([
			    'name__like' => $location,
			    'fields' => 'ids'
			]);
			
			array_push($tax_query,
				array(
		            'taxonomy' => 'location',
		            'field'    => 'id',
		            'terms'    => $locationID,
		        )
		    );
		}
		
		if($salary) {
			array_push($tax_query,
				array(
		            'taxonomy' => 'salary-range',
		            'field'    => 'slug',
		            'terms'    => $salary,
		        )
		    );
		}
		
		$posts = $wpdb->get_results("
			SELECT SQL_CALC_FOUND_ROWS $wpdb->posts.ID
			FROM $wpdb->posts
			INNER JOIN $wpdb->postmeta ON ($wpdb->posts.ID = $wpdb->postmeta.post_id)
			WHERE 1=1
			  AND (UPPER($wpdb->posts.post_title) LIKE UPPER('%$job%')
				  OR ($wpdb->postmeta.meta_key = 'description' AND UPPER($wpdb->postmeta.meta_value) LIKE UPPER('%$job%')))
			  AND $wpdb->posts.post_type = 'job'
			  AND ($wpdb->posts.post_status = 'publish'
			       OR $wpdb->posts.post_status = 'acf-disabled'
			       OR $wpdb->posts.post_status = 'private')
			GROUP BY $wpdb->posts.ID"
		);
		
		$ids = array_map(function($post){
			return $post->ID;
		}, $posts);
		
		
		if(sizeof($ids) > 0) {
		
			$wp_query->query(
				array(
					'post__in'  => $ids,
					'post_type' => $post_type,
				    'tax_query' => $tax_query
				)
			);
		}
	}
	
	return $template;
}

add_filter('template_include', 'template_chooser');  

/*********************
* re-order left admin menu
**********************/
function reorder_admin_menu( $__return_true ) {
    return array(
		'index.php',                     // Dashboard
		'edit.php?post_type=itinerary',  // Itineraries
		'edit.php?post_type=safari',     // Safaries
		'edit.php?post_type=agents',     // Agent
		'edit.php?post_type=special_safaris',                  // Specials
		'separator1',                    // --Space--
		'edit.php',                      // Posts
		'edit.php?post_type=page',       // Pages 
		'separator2',                    // --Space--
		'upload.php',                    // Media
		'separator2',                    // --Space--
		'themes.php',                    // Appearance
		'plugins.php',                   // Plugins
		'users.php',                     // Users
		'tools.php',                     // Tools
		'options-general.php',           // Settings
		'separator3',                    // --Space--
		'wpcf7'                          // Contact Form 7 
   );
}
add_filter( 'custom_menu_order', 'reorder_admin_menu' );
add_filter( 'menu_order', 'reorder_admin_menu' );


/*
* Remove top level and sub menu admin menus
*/
function remove_admin_menus() {
   remove_menu_page( 'edit-comments.php' ); // Comments
   remove_menu_page( 'tools.php' ); // Tools
}
add_action( 'admin_menu', 'remove_admin_menus' );

/*remove term descriptions from post editor */

function wpse_hide_cat_descr() { ?>

    <style type="text/css">
       .term-description-wrap {
           display: none;
       }
    </style>

<?php } 

add_action( 'admin_head-term.php', 'wpse_hide_cat_descr' );
add_action( 'admin_head-edit-tags.php', 'wpse_hide_cat_descr' );

/* Add menu item to group specials for Agent Login */

add_action( 'admin_menu', 'register_my_custom_menu_page' );
function register_my_custom_menu_page() {
	add_menu_page( 'Specials', 'Specials', 'manage_options', 'edit.php?post_type=special_safaris', '', 'dashicons-awards', 90 );
	add_submenu_page('edit.php?post_type=special_safaris', 'Safaris', 'Safaris', 'manage_options', 'edit.php?post_type=special_safaris', '' );
	add_submenu_page('edit.php?post_type=special_safaris', 'Uploads', 'Uploads', 'manage_options', 'edit.php?post_type=special_uploads', '' );
}






















/**
 * A function used to programmatically create a post in WordPress. The slug, author ID, and title
 * are defined within the context of the function.
 *
 * @returns -1 if the post was never created, -2 if a post with the same title exists, or the ID
 *          of the post if successful.
 */
function programmatically_create_post() {
	global $wpdb;
	
	$row = 1;
	$safaris = array();
	
	if (($handle = fopen((get_stylesheet_directory_uri() . "/sql.csv"), "r")) !== FALSE) {
		
	    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		    
		    if($row != 1) {
		    
			    $num = count($data);
		        $row++;
		        
		        $date = new DateTime($data[2]);
		        
	            array_push($safaris, array(
		            "title" => explode(" - ", $data[0])[0],
		            "location" => explode(" - ", $data[0])[1],
		            "date" => $date->format("Ymd"),
		            "testimonial" => $data[1],
		            "created" => $date->format("Y-m-d H:i:s")
	            ));
		    } else {
			    $row++;
		    }
	    }
	    fclose($handle);
	}

/*
	foreach($safaris as $safari) {
	
			wp_insert_post(
				array(
					'comment_status'	=>	'closed',
					'ping_status'		=>	'closed',
					'post_author'		=>	1,
					'post_name'		    =>	str_replace(' ', '-', str_replace(" & ", " ", strtolower($safari["title"]))),
					'post_title'		=>	$safari["title"],
					'post_status'		=>	'publish',
					'post_type'		    =>	'testimonial',
					'post_parent'       =>  0,
					'post_date'         =>  $safari["created"],
					'meta_input' => array(
					    'attribution_location' => $safari["location"],
					    'attribution_date'     => $safari["date"],
					    'testimonial'          => $safari["testimonial"],
					)
				)
			);
	
	}
*/
	
	die;
}
//add_filter( 'wp', 'programmatically_create_post' );


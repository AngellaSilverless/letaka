<?php
/**
 * ============== Template Name: Specials
 *
 * @package letaka
 */
get_header();?>

<!-- ******************* Hero Content ******************* -->

<div class="content has-hero">

<?php if( get_field('hero_background_image') ): 

    get_template_part('template-parts/hero');?>

<?php endif;?>

<!-- ******************* Hero Content END ******************* -->

    <div class="container agent-specials find-safari pt4 pb8">
    
        <div class="row">
	        
		    <div class="col-12 col-lg-4 col-xl-3 order-sidebar order-sidebar-form">

			    <div class="sidebar">
		    	
			    	<div class="downloads mb2">
				    	
				    	<div class="title">Downloads</div>
				    	
				    	<div class="wrapper-items">
				    	
				    	<?php
					    	
					    $downloads = get_posts(array(
				        	'post_type'      => 'special_uploads',
				        	'posts_per_page' => -1,
							'orderby'        => 'title',
							'order'          => 'ASC'
						));
						
					    foreach($downloads as $download): ?>
					    
					    	<div class="item">
						    	
						    	<a class="pdf-wrapper" href="<?php echo $file["url"]; ?>" target="_blank">
							    	
							    	<i class="fas fa-file-pdf"></i>
							    	
							    	<div><?php echo $download->post_title; ?></div>
							    	
							    </a>
							    
					    	</div>
					    
					    <?php endforeach; ?>
					    
				    	</div>
				    	
			    	</div>
			    	
			    	<div class="contact-us sticky">
					    
					    <div class="title">Can we help further?</div>
					    
					    <?php echo do_shortcode('[contact-form-7 id="2434" title="Contact us directly" html_class="form contact-directly-form"]');?>
					    
				    </div>
			    	
		        </div>
		        
		    </div>
		    
		    <div class="col-12 col-lg-8 col-xl-9 order-content order-content-form">
			    
			    <div id="agent-logout">
				    <button>Logout</button>
			    </div>
	        
	        	<div class="results">
			        
			        <div class="your-search pb0"></div>
		        
			        <?php
				    
				    $itineraries = get_posts(array(
			        	'post_type'      => 'itinerary',
			        	'posts_per_page' => -1,
						'orderby'        => 'title',
						'order'          => 'ASC'
					));
				        
				    foreach($itineraries as $itinerary):
				    
				    $ID = $itinerary->ID;
				    
				    $special_safaris = $wpdb->get_results("
				    	SELECT PM.meta_value AS safari_reference 
						FROM {$wpdb->prefix}postmeta PM 
							JOIN {$wpdb->prefix}posts P ON PM.post_id = P.id 
						WHERE  P.post_type = 'special_safaris' AND PM.meta_key = 'safari_reference'
					");
					
					$specials = array_map(function($element) {
						return $element->safari_reference;
					}, $special_safaris);
					
					$special_costs = $wpdb->get_results("
						SELECT pm2.meta_value AS ID, pm.meta_value AS offer_price
						FROM {$wpdb->prefix}postmeta pm 
						    JOIN {$wpdb->prefix}posts p ON p.id = pm.post_id
						    JOIN {$wpdb->prefix}postmeta pm2 ON p.id = pm2.post_id
						WHERE p.post_type = 'special_safaris' AND  pm.meta_key = 'special_offer_price' AND pm2.meta_key = 'safari_reference'
					");
					
					$offer_costs = array();
					foreach($special_costs as $element) {
						$offer_costs[$element->ID] = $element->offer_price;
					}
				    
				    $safaris = get_posts(array(
			        	'post_type'      => 'safari',
			        	'posts_per_page' => -1,
			        	'post_parent'    => $ID,
			        	'post__in'       => $specials,
			        	'meta_key'       => 'date_from',
						'orderby'        => 'meta_value',
						'order'          => 'ASC',
						'meta_query'     => array(
							'relation'   => 'OR',
							array(
								'key'     => 'date_from',
								'value'   => date('Ymd', strtotime('now')),
								'type'    => 'numeric',
								'compare' => '>='
							),
							array(
								'key'     => 'date_to',
								'value'   => date('Ymd', strtotime('now')),
								'type'    => 'numeric',
								'compare' => '>='
							)
						),
					));
					
					$safari_IDS = implode(",", $specials);
					
					if(sizeof($safaris) > 0):
					
					// Destination
					
					$destinations = get_the_terms($ID, 'destinations');
					$$destination_visible = "";
					
					$classes = "";
					
					foreach($destinations as $destination)
						if($destination->parent == 0)
							$classes .= " " . $destination->slug;
						else
							$destination_visible = $destination->name;
							
					// Style
					
					$styles = get_the_terms($ID, 'style');
					
					foreach($styles as $style)
						$classes .= " " . $style->slug;
					
					$cost = $wpdb->get_var("
						SELECT pm2.meta_value as special_offer_price
						FROM   {$wpdb->prefix}posts p
						
						JOIN {$wpdb->prefix}postmeta pm  ON p.ID  = pm.post_id  AND pm.meta_key  = 'safari_reference'
						JOIN {$wpdb->prefix}postmeta pm2 ON p.ID  = pm2.post_id AND pm2.meta_key = 'special_offer_price'
						JOIN {$wpdb->prefix}posts    p2  ON p2.ID = pm.meta_value
						
						WHERE p.post_type    = 'special_safaris'
						AND   p.post_status  = 'publish'
						AND   p2.post_parent = {$ID}
						
						ORDER  BY CAST(special_offer_price AS UNSIGNED) 
						LIMIT  1
					");
				    
				    ?>
			        
			        <div class="wrapper-itinerary <?php echo $classes; ?>">
				        
					    <div class="itinerary-header">
						    
						    <div class="info">
							    
						        <div class="location mb1"><?php echo $destination_visible; ?></div>
						        
						        <div class="title heading heading__md heading__light mb2"><?php echo get_the_title($ID); ?></div>
						        
						        <div class="details">
							        
							        <div class="duration"><i class="fas fa-moon"></i><?php echo get_field("overview", $ID)["number_of_nights"]; ?></div>
							        
							        <div class="price"><span>From</span>USD <?php echo number_format($cost); ?></div>
							        
							        <div class="quantity"><?php echo sizeof($safaris) . ((sizeof($safaris) > 1) ? " tours" : " tour"); ?></div>
							        
						        </div>
						    
						    </div>
						    
						    <?php $image = get_field("hero_background_image", $ID); ?>
						    
						    <div class="img" style="background: url(<?php echo $image["url"]; ?>)">
							    
							    <div class="see-tours">
								    
								    <a class="view-itinerary" href="<?php echo get_permalink($ID); ?>">View Itinerary</a>
								    
								    <div class="expand-tours">
									    
									    <div>See Tours</div>
									    
									    <i class="fas fa-chevron-down"></i>
								    </div>
								    
								</div>
							    
						    </div>
						    
					    </div>
					    
					    <div class="tours special-tours" style="display: block">
						    
							<?php foreach($safaris as $safari):
								
							$ID_safari = $safari->ID;
							
							$availability = get_field("availability", $ID_safari);
							
							$full = true;
							
							if($availability && $availability > 0)
								$full = false;
								
							$availability_text = ($availability > 1) ? $availability . " spaces" : $availability . " space";
							
							$cost = get_field("cost", $ID_safari);
							
							$special_cost = $offer_costs[$ID_safari];
							
							$date_from = new DateTime(get_field("date_from", $ID_safari));
							$date_to   = new DateTime(get_field("date_to",   $ID_safari));
							
							$data = array(
								"date_from"    => $date_from->format("n"),
								"date_to"      => $date_to->format("n"),
								"availability" => (int)$availability,
								"cost"         => (int)$cost
							);
							
							?>
							
							<div class="wrapper-tour <?php if($full) echo "full"; ?>" data-attr='<?php echo json_encode($data, JSON_PRETTY_PRINT); ?>'>
								
								<div class="bar"></div>
								
								<div class="date">
									<i class="far fa-calendar-alt"></i><?php echo $date_from->format("d F Y") . " - " . $date_to->format("d F Y") ?></div>
								
								<div class="availability"><i class="fas fa-users"></i><span><?php echo ($full ? "Fully Booked" : $availability_text); ?></span></div>
								
								<div class="price">
									
									<div class="price-old"><?php echo "USD " . number_format($cost, 2); ?></div>
									<div class="price-new"><i class="fas fa-credit-card"></i><?php echo "USD " . number_format($special_cost, 2); ?></div>
									
								</div>
								
								<a class="book" <?php if(!$full) echo "href=" . get_permalink($ID_safari); ?>><?php echo ($full ? "Full" : "Book Tour"); ?></a>
							
							</div>
							
							<?php endforeach; ?>
						    
					    </div>
				        
			        </div>
			        
			        <?php endif; endforeach; ?>
			        
		        </div>
	        
		    </div>
	    
        </div>
        
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>

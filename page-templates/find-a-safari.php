<?php
/**
 * ============== Template Name: Find a Safari
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

    <div class="container find-safari pt4 pb8">
	    
	    <div class="row">
		    
		    <div class="col-3">
    
		        <div class="sidebar">
			        
			        <div class="filter">
				        
				        <div class="title">Filter</div>
				        
				        <fieldset>
					        
					        <div class="label">By Location<i class="fas fa-chevron-down"></i></div>
					        
					        <div class="wrapper-checkbox destination">
						        
						        <?php
							    
							    $locations = get_terms(array(
								    "taxonomy"   => "destinations",
								    "hide_empty" => false,
								    "parent"     => 0,
								    "orderby"    => "name"
								));
							    
							    foreach ($locations as $location): ?>
							    
							    <div>
							        <div class="checkbox">
								        <input type="checkbox" value="<?php echo $location->slug; ?>"/>
										<label><?php echo $location->name; ?></label>
							        </div>
						        </div>
							    
							    <?php endforeach; ?>
						        
					        </div>
					        
				        </fieldset>
				        
				        <fieldset>
					        
					        <div class="label">By Style<i class="fas fa-chevron-down"></i></div>
					        
					        <div class="wrapper-checkbox style">
						        
						        <?php
							    
							    $styles = get_terms(array(
								    "taxonomy"   => "style",
								    "hide_empty" => false,
								    "parent"     => 0,
								    "orderby"    => "name"
								));
							    
							    foreach ($styles as $style): ?>
							    
							    <div>
							        <div class="checkbox">
								        <input type="checkbox" value="<?php echo $style->slug; ?>"/>
										<label><?php echo $style->name; ?></label>
							        </div>
						        </div>
							    
							    <?php endforeach; ?>
						        
					        </div>
					        
				        </fieldset>
				        
				        <fieldset>
					        
					        <div class="label">By Date<i class="fas fa-chevron-down closed"></i></div>
					        
					        <div class="wrapper-checkbox dates" style="display:none">
						        
						        <?php
							        
							    $months = ["jan", "fev", "mar", "apr", "may", "jun", "jul", "aug", "sep", "oct", "nov", "dec"];
							    
							    for($i = 0; $i < sizeof($months); $i++): ?>
							    
						        <div>
							        <div class="checkbox">
								        <input type="checkbox" value="<?php echo ($i + 1); ?>"/>
										<label><?php echo ucfirst($months[$i]); ?></label>
							        </div>
						        </div>
						        
						        <?php endfor; ?>
					        </div>
					        
				        </fieldset>
				        
				        <fieldset>
					        
					        <div class="label">By Availability<i class="fas fa-chevron-down closed"></i></div>
					        
					        <div class="wrapper-checkbox availability" style="display:none">
							    
						        <div>
							        <div class="checkbox">
								        <input type="checkbox" min-avail="1" max-avail="2"/>
										<label>1 - 2 spaces</label>
							        </div>
						        </div>
						        
						        <div>
							        <div class="checkbox">
								        <input type="checkbox" min-avail="3" max-avail="5"/>
										<label>3 - 5 spaces</label>
							        </div>
						        </div>
						        
						        <div>
							        <div class="checkbox">
								        <input type="checkbox" min-avail="6" max-avail="8"/>
										<label>6 - 8 spaces</label>
							        </div>
						        </div>
						        
						        <div>
							        <div class="checkbox">
								        <input type="checkbox" min-avail="8"/>
										<label>More than 8 spaces</label>
							        </div>
						        </div>
					        </div>
					        
				        </fieldset>
				        
				        <fieldset>
					        
					        <div class="label">By Price<i class="fas fa-chevron-down closed"></i></div>
					        
					        <div class="wrapper-checkbox price" style="display:none">
						        
						        <?php 
							    
						        if(have_rows("filter_by_price_option", "options")):
						        
						        while(have_rows("filter_by_price_option", "options")):
						        
						        the_row();
						        
						        function formatPrice($price) {
							        return "$" . number_format($price, 2);
						        }
							        
							    ?>
							    
						        <div>
							        <div class="checkbox">
								        <input type="checkbox" max-price="<?php echo get_sub_field("less_than"); ?>"/>
										<label>Less than <?php echo formatPrice(get_sub_field("less_than")); ?></label>
							        </div>
						        </div>
						        
						        <div>
							        <div class="checkbox">
								        <?php
									        
								        $minPrice = get_sub_field("low_range")["from"];
								        $maxPrice = get_sub_field("low_range")["to"];
								        
									    ?>
								        <input type="checkbox" min-price="<?php echo $minPrice; ?>" max-price="<?php echo $maxPrice; ?>"/>
										<label><?php echo formatPrice($minPrice) . ' - ' . formatPrice($maxPrice); ?></label>
							        </div>
						        </div>
						        
						        <div>
							        <div class="checkbox">
								        <?php
									        
								        $minPrice = get_sub_field("mid_range")["from"];
								        $maxPrice = get_sub_field("mid_range")["to"];
								        
									    ?>
								        <input type="checkbox" min-price="<?php echo $minPrice; ?>" max-price="<?php echo $maxPrice; ?>"/>
										<label><?php echo formatPrice($minPrice) . ' - ' . formatPrice($maxPrice); ?></label>
							        </div>
						        </div>
						        
						        <div>
							        <div class="checkbox">
								        <input type="checkbox" min-price="<?php echo get_sub_field("more_than"); ?>"/>
										<label>More than <?php echo formatPrice(get_sub_field("more_than")); ?></label>
							        </div>
						        </div>
						        
						        <?php endwhile; endif; ?>
						        
					        </div>
					        
				        </fieldset>
				        
			        </div>
			        
		        </div>
		        
		    </div>
		    
		    <div class="col-9">
		        
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
				    
				    $safaris = get_posts(array(
			        	'post_type'      => 'safari',
			        	'posts_per_page' => -1,
			        	'post_parent'    => $ID,
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
						
					$cost = $wpdb->get_var(
						"SELECT meta_value
						FROM {$wpdb->prefix}posts p
						JOIN {$wpdb->prefix}postmeta pm ON p.ID = pm.post_id
						WHERE post_parent = {$ID}
						  AND post_type = 'safari'
						  AND meta_key = 'cost'
						  AND post_status = 'publish'
						ORDER BY CAST(meta_value AS unsigned)
						LIMIT 1"
					);
				    
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
								    
								    <div>See Tours</div>
								    
								    <i class="fas fa-chevron-down"></i>
								    
								</div>
							    
						    </div>
						    
					    </div>
					    
					    <div class="tours">
						    
							<?php foreach($safaris as $safari):
								
							$ID_safari = $safari->ID;
							
							$availability = get_field("availability", $ID_safari);
							
							$full = true;
							
							if($availability && $availability > 0)
								$full = false;
								
							$availability_text = ($availability > 1) ? $availability . " spaces" : $availability . " space";
							
							$cost = get_field("cost", $ID_safari);
							
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
								
								<div class="price"><i class="fas fa-credit-card"></i><?php echo "USD " . number_format($cost, 2); ?></div>
								
								<a class="book" <?php if(!$full) echo "href=" . get_permalink($ID_safari); ?>><?php echo ($full ? "Full" : "Book Tour"); ?></a>
							
							</div>
							
							<?php endforeach; ?>
						    
					    </div>
				        
			        </div>
			        
			        <?php endif; endforeach; ?>
			        
		        </div>
		        
		    </div>
      
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>

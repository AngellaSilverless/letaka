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

    <div class="container find-safari pt4 pb4">
    
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
				        
				        <?php
					        
					    $values = ["At least 2 places", "3 - 5 places", "6 - 8 places", "More than 8 places"];
					    
					    foreach($values as $value): ?>
					    
				        <div>
					        <div class="checkbox">
						        <input type="checkbox" value=".<?php echo $value; ?>"/>
								<label><?php echo $value; ?></label>
					        </div>
				        </div>
				        
				        <?php endforeach; ?>
			        </div>
			        
		        </fieldset>
		        
		        <fieldset>
			        
			        <div class="label">By Price<i class="fas fa-chevron-down closed"></i></div>
			        
			        <div class="wrapper-checkbox price" style="display:none">
				        
				        <?php
					        
					    $values = ["Less than $2,000", "$2,000 - 4,000", "$4,000 - $6,000", "More than $6,000"];
					    
					    foreach($values as $value): ?>
					    
				        <div>
					        <div class="checkbox">
						        <input type="checkbox" value=".<?php echo $value; ?>"/>
								<label><?php echo $value; ?></label>
					        </div>
				        </div>
				        
				        <?php endforeach; ?>
			        </div>
			        
		        </fieldset>
		        
	        </div>
	        
        </div>
        
        <div class="results">
        
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
		    
		    ?>
	        
	        <div class="wrapper-itinerary <?php echo $classes; ?>">
		        
			    <div class="itinerary-header">
				    
				    <div class="info">
					    
				        <div class="location mb1"><?php echo $destination_visible; ?></div>
				        <div class="title heading heading__md mb2"><?php echo get_the_title($ID); ?></div>
				        
				        <div class="details">
					        <div class="duration"><i class="fas fa-moon"></i>999</div>
					        <div class="price"><span>From</span>USD 2,000</div>
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
						
					$availability = ($availability > 1) ? $availability . " spaces" : $availability . " space";
					
					$date_from = new DateTime(get_field("date_from", $ID_safari));
					$date_to   = new DateTime(get_field("date_to",   $ID_safari));
					
					?>
					
					<div class="wrapper-tour <?php if($full) echo "full"; ?>" date-from="<?php echo $date_from->format("n"); ?>" date-to="<?php echo $date_to->format("n"); ?>">
						
						<div class="bar"></div>
						
						<div class="date">
							<i class="far fa-calendar-alt"></i><?php echo $date_from->format("d F Y") . " - " . $date_to->format("d F Y") ?></div>
						
						<div class="availability"><i class="fas fa-users"></i><span><?php echo ($full ? "Fully Booked" : $availability); ?></span></div>
						
						<div class="price"><i class="fas fa-credit-card"></i><?php echo "USD " . number_format(get_field("cost", $ID_safari), 2); ?></div>
						
						<a class="book" <?php if(!$full) echo "href=" . get_permalink($ID_safari); ?>><?php echo ($full ? "Full" : "Book Tour"); ?></a>
					
					</div>
					
					<?php endforeach; ?>
				    
			    </div>
		        
	        </div>
	        
	        <?php endif; endforeach; ?>
	        
        </div>
        
      
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>

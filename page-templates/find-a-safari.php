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
			        
			        <div class="wrapper-chekbox">
				        
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
			        
			        <div class="wrapper-chekbox">
				        
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
			        
			        <div class="label">By Date<i class="fas fa-chevron-down"></i></div>
			        
			        <div class="wrapper-chekbox dates">
				        
				        <?php
					        
					    $months = ["jan", "fev", "mar", "apr", "may", "jun", "jul", "aug", "sep", "oct", "nov", "dec"];
					    
					    foreach($months as $month): ?>
					    
				        <div>
					        <div class="checkbox">
						        <input type="checkbox" value=".<?php echo $month; ?>"/>
								<label><?php echo ucfirst($month); ?></label>
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
				'orderby'        => 'title',
				'order'          => 'ASC'
			));
		    
		    ?>
	        
	        <div class="wrapper-itinerary">
		        
			    <div class="itinerary-header">
				    
				    <div class="info">
					    
				        <div class="location mb1"><?php echo wp_get_post_terms($ID, "destinations")[0]->name; ?></div>
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
						
					$availability = ($availability > 1) ? $availability . " spaces" : $availability . " space"
					
					?>
					
					<div class="wrapper-tour <?php if($full) echo "full"; ?>">
						
						<div class="bar"></div>
						
						<div class="date"><i class="far fa-calendar-alt"></i><?php the_field("date_from", $ID_safari); echo " - " ; the_field("date_to", $ID_safari) ?></div>
						
						<div class="availability"><i class="fas fa-users"></i><span><?php echo ($full ? "Fully Booked" : $availability); ?></span></div>
						
						<div class="price"><i class="fas fa-credit-card"></i><?php echo "USD " . number_format(get_field("cost", $ID_safari), 2); ?></div>
						
						<div class="book"><?php echo ($full ? "Full" : "Book Tour"); ?></div>
					
					</div>
					
					<?php endforeach; ?>
				    
			    </div>
		        
	        </div>
	        
	        <?php endforeach; ?>
	        
        </div>
        
      
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>

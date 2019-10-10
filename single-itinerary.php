<?php
/**
 * Single Itinerary Custom Post Type
 *
 * @package letaka
 */
get_header();?>

<?php 
while( have_posts() ) {
    the_post();
}?>

<div class="content has-hero">

<!-- ******************* Hero Content ******************* -->

<?php $heroImage = get_field('hero_background_image');?>

<div class="hero <?php the_field( 'hero_height'); ?>" style="background-image: url(<?php echo $heroImage['url']; ?>);">

    <div class="container">
    
        <div class="row">
            <div class="col-12 col-sm-9 offset-0 offset-sm-3">
            <div class="hero__content">

            <h1 class="heading heading__xl heading__light slide-down"><?php echo $post->post_title;?></h1>

            <h2 id="hero-content" class="heading heading__sm heading__light heading__alt-font heading__caps mb2 slide-down"><?php 
	              
				$terms = get_the_terms($post->ID, 'destinations');
				
				$destinations = array();
				
				foreach( $terms as $term )
					if($term->parent != 0)
						array_push($destinations, $term->name);
						
				echo implode($destinations, " - ");
			
			?> | <span class="nr_nights"><i class="fas fa-moon"></i> <?php echo get_field("overview")["number_of_nights"]; ?> nights</span></h2>
            
            <div class="hero__safari-buttons mt2">
                
    			<a class="button slide-up" href="<?php echo home_url() . "/enquire-now"; ?>">Enquire Now</a>                

    			<a id="self" class="button button__ghost slide-up" href="#self">Learn More</a>    
                
            </div>
       
       
        </div>
              </div>
        </div> <!--r-->
    
    </div><!--c-->

<div class="separator-wrapper">

    <div class="container">
    
    <div class="row">
        
        <div class="col-3">
            <div class="separator-device left"></div>            
        </div>

        <div class="col-9">
            <div class="separator-device right"></div>            
        </div>
        
    </div>
            
</div>

</div>

</div><!--hero-->

<!-- ******************* Hero Content END ******************* -->

    <div class="container pt3 pb3">
	    
	    <div class="row">
            
            <div class="col-12 col-lg-4 col-xl-3 sticky-mobile">

			    <div class="sidebar sticky toggle-item">
				    
				    <div class="title">Safari Details</div>
				    			    	
			    	<div class="menu menu-details mb1">
			    	
				    	<?php 
						
						if(($locations = get_nav_menu_locations() ) && isset( $locations[ "safari" ])):
							
						$menu_countries = wp_get_nav_menu_object( $locations[ "safari" ] );
						
						$menu_items = wp_get_nav_menu_items($menu_countries);
			        
						foreach($menu_items as $menu_item): ?>
			        
						<div class="item">
					    	
					    	<a href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->post_title; ?><i class="fas fa-chevron-right state"></i></a>
						    
				    	</div>
				        
				        <?php endforeach; endif; ?>
				        
				        <div class="item">
					    	
					    	<a href="#upcoming-safaris">Upcoming Safaris<i class="fas fa-chevron-right state"></i></a>
						    
				    	</div>
				    
			    	</div>
			    	
			    	<a href="<?php echo home_url() . "/enquire-now"; ?>" class="button button__green button__fullwidth">Enquire Now</a>
			    	
			    </div>
			    
            </div>
        
            <div class="col-12 col-lg-8 col-xl-9">
    
				<div id="overview" class="wrapper-section">
					
					<div class="overview mb5">
					
		            <h3 class="heading heading__lg heading__section sticky-header">Overview</h3>
		            
		            <p><?php the_field('hero_copy');?></p>
		            
		            <? if( have_rows('overview') ): 
		                while( have_rows('overview') ): the_row(); ?>      
		            
		            <div class="safari-features">
		                
		                <? if( have_rows('features') ): 
		                while( have_rows('features') ): the_row();   ?>
		                
		                    <p><?php the_sub_field('item');?></p> 
		                
		                <?php endwhile; endif;?>            
		    
		            </div>

<?php
                    $images = get_sub_field('gallery');
                    if( $images ): ?>
                
                        <div class="gallery">
                
                        <?php foreach( $images as $image ): ?>
                
                        <a href="<?php echo $image['url']; ?>" class="lightbox-gallery"  alt="<?php echo $image['alt']; ?>" style="background-image: url(<?php echo $image['url']; ?>);"><!--<?php echo $image['caption']; ?>--></a>
                
                        <?php endforeach; ?>
                
                        </div>
                
                    <?php endif; ?>

					</div>

                    <div id="daily" class="mb5">
                        
		                <h3 class="heading heading__lg heading__section mt1">Daily Activity</h3>                        
                        <?php $count = 0;?> 
                        	
                        <?php if( have_rows('daily') ): 
                        while( have_rows('daily') ): the_row();?>
                        
                        <div class="wrapper-questions daily">		
                            		
                            <div class="question">
                        		<p><?php the_sub_field('day');?></p>
                        		
                        		<p>
                        		    <i class="fas fa-map-marker-alt"></i>
                        		    <?php the_sub_field('location');?>
                        		</p>
                        		<p>
                        		    <i class="fas fa-campground"></i> 
                            	    <?php the_sub_field('accom');?>
                        		</p>
                        
                            	<i class="fas fa-chevron-right state"></i></div>
                        	
                        	<div class="answer" style="display:none;">
                        
                                <div class="activities">
                                    
                                    <?php if( have_rows('activities') ): ?>
                                    <p class="font400 heading__caps">Activities</p>
                                    	<?php while( have_rows('activities') ): the_row(); ?>
                                        	<div class="item">
                                                <img src="<?php the_sub_field('icon');?>"/>
                                                <?php the_sub_field('activity');?>
                                        	</div>
                                    	<?php endwhile; endif; ?>        
                                </div>
                                
                                <div class="detail">
                                     <p class="font400 heading__caps">Daily Detail</p>
                                     <?php the_sub_field('detail');?>   
                                </div>
                        					
                            </div>
                        					
                        </div>
                        
                        <?php $count++;  endwhile;  endif; ?>

                    </div><!--#daily-->

		            <?php endwhile; endif;?><!--overview loop-->
		            
				</div>
				
				<div class="wrapper-section mb5">    
    
					<h3 id='map' class="heading heading__lg heading__section mt1 ">Map</h3>
    
					<?php if( have_rows('map') ):
						
					$map_config = array();
		    	
			    	$points = array();
			    	
			    	while( have_rows('map') ): the_row();
			    	
			    		if(have_rows('settings')): while(have_rows('settings')): the_row();
			    			
			    			$map_config = array(
				    			"center_lat"  => floatval(get_sub_field("lat")),
				    			"center_long" => floatval(get_sub_field("long")),
				    			"zoom_level"  => get_sub_field("zoom_level"),
				    			
			    			);
			    		
			    		endwhile; endif;
			    		
			    		$points = array();
			    		
			    		if(have_rows('markers')): while(have_rows('markers')): the_row();
				    		
				    		array_push($points, array(
								'type' => 'Feature',
								'geometry' => array(
									'type' => 'Point',
									'coordinates' => array(
										floatval(get_sub_field("longtitude")),
										floatval(get_sub_field("latitude"))
									)
								),
								'properties' => array(
									'heading' => get_sub_field('heading'),
									'detail'  => get_sub_field('detail')
								)
							));
			    		
			    		endwhile; endif;
			    				
			    	endwhile; endif;?>
			    		
		    		<div class="map-wrapper mb3 h50">
			    		
		    			<div id='map-itinerary' class="h50" points='<?php echo json_encode($points);?>' config='<?php echo json_encode($map_config);?>'></div>
		    			
		    		</div>
		    	
				</div>
				
				<div class="wrapper-section mb5">
    
    		        <h3  id="accom" class="heading heading__lg heading__section mt1">Safari Accommodation</h3>
    		        
    		        <div class="safari-accommodation">
    		        
    		        <? if( have_rows('accommodation') ): 
    		            while( have_rows('accommodation') ): the_row();?>      
    		
    		            <div class="row">
    		    
    		                 <div class="col-12 col-md-6">
    		    
    		                    <?php
    		                    $images = get_sub_field('gallery');
    		                    if( $images ): ?>
    		                
    		                        <div class="gallery safari">
    		                
    		                        <?php foreach( $images as $image ): ?>
    		                
    		                        <a href="<?php echo $image['url']; ?>" class="lightbox-gallery"  alt="<?php echo $image['alt']; ?>" style="background-image: url(<?php echo $image['url']; ?>);"><!--<?php echo $image['caption']; ?>--></a>
    		                
    		                        <?php endforeach; ?>
    		                
    		                        </div>
    		                
    		                    <?php endif; ?>                
    		                    
    		                </div><!--col-->
    		                
    		                <div class="col-12 col-md-6">
    		                    
    		                    <?php the_sub_field('copy');?>  
    		                    
    		                </div><!--col-->
    		       
    		            </div><!--r-->
    		
    		        </div><!--accommodation-->
    		
    		         <?php endwhile; endif;?><!--accommodation loop-->   
    		         
				</div>
				
				
				
				<div class="wrapper-section mb5">    
    		
    		        <h3 id="extensions" class="heading heading__lg heading__section mt1">Extend Your Safari</h3>
    		
    		        <? if( have_rows('extensions_&_activities') ): 
    		            while( have_rows('extensions_&_activities') ): the_row();?>      
    		
    		        <div class="extensions mb3">
    		
    		            <? if( have_rows('items') ): 
    		            while( have_rows('items') ): the_row();?>                
    		
			    		<div class="row">
			    		 
			    		<div class="col-12 col-sm-4">
			    		    <h2 class="heading heading__sm"><?php the_sub_field('heading');?></h2> 
			    		</div>
			    		
			    		<div class="col-12 col-sm-8">
			    		    <p><?php the_sub_field('copy');?></p> 
			    		</div> 
			    		    
			    		</div><!--r-->
    		                        
    		            <?php endwhile; endif;?>
    		
    		        </div><!--extensions-->
    		
    		         <?php endwhile; endif;?><!--extensions loop-->      
    		        
    		    </div>


				<div  id="detail" class="wrapper-section mb5">
    
    		        <h3  id="accom" class="heading heading__lg heading__section mt1">Details</h3>

                    <div class="includes-excludes">
		    
		                <div class="row">
		                
		                <div class="col-12 col-md-6">
		            
		                    <div class="safari-includes list">
		                        
		                        <h2 class="heading heading__md">Included in Your Safari</h2>   

                                <?php if( have_rows('details') ): 
                                                        while( have_rows('details') ): the_row();?>
                                <?php the_sub_field('includes');?>   
                                <?php endwhile; endif;?>		                        
		                    </div>
		                </div>
		                
		                <div class="col-12 col-md-6">
			                
		                    <div class="safari-excludes list">
		                        
		                         <h2 class="heading heading__md">Excluded In This Safari</h2>   
		            
                                <?php if( have_rows('details') ): 
                                                        while( have_rows('details') ): the_row();?>
                                <?php the_sub_field('excludes');?>   
                                <?php endwhile; endif;?>		
		                        
		                    </div>

		                </div>
		                
		            </div><!--row-->
		    
                    </div>
		    
					<div class="safari-payment list">
		                
		                <h2 class="heading heading__md mb1">Easy Payment Options</h2>
		    
                        <?php if( have_rows('details') ): 
                            while( have_rows('details') ): the_row();?>
                        <?php the_sub_field('payment_options');?>   
                        <?php endwhile; endif;?>	
		                
		            </div>
		    
				</div>


    		    <div class="wrapper-section mb3">    
    		
    		        <h3 id="upcoming-safaris" class="heading heading__lg heading__section mt1">Upcoming Safaris</h3>
    		
    		        <div class="tours">
	    		        
	    		        <?php
		    		        
		    		    $safaris = get_posts(array(
				        	'post_type'      => 'safari',
				        	'posts_per_page' => -1,
				        	'post_parent'    => $post->ID,
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
						    
						foreach($safaris as $safari):
							
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
    		    
    		</div><!--r-->
    		
    </div><!--c-->

</div><!--content-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/stickyfill/1.1.4/stickyfill.min.js"></script>
<?php get_footer(); ?>
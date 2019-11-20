<?php
/**
 * Single Safari Custom Post Type
 *
 * @package letaka
 */
get_header();?>

<?php 
while( have_posts() ) {
    the_post();
    $post = get_post(get_the_ID());
    $parent = ($post->post_parent != 0) ? get_post($post->post_parent) : null;
}?>

<div class="content has-hero">

<!-- ******************* Hero Content ******************* -->

<?php $heroImage = get_field('hero_background_image', $parent);?>

<div class="hero <?php the_field( 'hero_height', $parent); ?>" style="background-image: url(<?php echo $heroImage['url']; ?>);">

    <div class="container">
	    
	    <?php $number_nights = get_field("overview", $parent)["number_of_nights"]; ?>
    
        <div class="row">
            <div class="col-12 col-sm-9 offset-0 offset-sm-3">
            <div class="hero__content">

            <h1 class="heading heading__xl heading__light slide-down"><?php echo $parent->post_title;?></h1>

            <!--<h2 id="hero-content" class="heading heading__sm heading__light heading__alt-font heading__caps mb2 slide-down">
                
                <?php $terms = get_the_terms($post->ID, 'destinations');
				$destinations = array();
				foreach( $terms as $term )
					if($term->parent != 0)
					array_push($destinations, $term->name);
				echo implode($destinations, " - ");?> -->
				<h2 id="hero-content" class=" destinations heading heading__sm heading__light heading__alt-font heading__caps mb1 slide-down">
    				<? if( have_rows('overview', $parent) ): while( have_rows('overview', $parent) ): the_row();
                        if( have_rows('destinations', $parent) ): while( have_rows('destinations', $parent) ): the_row(); ?>      
    
        		                <span><?php the_sub_field('destination', $parent);?><i class="fas fa-chevron-right"></i></span>
    
                    <?php endwhile; endif; endwhile; endif; ?>			
				</h2>
                
            <p class="heading heading__sm heading__light heading__alt-font mb0"><?php
	            
	            $date_from = new DateTime(get_field("date_from"));
				$date_to   = new DateTime(get_field("date_to"));
						
	            echo $date_from->format("d F Y") . " - " . $date_to->format("d F Y");
		            
	        ?></p>
    
            <div class="hero__safari-meta mb2">
                
                <p><i class="fas fa-moon"></i> <?php echo $number_nights; ?> Nights</p>
                <p><i class="fas fa-users"></i> <?php the_field('availability');?> Places Remaining</p>
                <p><i class="fas fa-credit-card"></i> From <?php echo "$" . number_format(get_field('cost'));?></p>
            
            </div>
            
            <div class="hero__safari-buttons">
                
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

			    <div class="sidebar sidebar-safari sticky toggle-item">
				    
				    <div class="title">Safari Details</div>
				    
				    <div class="safari-summary">

    				    <div id="hero-content" class="hero__content mb1">

                            <p class="safari-title mb0"><?php echo $parent->post_title;?></p>

                            <p class="location"><?php 
	              
								$terms = get_the_terms($parent->ID, 'destinations');
								
								$destinations = array();
								
								foreach( $terms as $term )
									if($term->parent != 0)
										array_push($destinations, $term->name);
										
								echo implode($destinations, " - ");
							
							?></p>
                
                            <p class="date mb0"><?php
	            
					            $date_from = new DateTime(get_field("date_from"));
								$date_to   = new DateTime(get_field("date_to"));
										
					            echo $date_from->format("d F Y") . " - " . $date_to->format("d F Y");
						            
					        ?></p>
    
                            <div class="safari-meta mb2">
                                
                                <p><i class="fas fa-moon"></i> <?php echo $number_nights; ?> Nights</p>
                                <p><i class="fas fa-users"></i> <?php the_field('availability');?> Places Remaining</p>
                                <p><i class="fas fa-credit-card"></i> From <?php echo "$" . number_format(get_field('cost'));?></p>
                            
                            </div>

                        </div>

				    </div>
				    			    	
			    	<div class="menu menu-details mb1">
			    	
				    	<?php 
						
						if(($locations = get_nav_menu_locations() ) && isset( $locations[ "safari" ])):
							
						$menu_countries = wp_get_nav_menu_object( $locations[ "safari" ] );
						
						$menu_items = wp_get_nav_menu_items($menu_countries);
			        
						foreach($menu_items as $menu_item): ?>
						
						<?php if($menu_item->post_name == "accommodation"): ?>
						
						<div class="item">
					    	
					    	<a href="#guides">Guides<i class="fas fa-chevron-right state"></i></a>
						    
				    	</div>
						
						<?php endif; ?>
			        
						<div class="item">
					    	
					    	<a href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->post_title; ?><i class="fas fa-chevron-right state"></i></a>
						    
				    	</div>
				        
				        <?php endforeach; endif; ?>
				    
			    	</div>
			    	
			    	<a href="<?php echo home_url() . "/enquire-now"; ?>" class="button button__green button__fullwidth">Enquire Now</a>
			    	
			    </div>
			    
            </div>
        
            <div class="col-12 col-lg-8 col-xl-9">
    
				<div id="overview" class="wrapper-section">
					
					<div class="overview mb5">
					
		            <h3 class="heading heading__lg heading__section sticky-header">Overview</h3>
		            
		            <p><?php the_field('hero_copy', $parent);?></p>
		            
		            <? if( have_rows('overview', $parent) ): 
		                while( have_rows('overview', $parent) ): the_row(); ?>      
		            
		            <div class="safari-features">
		                
		                <? if( have_rows('features', $parent) ): 
		                while( have_rows('features', $parent) ): the_row();   ?>
		                
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
                        	
                        <?php if( have_rows('daily', $parent) ): 
                        while( have_rows('daily', $parent) ): the_row();?>
                        
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
                                    
                                    <?php if( have_rows('activities', $parent) ): ?>
                                    <p class="font400 heading__caps">Activities</p>
                                    	<?php while( have_rows('activities', $parent) ): the_row(); ?>
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
    
					<?php if( have_rows('map', $parent) ):
						
					$map_config = array();
		    	
			    	$points = array();
			    	
			    	while( have_rows('map', $parent) ): the_row();
			    	
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
    
    		        <h3  id="guides" class="heading heading__lg heading__section mt1">Guides</h3>
    		        
    		        <div class="safari-guides our-guides">
	    		        
    		        <?php
	    		        
	    		        $guides = get_the_terms($post->ID, "guide");
	    		        
	    		        if(!$guides) {
		    		        $guides = get_the_terms($parent->ID, "guide");
	    		        }
						
						if($guides): foreach($guides as $guide): ?>
				
						<div class="wrapper-guides">
									
							<div class="guide heading heading__sm">
								
								<?php 
									
								$image = get_field('image', $guide->taxonomy . '_' . $guide->term_id);
								
								?>
								
								<div class="img mr1" style="background:url(<?php echo $image["sizes"]["thumbnail"]; ?>);"></div><?php
									
								echo $guide->name;
								
								?><i class="fas fa-chevron-right"></i>
								
							</div>
							
							<div class="info" style="display:none;">
								
								<div class="row">
		    						
		    						<div class="col-12 col-xl-4 img" style="background:url(<?php echo $image["url"]; ?>);"></div>
		    						
		    						<div class="col-12 col-xl-8 pl2">
		        						
		        					<?php the_field('description', $guide->taxonomy . '_' . $guide->term_id);?>	
		
		    						</div>
		    						
		    						<div class="col-12 pl0 pr0 pt1">    						
		    						
		    						<?php 
									$images = get_field('gallery', $guide->taxonomy . '_' . $guide->term_id);						
									if( $images ): ?>
		    						
		    						<div class="gallery">
								
									<?php foreach( $images as $image ): ?>
									
									<a href="<?php echo $image['url']; ?>" class="lightbox-gallery"  alt="<?php echo $image['alt']; ?>" style="background-image: url(<?php echo $image['url']; ?>);"></a>
									
									<?php endforeach; ?>
								
								</div>
		
								<?php endif; ?>
								
								</div><!--col-->
								
							</div><!--r-->
							
		                    </div>
						
						</div>
						
						<?php endforeach; endif; ?>
    		        
    		        </div>
    		         
				</div>
				
				<div class="wrapper-section mb5">
    
    		        <h3  id="accom" class="heading heading__lg heading__section mt1">Safari Accommodation</h3>
    		        
    		        <div class="safari-accommodation">
    		        
    		        <? if( have_rows('accommodation', $parent) ): 
    		            while( have_rows('accommodation', $parent) ): the_row();?>      
    		
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
    		
    		        <? if( have_rows('extensions_&_activities', $parent) ): 
    		            while( have_rows('extensions_&_activities', $parent) ): the_row();?>      
    		
    		        <div class="extensions mb3">
    		
    		            <? if( have_rows('items', $parent) ): 
    		            while( have_rows('items', $parent) ): the_row();?>                
    		
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

                                <?php if( have_rows('details', $parent) ): 
                                                        while( have_rows('details', $parent) ): the_row();?>
                                <?php the_sub_field('includes');?>   
                                <?php endwhile; endif;?>		                        
		                    </div>
		                </div>
		                
		                <div class="col-12 col-md-6">
			                
		                    <div class="safari-excludes list">
		                        
		                         <h2 class="heading heading__md">Excluded In This Safari</h2>   
		            
                                <?php if( have_rows('details', $parent) ): 
                                                        while( have_rows('details', $parent) ): the_row();?>
                                <?php the_sub_field('excludes');?>   
                                <?php endwhile; endif;?>		
		                        
		                    </div>

		                </div>
		                
		            </div><!--row-->
		    
                    </div>
		    
					<div class="safari-payment list">
		                
		                <h2 class="heading heading__md mb1">Easy Payment Options</h2>
		    
                        <?php if( have_rows('details', $parent) ): 
                            while( have_rows('details', $parent) ): the_row();?>
                        <?php the_sub_field('payment_options');?>   
                        <?php endwhile; endif;?>	
		                
		            </div>
		    
				</div>
		    
    		    
    		</div><!--r-->
    		
    </div><!--c-->

</div><!--content-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/stickyfill/1.1.4/stickyfill.min.js"></script>
<?php get_footer(); ?>
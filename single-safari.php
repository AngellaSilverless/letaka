<?php
/**
    Single Safari Custom Post Type
    
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

<?php 
    
    $heroImage = get_field('hero_background_image', $parent);
    
?>

<div class="hero <?php the_field( 'hero_height', $parent); ?>" style="background-image: url(<?php echo $heroImage['url']; ?>);">

    <div class="container">
    
        <div class="row">
              
            <div class="hero__content">

            <h1 class="heading heading__xl heading__light center slide-down"><?php echo $parent->post_title;?></h1>

            <h2 class="heading heading__sm heading__light heading__alt-font heading__caps font800 mb2 center slide-down"><?php 
	              
				$terms = get_the_terms($parent->ID, 'destinations');
				
				$destinations = array();
				
				foreach( $terms as $term )
					if($term->parent != 0)
						array_push($destinations, $term->name);
						
				echo implode($destinations, " - ");
			
			?></h2>
                
            <p class="heading heading__sm heading__light heading__alt-font center slide-down"><?php
	            
	            $date_from = new DateTime(get_field("date_from"));
				$date_to   = new DateTime(get_field("date_to"));
						
	            echo $date_from->format("d F Y") . " - " . $date_to->format("d F Y");
		            
	        ?></p>
    
            <div class="hero__safari-meta mb1">
                
                <p><i class="fas fa-moon"></i> 3 Nights</p>
                <p><i class="fas fa-users"></i> <?php the_field('availability');?> Places Remaining</p>
                <p><i class="fas fa-credit-card"></i> From <?php echo "$" . number_format(get_field('cost'));?></p>
            
            </div>

            <p class="hero__safari-desc mb2"><?php the_field('hero_copy', $parent);?></p>
       
            <div class="hero__safari-buttons">
                
    			<a class="button slide-up" href="">Enquire Now</a>                

    			<a id="self" class="button button__ghost slide-up" href="#self">Learn More</a>    
                
            </div>
       
       
        </div>
    
        </div> <!--r-->
    
    </div><!--c-->

</div><!--hero-->

<!-- ******************* Hero Content END ******************* -->

    <div class="container pt3 pb3">
    
        <div class="row">
        
        
        
            <div class="col-4">
                
            <div class="sidebar sticky">
            
                <div class="title">SAFARI DETAILS</div>
                
                <?php wp_nav_menu( array(
                    'theme_location' => 'safari',
                    'menu_class' => 'safari sidebar-menu' ) );
                ?>
            
        </div><!--sidebar-->
        
        </div>
        
            <div class="col-8">
    
            <h3 class="heading heading__lg heading__section">Overview</h3>
            
            <? if( have_rows('overview', $parent) ): 
                while( have_rows('overview', $parent) ): the_row();   
                $featuresImage = get_sub_field('features_image', $parent);?>      
            
            <div id="overview" class="safari-features" style="background-image: url(<?php echo $featuresImage['url']; ?>);">
                
                <? if( have_rows('features', $parent) ): 
                while( have_rows('features', $parent) ): the_row();   ?>
                
                    <p class="heading__light"><?php the_sub_field('item');?></p> 
                
                <?php endwhile; endif;?>            
    
            </div>
    
            <div class="safari-activities text-center pt3 mb3">
                
                <h3 class="heading heading__md mb1">Activities Include:   </h3>
                
                <? if( have_rows('activities', $parent) ): 
                while( have_rows('activities', $parent) ): the_row();?>
                
                    <div class="safari-activites__item">
                
                        <img src="<?php the_sub_field('icon');?>"/>
                        <p><?php the_sub_field('title');?></p>
                
                    </div>
                
                <?php endwhile; endif;?>           
                
            </div>
    
            <div class="row mb2">
                
                <div class="col-6">
            
                    <div class="safari-includes list">
                        
                        <h2 class="heading heading__md mb1">Included in Your Safari</h2>   
            
                        <?php the_sub_field('includes');?>   
                        
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="safari-excludes list">
                        
                         <h2 class="heading heading__md mb1">Excluded In This Safari</h2>   
            
                        <?php the_sub_field('excludes');?>   
                        
                    </div>
            
                </div>
                
            </div><!--row-->
    
            <div class="row">
                
                <div class="col-8">
    
            <div class="safari-payment list">
                
                <h2 class="heading heading__md mb1">Easy Payment Options</h2>
    
                <?php the_sub_field('payment_options');?> 
                
            </div>
    
                </div>
                
            </div><!--row-->
    
            <?php endwhile; endif;?><!--overview loop-->
            
            <h3 class="heading heading__lg heading__section mt1">Daily Activity</h3>
            
            <? if( have_rows('daily_activity', $parent) ): 
                while( have_rows('daily_activity', $parent) ): the_row();?>      
    
            <div id="daily" class="daily-activity">
                
                <? if( have_rows('days', $parent) ): 
                while( have_rows('days', $parent) ): the_row();   ?>
    
    <div class="row mb3">
        
        <div class="col-4 daily-activity__day-meta">
        
            <p class="heading heading__sm">
                <?php the_sub_field('day');?>
            </p>
            
            <p><i class="fas fa-map-marker-alt">
                </i> 
                <?php the_sub_field('location');?>
            </p>
            
            <p>
                <i class="fas fa-campground"></i> 
                <?php the_sub_field('accommodation');?>
            </p>    
        
            <? if( have_rows('highlights', $parent) ): 
            while( have_rows('highlights', $parent) ): the_row();?>                
               
                <p>
                    <img src="<?php the_sub_field('icon');?>"/>
                    <?php the_sub_field('detail');?>
                </p>   
                    
            <?php endwhile; endif;?>    
            
        </div><!--col-->         
        
        <div class="col-8">
        
            <p class="heading heading__sm">
                <?php the_sub_field('heading');?>
            </p>                      
            
            <p>
                <?php the_sub_field('copy');?>
            </p>          
        
        </div><!--col-->        
    
    </div><!--r-->
                       
                <?php endwhile; endif;?>            
    
            </div><!--daily-->
    
             <?php endwhile; endif;?><!--daily loop-->       
    
            <h3 class="heading heading__lg heading__section mt1">Map</h3>
    
			<?php if( have_rows('map', $parent) ):
				
			$map_config = array();
    	
	    	$points = array();
	    	
	    	while( have_rows('map', $parent) ): the_row();
	    	
	    		if(have_rows('settings')): while(have_rows('settings')): the_row();
	    			
	    			$map_config = array(
		    			"center_lat"  => get_sub_field("lat"),
		    			"center_long" => get_sub_field("long"),
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
								get_sub_field("longtitude"),
								get_sub_field("latitude")
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
    
    		        <h3 class="heading heading__lg heading__section mt1">Safari Accommodation</h3>
    		        
    		        <div id="accom" class="safari-accommodation">
    		        
    		        <? if( have_rows('accommodation', $parent) ): 
    		            while( have_rows('accommodation', $parent) ): the_row();?>      
    		
    		            <div class="row">
    		    
    		                 <div class="col-6">
    		    
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
    		                
    		                <div class="col-6">
    		                    
    		                    <?php the_sub_field('copy');?>  
    		                    
    		                </div><!--col-->
    		       
    		            </div><!--r-->
    		
    		        </div><!--accommodation-->
    		
    		         <?php endwhile; endif;?><!--accommodation loop-->       
    		
    		        <h3 class="heading heading__lg heading__section mt1">Extend Your Safari</h3>
    		
    		        <? if( have_rows('extensions_&_activities', $parent) ): 
    		            while( have_rows('extensions_&_activities', $parent) ): the_row();?>      
    		
    		        <div id="extensions" class="extensions mb3">
    		
    		            <? if( have_rows('items', $parent) ): 
    		            while( have_rows('items', $parent) ): the_row();?>                
    		
    		<div class="row">
    		 
    		<div class="col-4">
    		    <h2 class="heading heading__sm"><?php the_sub_field('heading');?></h2> 
    		</div>
    		
    		<div class="col-8">
    		    <p><?php the_sub_field('copy');?></p> 
    		</div> 
    		    
    		</div><!--r-->
    		                        
    		            <?php endwhile; endif;?>
    		
    		        </div><!--extensions-->
    		
    		         <?php endwhile; endif;?><!--extensions loop-->      
    		        
    		    </div>
    		    
    		</div><!--r-->
    		
    </div><!--c-->

</div><!--content-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/stickyfill/1.1.4/stickyfill.min.js"></script>
<?php get_footer(); ?>
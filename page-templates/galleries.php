<?php
/**
 * ============== Template Name: Galleries
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

    <div class="container galleries pt4 pb8" id="mixitup-gallery">
    
        <div class="row mixitup-gallery">
	        
		   <div class="col-12 col-lg-4 col-xl-3 order-sidebar">
			    
			    <div class="sidebar sticky">
		    	
		    		<div class="filter">
				        
				        <div class="title">Filter<div class="collapsible-icon"><i class="fas fa-chevron-right"></i></div></div>
				        
				        <div>
					        <fieldset>
						        
						        <div class="label">Galleries<i class="fas fa-chevron-down"></i></div>
						        
						        <div class="wrapper-radio galleries">
							        
							        <div>
								        <div class="radio control mixitup-control mixitup-control-active" data-filter="all">
									        <input type="radio" value="all" name="gallery-selector" checked/>
											<label>All</label>
								        </div>
							        </div>
							        
						        <?php
		
								$galleries = get_field("galleries");
								
								foreach($galleries as &$gallery):
									
									$className = preg_replace('/[^a-zA-Z0-9]/', '', strtolower($gallery["title"]));
									
									$gallery["className"] = $className;
									
									?>
								    
								    <div>
								        <div class="radio control mixitup-control" data-filter="<?php echo "." . $className; ?>">
									        <input type="radio" value="<?php echo $className; ?>" name="gallery-selector"/>
											<label><?php echo $gallery["title"]; ?></label>
								        </div>
							        </div>
								    
								<?php endforeach; ?>
							        
						        </div>
						        
					        </fieldset>
					    
				        </div>
					    
		    		</div>
			    	
		        </div>
		        
		    </div>
		    
		    <div class="col-12 col-lg-8 col-xl-9 order-content">
				
				<div class="gallery" data-ref="mixitup-container">
					
			    <?php foreach($galleries as &$gallery):
				    
			    $className = $gallery["className"];
			    
			    foreach($gallery["images"] as $image): ?>
					    
					<a href="<?php echo $image['url']; ?>" class="gallery-item mix lightbox-gallery <?php echo $className; ?>"  alt="<?php echo $image['alt']; ?>" style="background-image: url(<?php echo $image['url']; ?>);" data-ref="mixitup-target"></a>
					    
				<?php endforeach; endforeach; ?>
				
				</div>
		    
		    </div>
	    
        </div>
        
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>

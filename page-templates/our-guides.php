<?php
/**
 * ============== Template Name: Our Guides
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

    <div class="container our-guides pt4 pb8">
    
        <div class="row">
	        
		    <div class="col-12 col-lg-4 col-xl-3 sticky-mobile">
			    
			    <div class="sidebar sticky">
		    	
			    	<?php get_template_part('template-parts/this-section');?>
			    	
		        </div>
		        
		    </div>
		    
		    <div class="col-12 col-lg-8 col-xl-9">
	        
			    <?php
				
				$guides = get_terms("guide");
				
				foreach($guides as $guide): ?>
				
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
    						
    						<div class="col-12 col-xl-8">
        						
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
				
				<?php endforeach; ?>
		    
		    </div>
	    
        </div>
        
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>

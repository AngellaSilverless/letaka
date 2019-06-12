<?php
/**
 * ============== Template Name: History
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

    <div class="container history pt4 pb8">
    
        <div class="row">
	        
		    <div class="col-12 col-lg-4 col-xl-3 sticky-mobile">
			    
			    <div class="sidebar sticky">
		    	
			    	<?php get_template_part('template-parts/this-section');?>
			    	
		        </div>
		        
		    </div>
		    
		    <div class="col-12 col-lg-8 col-xl-9">
	        
		        <div class="justify">
			        
			        <?php the_field("content"); ?>
			        
		        </div>
		        
		        <?php
				
				$images = get_field('gallery');
					
				if( $images ): ?>
				
				<div class="gallery mt2">
				
					<?php foreach( $images as $image ): ?>
					
					<a href="<?php echo $image['url']; ?>" class="lightbox-gallery"  alt="<?php echo $image['alt']; ?>" style="background-image: url(<?php echo $image['url']; ?>);"></a>
					
					<?php endforeach; ?>
				
				</div>
				
				<?php endif; ?> 
		    
		    </div>
	    
        </div>
        
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>

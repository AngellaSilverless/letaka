<?php
/**
 * ============== Template Name: Bespoke Experience and Film Location
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

    <div class="container bespoke-film pt4 pb8">
    
        <div class="row">
	        
		    <div class="col-3">
			    
			    <div class="sidebar sticky">
				    
				    <div class="contact-us">
					    
					    <div class="title">Build your safari</div>
					    
					    <?php echo do_shortcode('[contact-form-7 id="2434" title="Contact us directly" html_class="form contact-directly-form"]');?>
					    
				    </div>
			    	
		        </div>
		        
		    </div>
		    
		    <div class="col-9">
	        
		        <div class="main justify">
			        
			        <?php the_field("content"); ?>
			        
		        </div>
		        
		        <?php
				
				$images = get_field('images');
					
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

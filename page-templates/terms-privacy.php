<?php
/**
 * ============== Template Name: Terms and Privacy
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

    <div class="container terms-privacy pt4 pb8">
    
        <div class="row">
	        
		    <div class="col-12 col-lg-4 col-xl-3 order-cta order-cta-only">
		    	
		    	<div class="call-to-action">
			    	
			    	<?php get_template_part("template-parts/cta", "find-safari"); ?>
			    	
			    	<?php get_template_part("template-parts/cta", "find-agent"); ?>
			    	
			    	<?php get_template_part("template-parts/cta", "film-locations"); ?>
			    	
			    	<?php get_template_part("template-parts/cta", "bespoke-experiences"); ?>
			    	
		        </div>
		        
		    </div>
		    
		    <div class="col-12 col-lg-8 col-xl-9 order-content order-content-form">
	        
		        <div class="main justify">
			        
			        <?php the_field("content"); ?>
			        
		        </div>
		    
		    </div>
	    
        </div>
        
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>

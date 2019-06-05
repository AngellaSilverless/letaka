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

    <div class="container galleries pt4 pb8">
    
        <div class="row">
	        
		    <div class="col-3">
			    
			    <div class="sidebar">
		    	
			    	<?php get_template_part('template-parts/this-section');?>
			    	
		        </div>
		        
		    </div>
		    
		    <div class="col-9">
	        
		        <div class="main justify">
			        
			        <?php the_field("content"); ?>
			        
		        </div>
		    
		    </div>
	    
        </div>
        
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>

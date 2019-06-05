<?php
/**
 * ============== Template Name: About Us
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

    <div class="container about-us has-sidebar pt4 pb8">
    
        <div class="sidebar">
	    	
	    	<?php get_template_part('template-parts/this-section');?>
	    	
        </div>
        
        <div class="main justify">
	        
	        <?php the_field("content"); ?>
	        
        </div>
        
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>

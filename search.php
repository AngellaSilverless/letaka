<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package letaka
 */
 
get_header();?>

<!-- ******************* Hero Content ******************* -->

<?php 
	$pageID = get_page_by_path("search");
	
    if( get_field('hero_type', $pageID) == 'image' ): 
        $heroImage = get_field('hero_background_image', $pageID);
    elseif ( get_field('hero_type', $pageID) == 'color' ): 
        $heroColor = get_field('hero_background_colour', $pageID);
    endif;
?>

<div class="hero <?php the_field( 'hero_height' , $pageID); ?>" style="background-image: url(<?php echo $heroImage['url']; ?>);">

	<div class="container">
	
	    <div class="row">
	        
	        <div class="hero__content">
				
				<h1 class="heading heading__xl heading__light center slide-up"><?php the_field( 'hero_heading', $pageID);?></h1>
				
				<div class="heading heading__sm heading__light center slow-fade hero__copy mt1"><?php the_field( 'hero_copy', $pageID );?></div>
	       
	        </div>    
	            
	    </div>
	
	</div>

</div><!--hero-->

<!-- ******************* Hero Content END ******************* -->

    <div class="container search-page pt4 pb8">
    
        <div class="row">
	        
		    <div class="col-12 col-lg-4 col-xl-3 order-cta order-cta-only">
			    
			    <div class="call-to-action">
		    	
			    	<?php get_template_part("template-parts/cta", "find-safari"); ?>
			    	
			    	<?php get_template_part("template-parts/cta", "find-agent"); ?>
			    	
			    	<?php get_template_part("template-parts/cta", "film-locations"); ?>
			    	
			    	<?php get_template_part("template-parts/cta", "bespoke-experiences"); ?>
			    	
		        </div>
		        
		    </div>
		    
		    <div class="col-12 col-lg-8 col-xl-9 order-content">
	        
		        <h3 class="heading heading__lg heading__primary-color brand-line">Your search: <span class="heading__secondary-color"><?php the_search_query(); ?></span></h3>
		    	
		    	<div class="row mt2">
			    	
			    	<div class="col-12 col-xl-10 align-center">
			    	
				    	<?php
					    
					    $search_page = get_page_by_path("search")->ID;
					    	
					    if ( have_posts() ) : while ( have_posts() ) : the_post(); if(get_the_ID() != $search_page): ?>
				    	
				    	<div class="wrapper-news pb4">
								
						<?php
						
							get_template_part('template-parts/search-results');
							
						?>
						
						</div>
					    	
						<?php endif; endwhile; endif; ?>
					
			    	</div>
			    
		    	</div>
		    			    
		    </div>
	    
        </div>
        
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>

<?php
/**
 * The template for displaying all single posts
 *
 * @package letaka
 */
get_header();

while (have_posts()) : the_post(); ?>

<!-- ******************* Hero Content ******************* -->

<div class="content has-hero">
	
<?php $heroImage = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), "full" ); ?>

<div class="hero h50" style="background-image: url(<?php echo $heroImage[0]; ?>);">

	<div class="container">

		<div class="row">
			
			<div class="hero__content">
		
				<h1 class="heading heading__xl heading__light center slide-up"><?php the_title() ;?></h1>
				
				<div class="heading heading__sm heading__light center slow-fade hero__copy mt1"><?php the_date( 'd F Y' );?></div>
	       
	        </div>
	    
		</div>
	
	</div>
		
</div><!--hero-->

<!-- ******************* Hero Content END ******************* -->

    <div class="container page-news pt4 pb8">
	    
	    <div class="row">
	        
		    <div class="col-3">
			    
			    <div class="sidebar sticky">
		    	
			    	<?php get_template_part('template-parts/this-section');?>
			    	
		        </div>
		        
		    </div>
		    
		    <div class="col-9">
	        
		        <div class="main justify">
			        
			        <?php the_content(); ?>
			        
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
				
				<div class="adjacent-posts row mt4">
		        
					<?php
				        $prev_post = get_previous_post();
				        $next_post = get_next_post();
				    ?>
			        
			        <div class="col-6">
				        
				        <?php if( $prev_post ): ?>
			        
				        <a href="<?php echo get_permalink($prev_post->ID); ?>" class="previous-post">
				        
					        <i class="fas fa-chevron-left"></i>
					        
					        <span><?php echo $prev_post->post_title; ?></span>
					        
					    </a>
					    
					    <?php endif; ?>
					
			        </div>
				    
				    <div class="col-6">
				    
				    	<?php if( $next_post ): ?>
				
						<a href="<?php echo get_permalink($next_post->ID); ?>" class="next-post">
					        
					        <span><?php echo $next_post->post_title; ?></span>
							
					        <i class="fas fa-chevron-right"></i>
					        
					    </a>
					
						<?php endif; ?>
					
				    </div>
				
		        </div>

		    
		    </div>
		    
	    </div>
        
    </div><!--c-->

</div><!--content-->

<?php endwhile; 

get_footer(); ?>

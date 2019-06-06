<?php
/**
 * ============== Template Name: Testimonials
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

    <div class="container testimonials pt4 pb8">
    
        <div class="row">
	        
		    <div class="col-3">
			    
			    <div class="sidebar sticky">
		    	
			    	<?php get_template_part('template-parts/this-section');?>
			    	
		        </div>
		        
		    </div>
		    
		    <div class="col-9">
	        
	        <?php
		        
		    $paged = ( get_query_var("paged") ) ? get_query_var("paged") : 1;
		    
		    $row = 0;
		    
			$testimonials_per_page = 10;
			
			$testimonials = get_field("testimonial", "options");
			
			$total = count( $testimonials );
			
			$pages = ceil( $total / $testimonials_per_page );
			
			$min = ( ( $paged * $testimonials_per_page ) - $testimonials_per_page ) + 1;
			
			$max = ( $min + $testimonials_per_page ) - 1;
		    
		    if(have_rows("testimonial", "options")): while(have_rows("testimonial", "options")): the_row(); $row++;
			    
				if($row < $min) { continue; }
				
				if($row > $max) { break; } ?>
					
				<div class="wrapper-testimonial pb3">
				
					<h3 class="heading heading__md heading__primary-color brand-line"><?php the_sub_field("attribution"); ?></h3>
					
					<div class="justify"><?php the_sub_field("testimonial"); ?></div>
				
				</div>
			
			<?php endwhile; ?>
			
			<div class="pagination"><?php 
							
		        echo paginate_links( array(
		            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
		            'total'        => $pages,
		            'current'      => $paged,
		            'format'       => '?paged=%#%',
		            'show_all'     => false,
		            'type'         => 'plain',
		            'end_size'     => 1,
		            'mid_size'     => 1,
		            'prev_next'    => true,
		            'prev_text'    => sprintf( '<i class="fas fa-angle-left"></i>' ),
		            'next_text'    => sprintf( '<i class="fas fa-angle-right"></i>' ),
		            'add_args'     => false,
		            'add_fragment' => '',
		        ) );
			        
			?></div>
			
			<?php endif; ?>
			
		    </div>
	    
        </div>
        
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>

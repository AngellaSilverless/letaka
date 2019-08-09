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
	        
		    <div class="col-12 col-lg-4 col-xl-3 sticky-mobile">
			    
			    <div class="sidebar sticky">
		    	
			    	<?php get_template_part('template-parts/this-section');?>
			    	
		        </div>
		        
		    </div>
		    
		    <div class="col-12 col-lg-8 col-xl-9">
	        <div class="row">
	        <?php
		        
		    $paged = ( get_query_var("paged") ) ? get_query_var("paged") : 1;
		    
		    $row = 0;
		    
			$testimonials_per_page = 10;
			
			$testimonials = get_posts(array(
				'numberposts' => -1,
				'post_type'   => 'testimonial'
			));
			
			$i = 0;
			
			$total = count( $testimonials );
			
			$pages = ceil( $total / $testimonials_per_page );
			
			$min = ( ( $paged * $testimonials_per_page ) - $testimonials_per_page ) + 1;
			
			$max = ( $min + $testimonials_per_page ) - 1;
		    
		    foreach($testimonials as $testimonial): $row++;
			    
				if($row < $min) { continue; }
				
				if($row > $max) { break; } ?>
					
				<div class="wrapper-testimonial col-11 col-lg-9 pb3">
				
				    <i class="fas fa-quote-left"></i>
							
					<div class="wrapper-testimonial__content">		
							
					<div class="justify mb1"><?php echo get_field("testimonial", $testimonial->ID); ?></div>
					
					<h3 class="heading heading__md heading__primary-color mb0"><?php echo $testimonial->post_title; ?></h3>
					
					<p><?php
						$attr = array();
						array_push($attr, get_field("attribution_location", $testimonial->ID));
						array_push($attr, get_field("attribution_date", $testimonial->ID));
						echo implode(", ", $attr);
					?></p>	
					
					</div>
										
				</div>
					
			<?php endforeach; ?>
			</div>
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
			
		    </div>
	    
        </div>
        
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>

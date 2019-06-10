<?php
/**
 * ============== Template Name: News
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

    <div class="container news pt4 pb8">
    
        <div class="row">
	        
		    <div class="col-3">
			    
			    <div class="sidebar sticky">
		    	
			    	<?php get_template_part('template-parts/this-section');?>
			    	
			    	<?php get_template_part('template-parts/post-categories');?>
			    	
		        </div>
		        
		    </div>
		    
		    <div class="col-9">
			    
			    <div class="col-10 align-center">
	        
			        <?php
				    
				    $category = $_GET['category_name'];
				    
					$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					
					$query = new WP_Query( array(
						'posts_per_page' => 5,
						'paged' => $paged,
						'category_name' => $category
					) );
					
					if ( $query->have_posts() ): while ( $query->have_posts() ) : $query->the_post(); ?>
					
						<div class="wrapper-news pb4">
						
						<?php
							
							set_query_var('newsletter', false);
						
							get_template_part('template-parts/news');
							
						?>
						
						</div>
		
					<?php endwhile;  ?>
			    
				    <div class="pagination"><?php 
							
				        echo paginate_links( array(
				            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
				            'total'        => $query->max_num_pages,
				            'current'      => max( 1, get_query_var( 'paged' ) ),
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
			
			<? wp_reset_postdata(); endif; ?>
		    
		    </div>
	    
        </div>
        
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>

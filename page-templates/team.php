<?php
/**
 * ============== Template Name: Team
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

    <div class="container our-team pt4 pb8">
	    
	    <div class="row">
	        
		    <div class="col-3">
			    
			    <div class="sidebar sticky">
		    	
			    	<?php get_template_part('template-parts/this-section');?>
			    	
		        </div>
		        
		    </div>
		    
		    <div class="col-9">
	        
			    <div class="row">
			    
			    <?php if(have_rows("team")): while(have_rows("team")): the_row(); ?>
		
				    <div class="col-6">
					    
					    <div class="row wrapper-team ml1 mr1 mb2">
						    
				    		<div class="img mr1" style="background:url(<?php echo get_sub_field("image")["url"]; ?>);"></div>
				    
						    <div class="info">
							    
							    <div class="main pb1">
								    
								    <span class="name heading heading__primary-color"><?php the_sub_field("name"); ?></span>
								    
									<span class="role"><?php the_sub_field("job_role"); ?></span>
								
							    </div>
							    
							    <div class="contact">
								    
								    <?php
									    
									$phone = get_sub_field("contact");
									$email = get_sub_field("email");
									
									?>
								    
								    <a <?php if($phone) echo "href='tel:$phone'"; ?> class="phone"><?php echo $phone; ?></a> | 
								    
								    <a <?php if($email) echo "href='tel:$email'"; ?>class="email"><?php echo $email; ?></a>
								
							    </div>
							
						    </div>
						    
					    </div>
					    
				    </div>
			    
			    <?php endwhile; endif; ?>
			    
		    	</div>
			    
		    </div>
		    
	    </div>
	    
	</div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>
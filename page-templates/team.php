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
	        
		    <div class="col-12 col-lg-4 col-xl-3 sticky-mobile">
			    
			    <div class="sidebar sticky">
		    	
			    	<?php get_template_part('template-parts/this-section');?>
			    	
		        </div>
		        
		    </div>
		    
		    <div class="col-12 col-lg-8 col-xl-9">
	        
			    <div class="row">
			    
			    <?php if(have_rows("team")): while(have_rows("team")): the_row(); ?>
		
				    <div class="col-12 col-md-6 col-lg-12 col-xl-6">

                        <div class="team-member">
                        
                            <div class="content">
                            
                        <h2 class="name heading heading__sm heading__primary-color mb0"><?php the_sub_field("name"); ?></h2>
                        								    
                        <p class="role"><?php the_sub_field("job_role"); ?></p>
                        															    
                         <div class="contact">
                        								    
                        <?php
                        
                        $phone = get_sub_field("contact");
                        $email = get_sub_field("email");
                        
                        ?>
                        
                        <a <?php if($phone) echo "href='tel:$phone'"; ?> class="phone"><?php echo $phone; ?></a>                        
                        <a <?php if($email) echo "href='tel:$email'"; ?>class="email"><?php echo $email; ?></a>
                        								
                        </div>    
                            
                        </div>
                        
                            <div class="img" style="background:url(<?php echo get_sub_field("image")["url"]; ?>);"></div>
                        
                        </div><!--team member-->
					    
                    </div><!--col-->
			    
			    <?php endwhile; endif; ?>
			    
		    	</div>
			    
		    </div>
		    
	    </div>
	    
	</div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>
<?php
/**
 * ============== Template Name: Enquire Now
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

    <div class="container about-us pt4 pb8">
    
        <div class="row">
	        
		    <div class="col-12 col-lg-4 col-xl-3 order-sidebar order-sidebar-form">
			    
			    <div class="sidebar sticky">
		    	
			    	<div class="our-details mb2">
				    	
				    	<div class="title">Our Details</div>
				    	
			    		<?php
				    	
				    	$telephone = get_field("main_telephone", "options");
				    	$email     = get_field("main_email", "options");
				    	
				    	?>
				    
				    	<div class="item"><a class="contact" href="tel:<?php echo $telephone; ?>"><?php echo $telephone; ?></a></div>
				    	
				    	<div class="item"><a class="contact" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
				    	
				    	<div class="item">
					    	
					    	<div class="socials"><?php if( have_rows('social_links', 'option') ): while( have_rows('social_links', 'option') ): the_row(); ?>

	                        	<a href="<?php the_sub_field('page_link'); ?>"><i class="fab fa-<?php the_sub_field('name'); ?>"></i></a>
	    
							<?php endwhile; endif; ?>
	                        
				    		</div>
				    		
				    	</div>
				    	
			    	</div>
			    	
			    	<div class="operations mb2">
				    	
				    	<div class="title">Botswana Operations</div>
				    	
				    	<div class="item-standard"><?php the_field("botswana_operations", "options"); ?></div>
				    	
			    	</div>
			    	
			    	<div class="representatives mb2">
				    	
				    	<div class="title">Representatives</div>
					    	
					    	<?php foreach(get_field("representatives", "options") as $representative): ?>
						    	
						    	<div class="item-wrapper">
							    	
							    	<div class="item"><?php echo $representative["title"]; ?></div>
							    	
							    	<div class="item-expand">
								    	
								    	<div class="item-standard">
									    	
									    	<?php foreach($representative["info"] as $rep): ?>
									    	
									    	<div class="wrapper-expand">
									    	
									    		<?php if($rep["name"]): ?>
									    		<div><?php echo $rep["name"]; ?></div>
									    		<?php endif; ?>
									    		
									    		<?php if($rep["email"]): ?>
									    		<div><a href="mailto:<?php echo $rep["email"]; ?>"><?php echo $rep["email"]; ?></a></div>
									    		<?php endif; ?>
									    		
									    		<?php if($rep["telephone"]): ?>
									    		<div><a href="tel:<?php echo $rep["telephone"]; ?>"><?php echo $rep["telephone"]; ?></a></div>
									    		<?php endif; ?>
										    
									    	</div>
									    	
									    	<?php endforeach; ?>
									    	
								    	</div>
								    
							    	</div>
							    
						    	</div>
					    	
					    	<?php endforeach; ?>
				    	
			    	</div>
			    	
			    	<?php get_template_part("template-parts/cta", "find-agent"); ?>
			    	
		        </div>
		        
		    </div>
		    
		    <div class="col-12 col-lg-8 col-xl-7 order-content">
	        
		        <div class="contact-us">
					    
				    <h2 class="heading heading__primary-color heading__md brand-line mb1">Contact Us</h2>
				    
				    <?php echo do_shortcode('[contact-form-7 id="2508" title="Contact us directly" html_class="form main-enquire-form"]');?>
				    
			    </div>
		    
		    </div>
	    
        </div>
        
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>

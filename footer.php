<?php
/**
 * The template for displaying the footer
 * @package letaka
 */
?>

</main>

    <footer class="footer">

		<div class="pre-socket">
		    
		    <div class="container">
			    
			    <div class="row">
				    
				    <div class="col-12 col-lg-9 col-xl-8">
		    
				        <div class="quick-contact pt3 pb3">
				            
				            <h3 class="heading heading__light font100 mb1">Quick Contact</h3>
				            
				            <div class="content">
					            
				                <p><?php the_field('main_telephone', 'options');?></p>
				                <p><?php the_field('main_email', 'options');?></p>
				                
				                <?php if( have_rows('social_links', 'option') ): while( have_rows('social_links', 'option') ): the_row(); ?>
		    
		                        <a href="<?php the_sub_field('page_link'); ?>"><i class="fab fa-<?php the_sub_field('name'); ?>"></i></a>
		    
		                        <?php endwhile; endif; ?>
		                        
		                        <div><div class="button button__transparent-light mt1 mr1 font1 modal-toggle newsletter-signup" href="">Newsletter Sign Up</div></div>
				            
				            </div>
				            
				            <div>
				            
				                <?php echo do_shortcode('[contact-form-7 id="2352" title="Quick Contact" html_class="form quick-contact-form"]');?>
				            
				            </div>
				
				        </div>
				        
				    </div>
				    
				    <div class="col-12 col-lg-3 col-xl-4 pl6 wrapper-quick-links">
			        
				        <div class="quick-links pt3 pb3">
				                
				            <h3 class="heading heading__light font100 mb1">Quick Links</h3>
				            
				            <div class="content">
					            
					            <div class="row">
					            
						            <div class="col-6">
						            <?php wp_nav_menu( array(
					                    'theme_location' => 'footer-countries',
					                    'container_class' => 'menu-footer-countries' ) );
			                    	?>
						            </div>
			                    	
			                    	<div class="col-6">
			                    	<?php wp_nav_menu( array(
					                    'theme_location' => 'footer-pages',
					                    'container_class' => 'menu-footer-pages' ) );
			                    	?>
			                    	</div>
			                    
					            </div>
					            
				            </div>
							
				        </div>
				        
				    </div>
		        
			    </div>
		    
		    </div><!--c-->
		
		</div>
    
        <div class="socket">
	            
	        <div class="container">
     
                <div class="row">

                    <div class="col-12 col-sm-4 socket__colophon">
                        
                        &copy; Letaka <?php echo date ('Y');?>
    
                        <a href="<?php echo home_url() . '/terms-conditions'; ?>">Terms</a>
    
                        <a href="<?php echo home_url() . '/privacy-policy'; ?>">Privacy</a>
    
                    </div>

                    <div class="col-12 col-sm-4">
                        
                        <div class="logo-holder">
                            
                            <a href="https://silverless.co.uk">
                                
                                <?php get_template_part('inc/img/silverless', 'logo');?>
                            
                            </a>
                        
                        </div>
    
                    </div>
    
                    <div class="col-12 col-sm-4 socials">
    
                        <?php if( have_rows('social_links', 'option') ): while( have_rows('social_links', 'option') ): the_row(); ?>
    
                        <a href="<?php the_sub_field('page_link'); ?>"><i class="fab fa-<?php the_sub_field('name'); ?>"></i></a>
    
                        <?php endwhile; endif; ?>
    
                    </div>
                    
                    <div class=
    
                </div><!--row-->
    
            </div><!--socket-->
    
        </div><!--container-->
    
    </footer>
    
    </div><!-- #page -->

    <?php wp_footer(); ?>
    
    </body>
    
</html>

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
		    
		        <div class="quick-contact pt3 pb3">
		            
		            <h3 class="heading mb1">Quick Contact</h3>
		            
		            <div class="content">
			            
		                <p><?php the_field('main_telephone', 'options');?>fdfdfd</p>
		                <p><?php the_field('main_email', 'options');?>fdfddfd</p>
		            
		            </div>
		            
		            <div>
		            
		                <?php echo do_shortcode('[contact-form-7 id="2352" title="Quick Contact" html_class="form quick-contact-form"]');?>
		            
		            </div>
		
		        </div><!--r-->
		        
		        <div class="quick-links pt3 pb3">
		                
		            <h3 class="heading mb1">Quick Links</h3>
		            
		            <div class="content">
			            
		            </div>
					
		        </div><!--r-->
		    
		    </div><!--c-->
		
		</div>
    
        <div class="socket">
	            
	        <div class="container">
     
                <div class="row">

                    <div class="col-4 socket__colophon">
                        
                        &copy; Letaka <?php echo date ('Y');?>
    
                        <a href="<?php echo home_url() . '/terms-conditions'; ?>">Terms</a>
    
                        <a href="<?php echo home_url() . '/gdpr-policy'; ?>">Privacy</a>
    
                    </div>

                    <div class="col-4">
                        
                        <div class="logo-holder">
                            
                            <a href="https://silverless.co.uk">
                                
                                <?php get_template_part('inc/img/silverless', 'logo');?>
                            
                            </a>
                        
                        </div>
    
                    </div>
    
                    <div class="col-4 socials">
    
                        <?php if( have_rows('social_links', 'option') ): while( have_rows('social_links', 'option') ): the_row(); ?>
    
                        <a href="<?php the_sub_field('page_link'); ?>"><i class="fab fa-<?php the_sub_field('name'); ?>"></i></a>
    
                        <?php endwhile; endif; ?>
    
                    </div>
    
                </div><!--row-->
    
            </div><!--socket-->
    
        </div><!--container-->
    
    </footer>
    
    </div><!-- #page -->

    <?php wp_footer(); ?>
    
    </body>
    
</html>

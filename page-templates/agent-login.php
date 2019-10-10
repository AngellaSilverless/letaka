<?php
/**
 * ============== Template Name: Agent Login
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

    <div class="container agent-specials find-safari pt4 pb8">
    
        <div class="row">
	        
		    <div class="col-12 col-lg-4 col-xl-3 order-sidebar order-sidebar-form">

			    <div class="sidebar">
			    	
			    	<div class="contact-us sticky">
					    
					    <div class="title">Can we help further?</div>
					    
					    <?php echo do_shortcode('[contact-form-7 id="2434" title="Contact us directly" html_class="form contact-directly-form"]');?>
					    
				    </div>
			    	
		        </div>
		        
		    </div>
		    
		    <div class="col-12 col-lg-8 col-xl-7 order-content order-content-form contact-us">
	        
		        <div class="form-wrapper form">
					    
				    <h2 class="heading heading__primary-color heading__md brand-line mb1">Login</h2>
				    
				    <form action="#" autocomplete="off" id="agent-login-form">
					    
					    <div class="input-wrapper">
						    <label for="login-username">Username</label>
							<input type="text" name="login-username" id="login-username" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
							<span role="alert" class="wpcf7-not-valid-tip error-username" style="display: none"></span>
					    </div>
					    
					    <div class="input-wrapper">
							<label for="login-password">Password</label>
							<input type="password" name="login-password" id="login-password" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
							<span role="alert" class="wpcf7-not-valid-tip error-password" style="display: none"></span>
					    </div>
					    
					    <div class="submit-button">
					    	<button type="submit" id="agent-submit" class="button submit">Submit</button>
					    </div>
					    
					    <div class="wpcf7-response-output wpcf7-display-none wpcf7-validation-errors error-all" role="alert" style="display: none;"></div>
					</form>
				    
			    </div>
		    
		    </div>
	    
        </div>
        
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>

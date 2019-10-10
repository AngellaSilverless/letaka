<?php
/**
 * ============== Template Name: Travel Information
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

    <div class="container travel-info pt4 pb8">
    
        <div class="row">
	        
		    <div class="col-12 col-lg-4 col-xl-3 order-sidebar order-sidebar-form">

			    <div class="sidebar">
		    	
			    	<div class="downloads mb2">
				    	
				    	<div class="title">Downloads</div>
				    	
				    	<div class="wrapper-items">
				    	
				    	<?php
					    	
					    $downloads = get_field("downloads");
					    
					    foreach($downloads as $download): $file = $download["file"]?>
					    
					    	<div class="item">
						    	
						    	<a class="pdf-wrapper" href="<?php echo $file["url"]; ?>" target="_blank">
							    	
							    	<i class="fas fa-file-pdf"></i>
							    	
							    	<div><?php echo $download["file_name"]; ?></div>
							    	
							    </a>
							    
					    	</div>
					    
					    <?php endforeach; ?>
					    
				    	</div>
				    	
			    	</div>
			    	
			    	<div class="contact-us sticky">
					    
					    <div class="title">Can we help further?</div>
					    
					    <?php echo do_shortcode('[contact-form-7 id="2434" title="Contact us directly" html_class="form contact-directly-form"]');?>
					    
				    </div>
			    	
		        </div>
		        
		    </div>
		    
		    <div class="col-12 col-lg-8 col-xl-7 order-content order-content-form">
	        
		        <div class="main justify mb2">
			        
			        <?php the_field("content"); ?>
			        
		        </div>
		        
		        <div class="faq">

			        <h2 class="heading heading__primary-color heading__md brand-line mb1">Frequently Asked Questions</h2>

			    <?php
				    
				$faqs = get_field("faq");
				
				$count = 0;
				
				foreach($faqs as $faq): ?>
				
					<div class="wrapper-questions">
						
						<div class="question <?php if($count == 0) echo " opened"; ?>"><?php echo $faq["question"]; ?><i class="fas fa-chevron-right"></i></div>
						
						<div class="answer" style="<?php if($count > 0) echo "display:none;"; ?>"><?php echo $faq["answer"]; ?></div>
					
					</div>
				  
				<?php $count++; endforeach; ?>
			        
		        </div>
		    
		    </div>
	    
        </div>
        
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>

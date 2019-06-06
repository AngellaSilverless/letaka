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
	        
		    <div class="col-3">
			    
			    <div class="sidebar sticky">
		    	
			    	
			    	
		        </div>
		        
		    </div>
		    
		    <div class="col-9">
	        
		        <div class="main justify mb2">
			        
			        <?php the_field("content"); ?>
			        
		        </div>
		        
		        <div class="faq">
			        
			    <?php
				    
				$faqs = get_field("faq");
				
				$count = 0;
				
				foreach($faqs as $faq): ?>
				
					<div class="wrapper-questions">
						
						<div class="question heading heading__sm <?php if($count == 0) echo " opened"; ?>"><?php echo $faq["question"]; ?><i class="fas fa-chevron-right"></i></div>
						
						<div class="answer" style="<?php if($count > 0) echo "display:none;"; ?>"><?php echo $faq["answer"]; ?></div>
					
					</div>
				  
				<?php $count++; endforeach; ?>
			        
		        </div>
		    
		    </div>
	    
        </div>
        
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>

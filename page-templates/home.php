<?php
/**
 * ============== Template Name: Home Page
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

    <div class="container">
		
		<div class="our-safaris">
			
			<h2 class="heading heading__lg heading__primary-color font700 pt2 brand-line center">Our Safaris</h2>
			
			<div class="wrapper-actions mt4">
				
				<?php $actions = get_field("our_safaris")["action"];
				
				foreach ($actions as $action): $backgroundImage = $action["background_image"]; ?>
				
				<div style="background: url(<?php echo $backgroundImage["url"]; ?>);">
					
					<div class="circle"></div>
					
					<h3 class="heading heading__light size3 center"><?php echo $action["title"]; ?></h3>
					
					<div class="wrapper-buttons"><a class="button" href="<?php echo $action["button_target"]; ?>"><?php echo $action["button_text"]; ?></a></div>
					
				</div>
						
				<?php endforeach; ?>
			
			</div>
			
		</div>
		
		<div class="why-letaka">
			
			<h2 class="heading heading__lg heading__primary-color font700 pt2 brand-line center">Why Letaka</h2>
			
			<div class="wrapper-actions mt4">
				
				<?php $actions = get_field("why_letaka")["action"];
				
				foreach ($actions as $action): $backgroundImage = $action["background_image"]; ?>
				
				<div style="background: url(<?php echo $backgroundImage["url"]; ?>);">
					
					<div class="circle"></div>
					
					<h3 class="heading heading__light size3 center"><?php echo $action["title"]; ?></h3>
					
					<div class="wrapper-buttons"><a class="button" href="<?php echo $action["button_target"]; ?>"><?php echo $action["button_text"]; ?></a></div>
					
				</div>
						
				<?php endforeach; ?>
			
			</div>
			
		</div>
		
		<div class="block h25">
			
			<h2 class="heading heading__lg heading__primary-color font700 pt2 brand-line center">Latest</h2>
			
			<div>BLOCK</div>
			
		</div>
		
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>

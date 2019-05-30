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
			
			<div class="wrapper-selectors mt4">
				
				<?php $actions = get_field("why_letaka")["action"];
					
				$count = 0;
					
				foreach ($actions as $action): ?>
				
				<div class="selector <?php if($count == 0) echo " active"; ?>" name="div-<?php echo $count; ?>">
					
					<div class="circle-red"></div>
					
					<div class="heading heading__primary-color heading__md center arrow"><?php echo $action["label"]; ?></div>
					
				</div>
				
				<?php $count++; endforeach; ?>
			
			</div>
			
			<div class="wrapper-actions mt2">
				
				<?php
				
				$count = 0;
					
				foreach ($actions as $action):
				
				$backgroundImage = $action["background_image"]; ?>
				
				<div class="action div-<?php echo $count; if($count == 0) echo " active"; ?>">
					
					<div class="img" style="background: url(<?php echo $backgroundImage["url"]; ?>);"></div>
					
					<div class="content">
						
						<h3 class="heading heading__light size2 brand-line-light"><?php echo $action["title"]; ?></h3>
					
						<div class="description pt1 pb2"><?php echo $action["description"]; ?></div>
						
						<div class="wrapper-buttons"><a class="button" href="<?php echo $action["button_target"]; ?>"><?php echo $action["button_text"]; ?></a></div>
					</div>
					
				</div>
						
				<?php $count++; endforeach; ?>
			
			</div>
			
		</div>
		
		<div class="block h25">
			
			<h2 class="heading heading__lg heading__primary-color font700 pt2 brand-line center">Latest</h2>
			
			<div>BLOCK</div>
			
		</div>
		
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>

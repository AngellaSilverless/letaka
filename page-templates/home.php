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
		
		<div id="more" class="our-safaris wrapper-section wrapper-section__home">
			
			<h2 class="heading heading__lg heading__primary-color heading__section font700 pt2 brand-line center">Our Safaris</h2>
			
			<div class="wrapper-actions mt4">
				
				<div class="row">
				
					<?php $actions = get_field("our_safaris")["action"];
					
					foreach ($actions as $action): 
					$backgroundImage = $action["background_image"];
					$safariIcon = $action['icon']; 
					 ?>
					
					<div class="col-12 col-sm-6 col-xl-4">
					
						<div class="wrapper">
							
							<a href="<?php echo $action["button_target"]; ?>">
    							<div class="background-image" style="background: url(<?php echo $backgroundImage["url"]; ?>);"></div>
    				        </a>
							
							<div class="circle">
    							<?php echo file_get_contents($safariIcon['url']); ?>
							</div>
							
							<h3 class="heading heading__light size3 center"><?php echo $action["title"]; ?></h3>
							
							<div class="wrapper-buttons"><a class="button" href="<?php echo $action["button_target"]; ?>"><?php echo $action["button_text"]; ?></a></div>
							
						</div>
					
					</div>
							
					<?php endforeach; ?>
				
				</div>
			
			</div>
			
		</div>
		
		<div class="why-letaka wrapper-section wrapper-section__home">
			
			<h2 class="heading heading__lg heading__primary-color heading__section font700 mb0 pt2 brand-line center">Why Letaka</h2>
			
			<div class="row">
				
				<div class="col-12 col-lg-10 col-xl-8 margin-auto">
			
					<div class="wrapper-selectors mt4">
						
						<div class="row">
						
							<?php $actions = get_field("why_letaka")["action"];
								
							$count = 0;
								
							foreach ($actions as $action): 
							$whyIcon = $action['icon']; 
							?>
							
							<div class="col-3">
								
								<div class="selector <?php if($count == 0) echo " active"; ?>" name="div-<?php echo $count; ?>">
									
									<div class="circle-red">
    									<?php echo file_get_contents($whyIcon['url']); ?>
									</div>
									
									<div class="heading heading__primary-color heading__xs heading__alt-font heading__caps center arrow"><span><?php echo $action["label"]; ?></span></div>
									
								</div>
							
							</div>
							
							<?php $count++; endforeach; ?>
						
						</div>
					
					</div>
				
					<div class="wrapper-actions mt2">
						
						<?php
						
						$count = 0;
							
						foreach ($actions as $action):
						
						$backgroundImage = $action["background_image"]; ?>
						
						<div class="action div-<?php echo $count; if($count == 0) echo " active"; ?>">
							
							<div class="img" style="background: url(<?php echo $backgroundImage["url"]; ?>);"></div>
							
							<div class="content">
								
								<h3 class="heading heading__md brand-line"><?php echo $action["title"]; ?></h3>
							
								<div class="description pt1 pb2"><p><?php echo $action["description"]; ?></p></div>
								
								<div class="wrapper-buttons"><a class="button" href="<?php echo $action["button_target"]; ?>"><?php echo $action["button_text"]; ?></a></div>
							</div>
							
						</div>
								
						<?php $count++; endforeach; ?>
					
					</div>
				
				</div>
			
			</div>
			
		</div>
		
		<div class="latest-news wrapper-section wrapper-section__home">
			
			<h2 class="heading heading__lg heading__primary-color heading__section font700 pt2 brand-line center">Latest</h2>
			
			<div class="row">
				
				<div class="col-12 col-lg-10 col-xl-8 margin-auto">
			
					<div class="wrapper-news pt2 pb6">
						<?php
							
						$news = get_posts(
				        	array(
				            	'post_type'      => 'post',
				            	'posts_per_page' => 1,
				            	'orderby'        => 'date',
				                'order'          => 'DESC'
							)
						);
						
						if($news): foreach($news as $post): setup_postdata($post);
						
							set_query_var('newsletter', true);
							
							get_template_part('template-parts/news');
						
						endforeach; wp_reset_postdata(); endif;
						
						?>
						
					</div>
				
				</div>
				
			</div>
			
		</div>
		
    </div><!--c-->
    
    <div class="home-gallery gallery pt2 mb0">

	<?php 
		
	$images = get_field('gallery');
	
	if( $images ): ?>
	
	    <?php foreach( $images as $image ): $url = $image['url']; ?>
	    
	    <a href="<?php echo $image['url']; ?>" style='background-image: url(<?php echo $url; ?>)'></a>
	    
	    <?php endforeach; ?>
	    
	    
	<?php endif; ?>
	
	</div>

</div><!--content-->
 
<?php get_footer(); ?>

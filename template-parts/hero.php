<?php 
	
    if( get_field('hero_type') == 'image' ): 
        $heroImage = get_field('hero_background_image');
    elseif ( get_field('hero_type') == 'color' ): 
        $heroColor = get_field('hero_background_colour');
    endif;
?>

<?php 
    if( get_field('hero_type') !== 'slider'):
?>

    <div class="hero <?php the_field( 'hero_height' ); if(is_front_page()) echo ' hero__home'; ?>" style="background-image: url(<?php echo $heroImage['url']; ?>); background-color: <?php echo $heroColor; ?>;">

	<?php if ( is_front_page() ): ?>
	
    <div class="container">
			
		<div class="hero__content">
			
			<div>
			
				<img class="slide-right" src="<?php echo get_template_directory_uri() . "/inc/img/letaka-logo.svg"; ?>">
				
				<h1 class="heading heading__xxl heading__light center slide-down"><?php the_field( 'hero_heading' );?></h1>
			
			</div>
			
			<div>

				<div class="video-icon mt1 mb1 slow-fade"><i class="fas fa-video"></i></div>
				
				<div class="heading heading__light center slow-fade hero__copy mb2"><?php the_field( 'hero_copy' );?></div>
				
				<?php if( have_rows('button') ): ?>

				<div class="action_buttons">
			
					<?php $count = 0;
						
					while( have_rows('button') ): the_row(); ?>
						
					<a class="button slide-up <?php if($count > 0) echo "button__transparent-light"; ?>" href="<?php the_permalink(get_sub_field("button_target")); ?>"><?php the_sub_field("button_text"); ?></a>
				
					<?php $count++; endwhile; ?>
			
				</div>
			
				<?php endif; ?>
				
			</div>
       
        </div>
    
    </div>
			
    <?php else: ?>
    
    <div class="container container__bottom">
        
        <div class="hero__content">
			
			<h1 class="heading heading__xxl heading__light center slide-up"><?php the_field( 'hero_heading' );?></h1>
			
			<div class="heading heading__sm heading__light center slow-fade hero__copy"><?php the_field( 'hero_copy' );?></div>
       
        </div>
        
        <?php endif; ?>       
                
    </div>
    
</div><!--hero-->

<?php endif;?>


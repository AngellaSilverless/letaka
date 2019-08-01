<?php 
	
    if( get_field('hero_type') == 'image' ): 
        $heroImage = get_field('hero_background_image');
    elseif ( get_field('hero_type') == 'color' ): 
        $heroColor = get_field('hero_background_colour');
    endif;
?>

<div class="hero <?php the_field( 'hero_height' ); if(is_front_page()) echo ' hero__home'; ?>" style="background-image: url(<?php echo $heroImage['url']; ?>);">

<div class="container">

    <div class="row">

        <?php if ( is_front_page() ): ?>
        
			<div class="col-12 col-sm-8 offset-0 offset-sm-2">
                <div class="hero__content">
			
			<div>
			
				<img class="slide-down img-logo" src="<?php echo get_template_directory_uri() . "/inc/img/letaka-logo.svg"; ?>">
				
				<h1 class="heading heading__xl heading__light"><?php the_field( 'hero_heading' );?></h1>
			
			</div>
			
			<div>
			
				<div class="video-icon mt1 mb1 slow-fade"><i class="play-video fas fa-caret-square-right"></i></div>
				
				<div class="heading__light slow-fade hero__copy font300 mb2"><?php the_field( 'hero_copy' );?></div>
				
				<?php if( have_rows('button') ): ?>

				<div class="action_buttons">
			
					<?php $count = 0;
						
					while( have_rows('button') ): the_row(); ?>
						
					<a class="button slide-up <?php if($count > 0) echo "button__transparent-light"; ?>" href="<?php the_sub_field("button_target"); ?>"><?php
						the_sub_field("button_text");
					?></a>
				
					<?php $count++; endwhile; ?>
			
				</div>
			
				<?php endif; ?>
				
			</div>
       
        </div>
			</div>
			
        <?php else: ?>
        
        	<div class="col-12 col-sm-9 offset-0 offset-sm-3">
                <div class="hero__content">
		
		<h1 class="heading heading__xl heading__light slide-up"><?php the_field( 'hero_heading' );?></h1>
		
		<div class="heading__light slow-fade hero__copy mt1"><?php the_field( 'hero_copy' );?></div>
   
    </div>
            </div>
            
        <?php endif; ?>       
        
    </div>

</div>

<div class="separator-wrapper">

    <div class="container">
    
    <div class="row">
        
        <div class="col-3">
            <div class="separator-device left"></div>            
        </div>

        <div class="col-9">
            <div class="separator-device right"></div>            
        </div>
        
    </div>
            
</div>

</div>

</div><!--hero-->

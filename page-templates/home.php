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
		
		<div class="block">
			
			<h2 class="heading heading__lg heading__primary-color font700 pt2 brand-line center">Our Safaris</h2>
			
			<?php var_dump(get_field("our_safaris")); ?>
			
		</div>
		
		<div class="block h25">
			
			<h2 class="heading heading__lg heading__primary-color font700 pt2 brand-line center">Why Letaka</h2>
			
			<div>BLOCK</div>
			
		</div>
		
		<div class="block h25">
			
			<h2 class="heading heading__lg heading__primary-color font700 pt2 brand-line center">Latest</h2>
			
			<div>BLOCK</div>
			
		</div>
		
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>

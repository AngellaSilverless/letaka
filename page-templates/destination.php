<?php
/**
 * ============== Template Name: Destination Page
 *
 * @package letaka
 */
get_header();?>

<!-- ******************* Hero Content ******************* -->

<div class="content has-hero">

<?php if( get_field('hero_background_image') ): 

    get_template_part('template-parts/hero');?>

<?php endif;?>

    <div class="container">
    
        <div class="row">
            
            <div class="col-4 sidebar mt3">
                
                <div class="sticky">
                
                <div class="title">Countries</div>
                
                        <?php wp_nav_menu( array(
            'theme_location' => 'destinations',
            'menu_class' => 'destination sidebar-menu' ) );
        ?>
                </div>
                
            </div><!--col-->
            
            <div class="col-8 mt3">

<?php

foreach( get_terms( 'destinations', array( 'hide_empty' => false, 'parent' => 0 ) ) as $parent_term ) {?>

<div id="<?php echo strtolower($parent_term->name);?>" class="destination-wrapper">

<?php if( have_rows('country_fields', $parent_term) ): 
while( have_rows('country_fields', $parent_term) ): the_row();?>
 
    <div class="country-wrapper">
    
        <h2 class="heading heading__md heading__section mb1"><?php echo $parent_term->name;?></h2>
        
        <div class="row">
            
            <div class="col-4">
                <img src="<?php the_sub_field('map', $parent_term);?>"/>                
            </div>

            <div class="col-8">
                
                <?php the_sub_field( 'text_block_text', $parent_term );?>

                <h2 class="heading heading__sm mt2 mb1">Seasons in <?php echo $parent_term->name;?></h2>
    
                <div class="season">
                    
                  <?php if( have_rows('location_seasons', $term) ): 
                    while( have_rows('location_seasons', $term) ): the_row();
                    get_template_part( 'template-parts/seasons');
                    endwhile; endif; ?>
                    
                </div>
    
                <div class="season-key">
                    <p>Key</p>
                    <div class="high">High</div>
                    <div class="good">Good</div>
                    <div class="low">Low</div>        
                </div>

            </div>

        </div><!--row-->

    
    </div><!--country-wrapper-->
    
<?php endwhile; endif; ?>
     
<? foreach( get_terms( 'destinations', array( 'hide_empty' => false, 'parent' => $parent_term->term_id ) ) as $child_term ) {

if( have_rows('region_fields', $child_term) ): 
while( have_rows('region_fields', $child_term) ): the_row();?>

    <div class="region-wrapper">

        <div class="toggle country">

            <div class="toggle__question" role="tab">    
              <p class="headingSupporting headingSupporting__sm">
                <?php echo $child_term->name;?>
                <i class="fas fa-chevron-right"></i>
              </p>
            </div>

            <div class="toggle__answer" role="tabpanel">

            <div class="row">
                
                <div class="col-4">
                    
                    <?php
                    $images = get_sub_field('images');
                    if( $images ): ?>
                
                        <div class="gallery region">
                
                        <?php foreach( $images as $image ): ?>
                
                        <a href="<?php echo $image['url']; ?>" class="lightbox-gallery"  alt="<?php echo $image['alt']; ?>" style="background-image: url(<?php echo $image['url']; ?>);"><!--<?php echo $image['caption']; ?>--></a>
                
                        <?php endforeach; ?>
                
                        </div>
                
                    <?php endif; ?>      
                    
                </div>
                
                
                <div class="col-8">
                    
                    <div class="expanding-copy">

                    <div class="expanding-copy__lead">
                    
                        <p><?php the_sub_field( 'copy_main', $child_term);?></p>
                    
                    </div>
                    
                    <?php if( get_sub_field('copy_read_more', $child_term) ): ?>
                    
                        <a class="trigger-expand">Read More</a>    
                    
                    <?php endif; ?>
                    
                    <div class="expanding-copy__more">
                    
                        <p><?php the_sub_field('copy_read_more', $child_term); ?></p>          
                    
                    </div>    
                    
                    <?php if( get_sub_field('copy_read_more', $child_term) ): ?>
                    
                        <a class="trigger-collapse hide">Read Less</a>    
                    
                    <?php endif; ?>
                    
                </div>                    
                    
                </div>

            </div><!--r-->

            </div>

        </div>

    </div><!--region wrapper-->

<?php endwhile; endif; ?>
    
  <?php }?>
</div><!--destination wrapper-->

<?php } ?>   
                                
            </div><!--col-->            

        </div>
      
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>
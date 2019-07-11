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

    <div class="container pt4">
    
        <div class="row">
            
            <div class="col-12 col-lg-4 col-xl-3 sticky-mobile">

			    <div class="sidebar sticky toggle-item">
				    	
			    	<div class="title">Countries<div class="collapsible-icon"><i class="fas fa-chevron-right"></i></div></div>
			    	
			    	<div>
				    	<?php 
						
						if(($locations = get_nav_menu_locations() ) && isset( $locations[ "destinations" ])):
							
						$menu_countries = wp_get_nav_menu_object( $locations[ "destinations" ] );
						
						$menu_items = wp_get_nav_menu_items($menu_countries);
			        
						foreach($menu_items as $menu_item): ?>
			        
						<div class="item">
					    	
					    	<a href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->post_title; ?></a>
						    
				    	</div>
				        
				        <?php endforeach; endif; ?>
			    	</div>
			    	
			    </div>
			    
            </div>
            
            <div class="col-12 col-lg-8 col-xl-9">

<?php

foreach( get_terms( 'destinations', array( 'hide_empty' => false, 'parent' => 0 ) ) as $parent_term ) {?>

<div id="<?php echo strtolower($parent_term->name);?>" class="destination-wrapper">

<?php if( have_rows('country_fields', $parent_term) ): 
while( have_rows('country_fields', $parent_term) ): the_row();?>
 
    <div class="country-wrapper">
    
        <h2 class="heading heading__md heading__section mb1"><?php echo $parent_term->name;?></h2>
        
        <div class="row">
            
            <div class="col-8 col-sm-4 margin-auto img-country">
                <?php $parentMap = get_sub_field('map', $parent_term);?>
                <div class="parent-map">
                    <?php echo file_get_contents($parentMap); ?>   
                </div>                         
            </div>

            <div class="col-12 col-sm-8">
                
                <?php the_sub_field( 'text_block_text', $parent_term );?>

                <h2 class="heading heading__sm mt2 mb1">Seasons in <?php echo $parent_term->name;?></h2>
    
                <div class="season">
                    
                  <?php if( have_rows('location_seasons', $term) ): 
                    while( have_rows('location_seasons', $term) ): the_row();
                    get_template_part( 'template-parts/seasons');
                    endwhile; endif; ?>
                    
                </div>
    
                <div class="season-key">
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

    <div class="<?php echo ($child_term->slug);?>">

        <div class="toggle country">

            <div class="toggle__question" role="tab">    
              <p class="headingSupporting headingSupporting__sm">
                <?php echo $child_term->name;?>
                <i class="fas fa-chevron-right"></i>
              </p>
            </div>

            <div class="toggle__answer" role="tabpanel">

            <div class="row">
                
                <div class="col-12 col-sm-4">
                    <?php $childMap = get_sub_field('map', $child_term);?>
                    <div class="child-map">
                        <?php echo file_get_contents($parentMap); ?>   
                    </div>                        
                </div>

                <div class="col-12 col-sm-8">
                    
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
                    
                    <h2 class="heading heading__sm mt2 mb1">Upcoming Safaris</h2>
                  
                  <div class="region-safari-wrapper">
                      <p class="title"><span>Desert Explorer River Safari</span> - 23 August 2019 - 26 August 2019</p>
                      <p class="nights"><i class="fas fa-moon"></i> 4 nights</p>
                      <p class="spaces"><i class="fas fa-users"></i> 2 spaces</p>
                      <p class="cost"><i class="fas fa-credit-card"></i> $2599</p>
                      <a href="" class="button"><i class="fas fa-caret-right"></i></a>
                  </div>    

                  <div class="region-safari-wrapper">
                      <p class="title"><span>Desert Explorer River Safari</span> - 23 August 2019 - 26 August 2019</p>
                      <p class="nights"><i class="fas fa-moon"></i> 4 nights</p>
                      <p class="spaces"><i class="fas fa-users"></i> 2 spaces</p>
                      <p class="cost"><i class="fas fa-credit-card"></i> $2599</p>
                      <a href="" class="button"><i class="fas fa-caret-right"></i></a>
                  </div>   

                  <div class="region-safari-wrapper">
                      <p class="title"><span>Desert Explorer River Safari</span> - 23 August 2019 - 26 August 2019</p>
                      <p class="nights"><i class="fas fa-moon"></i> 4 nights</p>
                      <p class="spaces"><i class="fas fa-users"></i> 2 spaces</p>
                      <p class="cost"><i class="fas fa-credit-card"></i> $2599</p>
                      <a href="" class="button"><i class="fas fa-caret-right"></i></a>
                  </div>   
                    
                    <a href="" class="button button__ghost mb1">Find More Safaris</a>
                    
                </div>

                <div class="col-12">
                
                        

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

            </div><!--r-->

            </div>

        </div>

    </div><!--region wrapper-->

</div>

<?php endwhile; endif; ?>
    
  <?php }?>
</div><!--destination wrapper-->

<?php } ?>   
                                
            </div><!--col-->            

        </div>
      
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>
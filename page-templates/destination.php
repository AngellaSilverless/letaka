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

			    <div class="sidebar sticky toggle-item menu-destination">
				    	
			    	<div class="title">Countries<div class="collapsible-icon"><i class="fas fa-chevron-right"></i></div></div>
			    	
			    	<div>
				    	<?php 
						
						$menu_items = get_terms( 'destinations', array( 'hide_empty' => false, 'parent' => 0 ));
			        
						foreach($menu_items as $menu_item): ?>
			        
						<div class="item">
					    	
					    	<a href="#<?php echo strtolower($menu_item->slug);?>"><?php echo $menu_item->name;?><i class="fas fa-chevron-right state"></i></a>
						    
				    	</div>
				        
				        <?php endforeach; ?>
			    	</div>
			    	
			    </div>
			    
            </div>
            
            <div class="col-12 col-lg-8 col-xl-9">

<?php

foreach( get_terms( 'destinations', array( 'hide_empty' => false, 'parent' => 0 ) ) as $parent_term ) { ?>

<div id="<?php echo strtolower($parent_term->slug);?>" class="destination-wrapper">

<?php if( have_rows('country_fields', $parent_term) ): 
while( have_rows('country_fields', $parent_term) ): the_row();?>
 
    <div class="country-wrapper">
    
        <h2 class="heading heading__md heading__section mb1"><?php echo $parent_term->name;?></h2>
        
        <div class="row">
            
            <div class="col-8 col-sm-4 margin-auto img-country">
                <?php $parentMap = get_sub_field('map', $parent_term);?>
                <div class="parent-map">
                    <?php if($parentMap) echo file_get_contents($parentMap); ?>   
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
     
<? foreach( get_terms( 'destinations', array( 'hide_empty' => true, 'parent' => $parent_term->term_id ) ) as $child_term ) {

if( have_rows('region_fields', $child_term) ): 
while( have_rows('region_fields', $child_term) ): the_row();

$child_ID = $child_term->term_id;

$itinerariesID = $wpdb->get_results("SELECT DISTINCT ID
				FROM {$wpdb->prefix}posts
				LEFT JOIN {$wpdb->prefix}term_relationships ON ({$wpdb->prefix}posts.ID = {$wpdb->prefix}term_relationships.object_id)
				LEFT JOIN {$wpdb->prefix}term_taxonomy ON ({$wpdb->prefix}term_relationships.term_taxonomy_id = {$wpdb->prefix}term_taxonomy.term_taxonomy_id)
				WHERE {$wpdb->prefix}term_taxonomy.term_id IN ($child_ID)");
	
$itinerariesID = array_map(create_function('$o', 'return $o->ID;'), $itinerariesID);

$safaris = get_posts(array(
	'post_type'       => 'safari',
	'posts_per_page'  => -1,
	'post_parent__in' => $itinerariesID,
	'meta_key'        => 'date_from',
	'orderby'         => 'meta_value',
	'order'           => 'ASC',
	'meta_query'     => array(
		'relation'   => 'OR',
		array(
			'key'     => 'date_from',
			'value'   => date('Ymd', strtotime('now')),
			'type'    => 'numeric',
			'compare' => '>='
		),
		array(
			'key'     => 'date_to',
			'value'   => date('Ymd', strtotime('now')),
			'type'    => 'numeric',
			'compare' => '>='
		)
	)
));

?>

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
                        <?php if($parentMap) echo file_get_contents($parentMap); ?>   
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
	                    
	                <?php
		            
		            $count = 1; foreach($safaris as $safari): ?>
		            
		            <?php if($count == 4): ?>
						<div class="safari-overflow">
					<?php endif; ?>
	                
					<div class="region-safari-wrapper">
						
						<p class="title"><span><?php echo get_the_title($safari->post_parent); ?></span> - <?php
							echo get_field("date_from", $safari) . " - " . get_field("date_to", $safari);
						?></p>
						<p class="nights"><i class="fas fa-moon"></i> <?php
							$nights = get_field("number_of_nights", $safari->post_parent);
							echo $nights == 1 ? $nights . " night" : $nights . " nights";
						?></p>
						<p class="spaces"><i class="fas fa-users"></i> <?php
							$avail = get_field("availability", $safari);
							echo $avail == 1 ? $avail . " space" : $avail . " spaces";
						?></p>
						<p class="cost"><i class="fas fa-credit-card"></i> <?php
							echo "$" . number_format(get_field("cost", $safari));
						?></p>
						<a href="<?php echo get_permalink($safari); ?>" class="button"><i class="fas fa-caret-right"></i></a>
						
					</div>
					
					<?php if($count >= 4 && $count == sizeof($safaris)): ?>
						</div>
					<?php endif; ?>
					
					<?php $count++; endforeach; ?>
                    
                    <?php if(sizeof($safaris) > 3): ?>
                    
                    <button class="button button__ghost mb1 find-more-safaris">View More Safaris</button>
                    
                    <?php endif; ?>
                    
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
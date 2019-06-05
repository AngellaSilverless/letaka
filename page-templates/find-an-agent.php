<?php
/**
 * ============== Template Name: Find an Agent
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

    <div class="container find-agent has-sidebar pt4 pb8">
	    
	    <div class="sidebar">
		    
		    <div class="contact-us">
			    
			    <h2>Contact us</h2>
			    
			    <?php echo do_shortcode('[contact-form-7 id="2434" title="Contact us directly" html_class="form contact-directly-form"]');?>
			    
		    </div>
		    
	    </div>
	    
	    <div class="results">
		
			<?php
				
			$countries = get_terms(array(
			    "taxonomy"   => "country",
			    "orderby"    => "name"
			));
			
			$agents = $wpdb->get_results(
				"SELECT ID, name, slug, post_title, post_name, meta.meta_value AS telephone, meta2.meta_value AS email
				FROM {$wpdb->prefix}term_taxonomy AS cat_term_taxonomy
				
				INNER JOIN {$wpdb->prefix}terms AS cat_terms ON cat_term_taxonomy.term_id = cat_terms.term_id
				INNER JOIN {$wpdb->prefix}term_relationships AS cat_term_relationships ON cat_term_taxonomy.term_taxonomy_id = cat_term_relationships.term_taxonomy_id
				INNER JOIN {$wpdb->prefix}posts AS cat_posts ON cat_term_relationships.object_id = cat_posts.ID
				
				LEFT JOIN {$wpdb->prefix}postmeta AS meta ON cat_posts.ID = meta.post_id AND meta.meta_key = 'telephone'
				LEFT JOIN {$wpdb->prefix}postmeta AS meta2 ON cat_posts.ID = meta2.post_id AND meta2.meta_key = 'email'
				
				
				WHERE cat_posts.post_status =  'publish'
				AND cat_posts.post_type =  'agents'
				AND cat_term_taxonomy.taxonomy =  'country'"
			);
			
			$groups = array();
			
			foreach($agents as $agent) {
				if($groups[$agent->name] == NULL)
					$groups[$agent->name] = array();
					
				array_push($groups[$agent->name], $agent);
			}
			
			$count = 0;
			
			foreach($groups as $country => $agents): ?>
				
			<div class="wrapper-countries">
				
				<div class="country heading heading__sm <?php if($count == 0) echo " opened"; ?>"><?php echo $country; ?><i class="fas fa-chevron-right"></i></div>
				
				<div class="wrapper-agents" style="<?php if($count > 0) echo "display:none;"; ?>">
					
					<?php foreach($agents as $agent): ?>
					
					<div class="agent">
						
						<div class="title"><?php echo $agent->post_title; ?></div>
						
						<div>
							
							<?php
							
							$telephone = $agent->telephone;
							
							if($telephone): ?>
							
							<a class="button" href="tel:<?php echo $telephone; ?>">
								<div>Call</div>
								<div class="font100 info"><?php echo $telephone; ?></div>
							</a>
							
							<?php endif; ?>
							
						</div>
						
						<div>
							
							<?php
							
							$email = $agent->email;
							
							if($email): ?>
							
							<a class="button button__secondary-color" href="tel:<?php echo $email; ?>">
								<div>Email</div>
								<div class="font100 info"><?php echo $email; ?></div>
							</a>
							
							<?php endif; ?>
							
						</div>
						
					</div>
					
					<?php endforeach; ?>
					
				</div>
				
			</div>
				
			<?php $count++; endforeach; ?>
			
	    </div>
		
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>
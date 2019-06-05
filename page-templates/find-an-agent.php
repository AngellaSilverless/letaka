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

    <div class="container find-agent pt4 pb8">
	    
	    <div class="row">
		    
		    <div class="col-3">
	    
			    <div class="sidebar">
				    
				    <div class="contact-us">
					    
					    <div class="title">Contact us</div>
					    
					    <?php echo do_shortcode('[contact-form-7 id="2434" title="Contact us directly" html_class="form contact-directly-form"]');?>
					    
				    </div>
				    
			    </div>
			    
		    </div>
		    
		    <div class="col-9">
	    
			    <div class="results">
				
					<?php
						
					$countries = get_terms(array(
					    "taxonomy"   => "country",
					    "orderby"    => "name"
					));
					
					$agents = $wpdb->get_results(
						"SELECT ID,
								post_title,
								post_name,
								GROUP_CONCAT(DISTINCT country_name SEPARATOR ' - ') AS country,
								GROUP_CONCAT(type_name SEPARATOR ' - ') AS type,
								telephone,
								email
						
						FROM (SELECT
								ID,
								post_title,
								post_name,
								cat_terms.name AS country_name,
								cat_terms2.name AS type_name,
								meta.meta_value AS telephone,
								meta2.meta_value AS email
								
							FROM {$wpdb->prefix}term_taxonomy AS cat_term_taxonomy
							
							INNER JOIN {$wpdb->prefix}terms AS cat_terms ON cat_term_taxonomy.term_id = cat_terms.term_id
							INNER JOIN {$wpdb->prefix}term_relationships AS cat_term_relationships ON cat_term_taxonomy.term_taxonomy_id = cat_term_relationships.term_taxonomy_id
							INNER JOIN {$wpdb->prefix}posts AS cat_posts ON cat_term_relationships.object_id = cat_posts.ID
							
							INNER JOIN {$wpdb->prefix}term_relationships AS cat_term_relationships2 ON cat_term_relationships2.object_id = cat_posts.ID
							INNER JOIN {$wpdb->prefix}term_taxonomy AS cat_term_taxonomy2 ON cat_term_relationships2.term_taxonomy_id = cat_term_taxonomy2.term_taxonomy_id
							INNER JOIN {$wpdb->prefix}terms AS cat_terms2 ON cat_term_taxonomy2.term_id = cat_terms2.term_id
							
							LEFT JOIN {$wpdb->prefix}postmeta AS meta ON cat_posts.ID = meta.post_id AND meta.meta_key = 'telephone'
							LEFT JOIN {$wpdb->prefix}postmeta AS meta2 ON cat_posts.ID = meta2.post_id AND meta2.meta_key = 'email'
							
							
							WHERE cat_posts.post_status =  'publish'
							AND cat_posts.post_type =  'agents'
							AND cat_term_taxonomy.taxonomy =  'country'
							AND cat_term_taxonomy2.taxonomy = 'type') agents
						
						GROUP BY ID, telephone, email"
					);
					
					$groups = array();
					
					foreach($agents as $agent) {
						if($groups[$agent->country] == NULL)
							$groups[$agent->country] = array();
							
						array_push($groups[$agent->country], $agent);
					}
					
					$count = 0;
					
					foreach($groups as $country => $agents): ?>
						
					<div class="wrapper-countries">
						
						<div class="country heading heading__sm <?php if($count == 0) echo " opened"; ?>"><?php echo $country; ?><i class="fas fa-chevron-right"></i></div>
						
						<div class="wrapper-agents" style="<?php if($count > 0) echo "display:none;"; ?>">
							
							<?php foreach($agents as $agent): ?>
							
							<div class="agent">
								
								<div class="title">
									
									<div class="name"><?php echo $agent->post_title; ?></div>
									
									<div class="type"><?php echo $agent->type; ?></div>
								
								</div>
								
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
		    
		    </div>
		    
	    </div>
		
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>
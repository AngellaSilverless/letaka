<?php
		
$pageID = get_page_by_path("agents");

$backgroundImage = get_field("hero_background_image", $pageID);
	
?>

<div class="cta find-safari mt2" style="background: url(<?php echo $backgroundImage["sizes"]["large"]; ?>);">
	
	<div class="content">
		
		<div class="circle">
    		<?php get_template_part('template-parts/find', 'safari');?>
		</div>
		
		<h3 class="heading heading__light heading__lg center">Find an agent</h3>
		
		<div class="wrapper-buttons center"><a class="button" href="<?php echo get_permalink($pageID); ?>">View more</a></div>
		
	</div>
	
</div>
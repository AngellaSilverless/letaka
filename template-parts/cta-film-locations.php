<?php
		
$pageID = get_page_by_path("film-locations");

$backgroundImage = get_field("hero_background_image", $pageID);
	
?>

<div class="cta film-locations mt2" style="background: url(<?php echo $backgroundImage["sizes"]["large"]; ?>);">
	
	<div class="content">
		
		<div class="circle">
    		<?php get_template_part('template-parts/film');?>
		</div>
		
		<h3 class="heading heading__light heading__lg center">Film locations</h3>
		
		<div class="wrapper-buttons center"><a class="button" href="<?php echo get_permalink($pageID); ?>">Find out more</a></div>
		
	</div>
	
</div>
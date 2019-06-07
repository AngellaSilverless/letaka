<?php
		
$pageID = get_page_by_path("find-a-safari");

$backgroundImage = get_field("hero_background_image", $pageID);
	
?>

<div class="cta find-safari mt2" style="background: url(<?php echo $backgroundImage["sizes"]["large"]; ?>);">
	
	<div class="content">
		
		<div class="circle"></div>
		
		<h3 class="heading heading__light heading__lg center">Find a Safari</h3>
		
		<div class="wrapper-buttons center"><a class="button" href="<?php echo get_permalink($pageID); ?>">Discover more</a></div>
		
	</div>
	
</div>
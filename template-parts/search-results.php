<?php

$image = wp_get_attachment_image_src(get_post_thumbnail_id(), "large");

if(!$image) {
	$image = get_field("hero_background_image");
	
	if(!$image) {
		$image = get_field("standard_images", "options")["news"]["sizes"]["large"];
	} else {
		$image = $image["url"];
	}
} else {
	$image = $image[0];
}

?>
				
<div class="img" style="background: url(<?php echo $image; ?>)"></div>

<div class="content">
	
	<?php
		
	$category = get_the_category()[0]->name;
	
	if(!$category) {
		$category = get_post_type_object(get_post_type());
		
		if($category) {
			$category = $category->labels->singular_name;
		}
	}
		
	?>

	<span class="font700 heading__secondary-color"><?php echo get_the_date("d.m.Y"); if($category) echo " - " . $category; ?></span>
	
	<h3 class="heading heading__primary-color size2 brand-line"><?php the_title(); ?></h3>
	
	<div class="description mt1 mb1"><?php echo substr(wp_strip_all_tags(get_the_content()), 0, 300) . "..."; ?></div>
	
	<div class="action-buttons">
		
		<?php
			
		$post_type = get_post_type();
		
		if($post_type == "agents") {
			$permalink = get_permalink(get_page_by_path("agents"));
		} else {
			$permalink = get_permalink();
		}
		
		?>
		
		<div><a class="button button__transparent" href="<?php echo $permalink; ?>">Read More</a></div>
		
	</div>

</div>
<?php
	
$image = wp_get_attachment_image_src(get_post_thumbnail_id(), "large");

if(!$image) {
	$image = get_field("standard_images", "options")["news"]["sizes"]["large"];
} else {
	$image = $image[0];
}

?>
				
<div class="img" style="background: url(<?php echo $image; ?>)"><a href="<?php the_permalink(); ?>"></a></div>

<div class="content">

	<span class="font200 heading__secondary-color heading__caps"><?php echo get_the_date("d.m.Y") . " - " . get_the_category()[0]->name; ?></span>
	
	<a href="<?php the_permalink(); ?>"><h3 class="heading heading__primary-color size2 brand-line"><?php the_title(); ?></h3></a>
	
	<div class="description mt1 mb1"><?php echo substr(wp_strip_all_tags(get_the_content()), 0, 300) . "..."; ?></div>
	
	<div class="action-buttons">
		
		<div><a class="button button__transparent" href="<?php the_permalink(); ?>">Read More</a></div>
		
		<?php if(isset($newsletter) && $newsletter == true): ?>
			
			<div><div class="button button__secondary-color modal-toggle newsletter-signup" href="">Newsletter Sign Up</div></div>
			
		<?php endif; ?>
		
	</div>

</div>
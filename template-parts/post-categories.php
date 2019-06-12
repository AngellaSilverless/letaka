<div class="post-categories mt2">
	
	<div class="title">Categories<div class="collapsible-icon"><i class="fas fa-chevron-right"></i></div></div>
	    	
	<?php
		
	if(is_page(get_page_by_path('about-us/news'))) {
		$active = "active";
	} else {
		$active = "";
	}
	
	$current = $_GET['category_name'];
	
	$categories = get_categories();
	
	?>
	
	<div class="links">
		
		<a href="<?php echo home_url() . "/about-us/news/"; ?>" class="item <?php if(!$current) echo $active; ?>">All</a>
			
		<?php foreach($categories as $category): ?>
		
		<a href="<?php echo home_url() . "/about-us/news/?category_name=" . $category->slug; ?>" class="item <?php if($current == $category->slug) echo $active; ?>"><?php echo $category->name; ?></a>
		
		<?php endforeach; ?>
	
	</div>

</div>

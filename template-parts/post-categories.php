<div class="post-categories mt2">
	
	<div class="title">Categories</div>
	    	
	<?php
		
	$categories = get_categories();
		
	foreach($categories as $category): ?>
	
	<a class="item"><?php echo $category->name; ?></a>
	
	<?php endforeach; ?>

</div>

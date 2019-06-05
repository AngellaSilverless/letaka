<div class="this-section">
	
	<div class="title">This section</div>
	    	
	<div class="links">
		
		<?php $about = get_page_by_path('about-us'); ?>
	    
	    <a <?php if(is_page($page->ID)) echo "class='active'"; ?> href="<?php echo get_permalink(get_the_ID()); ?>"><?php the_title(); ?></a>
	    
	    <?php
		    	
		$pages = get_posts(array(
	    	'post_type'      => 'page',
	    	'posts_per_page' => -1,
	    	'post_parent'    => $about->ID,
			'orderby'        => 'title',
			'order'          => 'ASC'
		));
		
		foreach($pages as $page): ?>
		
		<a <?php if(is_page($page->ID)) echo "class='active'"; ?> href="<?php echo get_permalink($page->ID); ?>"><?php echo $page->post_title; ?></a>
		
		<?php endforeach; ?>
		
	</div>

</div>

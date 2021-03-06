<div class="this-section">
	
	<div class="title">This section<div class="collapsible-icon"><i class="fas fa-chevron-right"></i></div></div>
	    	
	<div class="links">
		
		<?php $about = get_page_by_path('about-us'); ?>
	    
	    <a class="item <?php if(is_page($about->ID)) echo "active"; ?>" href="<?php echo get_permalink($about->ID); ?>"><?php echo get_the_title($about->ID); ?><i class="fas fa-chevron-right state"></i></a>
	    
	    <?php
		    	
		$pages = get_posts(array(
	    	'post_type'      => 'page',
	    	'posts_per_page' => -1,
	    	'post_parent'    => $about->ID,
			'orderby'        => 'title',
			'order'          => 'ASC'
		));
		
		foreach($pages as $page): ?>
		
		<a class="item <?php if(is_page($page->ID)) echo "active"; ?>" href="<?php echo get_permalink($page->ID); ?>"><?php echo $page->post_title; ?><i class="fas fa-chevron-right state"></i></a>
		
		<?php endforeach; ?>
		
	</div>

</div>

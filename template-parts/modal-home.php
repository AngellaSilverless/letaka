<?php $video = get_field('video', get_option( 'page_on_front' )); if($video): ?>

<!-- Modal Video Home -->

<div class="modal modal-video">
	
	<div class="modal-overlay modal-toggle"></div>
	
	<div class="modal-wrapper modal-transition">
		
		<div class="modal-header">
			
			<button class="modal-close pause-video"><i class="fas fa-times"></i></button>
			
		</div>
	
		<div class="modal-body">
			
			<div class="modal-content">
				
				<video controls class="video">
        
					<source src="<?php echo $video["url"]; ?>" type="<?php echo $video["mime_type"]; ?>">
				
				</video>
				
			</div>
			
		</div>
		
	</div>
	
</div>

<!-- Modal Video Home END -->

<?php endif; ?>

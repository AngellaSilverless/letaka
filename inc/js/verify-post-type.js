jQuery(document).ready(function( $ ) {
	
	$('body').on('submit.edit-post', '#post', function () {
		
		$(".missing-parent").remove();
		
		if(!$("select#parent_id").val()) {
			
			var errorDiv = $('<div class="missing-parent acf-notice -error acf-error-message -dismiss"></div>');
			
			var errorMessage = $('<p>Please select an Itinerary.</p>');
			
			var closeButton = $('<a class="acf-notice-dismiss acf-icon -cancel small"></a>');
			
			errorDiv.append(errorMessage);
			errorDiv.append(closeButton);
			
			closeButton.click(function() {
				$(".missing-parent").remove();
			});
			
			$("form#post").prepend(errorDiv);
			
		
			// Hide the spinner
			$( '#major-publishing-actions .spinner' ).hide();
	
			// The buttons get "disabled" added to them on submit. Remove that class.
			$( '#major-publishing-actions' ).find( ':button, :submit, a.submitdelete, #post-preview' ).removeClass( 'disabled' );

			return false;
		}
		return true;
	});
	
	

});
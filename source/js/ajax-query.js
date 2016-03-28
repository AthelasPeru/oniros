(function($) {
	$(document).on( 'click', '#ajax-button', function( event ) {
		event.preventDefault();

		// ajaxquery is the printed object we defined in functions.php in set_ajax_vars
		var post_type = JSON.parse(ajaxquery.wp_query).post_type; // data we get from our embedded data
		

		$.ajax({
			url: ajaxquery.ajaxurl,
			type: 'POST',
			data: {
				action: 'ajax_query', // action defined in the ajax.php function as the wp_ajax_ function
				post_type: post_type,
				
			},
			success: function( result ) {
				console.log( JSON.parse(result) );
			}
		})
	})
})(jQuery);
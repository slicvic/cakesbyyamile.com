jQuery(function($){
	$(document).on('click', '.bloggerbuzz-install-plugin', function(){	
		event.preventDefault();
		var $button = $(this);

		if ( $button.hasClass( 'updating-message' ) ) {
			return;
		}

		wp.updates.installPlugin( {
			slug:    $button.data( 'slug' )
		} );
	});

	$(document).on('click', '.bloggerbuzz-activate-plugin', function(){
		event.preventDefault();
		var $button = $(this);
		$button.addClass('updating-message').html( importer_params.activating_text );

		bloggerbuzzactivate_plugin($button);
		
	});

	$( document ).on('wp-plugin-installing', function(event, args) {
		event.preventDefault();

		$('.bloggerbuzz-install-plugin').addClass('updating-message').html( importer_params.installing_text );

	});

	$( document ).on('wp-plugin-install-success', function( event, response ) {

		event.preventDefault();
		var $button = $('.bloggerbuzz-install-plugin');

		$button.html( importer_params.activating_text );

		setTimeout( function() {
			bloggerbuzzactivate_plugin($button);
		}, 1000 );

	});

	function bloggerbuzzactivate_plugin($button){
		$.ajax({
			url: ajaxurl,
			type: 'POST',
			data: {
				'action' : 'bloggerbuzzactivate_plugin',
				'slug' : $button.data('slug'),
				'file' : $button.data('filename')
			},
		})
		.done(function (result) {
			var result = JSON.parse(result)
			if( result.success ) {
				$button.removeClass( 'bloggerbuzz-activate-plugin bloggerbuzz-install-plugin updating-message button button-primary' ).html( importer_params.importer_page ).attr('href', importer_params.importer_url);
			} else {
				$button.removeClass( 'updating-message' ).html(importer_params.error);
			}

		});
	}
});
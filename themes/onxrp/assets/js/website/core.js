jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error

		$('.onxrp_loadmore').on('click',function(){
			var cat_id = $('.onxrp_loadmore').data('catid');
			var posttype = $('.onxrp_loadmore').data('posttype');
			var taxonomy = $('.onxrp_loadmore').data('taxonomy');
			var button = $(this),
				data = {
				'action': 'loadmore',
				'query': onxrp_loadmore_params.posts, // that's how we get params from wp_localize_script() function
				'page' : onxrp_loadmore_params.current_page,
				'offset' : 8 * onxrp_loadmore_params.current_page + 1,
				'cat_id' :  cat_id,
				'post_type':  posttype,
				'taxonomy':  taxonomy,
			};
			$.ajax({ // you can also use $.post here
				url : onxrp_loadmore_params.ajaxurl, // AJAX handler
				data : data,
				type : 'POST',
				success : function( data ){


					if( data ) {

						$('#ajax-posts .extra-block').before(data); // insert new posts
						onxrp_loadmore_params.current_page++;
						if ( onxrp_loadmore_params.current_page == $('.onxrp_loadmore').data('maxpage') ){
							$('.section-load-more').remove(); // if last page, remove the button
						}
						// you can also fire the "post-load" event here if you use a plugin that requires it
						// $( document.body ).trigger( 'post-load' );
					} else {
						$('.section-load-more').remove();
						button.remove(); // if no data, remove the button as well
					}
				}
			});
		});

});
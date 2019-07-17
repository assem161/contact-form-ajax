jQuery(document).ready(function( $ ) {
	$('#contact-form-us').submit(function(e){
		e.preventDefault();

		var dataForm2 = $('#contact-form-us').serialize();
		//var urlsend = $('#subscribe-form').attr('action');
		$.ajax({
			url     : ajax_var_url.url,
			method  : 'POST',
			beforeSend: function(xhr) {
				xhr.setRequestHeader( 'X-WP-Nonce', ajax_var_url.nonce);
			},
			data: dataForm2,				            
		}).done(function(res){
			$('.Messge-form').text(res);
			$('.Messge-form').addClass('sucess');
			$('.Messge-form').removeClass('error');			
			// clear values
			$('#name').val('');
			$('#email').val('');
			$('#phone').val('');
			$('#subject').val('');
			$('#message').val('');
		}).fail(function(data){
			$('.Messge-form').addClass('error');
			$('.Messge-form').removeClass('sucess');
			if(data.responseText != ''){
				$('.Messge-form').text(data.responseText);
			}else{
				$('.Messge-form').text('there is an error try again');
			}
		})	
	})	
});
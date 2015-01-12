<?php
/**
 * Add Ajax Handler - this is the function that handles the submission of the form.
 * @since    1.0.0
 * @version  1.0.1
 */

function mm_mailchimp_submit_to_list() {
	
	global $mm_options;

	$mcls = $_POST['mcl_id'];
	//get data from our ajax() call
	$email = $_POST['mcl_email'];
	$fullname = explode(' ', $_POST['mcl_fullname']);
	$firstName = $fullname[0];
	$lastName = $fullname[1];

	//show error if fields are empty and validation is enabled
	if( $email != '' && is_email( $email ) ) {

		foreach ($mcls as $key) {

			$MailChimp = new \mailchimp\MailChimp( $mm_options['mailAPIKey'] );
			$result = $MailChimp->call('lists/subscribe', array(
				'id'                => $key,
				'email'             => array('email'=> $email),
				'merge_vars'        => array('FNAME'=>$firstName, 'LNAME'=>$lastName),
				'double_optin'      => false,
				'update_existing'   => true,
				'replace_interests' => false,
				'send_welcome'      => true,
			));	

			;
		}

		echo json_encode(array('message'=>'Thank you for subscribing.'));

	
	}

	//echo 'test outside';

	// Return String
	die();
	
}
add_action('wp_ajax_mm_mailchimp_submit_to_list', 'mm_mailchimp_submit_to_list');
add_action('wp_ajax_nopriv_mm_mailchimp_submit_to_list', 'mm_mailchimp_submit_to_list');

/**
 * Add js ajax script to footer.
 * @since    1.0.0
 */
function mm_mailchimp_footer_js() { ?>
<script>
jQuery(document).ready(function($){

	closeAll = function(){
	
		var target = $(document).find('.modal');
		
		if(target.hasClass('in')){
			
			target.removeClass('in').addClass('fade').fadeOut();
			target.find('input[type="text"]').val('');
			toggleBackdrop('hide');
			
		}	
		
	}

	validEmail = function(e)
	{
		var filter = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
		
		if (!filter.test(''+e.val()+''))
		{
			throwError('Provide valid email only.', e);        	
		}        
		
		return vF;
	};	
	
	validateFullName = function(obj){
		
		var reg = new RegExp("(\\w+)(\\s+)(\\w+)");
		
		if(!reg.test(''+obj.val()+'')) {
			
			throwError('Provide Full Name.', obj);
		}
		
	};
	
	throwError = function(mess, e){
		
		e.focus();
		vF = false;
		
		$('#mm_form #message').html(mess).removeClass('sub_success').addClass('sub_error').fadeIn();	

	
	};
	
	toggleEls = function(f, e){
		
		if(e == 'disable') {
				
		    	f.find('input[type="text"]').attr('disabled', 'disabled');
		    	f.find('input[type="email"]').attr('disabled', 'disabled');
		    	f.find('textarea').attr('disabled', 'disabled')
		    	f.find('#submit-btn').attr('disabled', 'disabled');
		}
		else if(e == 'enableEmpty') {

		    	f.find('input[type="text"]').removeAttr('disabled').val('');
		    	f.find('input[type="email"]').removeAttr('disabled').val('');
		    	f.find('textarea').removeAttr('disabled').val('');
		    	f.find('#submit-btn').removeAttr('disabled');

		}
		else if(e == 'enable') {
		
		    	f.find('input[type="text"]').removeAttr('disabled');
		    	f.find('input[type="email"]').removeAttr('disabled');
		    	f.find('textarea').removeAttr('disabled');
		    	f.find('#submit-btn').removeAttr('disabled');		
		
		}
	
	
	
	};

	$('#mm_form').submit(function(e){

		e.preventDefault();
		var disForm = $(this);

		var reqIn = disForm.find('.required');
		var mess = disForm.find('#message');
		
		vF = true;
		
		//Init
		mess.html('').fadeOut();
		
		reqIn.each(function(){
			
			var disIn = $(this);
			
			if(vF && disIn.val() == '') {
				
				throwError('This is a required field.', disIn);
				
			}
			else {
				
				if(vF && disIn.hasClass('fullname') == true){
					validateFullName(disIn);
				}

			}
					
		});
		
		if(vF){		

			var actionPath = disForm.attr('action');
			var dataString = disForm.serialize();
			var dataTotal = dataString + '&action=mm_mailchimp_submit_to_list';

	        mess.html('Sending...').removeClass('sub_error').addClass('sub_success').fadeIn();
	        toggleEls(disForm, 'disable');			

			//console.log(dataTotal);
							
			$.ajax({
				type: 'POST',
				url: "<?php echo admin_url('admin-ajax.php');?>",
				data: dataTotal,
				dataType: 'json',
				success: function(data, textStatus, XMLHttpRequest){
					
		 			mess.html(data.message).removeClass('sub_error').addClass('sub_success').fadeIn();
			 		toggleEls(disForm, 'enableEmpty');

			 		setTimeout(function(){
			 			mess.html('').fadeOut();
			 		}, 3000);

				},
				error: function(XMLHttpRequest, textStatus, errorThrown){

		 			mess.html('Something went wrong. Try again later.').removeClass('sub_success').addClass('sub_error').fadeIn();
	                toggleEls(disForm, 'enable');

				}

			}); 
			return false;

		} 

	});


});
</script>
<?php }
add_action('wp_head','mm_mailchimp_footer_js');
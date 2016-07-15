<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Willow_phplist {

    public function __construct()
    {

    }

    public function form()
    {
    	// Gets parameters set by user or use defaults

    	$subscribe_page_id = ee()->TMPL->fetch_param('subscribe_page_id') ?: 1;
    	$subscribe_page_url = ee()->TMPL->fetch_param('subscribe_page_url') ?: "/lists";
    	$list_id = ee()->TMPL->fetch_param('list_id') ?: 1;
    	
    	// Make sure url ends with a slash

		if (! substr($subscribe_page_url, -1) == '/') $subscribe_page_url .= '/';
    	$subscribe_page_url .= "?p=subscribe&id=" . $subscribe_page_id;


    	// Gets tag data

		$tagdata = ee()->TMPL->tagdata;

		$data = array(
		    'id'            => ee()->TMPL->form_id ?: 'phplist',
		    'class'         => ee()->TMPL->form_class,
		    'action'		=> $subscribe_page_url,
			'hidden_fields'	=> array(
				'list[' . $list_id . ']' => 'signup'
			)
		);
		$res = ee()->functions->form_declaration($data);
		$res .= $tagdata . '</form>';
		return $res;

    }

    public function script()
    {
    	$id = ee()->TMPL->form_id ?: 'phplist';
    	$success_message = ee()->TMPL->fetch_param('success_message') ?: "Thanks for signing up for the newsletter. Please check your email to confirm your signup.";
    	$failure_message = ee()->TMPL->fetch_param('failure_message') ?: "Something went wrong. Please try again later.";

    	$script = "
			<script>
			$(function() { 
				$('#" . $id . " input[type=submit]').click(function(e){
					var signup_url = $('#" . $id . "').attr('action');
					var signup_email;
					var original = $('#" . $id . " input[type=submit]').val();
					$(this).val('Subscribing...');
					var htmlemail = 1;
					if ($('#" . $id . " input[name=htmlemail]') != '') htmlemail = $('#" . $id . " input[name=htmlemail]').attr('value');
					var url_params = 'htmlemail=' + htmlemail + '&subscribe=subscribe&VerificationCodeX=';
					$('#" . $id . " input').each(function(){
						if ($(this).attr('name') != 'site_id' && $(this).attr('name') != 'csrf_token' && $(this).attr('type') != 'submit')
						{
							url_params = url_params + '&' + $(this).attr('name') + '=' + escape($(this).val());
							if ($(this).attr('name') == 'email') signup_email = escape($(this).val());
						}
					});
					$.ajax({
					   type: 'POST',
					   url: signup_url,
					   data: url_params,
					   success: function(){
							$('#" . $id . "').after($('<p id=\"" . $id . "-success\">" . addslashes($success_message) . "</p>').fadeIn('slow'));
							$('#" . $id . " input[type=submit]').hide();
					   },					   
					   error: function(){
					   		$('#" . $id . "-failure').remove();
							$('#" . $id . "').after($('<p id=\"" . $id . "-failure\">" . addslashes($failure_message) . "</p>').fadeIn('slow'));
							$('#" . $id . " input[type=submit]').val(original);
					   }
					 });
					return false;
				});
			});
			</script>";
		return $script;
    }

}

/* End of file pi.willow_phplist.php */
/* Location: ./system/user/addons/willow_phplist/pi.willow_phplist.php */
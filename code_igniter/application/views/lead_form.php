<?php

// used in error handling and passing parameters
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
?>
<!doctype html>
<html>
	<head>
		<link rel="stylesheet" href="/css/bootstrap.css" type="text/css"/>
		<link rel="stylesheet" href="/css/docs.css" type="text/css"/>
		<link rel="stylesheet" href="/css/formOnly.css" type="text/css"/>
        <input type="hidden" id="fb_first_name" value='<?php if(isset($fb_first_name)) { echo $fb_first_name; }?>'>
        <input type="hidden" id="fb_last_name" value='<?php if(isset($fb_last_name)) { echo $fb_last_name; }?>'>
        <input type="hidden" id="fb_city" value='<?php if(isset($fb_city)) { echo $fb_city; }?>'>
        <input type="hidden" id="fb_state" value='<?php if(isset($fb_state)) { echo $fb_state; }?>'>
        <input type="hidden" id="fb_country" value='<?php if(isset($fb_country)) { echo $fb_country; }?>'>
        <input type="hidden" id="fb_email" value='<?php if(isset($fb_email)) { echo $fb_email; }?>'>
        <input type="hidden" id="fb_gender" value='<?php if(isset($fb_gender)) { echo $fb_gender; }?>'>
        <input type="hidden" id="fb_address" value='<?php if(isset($fb_address)) { echo $fb_address; }?>'>
        <input type="hidden" id="fb_zipcode" value='<?php if(isset($fb_zipcode)) { echo $fb_zipcode; }?>'>
        <input type="hidden" id="fb_phone" value='<?php if(isset($fb_phone)) { echo $fb_phone; }?>'>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->config->item('forms_url'); ?>/form/affiliate/133"></script>
		<style>
			.heading-fieldset{ padding: 12px 0px;}
			.important, .success { margin-left: 12px;}
			.tabs { list-style: none;}
			#facebook-registration, #linkedin-registration {
				width: 330px;
				float: left;
				margin-top: 24px;
				margin-bottom: 36px;
			}

			#facebook-registration img, #linkedin-registration img {
				margin-top: 24px;	
			}

			#facebook-registration {
				margin-left: 24px;	
			}

			#linkedin-registration {
				margin-right: 24px;
				width: 330px; 
				float: right;
			}

			.jumbotron .logo {
				margin-top: 0;
			}

			h1 {
				margin-bottom: 12px;
			}
		</style>
	</head>
	<header class="jumbotron masthead" id="overview">
		    <div class="logo">
		        <img src="<?php echo $this->config->item('logo');?>"/>
<!-- 		        <h1>Interested in Notre Dame University?</h1> -->
		    </div><!-- /container -->
	     <div class="inner"></div>
    </header>
	<body>
		<div class="container">
			<div class="content">
			<h1>Interested in <?php echo $this->config->item('school_name');?>?</h1>
					<fieldset class="heading-fieldset" id="personal-fieldset" title="Personal Information">
						<legend>Sign up below</legend>
                        <font color="red"><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></font>
                    <script type="text/javascript" src="<?php echo $this->config->item('forms_url').$form_url ?>"></script>
					</fieldset>
		<div id="modal-from-dom" class="modal hide fade" style="display: block; ">
            <div class="modal-header">
              <a href="#" class="close">×</a>
              <h3>Connect with Facebook</h3>
            </div>
            <div class="modal-body">
              	<iframe src="https://www.facebook.com/plugins/registration.php?
				             client_id=315717308469308&
				             redirect_uri=<?php echo $this->config->item('full_server_name');?>/index.php?/fblogin&
				             fields=[
				             			{ 'name':'name' },
				             			{ 'name':'birthday' },
				             			{ 'name':'gender' },
				             			{ 'name':'location' },
				             			{ 'name':'email' }
				             ]&
				             next=<?php echo $this->config->item('full_server_name');?>"
				        scrolling="auto"
				        frameborder="no"
				        style="border:none"
				        allowTransparency="true"
                        width="100%"
                        height="420">
                </iframe>
            </div>
          </div>
            </div>
        </div>
    </body>

<script type="text/javascript" src="/js/lh_jquery_multi_validator.js"></script>
<script type="text/javascript" src="/js/bootstrap-modal.js"></script>
<script type="text/javascript" src="/js/masked_input.js"></script>
<script type="text/javascript" src="/js/leadform_masking.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    // $("#appform").formToWizard({ submitButton: 'completeButton' })
    $('.fbbutton').click(function() {
        $('#modal-from-dom').modal('toggle');
    });

    $('.close').click(function() {
        $(this).parent().parent().modal('toggle');
    });			 

    $(':submit').addClass('btn btn-primary');
    /*
    $('input').blur(validate_field);
    $(':checkbox').click(validate_field);
    $(':radio').click(validate_field);
    $('select').change(validate_field);
    $('textarea').blur(validate_field);
    */

    // Pull data from session after logging in with Facebook
    $('#first_name').val($('#fb_first_name').val());
    $('#last_name').val($('#fb_last_name').val());
    $('#email').val($('#fb_email').val());
    $('#gender').val($('#fb_gender').val());
    $('#address').val($('#fb_address').val());
    $('#phone').val($('#fb_phone').val());
    $('#city').val($('#fb_city').val());
    $('#state').val($('#fb_state').val());
    $('#country').val($('#fb_country').val());
    $('#zip').val($('#fb_zipcode').val());

    // Force re-validate of the zip code. The first one fails because the mask is still there.
    $('.v-zip').blur(validate_field);

    $("form").submit(function () {

        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var email = $('#email').val();
        var gender = $('#gender').val();
        var address = $('#address').val();
        var phone = $('#phone').val();
        var city = $('#city').val();
        var state = $('#state').val();
        var country = $('#country').val();
        var zip = $('#zip').val();
        var item_id = $('#item_id').val();

        $.ajax({
            async: false,
                type: "POST",
                data: "first_name=" + first_name +
                "&last_name=" + last_name + 
                "&email=" + email +
                "&gender=" + gender +
                "&address=" + address +
                "&phone=" + phone +
                "&city=" + city +
                "&state=" + state +
                "&country=" + country +
                "&zip=" + zip +
                "&item_id=" + item_id,
                url: "leadform/set_userdata_session",
                success: function() {
                    return true;
                }
        });

    });
});
function selectProgram() {
    console.log($('#item_id').val());
}
</script>
</html>

<!DOCTYPE>
<html>
	<head>
		<script src="/js/jquery-1.7.1.min.js"></script>
        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

       
        <!--[if !IE]><!-->
        <link href="/css/bootstrap.css" rel="stylesheet">
        <link href="/css/docs.css" rel="stylesheet">
        <!--<![endif]-->

        <!--[if gte IE 7]>
        <link href="/css/bootstrap.css" rel="stylesheet">
        <link href="/css/docs.css" rel="stylesheet"> 
        <![endif]-->

        <!--[if lt IE 7]>
        <link href="/css/iestyle.css" rel="stylesheet">
        <![endif]-->

		<?php
			if (SITE=='aurora') {
				?>
				<style type="text/css">
					body {
						background-color: silver;
					}
				</style>
				<?php
			}
		?>
	</head>
	<body>
		<div class="row">
			<div class="" style="text-align:center;margin-left:auto;margin-right:auto;width:100%">
				<img class="login" src="<?php echo $this->config->item('logo'); ?>">
			</div>	
		</div>	
		<div class="row">
			<div class="login" style="margin-left:auto;margin-right:auto;width:250px">
				<?php
				$login = array(
					'name'	=> 'login',
					'id'	=> 'login',
					'value' => set_value('login'),
					'class' => 'loginInput'
				);
				if ($login_by_username AND $login_by_email) {
					$login_label = 'Email or login';
				} else if ($login_by_username) {
					$login_label = 'Login';
				} else {
					$login_label = 'Email';
				}
				$password = array(
					'name'	=> 'password',
					'id'	=> 'password',
					'class' => 'loginInput'
				);
				$remember = array(
					'name'	=> 'remember',
					'id'	=> 'remember',
					'value'	=> 1,
					'checked'	=> set_value('remember'),
					'style' => 'margin:0;padding:0;font-weight:normal;',
				);
				$captcha = array(
					'name'	=> 'captcha',
					'id'	=> 'captcha',
					'maxlength'	=> 8,
				);
				$submit = array(
					'name'	=> 'submit',
					'id'	=> 'submit',
					'class'	=> 'btn btn-primary',
					'value' => 'Login'
				);

				?>
				<?php 
					if($this->session->flashdata('error')) {
						foreach($this->session->flashdata('error') as $error) {
							echo "<p class='flash_error'>$error</p>";
						}
					}
				?>
				<?php echo form_open($this->uri->uri_string()); ?>
				<table>
					<tr><td><?php echo form_label($login_label, $login['id']); ?></td></tr>
					<tr><td><?php echo form_input($login); ?></td></tr>
					<?php
						if (!form_error($login['name'])) { ?>
							<tr><td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td></tr>
						<?php }
					?>

					<tr><td><?php echo form_label('Password', $password['id']); ?></td></tr>
					<tr><td><?php echo form_password($password); ?></td></tr>
					<?php
						if (!form_error($password['name'])) { ?>
							<tr><td style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></td></tr>
						<?php }
					?>

					<?php if ($show_captcha) {
						if ($use_recaptcha) { ?>
					<tr><div id="recaptcha_image"></div></tr>
					<tr>
						<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
						<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
						<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
					</tr>
					<tr>
						<div class="recaptcha_only_if_image">Enter the words above</div>
						<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>	
					</tr>
					<tr><td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td></tr>
					<tr><td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td><?php echo $recaptcha_html; ?><?php echo $recaptcha_html; ?></tr>
					<?php } else { ?>
					<tr>
						<td>
							<p>Enter the code exactly as it appears:</p>
							<?php echo $captcha_html; ?>
						</td>
					</tr>
					<tr><td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td></tr>
					<tr><td><?php echo form_input($captcha); ?></td></tr>
					<tr><td style="color: red;"><?php echo form_error($captcha['name']); ?></td></tr>
					<?php }
					} ?>
					
					<tr><td><?php echo anchor('/auth/forgot_password/', 'Forgot Password'); ?> | <a data-toggle="modal" href="#welcomeModal">About Student Portal</a></td></tr>
                    <tr><td><i>Note: a password was emailed to the address you provided on your first visit</i><br/><br/></td></tr>
					<tr><td><?php echo form_checkbox($remember); ?> Remember Me</td></tr>
					
					<tr><td><br><?php echo form_submit($submit); ?></td></tr>
				</table>
				<?php echo form_close(); ?>
			</div>
			<div class="row">
				<div class=""style="text-align:center;margin-left:auto;margin-right:auto;width:100%">
                <p><a href="mailto:<?php echo $this->config->item('support_email'); ?>">Contact</a></p>

				</div>
			</div>		
		</div>
        <script type="text/javascript" src="/js/bootstrap-modal.js" />
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-31366915-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
		 <!-- Piwik --> 
        <script type="text/javascript">
        var pkBaseURL = (("https:" == document.location.protocol) ? "https://analytics.learninghouse.com/" : "http://analytics.learninghouse.com/");
        document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
        </script><script type="text/javascript">
        try {
        var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", <?php echo $this->config->item('piwik_id'); ?>);
        piwikTracker.trackPageView();
        piwikTracker.enableLinkTracking();
        } catch( err ) {}
        </script><noscript><p><img src="http://analytics.learninghouse.com/piwik.php?idsite=<?php echo $this->config->item('piwik_id'); ?>" style="border:0" alt="" /></p></noscript>
        <!-- End Piwik Tracking Code -->
	</body>

<div class="modal hide" id="welcomeModal">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>What is this?</h3>
    </div>
    <div class="modal-body">
        <div>
            <p>Welcome to <?php echo $this->config->item('site_name'); ?>!</p>
            <p>This is your personalized page to help you with the admissions process. We create a username for you so your online application can be saved. You can logout and come back at any time to complete it.</p>
        </div>    
    </div>
    <div class="modal-footer">
        <a data-dismiss="modal" class="btn">Close</a>
    </div>
</div>

</html>

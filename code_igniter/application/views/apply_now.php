<!DOCTYPE>
<html>
	<head>
    <title><?php echo $this->config->item('school_name_long'); ?></title>
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
     <style> 
    .label { margin-left: 8px; left: 278px;  position: absolute; top: 8px; }
    td { position: relative; }
   </style>
   

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

   <script type="text/javascript">
   $(document).ready(function() {
        $('#country').bind('change', function() {
            if($(this).val() == 'US') {
                $('.state-zip-group').show('slow');

                $('#state').addClass('validate v-required');
                $('#state').attr('title', 'required');

                $('#zip').addClass('validate v-required v-zip');
                $('#zip').attr('title', 'required');
            } else {
                $('.state-zip-group').hide('slow');

                $('#state').removeClass('validate v-required');
                $('#state').removeAttr('title');

                $('#zip').removeClass('validate v-zip');
                $('#zip').removeAttr('title');
            }
        });
    });
   </script>
	</head>
	<body>
		<div class="row">
			<div class="" style="text-align:center;margin-left:auto;margin-right:auto;width:100%">
				<img class="login" src="<?php echo $this->config->item('logo'); ?>">
                <h3><?php echo $header_message; ?></h3><br/>
			</div>	
		</div>	
		<div class="row">
			<div class="login" style="margin-left:auto;margin-right:auto;width:550px">

				<?php 
					if($this->session->flashdata('error')) {
						foreach($this->session->flashdata('error') as $error) {
							echo "<p class='flash_error'>$error</p>";
						}
					}
				?>
				<form id="apply_now" method="POST" action="/apply_now/start" style="width: 500px;">
                <input type="hidden" name="guid" class="elp_guid" value="">
				<table style="margin-left: auto; margin-right: auto;">
					<tr><td><div style="position: relative;">First Name</div></td>
					<td><div style="position: relative;"><input type="text" name="first_name" class="span3 txt validate v-name" placeholder="Name" style="height: 40px;"></div></td></tr>
                    <tr><td><div style="position: relative;">Last Name</div></td>
					<td><div style="position: relative;"><input type="text" name="last_name" class="span3 txt validate v-name" placeholder="Name" style="height: 40px;"></div></td></tr>
					<tr><td>Country</td>
                        <td><div style="position: relative;"><select class="span3 txt validate v-required" style="height: 40px;" id="country" name="country">
                             <?php echo($country_options); ?>
                         </select></div>
                        </td>
                    </tr>
                    <tr class="state-zip-group"><td><div style="position: relative;">State</div></td>
                        <td><div style="position: relative;"><select class="span3 txt validate v-required" style="height: 40px;" id="state" name="state">
                            <option selected="selected" value="">Select</option> 
                            <option value="AL">Alabama</option> 
                            <option value="AK">Alaska</option> 
                            <option value="AZ">Arizona</option> 
                            <option value="AR">Arkansas</option> 
                            <option value="CA">California</option> 
                            <option value="CO">Colorado</option> 
                            <option value="CT">Connecticut</option> 
                            <option value="DE">Delaware</option> 
                            <option value="DC">District of Columbia</option> 
                            <option value="FL">Florida</option> 
                            <option value="GA">Georgia</option> 
                            <option value="HI">Hawaii</option> 
                            <option value="ID">Idaho</option> 
                            <option value="IL">Illinois</option> 
                            <option value="IN">Indiana</option> 
                            <option value="IA">Iowa</option> 
                            <option value="KS">Kansas</option> 
                            <option value="KY">Kentucky</option> 
                            <option value="LA">Louisiana</option> 
                            <option value="ME">Maine</option> 
                            <option value="MD">Maryland</option> 
                            <option value="MA">Massachusetts</option> 
                            <option value="MI">Michigan</option> 
                            <option value="MN">Minnesota</option> 
                            <option value="MS">Mississippi</option> 
                            <option value="MO">Missouri</option> 
                            <option value="MT">Montana</option> 
                            <option value="NE">Nebraska</option> 
                            <option value="NV">Nevada</option> 
                            <option value="NH">New Hampshire</option> 
                            <option value="NJ">New Jersey</option> 
                            <option value="NM">New Mexico</option> 
                            <option value="NY">New York</option> 
                            <option value="NC">North Carolina</option> 
                            <option value="ND">North Dakota</option> 
                            <option value="OH">Ohio</option> 
                            <option value="OK">Oklahoma</option> 
                            <option value="OR">Oregon</option> 
                            <option value="PA">Pennsylvania</option> 
                            <option value="RI">Rhode Island</option> 
                            <option value="SC">South Carolina</option> 
                            <option value="SD">South Dakota</option> 
                            <option value="TN">Tennessee</option> 
                            <option value="TX">Texas</option> 
                            <option value="UT">Utah</option> 
                            <option value="VT">Vermont</option> 
                            <option value="VA">Virginia</option> 
                            <option value="WA">Washington</option> 
                            <option value="WV">West Virginia</option> 
                            <option value="WI">Wisconsin</option> 
                            <option value="WY">Wyoming</option> 
                </select></div></td></tr>
					<tr class="state-zip-group"><td><div style="position: relative;">Zip</div></td>
					<td><div style="position: relative;"><input type="text" id="zip" name="zip" class="span3 zip validate v-zip" placeholder="Zip" style="height: 40px;"></div></td></tr>
					<tr><td><div style="position: relative;">Email</div></td>
					<td><div style="position: relative;"><input type="text" id="email" name="email" class="span3 validate v-email" placeholder="Email" style="height: 40px;"></div></td></tr>
					<tr><div style="position: relative;"><td>Program</div></td>
                    <td><div style="position: relative;"><select class="span3 txt validate v-required" id="program" name="program" style="height: 40px;">
                        <option value="">Select</option>
                        <?php 
                            foreach($programs as $program) {
                                echo "<option value='".$program['item_id']."'>".$program['name']."</option>"; 
                            }
                        ?>
                        </select>
                    </div></td></tr>
					<tr><td><br><br><input type="submit" class="btn-large btn-primary" value="Ready!" onclick="return validate(this.form);"></td></tr>
				</table>
                </form>	
				<?php echo $footer_message; ?>
			</div>
			
			<div class="row">
				<div class=""style="text-align:center;margin-left:auto;margin-right:auto;width:100%">
                <p>Copyright &copy; 2012 The Learning House Inc.&nbsp;&nbsp;|&nbsp;&nbsp;<a href="mailto:<?php echo $this->config->item('support_email'); ?>">Contact Us</a></p>
				</div>
			</div>		
		</div>
        <script type="text/javascript" src="/js/bootstrap-modal.js"></script>
        <script type="text/javascript" src="/js/set_guid.js"></script>
        <script type="text/javascript" src="/js/lh_jquery_multi_validator.js"></script>
        <!--[if lt IE 9]><script type="text/javascript" src="/js/fix_ie_dropdown.js"></script><![endif]-->
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
</html>

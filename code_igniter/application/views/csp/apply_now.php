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
        <style> 
            .label { margin-left: 8px; left: 278px; position: absolute; top: 8px; }
            td { position: relative; }
        </style>
        
        <script type="text/javascript">
            function submitApplication(form) {
                if(!validate(form)) {
                    return false;
                }

                $('#first_name').val($.trim($('#first_name').val()));
                $('#last_name').val($.trim($('#last_name').val()));

                return true;
            }

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


                // Start functions for CSP apply now page
		if ($('#apply_now_program_type').val()=='') {
                        $('#undergrad_programs').hide();
                        $('#undergrad_programs').removeClass('v-validate required');

                        $('#grad_programs').hide();
                        $('#grad_programs').removeClass('v-validate required');
                };
                $('#apply_now_program_type').change(function(){
                    if ( ($('#apply_now_program_type').val()=='tr') || ($('#apply_now_program_type').val()=='') ) {
                        $('#undergrad_programs').hide('slow');
                        $('#undergrad_programs').removeClass('v-validate required');

                        $('#grad_programs').hide('slow');
                        $('#grad_programs').removeClass('v-validate required');
                    };
                    if ($('#apply_now_program_type').val()=='au') {
                        $('#grad_programs').hide('slow', function(){
                            $('#undergrad_programs').show('slow');
                        });
                        $('#grad_programs').removeClass('v-validate required');

                        $('#undergrad_programs').addClass('v-validate required');
                    };
                    if ($('#apply_now_program_type').val()=='ag') {
                        $('#undergrad_programs').hide('slow', function(){
                            $('#grad_programs').show('slow');
                        });
                        $('#undergrad_programs').removeClass('v-validate required');
                        $('#grad_programs').addClass('v-validate required');
                    };
                });
                // End functions for CSP apply now page
            });
        </script>
	</head>
	<body>
		<div class="row">
			<div class="" style="text-align:center;margin-left:auto;margin-right:auto;width:100%">
				<img class="login" src="<?php echo $this->config->item('logo'); ?>">
                <h3>Get started with your online application</h3><br/>
			</div>	
		</div>	
		<div class="row">
			<div class="login" style="margin-left:auto;margin-right:auto;width:400px">

				<?php 
					if($this->session->flashdata('error')) {
						foreach($this->session->flashdata('error') as $error) {
							echo "<p class='flash_error'>$error</p>";
						}
					}
				?>
				<form method="POST" action="/apply_now/csp_start">

                <input type="hidden" name="program" class="program" value="<?php echo TRAD_ELP_PROGRAM_ID; ?>">

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
                    <tr class="state-zip-group">
                        <td><div style="position: relative;">Zip</div></td>
                        <td>
                            <div style="position: relative;">
                                <input type="text" id="zip" name="zip" class="span3 zip validate v-zip" placeholder="Zip" style="height: 40px;">
                            </div>
                        </td>
                    </tr>
					<tr>
                        <td><div style="position: relative;">Email</div></td>
                        <td>
                            <div style="position: relative;"><input type="text" id="email" name="email" class="span3 validate v-email" placeholder="Email" style="height: 40px;">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><div style="position: relative;">Program Type</div></td>
                        <td>
                            <div style="position: relative;">
                                <select class="span3 txt validate v-required" id="apply_now_program_type" name="program_type" style="height: 40px;">
                                    <option value="">Select One</option>
                                    <option value="tr">Traditional</option>
                                    <option value="au">Adult Undergrad</option>
                                    <option value="ag">Adult Graduate</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr id="undergrad_programs">
                        <td><div style="position: relative;">Undergraduate Programs</div></td>
                        <td>
                            <div style="position: relative;">
                                <select class="span3 txt" id="au_program" name="undergrad_programs" style="height: 40px;">
                                    <option value="">Select</option>
                                    <?php 
                                        foreach($undergrad_programs as $undergrad_program) {
                                            echo "<option value='".$undergrad_program['elp_item_id']."'>".$undergrad_program['name']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr id="grad_programs">
                        <td><div style="position: relative;">Graduate Programs</div></td>
                        <td>
                            <div style="position: relative;">
                                <select class="span3 txt" id="ag_program" name="grad_program" style="height: 40px;">
                                    <option value="">Select</option>
                                    <?php 
                                        foreach($grad_programs as $grad_program) {
                                            echo "<option value='".$grad_program['elp_item_id']."'>".$grad_program['name']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </td>
                    </tr>
					<tr>
                        <td>
                            <br><br><input type="submit" class="btn-large btn-primary" value="Ready!" onclick="return submitApplication(this.form);">
                        </td>
                    </tr>
				</table>
                </form>	
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
        var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 3);
        piwikTracker.trackPageView();
        piwikTracker.enableLinkTracking();
        } catch( err ) {}
        </script><noscript><p><img src="http://analytics.learninghouse.com/piwik.php?idsite=3" style="border:0" alt="" /></p></noscript>
        <!-- End Piwik Tracking Code -->
	</body>
</html>

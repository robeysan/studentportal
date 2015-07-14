<div class="row toprow">
    <div class="span12">
        <div class="middle">
			<form class="form-horizontal" id="appform"  method="post" action="/">
				<div class="tabbable">
					<ul class="nav-tabs nav">
						<li id="personalTab" class="active">
							<a href="#personal" data-toggle="tab">Personal Information</a>
						</li>
						<li id="programTab">
							<a href="#program" data-toggle="tab">Program Information</a>
						</li>
						<li id="educationTab">
							<a href="#education" data-toggle="tab">Colleges Previously Attended</a>
						</li>
						<li id="additionalTab">
							<a href="#additional" data-toggle="tab">Additional Information</a>
						</li>
						<li id="otherInfoTab">
							<a href="#otherInfo" data-toggle="tab">Other Information</a>
						</li>
						<li id="otherCommentsTab">
							<a href="#otherComments" data-toggle="tab">Other Comments</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="personal">
							<fieldset class="heading-fieldset" id="personal-fieldset" title="Personal Information">
								<legend>Personal Information</legend>

								<!-- Applicant Name -->
								<fieldset class="control-group"><h3>Applicant Name</h3></fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="FirstName">First Name</label>
									<div class="controls">
										<input class="validate v-required" type="text" id="FirstName" name="FirstName" value=""  title="required">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="MiddleName">Middle Name</label>
									<div class="controls">
										<input type="text" id="MiddleName" name="MiddleName" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="LastName">Last Name</label>
									<div class="controls">
										<input class="validate v-required" type="text" id="LastName" name="LastName" value="" title="required">
									</div>
								</fieldset>								
								<fieldset class="control-group">
									<label class="control-label" for="suffix">Suffix</label>
									<div class="controls">
										<select id="suffix" name="suffix">
											<option value="">Select one</option>
											<option value="jr">Jr.</option>
											<option value="sr">Sr.</option>
										</select>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="previous_name">Previous Last Name or Maiden Name</label>
									<div class="controls">
										<input type="text" id="previous_name" name="previous_name" value="">
										<p class="help-block">Multiple names can be separated by commas.</p>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="sex">Gender</label>
									<div class="controls">
										<select  class="validate" id="sex" name="sex">
											<option value="">Select one</option>
											<option value="F">Female</option>
											<option value="male">Male</option>
										</select>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="birth_date">Date of Birth</label>
									<div class="controls">
										<input class="validate v-usDate datepicker" type="text" id="birth_date" name="birth_date" value="" title="Enter valid US Date">
										<p class="help-block">(mm/dd/yyyy)</p>
									</div>
								</fieldset>
								<!-- end Applicant Name -->

								<!-- Social Security Number -->
								<fieldset class="control-group"><h3>Social Security Number</h3></fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="SF_NO">Social Security Number (last four digits)</label>
									<div class="controls">
										<input class="v-required validate" maxlength="" type="text" id="SF_NO" name="SF_NO" value="">
										<p class="help-block">(If applicable, enter as ####)</p>
									</div>
								</fieldset>
								<!-- end Social Security Number -->

								<!-- Education -->
								<fieldset class="control-group"><h3>Education</h3></fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="education_level">What is the highest level of education you have earned?</label>
									<div class="controls">
										<select id="education_level" name="education_level" title="required">
											<option value="">Please select</option>
											<option value="some_hs">Some High School</option>
											<option value="hs">High School graduate</option>
											<option value="ged">Completed GED</option>
											<option value="some_college">Some college</option>
											<option value="associates">Associate's Degree</option>
											<option value="law_enforcement">Graduate of a Law Enforcement Training Academy</option>
											<option value="bachelors">Bachelor's Degree</option>
											<option value="masters">Master's Degree</option>
											<option value="doctoral">Doctoral Degree</option>
										</select>
									</div>
								</fieldset>
								<!-- end Education -->

								<!-- Current Address -->
								<fieldset class="control-group"><h3>Current Address</h3></fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="addr_line1_CA">Street Line 1</label>
									<div class="controls">
										<input class="validate v-required" type="text" id="addr_line1_CA" name="addr_line1_CA" value="" title="required">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="addr_line2_CA">Street Line 2</label>
									<div class="controls">
										<input class="validate" type="text" id="addr_line2_CA" name="addr_line2_CA" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="city_CA">City</label>
									<div class="controls">
										<input class="validate v-required" type="text" id="city_CA" name="city_CA" value="" title="required">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="st_ca">State</label>
									<div class="controls">
										<select  class="validate v-required" id="st_ca" name="st_ca" title="required">
											<?php echo($state_options); ?>
										</select>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="zip_CA">Zip/Postal Code</label>
									<div class="controls">
										<input class="validate v-required v-zip" type="text" id="zip_CA" name="zip_CA" value="" title="required">
									</div>
								</fieldset>
								<fieldset class="control-group" id="res_cty_CA-group">
									<label class="control-label" for="res_cty_CA">County</label>
									<div class="controls">
										<select  class="validate" id="res_cty_CA" name="res_cty_CA">
											<?php echo($county_options); ?>
										</select>
										<p class="help-block">(Ohio applicants only)</p>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="ctry_CA">Country</label>
									<div class="controls">
										<select  class="validate v-required" id="ctry_CA" name="ctry_CA" title="required">
											<?php echo($country_options); ?>
										</select>
									</div>
								</fieldset>
								<!-- end Current Address -->

								<!-- Permanent Address -->
								<fieldset class="control-group"><h3>Permanent Address</h3></fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="same_address">Is this the same as your current address?</label>
									<div class="controls">
										<input type="radio" name="same_address" value="yes" onclick=permSame()> Yes
										<input type="radio" name="same_address" value="no" checked> No 
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="Addr_Line1">Street Line 1</label>
									<div class="controls">
										<input class="validate v-required" type="text" id="Addr_Line1" name="Addr_Line1" value="" title="required">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="Addr_Line2">Street Line 2</label>
									<div class="controls">
										<input class="validate" type="text" id="Addr_Line2" name="Addr_Line2" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="City">City</label>
									<div class="controls">
										<input class="validate v-required" type="text" id="City" name="City" value="" title="required">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="st">State</label>
									<div class="controls">
										<select  class="validate v-required" id="st" name="st" title="required">
											<?php echo($state_options); ?>
										</select>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="zip">Zip/Postal Code</label>
									<div class="controls">
										<input class="validate v-required" type="text" id="zip" name="zip" value="" title="required">
									</div>
								</fieldset>
								<fieldset class="control-group" id="res_cty-group">
									<label class="control-label" for="res_cty">County</label>
									<div class="controls">
										<select  class="validate" id="res_cty" name="res_cty">
											<?php echo($county_options); ?>
										</select>
										<p class="help-block">(Ohio applicants only)</p>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="ctry">Country</label>
									<div class="controls">
										<select  class="validate v-required" id="ctry" name="ctry" title="required">
											<?php echo($country_options); ?>
										</select>
									</div>
								</fieldset>
								<!-- end Permanent Address -->

								<!-- Other Contact Information -->
								<fieldset class="control-group"><h3>Other Contact Information</h3></fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="phone">Home Phone</label>
									<div class="controls">
										<input class="validate v-required v-phone" type="text" id="phone" name="phone" value="" title="required">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="intl_access">International Access Code</label>
									<div class="controls">
										<input type="text" id="intl_access" name="intl_access" value="">
										<p class="help-block">(if applicable)</p>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="ndcellphone">Cell Phone</label>
									<div class="controls">
										<input class="validate v-phone" type="text" id="ndcellphone" name="ndcellphone" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="line1">Email</label>
									<div class="controls">
										<input class="validate v-email" type="text" id="line1" name="line1" value="" title="required">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="pref_contact">Best way to contact you</label>
									<div class="controls">	
										<select  class="validate" id="pref_contact" name="pref_contact">
											<option value="" selected="selected">Please select</option>
											<option value="home_phone">Home Phone</option>
											<option value="cell_phone">Cell Phone</option>
											<option value="email">Email</option>
										</select>
									</div>
								</fieldset>
								<!-- end Other Contact Information -->

								<!-- Marital Status -->
								<fieldset class="control-group"><h3>Marital Status</h3></fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="marital_status">Marital Status</label>
									<div class="controls">	
										<select  class="validate" id="marital_status" name="marital_status">
											<option value="" selected="selected">- Select -</option>
											<option value="S">Single</option>
											<option value="M">Married</option>
											<option value="D">Divorced</option>
											<option value="W">Widowed</option>
										</select>
									</div>
								</fieldset>
								<!-- end Marital Status -->

								<!-- us_citizenship -->
								<fieldset class="control-group"><h3>Citizenship</h3></fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="us_citizen">Are you a citizen of the United States?</label>
									<div class="controls">
										<input type="radio" id="us_citizen" name="us_citizen" value="Y" checked>Yes
										<input type="radio" id="us_citizen" name="us_citizen" value="N">No 
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="res_ctry">Please choose your country of citizenship.</label>
									<div class="controls">
										<select  class="validate v-required" id="res_ctry" name="res_ctry" title="required">
											<?php echo($country_options); ?>
										</select>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="Status">Please explain your status.</label>
									<div class="controls">
										<input class="" type="text" id="Status" name="Status" value="" title="required">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="Country_of_Birth">Please enter the country of your birth</label>
									<div class="controls">
										<select id="Country_of_Birth" name="Country_of_Birth">
											<?php echo($country_options); ?>
										</select>
									</div>
								</fieldset>
								<!-- end us_citizenship -->

								<!-- Ethnicity -->
								<fieldset class="control-group"><h3>Ethnicity</h3></fieldset>
								<fieldset class="control-group">
									<label class="control-label" class="blockLabel" for="ethnicity">Non-Hispanics/Latinos must select one or more of the following race categories, Hispanics/Latinos may select one or more of the following race categories:</label>
									<div class="controls">
										<select class="span4" id="ethnicity" name="ethnicity" size="6">
											<option value="AM"> American Indian or Alaska Native</option>
											<option value="AS"> Asian</option>
											<option value="BL"> Black or African American</option>
											<option value="PI"> Native Hawaiian or Other Pacific Islander</option>
											<option value="WH"> White</option>
											<option value="X" selected> Choose not to state</option>
										</select>
										<p class="help-block">(Use the CTRL or CMD key to make multiple selections.)</p>
									</div>
								</fieldset>		
								<fieldset class="control-group">
									<label class="control-label" class="blockLabel" for="hispanic">Are you Hispanic/Latino?</label>
									<div class="controls">
										<input type="radio" name="hispanic" id="hispanicY" value="Y"> Yes
										<input type="radio" name="hispanic" id="hispanicN" value="N" checked> No
									</div>
								</fieldset>
								<!-- end Ethnicity -->
								
								<!-- Religious Affiliation -->							
								<fieldset class="control-group"><h3>Religious Affiliation</h3></fieldset>
								<!-- end Religious Affiliation -->
								<fieldset class="control-group">
									<label class="control-label" for="religion">What is your religious affiliation?</label>
									<div class="controls">
										<select id="religion" name="religion" title="religion">
											<option value="BUDH">Buddhist</option>
											<option value="CATH">Roman Catholic</option>
											<option value="EAOR">Eastern Orthodox</option>
											<option value="JEW">Jewish</option>
											<option value="PROT">Protestant</option>
											<option value="NOND">Non-demoninational</option>
											<option value="OTHE">Other</option>
											<option value="X">Choose Not to State</option>
										</select>
									</div>
								</fieldset>
								<a data-toggle="tab"><input type="button" class="btn btn-primary" id="programButton" name="programButton" onclick="toProgram(1)" value="Program Information"></a>
							</fieldset>
						</div>
						<div class="tab-pane longtext" id="program">
							<fieldset class="heading-fieldset" id="program-fieldset" title="Program Information">
								<legend>Program Information</legend>
								<fieldset class="control-group">
									<label class="control-label" for="Student_type">Are you applying as an undergraduate, graduate, or continuing education student?</label>
									<div class="controls">
										<select class="validate v-required" id="Student_type" name="Student_type" title="required">
											<option value="">Please select</option>
											<option value="UNDG">Undergraduate</option>
											<option value="GRAD">Graduate</option>
											<option value="CONT">Continuing Education</option>
										</select>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="prog">What type of classes are you interested in?</label>
									<div class="controls">
										<select id="prog_interest" name="prog_interest" title="required">
											<option value="">Please select</option>
											<option value="ONLINE">Online</option>
											<option value="TRAD">Face to Face</option>
											<option value="BOTH">Online / Face to Face</option>
										</select>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="prog">Please choose the program or statement that best describes you:</label>
									<div class="controls">
										<select id="prog" name="prog" title="required">
										</select>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="major">Please choose your intended major:</label>
									<div class="controls">
										<select id="major" name="major" title="required">
										</select>
									</div>
								</fieldset>
								<fieldset class="control-group" id="license-group"> 
                 					<label class="control-label" for="license">License</label> 
                  						<div class="controls"> 
                    						<input class="validate" type="text" id="license" name="license" value="" > 
                 						</div> 
                				</fieldset> 
				                <fieldset class="control-group" id="license-st-group"> 
				                	<label class="control-label" for="license-st">State</label> 
				                		<div class="controls"> 
						                	<select  class="validate" id="license-st" name="license-st"> 
						                    	<?php echo($state_options); ?> 
						                    </select> 
				                	</div> 
				                </fieldset> 
								<fieldset class="control-group">
									<label class="control-label" for="subject1">Primary Content Area:</label>
									<div class="controls">
										<select id="subject1" name="subject1" title="required">
										</select>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="subject2">Secondary Content Area:</label>
									<div class="controls">
										<select id="subject2" name="subject2" title="required">
										</select>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="plan_enr_sess">What semester do you plan on enrolling?</label>
									<div class="controls">
										<select id="plan_enr_sess" name="plan_enr_sess" title="required">
											<option value="">Please select</option>
											<option value="Fall">Fall</option>
											<option value="Spring">Spring</option>
											<option value="Summer">Summer</option>
										</select>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="plan_enr_yr">What year do you plan on enrolling?</label>
									<div class="controls">
										<select id="plan_enr_yr" name="plan_enr_yr" title="required">
											<option value="">Please select</option>
											<option value="2012">2012</option>
											<option value="2013">2013</option>
										</select>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" class="blockLabel" for="intend_enr_hrs">Do you plan to enroll as full time or part time?</label>
									<div class="controls">
										<input type="radio" id="fulltime" name="intend_enr_hrs" value="fulltime"> Full-time
										<input type="radio" id="parttime" name="intend_enr_hrs" value="parttime" checked> Part-time
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" class="blockLabel" for="transfer">Are you a transfer student?</label>
									<div class="controls">
										<input type="radio" id="transfer_yes" name="transfer" value="yes"> Yes
										<input type="radio" id="transfer_no" name="transfer" value="no" checked> No
									</div>
								</fieldset>
							</fieldset>
							<a data-toggle="tab"><input type="button" class="btn" id="personalBackButton" name="personalBackButton" onclick="toPersonal(1)" value="Personal Information"></a>
							<a data-toggle="tab"><input type="button" class="btn btn-primary" id="educationButton" name="educationButton" onclick="toEducation(1)" value="Colleges Previously Attended"></a>
						</div>
						<div class="tab-pane" id="education">
							<fieldset class="heading-fieldset" id="education-fieldset" title="Colleges Previously Attended">
								<legend>Colleges Previously Attended</legend>
								<fieldset class="control-group">
									<h3>College/University 1</h3>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="college_name1">College/University</label>
									<div class="controls">
										<input class="span5" type="text" id="college_name1" name="college_name1" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="college_Ceeb1">CEEB</label>
									<div class="controls">
										<input class="span5" type="text" id="college_Ceeb1" name="college_Ceeb1" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="degree1">Degree received</label>
									<div class="controls">
										<input class="span5" type="text" id="degree1" name="degree1" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="degreedate1">Date of graduation</label>
									<div class="controls">
										<input class="datepicker span5" type="text" id="degreedate1" name="degreedate1" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<h3>College/University 2</h3>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="college_name2">College/University</label>
									<div class="controls">
										<input class="span5" type="text" id="college_name2" name="college_name2" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="college_ceeb2">CEEB</label>
									<div class="controls">
										<input class="span5" type="text" id="college_ceeb2" name="college_ceeb2" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="degree2">Degree received</label>
									<div class="controls">
										<input class="span5" type="text" id="degree2" name="degree2" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="degreedate2">Date of graduation</label>
									<div class="controls">
										<input class="span5 datepicker" type="text" id="degreedate2" name="degreedate2" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<h3>College/University 3</h3>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="college_name3">College/University</label>
									<div class="controls">
										<input class="span5" type="text" id="college_name3" name="college_name3" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="college_ceeb3">CEEB</label>
									<div class="controls">
										<input class="span5" type="text" id="college_ceeb3" name="college_ceeb3" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="degree3">Degree received</label>
									<div class="controls">
										<input class="span5" type="text" id="degree3" name="degree3" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="degreedate3">Date of graduation</label>
									<div class="controls">
										<input class="span5 datepicker" type="text" id="degreedate3" name="degreedate3" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<h3>College/University 4</h3>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="college_name4">College/University</label>
									<div class="controls">
										<input class="span5" type="text" id="college_name4" name="college_name4" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="college_ceeb4">CEEB</label>
									<div class="controls">
										<input class="span5" type="text" id="college_ceeb4" name="college_ceeb4" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="degree4">Degree received</label>
									<div class="controls">
										<input class="span5" type="text" id="degree4" name="degree4" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="degreedate4">Date of graduation</label>
									<div class="controls">
										<input class="span5 datepicker" type="text" id="degreedate4" name="degreedate4" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<h3>College/University 5</h3>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="college_name5">College/University</label>
									<div class="controls">
										<input class="span5" type="text" id="college_name5" name="college_name5" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="college_ceeb5">CEEB</label>
									<div class="controls">
										<input class="span5" type="text" id="college_ceeb5" name="college_ceeb5" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="degree5">Degree received</label>
									<div class="controls">
										<input class="span5" type="text" id="degree5" name="degree5" value="">
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="degreedate5">Date of graduation</label>
									<div class="controls">
										<input class="span5 datepicker" type="text" id="degreedate5" name="degreedate5" value="">
									</div>
								</fieldset>
							</fieldset>
							<a data-toggle="tab"><input type="button" class="btn" id="programBackButton" name="programBackButton" onclick="toProgram(1)" value="Program Information"></a>
							<a data-toggle="tab"><input type="button" class="btn btn-primary" id="additionalButton" name="additionalButton" onclick="toAdditional(1)" value="Additional Information"></a>
						</div>  <!-- Education -->
						<div class="tab-pane longtext" id="additional">
							<fieldset class="heading-fieldset" id="additional-fieldset" title="Additional Information">
								<legend>Additional Information</legend>
								<fieldset class="control-group">
									<h3>Additional Information</h3>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" class="blockLabel" for="previously_attended">Have you previously attended Notre Dame College?</label>
									<div class="controls">
										<p>
											<input type="radio" id="previously_attended" name="previously_attended" value="Y">
											Yes
											<input type="radio" id="previously_attended" name="previously_attended" value="N" checked>
											No
										</p>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" class="blockLabel" for="fa">Do you intend to apply for financial aid?</label>
									<div class="controls">
										<p>
											<input type="radio" id="fa" name="fa" value="Y">
											Yes
											<input type="radio" id="fa" name="fa" value="N" checked>
											No 
										</p>
										<p class="help-block">No impact on admissions decision; allows us to communicate with you about the financial aid timeline.</p>								
									</div>
								</fieldset>
								<fieldset class="control-group">
									<h3 class="header">Military Service</h3>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="vet_ben">Are you a veteran or the spouse/dependant of a veteran of the United States military?</label>
									<div class="controls">
										<select class="validate v-required" id="vet_ben" name="vet_ben" title="required">
											<option value="">Please select</option>
											<option value="N">No</option>
											<option value="V">I am currently serving in or am a veteran of the United States military.</option>
											<option value="D">I am the spouse of dependant of a veteran.</option>
										</select>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="milit_code">What branch of the military are you affiliated with?	</label>
									<div class="controls">
										<select id="milit_code" name="milit_code" title="required">
											<option value="">Please select</option>
											<option value="af">Air Force</option>
											<option value="army">Army</option>
											<option value="cg">Coast Guard</option>
											<option value="marines">Marine Corps</option>
											<option value="navy">Navy</option>
										</select>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="mil_date">Please provide the dates of your service.</label>
									<div class="controls">
										<input class="datepicker" type="text" id="mil_date" name="mil_date" value="">
									</div>
								</fieldset>
							</fieldset>
							<a data-toggle="tab"><input type="button" class="btn" id="educationBackButton" name="educationBackButton" onclick="toEducation()" value="Colleges Previously Attended"></a>
							<a data-toggle="tab"><input type="button" class="btn btn-primary" id="otherInfoButton" name="otherInfoButton" onclick="toOtherInfo(1)" value="Other Information"></a>
						</div>  <!-- Additional -->
						<div class="tab-pane longtext" id="otherInfo">
							<fieldset class="heading-fieldset" id="otherInfo-fieldset" title="Other Information">
								<legend>Other Information</legend>
								<fieldset class="control-group">
									<h3>Other Colleges</h3>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="other_colleges">To which other colleges will you apply? (Optional. Please note that your answer will not affect the decision made by the Committee on Admission, but is useful for recordkeeping purposes.)</label>
									<div class="controls">
										<textarea class="input-xlarge span8" maxlength="500" rows="10" id="other_colleges" name="other_colleges" value=""></textarea>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="aware">How did you first become aware of Notre Dame College?</label>
									<div class="controls">
										<select id="aware" name="aware" title="required">
											<option value="">Please select</option>
											<option value="ndc_web">Notre Dame College website</option>
											<option value="web">Other website</option>
											<option value="pub">Other publication</option>
											<option value="mail">Mailing</option>
											<option value="parents">Parents</option>
											<option value="relative">Other relatives</option>
											<option value="friend">Friend</option>
											<option value="ndc_alumni">NDC Alumni</option>
											<option value="ndc_counselor">NDC Admissions Counselor</option>
											<option value="ndc_coach">NDC Coach</option>
											<option value="ndc_faculty">NDC Faculty</option>
											<option value="ndc_staff">NDC Staff</option>
											<option value="student">Current NDC student</option>
											<option value="visit">Visit to Campus</option>
											<option value="counselor">School Guidance Counselor</option>
											<option value="teacher">Teacher at your School</option>
											<option value="coach">Coach at your School</option>
											<option value="fair">College Fair</option>
											<option value="tv">TV</option>
											<option value="radio">Radio</option>
											<option value="paper">Newspaper</option>
											<option value="other">Other</option>
										</select>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="influence">Which of the following influenced your decision to apply?</label>
									<div class="controls">
										<select id="influence" name="influence" title="required">
											<option value="">Please select</option>
											<option value="ndc_web">Notre Dame College website</option>
											<option value="web">Other website</option>
											<option value="pub">Other publication</option>
											<option value="mail">Mailing</option>
											<option value="parents">Parents</option>
											<option value="relative">Other relatives</option>
											<option value="friend">Friend</option>
											<option value="ndc_alumni">NDC Alumni</option>
											<option value="ndc_counselor">NDC Admissions Counselor</option>
											<option value="ndc_coach">NDC Coach</option>
											<option value="ndc_faculty">NDC Faculty</option>
											<option value="ndc_staff">NDC Staff</option>
											<option value="student">Current NDC student</option>
											<option value="visit">Visit to Campus</option>
											<option value="counselor">School Guidance Counselor</option>
											<option value="teacher">Teacher at your School</option>
											<option value="coach">Coach at your School</option>
											<option value="fair">College Fair</option>
											<option value="tv">TV</option>
											<option value="radio">Radio</option>
											<option value="paper">Newspaper</option>
											<option value="other">Other</option>
										</select>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<h3>Background Information</h3>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" class="blockLabel" for="suspended">Have you ever been suspended, expelled, or required to withdraw for disciplinary reasons from any high school or college?</label>
									<div class="controls">
										<p>
											<input type="radio" id="suspended" name="suspended" value="Y">
											Yes
											<input type="radio" id="suspended" name="suspended" value="N" checked>
											No </p>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="suspended_explain">If yes, please provide details including the school your case was heard in, the year of the incident and an explanation.</label>
									<div class="controls">
										<textarea class="input-xlarge span8" maxlength="500" rows="10" value="" id="suspended_explain" name="suspended_explain"></textarea>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" class="blockLabel" for="conviction">Have you ever been charged with, convicted of, or pled guilty or no contest to a felony or misdemeanor charge?</label>
									<div class="controls">
										<p>
											<input type="radio" id="conviction" name="conviction" value="Y">
											Yes
											<input type="radio" id="conviction" name="conviction" value="N" checked>
											No </p>
									</div>
								</fieldset>
								<fieldset class="control-group">
									<label class="control-label" for="conviction_explain">If yes, please provide details including the court your case was heard in, the year of the incident and an explanation.</label>
									<div class="controls">
										<textarea class="input-xlarge span8" maxlength="500" rows="10" value="" id="conviction_explain" name="conviction_explain"></textarea>
									</div>
								</fieldset>
							</fieldset>
							<a data-toggle="tab"><input type="button" class="btn" id="additionalBackButton" name="additionalBackButton" onclick="toAdditional(1)" value="Back To Additional Information"></a>
							<a data-toggle="tab"><input type="button" class="btn btn-primary" id="otherCommentsButton" name="otherCommentsButton" onclick="toOtherComments(1)" value="Other Comments"></a>
						</div>  <!-- otherInfo -->
						<div class="tab-pane" id="otherComments">
							<fieldset class="heading-fieldset" id="otherComments-fieldset" title="Other Comments">
								<legend>Other Comments</legend>
								<fieldset class="control-group">
									<label class="control-label" for="other_comments">Comments</label>
									<div class="controls">
										<textarea class="input-xlarge span8" id="other_comments" name="other_comments" maxlength="2000" rows="20" value=""></textarea>
									</div>
								</fieldset>
							</fieldset>
							<fieldset class="control-group">
								<a data-toggle="tab"><input type="button" class="btn" id="otherInfoBackButton" name="otherInfoBackButton" onclick="toOtherInfo(1)" value="Other Information"></a>
								<input type="button" class="btn btn-primary" id="completeButton" name="completeButton" onclick="app_complete()" value="Complete">
							</fieldset>
						</div>  <!-- otherComments -->
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
<script type="text/javascript" src="js/bootstrap-typeahead.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/fix_ie_dropdown.js"></script>
<![endif]-->

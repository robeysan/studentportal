<?php $this->config->set_item('piwik_id',5); ?>
<style type="text/css">
    p { display: inline; }
</style>
            <form class="form-horizontal" id="appform"  method="post" action="/">
                <div class="tabbable">
                    <ul class="nav-tabs nav">
                        <li id="personalTab" class="active">
                            <a href="#personal" data-toggle="tab">Personal Information</a>
                        </li>
                        <li id="educationTab">
                            <a href="#education" data-toggle="tab">Education Information</a>
                        </li>
                        <li id="additionalTab">
                            <a href="#additional" data-toggle="tab">Additional Information</a>
                        </li>
                        <li id="otherTab">
                            <a href="#other" data-toggle="tab">Other Information</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                            <fieldset class="heading-fieldset" id="personal-fieldset" title="Personal Information">
                                <legend>Personal Information</legend>

                                <!-- Applicant Name -->
                                <fieldset class="control-group"><h3>Applicant Name</h3></fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="ddlPrefix">Prefix</label>
                                    <div class="controls">
                                        <select id="ddlPrefix" name="ddlPrefix">
                                            <option value="">Please Select</option>
                                            <option value="Ms.">Ms.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Mr.">Mr.</option>
                                            <option value="Rev.">Rev.</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label bold" for="txtFName">First Name</label>
                                    <div class="controls">
                                        <input class="validate v-required" type="text" id="txtFName" name="txtFName" value=""  title="required">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtMiddleName">Middle Name</label>
                                    <div class="controls">
                                        <input type="text" id="txtMiddleName" name="txtMiddleName" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label bold" for="txtLName">Last Name</label>
                                    <div class="controls">
                                        <input class="validate v-required" type="text" id="txtLName" name="txtLName" value="" title="required">
                                    </div>
                                </fieldset>								
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtSuffix">Suffix (Jr, Sr, III, etc.)</label>
                                    <div class="controls">
                                        <input type="text" id="txtSuffix" name="txtSuffix" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtMaiden">Maiden Name</label>
                                    <div class="controls">
                                        <input type="text" id="txtMaiden" name="txtMaiden" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtFormer">Former Last Name</label>
                                    <div class="controls">
                                        <input type="text" id="txtFormer" name="txtFormer" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtPreferred">Preferred First Name</label>
                                    <div class="controls">
                                        <input type="text" id="txtPreferred" name="txtPreferred" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label bold" for="radGender">Gender</label>
                                    <div class="controls">
                                        <select  class="validate v-required" id="radGender" name="radGender">
                                            <option value="">Select one</option>
                                            <option value="female">Female</option>
                                            <option value="male">Male</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtSSN">Social Security Number</label>
                                    <div class="controls">
                                        <input maxlength="9"  type="text" id="txtSSN" name="txtSSN" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label bold" for="txtDOB">Date of Birth</label>
                                    <div class="controls">
                                        <input class="validate v-usDate" type="text" id="txtDOB" name="txtDOB" value="" title="Enter valid US Date">
                                        <p class="help-block">(mm-dd-yyyy)</p>
                                    </div>
                                </fieldset>
                                <!-- end Applicant Name -->

                                <!-- Permanent Address -->
                                <fieldset class="control-group"><h3>Permanent Address</h3></fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="ddlCountry">Country</label>
                                    <div class="controls">
                                        <select id="ddlCountry" name="ddlCountry">
                                            <?php echo($country_options); ?>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label bold" for="txtPermAdd">Street Line 1</label>
                                    <div class="controls">
                                        <input class="validate v-required" type="text" id="txtPermAdd" name="txtPermAdd" value="" title="required">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtPermAdd2">Street Line 2</label>
                                    <div class="controls">
                                        <input class="" type="text" id="txtPermAdd2" name="txtPermAdd2" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label bold" for="txtPermCity">City</label>
                                    <div class="controls">
                                        <input class="validate v-required" type="text" id="txtPermCity" name="txtPermCity" value="" title="required">
                                    </div>
                                </fieldset>
                                <fieldset id="state-zip-group">
                                    <fieldset class="control-group">
                                        <label class="control-label" for="ddlpermstate">State</label>
                                        <div class="controls">
                                            <select id="ddlpermstate" name="ddlpermstate" class="validate v-required">
                                                <?php echo($state_options); ?>
                                            </select>
                                        </div>
                                    </fieldset>
                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPermZip">Zip/Postal Code</label>
                                        <div class="controls">
                                            <input type="text" id="txtPermZip" name="txtPermZip">
                                        </div>
                                    </fieldset>
                                </fieldset>
                                <!-- end Permanent Address -->



                                <!-- Other Contact Information -->
                                <fieldset class="control-group"><h3>Other Contact Information</h3></fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label bold" for="txtEmailPer">Valid Email Address</label>
                                    <div class="controls">
                                        <input class="validate v-email" type="text" id="txtEmailPer" name="txtEmailPer" value="" title="required">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label bold" for="txtPhone">Phone</label>
                                    <div class="controls">
                                        <input class="validate v-phone" type="text" id="txtPhone" name="txtPhone" value="" title="required">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtPhoneCell">Cell Phone</label>
                                    <div class="controls">
                                        <input class="" type="text" id="txtPhoneCell" name="txtPhoneCell" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="radCanSendText">Is it okay to send you text messages?</label>
                                    <div class="controls">
                                        <p>
                                            <input type="radio" id="radCanSendText" name="radCanSendText" value="yes" checked="true"/>
                                            Yes
                                            <input type="radio" id="radCanSendText" name="radCanSendText" value="no"/>
                                            No 
                                        </p>
                                    </div>
                                </fieldset>

                                <!-- end Other Contact Information -->

                                <a data-toggle="tab"><input type="button" class="btn btn-primary" id="parentButton" name="parentButton" onclick="toEducation(1)" value="Continue to Education Information"></a>
                            </fieldset>
                        </div>
<div class="tab-pane" id="education">
                            <fieldset class="heading-fieldset" id="education-fieldset" title="Colleges Previously Attended">
                                <legend>Education Information</legend>
                                <fieldset class="control-group">
                                    <label class="control-label bold" for="ddlStatus">Entering Status</label>
                                    <div class="controls">
                                        <select class="validate v-required" id="ddlStatus" name="ddlStatus">
                                            <option value="">Please Select</option>
                                            <option value="freshman">Freshman</option>
                                            <option value="transfer">Transfer</option>
                                            <option value="postbacc">Post Baccalaureate/Colloquy</option>
                                            <option value="pseo">PSEO</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label bold" for="ddlTerm">What term are you applying for?</label>
                                    <div class="controls">
                                        <select class="validate v-required" id="ddlTerm" name="ddlTerm">
											<?php 
												foreach($term_options as $option) {
												    echo "<option value='".$option['value']."'>".$option['name']."</option>"; 
												}
											?>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label bold" for="ddlProgram">Please specify the major/certification you wish to study</label>
                                    <div class="controls">
                                        <select class="validate v-required" id="ddlProgram" name="ddlProgram">
                                            <option value="">Please Select</option>
											<?php 
												foreach($programs as $program) {
												    echo "<option value='" .$program['trad_id']. "'>".$program['name']."</option>"; 
												}
											?>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="minor-group control-group">
                                    <label class="control-label" for="ddlMinor">Program of Study: Minor</label>
                                    <div class="controls">
                                        <select id="ddlMinor" name="ddlMinor">
                                            <option value="">Please Select</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group" id="church-work-group">
                                	<label class="control-label" for="ddlAtts">Church Work Programs (if applicable)</label>
                                	<div class="controls">
                                		<select class="validate" id="ddlAtts" name="ddlAtts">
                                			<option value="">Please Select</option>
                                			<option value="DCE">Director of Christian Education</option>
                                			<option value="DCO">Director of Christian Outreach</option>
                                			<option value="DPM">Director of Parish Music</option>
                                			<option value="DEAC">Pre-Deaconess</option>
                                			<option value="PS">Pre-Seminary</option>
                                			<option value="TE">Lutheran Classroom Teacher</option>
                                		</select>
                                	</div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="radDivisionIIAthletics">Do you plan to participate in Division II Athletics?</label>
                                    <div class="controls">
                                        <p>
                                            <input type="radio" id="radDivisionIIAthletics" name="radDivisionIIAthletics" value="yes"/>
                                            Yes
                                            <input type="radio" id="radDivisionIIAthletics" name="radDivisionIIAthletics" value="" checked="true"/>
                                            No 
                                        </p>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="ddlSport">If yes, please select a sport</label>
                                    <div class="controls">
                                        <select class="" id="ddlSport" name="ddlSport">
                                            <option value="">Please Select</option>
                                            <option value="7S">Baseball (Men)</option>
                                            <option value="5S">Basketball (Men)</option>
                                            <option value="6S">Basketball (Women)</option>
                                            <option value="9S">Cross Country (Men)</option>
                                            <option value="9S">Cross Country (Women)</option>
                                            <option value="1S">Football (Men) </option>
                                            <option value="0C">Golf (Men)</option>
                                            <option value="0B">Golf (Women)</option>
                                            <option value="4S">Soccer (Women)</option>
                                            <option value="8S">Softball (Women)</option>
                                            <option value="0S">Track and Field (Men)</option>
                                            <option value="0S">Track and Field (Women)</option>
                                            <option value="2S">Volleyball (Women)</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="ddlExtracurricular">What extracurricular activities do you plan to participate in? (select up to two by using your control key)</label>
                                    <div class="controls">
                                        <select multiple="multiple" id="ddlTerm" name="ddlExtracurricular[]">
                                            <option value="6M">Art</option>
                                            <option value="2A">Band</option>
                                            <option value="9A">Cheerleading</option>
                                            <option value="3A">Choir</option>
                                            <option value="8A">Danceline</option>
                                            <option value="0A">Hand Bells</option>
                                            <option value="HP">Honor's Programs</option>
                                            <option value="6A">Newspaper</option>
                                            <option value="AJ">ROTC</option>
                                            <option value="1A">String Ensemble</option>
                                            <option value="4A">Student Government</option>
                                            <option value="AL">Study Abroad</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="radCollegeReadiness">Have you participated in a college readiness program? (AVID, College Possible, MEP, etc.) </label>
                                    <div class="controls">
                                        <p>
                                            <input type="radio" id="radCollegeReadiness" name="radCollegeReadiness" value="yes"/>
                                            Yes
                                            <input type="radio" id="radCollegeReadiness" name="radCollegeReadiness" value="no" checked="true"/>
                                            No 
                                        </p>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtCollegeReadiness">If yes, please list</label>
                                    <div class="controls">
                                        <input class="span5" type="text" id="txtCollegeReadiness" name="txtCollegeReadiness" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="radPhiThetaKappa">Are you a member of Phi Theta Kappa?</label>
                                    <div class="controls">
                                        <p>
                                            <input type="radio" id="radPhiThetaKappa" name="radPhiThetaKappa" value="yes"/>
                                            Yes
                                            <input type="radio" id="radPhiThetaKappa" name="radPhiThetaKappa" value="no" checked="true"/>
                                            No 
                                        </p>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtPhiThetaKappa">If yes, please list date of membership (MM/YY)</label>
                                    <div class="controls">
                                       <input class="span5" type="text" id="txtPhiThetaKappa" name="txtPhiThetaKappa" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group"><h3>High School</h3></fieldset>
                                 <fieldset class="control-group">
                                    <label class="control-label" for="txtHighSchoolName">High School Name</label>
                                    <div class="controls">
                                        <input class="span5" type="text" id="txtHighSchoolName" name="txtHighSchoolName" value="">
                                    </div>
                                </fieldset>
                                 <fieldset class="control-group">
                                    <label class="control-label" for="txtHighSchoolCity">High School City</label>
                                    <div class="controls">
                                        <input class="span5" type="text" id="txtHighSchoolCity" name="txtHighSchoolCity" value="">
                                    </div>
                                </fieldset>
                                 <fieldset class="control-group">
                                    <label class="control-label" for="ddlHighSchoolState">High School State</label>
                                    <div class="controls">
                                     <select class="" id="ddlHighSchoolState" name="ddlHighSchoolState"> 
                                            <?php echo($state_options); ?> 
                                    </select> 
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="radHomeSchooled">I am Homeschooled</label>
                                    <div class="controls">
                                        <p>
                                            <input type="radio" id="radHomeSchooled" name="radHomeSchooled" value="yes"/>
                                            Yes
                                            <input type="radio" id="radHomeSchooled" name="radHomeSchooled" value="" checked="true"/>
                                            No 
                                        </p>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="radGED">I have a GED</label>
                                    <div class="controls">
                                        <p>
                                            <input type="radio" id="radGED" name="radGED" value="yes"/>
                                            Yes
                                            <input type="radio" id="radGED" name="radGED" value="no" checked="true"/>
                                            No 
                                        </p>
                                    </div>
                                </fieldset>
                                 <fieldset class="control-group">
                                    <label class="control-label" for="txtHighSchoolGradYear">High School Graduation Year</label>
                                    <div class="controls">
                                        <input class="span5" type="text" id="txtHighSchoolGradYear" name="txtHighSchoolGradYear" value="">
                                    </div>
                                </fieldset>

                                <fieldset class="control-group"><h4>Please list the names of ALL colleges and technical schools attended:</h4></fieldset>
                                <fieldset class="control-group"><h3>Current/Most Recent College</h3></fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtPriorCollege1">College/University</label>
                                    <div class="controls">
                                        <input class="span5" type="text" id="txtPriorCollege1" name="txtPriorCollege1" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtCollegeCity1">City</label>
                                    <div class="controls">
                                        <input class="span5" type="text" id="txtCollegeCity1" name="txtCollegeCity1" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="ddlCollegeState1">State</label>
                                    <div class="controls"> 
                                        <select  class="" id="ddlCollegeState1" name="ddlCollegeState1"> 
                                            <?php echo($state_options); ?> 
                                        </select> 
                                    </div> 
                                </fieldset>
                                <fieldset id="undergrad_colleges">
                                    <fieldset class="control-group">
                                        <h3>Prior College #1</h3>
                                    </fieldset>
                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege2">College/University</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege2" name="txtPriorCollege2" value="">
                                        </div>
                                    </fieldset>
                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtCollegeCity2">City</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtCollegeCity2" name="txtCollegeCity2" value="">
                                        </div>
                                    </fieldset>
                                    <fieldset class="control-group">
                                        <label class="control-label" for="ddlCollegeState2">State</label>
                                        <div class="controls"> 
                                            <select  class="" id="ddlCollegeState2" name="ddlCollegeState2"> 
                                                <?php echo($state_options); ?> 
                                            </select> 
                                        </div> 
                                    </fieldset>
                                    <fieldset class="control-group">
                                        <h3>Prior College #2</h3>
                                    </fieldset>
                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege3">College/University</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege3" name="txtPriorCollege3" value="">
                                        </div>
                                    </fieldset>
                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtCollegeCity3">City</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtCollegeCity3" name="txtCollegeCity3" value="">
                                        </div>
                                    </fieldset>
                                    <fieldset class="control-group">
                                        <label class="control-label" for="ddlCollegeState3">State</label>
                                        <div class="controls"> 
                                            <select  class="" id="ddlCollegeState3" name="ddlCollegeState3"> 
                                                <?php echo($state_options); ?> 
                                            </select> 
                                        </div> 
                                    </fieldset>
                                    <fieldset class="control-group">
                                        <h3>Prior College #3</h3>
                                    </fieldset>
                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege4">College/University</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege4" name="txtPriorCollege4" value="">
                                        </div>
                                    </fieldset>
                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtCollegeCity4">City</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtCollegeCity4" name="txtCollegeCity4" value="">
                                        </div>
                                    </fieldset>
                                    <fieldset class="control-group">
                                        <label class="control-label" for="ddlCollegeState4">State</label>
                                        <div class="controls"> 
                                            <select  class="" id="ddlCollegeState4" name="ddlCollegeState4"> 
                                                <?php echo($state_options); ?> 
                                            </select> 
                                        </div> 
                                    </fieldset>
                                    <fieldset class="control-group">
                                        <h3>Prior College #4</h3>
                                    </fieldset>
                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege5">College/University</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege5" name="txtPriorCollege5" value="">
                                        </div>
                                    </fieldset>
                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtCollegeCity5">City</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtCollegeCity5" name="txtCollegeCity5" value="">
                                        </div>
                                    </fieldset>
                                    <fieldset class="control-group">
                                        <label class="control-label" for="ddlCollegeState5">State</label>
                                        <div class="controls"> 
                                            <select  class="" id="ddlCollegeState5" name="ddlCollegeState5"> 
                                                <?php echo($state_options); ?> 
                                            </select> 
                                        </div> 
                                    </fieldset>
                                </fieldset>
                            </fieldset>
                            <a data-toggle="tab"><input type="button" class="btn" id="employerBackButton" name="employerBackButton" onclick="toPersonal(1)" value="Back To Personal Information"></a>
                            <a data-toggle="tab"><input type="button" class="btn btn-primary" id="religiousButton" name="religiousButton" onclick="toAdditional(1)(1)" value="Continue to Additional Information"></a>
                        </div>  <!-- Education -->
                        <div class="tab-pane" id="additional">
                        	<fieldset class="heading-fieldset" id="additional-fieldset" title="Additional Information">
                                <legend>Additional Information</legend>
                                <fieldset class="control-group">
                                    <label class="control-label" for="ddlRelativesAttended">Have any of your relatives attended Concordia-St Paul?</label>
                                    <div class="controls">
                                        <select class="" id="ddlRelativesAttended" name="ddlRelativesAttended">
                                            <option value="">Please Select</option>
                                            <option value="A">Aunt</option>
                                            <option value="B">Brother</option>
                                            <option value="C">Cousin</option>
                                            <option value="F">Father</option>
                                            <option value="G">Grandparent</option>
                                            <option value="M">Mother</option>
                                            <option value="O">Spouse</option>
                                            <option value="S">Sister</option>
                                            <option value="U">Uncle</option>
                                            <option value="X">Multiple</option>
                                            <option value="Y">Other</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="ddlShirt">What is your shirt size?</label>
                                    <div class="controls">
                                        <select class="" id="ddlShirt" name="ddlShirt">
                                            <option value="">Please Select</option>
                                            <option value="XS">Extra Small</option>
                                            <option value="S">Small</option>
                                            <option value="M">Medium</option>
                                            <option value="L">Large</option>
                                            <option value="XL">Extra Large</option>
                                            <option value="XXL">Extra Extra Large</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="radFirstGeneration">Are you a first generation college student?</label>
                                    <div class="controls">
                                        <p>
                                            <input type="radio" id="radFirstGeneration" name="radFirstGeneration" value="yes"/>
                                            Yes
                                            <input type="radio" id="radFirstGeneration" name="radFirstGeneration" value="no" checked="true"/>
                                            No 
                                        </p>
                                    </div>
                                </fieldset>
                            <fieldset class="control-group"><h3>Guardian 1</h3></fieldset>
                            <fieldset class="control-group">
                                <label class="control-label" for="txtParent1FirstName">Guardian First Name</label>
                                    <div class="controls">
                                        <input type="text" id="txtParent1FirstName" name="txtParent1FirstName" value="">
                                    </div>
                             </fieldset>
                            <fieldset class="control-group">
                                <label class="control-label" for="txtParent1LastName">Guardian Last Name</label>
                                    <div class="controls">
                                        <input type="text" id="txtParent1LastName" name="txtParent1LastName" value="">
                                    </div>
                            </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="ddlParent1Relation">Guardian Relation</label>
                                    <div class="controls">
                                        <select class="" id="ddlParent1Relation" name="ddlParent1Relation">
                                            <option value="">Please Select</option>
                                            <option value="M">Mother</option>
                                            <option value="F">Father</option>
                                            <option value="D">Guardian</option>
                                            <option value="O">Spouse</option>
                                            <option value="H">Stepmother</option>
                                            <option value="I">Stepfather</option>
                                            <option value="G">Grandparent</option>
                                            <option value="O">Other</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtParent1Add">Guardian Address</label>
                                    <div class="controls">
                                        <input type="text" id="txtParent1Add" name="txtParent1Add" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtParent1City">Guardian City</label>
                                    <div class="controls">
                                        <input type="text" id="txtParent1City" name="txtParent1City" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="ddlParent1State">Guardian State</label>
                                    <div class="controls">
                                        <select id="ddlParent1State" name="ddlParent1State">
                                            <?php echo($state_options); ?>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtParent1Zip">Zip Code</label>
                                    <div class="controls">
                                        <input class="" type="text" id="txtParent1Zip" name="txtParent1Zip" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtParent1Phone">Guardian Phone</label>
                                    <div class="controls">
                                        <input type="text" id="txtParent1Phone" name="txtParent1Phone" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtParent1Email">Guardian Email</label>
                                    <div class="controls">
                                        <input type="text" id="txtParent1Email" name="txtParent1Email" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group"><h3>Guardian 2</h3></fieldset>
                            <fieldset class="control-group">
                                <label class="control-label" for="txtParent2FirstName">Guardian First Name</label>
                                    <div class="controls">
                                        <input type="text" id="txtParent2FirstName" name="txtParent2FirstName" value="">
                                    </div>
                             </fieldset>
                            <fieldset class="control-group">
                                <label class="control-label" for="txtParent2LastName">Guardian Last Name</label>
                                    <div class="controls">
                                        <input type="text" id="txtParent2LastName" name="txtParent2LastName" value="">
                                    </div>
                            </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="ddlParent2Relation">Guardian Relation</label>
                                    <div class="controls">
                                        <select class="" id="ddlParent2Relation" name="ddlParent2Relation">
                                            <option value="">Please Select</option>
                                            <option value="M">Mother</option>
                                            <option value="F">Father</option>
                                            <option value="D">Guardian</option>
                                            <option value="O">Spouse</option>
                                            <option value="H">Stepmother</option>
                                            <option value="I">Stepfather</option>
                                            <option value="G">Grandparent</option>
                                            <option value="O">Other</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtParent2Add">Guardian Address</label>
                                    <div class="controls">
                                        <input type="text" id="txtParent2Add" name="txtParent2Add" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtParent1City">Guardian City</label>
                                    <div class="controls">
                                        <input type="text" id="txtParent2City" name="txtParent2City" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="ddlParent1State">Guardian State</label>
                                    <div class="controls">
                                        <select id="ddlParent2State" name="ddlParent2State">
                                            <?php echo($state_options); ?>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtParent2Zip">Zip Code</label>
                                    <div class="controls">
                                        <input class="" type="text" id="txtParent2Zip" name="txtParent2Zip" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtParent2Phone">Guardian Phone</label>
                                    <div class="controls">
                                        <input type="text" id="txtParent2Phone" name="txtParent2Phone" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtParent2Email">Guardian Email</label>
                                    <div class="controls">
                                        <input type="text" id="txtParent2Email" name="txtParent2Email" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group"><h3>Siblings</h3></fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtSibling1FirstName">Sibling First Name</label>
                                    <div class="controls">
                                        <input type="text" id="txtSibling1FirstName" name="txtSibling1FirstName" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtSibling1LastName">Sibling Last Name</label>
                                    <div class="controls">
                                        <input type="text" id="txtSibling1FirstName" name="txtSibling1LastName" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtSibling1Age">Sibling Age</label>
                                    <div class="controls">
                                        <input type="text" id="txtSibling1Age" name="txtSibling1Age" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtSibling1School">Sibling School</label>
                                    <div class="controls">
                                        <input type="text" id="txtSibling1School" name="txtSibling1School" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtSibling1GradYear">Sibling Year of High School Graduation</label>
                                    <div class="controls">
                                        <input class="span5" type="text" id="txtSibling1GradYear" name="txtSibling1GradYear" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtSibling2FirstName">Second Sibling First Name</label>
                                    <div class="controls">
                                        <input type="text" id="txtSibling1FirstName" name="txtSibling2FirstName" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtSibling2LastName">Second Sibling Last Name</label>
                                    <div class="controls">
                                        <input type="text" id="txtSibling2LastName" name="txtSibling2LastName" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtSibling2Age">Second Sibling Age</label>
                                    <div class="controls">
                                        <input type="text" id="txtSibling2Age" name="txtSibling2Age" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtSibling2School">Second Sibling School</label>
                                    <div class="controls">
                                        <input type="text" id="txtSibling2School" name="txtSibling2School" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtSibling2GradYear">Second Sibling Year of High School Graduation</label>
                                    <div class="controls">
                                        <input class="span5" type="text" id="txtSibling2GradYear" name="txtSibling2GradYear" value="">
                                    </div>
                                </fieldset>
                            <a data-toggle="tab"><input type="button" class="btn" id="personalBackButton" name="personalBackButton" onclick="toEducation(1)" value="Back To Education Information"></a>
                            <a data-toggle="tab"><input type="button" class="btn btn-primary" id="otherButton" name="otherButton" onclick="toOther(1)(1)" value="Continue to Other Information"></a>
                        </div> <!-- Additional Information -->
                            <div class="tab-pane longtext" id="other">
                            <fieldset class="heading-fieldset" id="otherInfo-fieldset" title="Other Information">
                                <legend>Other Information</legend>
  <fieldset class="control-group"><h3>Religious Affiliation (optional)</h3></fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="ddlAffiliation">What is your religious affiliation?</label>
                                    <div class="controls">
                                        <select id="ddlAffiliation" name="ddlAffiliation">
                                            <option value="NR">Not Reported</option>
                                            <option value="AF">African Methodist Episcopal</option>
                                            <option value="AS">Assembly of God</option>
                                            <option value="AT">Atheist</option>
                                            <option value="BA">Baptist</option>
                                            <option value="BI">Bible Church</option>
                                            <option value="BU">Buddhist</option>
                                            <option value="CB">Church of the Brethren</option>
                                            <option value="CC">Church of Christ</option>
                                            <option value="CF">Christian Fellowship</option>
                                            <option value="CG">Church of God</option>
                                            <option value="CH">Christian</option>
                                            <option value="CL">Church of Lutheran Brethren</option>
                                            <option value="CN">Church of the Nazarene</option>
                                            <option value="CO">Congregational</option>
                                            <option value="DI">Disciples of Christ</option>
                                            <option value="EA">Eastern Orthodox</option>
                                            <option value="EP">Episcopal</option>
                                            <option value="EV">Evangelical</option>
                                            <option value="GR">Greek Orthodox</option>
                                            <option value="HI">Hindu</option>
                                            <option value="IN">Independent</option>
                                            <option value="JE">Jewish</option>
                                            <option value="LC">Lutheran-Canada</option>
                                            <option value="LE">Lutheran-ELCA</option>
                                            <option value="LM">Lutheran-Missouri</option>
                                            <option value="LO">Lutheran-Other</option>
                                            <option value="LW">Lutheran-Wisconsin</option>
                                            <option value="ME">Methodist</option>
                                            <option value="MN">Mennonite</option>
                                            <option value="MO">Mormon</option>
                                            <option value="MU">Muslim</option>
                                            <option value="NO">No Church Affiliation</option>
                                            <option value="NA">Non-affiliated Christian</option>
                                            <option value="NC">Non-Christian</option>
                                            <option value="ND">Community(Non-Denominational)</option>
                                            <option value="OP">Other Protestant</option>
                                            <option value="OT">Other</option>
                                            <option value="PE">Pentecostal</option>
                                            <option value="PR">Presbyterian</option>
                                            <option value="RC">Roman Catholic</option>
                                            <option value="RE">Reformed</option>
                                            <option value="SE">Seventh Day Adventist</option>
                                            <option value="SH">Shamanism</option>
                                            <option value="SO">Society of Friends</option>
                                            <option value="UC">United Church of Christ</option>
                                            <option value="UM">United Methodist</option>
                                            <option value="UP">United Presbyterian</option>
                                            <option value="WE">Wesleyan</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <div id="congregation_info" style="display:none">
                                    <fieldset class="control-group"><h5>If you are a member of the Lutheran Church Missouri Synod, enter your church name and address below.</h5></fieldset>
                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtCong">What is the name of your home congregation?</label>
                                        <div class="controls"> 
                                            <input type="text" id="txtCong" name="txtCong" value="">
                                        </div> 
                                    </fieldset>
                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtCongStreet">What is your home congregation street?</label>
                                        <div class="controls"> 
                                            <input type="text" id="txtCongStreet" name="txtCongStreet" value="">
                                        </div> 
                                    </fieldset>
                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtCongCity">What is your home congregation city?</label>
                                        <div class="controls"> 
                                            <input type="text" id="txtCongCity" name="txtCongCity" value="">
                                        </div> 
                                    </fieldset>
                                    <fieldset class="control-group">
                                        <label class="control-label" for="ddlCongState">What is your home congregation state?</label>
                                        <div class="controls"> 
                                            <select  class="" id="ddlCongState" name="ddlCongState"> 
                                                <?php echo($state_options); ?> 
                                            </select> 
                                        </div> 
                                    </fieldset>
                                </div>
                                <! -- end religion affil -->
                                <!-- us_citizenship -->
                                <fieldset class="control-group"><h3>Citizenship</h3></fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label bold" for="ddlCitizen">Are you a citizen of the United States?</label>
                                    <div class="controls">
                                        <select class="validate v-required" id="ddlCitizen" name="ddlCitizen">
                                            <option value="">Please Select</option>
                                            <option value="Y">Citizen</option>
                                            <option value="N">Non-Citizen</option>
                                            <option value="P">Permanent Resident</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group"><h3>Ethnicity (optional)</h3></fieldset>
                                <fieldset class="control-group"><h4>Mark all that apply (by using your control key)</h4></fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="ddlEthnicity">What is your Ethnicity?</label>
                                    <div class="controls">
                                        <select multiple="multiple" class="" id="ddlEthnicity" name="ddlEthnicity[]">
                                            <option value="1">American Indian or Alaskan Native</option>
                                            <option value="2">Asian</option>
                                            <option value="5">White</option>
                                            <option value="7">Hispanic or Latino</option>
                                            <option value="3">Black or African American</option>
                                            <option value="4">Native Hawaiian or Pacific Islander</option>
                                            <option value="6">Prefer not to respond</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <!-- end us_citizenship -->

                                <fieldset class="control-group">
                                    <h3 class="header">Military Service</h3>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="radmilitary">Are you serving/have you served in the military?</label>
                                    <div class="controls">
                                        <p>
                                            <input type="radio" id="radmilitary" name="radmilitary" value="yes"/>
                                            Yes
                                            <input type="radio" id="radmilitary" name="radmilitary" value="no" checked="true"/>
                                            No 
                                        </p>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="radGi">If yes, do you plan to use your military benefits at Concordia?</label>
                                    <div class="controls">
                                        <p>
                                            <input type="radio" id="radGi" name="radGi" value="yes"/>
                                            Yes
                                            <input type="radio" id="radGi" name="radGi" value="no" checked="true"/>
                                            No 
                                        </p>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <h3>Background Information</h3>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label bold" class="blockLabel" for="radFelony">Have you ever been charged with, convicted of, or pled guilty or no contest to a felony or misdemeanor charge?</label>
                                    <div class="controls">
                                        <p>
                                            <input class="validate v-requiredradio" type="radio" id="radFelony" name="radFelony" value="yes" title="Required" />
                                            Yes
                                            <input class="validate v-requiredradio" type="radio" id="radFelony" name="radFelony" value="no" title="Required" />
                                            No 
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="txtFelony_Explain">If yes, please provide details including the court your case was heard in, the year of the incident and an explanation.</label>
                                    <div class="controls">
                                        <textarea class="input-xlarge span6" maxlength="500" rows="10" value="" id="txtFelony_Explain" name="txtFelony_Explain"></textarea>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="radLiveOnCampus">Do you plan to live on campus?</label>
                                    <div class="controls">
                                        <p>
                                            <input type="radio" id="radLiveOnCampus" name="radLiveOnCampus" value="yes"/>
                                            Yes
                                            <input type="radio" id="radLiveOnCampus" name="radLiveOnCampus" value="no" />
                                            No 
                                        </p>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label bold" for="FinAid">Do you plan to apply for Financial Aid?</label>
                                    <div class="controls">
                                        <p>
                                            <input class="validate v-requiredradio" type="radio" id="FinAid" name="FinAid" value="yes" title="Required"/>
                                            Yes
                                            <input class="validate v-requiredradio" type="radio" id="FinAid" name="FinAid" value="no" title="Required"/>
                                            No 
                                        </p>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="radFinancialAidResidency">Before becoming at least a half-time student at a Minnesota post-secondary institution, did you, or will you reside in Minnesota for 12 consecutive months?</label>
                                    <div class="controls">
                                        <p>
                                            <input type="radio" id="radFinancialAidResidency" name="radFinancialAidResidency" value="yes"/>
                                            Yes
                                            <input type="radio" id="radFinancialAidResidency" name="radFinancialAidResidency" value="no" checked="true"/>
                                            No 
                                        </p>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="radHighSchoolGraduate">By July 1, 2013 will you have graduated from a Minnesota high school while residing in Minnesota?</label>
                                    <div class="controls">
                                        <p>
                                            <input type="radio" id="radHighSchoolGraduate" name="radHighSchoolGraduate" value="yes"/>
                                            Yes
                                            <input type="radio" id="radHighSchoolGraduate" name="radHighSchoolGraduate" value="no" checked="true"/>
                                            No 
                                        </p>
                                    </div>
                                </fieldset>
                                <div id="reimburse" style="display:none;">
                                 <fieldset class="control-group howPay">
                                    <label class="control-label" for="Reimburse">How do you plan to fund your education?</label>
                                    <div class="controls">
                                        <p>
                                            <select id="Reimburse" name="Reimburse">
                                                <option name="Reimburse" value="">Employer Reimbursement</option>
                                                <option name="Reimburse" value="">Personal Finances</option>
                                                <option name="Reimburse" value="">Outside Resources</option>
                                                <option name="Reimburse" value="">Other</option>
                                            </select>
                                        </p>
                                    </div>
                                </fieldset>
                            </div>

                                <fieldset class="control-group">
                                    <label class="control-label" for="ddlHear">How did you hear about Concordia?</label>
                                    <div class="controls">
                                        <select id="ddlHear" name="ddlHear">
                                            <option value="">Please Select</option>
                                            <option value="ADVERTISEMENT">Advertisement</option>
                                            <option value="CAMPUSVISIT">Campus Visit</option>
                                            <option value="COACH">Coach</option>
                                            <option value="COLLEGEFAIR">College Fair</option>
                                            <option value="ALUMNUS">Concordia Alumnus</option>
                                            <option value="MAILER">Concordia Mailer</option>
                                            <option value="WEBSITE">Concordia Website</option>
                                            <option value="FRIEND/RELATIVE">Friend/Relative</option>
                                            <option value="COUNSELOR">High School Counselor</option>
                                            <option value="HIGHSCHOOLVISIT">High School Visit</option>
                                            <option value="INTERNET">Internet</option>
                                            <option value="WNEWSPA">Magazine/Newspaper Article</option>
                                            <option value="PASTOR">Pastor/Youth Leader</option>
                                            <option value="WRADIO">Heard on Radio</option>
                                            <option value="WOTHER">Other</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <div class="alert alert-block">
                                    Concordia University- St. Paul is registered as a private institution with the Minnesota Office of Higher Education pursuant to sections 136A.61 to 136A.71. Registration is not an endorsement of the institution. Credits earned at the institution may not transfer to all other institutions.
                                </div>
                                <div class="alert alert-block">
                                    I hereby give Concordia University, St. Paul permission to use my likeness in any promotional or news release generated by the university or any agent appointed by the university. This information may contain photos, quotes, or statistical information about myself. I also give Concordia University the permission to print my name in regard to any honors I receive from the university. If you are not in agreement with these terms, please contact the Office of Admissions directly.
                                </div>
                                <div class="alert alert-block">
                                    I hereby certify that all information given on this application is complete and accurate to the best of my knowledge. 
                                </div>
                                <input id="chkAgree" type="checkbox" name="chkAgree"/> <span class="bold">I agree to the above terms</span>
                            </fieldset>
                            <a data-toggle="tab"><input type="button" class="btn" id="additionalBackButton" name="additionalBackButton" onclick="toAdditional(1)" value="Back To Additional Information"/></a>
                            <input type="button" class="btn btn-primary" id="completeButton" name="completeButton" onclick="app_complete(1, 1)" value="Complete"/>
                        </div>  <!-- otherInfo -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/bootstrap-typeahead.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="/js/fix_ie_dropdown.js"></script>
<![endif]-->


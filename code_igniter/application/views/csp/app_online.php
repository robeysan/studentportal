            <form class="form-horizontal" id="appform"  method="post" action="/">
                <div class="tabbable">
                    <ul class="nav-tabs nav">
                        <li id="personalTab" class="active">
                            <a href="#personal" data-toggle="tab">Personal Information</a>
                        </li>
                        <li id="employerTab">
                            <a href="#employer" data-toggle="tab">Employer Information</a>
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
                                    <label class="control-label" for="txtFName">First Name</label>
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
                                    <label class="control-label" for="txtLName">Last Name</label>
                                    <div class="controls">
                                        <input class="validate v-required" type="text" id="txtLName" name="txtLName" value="" title="required">
                                    </div>
                                </fieldset>								
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtSuffix">Suffix</label>
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
                                    <label class="control-label" for="txtFormer">Former Name</label>
                                    <div class="controls">
                                        <input type="text" id="txtFormer" name="txtFormer" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtPreferred">Preferred Name</label>
                                    <div class="controls">
                                        <input type="text" id="txtPreferred" name="txtPreferred" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="radGender">Gender</label>
                                    <div class="controls">
                                        <select  class="validate v-required" id="radGender" name="radGender">
                                            <option value="">Select one</option>
                                            <option value="female">Female</option>
                                            <option value="male">Male</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtDOB">Date of Birth</label>
                                    <div class="controls">
                                        <input class="validate v-usDate datepicker" type="text" id="txtDOB" name="txtDOB" value="" title="Enter valid US Date">
                                        <p class="help-block">(mm-dd-yyyy)</p>
                                    </div>
                                </fieldset>
                                <!-- end Applicant Name -->

                                <!-- Social Security Number -->
                                <fieldset class="control-group"><h3>Social Security Number</h3></fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtSSN">Social Security Number</label>
                                    <div class="controls">
                                        <input type="text" id="txtSSN" maxlength="9" name="txtSSN" value="">
                                    </div>
                                </fieldset>
                                <!-- end Social Security Number -->

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
                                    <label class="control-label" for="txtPermAdd">Street Line 1</label>
                                    <div class="controls">
                                        <input class="validate v-required" type="text" id="txtPermAdd" name="txtPermAdd" value="" title="required">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtPermAdd2">Street Line 2</label>
                                    <div class="controls">
                                        <input class="validate" type="text" id="txtPermAdd2" name="txtPermAdd2" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtPermCity">City</label>
                                    <div class="controls">
                                        <input class="validate v-required" type="text" id="txtPermCity" name="txtPermCity" value="" title="required">
                                    </div>
                                </fieldset>
                                <fieldset id="state-zip-group" style="display:none">
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
                                    <label class="control-label" for="txtPhone">Preferred Phone</label>
                                    <div class="controls">
                                        <input class="validate v-phone" type="text" id="txtPhone" name="txtPhone" value="" title="required">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtPhoneCell">Cell Phone</label>
                                    <div class="controls">
                                        <input class="validate" type="text" id="txtPhoneCell" name="txtPhoneCell" value="">
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="txtEmailPer">Personal Email</label>
                                    <div class="controls">
                                        <input class="validate v-email" type="text" id="txtEmailPer" name="txtEmailPer" value="" title="required">
                                    </div>
                                </fieldset>
                                <!-- end Other Contact Information -->

                                <a data-toggle="tab"><input type="button" class="btn btn-primary" id="employerButton" name="emplyerButton" onclick="toEmployer(1)" value="Employer Information"></a>
                            </fieldset>
                        </div>
                        <div class="tab-pane" id="employer">
                            <fieldset class="heading-fieldset" id="employer-fieldset" title="Employer Information">
                                <legend>Employer Information</legend>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtEmp">Employer</label>
                                    <div class="controls">
                                        <input type="text" id="txtEmp" name="txtEmp" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtEmpTitle">Title Held</label>
                                    <div class="controls">
                                        <input type="text" id="txtEmpTitle" name="txtEmpTitle" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtEmpAdd">Address</label>
                                    <div class="controls">
                                        <input type="text" id="txtEmpAdd" name="txtEmpAdd" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtEmpCity">City</label>
                                    <div class="controls">
                                        <input type="text" id="txtEmpCity" name="txtEmpCity" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="ddlempstate">State</label>
                                    <div class="controls">
                                        <select id="ddlempstate" name="ddlempstate">
                                            <?php echo($state_options); ?>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtEmpZip">Zip Code</label>
                                    <div class="controls">
                                        <input class="validate v-nrZip" type="text" id="txtEmpZip" name="txtEmpZip" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtWorkPhone">Work Phone</label>
                                    <div class="controls">
                                        <input type="text" id="txtWorkPhone" name="txtWorkPhone" value="">
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtEmailWork">Work Email</label>
                                    <div class="controls">
                                        <input class="validate v-nrEmail" type="text" id="txtEmailWork" name="txtEmailWork" value="" title="">
                                    </div>
                                </fieldset>
                            </fieldset>
                            <a data-toggle="tab"><input type="button" class="btn" id="personalBackButton" name="personalBackButton" onclick="toPersonal(1)" value="Back To Personal Information"></a>
                            <a data-toggle="tab"><input type="button" class="btn btn-primary" id="educationButton" name="educationButton" onclick="toEducation(1)" value="Education Information"></a>
                        </div>
                        <div class="tab-pane" id="education">
                            <fieldset class="heading-fieldset" id="education-fieldset">
                                <legend>Education Information</legend>
                                <fieldset class="control-group">
                                    <label class="control-label" for="ddlTerm">Term of Entry</label>
                                    <div class="controls">
                                        <select class="validate v-required" id="ddlTerm" name="ddlTerm">
                                            <option value="">Please Select</option>
                                            <option value="201330">Summer 2013</option>
                                            <option value="201410">Fall 2013</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="ddlProgram">Program</label>
                                    <div class="controls">
                                        <select class="validate v-required" id="ddlProgram" name="ddlProgram">
                                            <option value=""<?php echo ((isset($user['client_program_id']) || $user['client_program_id'])?'':' selected="selected"'); ?>>Please Select</option>
<?php 
                foreach($programs as $program) {
                    echo "<option value='".$program['program_id']."'".(($program['program_id']==$user['client_program_id'])?" selected='selected'":"").">".$program['name']."</option>"; 
                }
?>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="ddlLocation">Please select a location</label>
                                    <div class="controls">
                                        <select id="ddlLocation" name="ddlLocation">
                                            <option value="">Please Select</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="ddlHear">How did you hear about Concordia?</label>
                                    <div class="controls">
                                        <select id="ddlHear" name="ddlHear">
                                            <option value="">Please Select</option>
                                            <option value="WBILLBOARD">Saw on Billboard</option>
                                            <option value="WCOLFAIR">Saw at College Fair</option>
                                            <option value="WCONFERENCE">Saw at Conference</option>
                                            <option value="WINTERNET">Internet/E-mail</option>
                                            <option value="WPROPUB">Professional Publication</option>
                                            <option value="WNEWSPA">Newspaper</option>
                                            <option value="WRADIO">Heard on Radio</option>
                                            <option value="WREFALUM">Referred by an Alum</option>
                                            <option value="WREFCOMC">Referred by Community College</option>
                                            <option value="WREFWOM">Word of Mouth</option>
                                            <option value="WOTHER">Other</option>
                                        </select>
                                    </div>
                                </fieldset>
<?php 
                if($user_type == "ND") {
                    echo "<legend>Colleges Previously Attended</legend>";
                } else if($user_type == "NG") {
                    echo "<legend>College where bachelor's degree was received</legend>";
                } else {
                    echo "<legend>College where bachelor's degree was received</legend>";
                }
?>
                                <fieldset class="control-group">
<?php
                if($user_type == "ND") {
                    echo "<h3>Most Recent College</h3>";
                }
                else {
                    echo "<h3>College</h3>";
                }
?>
                                </fieldset>
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
                                        <select  class="validate" id="ddlCollegeState1" name="ddlCollegeState1"> 
                                            <?php echo($state_options); ?> 
                                        </select> 
                                    </div> 
                                </fieldset>
                                <fieldset id="undergrad_colleges">
                                    <fieldset class="control-group">
                                        <h3>Prior College #2</h3>
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
                                            <select  class="validate" id="ddlCollegeState2" name="ddlCollegeState2"> 
                                                <?php echo($state_options); ?> 
                                            </select> 
                                        </div> 
                                    </fieldset>
                                    <fieldset class="control-group">
                                        <h3>Prior College #3</h3>
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
                                            <select  class="validate" id="ddlCollegeState3" name="ddlCollegeState3"> 
                                                <?php echo($state_options); ?> 
                                            </select> 
                                        </div> 
                                    </fieldset>
                                    <fieldset class="control-group">
                                        <h3>Prior College #4</h3>
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
                                            <select  class="validate" id="ddlCollegeState4" name="ddlCollegeState4"> 
                                                <?php echo($state_options); ?> 
                                            </select> 
                                        </div> 
                                    </fieldset>
                                    <fieldset class="control-group">
                                        <h3>Prior College #5</h3>
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
                                            <select  class="validate" id="ddlCollegeState5" name="ddlCollegeState5"> 
                                                <?php echo($state_options); ?> 
                                            </select> 
                                        </div> 
                                    </fieldset>
                                </fieldset>
                            </fieldset>
                            <a data-toggle="tab"><input type="button" class="btn" id="employerBackButton" name="employerBackButton" onclick="toEmployer(1)" value="Back To Employer Information"></a>
                            <a data-toggle="tab"><input type="button" class="btn btn-primary" id="religiousButton" name="religiousButton" onclick="toAdditional(1)(1)" value="Additional Information"></a>
                        </div>  <!-- Education -->

                        <div class="tab-pane longtext" id="additional">
                            <fieldset class="heading-fieldset" id="additional-fieldset" title="Additional Information">
                                <legend>Additional Information</legend>
                            <!-- Religious Affiliation -->	
                                <fieldset class="control-group"><h3>Religious Affiliation</h3></fieldset>
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
                                            <select  class="validate" id="ddlCongState" name="ddlCongState"> 
                                                <?php echo($state_options); ?> 
                                            </select> 
                                        </div> 
                                    </fieldset>
                                </div>
                                <! -- end religion affil -->
                                <!-- us_citizenship -->
                                <fieldset class="control-group"><h3>Citizenship</h3></fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="ddlCitizen">Are you a citizen of the United States?</label>
                                    <div class="controls">
                                        <select class="validate v-required" id="ddlCitizen" name="ddlCitizen">
                                            <option value="">Please Select</option>
                                            <option value="Y">Citizen</option>
                                            <option value="N">Non-Citizen</option>
                                            <option value="P">Permanent Resident</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtImmigration">Immigration Status</label>
                                    <div class="controls">
                                        <input type="text" id="txtImmigration" name="txtImmigration" value="" title="required"/>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="ddlCOB">Country of Birth</label>
                                    <div class="controls">
                                        <select id="ddlCOB" name="ddlCOB" title="required">
                                            <?php echo($country_options); ?>
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
                                    <label class="control-label" for="radServingMilitary">Are you currently serving on active duty?</label>
                                    <div class="controls">
                                        <p>
                                            <input type="radio" id="radServingMilitary" name="radServingMilitary" value="yes"/>
                                            Yes
                                            <input type="radio" id="radServingMilitary" name="radServingMilitary" value="no" checked="true"/>
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
                                    <h3 class="header">Corporate Partnerships and Community College Partnerships</h3>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="corp_partner">If you are eligible for the Corporate Partnership Scholarship please select your organization</label>
                                    <div class="controls">
                                        <select name="corp_partner" id="corp_partner">
                                            <option value="">N/A</option>
<?php 
                foreach($partners as $partner) {
                    echo "<option value='".$partner."'>".$partner."</option>"; 
                }
?>
                                        </select>
                                    </div>
                                </fieldset>
                            </fieldset>
                            <a data-toggle="tab"><input type="button" class="btn" id="religiousBackButton" name="religiousBackButton" onclick="toEducation(1)" value="Back to Education Information"></a>
                            <a data-toggle="tab"><input type="button" class="btn btn-primary" id="otherButton" name="otherButton" onclick="toOther(1)" value="Other Information"></a>
                        </div>  <!-- Additional -->
                        <div class="tab-pane longtext" id="other">
                            <fieldset class="heading-fieldset" id="otherInfo-fieldset" title="Other Information">
                                <legend>Other Information</legend>
                                <fieldset class="control-group">
                                    <label class="control-label" for="radFinancial-Aid_Residency">Before becoming at least a half-time student at a Minnesota post-secondary institution, did you, or will you reside in Minnesota for 12 consecutive months?</label>
                                    <div class="controls">
                                        <p>
                                            <input type="radio" id="radFinancial-Aid_Residency" name="radFinancial-Aid_Residency" value="yes"/>
                                            Yes
                                            <input type="radio" id="radFinancial-Aid_Residency" name="radFinancial-Aid_Residency" value="no" checked="true"/>
                                            No 
                                        </p>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="radHigh-School_Graduate">By July 1, 2012 will you have graduated from a Minnesota high school while residing in Minnesota?</label>
                                    <div class="controls">
                                        <p>
                                            <input type="radio" id="radHigh-School_Graduate" name="radHigh-School_Graduate" value="yes"/>
                                            Yes
                                            <input type="radio" id="radHigh-School_Graduate" name="radHigh-School_Graduate" value="no" checked="true"/>
                                            No 
                                        </p>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="waiverCode">If you were provided an application fee code, please enter it here</label>
                                    <div class="controls">
                                        <input type="text" id="waiverCode" name="waiverCode"/>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <h3>Financial Aid</h3>
                                    <label class="control-label" for="FinAid">Do you plan to apply for Financial Aid?</label>
                                    <div class="controls">
                                        <p>
                                            <input type="radio" id="FinAid" name="FinAid" value="yes"/>
                                            Yes
                                            <input type="radio" class="FinAid" id="FinAid" name="FinAid" value="no"/>
                                            No 
                                        </p>
                                    </div>
                                </fieldset>
                                <div id="reimburse" style="display:none;">
                                 <fieldset class="control-group howPay">
                                    <label class="control-label" for="FinAid">How do you plan to fund your education?</label>
                                    <div class="controls">
                                        <p>
                                            <select id="Reimburse" name="Reimburse">
                                                <option name="Reimburse" value="employer reimbursement">Employer Reimbursement</option>
                                                <option name="Reimburse" value="personal finances">Personal Finances</option>
                                                <option name="Reimburse" value="outside resources">Outside Resources</option>
                                                <option name="Reimburse" value="other">Other</option>
                                            </select>
                                        </p>
                                    </div>
                                </fieldset>
                            </div>
                                <fieldset class="control-group">
                                    <h3>Background Information</h3>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="radFelony">Have you ever been charged with, convicted of, or pled guilty or no contest to a felony or misdemeanor charge?</label>
                                    <div class="controls">
                                        <p>
                                            <input type="radio" id="radFelony" name="radFelony" value="yes"/>
                                            Yes
                                            <input type="radio" id="radFelony" name="radFelony" value="no" checked/>
                                            No 
                                        </p>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtFelony_Explain">If yes, please provide details including the court your case was heard in, the year of the incident and an explanation.</label>
                                    <div class="controls">
                                        <textarea class="input-xlarge span7" maxlength="500" rows="10" value="" id="txtFelony_Explain" name="txtFelony_Explain"></textarea>
                                    </div>
                                </fieldset>
                                <div class="alert alert-block">
                                    Concordia University- St. Paul is registered as a private institution with the Minnesota Office of Higher Education pursuant to sections 136A.61 to 136A.71. Registration is not an endorsement of the institution. Credits earned at the institution may not transfer to all other institutions.
                                </div>
                                <div class="alert alert-block">
                                    I understand that upon separation from Concordia University, I am responsible for payment of all costs assessed for the collection of my account through a collection agency.  This includes (but is not limited to) applicable interest charges, collection fees, and attorney’s fees.  I also understand that failure to make payment in full may lead to adverse reporting to credit agencies.	
                                </div>
                                <div class="alert alert-block">
                                    Concordia University's annual security report includes statistics concerning reported crimes that occurred on campus or in certain off-campus buildings. The report also includes institutional policies concerning campus security.  Obtain a copy of this report by contacting the Security and Safety office or by accessing the following web site: <a href="http://www.csp.edu/security" target="_new">http://www.csp.edu/security</a> or calling (651)641-8777
                                </div>
                                <div class="alert alert-error">
                                    Intentional falsification of information on this application may be cause for denial of admission to the University.
                                </div>
                                <input id="chkAgree" type="checkbox" name="chkAgree"/> I agree to the above terms
                            </fieldset>
                            <a data-toggle="tab"><input type="button" class="btn" id="additionalBackButton" name="additionalBackButton" onclick="toAdditional(1)" value="Back To Additional Information"/></a>
                            <input type="button" class="btn btn-primary" id="completeButton" name="completeButton" onclick="app_complete()" value="Complete"/>
                        </div>  <!-- otherInfo -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/bootstrap-typeahead.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/fix_ie_dropdown.js"></script>
<![endif]-->
<script type="text/javascript">
	var programMapping = $.parseJSON('<?php echo $locations; ?>');
		
	function resetLocations(ddlProgram){
		if(!ddlProgram){
			ddlProgram = $('#ddlProgram option:selected').val();
		}
		
		if(ddlProgram){
			var program_locations = [];
			var locations_select = {};
			if(programMapping.length>0){
				for(var i=0;i<programMapping.length;i++){
					if(programMapping[i].client_program_id===ddlProgram){
						if(jQuery.inArray(programMapping[i].abbrev,program_locations) <= -1){
							program_locations.push(programMapping[i].abbrev);
							locations_select[programMapping[i].abbrev] = '<option value="'+programMapping[i].abbrev+'">'+programMapping[i].name+'</option>';
						}
					}
				}
			}
			
			$('#ddlLocation').html('');
			$('#ddlLocation').html('<option value="">Please Select</option>');
			for(var i=0;i<program_locations.length;i++){
				$('#ddlLocation').html($('#ddlLocation').html()+locations_select[program_locations[i]]);
			}
		}
	}
	
	$(document).ready(function(){
		resetLocations('');
		$('#ddlProgram').change(function() {
			value = $(this).val();
			text = $("#"+$(this).attr('id')+ " option:selected").text();
			if(value){
				$('option[value="'+value+'"]',$(this)).attr('selected',true);
			}
			resetLocations(value);
		});
	});
</script>

            <form class="form-horizontal aurora_undergrad_form" id="appform"  method="post" action="/">
                <input type='hidden' id='address_type' name='address_type' value='PERM'>
                <input type='hidden' id='permanent_address3' name='permanent_address3' value=''>
                <div class="tabbable">
                    <ul class="nav-tabs nav">
                        <li id="personalTab" class="active">
                            <a href="#personal" data-toggle="tab">Personal Information</a>
                        </li>
                        <li id="employerTab">
                            <a href="#employer" data-toggle="tab">Application Information</a>
                        </li>
                        <li id="educationTab">
                            <a href="#education" data-toggle="tab">Demographic Information</a>
                        </li>
                        <li id="additionalTab">
                            <a href="#additional" data-toggle="tab">Education Information</a>
                        </li>
                        <li id="otherTab">
                            <a href="#other" data-toggle="tab">Other Information</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                            <fieldset class="heading-fieldset" id="personal-fieldset" title="Personal Information">
                                <legend>Personal Information</legend>

                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="prefix">Prefix</label>
                                    <div class="controls">
                                        <p>
                                            <select name='prefix' id='prefix'>
                                                <option value=''>Select One</option>
                                                <option value='hon'>Hon</option>
                                                <option value='rev'>Rev</option>
                                                <option value='dr'>Dr</option>
                                                <option value='rabbi'>Rabbi</option>
                                                <option value='mr'>Mr.</option>
                                                <option value='mrs'>Mrs.</option>
                                                <option value='ms'>Ms.</option>
                                            </select>
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="first_name"><b>First Name</b></label>
                                    <div class="controls">
                                        <p>
                                            <input class="validate v-required" type="text" id="first_name" name="first_name" value=""  title="required">
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="middle_name">Middle Name</label>
                                    <div class="controls">
                                        <p>
                                            <input class="" type="text" id="middle_name" name="middle_name" value="">
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="last_name"><b>Last Name</b></label>
                                    <div class="controls">
                                        <p> 
                                            <input class="validate v-required" type="text" id="last_name" name="last_name" value="" title="required">
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="suffix">Suffix (If applicable)</label>
                                    <div class="controls">
                                        <p>
                                            <input type="text" id="suffix" name="suffix" value="">
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="prior_name">Prior Name</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="last_name" name="prior_name" value="" title="required">
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="dob"><b>Date of Birth</b></label>
                                    <div class="controls">
                                        <p> 
                                            <input class="validate v-usDate datepicker" type="text" id="dob" name="dob" title="required"> mm-dd-yyyy
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="social_tax_id">Social Security number (Last four digits)</b></label>
                                    <div class="controls">
                                        <p> 
                                            <input class="v-required" maxlength="4" type="text" id="social_tax_id" name="social_tax_id" value="" title="required"> xxxx
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label blockLabel bold" for="address1">Permanent Street Address</label>
                                    <div class="controls">
                                        <p> 
                                            <input class=" v-required" type="text" id="address1" name="address1" value="" title="required">
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="address2">Permanent Street Address 2</label>
                                    <div class="controls">
                                        <p>
                                            <input type="text" id="address2" name="address2" value="">
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="zip_code"><b>Zip Code</b></label>
                                    <div class="controls">
                                        <p> 
                                            <input class="v-required" type="text" id="zip_code" name="zip_code" value="" title="required">
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label blockLabel bold" for="city">City</label>
                                    <div class="controls">
                                        <p> 
                                            <input class=" v-required" type="text" id="city" name="city" value="" title="required">
                                        </p>
                                    </div>
                                </fieldset>


                                <fieldset class="control-group">
                                    <label class="control-label blockLabel bold" for="state">State</label>
                                    <div class="controls">
                                        <p>
                                            <select class="v-required" id="state" name="state" title='required'>
                                                <option value="">Select State</option>
                                                <option value="AL">Alabama</option>
                                                <option value="AK">Alaska</option>
                                                <option value="AZ">Arizona</option>
                                                <option value="AR">Arkansas</option>
                                                <option value="CA">California</option>
                                                <option value="CO">Colorado</option>
                                                <option value="CT">Connecticut</option>
                                                <option value="DE">Delaware</option>
                                                <option value="DC">District Of Columbia</option>
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
                                            </select>
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label blockLabel bold" for="country">Country</label>
                                    <div class="controls ">
                                        <p> 
                                            <select class=" v-required" id='country' name='country' title='required'>
                                                <option value='US'>United States</option>
                                                <option value='AF'>Afghanistan</option>
                                                <option value='AX'>Aland Islands</option>
                                                <option value='AL'>Albania</option>
                                                <option value='DZ'>Algeria</option>
                                                <option value='AD'>Andorra</option>
                                                <option value='AO'>Angola</option>
                                                <option value='AI'>Anguilla</option>
                                                <option value='AG'>Antigua/Barbuda</option>
                                                <option value='AR'>Argentina</option>
                                                <option value='AM'>Armenia</option>
                                                <option value='AW'>Aruba</option>
                                                <option value='AU'>Australia</option>
                                                <option value='AT'>Austria</option>
                                                <option value='AZ'>Azerbaijan</option>
                                                <option value='BS'>Bahamas</option>
                                                <option value='BH'>Bahrain</option>
                                                <option value='BD'>Bangladesh</option>
                                                <option value='BB'>Barbados</option>
                                                <option value='BY'>Belarus</option>
                                                <option value='BE'>Belgium</option>
                                                <option value='BZ'>Belize</option>
                                                <option value='BJ'>Benin</option>
                                                <option value='BM'>Bermuda</option>
                                                <option value='BT'>Bhutan</option>
                                                <option value='BO'>Bolivia</option>
                                                <option value='BA'>Bosnia/Herzegovina</option>
                                                <option value='BW'>Botswana</option>
                                                <option value='BV'>Bouvet Island</option>
                                                <option value='BR'>Brazil</option>
                                                <option value='IO'>British Indian Ocean</option>
                                                <option value='BN'>Brunei Darussalam</option>
                                                <option value='BG'>Bulgaria</option>
                                                <option value='BF'>Burkina Faso</option>
                                                <option value='BI'>Burundi</option>
                                                <option value='KH'>Cambodia</option>
                                                <option value='CM'>Cameroon</option>
                                                <option value='CA'>Canada</option>
                                                <option value='CV'>Cape Verde</option>
                                                <option value='KY'>Cayman Islands</option>
                                                <option value='CF'>Central African Rep</option>
                                                <option value='TD'>Chad</option>
                                                <option value='CL'>Chile</option>
                                                <option value='CN'>China</option>
                                                <option value='CX'>Christmas Island</option>
                                                <option value='CC'>Cocos Islands</option>
                                                <option value='CO'>Colombia</option>
                                                <option value='KM'>Comoros</option>
                                                <option value='CG'>Congo</option>
                                                <option value='CD'>Congo, Dem Rep</option>
                                                <option value='CK'>Cook Islands</option>
                                                <option value='CR'>Costa Rica</option>
                                                <option value='CI'>Cote D'Ivory</option>
                                                <option value='HR'>Croatia</option>
                                                <option value='CU'>Cuba</option>
                                                <option value='CY'>Cyprus</option>
                                                <option value='CZ'>Czech Republic</option>
                                                <option value='DK'>Denmark</option>
                                                <option value='DJ'>Djibouti</option>
                                                <option value='DM'>Dominica</option>
                                                <option value='DO'>Dominican Republic</option>
                                                <option value='EC'>Ecuador</option>
                                                <option value='EG'>Egypt</option>
                                                <option value='SV'>El Salvador</option>
                                                <option value='GQ'>Equatorial Guinea</option>
                                                <option value='ER'>Eritrea</option>
                                                <option value='EE'>Estonia</option>
                                                <option value='ET'>Ethiopia</option>
                                                <option value='FK'>Falkland Islands</option>
                                                <option value='FO'>Faroe Islands</option>
                                                <option value='FJ'>Fiji</option>
                                                <option value='FI'>Finland</option>
                                                <option value='FR'>France</option>
                                                <option value='GF'>French Guiana</option>
                                                <option value='PF'>French Polynesia</option>
                                                <option value='TF'>French Southern Terr</option>
                                                <option value='GA'>Gabon</option>
                                                <option value='GM'>Gambia</option>
                                                <option value='GE'>Georgia</option>
                                                <option value='DE'>Germany</option>
                                                <option value='GH'>Ghana</option>
                                                <option value='GI'>Gibraltar</option>
                                                <option value='GR'>Greece</option>
                                                <option value='GL'>Greenland</option>
                                                <option value='GD'>Grenada</option>
                                                <option value='GP'>Guadeloupe</option>
                                                <option value='GT'>Guatemala</option>
                                                <option value='GG'>Guernsey</option>
                                                <option value='GN'>Guinea</option>
                                                <option value='GW'>Guinea-Bissau</option>
                                                <option value='GY'>Guyana</option>
                                                <option value='HT'>Haiti</option>
                                                <option value='VA'>Holy See Vatican</option>
                                                <option value='HN'>Honduras</option>
                                                <option value='HK'>Hong Kong</option>
                                                <option value='HU'>Hungary</option>
                                                <option value='IS'>Iceland</option>
                                                <option value='IN'>India</option>
                                                <option value='ID'>Indonesia</option>
                                                <option value='IR'>Iran</option>
                                                <option value='IQ'>Iraq</option>
                                                <option value='IE'>Ireland</option>
                                                <option value='IM'>Isle of Man</option>
                                                <option value='IL'>Israel</option>
                                                <option value='IT'>Italy</option>
                                                <option value='JM'>Jamaica</option>
                                                <option value='JP'>Japan</option>
                                                <option value='JE'>Jersey</option>
                                                <option value='JO'>Jordan</option>
                                                <option value='KZ'>Kazakhstan</option>
                                                <option value='KE'>Kenya</option>
                                                <option value='KI'>Kiribati</option>
                                                <option value='KP'>Korea North</option>
                                                <option value='KR'>Korea South</option>
                                                <option value='KW'>Kuwait</option>
                                                <option value='KG'>Kyrgyzstan</option>
                                                <option value='LA'>Laos</option>
                                                <option value='LV'>Latvia</option>
                                                <option value='LB'>Lebanon</option>
                                                <option value='LS'>Lesotho</option>
                                                <option value='LR'>Liberia</option>
                                                <option value='LY'>Libya</option>
                                                <option value='LI'>Liechtenstein</option>
                                                <option value='LT'>Lithuania</option>
                                                <option value='LU'>Luxembourg</option>
                                                <option value='MO'>Macao</option>
                                                <option value='MK'>Macedonia</option>
                                                <option value='MG'>Madagascar</option>
                                                <option value='MW'>Malawi</option>
                                                <option value='MY'>Malaysia</option>
                                                <option value='MV'>Maldives</option>
                                                <option value='ML'>Mali</option>
                                                <option value='MT'>Malta</option>
                                                <option value='MQ'>Martinique</option>
                                                <option value='MR'>Mauritania</option>
                                                <option value='MU'>Mauritius</option>
                                                <option value='YT'>Mayotte</option>
                                                <option value='MX'>Mexico</option>
                                                <option value='MD'>Moldova</option>
                                                <option value='MC'>Monaco</option>
                                                <option value='MN'>Mongolia</option>
                                                <option value='ME'>Montenegro</option>
                                                <option value='MS'>Montserrat</option>
                                                <option value='MA'>Morocco</option>
                                                <option value='MZ'>Mozambique</option>
                                                <option value='MM'>Myanmar</option>
                                                <option value='NA'>Namibia</option>
                                                <option value='NR'>Nauru</option>
                                                <option value='NP'>Nepal</option>
                                                <option value='AN'>Netherland Antilles</option>
                                                <option value='NL'>Netherlands</option>
                                                <option value='NC'>New Caledonia</option>
                                                <option value='NZ'>New Zealand</option>
                                                <option value='NI'>Nicaragua</option>
                                                <option value='NE'>Niger</option>
                                                <option value='NG'>Nigeria</option>
                                                <option value='NU'>Niue</option>
                                                <option value='NF'>Norfolk Island</option>
                                                <option value='MP'>Northern Mariana Islands</option>
                                                <option value='NO'>Norway</option>
                                                <option value='OM'>Oman</option>
                                                <option value='PK'>Pakistan</option>
                                                <option value='PS'>Palestinian Ter, Occ</option>
                                                <option value='PA'>Panama</option>
                                                <option value='PG'>Papua New Guinea</option>
                                                <option value='PY'>Paraguay</option>
                                                <option value='PE'>Peru</option>
                                                <option value='PH'>Philippines</option>
                                                <option value='PN'>Pitcairn</option>
                                                <option value='PL'>Poland</option>
                                                <option value='PT'>Portugal</option>
                                                <option value='QA'>Qatar</option>
                                                <option value='RE'>Reunion</option>
                                                <option value='RO'>Romania</option>
                                                <option value='RU'>Russia</option>
                                                <option value='RW'>Rwanda</option>
                                                <option value='WS'>Samoa</option>
                                                <option value='SM'>San Marino</option>
                                                <option value='ST'>Sao Tome and Principe</option>
                                                <option value='SA'>Saudi Arab</option>
                                                <option value='SN'>Senegal</option>
                                                <option value='RS'>Serbia</option>
                                                <option value='SC'>Seychelles</option>
                                                <option value='SL'>Sierra Leone</option>
                                                <option value='SG'>Singapore</option>
                                                <option value='SK'>Slovakia</option>
                                                <option value='SI'>Slovenia</option>
                                                <option value='SB'>Solomon Islands</option>
                                                <option value='SO'>Somalia</option>
                                                <option value='ZA'>South Africa</option>
                                                <option value='GS'>South Georgia</option>
                                                <option value='ES'>Spain</option>
                                                <option value='LK'>Sri Lanka</option>
                                                <option value='BL'>St Barthel</option>
                                                <option value='SH'>St Helena</option>
                                                <option value='KN'>St Kitts and Nevis</option>
                                                <option value='LC'>St Lucia</option>
                                                <option value='MF'>St Martin</option>
                                                <option value='PM'>St Pierre and Michelon</option>
                                                <option value='VC'>St Vincent/Grenadine</option>
                                                <option value='SD'>Sudan</option>
                                                <option value='SR'>Suriname</option>
                                                <option value='SJ'>Svalbard and Jan Mayen</option>
                                                <option value='SZ'>Swaziland</option>
                                                <option value='SE'>Sweden</option>
                                                <option value='CH'>Switzerland</option>
                                                <option value='SY'>Syria</option>
                                                <option value='TW'>Taiwan</option>
                                                <option value='TJ'>Tajikistan</option>
                                                <option value='TZ'>Tanzania</option>
                                                <option value='TH'>Thailand</option>
                                                <option value='TL'>Timor-Leste</option>
                                                <option value='TG'>Togo</option>
                                                <option value='TK'>Tokelau</option>
                                                <option value='TO'>Tonga</option>
                                                <option value='TT'>Trinidad and Tobago</option>
                                                <option value='TN'>Tunisia</option>
                                                <option value='TR'>Turkey</option>
                                                <option value='TM'>Turkmenistan</option>
                                                <option value='TC'>Turks and Caicos Is</option>
                                                <option value='TV'>Tuvalu</option>
                                                <option value='UG'>Uganda</option>
                                                <option value='UA'>Ukraine</option>
                                                <option value='AE'>United Arab Emirates</option>
                                                <option value='GB'>United Kingdom</option>
                                                <option value='US'>United States</option>
                                                <option value='UY'>Uruguay</option>
                                                <option value='UZ'>Uzbekistan</option>
                                                <option value='VU'>Vanuatu</option>
                                                <option value='VE'>Venezuela</option>
                                                <option value='VN'>Vietnam</option>
                                                <option value='VG'>Virgin Islands, Brit</option>
                                                <option value='WF'>Wallis and Futuna</option>
                                                <option value='EH'>Western Sahara</option>
                                                <option value='YE'>Yemen</option>
                                                <option value='ZM'>Zambia</option>
                                                <option value='ZW'>Zimbabwe</option>
                                            </select>
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="email"><b>Email</b></label>
                                    <div class="controls">
                                        <p> 
                                            <input class="validate v-required" type="text" id="email" name="email" value="" title="required">
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="home_phone"><b>Home Phone</b></label>
                                    <div class="controls">
                                        <p> 
                                            <input class="v-required v-phone" type="text" id="home_phone" name="home_phone" value="" title="required"> ###-###-####
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="phone_type"><b>Is this a Home or Cell phone</b></label>
                                    <div class="controls">
                                        <select  class="v-required" id="phone_type" name="phone_type" title="required">
                                            <option value="HOME">Home</option>
                                            <option value="CELL">Cell</option>
                                        </select>
                                    </div>
                                </fieldset>                               
                                <a data-toggle="tab"><input type="button" class="btn btn-primary" id="employerButton" name="emplyerButton" onclick="toEmployer(1)" value="Continue to Application Information"></a>
                            </fieldset>
                        </div>

                        <div class="tab-pane" id="employer">
                            <fieldset class="heading-fieldset" id="employer-fieldset" title="Employer Information">
                                <legend>Application Information</legend>

                                <fieldset class="control-group">
                                    <label class="control-label" for="start_term"><b>Intended Start Term</b></label>
                                    <div class="controls">
                                        <select  class="validate v-required" id="start_term" name="start_term" title="required"> 
                                            <option value="">Select one</option>
                                            <option value="2013S1">Spring I, January 7, 2013</option>
                                            <option value="2013S2">Spring II, March 18, 2013</option>
                                            <option value="2013U1">Summer I, May 28, 2013</option>
                                            <option value="2013U2">Summer II, 2013</option>
                                            <option value="2013F1">Fall I, September 9, 2013</option>
                                            <option value="2013F2">Fall II, November 11, 2013</option>
                                            <option value="2014S1">Spring I, January 13, 2014</option>
                                            <option value="2014S2">Spring II, March 17, 2014</option>
                                            <option value="2014U1">Summer I, May 19, 2014</option>
                                            <option value="2014U2">Summer II, July 21, 2014</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="degree_level"><b>Please select the degree level you wish to pursue:</b></label>
                                    <div class="controls">
                                        <select  class="validate v-required" id="degree_level" name="degree_level" title="required">
                                            <option value="">Select one</option>
                                            <option value="N">Non-Degree Seeking</option>
                                            <option value="GR">Graduate - Master Level</option>
                                            <option value="DR">Graduate - Doctoral Level</option>
                                            <option value="C">Certificate</option>
                                            <option value="B">Undergraduate</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="program_interest"><b>Please select a program of interest</b></label>
                                    <div class="controls">
                                        <select  class="validate v-required" id="program_interest" name="program_interest" title="required">
                                            <option value="">Select one</option>
                                            <option value="MBA">Master of Business Administration</option>
                                            <option value="IOP">Master of Arts in Industrial and Organizational Psychology</option>
                                            <option value="MFT">Master of Art in Marriage and Family Therapy</option>
                                            <option value="MCP">Master of Arts in Media and Communications Psychology</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="control-group">
                                    <label class="control-label bold" for="attending">I will be attending</label>
                                    <div class="controls">
                                        <select  class="validate v-required" id="attending" name="attending" title="required">
                                            <option value="">Select One</option>
                                            <option value="HT">1/2 Time</option>
                                            <option value="TQ">3/4 Time</option>
                                            <option value="LH">Less than 1/2 Time</option>
                                            <option value="FT">Full Time</option>
                                            <option value="NA">Not Attending</option>
                                        </select>
                                    </div>
                                </fieldset>

                            </fieldset>
                            <a data-toggle="tab"><input type="button" class="btn" id="personalBackButton" name="personalBackButton" onclick="toPersonal(1)" value="Back To Personal Information"></a>
                            <a data-toggle="tab"><input type="button" class="btn btn-primary" id="educationButton" name="educationButton" onclick="toEducation(1)" value="Continue to Demographic Information"></a>
                        </div>

                        <div class="tab-pane" id="education">
                            <fieldset class="heading-fieldset" id="education-fieldset" title="Colleges Previously Attended">
                                <legend>Demographic Information</legend>

                                <fieldset class="control-group">
                                    <label class="control-label" for="gender"><b>Gender</b></label>
                                    <div class="controls">
                                        <select  class="validate v-required" id="gender" name="gender">
                                            <option value="">Select one</option>
                                            <option value="F">Female</option>
                                            <option value="M">Male</option>
                                            <option value="U">Unknown</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label blockLabel bold" for="countrycitizen"><b>Country of Citizenship</b></label>
                                    <div class="controls ">
                                        <p> 
                                            <select class="validate v-required" id='countrycitizen' name='countrycitizen' title='required'>
                                                <option value='US'>United States</option>
                                                <option value='AF'>Afghanistan</option>
                                                <option value='AX'>Aland Islands</option>
                                                <option value='AL'>Albania</option>
                                                <option value='DZ'>Algeria</option>
                                                <option value='AD'>Andorra</option>
                                                <option value='AO'>Angola</option>
                                                <option value='AI'>Anguilla</option>
                                                <option value='AG'>Antigua/Barbuda</option>
                                                <option value='AR'>Argentina</option>
                                                <option value='AM'>Armenia</option>
                                                <option value='AW'>Aruba</option>
                                                <option value='AU'>Australia</option>
                                                <option value='AT'>Austria</option>
                                                <option value='AZ'>Azerbaijan</option>
                                                <option value='BS'>Bahamas</option>
                                                <option value='BH'>Bahrain</option>
                                                <option value='BD'>Bangladesh</option>
                                                <option value='BB'>Barbados</option>
                                                <option value='BY'>Belarus</option>
                                                <option value='BE'>Belgium</option>
                                                <option value='BZ'>Belize</option>
                                                <option value='BJ'>Benin</option>
                                                <option value='BM'>Bermuda</option>
                                                <option value='BT'>Bhutan</option>
                                                <option value='BO'>Bolivia</option>
                                                <option value='BA'>Bosnia/Herzegovina</option>
                                                <option value='BW'>Botswana</option>
                                                <option value='BV'>Bouvet Island</option>
                                                <option value='BR'>Brazil</option>
                                                <option value='IO'>British Indian Ocean</option>
                                                <option value='BN'>Brunei Darussalam</option>
                                                <option value='BG'>Bulgaria</option>
                                                <option value='BF'>Burkina Faso</option>
                                                <option value='BI'>Burundi</option>
                                                <option value='KH'>Cambodia</option>
                                                <option value='CM'>Cameroon</option>
                                                <option value='CA'>Canada</option>
                                                <option value='CV'>Cape Verde</option>
                                                <option value='KY'>Cayman Islands</option>
                                                <option value='CF'>Central African Rep</option>
                                                <option value='TD'>Chad</option>
                                                <option value='CL'>Chile</option>
                                                <option value='CN'>China</option>
                                                <option value='CX'>Christmas Island</option>
                                                <option value='CC'>Cocos Islands</option>
                                                <option value='CO'>Colombia</option>
                                                <option value='KM'>Comoros</option>
                                                <option value='CG'>Congo</option>
                                                <option value='CD'>Congo, Dem Rep</option>
                                                <option value='CK'>Cook Islands</option>
                                                <option value='CR'>Costa Rica</option>
                                                <option value='CI'>Cote D'Ivory</option>
                                                <option value='HR'>Croatia</option>
                                                <option value='CU'>Cuba</option>
                                                <option value='CY'>Cyprus</option>
                                                <option value='CZ'>Czech Republic</option>
                                                <option value='DK'>Denmark</option>
                                                <option value='DJ'>Djibouti</option>
                                                <option value='DM'>Dominica</option>
                                                <option value='DO'>Dominican Republic</option>
                                                <option value='EC'>Ecuador</option>
                                                <option value='EG'>Egypt</option>
                                                <option value='SV'>El Salvador</option>
                                                <option value='GQ'>Equatorial Guinea</option>
                                                <option value='ER'>Eritrea</option>
                                                <option value='EE'>Estonia</option>
                                                <option value='ET'>Ethiopia</option>
                                                <option value='FK'>Falkland Islands</option>
                                                <option value='FO'>Faroe Islands</option>
                                                <option value='FJ'>Fiji</option>
                                                <option value='FI'>Finland</option>
                                                <option value='FR'>France</option>
                                                <option value='GF'>French Guiana</option>
                                                <option value='PF'>French Polynesia</option>
                                                <option value='TF'>French Southern Terr</option>
                                                <option value='GA'>Gabon</option>
                                                <option value='GM'>Gambia</option>
                                                <option value='GE'>Georgia</option>
                                                <option value='DE'>Germany</option>
                                                <option value='GH'>Ghana</option>
                                                <option value='GI'>Gibraltar</option>
                                                <option value='GR'>Greece</option>
                                                <option value='GL'>Greenland</option>
                                                <option value='GD'>Grenada</option>
                                                <option value='GP'>Guadeloupe</option>
                                                <option value='GT'>Guatemala</option>
                                                <option value='GG'>Guernsey</option>
                                                <option value='GN'>Guinea</option>
                                                <option value='GW'>Guinea-Bissau</option>
                                                <option value='GY'>Guyana</option>
                                                <option value='HT'>Haiti</option>
                                                <option value='VA'>Holy See Vatican</option>
                                                <option value='HN'>Honduras</option>
                                                <option value='HK'>Hong Kong</option>
                                                <option value='HU'>Hungary</option>
                                                <option value='IS'>Iceland</option>
                                                <option value='IN'>India</option>
                                                <option value='ID'>Indonesia</option>
                                                <option value='IR'>Iran</option>
                                                <option value='IQ'>Iraq</option>
                                                <option value='IE'>Ireland</option>
                                                <option value='IM'>Isle of Man</option>
                                                <option value='IL'>Israel</option>
                                                <option value='IT'>Italy</option>
                                                <option value='JM'>Jamaica</option>
                                                <option value='JP'>Japan</option>
                                                <option value='JE'>Jersey</option>
                                                <option value='JO'>Jordan</option>
                                                <option value='KZ'>Kazakhstan</option>
                                                <option value='KE'>Kenya</option>
                                                <option value='KI'>Kiribati</option>
                                                <option value='KP'>Korea North</option>
                                                <option value='KR'>Korea South</option>
                                                <option value='KW'>Kuwait</option>
                                                <option value='KG'>Kyrgyzstan</option>
                                                <option value='LA'>Laos</option>
                                                <option value='LV'>Latvia</option>
                                                <option value='LB'>Lebanon</option>
                                                <option value='LS'>Lesotho</option>
                                                <option value='LR'>Liberia</option>
                                                <option value='LY'>Libya</option>
                                                <option value='LI'>Liechtenstein</option>
                                                <option value='LT'>Lithuania</option>
                                                <option value='LU'>Luxembourg</option>
                                                <option value='MO'>Macao</option>
                                                <option value='MK'>Macedonia</option>
                                                <option value='MG'>Madagascar</option>
                                                <option value='MW'>Malawi</option>
                                                <option value='MY'>Malaysia</option>
                                                <option value='MV'>Maldives</option>
                                                <option value='ML'>Mali</option>
                                                <option value='MT'>Malta</option>
                                                <option value='MQ'>Martinique</option>
                                                <option value='MR'>Mauritania</option>
                                                <option value='MU'>Mauritius</option>
                                                <option value='YT'>Mayotte</option>
                                                <option value='MX'>Mexico</option>
                                                <option value='MD'>Moldova</option>
                                                <option value='MC'>Monaco</option>
                                                <option value='MN'>Mongolia</option>
                                                <option value='ME'>Montenegro</option>
                                                <option value='MS'>Montserrat</option>
                                                <option value='MA'>Morocco</option>
                                                <option value='MZ'>Mozambique</option>
                                                <option value='MM'>Myanmar</option>
                                                <option value='NA'>Namibia</option>
                                                <option value='NR'>Nauru</option>
                                                <option value='NP'>Nepal</option>
                                                <option value='AN'>Netherland Antilles</option>
                                                <option value='NL'>Netherlands</option>
                                                <option value='NC'>New Caledonia</option>
                                                <option value='NZ'>New Zealand</option>
                                                <option value='NI'>Nicaragua</option>
                                                <option value='NE'>Niger</option>
                                                <option value='NG'>Nigeria</option>
                                                <option value='NU'>Niue</option>
                                                <option value='NF'>Norfolk Island</option>
                                                <option value='MP'>Northern Mariana Islands</option>
                                                <option value='NO'>Norway</option>
                                                <option value='OM'>Oman</option>
                                                <option value='PK'>Pakistan</option>
                                                <option value='PS'>Palestinian Ter, Occ</option>
                                                <option value='PA'>Panama</option>
                                                <option value='PG'>Papua New Guinea</option>
                                                <option value='PY'>Paraguay</option>
                                                <option value='PE'>Peru</option>
                                                <option value='PH'>Philippines</option>
                                                <option value='PN'>Pitcairn</option>
                                                <option value='PL'>Poland</option>
                                                <option value='PT'>Portugal</option>
                                                <option value='QA'>Qatar</option>
                                                <option value='RE'>Reunion</option>
                                                <option value='RO'>Romania</option>
                                                <option value='RU'>Russia</option>
                                                <option value='RW'>Rwanda</option>
                                                <option value='WS'>Samoa</option>
                                                <option value='SM'>San Marino</option>
                                                <option value='ST'>Sao Tome and Principe</option>
                                                <option value='SA'>Saudi Arab</option>
                                                <option value='SN'>Senegal</option>
                                                <option value='RS'>Serbia</option>
                                                <option value='SC'>Seychelles</option>
                                                <option value='SL'>Sierra Leone</option>
                                                <option value='SG'>Singapore</option>
                                                <option value='SK'>Slovakia</option>
                                                <option value='SI'>Slovenia</option>
                                                <option value='SB'>Solomon Islands</option>
                                                <option value='SO'>Somalia</option>
                                                <option value='ZA'>South Africa</option>
                                                <option value='GS'>South Georgia</option>
                                                <option value='ES'>Spain</option>
                                                <option value='LK'>Sri Lanka</option>
                                                <option value='BL'>St Barthel</option>
                                                <option value='SH'>St Helena</option>
                                                <option value='KN'>St Kitts and Nevis</option>
                                                <option value='LC'>St Lucia</option>
                                                <option value='MF'>St Martin</option>
                                                <option value='PM'>St Pierre and Michelon</option>
                                                <option value='VC'>St Vincent/Grenadine</option>
                                                <option value='SD'>Sudan</option>
                                                <option value='SR'>Suriname</option>
                                                <option value='SJ'>Svalbard and Jan Mayen</option>
                                                <option value='SZ'>Swaziland</option>
                                                <option value='SE'>Sweden</option>
                                                <option value='CH'>Switzerland</option>
                                                <option value='SY'>Syria</option>
                                                <option value='TW'>Taiwan</option>
                                                <option value='TJ'>Tajikistan</option>
                                                <option value='TZ'>Tanzania</option>
                                                <option value='TH'>Thailand</option>
                                                <option value='TL'>Timor-Leste</option>
                                                <option value='TG'>Togo</option>
                                                <option value='TK'>Tokelau</option>
                                                <option value='TO'>Tonga</option>
                                                <option value='TT'>Trinidad and Tobago</option>
                                                <option value='TN'>Tunisia</option>
                                                <option value='TR'>Turkey</option>
                                                <option value='TM'>Turkmenistan</option>
                                                <option value='TC'>Turks and Caicos Is</option>
                                                <option value='TV'>Tuvalu</option>
                                                <option value='UG'>Uganda</option>
                                                <option value='UA'>Ukraine</option>
                                                <option value='AE'>United Arab Emirates</option>
                                                <option value='GB'>United Kingdom</option>
                                                <option value='US'>United States</option>
                                                <option value='UY'>Uruguay</option>
                                                <option value='UZ'>Uzbekistan</option>
                                                <option value='VU'>Vanuatu</option>
                                                <option value='VE'>Venezuela</option>
                                                <option value='VN'>Vietnam</option>
                                                <option value='VG'>Virgin Islands, Brit</option>
                                                <option value='WF'>Wallis and Futuna</option>
                                                <option value='EH'>Western Sahara</option>
                                                <option value='YE'>Yemen</option>
                                                <option value='ZM'>Zambia</option>
                                                <option value='ZW'>Zimbabwe</option>
                                            </select>
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="hispanic_latino"><b>Are you Hispanic or Latino/Latina?</b></label>
                                    <div class="controls">
                                        <select  class="validate v-required" id="hispanic_latino" name="hispanic_latino" title='required'>
                                            <option value="">Select one</option>
                                            <option value="Y">Yes I am Hispanic or Latino/Latina</option>
                                            <option value="N">No I am not Hispanic or Latino/Latina</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset id='racial_identity_control' class="control-group" style="display:none">
                                    <label class="control-label" for="racial_identity"><b>Race: Which best describes you?</b></label>
                                    <div id="racial_identity" class="controls" >
                                        <select  class="validate v-required" id="racial_identity" name="racial_identity" style="margin-left:0" title='required'>
                                            <option value="4">American Indian or Alaska Native</option>
                                            <option value="5">Asian</option>
                                            <option value="1">Non-resident Alien</option>
                                            <option value="6">African American</option>
                                            <option value="7">Native Hawaiian or Other Pacific Islander</option>
                                            <option value="9">Two or more races</option>
                                            <option value="8">White</option>
                                            <option value="2">Race and Ethnicity unknown</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="englNative"><b>Is English your Native Language?</b></label>
                                    <div class="controls">
                                        <select class="validate v-required" id="englNative" name="englNative" title='required'>
                                            <option value="">Select one</option>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group lang_control" style='display:none'>
                                    <label class="control-label" class="blockLabel" for="language"><b>What is your native language?</b></label>
                                    <div class="controls">
                                        <select  class="validate  v-required" id="language" name="language" title='required'>
                                            <option value="">Select one</option>
                                            <option value="ENGL">English</option>
                                            <option value="ARAB">Arabic</option>
                                            <option value="ARM">Armenian</option>
                                            <option value="BANT">Bantu</option>
                                            <option value="CZCH">Czech</option>
                                            <option value="DTCH">Dutch</option>
                                            <option value="FINN">Finnish</option>
                                            <option value="FRCH">French</option>
                                            <option value="GERM">German</option>
                                            <option value="GREK">Greek</option>
                                            <option value="HIND">Hindi</option>
                                            <option value="ITAL">Italian</option>
                                            <option value="PORT">Portuguese</option>
                                            <option value="RUSS">Russian</option>
                                            <option value="SERB">Serbian</option>
                                            <option value="SPAN">Spanish</option>
                                            <option value="URDU">Urdu</option>
                                        </select>
                                    </div>
                                </fieldset>
                                
                            </fieldset>
                            <a data-toggle="tab"><input type="button" class="btn" id="employerBackButton" name="employerBackButton" onclick="toEmployer(1)" value="Back To Applicant Information"></a>
                            <a data-toggle="tab"><input type="button" class="btn btn-primary" id="religiousButton" name="religiousButton" onclick="toAdditional(1)" value="Continue to Additional Information"></a>
                        </div>  <!-- demographic -->

                        <div class="tab-pane longtext" id="additional">
                            <fieldset class="heading-fieldset" id="additional-fieldset" title="Educational Information">
                                <legend>Educational Information</legend>

                                <fieldset class="control-group">
                                    <h4>Please list prior College or Universities</h4>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label bold" for="txtPriorCollege1">College/University</label>
                                    <div class="controls">
                                        <input class="validate v-required" type="text" id="txtPriorCollege1" name="txtPriorCollege1" value="" title='required'>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label bold" for="txtPriorCollege1_year">Date Earned</label>
                                    <div class="controls">
                                        <input class="validate v-required" type="text" id="txtPriorCollege1_year" name="txtPriorCollege1_year" value="" title='required'>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label bold" for="txtPriorCollege1_studied">Area of Study</label>
                                    <div class="controls">
                                        <input class="validate v-required" type="text" id="txtPriorCollege1_studied" name="txtPriorCollege1_studied" value="" title='required'>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label bold" for="txtPriorCollege1_degree">Degree obtained?</label>
                                    <div class="controls">
                                        <select class="validate v-required" id="txtPriorCollege1_degree" name="txtPriorCollege1_degree" title='required'>
                                            <option value="">Select one</option>
                                            <option value="NONE">None</option>
                                            <option value="AA">Associate of Arts</option>
                                            <option value="AAS">Associate of Applied Science</option>
                                            <option value="AS">Associate of Science</option>
                                            <option value="B">Bachelors</option>
                                            <option value="BA">Bachelors of Arts</option>
                                            <option value="BBA">Bachelors of Business Administration</option>
                                            <option value="BFA">Bachelors of Fine Arts</option>
                                            <option value="BGS">Bachelors of General Studies</option>
                                            <option value="BPS">Bachelors of Professional Studies</option>
                                            <option value="BS">Bachelors of Science</option>
                                            <option value="DOC">Doctoral</option>
                                            <option value="MA">Masters of Arts</option>
                                            <option value="MS">Masters of Science</option>
                                            <option value="MBA">MBA</option>
                                            <option value="OTHER">Other</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label bold" for="txtPriorCollege1_gpa">What was your GPA?</label>
                                    <div class="controls">
                                        <input class="validate v-required" type="text" id="txtPriorCollege1_gpa" name="txtPriorCollege1_gpa" value="" title='required'>
                                    </div>
                                </fieldset>

                                <div id="school2"><!-- start school 2 -->
                                    <fieldset class="control-group">
                                        <label class="control-label bold" for="txtPriorCollege2">College/University 2</label>
                                    </fieldset>

                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege2">College/University</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege2" name="txtPriorCollege2" value="">
                                        </div>
                                    </fieldset>

                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege2_year">Date Earned</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege2_year" name="txtPriorCollege2_year" value="">
                                        </div>
                                    </fieldset>

                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege2_studied">Area of Study</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege2_studied" name="txtPriorCollege2_studied" value="">
                                        </div>
                                    </fieldset>

                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege2_degree">Degree obtained?</label>
                                        <div class="controls">
                                            <select  class="" id="txtPriorCollege2_degree" name="txtPriorCollege2_degree" >
                                                <option value="">Select one</option>
                                                <option value="NONE">None</option>
                                                <option value="AA">Associate of Arts</option>
                                                <option value="AAS">Associate of Applied Science</option>
                                                <option value="AS">Associate of Science</option>
                                                <option value="B">Bachelors</option>
                                                <option value="BA">Bachelors of Arts</option>
                                                <option value="BBA">Bachelors of Business Administration</option>
                                                <option value="BFA">Bachelors of Fine Arts</option>
                                                <option value="BGS">Bachelors of General Studies</option>
                                                <option value="BPS">Bachelors of Professional Studies</option>
                                                <option value="BS">Bachelors of Science</option>
                                                <option value="DOC">Doctoral</option>
                                                <option value="MA">Masters of Arts</option>
                                                <option value="MS">Masters of Science</option>
                                                <option value="MBA">MBA</option>
                                                <option value="OTHER">Other</option>
                                            </select>
                                        </div>
                                    </fieldset>

                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege2_gpa">What was your GPA?</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege2_gpa" name="txtPriorCollege2_gpa" value="">
                                        </div>
                                    </fieldset>
                                </div> <!-- end school 2 -->

                                <div id="school3"><!-- start school 3 -->
                                    <fieldset class="control-group">
                                        <label class="control-label bold" for="txtPriorCollege3">College/University 3</label>
                                    </fieldset>

                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege3">College/University</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege3" name="txtPriorCollege3" value="">
                                        </div>
                                    </fieldset>

                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege3_year">Date Earned</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege3_year" name="txtPriorCollege3_year" value="">
                                        </div>
                                    </fieldset>

                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege3_studied">Area of Study</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege3_studied" name="txtPriorCollege3_studied" value="">
                                        </div>
                                    </fieldset>

                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege3_degree">Degree obtained?</label>
                                        <div class="controls">
                                            <select  class="" id="txtPriorCollege3_degree" name="txtPriorCollege3_degree" >
                                                <option value="">Select one</option>
                                                <option value="NONE">None</option>
                                                <option value="AA">Associate of Arts</option>
                                                <option value="AAS">Associate of Applied Science</option>
                                                <option value="AS">Associate of Science</option>
                                                <option value="B">Bachelors</option>
                                                <option value="BA">Bachelors of Arts</option>
                                                <option value="BBA">Bachelors of Business Administration</option>
                                                <option value="BFA">Bachelors of Fine Arts</option>
                                                <option value="BGS">Bachelors of General Studies</option>
                                                <option value="BPS">Bachelors of Professional Studies</option>
                                                <option value="BS">Bachelors of Science</option>
                                                <option value="DOC">Doctoral</option>
                                                <option value="MA">Masters of Arts</option>
                                                <option value="MS">Masters of Science</option>
                                                <option value="MBA">MBA</option>
                                                <option value="OTHER">Other</option>
                                            </select>
                                        </div>
                                    </fieldset>

                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege3_gpa">What was your GPA?</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege3_gpa" name="txtPriorCollege3_gpa" value="">
                                        </div>
                                    </fieldset>
                                </div> <!-- end school 3 -->

                                <div id="school4"><!-- start school 4 -->
                                    <fieldset class="control-group">
                                        <label class="control-label bold" for="txtPriorCollege4">College/University 4</label>
                                    </fieldset>

                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege4">College/University</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege4" name="txtPriorCollege4" value="">
                                        </div>
                                    </fieldset>

                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege4_year">Date Earned</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege4_year" name="txtPriorCollege4_year" value="">
                                        </div>
                                    </fieldset>

                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege4_studied">Area of Study</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege4_studied" name="txtPriorCollege4_studied" value="">
                                        </div>
                                    </fieldset>

                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege4_degree">Degree obtained?</label>
                                        <div class="controls">
                                            <select  class="" id="txtPriorCollege4_degree" name="txtPriorCollege4_degree" >
                                                <option value="">Select one</option>
                                                <option value="NONE">None</option>
                                                <option value="AA">Associate of Arts</option>
                                                <option value="AAS">Associate of Applied Science</option>
                                                <option value="AS">Associate of Science</option>
                                                <option value="B">Bachelors</option>
                                                <option value="BA">Bachelors of Arts</option>
                                                <option value="BBA">Bachelors of Business Administration</option>
                                                <option value="BFA">Bachelors of Fine Arts</option>
                                                <option value="BGS">Bachelors of General Studies</option>
                                                <option value="BPS">Bachelors of Professional Studies</option>
                                                <option value="BS">Bachelors of Science</option>
                                                <option value="DOC">Doctoral</option>
                                                <option value="MA">Masters of Arts</option>
                                                <option value="MS">Masters of Science</option>
                                                <option value="MBA">MBA</option>
                                                <option value="OTHER">Other</option>
                                            </select>
                                        </div>
                                    </fieldset>

                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege4_gpa">What was your GPA?</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege4_gpa" name="txtPriorCollege4_gpa" value="">
                                        </div>
                                    </fieldset>
                                </div> <!-- end school 4 -->

                                <div id="school5"><!-- start school 5 -->
                                    <fieldset class="control-group">
                                        <label class="control-label bold" for="">College/University 5</label>
                                    </fieldset>

                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege5">College/University</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege5" name="txtPriorCollege5" value="">
                                        </div>
                                    </fieldset>

                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege5_year">Date Earned</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege5_year" name="txtPriorCollege5_year" value="">
                                        </div>
                                    </fieldset>

                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege5_studied">Area of Study</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege5_studied" name="txtPriorCollege5_studied" value="">
                                        </div>
                                    </fieldset>

                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege5_degree">Degree obtained?</label>
                                        <div class="controls">
                                            <select  class="" id="txtPriorCollege5_degree" name="txtPriorCollege5_degree" >
                                                <option value="">Select one</option>
                                                <option value="NONE">None</option>
                                                <option value="AA">Associate of Arts</option>
                                                <option value="AAS">Associate of Applied Science</option>
                                                <option value="AS">Associate of Science</option>
                                                <option value="B">Bachelors</option>
                                                <option value="BA">Bachelors of Arts</option>
                                                <option value="BBA">Bachelors of Business Administration</option>
                                                <option value="BFA">Bachelors of Fine Arts</option>
                                                <option value="BGS">Bachelors of General Studies</option>
                                                <option value="BPS">Bachelors of Professional Studies</option>
                                                <option value="BS">Bachelors of Science</option>
                                                <option value="DOC">Doctoral</option>
                                                <option value="MA">Masters of Arts</option>
                                                <option value="MS">Masters of Science</option>
                                                <option value="MBA">MBA</option>
                                                <option value="OTHER">Other</option>
                                            </select>
                                        </div>
                                    </fieldset>

                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege5_gpa">What was your GPA?</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege5_gpa" name="txtPriorCollege5_gpa" value="">
                                        </div>
                                    </fieldset>
                                </div> <!-- end school 5 -->

                            </fieldset>
                            <a data-toggle="tab"><input type="button" class="btn" id="religiousBackButton" name="religiousBackButton" onclick="toEducation(1)" value="Back to Demographic Information"></a>
                            <a data-toggle="tab"><input type="button" class="btn btn-primary" id="otherButton" name="otherButton" onclick="toOther(1)" value="Continue to Other Information"></a>
                        </div>  <!-- Educational -->
                      

                        <div class="tab-pane longtext" id="other">
                            <fieldset class="heading-fieldset" id="otherInfo-fieldset" title="Other Information">
                                <legend>Other Information</legend>

                                <fieldset class="control-group">
                                    <label class="control-label bold" for="curr_employer">Name of your current Employer?</label>
                                    <div class="controls">
                                        <input class="validate v-required" type="text" id="curr_employer" name="curr_employer" value="" title='required'>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label bold" for="military">Are you affiliated with the US Military</label>
                                    <div class="controls">
                                        <select  class="validate v-required" id="military" name="military" title='required'>
                                            <option value="">Select one</option>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="military_branch"><b>Military Branch</b></label>
                                    <div class="controls">
                                        <select  class="validate v-required" id="military_branch" name="military_branch" title='required'>
                                            <option value="">Select one</option>
                                            <option value="NONE">Not Affiliated</option>
                                            <option value="ARMY">Army</option>
                                            <option value="AF">Air Force</option>
                                            <option value="NAVY">Navy</option>
                                            <option value="MC">Marine Corps</option>
                                            <option value="CG">Coast Guard</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="military_status"><b>Military Status</b></label>
                                    <div class="controls">
                                        <select  class="validate v-required" id="military_status" name="military_status" title='required'>
                                            <option value="">Select one</option>
                                            <option value="NONE">Not Affiliated</option>
                                            <option value="ACTIVE">Active Duty</option>
                                            <option value="RESV">Reservist</option>
                                            <option value="NG">National Guard</option>
                                            <option value="RETIR">Retiree</option>
                                            <option value="DEPEND">Dependent</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="veteran"><b>Are you a veteran?</b></label>
                                    <div class="controls">
                                        <select  class="validate v-required" id="veteran" name="veteran" title='required'>
                                            <option value="">Select one</option>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group" id='control_gibill' style='display:none'>
                                    <label class="control-label bold" for="gibill">Are you eligible for G.I. Bill?</label>
                                    <div class="controls">
                                        <select  class="validate v-required" id="gibill" name="gibill">
                                            <option value="">Select one</option>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="fin_aid"><b>Will you be applying for Federal financial aid?</b></label>
                                    <div class="controls">
                                        <select  class="validate v-required" id="fin_aid" name="fin_aid" title="required">
                                            <option value="">Select one</option>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        </select>
                                    </div>
                                </fieldset>



                                <fieldset class="control-group">
                                    <label class="control-label" for="app_fee">Application Fee</label>
                                    <div class="controls">
                                        <span>$60</span>
                                    </div>
                                </fieldset>
                            </fieldset>
                            <a data-toggle="tab"><input type="button" class="btn" id="additionalBackButton" name="additionalBackButton" onclick="toAdditional(1)" value="Back To Additional Information"/></a>
                            <!-- <input type="submit" value="Complete"/> -->
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

            <form class="form-horizontal aurora_masters_form" id="appform"  method="post" action="/">
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
                                                <option value='mr'>Mr.</option>
                                                <option value='mrs'>Mrs.</option>
                                                <option value='miss'>Miss</option>
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
                                            <input type="text" id="middle_name" name="middle_name" value="">
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
                                    <label class="control-label" class="blockLabel" for="other_name">Other Name (If applicable)</label>
                                    <div class="controls">
                                        <p>
                                            <input type="text" id="other_name" name="other_name" value="">
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
                                    <label class="control-label" class="blockLabel" for="address1"><b>Permanent Street Address</b></label>
                                    <div class="controls">
                                        <p> 
                                            <input class="validate v-required" type="text" id="address1" name="address1" value="" title="required">
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
                                    <label class="control-label" class="blockLabel" for="city"><b>City</b></label>
                                    <div class="controls">
                                        <p> 
                                            <input class="validate v-required" type="text" id="city" name="city" value="" title="required">
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="zip_code">Zip Code</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="zip_code" name="zip_code" value="" title="">
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel " for="state">State</label>
                                    <div class="controls">
                                        <p>
                                            <select class="validate v-required" id="state" name="state" title='required'>
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
                                    <label class="control-label" class="blockLabel" for="country">Country</label>
                                    <div class="controls ">
                                        <p> 
                                            <select class="validate v-required" id='country' name='country' title='required'>
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
                                    <label class="control-label" class="blockLabel" for="home_phone"><b>Home Phone</b></label>
                                    <div class="controls">
                                        <p> 
                                            <input class="validate v-require v-phone" type="text" id="home_phone" name="home_phone" value="" title="required"> ###-###-####
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="cell_phone">Cell Phone</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="v-phone" type="text" id="cell_phone" name="cell_phone" value="" title="required"> ###-###-####
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
                                    <label class="control-label" class="blockLabel" for="social_tax_id">Social Security/Tax ID Number (last four digits)</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="v-required" type="text" maxlength="4" id="social_tax_id" name="social_tax_id" value="" title=""> xxxx
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="dob"><b>Date of Birth</b></label>
                                    <div class="controls">
                                        <p> 
                                            <input class="validate v-required v-usDate datepicker" type="text" id="dob" name="dob" value="" title="required"> mm-dd-yyyy
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="gender">Gender</label>
                                    <div class="controls">
                                        <select  class="" id="gender" name="gender">
                                            <option value="">Select one</option>
                                            <option value="F">Female</option>
                                            <option value="M">Male</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="marital_status">Marital Status</label>
                                    <div class="controls">
                                        <select  class="" id="marital_status" name="marital_status">
                                            <option value="">Select one</option>
                                            <option value="D">Divorced</option>
                                            <option value="M">Married</option>
                                            <option value="P">Separated</option>
                                            <option value="S">Single</option>
                                            <option value="W">Widowed</option>
                                            <option value="">Prefer Not To Respond</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="religious_preference">Religious Preference</label>
                                    <div class="controls">
                                        <select name="religous_preference" id="religous_preference">
                                            <option value=''>Select Religon</option>
                                            <option value='AC'>Advent Christian Church</option>
                                            <option value='AD'>Adventist</option>
                                            <option value='AG'>Assembly of God</option>
                                            <option value='BH'>Bahai</option>
                                            <option value='BA'>Baptist</option>
                                            <option value='BI'>Bible</option>
                                            <option value='BR'>Brethren</option>
                                            <option value='BU'>Buddhist</option>
                                            <option value='CA'>Catholic</option>
                                            <option value='CS'>Christian Science</option>
                                            <option value='CR'>Christian (Non. Denom)</option>
                                            <option value='CH'>Christian (Disciples)</option>
                                            <option value='CC'>Church of Christ</option>
                                            <option value='CG'>Church of God</option>
                                            <option value='CO'>Congregational</option>
                                            <option value='CV'>Covenant</option>
                                            <option value='EP'>Episcopal</option>
                                            <option value='EV'>Evangelist</option>
                                            <option value='FR'>Friends</option>
                                            <option value='HI'>Hindu</option>
                                            <option value='JW'>Jehovah’s Witness</option>
                                            <option value='JE'>Jewish</option>
                                            <option value='LU'>Lutheran</option>
                                            <option value='MN'>Mennonite</option>
                                            <option value='ME'>Methodist</option>
                                            <option value='MO'>Mormon</option>
                                            <option value='MS'>Muslim</option>
                                            <option value='NZ'>Nazarene</option>
                                            <option value='NS'>Not Specified</option>
                                            <option value='OR'>Orthodox</option>
                                            <option value='PE'>Pentecostal</option>
                                            <option value='PB'>Presbyterian</option>
                                            <option value='PR'>Protestant</option>
                                            <option value='RE'>Reformed</option>
                                            <option value='SA'>Salvation Army</option>
                                            <option value='UU'>Unitarian-Universalist</option>
                                            <option value='UC'>United Church of Christ</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="teaching_certificate_license">If you are a teacher, what type of certificate do you hold?</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="teaching_certificate_license" type="text" id="teaching_certificate_license" name="teaching_certificate_license" value="" title="">
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="teaching_certificate_license_number">Certificate / License Number></label>
                                    <div class="controls">
                                        <p> 
                                            <input class="teaching_certificate_license_number" type="text" id="teaching_certificate_license_number" name="teaching_certificate_license_number" value="" title="">
                                        </p>
                                    </div>
                                </fieldset>

                                
                                <a data-toggle="tab"><input type="button" class="btn btn-primary" id="employerButton" name="emplyerButton" onclick="toEmployer(1)" value="Continue to Application Information"></a>
                            </fieldset>
                        </div>

                        <div class="tab-pane" id="employer">
                            <fieldset class="heading-fieldset" id="employer-fieldset" title="Employer Information">
                                <legend>Application Information</legend>

                                <input type='hidden' id='degree_type' name='degree_type' value='GD'>

                                <fieldset class="control-group">
                                    <label class="control-label" for="attending"><b>I will be attending</b></label>
                                    <div class="controls">
                                        <select  class="validate v-required" id="attending" name="attending">
                                            <option value="U">Unknown</option>
                                            <option value="F">Full Time</option>
                                            <option value="P">Part Time</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="start_term"><b>Intended Start Term</b></label>
                                    <div class="controls">
                                        <select  class="validate v-required" id="start_term" name="start_term">
                                            <option value="">Select one</option>
                                            <option value="13/FA">Fall Module I Term (Aug)</option>
                                            <option value="13/FA">Fall Module II Term (Oct)</option>
                                            <option value="13/SP">Spring Module I Term (Jan)</option>
                                            <option value="13/SP">Spring Module II Term (Mar)</option>
                                            <option value="13/SU">Summer Module I Term (June)</option>
                                            <option value="13/SU">Summer Module II Term (July)</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="refered_by">How did you first learn about Aurora University Online?</label>
                                    <div class="controls">
                                        <select name="refered_by" id="refered_by">
                                            <option value="">Select one</option>
                                            <option value='208'>Advent Christian Church</option>
                                            <option value='212'>AU Admissions Councelor</option>
                                            <option value='209'>AU Alumni</option>
                                            <option value='AUB'>AU Brochures</option>
                                            <option value='508'>AU Campus Visit</option>
                                            <option value='133'>AU Coach</option>
                                            <option value='342'>AU Employee</option>
                                            <option value='210'>AU Student Referral </option>
                                            <option value='130'>AU Visit to HS / Community College</option>
                                            <option value='AUN'>Aurora Area Native</option>
                                            <option value='501'>Called AU for Information</option>
                                            <option value='CNL'>College Advisor / Councelor</option>
                                            <option value='120'>College Fair</option>
                                            <option value='INS'>College Instructor</option>
                                            <option value='122'>Corporate Visit</option>
                                            <option value='216'>Co-worker</option>
                                            <option value='215'>Family / Friend</option>
                                            <option value='FEA'>Future Educators of America</option>
                                            <option value='HSC'>High School Coach</option>
                                            <option value='HSG'>High School Guidance Councelor</option>
                                            <option value='HST'>High School Teacher</option>
                                            <option value='HSP'>Hospital Staff</option>
                                            <option value='INT'>Internet Search</option>
                                            <option value='3'>Magazine Advertisement</option>
                                            <option value='MBL'>Music by the Lake</option>
                                            <option value='2'>Newspaper Advertisement</option>
                                            <option value='125'>Open House</option>
                                            <option value='OTH'>Other</option>
                                            <option value='26'>Phi Theta Kappa</option>
                                            <option value='504'>Proximity to Home</option>
                                            <option value='11'>Radio / TV Advertisement</option>
                                            <option value='RCH'>Reach Fair</option>
                                            <option value='518'>Yellow Pages</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="resident">Have you lived in Illinois the last 12 months?</label>
                                    <div class="controls">
                                        <select  class="" id="resident" name="resident">
                                            <option value="">Select one</option>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="fin_aid">Will you be applying for financial aid?</label>
                                    <div class="controls">
                                        <select  class="" id="fin_aid" name="fin_aid">
                                            <option value="">Select one</option>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="fasfa">If yes, have you filled out the FAFSA?</label>
                                    <div class="controls">
                                        <select  class="" id="fasfa" name="fasfa">
                                            <option value="">Select one</option>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
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
                                    <label class="control-label" for="citizen">What is your citizen status?</label>
                                    <div class="controls">
                                        <select  class="" id="citizen" name="citizen">
                                            <option value="">US Citizen</option>
                                            <option value="">Non Citizen and Permanent resident</option>
                                            <option value="NRA">Non Citizen and not a permanent resident</option>
                                            <option value="UNK">Undocumented Student</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="veteran">Are you a veteran? [Veterans must send a photocopy of service record (DD214) to the admissions office.]</label>
                                    <div class="controls">
                                        <select  class="" id="veteran" name="veteran">
                                            <option value="">Select one</option>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset id='vet-control' class="control-group" style='display:none'>
                                    <label class="control-label" for="veteran_benifits">Will you be receiving veteran benefits?</label>
                                    <div class="controls">
                                        <select  class="" id="veteran_benifits" name="veteran_benifits">
                                            <option value="">Select one</option>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        </select>
                                    </div>
                                </fieldset>
                                

                                <fieldset class="control-group">
                                    <label class="control-label" for="disciplinary_dismissal"><b>Have you ever been dismissed from school for disciplinary reasons?</b></label>
                                    <div class="controls">
                                        <select  class="validate v-required" id="disciplinary_dismissal" name="disciplinary_dismissal" title='required'>
                                            <option value="">Select one</option>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="criminal_conviction"><b>Have you ever been convicted of any offense other than a minor traffic violation?</b></label>
                                    <div class="controls">
                                        <select  class="validate v-required" id="criminal_conviction" name="criminal_conviction" title='required'>
                                            <option value="">Select one</option>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="hispanic_latino">Are you Hispanic or Latino/Latina?</label>
                                    <div class="controls">
                                        <select  class="" id="hispanic_latino" name="hispanic_latino">
                                            <option value="">Select one</option>
                                            <option value="HIS">Yes I am Hispanic or Latino/Latina</option>
                                            <option value="NHS">No I am not Hispanic or Latino/Latina</option>
                                            <option value="">Prefer not to respond</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset id='racial_identity_control' class="control-group" style="display:none">
                                    <label class="control-label" for="racial_identity">Race: Which best describes you?</label>
                                    <div id="racial_identity" class="controls">
                                        <ul class='app-check-list'>
                                            <li><input type="checkbox" name="racial_identity[]" value="AN"> - American Indian or Alaska Native - A person having origins in any of the original peoples of North and South America (including Central America), and who maintains a tribal affiliation or community attachment.</li>
                                            <li><input type="checkbox" name="racial_identity[]" value="AS"> - Asian - A person having origins in any of the original peoples of the Far East, Southeast Asia, or the Indian subcontinent including, for example, Cambodia, China, India, Japan, Korea, Malaysia, Pakistan, the Philippines Islands, Thailand, and Vietnam.</li>
                                            <li><input type="checkbox" name="racial_identity[]" value="BL"> - Black or African American - A person having origins in any of the Black racial groups of Africa.</li>
                                            <li><input type="checkbox" name="racial_identity[]" value="AP"> - Native Hawaiian or Other Pacific Islander - A person having origins in any of the original peoples of Hawaii, Guam, Samoa, or Pacific Islands.</li>
                                            <li><input type="checkbox" name="racial_identity[]" value="WH"> - White - A person having origins in any of the original peoples of Europe, the Middle East, or North Africa.</li>
                                            <li><input type="checkbox" name="racial_identity[]" value=""> - None of the Above or Prefer Not to Respond</li>
                                        </ul>
                                    </div>
                                </fieldset>
                                
                            </fieldset>
                            <a data-toggle="tab"><input type="button" class="btn" id="employerBackButton" name="employerBackButton" onclick="toEmployer(1)" value="Back To Applicant Information"></a>
                            <a data-toggle="tab"><input type="button" class="btn btn-primary" id="religiousButton" name="religiousButton" onclick="toAdditional(1)(1)" value="Continue to Additional Information"></a>
                        </div>  <!-- demographic -->

                        <div class="tab-pane longtext" id="additional">
                            <fieldset class="heading-fieldset" id="additional-fieldset" title="Educational Information">
                                <legend>Educational Information</legend>
                                <input type='hidden' id='selected_major' name='selected_major' value='<?php echo $user['client_program_id']; ?>'>

                                <fieldset class="control-group">
                                    <label class="control-label" for="ged">Have you earned a GED?</label>
                                    <div class="controls">
                                        <select  class="" id="ged" name="ged">
                                            <option value="">Select one</option>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        </select>
                                    </div>
                                </fieldset>
<fieldset class="control-group">
                                    <label class="control-label" for="college_credit">Do you have college credit?</label>
                                    <div class="controls">
                                        <select  class="" id="college_credit" name="college_credit">
                                            <option value="">Select one</option>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <div id='list_prior_colleges' style='display:none'>
                                    <fieldset class="heading-fieldset" id="additional-fieldset" title="Educational Information">
                                        <legend>Previous Colleges</legend>
                                        <p>List chronologically all colleges, universities, and technical schools attended. Be sure to include George Williams College of Aurora if you attended here.</p>
                                    </fieldset>

                                    <h6>Prior College #1</h6>
                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege1">College/University</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege1" name="txtPriorCollege1" value="">
                                        </div>
                                    </fieldset>

                                    <h6>Prior College #2</h6>
                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege2">College/University</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege2" name="txtPriorCollege2" value="">
                                        </div>
                                    </fieldset>

                                    <h6>Prior College #3</h6>
                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege3">College/University</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege3" name="txtPriorCollege3" value="">
                                        </div>
                                    </fieldset>                                

                                    <h6>Prior College #4</h6>
                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege4">College/University</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege4" name="txtPriorCollege4" value="">
                                        </div>
                                    </fieldset>   

                                    <h6>Prior College #5</h6>
                                    <fieldset class="control-group">
                                        <label class="control-label" for="txtPriorCollege5">College/University</label>
                                        <div class="controls">
                                            <input class="span5" type="text" id="txtPriorCollege5" name="txtPriorCollege5" value="">
                                        </div>
                                    </fieldset>

                                    <fieldset class="control-group">
                                    <label class="control-label" for="bachelors_degree">Do you have a Bachelor’s Degree?</label>
                                        <div class="controls">
                                            <select  class="" id="bachelors_degree" name="bachelors_degree">
                                                <option value="">Select one</option>
                                                <option value="Y">Yes</option>
                                                <option value="N">No</option>
                                            </select>
                                        </div>
                                    </fieldset>
                                </div>

                            </fieldset>
                            <a data-toggle="tab"><input type="button" class="btn" id="religiousBackButton" name="religiousBackButton" onclick="toEducation(1)" value="Back to Demographic Information"></a>
                            <a data-toggle="tab"><input type="button" class="btn btn-primary" id="otherButton" name="otherButton" onclick="toOther(1)" value="Continue to Other Information"></a>
                        </div>  <!-- Educational -->
                      

                        <div class="tab-pane longtext" id="other">
                            <fieldset class="heading-fieldset" id="otherInfo-fieldset" title="Other Information">
                                <legend>Other Information</legend>
                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="emergency_contact_name">Emergency Contact Name</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="emergency_contact_name" name="emergency_contact_name" value="">
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="emergency_contact_main_phone">Emergency Contact Primary Phone</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="v-phone" type="text" id="emergency_contact_main_phone" name="emergency_contact_main_phone" value="" > ###-###-####
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="resume">Please copy and paste your resume here</label>
                                    <div class="controls">
                                        <p> 
                                            <textarea class="input-xlarge span7" maxlength="10000" rows="10" id="resume" name="resume" title=""></textarea>
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="personal_statement">Please provide a personal statement. Include information about your educational and career goals</label>
                                    <div class="controls">
                                        <p> 
                                            <textarea class="input-xlarge span7" maxlength="10000" rows="10" id="personal_statement" name="personal_statement"title=""></textarea>
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="other_college_applications">To what other colleges/universities have you applied for admission</label>
                                    <div class="controls">
                                        <p> 
                                            <textarea class="input-xlarge span7" maxlength="10000" rows="10" id="other_college_applications" name="other_college_applications"title=""></textarea>
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="other_information">Add here any information that you would like to include with your application or that would not fit in the other boxes</label>
                                    <div class="controls">
                                        <p> 
                                            <textarea class="input-xlarge span7" maxlength="10000" rows="10" id="other_information" name="other_information"title=""></textarea>
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="chkAgree">Certification - By checking this box, I attest that the submitted information is complete and accurate to the best of my knowledge</label>
                                    <div class="controls">
                                        <p> 
                                            <input id="chkAgree" type="checkbox" name="chkAgree"/> I agree
                                            
                                        </p>
                                    </div>
                                </fieldset>

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

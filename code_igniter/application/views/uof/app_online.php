            <style type="text/css">
                label.b {
                    font-weight: bold;
                }

                .hide {
                    display: none;
                }
            </style>
            <form class="form-horizontal aurora_undergrad_form" id="appform"  method="post" action='/'>
                <input type='hidden' name='cpid' value='<?php echo $user['item_id']; ?>'>

                <div class="tabbable">
                    <ul class="nav-tabs nav">
                        <li id="personalTab" class="active">
                            <a href="#personal" data-toggle="tab">Personal Information</a>
                        </li>
                        <li id="employerTab">
                            <a href="#employer" data-toggle="tab">Optional Information</a>
                        </li>
                        <li id="educationTab">
                            <a href="#education" data-toggle="tab">Academic Information</a>
                        </li>
                        <li id="additionalTab">
                            <a href="#additional" data-toggle="tab">Employment Information</a>
                        </li>
                        <li id="otherTab">
                            <a href="#other" data-toggle="tab">Personal Essay</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                            <fieldset class="heading-fieldset" id="personal-fieldset" title="Personal Information">
                                <legend>Personal Information</legend>

                                <fieldset class="control-group">
                                    <label class="control-label" for="prefix">Prefix</label>
                                    <div class="controls">
                                        <p>
                                            <select name='prefix' id='prefix'>
                                                <option value=''>Select One</option>
                                                <option value='MR'>Mr.</option>
                                                <option value='MRS'>Mrs.</option>
                                                <option value='MISS'>Miss</option>
                                                <option value='MS'>Ms.</option>
                                            </select>
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label b" for="first_name">* First Name</label>
                                    <div class="controls">
                                        <p>
                                            <input class="validate v-required" type="text" id="first_name" name="first_name" value=""  title="required">
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="middle_name">Middle Name</label>
                                    <div class="controls">
                                        <p>
                                            <input type="text" id="middle_name" name="middle_name" value="">
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group b">
                                    <label class="control-label" for="last_name">Last Name</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="validate v-required" type="text" id="last_name" name="last_name" value="" title="Required">
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="suffix">Suffix (If applicable)</label>
                                    <div class="controls">
                                        <p>
                                            <select name='suffix' id='suffix'>
                                                <option value=''>Select One</option>
                                                <option value='JR'>Jr.</option>
                                                <option value='SR'>Sr.</option>
                                                <option value='II'>II</option>
                                                <option value='III'>III</option>
                                                <option value='IV'>IV</option>
                                                <option value='V'>V</option>
                                            </select>
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="other_name">Maiden Name (If applicable)</label>
                                    <div class="controls">
                                        <p>
                                            <input type="text" id="other_name" name="other_name" value="">
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label b" for="social_tax_id">* Social Security or Taxpayer ID number</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="validate v-ssn" type="text" id="social_tax_id" name="social_tax_id" value="" title="Required"> xxx-xx-xxxx
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label b" for="dob">* Date of Birth</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="validate v-usDate datepicker" type="text" id="dob" name="dob" title="Required"> mm-dd-yyyy
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label b" for="email">* Email</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="validate v-required" type="text" id="email" name="email" value="" title="Required">
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label b" for="home_phone">* Main Phone</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="validate v-phone" type="text" id="home_phone" name="home_phone" value="" title="required"> <span class="phone-desc">###-###-####</span>
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="cell_phone">Cell Phone</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="v-phone" type="text" id="cell_phone" name="cell_phone" value="" title=""> <span class="phone-desc">###-###-####</span>
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label b" for="gender">* Gender</label>
                                    <div class="controls">
                                        <select  class="validate v-required" id="gender" name="gender">
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
                                            <option value="T">Separated</option>
                                            <option value="S">Single</option>
                                            <option value="P">Single Parent</option>
                                            <option value="W">Widowed</option>
                                            <option value="">Prefer Not To Respond</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label blockLabel b" for="country_citizen">* Country of Citizenship</label>
                                    <div class="controls ">
                                        <p> 
                                            <select class="validate v-required" id='country_citizen' name='country_citizen' title='required'>
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
                                    <label class="control-label" for="citizen">Are you a U.S. Citizen?</label>
                                    <div class="controls">
                                        <select  class="" id="citizen" name="citizen">
                                            <option value="">Select One</option>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="green_card">If you are NOT a U.S. Citizen, are you a Permanent Resident of the U.S. (green card holder)?</label>
                                    <div class="controls">
                                        <select  class="" id="green_card" name="green_card">
                                            <option value="">US Citizen</option>
                                            <option value="GC">Yes</option>
                                            <option value="UNKN">No</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label blockLabel" for="green_card_number">Greencard Number</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="green_card_number" name="green_card_number" value="" title="">
                                </fieldset>

                                <!-- <fieldset class="control-group">
                                    <label class="control-label" class="blockLabel" for="social_tax_id">Social Security/Tax ID Number (last four digits)</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="v-required" type="text" id="social_tax_id" maxlength="4"  name="social_tax_id" value="" title=""> xxxx
                                        </p>
                                    </div>
                                </fieldset> -->

                                <fieldset class="control-group">
                                    <label class="control-label" for="greencard_expires">Greencard Expiration Date</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="greencard_expires" name="greencard_expires" title=""> mm/dd/yyyy
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <label class="control-label b" for="veteran">* Are you a US Armed Services Veteran?</label>
                                    <div class="controls">
                                        <select  class="validate v-required" id="veteran" name="veteran" title="requiered">
                                            <option value="">Select one</option>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <div id="military_opt">
                                    <fieldset class="control-group">
                                        <label class="control-label" for="military_branch">In what branch of the military did you serve?</label>
                                        <div class="controls">
                                            <select  class="validate" id="military_branch" name="military_branch" title=''>
                                                <option value="">Select One</option>
                                                <option value="USAF">U.S. Air Force</option>
                                                <option value="ARMY">U.S. Army</option>
                                                <option value="USCG">U.S. Coast Guard</option>
                                                <option value="USMC">U.S. Marine Corps</option>
                                                <option value="NAVY">U.S. Navy</option>
                                            </select>
                                        </div>
                                    </fieldset>
                                </div>

                                <fieldset class="control-group">
                                    <label id="label_address1" class="control-label blockLabel" for="address1">* Permanent Street Address</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="address1" name="address1" value="" title="">
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="address2">Permanent Street Address 2 (P.O. Box / Apt. #)</label>
                                    <div class="controls">
                                        <p>
                                            <input type="text" id="address2" name="address2" value="">
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label id="label_city" class="control-label blockLabel" for="city">* City</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="city" name="city" value="" title="">
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label id="label_state" class="control-label blockLabel" for="state">* State</label>
                                    <div class="controls">
                                        <p>
                                            <select class="" id="state" name="state" title=''>
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
                                    <label id="label_zip" class="control-label" for="zip_code">* Zip Code</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="zip_code" name="zip_code" value="" title="">
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="county_ohio">County of residence (Ohio residents only)</label>
                                    <div class="controls">
                                        <select  class="" id="county_ohio" name="county_ohio">
                                            <option value="">Select One</option>
                                            <option value="ADAM">Adams</option>
                                            <option value="ALLE">Allen</option>
                                            <option value="ASHL">Ashland</option>
                                            <option value="ASHT">Ashtabula</option>
                                            <option value="ATHE">Athens</option>
                                            <option value="AUGL">Auglaize</option>
                                            <option value="BELM">Belmont</option>
                                            <option value="BROW">Brown</option>
                                            <option value="BUTL">Butler</option>
                                            <option value="CARR">Carroll</option>
                                            <option value="CHAM">Champaign</option>
                                            <option value="CLAR">Clark</option>
                                            <option value="CLER">Clermont</option>
                                            <option value="CLIN">Clinton</option>
                                            <option value="COLU">Columbiana</option>
                                            <option value="COSH">Coshocton</option>
                                            <option value="CRAW">Crawford</option>
                                            <option value="CUYA">Cuyahoga</option>
                                            <option value="DARK">Darke</option>
                                            <option value="DEFI">Defiance</option>
                                            <option value="DELA">Delaware</option>
                                            <option value="ERIE">Erie</option>
                                            <option value="FAIR">Fairfield</option>
                                            <option value="FAYE">Fayette</option>
                                            <option value="FRAN">Franklin</option>
                                            <option value="FULT">Fulton</option>
                                            <option value="GALL">Gallia</option>
                                            <option value="GEAU">Geauga</option>
                                            <option value="GREE">Greene</option>
                                            <option value="GUER">Guernsey</option>
                                            <option value="HAMI">Hamilton</option>
                                            <option value="HANC">Hancock</option>
                                            <option value="HARD">Hardin</option>
                                            <option value="HARR">Harrison</option>
                                            <option value="HENR">Henry</option>
                                            <option value="HIGH">Highland</option>
                                            <option value="HOCK">Hocking</option>
                                            <option value="HOLM">Holmes</option>
                                            <option value="HURO">Huron</option>
                                            <option value="JACK">Jackson</option>
                                            <option value="JEFF">Jefferson</option>
                                            <option value="KNOX">Knox</option>
                                            <option value="LAKE">Lake</option>
                                            <option value="LAWR">Lawrence</option>
                                            <option value="LICK">Licking</option>
                                            <option value="LOGA">Logan</option>
                                            <option value="LORA">Lorain</option>
                                            <option value="LUCA">Lucas</option>
                                            <option value="MADI">Madison</option>
                                            <option value="MAHO">Mahoning</option>
                                            <option value="MARI">Marion</option>
                                            <option value="MEDI">Medina</option>
                                            <option value="MEIG">Meigs</option>
                                            <option value="MERC">Mercer</option>
                                            <option value="MIAM">Miami</option>
                                            <option value="MONR">Monroe</option>
                                            <option value="MONT">Montgomery</option>
                                            <option value="MORG">Morgan</option>
                                            <option value="MORR">Morrow</option>
                                            <option value="MUSK">Muskingum</option>
                                            <option value="NOBL">Noble</option>
                                            <option value="OTTA">Ottawa</option>
                                            <option value="PAUL">Paulding</option>
                                            <option value="PERR">Perry</option>
                                            <option value="PICK">Pickaway</option>
                                            <option value="PIKE">Pike</option>
                                            <option value="PORT">Portage</option>
                                            <option value="PREB">Preble</option>
                                            <option value="PUTN">Putnam</option>
                                            <option value="RICH">Richland</option>
                                            <option value="ROSS">Ross</option>
                                            <option value="SAND">Sandusky</option>
                                            <option value="SCIO">Scioto</option>
                                            <option value="SENE">Seneca</option>
                                            <option value="SHEL">Shelby</option>
                                            <option value="STAR">Stark</option>
                                            <option value="SUMM">Summit</option>
                                            <option value="TRUM">Trumbell</option>
                                            <option value="TUSC">Tuscarawas</option>
                                            <option value="UNIO">Union</option>
                                            <option value="UNKN">Unknown</option>
                                            <option value="VANW">Van Wert</option>
                                            <option value="VINT">Vinton</option>
                                            <option value="WARR">Warren</option>
                                            <option value="WASH">Washington</option>
                                            <option value="WAYN">Wayne</option>
                                            <option value="WILL">Williams</option>
                                            <option value="WOOD">Wood</option>
                                            <option value="WYAN">Wyandot</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label id="label_country" class="control-label blockLabel" for="country">* Country</label>
                                    <div class="controls">
                                        <p> 
                                            <select class="" id='country' name='country' title=''>
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

                                
                                <a data-toggle="tab"><input type="button" class="btn btn-primary" id="employerButton" name="emplyerButton" onclick="toEmployer(1)" value="Continue to Optional Information"></a>
                            </fieldset>
                        </div>

                        <div class="tab-pane" id="employer">
                            <fieldset class="heading-fieldset" id="employer-fieldset" title="Optional Information">
                                <legend>Optional Information</legend>

                                <fieldset class="control-group">
                                    <label class="control-label" for="hispanic_latino">Do you consider yourself to be Hispanic/Latino?</label>
                                    <div class="controls">
                                        <select  class="" id="hispanic_latino" name="hispanic_latino">
                                            <option value="">Select one</option>
                                            <option value="Y">Yes I am Hispanic or Latino/Latina</option>
                                            <option value="N">No I am not Hispanic or Latino/Latina</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset id='racial_identity_selector' class="racial_identity_control control-group">
                                    <label class="control-label" for="raceSelect">Select your racial category</label>
                                    <div id="raceSelect" class="controls">
                                        <select class='app-check-list' name='raceSelect'>
                                            <option value="">Select one</option>
                                            <option value="AM">Amer Indian/Alaskan Natv</option>
                                            <option value="AS">Asian </option>
                                            <option value="BL">Black or African American</option>
                                            <option value="MU">Multiracial</option>
                                            <option value="PI">Native Hawaiian or Other Pacific Islander</option>
                                            <option value="WH">White</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset id='racial_identity_control' class="racial_identity_control control-group">
                                    <label class="control-label" for="racial_identity">If you selected Multiracial above, please choose two or more races below</label>
                                    <div id="racial_identity" class="controls">
                                        <ul class='app-check-list'>
                                            <li><input type="checkbox" name="racial_identity[]" value="AM"> - Amer Indian/Alaskan Natv</li>
                                            <li><input type="checkbox" name="racial_identity[]" value="AS"> - Asian </li>
                                            <li><input type="checkbox" name="racial_identity[]" value="BL"> - Black or African American</li>
                                            <li><input type="checkbox" name="racial_identity[]" value="PI"> - Native Hawaiian or Other Pacific Islander</li>
                                            <li><input type="checkbox" name="racial_identity[]" value="WH"> - White</li>
                                        </ul>
                                    </div>
                                </fieldset> 

                                <fieldset class="control-group">
                                    <label class="control-label" for="religious_preference">Religious Affiliation</label>
                                    <div class="controls">
                                        <select name="religous_preference" id="religous_preference">
                                            <option value="">Select One</option>
                                            <option value="ADVE">Advent Christian</option>
                                            <option value="AFME">African Meth Episcopal</option>
                                            <option value="ANGL">Anglican</option>
                                            <option value="APOS">Apostolic</option>
                                            <option value="ASSM">Assembly of God</option>
                                            <option value="BAHI">Bahai Faith</option>
                                            <option value="BAPT">Baptist</option>
                                            <option value="BPAM">Baptist, American</option>
                                            <option value="BPFW">Baptist, Free Will</option>
                                            <option value="BPST">Baptist, Southern</option>
                                            <option value="BIBP">Bible Baptist</option>
                                            <option value="BIBL">Bible Church</option>
                                            <option value="BUDH">Buddhist</option>
                                            <option value="CCCH">Ch of Christ, Christian</option>
                                            <option value="CCHO">Ch of Christ, Holiness</option>
                                            <option value="CHAR">Charismatic</option>
                                            <option value="CHCU">Christ, Christian Union</option>
                                            <option value="CH">Christian</option>
                                            <option value="CHMA">Christian &amp; Mission All</option>
                                            <option value="CHME">Christian Meth Episcopal</option>
                                            <option value="CHRE">Christian Reformed</option>
                                            <option value="CHSC">Christian Scientist</option>
                                            <option value="MORM">Church Of Latter Day Sts</option>
                                            <option value="CC">Church of Christ</option>
                                            <option value="CG">Church of God</option>
                                            <option value="CGIC">Church of God in Christ</option>
                                            <option value="CGA">Church of God-Anderson</option>
                                            <option value="CGCT">Church of God-Cleve. TN</option>
                                            <option value="CHBR">Church of the Brethren</option>
                                            <option value="NAZA">Church of the Nazarene</option>
                                            <option value="CGGC">Churches of God-Gen Conf</option>
                                            <option value="CONG">Congregational</option>
                                            <option value="COVN">Covenant</option>
                                            <option value="DISC">Disciples of Christ</option>
                                            <option value="EAOR">Eastern Orthodox</option>
                                            <option value="EPIS">Episcopal</option>
                                            <option value="EVMN">Evangelical Mennonite</option>
                                            <option value="EVUB">Evangelical United Breth</option>
                                            <option value="FABI">Faith Bible</option>
                                            <option value="FOUR">Four-Square Church</option>
                                            <option value="HIND">Hindu</option>
                                            <option value="JEHO">Jehovah's Witness</option>
                                            <option value="JEW">Jewish</option>
                                            <option value="LDS">Latter Day Saints</option>
                                            <option value="LUTH">Lutheran</option>
                                            <option value="MENN">Mennonite</option>
                                            <option value="METH">Methodist</option>
                                            <option value="MORA">Moravian</option>
                                            <option value="MUSL">Muslim</option>
                                            <option value="NOPR">No Preference</option>
                                            <option value="NONE">Non-Denominational</option>
                                            <option value="OTH">Other</option>
                                            <option value="PENT">Pentecostal</option>
                                            <option value="PRES">Presbyterian</option>
                                            <option value="PROT">Protestant</option>
                                            <option value="QUAK">Quaker</option>
                                            <option value="REFO">Reformed</option>
                                            <option value="CATH">Roman Catholic</option>
                                            <option value="SALV">Salvation Army</option>
                                            <option value="SEVE">Seventh Day Adventist</option>
                                            <option value="UNIT">Unitarian</option>
                                            <option value="UNBR">United Brethren</option>
                                            <option value="UNCC">United Church of Christ</option>
                                            <option value="UNMT">United Methodist</option>
                                            <option value="UNKN">Unknown</option>
                                            <option value="WESL">Wesleyan</option>
                                        </select>
                                    </div>
                                </fieldset>

                            </fieldset>
                            <a data-toggle="tab"><input type="button" class="btn" id="personalBackButton" name="personalBackButton" onclick="toPersonal(1)" value="Back To Personal Information"></a>
                            <a data-toggle="tab"><input type="button" class="btn btn-primary" id="educationButton" name="educationButton" onclick="toEducation(1)" value="Continue to Academic Information"></a>
                        </div>

                        <div class="tab-pane" id="education">
                            <fieldset class="heading-fieldset" id="education-fieldset" title="Academic Information">
                                <legend>Academic Information</legend>

                                <fieldset class="control-group">
                                    <label class="control-label b" for="attending">* Intended Status</label>
                                    <div class="controls">
                                        <select  class="validate v-required" id="attending" name="attending" title="required">
                                            <option value="">Select One</option>
                                            <option value="9">Full-Time (9+ hours)</option>
                                            <option value="1">Part-Time</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label b" for="enrollment_year">* Planned enrollment year</label>
                                    <div class="controls">
                                        <p> 
                                            <select  class="validate v-required" id="enrollment_year" name="enrollment_year" title="required">
                                                <option value="">Select One</option>
                                                <option value="2013">2013</option>
                                                <option value="2014">2014</option>
                                            </select>
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="preferred_contact">How would you like to be contacted?</label>
                                    <div class="controls">
                                        <select  class="" id="preferred_contact" name="preferred_contact">
                                            <option value="">Select One</option>
                                            <option value="E">Email</option>
                                            <option value="P">Postal Service</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label b" for="start_term">* Planned enrollment session (two blocks start each semester)</label>
                                    <div class="controls">
                                        <select  class="validate v-required" id="start_term" name="start_term" title="required"> 
                                            <option value="">Select One</option>
                                            <option value="FA">Fall (August)</option>
                                            <option value="SP">Spring (January)</option>
                                            <option value="SM">Summer (May)</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="high_school_ceeb">High School Code</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="high_school_ceeb" name="high_school_ceeb" value=""> <a href='http://www.actstudent.org/regist/lookuphs/' target='_blank' >Find High School Code</a>
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="high_school_name">Name of high school</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="high_school_name" name="high_school_name" value="" >
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="high_school_addr1">High School Address 1</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="high_school_addr1" name="high_school_addr1" value="" >
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="high_school_addr2">High School Address 2</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="high_school_addr2" name="high_school_addr2" value="" >
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="high_school_city">High School city</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="high_school_city" name="high_school_city" value="" >
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="high_school_state">High School State</label>
                                    <div class="controls">
                                        <p>
                                            <select class="" id="high_school_state" name="high_school_state">
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
                                    <label class="control-label" for="high_school_zip">High School Zip Code</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="high_school_zip" name="high_school_zip" value="" >
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label blockLabel" for="high_school_country">High School Country</label>
                                    <div class="controls ">
                                        <p> 
                                            <select class="" id='high_school_country' name='high_school_country' title=''>
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
                                    <label class="control-label" for="high_school_phone">High School Phone</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="high_school_phone" name="high_school_phone" value="" >
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label b" for="high_school_graduation">* Graduation Date</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="v-usDate datepicker" type="text" id="high_school_graduation" name="high_school_graduation" title=""> mm-dd-yyyy
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="high_school_counselor">High School Counselor</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="high_school_counselor" name="high_school_counselor" value="" >
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <label class="control-label" for="high_school_college_credit">Did you take coursework for college credit (post-secondary) while attending high school? If so, please list that information in the next section.</label>
                                    <div class="controls">
                                        <select  class="" id="high_school_college_credit" name="high_school_college_credit">
                                            <option value="">Select one</option>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <p>List chronologically all colleges, universities, and technical schools attended. Be sure to include Aurora University if you attended here.</p>
                                </fieldset>

                                <h6>Prior College #1</h6>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtPriorCollege1">College/University</label>
                                    <div class="controls">
                                        <input class="span5" type="text" id="txtPriorCollege1" name="txtPriorCollege1" value=""> <a href='http://www.actstudent.org/scores/scodes/' target='_blank' >Find College CEEB Code</a>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="ceeb1">College/University CEEB code</label>
                                    <div class="controls">
                                        <input class="span5" type="text" id="ceeb1" name="ceeb1" value="">
                                    </div>
                                </fieldset>

                                <h6>Prior College #2</h6>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtPriorCollege2">College/University</label>
                                    <div class="controls">
                                        <input class="span5" type="text" id="txtPriorCollege2" name="txtPriorCollege2" value="">
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="ceeb2">College/University CEEB code</label>
                                    <div class="controls">
                                        <input class="span5" type="text" id="ceeb2" name="ceeb2" value="">
                                    </div>
                                </fieldset>

                                <h6>Prior College #3</h6>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtPriorCollege3">College/University</label>
                                    <div class="controls">
                                        <input class="span5" type="text" id="txtPriorCollege3" name="txtPriorCollege3" value="">
                                    </div>
                                </fieldset>          

                                <fieldset class="control-group">
                                    <label class="control-label" for="ceeb3">College/University CEEB code</label>
                                    <div class="controls">
                                        <input class="span5" type="text" id="ceeb3" name="ceeb3" value="">
                                    </div>
                                </fieldset>                      

                                <h6>Prior College #4</h6>
                                <fieldset class="control-group">
                                    <label class="control-label" for="txtPriorCollege4">College/University</label>
                                    <div class="controls">
                                        <input class="span5" type="text" id="txtPriorCollege4" name="txtPriorCollege4" value="">
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="ceeb4">College/University CEEB code</label>
                                    <div class="controls">
                                        <input class="span5" type="text" id="ceeb4" name="ceeb4" value="">
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
                                    <label class="control-label" for="ceeb5">College/University CEEB code</label>
                                    <div class="controls">
                                        <input class="span5" type="text" id="ceeb5" name="ceeb5" value="">
                                    </div>
                                </fieldset>

                            </fieldset>
                            <a data-toggle="tab"><input type="button" class="btn" id="employerBackButton" name="employerBackButton" onclick="toEmployer(1)" value="Back To Optional Information"></a>
                            <a data-toggle="tab"><input type="button" class="btn btn-primary" id="religiousButton" name="religiousButton" onclick="toAdditional(1)" value="Continue to Employment Information"></a>
                        </div>  <!-- demographic -->

                        <div class="tab-pane longtext" id="additional">
                            <fieldset class="heading-fieldset" id="additional-fieldset" title="Employment Information">
                                <legend>Employment Information</legend>

                                <fieldset class="control-group">
                                    <label class="control-label" for="current_employer">Current Employer Name</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="current_employer" name="current_employer" value="" >
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="current_employer_addr1">Current Employer Address 1</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="current_employer_addr1" name="current_employer_addr1" value="" >
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="current_employer_addr2">Current Employer Address 2</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="current_employer_addr2" name="current_employer_addr2" value="" >
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="current_employer_city">Current Employer city</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="current_employer_city" name="current_employer_city" value="" >
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="current_employer_state">State</label>
                                    <div class="controls">
                                        <p>
                                            <select class="" id="current_employer_state" name="current_employer_state">
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
                                    <label class="control-label" for="current_employer_zip">Current Employer Zip Code</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="current_employer_zip" name="current_employer_zip" value="" >
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label blockLabel" for="current_employer_country">Current Employer Country</label>
                                    <div class="controls ">
                                        <p> 
                                            <select class="" id='current_employer_country' name='current_employer_country' title=''>
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
                                    <label class="control-label" for="current_employer_phone">Current Employer Phone</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="current_employer_phone" name="current_employer_phone" value="" >
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset class="control-group">
                                    <label class="control-label" for="current_employer_ext">Current Employer Ext.</label>
                                    <div class="controls">
                                        <p> 
                                            <input class="" type="text" id="current_employer_ext" name="current_employer_ext" value="" >
                                        </p>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <label class="control-label" for="current_employer_reimburse">Will your employer reimburse you for all or part of the tuition charges?</label>
                                    <div class="controls">
                                        <select  class="" id="current_employer_reimburse" name="current_employer_reimburse">
                                            <option value="">Select one</option>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        </select>
                                    </div>
                                </fieldset>
                              

                            </fieldset>
                            <a data-toggle="tab"><input type="button" class="btn" id="religiousBackButton" name="religiousBackButton" onclick="toEducation(1)" value="Back to Academic Information"></a>
                            <a data-toggle="tab"><input type="button" class="btn btn-primary" id="otherButton" name="otherButton" onclick="toOther(1)" value="Continue to Personal Essay"></a>
                        </div>  <!-- Educational -->
                      

                        <div class="tab-pane longtext" id="other">
                            <fieldset class="heading-fieldset" id="otherInfo-fieldset" title="Personal Essay">
                                <legend>Personal Essay</legend>

                                <fieldset class="control-group">
                                    <label class="control-label" for="personal_statement">Please provide a Personal Essay. Include information about your educational and career goals</label>
                                    <div class="controls">
                                        <p> 
                                            <textarea class="input-xlarge span7" maxlength="10000" rows="30" id="personal_statement" name="personal_statement"title=""></textarea>
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
                            <a data-toggle="tab"><input type="button" class="btn" id="additionalBackButton" name="additionalBackButton" onclick="toAdditional(1)" value="Back To Employment Information"/></a>
                            <!-- <input type="submit" class="btn btn-primary" id="completeButton" name="completeButton" onclick="()" value="Complete"/> -->
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

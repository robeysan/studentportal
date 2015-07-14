<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Tuc {
    public function get_term_options(){
        return;
    }

    public function show_program_chooser($student_type) {
        return true;
    }

    public function get_basic_user_fields_from_app() {
        return array(
            'address' => 'address1',
            'phone' => 'home_phone',
            'city' => 'city',
            'state' => 'state',
            'zip' => 'zip_code'
        );
    }

    public function get_state_options() {
        $state_options='';
		$states = array(array('abbreviation'=>'', 'name'=>'Select State'),
						array('abbreviation'=>'AL', 'name'=>"Alabama"),
		                array('abbreviation'=>'AK', 'name'=>"Alaska"),  
		                array('abbreviation'=>'AZ', 'name'=>"Arizona"),  
		                array('abbreviation'=>'AR', 'name'=>"Arkansas"),  
		                array('abbreviation'=>'CA', 'name'=>"California"),  
		                array('abbreviation'=>'CO', 'name'=>"Colorado"),  
		                array('abbreviation'=>'CT', 'name'=>"Connecticut"),  
		                array('abbreviation'=>'DE', 'name'=>"Delaware"),  
		                array('abbreviation'=>'DC', 'name'=>"District Of Columbia"),  
		                array('abbreviation'=>'FL', 'name'=>"Florida"),  
		                array('abbreviation'=>'GA', 'name'=>"Georgia"),  
		                array('abbreviation'=>'HI', 'name'=>"Hawaii"),  
		                array('abbreviation'=>'ID', 'name'=>"Idaho"),  
		                array('abbreviation'=>'IL', 'name'=>"Illinois"),  
		                array('abbreviation'=>'IN', 'name'=>"Indiana"),  
		                array('abbreviation'=>'IA', 'name'=>"Iowa"),  
		                array('abbreviation'=>'KS', 'name'=>"Kansas"),  
		                array('abbreviation'=>'KY', 'name'=>"Kentucky"),  
		                array('abbreviation'=>'LA', 'name'=>"Louisiana"),  
		                array('abbreviation'=>'ME', 'name'=>"Maine"),  
		                array('abbreviation'=>'MD', 'name'=>"Maryland"),  
		                array('abbreviation'=>'MA', 'name'=>"Massachusetts"),  
		                array('abbreviation'=>'MI', 'name'=>"Michigan"),  
		                array('abbreviation'=>'MN', 'name'=>"Minnesota"),  
		                array('abbreviation'=>'MS', 'name'=>"Mississippi"),  
		                array('abbreviation'=>'MO', 'name'=>"Missouri"),  
		                array('abbreviation'=>'MT', 'name'=>"Montana"),
		                array('abbreviation'=>'NE', 'name'=>"Nebraska"),
		                array('abbreviation'=>'NV', 'name'=>"Nevada"),
		                array('abbreviation'=>'NH', 'name'=>"New Hampshire"),
		                array('abbreviation'=>'NJ', 'name'=>"New Jersey"),
		                array('abbreviation'=>'NM', 'name'=>"New Mexico"),
		                array('abbreviation'=>'NY', 'name'=>"New York"),
		                array('abbreviation'=>'NC', 'name'=>"North Carolina"),
		                array('abbreviation'=>'ND', 'name'=>"North Dakota"),
		                array('abbreviation'=>'OH', 'name'=>"Ohio"),  
		                array('abbreviation'=>'OK', 'name'=>"Oklahoma"),  
		                array('abbreviation'=>'OR', 'name'=>"Oregon"),  
		                array('abbreviation'=>'PA', 'name'=>"Pennsylvania"),  
		                array('abbreviation'=>'RI', 'name'=>"Rhode Island"),  
                        array('abbreviation'=>'SC', 'name'=>"South Carolina"),  
                        array('abbreviation'=>'SD', 'name'=>"South Dakota"),
                        array('abbreviation'=>'TN', 'name'=>"Tennessee"),  
                        array('abbreviation'=>'TX', 'name'=>"Texas"),  
                        array('abbreviation'=>'UT', 'name'=>"Utah"),  
                        array('abbreviation'=>'VT', 'name'=>"Vermont"),  
                        array('abbreviation'=>'VA', 'name'=>"Virginia"),  
                        array('abbreviation'=>'WA', 'name'=>"Washington"),  
                        array('abbreviation'=>'WV', 'name'=>"West Virginia"),  
                        array('abbreviation'=>'WI', 'name'=>"Wisconsin"),  
                        array('abbreviation'=>'WY', 'name'=>"Wyoming"));

        foreach($states AS $key=>$value){
            $state_options.='<option value="'.$value['abbreviation'].'">'.$value['name'].'</option>'."\n";
        }

        return $state_options;

    }

    public function populate_application_from_leadform($data) {
        $CI =& get_instance();
        $CI->load->model('Application_model');

        // Write user data to application
        $app_user['first_name'] = $data['first_name'];
        $app_user['last_name'] = $data['last_name'];
        $app_user['email'] = $data['email'];
        $app_user['gender'] = (isset($data['gender'])) ? $data['gender'] : '';
        $app_user['address1'] = (isset($data['address'])) ? $data['address'] : '';
        $app_user['home_phone'] = $data['phone'];
        $app_user['city'] = (isset($data['city'])) ? $data['city'] : '';
        $app_user['state'] = (isset($data['state'])) ? $data['state'] : '';
        $app_user['zip_code'] = (isset($data['zip'])) ? $data['zip'] : '';
        $app_user['uid'] = $data['uid'];
        $app_user['country'] = '';

        if(isset($data['country']) && $data['country'] == "United States") {
            $app_user['country'] = "US";
        }
        else if(isset($data['country']) && $data['country'] == "Canada") {
            $app_user['country'] = "CA";
        }

        $CI->Application_model->add($app_user['uid'], $app_user);
    }

    public function add_custom_fields(&$application) {
        
        $phone = explode("-", $application['home_phone']); // break out area code
        $application['home_phone_area_code'] = $phone[0];
        $application['home_phone'] = $phone[1].'-'.$phone[2];//add the rest of the phone number to app data
        if ($application['hispanic_latino'] == 'y') { //if the are you hispanic question is answered yes 
            $application['racial_identity'] = '3'; //set racial identity to 3 (for hispanic)
        }
        if ($application['englNative']=='y') {//if native language is english
            $application['language']='ENGL';//set language as english
        }
        
        //Touro has requested that all prior school information be included in on pipe field.
        //Allways add the first schools info even if its blank
        $application['prior_schools'] = ' School 1 - '.$application['txtPriorCollege1'].' - Year: '.$application['txtPriorCollege1_year'].' - Study: '.$application['txtPriorCollege1_studied'].' - Degree: '.$application['txtPriorCollege1_degree'].' - GPA: '.$application['txtPriorCollege1_gpa'];
        //Only adding the 2rd thru 5th schools info if its present
        if (isset($application['txtPriorCollege2'])) {
            $application['prior_schools'] .= ' - School 2 - '.$application['txtPriorCollege2'].' - Year: '.$application['txtPriorCollege2_year'].' - Study: '.$application['txtPriorCollege2_studied'].' - Degree: '.$application['txtPriorCollege2_degree'].' - GPA: '.$application['txtPriorCollege2_gpa'];
        }
        if (isset($application['txtPriorCollege3'])) {
            $application['prior_schools'] .= ' - School 3 - '.$application['txtPriorCollege3'].' - Year: '.$application['txtPriorCollege3_year'].' - Study: '.$application['txtPriorCollege3_studied'].' - Degree: '.$application['txtPriorCollege3_degree'].' - GPA: '.$application['txtPriorCollege3_gpa'];
        }
        if (isset($application['txtPriorCollege4'])) {
            $application['prior_schools'] .= ' - School 4 - '.$application['txtPriorCollege4'].' - Year: '.$application['txtPriorCollege4_year'].' - Study: '.$application['txtPriorCollege4_studied'].' - Degree: '.$application['txtPriorCollege4_degree'].' - GPA: '.$application['txtPriorCollege4_gpa'];
        }
        if (isset($application['txtPriorCollege5'])) {
            $application['prior_schools'] .= ' - School 5 - '.$application['txtPriorCollege5'].' - Year: '.$application['txtPriorCollege5_year'].' - Study: '.$application['txtPriorCollege5_studied'].' - Degree: '.$application['txtPriorCollege5_degree'].' - GPA: '.$application['txtPriorCollege5_gpa'];
        }

        return;
    }

    public function get_programs_with_id() {
        return array(
            array('item_id' => '2283', 'name' => 'TEST Master of Arts in Media and Communications Psychology')
            );
    }

    public function get_programs($student_type){
        $programs = array();
        return $programs = array(
            array('program_id' => '784', 'name' => 'RN to BSN'),
            array('program_id' => '785', 'name' => 'Special Ed Endorsement'),
            array('program_id' => '828', 'name' => 'Bilingual-ESL Endorsment'),
            array('program_id' => '783', 'name' => 'BA in Communications'),
            array('program_id' => '786', 'name' => 'BA in Business Administration'),
            array('program_id' => '916', 'name' => 'BA in Criminal Justice'),
            array('program_id' => '924', 'name' => 'Master of Business Administration'),
            array('program_id' => '925', 'name' => 'Master of Business Administration, Leadership Concentration'),
            array('program_id' => '923', 'name' => 'Master of Science in Criminal Justice'),
            );
    }

    public function get_country_options() {
        $country_options='<option value="">Please select</option>
            <option value="US">United States</option>
            <option value="AF">Afghanistan</option>
            <option value="AX">Åland Islands</option>
            <option value="AL">Albania</option>
            <option value="DZ">Algeria</option>
            <option value="AS">American Samoa</option>
            <option value="AD">Andorra</option>
            <option value="AO">Angola</option>
            <option value="AI">Anguilla</option>
            <option value="AQ">Antarctica</option>
            <option value="AG">Antigua And Barbuda</option>
            <option value="AR">Argentina</option>
            <option value="AM">Armenia</option>
            <option value="AW">Aruba</option>
            <option value="AU">Australia</option>
            <option value="AT">Austria</option>
            <option value="AZ">Azerbaijan</option>
            <option value="BS">Bahamas</option>
            <option value="BH">Bahrain</option>
            <option value="BD">Bangladesh</option>
            <option value="BB">Barbados</option>
            <option value="BY">Belarus</option>
            <option value="BE">Belgium</option>
            <option value="BZ">Belize</option>
            <option value="BJ">Benin</option>
            <option value="BM">Bermuda</option>
            <option value="BT">Bhutan</option>
            <option value="BO">Bolivia</option>
            <option value="BA">Bosnia And Herzegovina</option>
            <option value="BW">Botswana</option>
            <option value="BV">Bouvet Island</option>
            <option value="BR">Brazil</option>
            <option value="IO">British Indian Ocean Territory</option>
            <option value="BN">Brunei Darussalam</option>
            <option value="BG">Bulgaria</option>
            <option value="BF">Burkina Faso</option>
            <option value="BI">Burundi</option>
            <option value="KH">Cambodia</option>
            <option value="CM">Cameroon</option>
            <option value="CA">Canada</option>
            <option value="CV">Cape Verde</option>
            <option value="KY">Cayman Islands</option>
            <option value="CF">Central African Republic</option>
            <option value="TD">Chad</option>
            <option value="CL">Chile</option>
            <option value="CN">China</option>
            <option value="CX">Christmas Island</option>
            <option value="CC">Cocos (Keeling) Islands</option>
            <option value="CO">Colombia</option>
            <option value="KM">Comoros</option>
            <option value="CG">Congo</option>
            <option value="CD">Congo, The Democratic Republic Of The</option>
            <option value="CK">Cook Islands</option>
            <option value="CR">Costa Rica</option>
            <option value="CI">Cote D\'Ivoire</option>
            <option value="HR">Croatia</option>
            <option value="CU">Cuba</option>
            <option value="CY">Cyprus</option>
            <option value="CZ">Czech Republic</option>
            <option value="DK">Denmark</option>
            <option value="DJ">Djibouti</option>
            <option value="DM">Dominica</option>
            <option value="DO">Dominican Republic</option>
            <option value="EC">Ecuador</option>
            <option value="EG">Egypt</option>
            <option value="SV">El Salvador</option>
            <option value="GQ">Equatorial Guinea</option>
            <option value="ER">Eritrea</option>
            <option value="EE">Estonia</option>
            <option value="ET">Ethiopia</option>
            <option value="FK">Falkland Islands (Malvinas)</option>
            <option value="FO">Faroe Islands</option>
            <option value="FJ">Fiji</option>
            <option value="FI">Finland</option>
            <option value="FR">France</option>
            <option value="GF">French Guiana</option>
            <option value="PF">French Polynesia</option>
            <option value="TF">French Southern Territories</option>
            <option value="GA">Gabon</option>
            <option value="GM">Gambia</option>
            <option value="GE">Georgia</option>
            <option value="DE">Germany</option>
            <option value="GH">Ghana</option>
            <option value="GI">Gibraltar</option>
            <option value="GR">Greece</option>
            <option value="GL">Greenland</option>
            <option value="GD">Grenada</option>
            <option value="GP">Guadeloupe</option>
            <option value="GU">Guam</option>
            <option value="GT">Guatemala</option>
            <option value=" Gg">Guernsey</option>
            <option value="GN">Guinea</option>
            <option value="GW">Guinea-Bissau</option>
            <option value="GY">Guyana</option>
            <option value="HT">Haiti</option>
            <option value="HM">Heard Island And Mcdonald Islands</option>
            <option value="VA">Holy See (Vatican City State)</option>
            <option value="HN">Honduras</option>
            <option value="HK">Hong Kong</option>
            <option value="HU">Hungary</option>
            <option value="IS">Iceland</option>
            <option value="IN">India</option>
            <option value="ID">Indonesia</option>
            <option value="IR">Iran, Islamic Republic Of</option>
            <option value="IQ">Iraq</option>
            <option value="IE">Ireland</option>
            <option value="IM">Isle Of Man</option>
            <option value="IL">Israel</option>
            <option value="IT">Italy</option>
            <option value="JM">Jamaica</option>
            <option value="JP">Japan</option>
            <option value="JE">Jersey</option>
            <option value="JO">Jordan</option>
            <option value="KZ">Kazakhstan</option>
            <option value="KE">Kenya</option>
            <option value="KI">Kiribati</option>
            <option value="KP">Korea, Democratic People\'s Republic Of</option>
            <option value="KR">Korea, Republic Of</option>
            <option value="KW">Kuwait</option>
            <option value="KG">Kyrgyzstan</option>
            <option value="LA">Lao People\'s Democratic Republic</option>
            <option value="LV">Latvia</option>
            <option value="LS">Lesotho</option>
            <option value="LR">Liberia</option>
            <option value="LY">Libyan Arab Jamahiriya</option>
            <option value="LI">Liechtenstein</option>
            <option value="LT">Lithuania</option>
            <option value="LU">Luxembourg</option>
            <option value="MO">Macao</option>
            <option value="MK">Macedonia, The Former Yugoslav Republic Of</option>
            <option value="MG">Madagascar</option>
            <option value="MW">Malawi</option>
            <option value="MY">Malaysia</option>
            <option value="MV">Maldives</option>
            <option value="ML">Mali</option>
            <option value="MT">Malta</option>
            <option value="MH">Marshall Islands</option>
            <option value="MQ">Martinique</option>
            <option value="MR">Mauritania</option>
            <option value="MU">Mauritius</option>
            <option value="YT">Mayotte</option>
            <option value="MX">Mexico</option>
            <option value="FM">Micronesia, Federated States Of</option>
            <option value="MD">Moldova, Republic Of</option>
            <option value="MC">Monaco</option>
            <option value="MN">Mongolia</option>
            <option value="MS">Montserrat</option>
            <option value="MA">Morocco</option>
            <option value="MZ">Mozambique</option>
            <option value="MM">Myanmar</option>
            <option value="NA">Namibia</option>
            <option value="NR">Nauru</option>
            <option value="NP">Nepal</option>
            <option value="NL">Netherlands</option>
            <option value="AN">Netherlands Antilles</option>
            <option value="NC">New Caledonia</option>
            <option value="NZ">New Zealand</option>
            <option value="NI">Nicaragua</option>
            <option value="NE">Niger</option>
            <option value="NG">Nigeria</option>
            <option value="NU">Niue</option>
            <option value="NF">Norfolk Island</option>
            <option value="MP">Northern Mariana Islands</option>
            <option value="NO">Norway</option>
            <option value="OM">Oman</option>
            <option value="PK">Pakistan</option>
            <option value="PW">Palau</option>
            <option value="PS">Palestinian Territory, Occupied</option>
            <option value="PA">Panama</option>
            <option value="PG">Papua New Guinea</option>
            <option value="PY">Paraguay</option>
            <option value="PE">Peru</option>
            <option value="PH">Philippines</option>
            <option value="PN">Pitcairn</option>
            <option value="PL">Poland</option>
            <option value="PT">Portugal</option>
            <option value="PR">Puerto Rico</option>
            <option value="QA">Qatar</option>
            <option value="RE">Reunion</option>
            <option value="RO">Romania</option>
            <option value="RU">Russian Federation</option>
            <option value="RW">Rwanda</option>
            <option value="SH">Saint Helena</option>
            <option value="KN">Saint Kitts And Nevis</option>
            <option value="LC">Saint Lucia</option>
            <option value="PM">Saint Pierre And Miquelon</option>
            <option value="VC">Saint Vincent And The Grenadines</option>
            <option value="WS">Samoa</option>
            <option value="SM">San Marino</option>
            <option value="ST">Sao Tome And Principe</option>
            <option value="SA">Saudi Arabia</option>
            <option value="SN">Senegal</option>
            <option value="CS">Serbia And Montenegro</option>
            <option value="SC">Seychelles</option>
            <option value="SL">Sierra Leone</option>
            <option value="SG">Singapore</option>
            <option value="SK">Slovakia</option>
            <option value="SI">Slovenia</option>
            <option value="SB">Solomon Islands</option>
            <option value="SO">Somalia</option>
            <option value="ZA">South Africa</option>
            <option value="GS">South Georgia And The South Sandwich Islands</option>
            <option value="ES">Spain</option>
            <option value="LK">Sri Lanka</option>
            <option value="SD">Sudan</option>
            <option value="SR">Suriname</option>
            <option value="SJ">Svalbard And Jan Mayen</option>
            <option value="SZ">Swaziland</option>
            <option value="SE">Sweden</option>
            <option value="CH">Switzerland</option>
            <option value="SY">Syrian Arab Republic</option>
            <option value="TW">Taiwan, Province Of China</option>
            <option value="TJ">Tajikistan</option>
            <option value="TZ">Tanzania, United Republic Of</option>
            <option value="TH">Thailand</option>
            <option value="TL">Timor-Leste</option>
            <option value="TG">Togo</option>
            <option value="TK">Tokelau</option>
            <option value="TO">Tonga</option>
            <option value="TT">Trinidad And Tobago</option>
            <option value="TN">Tunisia</option>
            <option value="TR">Turkey</option>
            <option value="TM">Turkmenistan</option>
            <option value="TC">Turks And Caicos Islands</option>
            <option value="TV">Tuvalu</option>
            <option value="UG">Uganda</option>
            <option value="UA">Ukraine</option>
            <option value="AE">United Arab Emirates</option>
            <option value="GB">United Kingdom</option>
            <option value="US">United States</option>
            <option value="UM">United States Minor Outlying Islands</option>
            <option value="UY">Uruguay</option>
            <option value="UZ">Uzbekistan</option>
            <option value="VU">Vanuatu</option>
            <option value="VE">Venezuela</option>
            <option value="VN">Viet Nam</option>
            <option value="VG">Virgin Islands, British</option>
            <option value="VI">Virgin Islands, U.S.</option>
            <option value="WF">Wallis And Futuna</option>
            <option value="EH">Western Sahara</option>
            <option value="YE">Yemen</option>
            <option value="ZM">Zambia</option>
            <option value="ZW">Zimbabwe</option>';

        return $country_options;
    }       

    public function get_corporate_partners() {
        $student_type = $this->get_student_type();

        $partners = array('Ajasa Technologies', 'Allina Health Systems (United Hospital)', 'Cub Foods', 'Dominos Pizza',
            'Duluth Police Department', 'Express Scripts', 'Fairview Heath System', 'Fourteen Foods', 
            'Fraternal Order of Police Officers', 'Lunds/Byerly\'s', 'Minneapolis Police Department', 
            'Minnesota Head Start Programs', 'MN Gastroenterology, PA', 'SuperValu Corporation', 'Sylvan Learning Center',
            'Tuition Advisory Services', 'UnitedHealth Group', 'UPS Corporation', 'YMCA');

        switch($student_type) {

        case 'ND':
            $partners = array_merge($partners, array('Normandale CC', 'St. Paul College CC', 'Inver Hills CC', 
                'Dakota Community and Technical College', 'Hennepin Tech-Eden Prarie', 'South Central Mankato', 
                'South Central Fairbault', 'North Hennepin', 'Anoka Ramsey', 'Century College', 'Hennepin Tech-Brooklyn Park',
                'Ridgewater-Hutchinson', 'Ridgewater-Willmar', 'Anoka Technical', 'Riverland-Owatonna', 'Riverland-Albert Lea',
                'Riverland-Austin'));
            break;
        }

        sort($partners);
        return $partners;
    }

    // Used if external calls fail
    public function redirect_to_old_application($program_type = '') {
        $CI =& get_instance();
        switch($program_type) {
        case 'ND':
            redirect($CI->config->item('online_undergraduate_application_url'));
            break;
        case 'NG':
            redirect($CI->config->item('online_graduate_application_url'));
            break;
        case '':
            redirect($CI->config->item('online_undergraduate_application_url'));
            break;
        }
    }

    public function get_student_type(){
        $CI =& get_instance();
        $CI->load->model('Users_model');
        $CI->load->library('session');

        $user = $CI->Users_model->get_user_by_uid($CI->session->userdata('uid'));
        return $this->get_degree_type($user['item_id']);
    }

    public function get_degree_type($item_id) {
        switch ($item_id) {
        case '730':     // Master of Arts in Sport Management
            return 'NG';
            break;
        case '728':    // Bachelor of Arts in Business 
            return 'ND';
            break;
        case '731':    // Bachelor of Arts in Health Care
            return 'ND';    
            break;
        case '853':    // Master of Arts in Strategic Communications
            return 'NG';
            break;
        case '832':    // Associate of Arts
            return 'ND';
            break;
        case '833':    // Associate of Arts in Early Childhood Education
            return 'ND';
            break;
        case '854':    // Bachelor of Arts in Accounting
            return 'ND';
            break;
        case '834':    // Bachelor of Arts in Child Development
            return 'ND';
            break;
        case '835':    // Bachelor of Arts in Criminal Justice
            return 'ND';
            break;
        case '836':    // Bachelor of Arts in Exercise Science
            return 'ND';
            break;
        case '837':    // Bachelor of Arts in Family Life Education
            return 'ND';
            break;
        case '838':    // Bachelor of Arts in Food Retail Management
            return 'ND';
            break;
        case '839':    // Bachelor of Arts in Hospitality Management
            return 'ND';
            break;
        case '840':    // Bachelor of Arts in Human Resource Management
            return 'ND';
            break;
        case '841':    // Bachelor of Arts in Information and Technolog_messagey Management
            return 'ND';
            break;
        case '842':    // Bachelor of Arts in Marketing and Innovation Management
            return 'ND';
            break;
        case '855':    // Bachelor of Arts in Organizational Management and Leadership
            return 'ND';
            break;
        case '843':    // Bachelor of Science in Pulmonary Science
            return 'ND';
            break;
        case '844':    // Bachelor of Science in Radiolog_messageic Science Leadership
            return 'ND';
            break;
        case '845':    // Master of Business Administration
            return 'NG';
            break;
        case '846':    // Master of Business Administration - Health Care Management
            return 'NG';
            break;
        case '848':    // Master of Arts in Criminal Justice Leadership
            return 'NG';
            break;
        case '849':    // Master of Arts in Education - Early Childhood Education
            return 'NG';
            break;
        case '850':    // Master of Arts in Family Life Education
            return 'NG';
            break;
        case '851':    // Master of Arts in Human Resource Management
            return 'NG';
            break;
        case '852':    // Master of Arts in Leadership and Management
            return 'NG';
            break;
        case '897':    // Classroom Instruction with K-12 Reading Endorsement 
            return 'NG';
            break;                   
        case '896':    // Differentiated Instruction
            return 'NG';
            break;
        case '849':    // Early Childhood Education 
            return 'NG';
            break;
        case '895':    // Educational Leadership
            return 'NG';
            break;
        case '898':    // K-12 Reading Endorsement
            return 'NG';
            break;
        case '847':    // Christian Outreach Leadership
            return 'NG';
            break;
        case '900':    // Special Education
            return 'NG';
            break;
        case '899':    // Educational Technology
            return 'NG';
            break;
        default:
            return 'ND';
            break;
        }
    }
    public function get_ssn_field_name() {
        return "social_tax_id";
    }

    public function otr_pdf_writer($file,$info) {

        // Generate Filename based on Person's & Timestamp
        $path = getcwd();

        if(!is_dir($path . '/img/')) {
            if (mkdir($path . '/img')) {
                if (!mkdir($path . '/img/otr_pdfs')){
                    return false;
                }
            } else {
                return false;
            }                        
        } elseif (!is_dir($path . '/img/otr_pdfs/')) { 
            if (!mkdir($path . '/img/otr_pdfs')){
                return false;
            }
        }

        $url_file_path = '/img/otr_pdfs/' . $file;

        $filename = $path . $url_file_path;

        $info['student_full_name'] = $info['first_name'] . ' ' . $info['middle_name'] . ' ' . $info['last_name'];

        $pdf = new FPDF('P','mm',array(218,290));

        $pdf->SetAuthor($info['student_full_name']);
        $pdf->SetTitle('OTR'); 
        $pdf->SetFont('Helvetica','B',20);
        $pdf->SetTextColor(50,60,100);

        $pdf->AddPage('P'); 
        //$pdf->SetDisplayMode('real','default'); 
        $pdf->SetFontSize(10);


        // Background image
        $pdf->Image('img/otr_multi_form2.png',0,0);

        $start_x = 18;            
        $start_y = 46;


        for($i=0;$i<3;$i++) {
            // Fill out first form 
            // Name
            $pdf->SetFont('Times','B',14);
            $start_address_Y = $start_y-27;
            foreach ($info['otr_address'] as $otr_address) {
                $pdf->SetXY($start_x+109,$start_address_Y);
                $pdf->Write(5,$otr_address);
                $start_address_Y+=5;
            }


            $pdf->SetFont('Helvetica','B',10);
            $pdf->SetXY($start_x,$start_y);
            $pdf->Write(5,$info['student_full_name']);
            // Address
            $pdf->SetXY($start_x+2,$start_y+6.5);
            $pdf->Write(5,$info['address1']);

            // Years of Attendance (I don't believe we are gathering this information)
            //$pdf->SetXY($start_x+90,$start_y+6.5);
            //$pdf->Write(5,$info['name']);

            //$pdf->SetXY($start_x+115,$start_y+6.5);
            //$pdf->Write(5,$info['name']);

            // City, State
            $pdf->SetXY($start_x+1,$start_y+13);
            $pdf->Write(5,$info['city'].', '.$info['state']);

            // Zip Code
            $pdf->SetXY($start_x+58,$start_y+13);
            $pdf->Write(5,$info['zip_code']);

            // Soc. Security Number
//            $pdf->SetXY($start_x+26,$start_y+19.5);
//            $pdf->Write(5,$info['social_tax_id']);

            // Phone Number & Email
            $pdf->SetXY($start_x+15,$start_y+26);
            $pdf->Write(5,$info['home_phone']);

            $pdf->SetFontSize(8);

            $pdf->SetXY($start_x+52,$start_y+26);
            $pdf->Write(5,$info['email']);



            $pdf->SetFontSize(10);
            // Birth Date
            $birth_date = explode('-', $info['dob']);

            $pdf->SetXY($start_x+115,$start_y+26);
            $pdf->Write(5,$birth_date[0]);
            $pdf->SetXY($start_x+122.5,$start_y+26);
            $pdf->Write(5,$birth_date[1]);
            $pdf->SetXY($start_x+130,$start_y+26);
            $pdf->Write(5,$birth_date[2]);

            // Today's Date
            $pdf->SetXY($start_x+102,$start_y+32.5);
            $pdf->Write(5,date('m'));
            $pdf->SetXY($start_x+109.5,$start_y+32.5);
            $pdf->Write(5,date('d'));
            $pdf->SetXY($start_x+117,$start_y+32.5);
            $pdf->Write(5,date('Y'));

            // Move to the next form:
            $start_y = $start_y + 93;

        }

        $pdf->Output($filename);

        if (file_exists($filename)) {
            //$full_url = 'http://'.$_SERVER['HTTP_HOST'].$url_file_path;
            return $url_file_path;
        } else {
            return false;
        }
    }
}

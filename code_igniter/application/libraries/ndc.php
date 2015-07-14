<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class NDC {

    public function populate_application_from_leadform($data) {
    	$CI =& get_instance();
    	$CI->load->model('Application_model');

    	// Write user data to application
        $app_user['FirstName'] = $data['first_name'];
        $app_user['LastName'] = $data['last_name'];
        $app_user['line1'] = $data['email'];
        $app_user['sex'] = $data['gender'];
        $app_user['addr_line1_CA'] = $data['address'];
        $app_user['phone'] = $data['phone'];
        $app_user['city_CA'] = $data['city'];
        $app_user['st_ca'] = $data['state'];
        $app_user['zip_CA'] = $data['zip'];
        $app_user['uid'] = $data['uid'];
        $app_user['ctry_CA'] = '';

        if($data['country'] == "United States") {
            $app_user['ctry_CA'] = "US";
        }
        else if($data['country'] == "Canada") {
            $app_user['ctry_CA'] = "CA";
        }

        $CI->Application_model->add($app_user['uid'], $app_user);
    }

    function get_secondary_major_content() {
        $expectedValues = array("" => "Please select", 
            'MATH' => "Mathematics", 
            'SOCS' => "Social Studies", 
            'SCI' => "Science", 
            'LANG' => "Language Arts", 
            'NA' => "Not Applicable");

        $secondaryArr[""] = array("Please select");

        // High School Graduate or GED (ages 23 and up) seeking associate's or bachelor's degree
        $secondaryArr["MATH"] = array('' => "Please select",
            'SOCS' => "Social Studies",
            'SCI' => "Science",
            'LANG' => "Language Arts");

        $secondaryArr["SOCS"] = array('' => "Please select",
            'MATH' => "Mathematics",
            'SCI' => "Science",
            'LANG' => "Language Arts");

        $secondaryArr["SCI"] = array('' => "Please select",
            'MATH' => "Mathematics",
            'SOCS' => "Social Studies",
            'LANG' => "Language Arts");

        $secondaryArr["LANG"] = array('' => "Please select",
            'MATH' => "Mathematics",
            'SOCS' => "Social Studies",
            'SCI' => "Science");

        if (isset($_POST['data']) and in_array($_POST['data'], array_keys($expectedValues))){
            if($_POST['data'] == "MATH" || $_POST['data'] == "SOCS" || $_POST['data'] == "SCI" || $_POST['data'] == "LANG"){
                $secondaryArr = $secondaryArr[$_POST['data']];
            }
            else if($_POST['data'] == "") {
                $secondaryArr = array('' => "Not Applicable");
            }
            else {
                $secondaryArr = array('' => "Please select",
                    'NA' => "Not Applicable");
            }

            foreach($secondaryArr as $optionValue => $optionTitle){
                $resource .= "<option value='$optionValue'>" . $optionTitle . "</option>";
            }
        }
        return $resource;
    }


    function get_primary_major_content() {
        $expectedValues = array("" => "Please select",
            'ACTG' => "Accounting",
            'EDYA' => "Adolescent/Young Adult Licensure Grades 7 - 12",
            'ART' => "Art",
            'BIO' => "Biology",
            'BUAD' => "Business Administration",
            'CHEM' => "Chemistry",
            'COMM' => "Communication",
            'EDKS' => "Early Childhood Education PK - 3",
            'ENGL' => "English",
            'ELAW' => "English - Pre - law",
            'ENVR' => "Environmental Science",
            'GRDE' => "Graphic Design",
            'HIAR' => "History - Intelligence Analysis and Research",
            'HIST' => "History",
            'HLAW' => "History - Pre - law",
            'HRD' => "Human Resources Development",
            'MIS' => "Information Systems",
            'IB' => "International Business",
            'MGMT' => "Management",
            'MKTG' => "Marketing",
            'MATH' => "Mathematics",
            'ED49' => "Middle Childhood Education Grades 4 - 9",
            'MM12' => "Mild/Moderate Intervention Specialist Licensure K - 12",
            'NRRN' => "Nursing RN to BSN",
            'PM' => "Pastoral Minsitry",
            'PM' => "Political Science - Criminal Justice",
            'POCJ' => "Pre - Nursing BSN",
            'PNRG' => "Psychology",
            'PSYC' => "Public Administration",
            'PUAD' => "Public Relations",
            'PR' => "Spanish Teaching Licensure PK - 12",
            'SP12' => "Sports/Recreation Management",
            'UNDE' => "Undecided",
            'UNBU' => "Undecided Business",
            'UNED' => "Undecided Education",
            'UNPL' => "Undecided Pre Law",
            'UNPM' => "Undecided Pre - Med",
            'EDYA' => "Adolescent/Young Adult Licensure Grades 7 - 12",
            'EDK3' => "Early Childhood Education PK - 3",
            'ED49' => "Middle Childhood Education Grades 4 - 9",
            'MM12' => "Mild/Moderate Intervention Specialist Licensure K - 12",
            'SP12' => "Spanish Teaching Licensure PK - 12",
            'UNED' => "Undecided Education",
            'EA12' => "Visual Arts Teaching Licensure PK - 12",
            'BDEF' => "Biodefense - Science - and Technology Security Analysis",
            'SIRA' => "Strategic Intelligence and Risk Assessment",
            'TCIA' => "Terrorism and Critical Infrastructure Analysis",
            'TRTA' => "Transnational Threat Analysis",
            'LMIS' => "Already licensed teacher - adding Mild/Moderate Intervention Specialist Licensure K - 12",
            'MMLG' => "First Teaching License - Mild/Moderate Intervention Specialist K - 12",
            'EDPL' => "Educational Leadership - Principal Licensure",
            'IECT' => "Computer Technology Endorsement",
            'RDG' => "Reading Endorsement",
            'UNED' => "Undecided Education",
            'MSPS' => "Security Policy Studies",
            'CICI' => "Certificate in Competitive Intelligence",
            'CIIA' => "Certificate in Intelligence Analysis",
            'NA' => "Not Applicable");

        $primaryArr['NONT'] = array('' => "Please select",
            'ACTG' => "Accounting",
            'EDYA' => "Adolescent/Young Adult Licensure Grades 7 - 12",
            'ART' => "Art",
            'BIO' => "Biology",
            'BUAD' => "Business Administration",
            'CHEM' => "Chemistry",
            'COMM' => "Communication",
            'EDKS' => "Early Childhood Education PK - 3",
            'ENGL' => "English",
            'ELAW' => "English - Pre - law",
            'ENVR' => "Environmental Science",
            'GRDE' => "Graphic Design",
            'HIAR' => "History - Intelligence Analysis and Research",
            'HIST' => "History",
            'HLAW' => "History - Pre - law",
            'HRD' => "Human Resources Development",
            'MIS' => "Information Systems",
            'IB' => "International Business",
            'MGMT' => "Management",
            'MKTG' => "Marketing",
            'MATH' => "Mathematics",
            'ED49' => "Middle Childhood Education Grades 4 - 9",
            'MM12' => "Mild/Moderate Intervention Specialist Licensure K - 12",
            'NRRN' => "Nursing RN to BSN",
            'PM' => "Pastoral Minsitry",
            'POCJ' => "Political Science - Criminal Justice",
            'PNRG' => "Pre - Nursing BSN",
            'PSYC' => "Psychology",
            'PUAD' => "Public Administration",
            'PR' => "Public Relations",
            'SP12' => "",
            'SPRT' => "Sports/Recreation Management", 
            'UNDE' => "Undecided",
            'UNBU' => "Undecided Business",
            'UNED' => "Undecided Education",
            'UNPL' => "Undecided Pre Law",
            'UNPM' => "Undecided Pre - Med",
            'EA12' => "Visual Arts Teaching Licensure PK - 12",
            'INMA' => "Integrated Mathematics",
            'INSS' => "Integrated Social Studies",
            'INSC' => "Integrated Science",
            'INLA' => "Integrated Language Arts");

        $primaryArr['TRAD'] = $primaryArr['NONT'];
        $primaryArr['TEEL'] = array('' => 'Please select',
            'EDYA' => "Adolescent/Young Adult Licensure Grades 7 - 12",
            'EDK3' => "Early Childhood Education PK - 3",
            'ED49' => "Middle Childhood Education Grades 4 - 9",
            'MM12' => "Mild/Moderate Intervention Specialist Licensure K - 12",
            'SP12' => "Spanish Teaching Licensure PK - 12",
            'UNED' => "Undecided Education",
            'EA12' => "Visual Arts Teaching Licensure PK - 12");
        $primaryArr[""] = array('' => "Please select");

        $primaryArr["EDYA"] = array('' => "Please select",
            'INMA' => "Integrated Mathematics",
            'INSS' => "Integrated Social Studies",
            'INSC' => "Integrated Science",
            'INLA' => "Integrated Language Arts");

        $primaryArr["ED49"] = array('' => "Please select",
            'MATH' => "Mathematics",
            'SOCS' => "Social Studies",
            'SCI' => "Science",
            'LANG' => "Language Arts");

        if (isset($_POST['data']) and in_array($_POST['data'], array_keys($expectedValues))){
            if($_POST['data'] == "EDYA" || $_POST['data'] == "ED49") {
                $primaryArr = $primaryArr[$_POST['data']];
            }
            else if($_POST['data'] == "") {
                $primaryArr = array('' => "Not Applicable");
            }
            else {
                $primaryArr = array('' => "Please select",
                    'NA' => "Not Applicable");
            }

            foreach($primaryArr as $optionValue => $optionTitle){
                $resource .= "<option value='$optionValue'>" . $optionTitle . "</option>";
            }
        }
        return $resource;
    }

    public function get_major() {
        $expectedValues = array('' => "Please select",
            'TRAD' => "Recent High School Graduate Seeking Bachelor's Degree",
            'NONT' => "High School Graduate or GED (ages 23 and up) seeking associate's or bachelor's degree",
            'TEEL' => "Teaching Licensure (must already have bachelor's degree)",
            'GCER' => "Graduate Certificate Programs",
            'LCNR' => "Master of Education Licensure Programs",
            'ENDR' => "Master of Education Endorsement Program",
            'MSPS' => "Master of Arts in Security Policy Studies",
            'CERP' => "Certificate Programs");

        // Default
        $majorArr[""] = array('' => "Please select");

        // ***********************************************************************************************************************
        // Undergradute - High School Graduate - GED
        $majorArr["NONT"]["BOTH"] = array('' => "Please select",
            'ACTG' => "Accounting",
            'EDYA' => "Adolescent/Young Adult Licensure Grades 7 - 12",
            'ART' => "Art",
            'BIO' => "Biology",
            'BUAD' => "Business Administration",
            'CHEM' => "Chemistry",
            'COMM' => "Communication",
            'EDKS' => "Early Childhood Education PK - 3",
            'ENGL' => "English",
            'ELAW' => "English - Pre - law",
            'ENVR' => "Environmental Science",
            'GRDE' => "Graphic Design",
            'HIAR' => "History - Intelligence Analysis and Research",
            'HIST' => "History",
            'HLAW' => "History - Pre - law",
            'HRD' => "Human Resources Development",
            'MIS' => "Information Systems",
            'IB' => "International Business",
            'MGMT' => "Management",
            'MKTG' => "Marketing",
            'MATH' => "Mathematics",
            'ED49' => "Middle Childhood Education Grades 4 - 9",
            'MM12' => "Mild/Moderate Intervention Specialist Licensure K - 12",
            'NRRN' => "Nursing RN to BSN",
            'PM' => "Pastoral Minsitry",
            'PM' => "Political Science - Criminal Justice",
            'POCJ' => "Pre - Nursing BSN",
            'PNRG' => "Psychology",
            'PSYC' => "Public Administration",
            'PUAD' => "Public Relations",
            'PR' => "Spanish Teaching Licensure PK - 12",
            'SP12' => "Sports/Recreation Management",
            'UNDE' => "Undecided",
            'UNBU' => "Undecided Business",
            'UNED' => "Undecided Education",
            'UNPL' => "Undecided Pre Law",
            'UNPM' => "Undecided Pre - Med");
        $majorArr["NONT"]["TRAD"] = $majorArr["NONT"]["BOTH"];
        unset($majorArr["NONT"]["TRAD"]["NRRN"]); // If they select 'Face to Face', list should not include RN to BSN
        $majorArr["NONT"]["ONLINE"] = array('' => "Please select",
            'BUAD' => "Business Administration",
            'PNRG' => "Psychology",
            'MM12' => "Mild/Moderate Intervention Specialist Licensure K - 12",
            'EDKS' => "Early Childhood Education PK - 3",
            'NRRN' => "Nursing RN to BSN");
        $majorArr["TRAD"] = $majorArr["NONT"];

        // ***********************************************************************************************************************
        // Undergraduate - TEEL
        $majorArr["TEEL"]["ONLINE"] = array('' => "Please select",
            'EDYA' => "Adolescent/Young Adult Licensure Grades 7 - 12",
            'EDK3' => "Early Childhood Education PK - 3",
            'ED49' => "Middle Childhood Education Grades 4 - 9",
            'MM12' => "Mild/Moderate Intervention Specialist Licensure K - 12",
            'SP12' => "Spanish Teaching Licensure PK - 12",
            'UNED' => "Undecided Education",
            'EA12' => "Visual Arts Teaching Licensure PK - 12");
        $majorArr["TEEL"]["BOTH"] = $majorArr["TEEL"]["ONLINE"];
        $majorArr["TEEL"]["BOTH"] = $majorArr["TEEL"]["TRAD"];

        // ***********************************************************************************************************************
        // Graduate - Certificate Programs
        $majorArr["GCER"]["ONLINE"] = array('' => "Please select",
            'BDEF' => "Biodefense - Science - and Technology Security Analysis",
            'SIRA' => "Strategic Intelligence and Risk Assessment",
            'TCIA' => "Terrorism and Critical Infrastructure Analysis",
            'TRTA' => "Transnational Threat Analysis");
        $majorArr["GCER"]["TRAD"] = $primaryArr = array('' => "Not Available");
        $majorArr["GCER"]["BOTH"] = $primaryArr = array('' => "Not Available");

        // ***********************************************************************************************************************
        // Graduate - MA Ed Licensure
        $majorArr["LCNR"]["TRAD"] = array('' => "Please select",
            'LMIS' => "Already licensed teacher - adding Mild/Moderate Intervention Specialist Licensure K - 12",
            'MMLG' => "First Teaching License - Mild/Moderate Intervention Specialist K - 12");
        $majorArr["LCNR"]["BOTH"] = $majorArr["LCNR"]["TRAD"];
        $majorArr["LCNR"]["ONLINE"] = $majorArr["LCNR"]["TRAD"];
        array_merge($majorArr["LCNR"]["ONLINE"], array('EDPL' => "Educational Leadership - Principal Licensure"));

        // ***********************************************************************************************************************
        // Graduate - MA Ed Endorsement
        $majorArr["ENDR"]["ONLINE"] = array('' => "Please select",
            'IECT' => "Computer Technology Endorsement",
            'RDG' => "Reading Endorsement",
            'UNED' => "Undecided Education");
        $majorArr["ENDR"]["BOTH"] = $majorArr["ENDR"]["ONLINE"];
        $majorArr["ENDR"]["TRAD"] = array('' => "Please select", 'RDG' => "Reading Endorsement", 'UNED' => "Undecided Education");

        // ***********************************************************************************************************************
        // Graduate - MA SPS 
        $majorArr["MSPS"]["ONLINE"] = array('' => "Please select",
            'MSPS' => "Security Policy Studies");
        $majorArr["MSPS"]["TRAD"]= array('' => "Not Available");
        $majorArr["MSPS"]["BOTH"]= array('' => "Not Available");

        // ***********************************************************************************************************************
        // Graduate - Certificate Programs
        $majorArr["CERP"]["ONLINE"] = array('' => "Please select",
            'CICI' => "Certificate in Competitive Intelligence",
            'CIIA' => "Certificate in Intelligence Analysis");
        $majorArr["CERP"]["TRAD"]= array('' => "Not Available");
        $majorArr["CERP"]["BOTH"]= array('' => "Not Available");

        if (isset($_POST['data']) and in_array($_POST['data'], array_keys($expectedValues))){
            $majorArr = $majorArr[$_POST['data']][$_POST['interest']];
            foreach($majorArr as $optionValue => $optionTitle){
                $resource .= "<option value='$optionValue'>" . $optionTitle . "</option>";
            }
        }
        return $resource;
    }

    public function get_prog_desc() {
        $resource = '';
        $expectedValues = array("", "UNDG", "GRAD", "CONT");

        $programDescArr[''] = array('' => "Please select");
        $programDescArr['UNDG'] = array('' => "Please select",
            'TRAD' => "Recent High School Graduate Seeking Bachelor's Degree",
            'NONT' => "High School Graduate or GED (ages 23 and up) seeking associate's or bachelor's degree",
            'TEEL' => "Teaching Licensure (must already have bachelor's degree)");

        $programDescArr['GRAD'] = array('' => "Please select",
            'GCER' => "Graduate Certificate Programs",
            'LCNR' => "Master of Education Licensure Programs",
            'ENDR' => "Master of Education Endorsement Program",
            'MSPS' => "Master of Arts in Security Policy Studies");

        $programDescArr['CONT'] = array('' => "Please select",
            'CERP' => "Certificate Programs");

        if (isset($_POST['data']) and in_array($_POST['data'], array_keys($expectedValues))){
            $programDescArr = $programDescArr[$_POST['data']];

            foreach($programDescArr as $optionValue => $optionTitle){
                $resource .= "<option value='$optionValue'>" . $optionTitle . "</option>";
            }
        } else {
            $resource = "<option value=''>Not Applicable</option>";
        }
        return $resource;
    }

    public function add_custom_fields(&$application) {
        $application = array_merge($application, array('CarsID' => '', 'RoyallID' => '', 'HobsonsID' => ''));
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
    public function get_county_options() {
        $counties = array( "Adams" => 'ADAM',
            "Allen" => 'ALLN',
            "Ashland" => 'ASHL',
            "Ashtabula" => 'ASHT',
            "Athens" => 'ATHN',
            "Auglaize" => 'AUGL',
            "Belmont" => 'BLMT',
            "Brown" => 'BRWN',
            "Butler" => 'BTLR',
            "Carroll" => 'CARR',
            "Champaign" => 'CHMP',
            "Clermont" => 'CLER',
            "Clinton" => 'CLIN',
            "Clark" => 'CLRK',
            "Columbiana" => 'COLM',
            "Coshocton" => 'COSH',
            "Crawford" => 'CRAW',
            "Cuyahoga" => 'CUYA',
            "Darke" => 'DARK',
            "Defiance" => 'DEFI',
            "Delaware" => 'DELW',
            "Drake" => 'DRAK',
            "Erie" => 'ERIE',
            "Fairfield" => 'FAIR',
            "Fayette" => 'FAYE',
            "Fulton" => 'FLTN',
            "Franklin" => 'FRNK',
            "Galia" => 'GALI',
            "Geauga" => 'GEAG',
            "Gallia" => 'GLIA',
            "Greene" => 'GRNE',
            "Guernsey" => 'GUER',
            "Hamilton" => 'HAML',
            "Hancock" => 'HANC',
            "Hardin" => 'HARD',
            "Henry" => 'HENR',
            "HIGHLAND" => 'HIGH',
            "Hocking" => 'HOCK',
            "Holmes" => 'HOLM',
            "Harrison" => 'HRSN',
            "Huron" => 'HURN',
            "Jackson" => 'JACK',
            "Jefferson" => 'JEFF',
            "Knox" => 'KNOX',
            "Lake" => 'LAKE',
            "Licking" => 'LCKG',
            "Logan" => 'LOGN',
            "Lorain" => 'LORN',
            "Lucas" => 'LUCA',
            "Lawrence" => 'LWRN',
            "Macomb" => 'MACB',
            "Mahoning" => 'MAHN',
            "Marion" => 'MARN',
            "Madison" => 'MDSN',
            "Medina" => 'MEDI',
            "Meigs" => 'MEIG',
            "Mercer" => 'MERC',
            "Miami" => 'MIAM',
            "Monroe" => 'MONR',
            "Montgomery" => 'MONT',
            "Morgan" => 'MRGN',
            "Morrow" => 'MRRW',
            "Muskingum" => 'MUSK',
            "Noble" => 'NOBL',
            "Non Ohio Resident" => 'NOHI',
            "Ottawa" => 'OTTA',
            "Paulding" => 'PAUL',
            "Perry" => 'PERY',
            "Pickaway" => 'PICK',
            "Pike" => 'PIKE',
            "Portage" => 'PORT',
            "Preble" => 'PRBL',
            "Putnam" => 'PTNM',
            "Richland" => 'RICH',
            "Ross" => 'ROSS',
            "Samoa" => 'SAMO',
            "Sandusky" => 'SAND',
            "Scioto" => 'SCIO',
            "Seneca" => 'SENA',
            "Shelby" => 'SHLB',
            "Stark" => 'STAR',
            "Summit" => 'SUMM',
            "Trumbull" => 'TRUM',
            "Tuscarawas" => 'TUSC',
            "Union" => 'UNIO',
            "Vinton" => 'VINT',
            "Van Wert" => 'VWRT',
            "Warren" => 'WARR',
            "Washington" => 'WASH',
            "Wayne" => 'WAYN',
            "Williams" => 'WILL',
            "Wyandot" => 'WNDT',
            "Wood" => 'WOOD');

        $county_options = "";
        $county_options.='<option value="">Select County</option>';
        foreach($counties AS $county => $mapped_value){
            $county_options.='<option value="'.$mapped_value.'">'.$county.'</option>'."\n";
        }

        return $county_options;

    }

    public function get_programs_with_id() {
        return array(array('name' => 'Certificate in Competitive Intelligence', 'item_id' => '308'),
            array('name' => 'Certificate in Intelligence Analysis', 'item_id' => '309'),
            array('name' => 'Master of Education, Mild/Moderate Disability Intervention Specalist Endorsement (K-12 Ohio)', 'item_id' => '311'),
            array('name' => 'Master of Education, Reading Endorsement', 'item_id' => '313'),
            array('name' => 'Master of Education, Technology Endorsement', 'item_id' => '314'),
            array('name' => 'Teacher Education Eevening Licensure Program (TEEL)', 'item_id' => '315'),
            array('name' => '4th-5th Grade Endorsement', 'item_id' => '582'),
            array('name' => 'Master of Arts in Security Policy Studies', 'item_id' => '583'),
            array('name' => 'Graduate Certificate in Security Policy Studies - Emphasis on Biodefense, Science & Technology Security', 'item_id' => '584'),
            array('name' => 'Graduate Certificate in Security Policy Studies - Emphasis in Transnational Threat Analysis', 'item_id' => '585'),
            array('name' => 'Graduate Certificate in Security Policy Studies - Emphasis in Terrorism and Critical Infrastructure Analysis', 'item_id' => '586'),
            array('name' => 'Graduate Certificate in Security Policy Studies - Emphasis in Strategic Intelligence and Risk Assessment Analysis', 'item_id' => '587'),
            array('name' => 'Bachelor of Science in Nursing', 'item_id' => '1092'),
            array('name' => 'Post-Secondary Enrollment option (PSEO) Program', 'item_id' => '2107'),
            array('name' => 'Master of Education With a Concentration in Educational Leadership', 'item_id' => '2145'),
            array('name' => 'Bachelor of Arts in Business Administration', 'item_id' => '2180'),
            array('name' => 'Bachelor of Arts in Psychology', 'item_id' => '2182'),
            array('name' => 'Bachelor of Arts in Education, Early Childhood Education License', 'item_id' => '2183'),
            array('name' => 'Bachelor of Arts in Education, Mild to Moderate Intervention Specialist (MMIS)', 'item_id' => '2184'));
    }

    public function get_programs($student_type){
        $programs = array();

        switch ($student_type) {
        case 'NG':
            $programs = array(array('major' => 'BA', 'interest' => 'GB', 'level' => 'GR', 'college' => 'BL', 'degree' => 'MBA', 'name' => 'Master of Business Administration'),
                array('major' => 'BA', 'interest' => 'ZH', 'level' => 'GR', 'college' => 'BL', 'degree' => 'MBA', 'name' => 'MBA - Health Care Management Emphasis'),
                // array('major' => 'OUT', 'interest' => 'GO', 'level' => 'GR', 'college' => 'VM', 'degree' => 'MA', 'name' => 'Christian Outreach Leadership'),
                // array('major' => 'EDUC', 'interest' => 'E2', 'level' => 'GR', 'college' => 'ED', 'degree' => 'MA', 'name' => 'Classroom Instruction'),
                // array('major' => 'EDUC', 'interest' => 'E1', 'level' => 'GR', 'college' => 'ED', 'degree' => 'MA', 'name' => 'Classroom Instruction with K-12 Reading Endorsement'),
                // array('major' => 'EDUC', 'interest' => 'E4', 'level' => 'GR', 'college' => 'ED', 'degree' => 'LICEN', 'name' => 'K-12 Reading Endorsement'),
                array('major' => 'CJL', 'interest' => 'GJ', 'level' => 'GR', 'college' => 'BL', 'degree' => 'MA', 'name' => 'Criminal Justice Leadership'),
                array('major' => 'SPM', 'interest' => 'GS', 'level' => 'GR', 'college' => 'BL', 'degree' => 'MA', 'name' => 'Sport Management'),
                array('major' => 'EDUC', 'interest' => 'GE', 'level' => 'GR', 'college' => 'ED', 'degree' => 'MA', 'name' => 'Early Childhood Education'),
                // array('major' => 'EDUC', 'interest' => 'E5', 'level' => 'GR', 'college' => 'ED', 'degree' => 'MA', 'name' => 'Educational Leadership'),
                // array('major' => 'EDUC', 'interest' => 'E6', 'level' => 'GR', 'college' => 'ED', 'degree' => 'MA', 'name' => 'Educational Technolog_messagey'),
                array('major' => 'FLED', 'interest' => 'GF', 'level' => 'GR', 'college' => 'ED', 'degree' => 'MA', 'name' => 'Family Life Education'),
                array('major' => 'HRM', 'interest' => 'GI', 'level' => 'GR', 'college' => 'BL', 'degree' => 'MA', 'name' => 'Human Resource Management'),
                array('major' => 'LM', 'interest' => 'GN', 'level' => 'GR', 'college' => 'BL', 'degree' => 'MA', 'name' => 'Leadership and Management'),
                // array('major' => 'EDUC', 'interest' => 'GK', 'level' => 'GR', 'college' => 'ED', 'degree' => 'MA', 'name' => 'Differentiated Instruction'),
                array('major' => 'SCM', 'interest' => 'GU', 'level' => 'GR', 'college' => 'AS', 'degree' => 'MA', 'name' => 'Strategic Communication Management'),);
            return $programs;
            break;
        case 'ND':
            $programs = array(array('major' => '0', 'interest' => 'DA', 'level' => 'UG', 'college' => 'GS', 'degree' => 'AA', 'name' => 'Associate of Arts'),
                array('major' => 'GS', 'interest' => 'DE', 'level' => 'UG', 'college' => '0', 'degree' => 'AA', 'name' => 'Associate of Arts - Early Childhood Education Emphasis'),
                array('major' => 'BSMT', 'interest' => 'DB', 'level' => 'UG', 'college' => 'BL', 'degree' => 'BA', 'name' => 'Business'),
                array('major' => 'ACCT', 'interest' => 'DT', 'level' => 'UG', 'college' => 'BL', 'degree' => 'BA', 'name' => 'Accounting'),
                array('major' => 'CJ', 'interest' => 'DJ', 'level' => 'UG', 'college' => 'BL', 'degree' => 'BA', 'name' => 'Criminal Justice'),
                array('major' => 'CDEV', 'interest' => 'DC', 'level' => 'UG', 'college' => 'ED', 'degree' => 'BA', 'name' => 'Child Development'),
                array('major' => 'EXCS', 'interest' => 'DK', 'level' => 'UG', 'college' => 'ED', 'degree' => 'BA', 'name' => 'Exercise Science'),
                array('major' => 'FLED', 'interest' => 'DF', 'level' => 'UG', 'college' => 'ED', 'degree' => 'BA', 'name' => 'Family Life Education'),
                array('major' => 'FRM', 'interest' => 'DR', 'level' => 'UG', 'college' => 'BL', 'degree' => 'BA', 'name' => 'Food Industry Management'),
                array('major' => 'HCM', 'interest' => 'DD', 'level' => 'UG', 'college' => 'BL', 'degree' => 'BA', 'name' => 'Health Care'),
                array('major' => 'HSPM', 'interest' => 'DX', 'level' => 'UG', 'college' => 'BL', 'degree' => 'BA', 'name' => 'Hospitality Management'),
                array('major' => 'HRM', 'interest' => 'DH', 'level' => 'UG', 'college' => 'BL', 'degree' => 'BA', 'name' => 'Human Resource Management'),
                array('major' => 'ITM', 'interest' => 'M6', 'level' => 'UG', 'college' => 'BL', 'degree' => 'BA', 'name' => 'Information and Technolog_messagey Management'),
                array('major' => 'MM', 'interest' => 'DM', 'level' => 'UG', 'college' => 'BL', 'degree' => 'BA', 'name' => 'Marketing and Innovation Management'),
                array('major' => 'OML', 'interest' => 'DO', 'level' => 'UG', 'college' => 'BL', 'degree' => 'BA', 'name' => 'Organizational Management and Leadership'),
                array('major' => 'PMSC', 'interest' => 'DL', 'level' => 'UG', 'college' => 'ED', 'degree' => 'BS', 'name' => 'Pulmonary Science'),
                array('major' => 'RADL', 'interest' => 'DG', 'level' => 'UG', 'college' => 'ED', 'degree' => 'BS', 'name' => 'Radiologic Science Leadership'),);
            return $programs;
            break;
        default:
            break;
        }
    }

    public function get_country_options() {
        $country_options='<option value="USA">UNITED STATES</option>
            <option value="ADN">ARAB REPUBLIC OF YEMEN</option>
            <option value="AFG">AFGHANISTAN</option>
            <option value="ALB">ALBANIA</option>
            <option value="ALG">ALGERIA</option>
            <option value="AND">ANDORRA</option>
            <option value="ANG">ANGOL</option>
            <option value="ANT">ANTIGUA AND BARBUDA</option>
            <option value="ANU">ANGUILLA</option>
            <option value="ARG">ARGENTINA</option>
            <option value="ARM">ARMENIA</option>
            <option value="ARU">ARUBA</option>
            <option value="ASC">ASCENSION</option>
            <option value="AST">AUSTRALIA</option>
            <option value="AUS">AUSTRI</option>
            <option value="AZE">AZERBAIJAN</option>
            <option value="BAR">BARBADOS</option>
            <option value="BEL">BELGIUM	</option>
            <option value="BEN">BENIN</option>
            <option value="BF">BURKINA-FASO</option>
            <option value="BH">BOSNIA-HERZEGOVINA</option>
            <option value="BHU">BHUTAN</option>
            <option value="BLZ">BELIZE</option>
            <option value="BNG">BANGLADESH</option>
            <option value="BOL">BOLIVIA</option>
            <option value="BOT">BOTSWANA</option>
            <option value="BRA">BRASIL</option>
            <option value="BRD">BURUNDI</option>
            <option value="BRM">BERMUDA</option>
            <option value="BRN">BAHRAIN</option>
            <option value="BRU">BRUNEI DARUSSALAM</option>
            <option value="BS">BAHAMAS</option>
            <option value="BUL">BULGARIA</option>
            <option value="BUR">BURMAR</option>
            <option value="BWI">BRITISH WEST INDIES</option>
            <option value="BYE">BELARUS (BYELORUSSIA)</option>
            <option value="CAM">CAMBODIA</option>
            <option value="CAR">CENTRAL AFRICAN REPUBLIC</option>
            <option value="CAY">CAYMAN ISLANDS</option>
            <option value="CDN">CANADA</option>
            <option value="CHA">CHAD</option>
            <option value="CHI">PEOPLES REPUB OF CHINA</option>
            <option value="CHL">CHILE	CHL</option>
            <option value="CMR">CAMEROON</option>
            <option value="CNR">REPUBLIC OF THE CONGO</option>
            <option value="COL">COLOMBIA</option>
            <option value="CON">DEMOCRATIC REP OF CONGO</option>
            <option value="COT">COTE IVOIRE</option>
            <option value="CPV">CAPE VERDE</option>
            <option value="CR">COSTA RICA</option>
            <option value="CRO">CROATIA</option>
            <option value="CUB">CUBA</option>
            <option value="CYP">CYPRUS</option>
            <option value="CZE">CZECH REPUBLIC</option>
            <option value="DAH">DAHOMEY</option>
            <option value="DEN">DENMARK</option>
            <option value="DHM">DAHOMEY (BENIN)</option>
            <option value="DJI">DJIBOUTI</option>
            <option value="DMC">DOMINICA</option>
            <option value="DOM">DOMINICAN REPUBLIC</option>
            <option value="ECU">ECUADOR</option>
            <option value="EGU">EQUATORIAL GUINEA</option>
            <option value="EGY">EGYPT</option>
            <option value="ELS">EL SALVADOR</option>
            <option value="ERI">ERITREA</option>
            <option value="EST">ESTONIA</option>
            <option value="ETH">ETHIOPIA</option>
            <option value="FAI">FALKLAND ISLANDS</option>
            <option value="FAR">FAROE ISLANDS</option>
            <option value="FIN">FINLAND</option>
            <option value="FJI">FIJI ISLANDS</option>
            <option value="FRA">FRANCE</option>
            <option value="FRG">FRENCH GUIANA</option>
            <option value="FRP">FRENCH POLYNESIA</option>
            <option value="GAB">GABON</option>
            <option value="GAM">GAMBIA</option>
            <option value="GB">GREAT BRITAIN</option>
            <option value="GEO">SOVIET GEORGIA</option>
            <option value="GER">FEDERAL REP OF GERMANY</option>
            <option value="GHA">GHANA</option>
            <option value="GIB">GIBRALTAR</option>
            <option value="GRD">GRENADA</option>
            <option value="GRE">GREECE</option>
            <option value="GRN">GREENLAND</option>
            <option value="GU">GUAM</option>
            <option value="GUA">GUATEMALA</option>
            <option value="GUB">GUINEA-BISSAU</option>
            <option value="GUD">GUADELOUPE</option>
            <option value="GUI">GUINEA</option>
            <option value="GUY">GUYANA</option>
            <option value="HAI">HAITI</option>
            <option value="HK">HONG KONG</option>
            <option value="HON">HONDURAS</option>
            <option value="HUN">HUNGARY</option>
            <option value="ICE">ICELAND</option>
            <option value="IND">INDIA</option>
            <option value="INO">INDONESIA</option>
            <option value="IRA">IRAN</option>
            <option value="IRL">IRELAND</option>
            <option value="IRQ">IRAQ</option>
            <option value="ISR">ISRAEL</option>
            <option value="ITA">ITALY</option>
            <option value="JAM">JAMAICA</option>
            <option value="JAP">JAPAN</option>
            <option value="JOR">JORDAN</option>
            <option value="KAZ">KAZAKHSTAN</option>
            <option value="KEN">KENYA</option>
            <option value="KIR">KYRGHYZSTAN</option>
            <option value="KOR">SOUTH KOREA</option>
            <option value="KRI">KIRIBATI</option>
            <option value="KRN">NORTH KOREA</option>
            <option value="KUW">KUWAIT</option>
            <option value="LAO">LAOS</option>
            <option value="LAT">LATVIA</option>
            <option value="LBR">LIBERIA</option>
            <option value="LBY">LIBYA</option>
            <option value="LES">LESOTHO</option>
            <option value="LIB">LEBANON</option>
            <option value="LIE">LIECHTENSTEIN</option>
            <option value="LIT">LITHUANIA</option>
            <option value="LUX">LUXEMBOURG</option>
            <option value="MA">MALI</option>
            <option value="MAC">MACEDONIA</option>
            <option value="MAD">MADAGASCAR</option>
            <option value="MAL">MALAYSIA</option>
            <option value="MAR">MAURITANIA</option>
            <option value="MAU">MAURITIUS</option>
            <option value="MCO">MACAO</option>
            <option value="MEX">MEXICO</option>
            <option value="MLD">MALDIVES</option>
            <option value="MLT">MALTA</option>
            <option value="MLV">MOLDOVA</option>
            <option value="MLW">MALAWI</option>
            <option value="MMR">MYANMAR</option>
            <option value="MNG">MONGOLIA</option>
            <option value="MNT">MONTSERRAT</option>
            <option value="MOL">MOLDAVIA</option>
            <option value="MON">MONACO</option>
            <option value="MOR">MOROCCO</option>
            <option value="MOZ">MOZAMBIQUE</option>
            <option value="MRT">MARTINIQUE</option>
            <option value="NAM">NAMIBIA</option>
            <option value="NAU">NAURU</option>
            <option value="NEC">NEW CALEDONIA</option>
            <option value="NEP">NEPAL</option>
            <option value="NET">NETHERLANDS</option>
            <option value="NGR">NIGER</option>
            <option value="NGU">PAPUA NEW GUINEA</option>
            <option value="NIC">NICARAGUA</option>
            <option value="NIG">NIGERIA</option>
            <option value="NOR">NORWAY</option>
            <option value="NTA">NETHERLANDS ANTILLES</option>
            <option value="NZ">NEW ZEALAND</option>
            <option value="OMA">OMAN</option>
            <option value="PAK">PAKISTAN</option>
            <option value="PAL">PALAU</option>
            <option value="PAN">PANAMA</option>
            <option value="PAR">PARAGUAY</option>
            <option value="PER">PERU</option>
            <option value="PHI">PHILIPPINES</option>
            <option value="PIT">PITCAIRN ISLAND</option>
            <option value="POL">POLAND</option>
            <option value="POR">PORTUGAL</option>
            <option value="PR">PUERTO RICO</option>
            <option value="QUA">QATAR</option>
            <option value="REU">REUNION</option>
            <option value="ROM">ROMANIA</option>
            <option value="RSM">REPUBLIC OF SAN MARINO</option>
            <option value="RUS">RUSSIA</option>
            <option value="RWA">RWANDA</option>
            <option value="SA">REPUBLIC OF SOUTH AFRICA</option>
            <option value="SAM">SAMOA</option>
            <option value="SAO">SAO TOME AND PRINCIPE</option>
            <option value="SAU">SAUDI ARABIA</option>
            <option value="SCN">SAINT CHRISTOPHER & NEVIS</option>
            <option value="SCO">SCOTLAND</option>
            <option value="SEN">SENGAL</option>
            <option value="SEY">SEYCHELLES</option>
            <option value="SHE">SAINT HELENA</option>
            <option value="SIN">SINGAPORE</option>
            <option value="SL">SIERRA LEONE</option>
            <option value="SLO">SLOVAK REPUBLIC</option>
            <option value="SLU">SAINT LUCIA</option>
            <option value="SLV">SLOVENIA</option>
            <option value="SMA">SAN MARINO</option>
            <option value="SOL">SOLOMON ISLANDS</option>
            <option value="SOM">SOMALIA</option>
            <option value="SPA">SPAIN</option>
            <option value="SPM">SAINT PIERRE AND MIQUELON</option>
            <option value="SRB">SERBIA-MONTENEGRO</option>
            <option value="SRI">SRI LANKA</option>
            <option value="SUD">SUDAN</option>
            <option value="SUR">SURINAME</option>
            <option value="SVG">SAINT VINCENT & GRENADINE</option>
            <option value="SWA">SWAZILAND</option>
            <option value="SWE">SWEDEN</option>
            <option value="SWI">SWITZERLAND</option>
            <option value="SYR">SYRIA</option>
            <option value="TAD">TAJIKISTAN</option>
            <option value="TAI">TAIWAN - REP. OF CHINA</option>
            <option value="TAN">TANZANIA</option>
            <option value="TCI">TURKS & CAICOS ISLANDS</option>
            <option value="THA">THAILAND</option>
            <option value="TOG">TOGO</option>
            <option value="TON">TONGA</option>
            <option value="TRI">TRISTAN DE CUNHA</option>
            <option value="TRK">TURKMENISTAN</option>
            <option value="TT">TRINIDAD AND TOBAGO</option>
            <option value="TUN">TUNISIA</option>
            <option value="TUR">TURKEY</option>
            <option value="TUV">TUVALU</option>
            <option value="UAE">UNITED ARAB EMIRATES</option>
            <option value="UGA">UGANDA</option>
            <option value="UKR">UKRAINE</option>
            <option value="URU">URUGUAY</option>
            <option value="UZB">UZBEKISTAN</option>
            <option value="VAN">VANUATU</option>
            <option value="VAT">VATICAN CITY</option>
            <option value="VEN">VENEZUELA</option>
            <option value="VIE">VIETNAM</option>
            <option value="WAL">WALES</option>
            <option value="WFI">WALLIS & FUTUNA ISLANDS</option>
            <option value="WI">WEST INDIES</option>
            <option value="YEM">YEMEN</option>
            <option value="YUG">YUGOSLAVIA</option>
            <option value="ZAI">ZAIRE (DEM REP OF CONGO)</option>
            <option value="ZAM">ZAMBIA</option>
            <option value="ZIM">ZIMBABWE</option>';
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
        default:
            return 'ND';
            break;
        }
    }
    public function get_ssn_field_name() {
        return "txtSSN";
    }

    public function otr_pdf_writer($file,$info) {
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

        $info['student_full_name'] = $info['FirstName'] . ' ' . $info['MiddleName'] . ' ' . $info['LastName'];

        $pdf = new FPDF('P','mm',array(218,290));

        $pdf->SetAuthor($info['student_full_name']);
        $pdf->SetTitle('OTR'); 
        $pdf->SetFont('Helvetica','B',20);
        $pdf->SetTextColor(50,60,100);

        $pdf->AddPage('P'); 
        //$pdf->SetDisplayMode('real','default'); 
        $pdf->SetFontSize(10);


        // Background image
        $pdf->Image('../resources/otr/otr_multi_form2.png',0,0);

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
            $pdf->Write(5,$info['addr_line1_CA']);

            // Years of Attendance (I don't believe we are gathering this information)
            //$pdf->SetXY($start_x+90,$start_y+6.5);
            //$pdf->Write(5,$info['name']);

            //$pdf->SetXY($start_x+115,$start_y+6.5);
            //$pdf->Write(5,$info['name']);

            // City, State
            $pdf->SetXY($start_x+1,$start_y+13);
            $pdf->Write(5,$info['city_CA'].', '.$info['st_ca']);

            // Zip Code
            $pdf->SetXY($start_x+58,$start_y+13);
            $pdf->Write(5,$info['zip_CA']);

            // Soc. Security Number
//            $pdf->SetXY($start_x+26,$start_y+19.5);
//            $pdf->Write(5,$info['SF_NO']);

            // Phone Number & Email
            $pdf->SetXY($start_x+15,$start_y+26);
            if ($info['pref_contact'] == 'cell_phone') {
                $pdf->Write(5,$info['ndcellphone']);
            } else {
                $pdf->Write(5,$info['phone']);
            }

            $pdf->SetFontSize(8);

            $pdf->SetXY($start_x+52,$start_y+26);
            $pdf->Write(5,$info['line1']);



            $pdf->SetFontSize(10);
            // Birth Date
            $birth_date = explode('/', $info['birth_date']);

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

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

// Trad program ELP Request ID
define('TRAD_ELP_PROGRAM_ID', '2249');
define('TRAD_GRAIL_PROGRAM_ID', '959');

class CSP {
    protected $CI;
    public $TRAD_ELP_PROGRAM_ID = TRAD_ELP_PROGRAM_ID;
    public $TRAD_GRAIL_PROGRAM_ID = TRAD_GRAIL_PROGRAM_ID;
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model('Application_model');
        $this->CI->load->model('Users_model');
        $this->CI->load->model('Programs_model');
    }
    public function find_next_term($term) {
        // This grabs the single int from value that holds 
        // the current term as 1, 2, or 3
        $current_term = substr($term['value'], -2, 1);
        $current_year = substr($term['value'], -8, 4);
        $next_year = strval(intval($current_year) + 1);

        switch($current_term) {
        // Fall
        case '1':
            // So the next term is Spring
            return array('name' => 'Spring ' . $current_year,
                'value' => $current_year . '20');
        // Spring
        case '2':
            // So the next term is Summer
            return array('name' => 'Summer ' . $current_year,
                'value' => $current_year . '30');
        // Summer
        case '3':
            // So the next term is Fall
            return array('name' => 'Fall ' . $current_year,
                // Per CSP spec, Fall uses the next calendar 
                // year for its value
                'value' => $next_year . '10');
        default:
            return false;
        }

    }

    public function get_basic_user_fields_from_app() {
        return array(
            'address' => 'txtPermAdd',
            'phone' => 'txtPhone',
            'city' => 'txtPermCity',
            'state' => 'ddlpermstate',
            'zip' => 'zip'
        );
    }

    public function get_term_options() {
        $term_options = array();

        // Used to calculate value used in drop down and export
        $current_year = date('Y', time()); // current year, 4 digits
        $next_year = date('Y', strtotime('+1 years', time()));

        // We're just comparing months and days, so year doesn't matter.
        // We use the current year for all comparisons
        $todays_date = strtotime(date("Y-m-d"));

        // Date values from Concordia
        $term_spring_start = strtotime(date("Y") . "-01-15");
        $term_summer_start = strtotime(date("Y") . "-07-01");
        $term_fall_start = strtotime(date("Y") . "-08-25");

        // Find current term by today's date
        if($todays_date >= $term_spring_start && $todays_date < $term_summer_start) {
            $term_options_start = array('name' => 'Spring ' . $current_year, 
                'value' => $current_year . '20');
        }
        if($todays_date >= $term_summer_start && $todays_date < $term_fall_start) {
            $term_options_start = array('name' => 'Summer ' . $current_year, 
                'value' => $current_year . '30');
        }
        if($todays_date >= $term_fall_start) {
            // Per CSP spec, Fall uses the next calendar year for its value
            $term_options_start = array('name' => 'Fall ' . $current_year, 
                'value' => $next_year . '10');
        }
        if($todays_date >= strtotime(date("Y" . "-01-01")) && $todays_date < $term_spring_start) {
            $term_options_start = array('name' => 'Fall ' . $current_year, 
                'value' => $current_year . '10');
        }

        // Add the default item
        array_push($term_options, array('name' => 'Please Select', 'value' => ''));

        // Build a list of 4 terms
        $current_term = $term_options_start;
        for($i = 0; $i < 3; $i++) {
            $next_term = $this->find_next_term($current_term);
            array_push($term_options, $next_term);
            $current_term = $next_term;
        }
        return $term_options;
    }

    public function populate_application_from_leadform($data) {
        // Write user data to application
        $app_user['txtFName'] = $data['first_name'];
        $app_user['txtLName'] = $data['last_name'];
        $app_user['txtEmailPer'] = $data['email'];
        $app_user['radGender'] = (isset($data['gender'])) ? $data['gender'] : '';
        $app_user['txtPermAdd'] = (isset($data['address'])) ? $data['address'] : '';
        $app_user['txtPhone'] = $data['phone'];
        $app_user['txtPermCity'] = (isset($data['city'])) ? $data['city'] : '';
        $app_user['ddlpermstate'] = (isset($data['state'])) ? $data['state'] : '';
        $app_user['txtPermZip'] = (isset($data['zip'])) ? $data['zip'] : '';
        $app_user['uid'] = $data['uid'];
        $app_user['ddlCountry'] = (isset($data['country'])) ? $data['country'] : '';

        if(isset($data['country']) && (($data['country'] == "United States") || ($data['country'] == "US"))) {
            $app_user['ddlCountry'] = "US";
        }
        else if(isset($data['country']) && $data['country'] == "Canada") {
            $app_user['ddlCountry'] = "CA";
        }

        $this->CI->Application_model->add($app_user['uid'], $app_user);
    }

    public function add_custom_fields(&$application) {
        // Find the program data for program submitted on app
        $student_type = $this->CI->Users_model->get_student_type($this->CI->session->userdata('uid'));

        // Record the recruit type as student type for use in export
        $recruit_type = $student_type;

        if($student_type == 'TRAD') {
            $app_type = 'TRAD'; // Passed on through export to be used
            $key_to_match_by = 'trad_id';
        } else {
            $app_type = 'ONLINE'; // Passed on through export to be used
            $key_to_match_by = 'program_id';
        }

        // Find the correct program data with extra map values
        if ($student_type == 'TRAD') {
            $programs = $this->CI->Programs_model->get_resource('majors');
        }else{
            $programs = $this->CI->Programs_model->get_stp_programs(7325, $student_type);
        }
        foreach($programs as $program) {
            if($program[$key_to_match_by] == $application['ddlProgram']) {
                $correct_program = $program;
            }
        }

        // Find the correct minor data with extra map values
        $minors = $this->CI->Programs_model->get_resource('minors');
        foreach($minors as $minor) {
            if($minor[$key_to_match_by] == $application['ddlMinor']) {
                $correct_minor = $minor;
            }
        }

        // Trad app maps these in based on term
        if($app_type == 'TRAD') {
           switch($application['ddlStatus']) {
            case 'freshman':
                $recruit_type = 'NF';
                $correct_program['student_type'] = 'F';
                $correct_program['level'] = 'UG';
                break;
            case 'transfer':
                $recruit_type = 'NT';
                $correct_program['student_type'] = 'T';
                $correct_program['level'] = 'UG';
                break;
            case 'postbacc':
                $recruit_type = 'NP';

                // Student Types
                if($correct_program['college'] == 'ED') {
                    $correct_program['student_type'] = 'P';
                } else {
                    $correct_program['student_type'] = 'Q';
                }

                // Levels
                switch($correct_program['major']) {
                case 'DC':
                    $correct_program['level'] = 'GR';
                    break;
                case 'DO':
                    $correct_program['level'] = 'GR';
                    break;
                case 'LCT':
                    $correct_program['level'] = 'UG';
                    break;
                default:
                    $correct_program['level'] = 'UG';
                    break;
                }
                break;

            case 'pseo':
                $recruit_type = ''; // Left blank
                $correct_program['student_type'] = 'H';
                $correct_program['level'] = 'UG';
                break;
            default:
                break;
            } 
        }

        // Merge in various program data
        $application = array_merge($application, array('AppType'=> $app_type));
        $application = array_merge($application, array('RecruitType'=> $recruit_type));
        $application = array_merge($application, array('StuType' => $correct_program['student_type']));
        $application = array_merge($application, array('College' => $correct_program['college']));
        $application = array_merge($application, array('Degree' => $correct_program['degree']));
        $application = array_merge($application, array('Concentration' => $correct_program['concentration'])); 
        $application = array_merge($application, array('Level' => $correct_program['level']));
        $application = array_merge($application, array('Interest1' => $correct_program['interest']));
        $application = array_merge($application, array('Recruiter' => ""));
        $application = array_merge($application, array('JobTitle' => ""));

        // The app should reflect the Major/Minor Code, not Grail Program ID
        $application['ddlProgram'] = $correct_program['major'];
        $application['ddlMinor'] = $correct_minor['minor'];
        $application['Interest4'] = $correct_minor['interest'];

        // Lastly strip out all commas, they break the comma-delimited export
        foreach($application as &$app_value) {
            $app_value = str_replace(","," ", $app_value);
        }
        return;
    }

    // Accepts an array of majors, minors, licensures, etc
    // and returns <option> strings
    public function get_option_html_string($resources) {
        $result = '<option value="">Please Select</option> ';
        foreach($resources as $resource) {
            if(isset($resource['trad_id'])) {
                $result .= '<option value="' . $resource['trad_id'] . '">' . $resource['name'] . "</option>";
            }
        }
        return $result;
    }

    // Used if external calls fail
    public function redirect_to_old_application($program_type = '') {
        switch($program_type) {
        case 'ND':
            redirect($this->CI->config->item('online_undergraduate_application_url'));
            break;
        case 'NG':
            redirect($this->CI->config->item('online_graduate_application_url'));
            break;
        case '':
            redirect($this->CI->config->item('online_undergraduate_application_url'));
            break;
        }
    }

    public function show_program_chooser($student_type) {
        switch($student_type) {
        case 'NG':
            return true;
        case 'ND':
            return true;
        case 'TRAD':
            return false;
        }
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

        $info['student_full_name'] = $info['txtFName'] . ' ' . $info['txtMiddleName'] . ' ' . $info['txtLName'];

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
            $pdf->Write(5,$info['txtPermAdd']);

            // City, State
            $pdf->SetXY($start_x+1,$start_y+13);
            $pdf->Write(5,$info['txtPermCity'].', '.$info['ddlpermstate']);

            // Zip Code
            $pdf->SetXY($start_x+58,$start_y+13);
            $pdf->Write(5,$info['txtPermZip']);

            // Phone Number & Email
            $pdf->SetXY($start_x+15,$start_y+26);
            $pdf->Write(5,$info['txtPhone']);
            $pdf->SetFontSize(8);
            $pdf->SetXY($start_x+52,$start_y+26);
            $pdf->Write(5,$info['txtEmailPer']);
            $pdf->SetFontSize(10);

            // Birth Date
            $birth_date = explode('-', $info['txtDOB']);

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
            return $url_file_path;
        } else {
            return false;
        }
    }
}

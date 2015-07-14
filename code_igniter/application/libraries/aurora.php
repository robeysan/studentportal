<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Aurora {
    protected $CI;
    public function __construct() {
        $this->CI  =& get_instance();
        $this->CI->load->model('Application_model');
        $this->CI->load->model('Programs_model');
        $this->CI->load->model('Users_model');
        $this->CI->load->library('session');
    }

    public function get_term_options(){
        return;
    }

    public function show_program_chooser($student_type) {
        return true;
    }

    public function get_basic_user_fields_from_app() {
        return array(
            'address' => 'address1',
            'phone' => 'cell_phone',
            'city' => 'city',
            'state' => 'state',
            'zip' => 'zip_code'
        );
    }

    public function populate_application_from_leadform($data) {
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
        $app_user['country'] = $data['country'];

        if(isset($data['country']) && $data['country'] == "United States") {
            $app_user['country'] = "US";
        }
        else if(isset($data['country']) && $data['country'] == "Canada") {
            $app_user['country'] = "CA";
        }

        $this->CI->Application_model->add($app_user['uid'], $app_user);
    }

    public function get_preferred_major($program_id) {
        return $this->CI->Programs_model->get_preferred_major($program_id);
    }

    public function add_custom_fields(&$application) {
        foreach ($application as $key => &$exportvalue) {
            $exportvalue = str_replace('|', ' ', $exportvalue);
        }
        if ($application['hispanic_latino']=="NA") {
            $application['hispanic_latino']='';
        }

        //App Type for alt export
        $application = array_merge($application, array('AppType'=> 'aurora'));

        if (isset($application['racial_identity'])) {
            $race = implode(' ', $application['racial_identity']);
            unset($application['racial_identity']);
            $application['racial_identity']= $race;
        }else{
            $application['racial_identity']=' ';
        }

        //set program
        $program_selected = $this->get_preferred_major($application['cpid']); // Get preferred major from mongo application data
        if (!$program_selected) { 
            //if fail try getting preferred major using grail.dw_leads program id.
            $uid = $this->CI->session->userdata('uid');
            $grail_dw_lead = $this->CI->Users_model->lookup_user_from_dw_leads($uid);
            $grail_cpid = $grail_dw_lead->client_program_id;
            $program_selected = $this->get_preferred_major($grail_cpid);
        }
        $application['preferred_major'] = $program_selected;

        return;
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

    public function get_student_type(){
        $user = $this->CI->Users_model->get_user_by_uid($this->CI->session->userdata('uid'));
        return $this->get_degree_type($user['item_id']);
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

            // City, State
            $pdf->SetXY($start_x+1,$start_y+13);
            $pdf->Write(5,$info['city'].', '.$info['state']);

            // Zip Code
            $pdf->SetXY($start_x+58,$start_y+13);
            $pdf->Write(5,$info['zip_code']);

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
            return $url_file_path;
        } else {
            return false;
        }
    }
}

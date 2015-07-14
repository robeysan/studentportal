<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Otr extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/New_York'); 
        $this->load->model('Application_model');
        $this->load->model('Users_model');
        $this->load->library('session');
        $this->load->library('fpdf');
        $this->load->library('tank_auth'); 
        $this->load->library(SITE, '', 'school_lib');
        $this->load->helper('form');
        $this->load->library('email');
        $this->load->model('tank_auth/users');

        if(!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login');
        }

        force_ssl();
        $user = $this->users->get_user_by_id($this->tank_auth->get_user_id(), true);
        $this->session->set_userdata('uid', $this->Users_model->getUIDByEmail($user->email));    
        $this->session->set_userdata('client_program_id', $this->Users_model->getProgramIDByEmail($user->email));  
        $this->client_program_id = $this->session->userdata('client_program_id'); 

        // grab session UID and log out if something went wrong
        $this->uid = $this->session->userdata('uid');
        if($this->uid == NULL) {
            $this->tank_auth->logout();
        }

    }

    public function index(){
        $this->load->model('Programs_model');
        $this->client_program_id = $this->session->userdata('client_program_id');
        $this->program_name = $this->session->userdata('program_name');
        $data['has_stp'] = $this->Programs_model->has_stp($this->client_program_id);
        $data['has_ecs'] = $this->Programs_model->has_ecs($this->client_program_id);
        
        $data['user_progress'] = $this->Users_model->getProgress($this->uid);
        $data['user_name'] = $this->Users_model->getUserNameByID($this->uid);
        $data['uid'] = $this->uid;
        $data['image_url'] = $this->Users_model->getImageURLByID($this->uid);
        $data['image_url_thumbnail'] = $this->Users_model->getImageThumbnailURLByID($this->uid);
        $data['user'] = $this->Users_model->get_user_by_uid($this->uid);
        $data['has_stp'] = $this->Programs_model->has_stp($this->client_program_id);
        //$data['has_stp'] = $this->session->userdata('has_stp');
        
        // Get data from Application_model
        $info = $this->Application_model->get($this->uid);  //$this->uid
        $info = $info[0];
        $info['otr_address'] = $this->config->item('otr_address');

        // Massage the data a bit here to output to the PDF
        date_default_timezone_set('America/New_York');
        
        // Generate Good File name with student uid and timestamp
        $file = strtolower(str_replace(' ', '_', $this->uid)) . '_' . mktime() . '.pdf';
        if(isset($info['social_tax_id']))$info['social_tax_id']='';
        if(isset($info['SF_NO']))$info['SF_NO']='';
        if(isset($info['txtSSN']))$info['txtSSN']='';
        
        $write_result = $this->school_lib->otr_pdf_writer($file,$info);
        
        if ($write_result) {
            // Pass $write_result to download button...
            $data['transcript_request_pdf'] = $write_result;
        } else {
            $data['transcript_request_pdf'] = '/img/otr.pdf';
            //$data['error'] = 'Oops! Something went wrong trying to autofill a transcript request form. We have been notified and will try to fix as soon as possible!'; 
            log_message('debug', 'otr_pdf_writer returned false for ' . $this->uid);
        }

        $this->load->view('header', $data);
        $this->load->view('otr', $data);
        $this->load->view('footer', $data);
    }

    // This is called from the footer JS for transcript request notifications
    public function notify() {

        if($_POST) {
            $action = $this->input->post('action');

            // Used in email copy
            switch($action) {
            case 'download': 
                $email_verb = 'downloaded';
                break;
            case 'print': 
                $email_verb = 'printed';
                break;
            default:
                exit('Invalid action');
            }

            // Email
            $ec = $this->Users_model->get_primary_ec();
            $user = $this->Users_model->get_user_by_uid($this->uid);

            $email_config['mailtype'] = "text";
            $email_config['newline'] = "\r\n";
            $this->email->initialize($email_config);

            $this->email->from($this->config->item('noreply_email'), 'Student Portal Notifications');
            $this->email->to($ec['email']);
            $this->email->subject("Student Portal - OTR Form $email_verb");
            $this->email->message("An OTR form has been $email_verb by ".$user['first_name']." ".$user['last_name'].".\r\n".
                (isset($user['first_name']) ? $user['first_name'] : '')."'s information is:\r\n".
                (isset($user['email']) ? $user['email'] : '')."\r\n".
                (isset($user['phone']) ? $user['phone'] : '')."\r\n".
                (isset($user['address']) ? $user['address'] : '')."\r\n".
                (isset($user['city']) ? $user['city'] : '').", ".(isset($user['state']) ? $user['state'] : '')."\r\n".
                (isset($user['zip']) ? $user['zip'] : '')."\r\n".
                "Request ID:  ".$user['uid']."\r\n" );
            $this->email->send();
            // End email
        }
    }

    function if_null_blank($str) { return (isset($str) ? $str : '');  }
}

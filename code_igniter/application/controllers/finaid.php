<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Finaid extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('Messages_model');
        $this->load->model('Application_model');
        $this->load->model('Users_model');
        $this->load->library('session');
        $this->load->library('fpdf');
        $this->load->library('tank_auth'); 
        $this->load->helper('form');
        $this->load->library('email');
        $this->load->model('tank_auth/users');
        $this->load->helper('debugger.inc');

        if(!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login');
        }

        force_ssl();
        $user = $this->users->get_user_by_id($this->tank_auth->get_user_id(), true);
        $this->session->set_userdata('uid', $this->Users_model->getUIDByEmail($user->email));    

        // grab session UID and log out if something went wrong
        $this->uid = $this->session->userdata('uid');
        if($this->uid == NULL) {
            $this->tank_auth->logout();
        }

    }

    public function index(){

        $data['user_progress'] = $this->Users_model->getProgress($this->uid);
        $data['user_name'] = $this->Users_model->getUserNameByID($this->uid);
        $data['uid'] = $this->uid;
        $data['image_url'] = $this->Users_model->getImageURLByID($this->uid);
        $data['image_url_thumbnail'] = $this->Users_model->getImageThumbnailURLByID($this->uid);
        $data['messages'] = $this->Messages_model->getMessagesByFromUserID($this->uid);
        $data['has_stp'] = $this->session->userdata('has_stp');
        $data['user'] = $this->Users_model->get_user_by_uid($this->uid);
        
        $this->load->view('header', $data);
        $this->load->view(SITE.'/financial_aid', $data);
        $this->load->view('footer', $data);
    }

    public function complete(){
        $checkbox = $this->input->post('finaid_complete');

        
        // Check to make sure they acknowledged
        if($checkbox == 'on') {
            log_message('info', 'User ' . $this->uid . ' completed a financial aid step');
            $this->Users_model->updateProgress($this->uid, 'complete');

            // Email
            $ec = $this->Users_model->get_primary_ec();
            $user = $this->Users_model->get_user_by_uid($this->uid);

            $email_config['mailtype'] = "text";
            $email_config['newline'] = "\r\n";
            $this->email->initialize($email_config);
            $this->email->from($this->config->item('noreply_email'), 'Student Portal Notifications');
            $this->email->to($ec['email']);
            $this->email->subject("Student Portal - Financial Aid Acknowledged");
            $this->email->message("Financial Aid has been acknowledged by ".$user['first_name']." ".$user['last_name'].".\r\n".
                $user['first_name']."'s information is:\r\n".
                $user['first_name']." ".$user['last_name']."\r\n".
                $user['email']."\r\n".
                $user['phone']."\r\n".
                $user['address']."\r\n".
                $user['city'].", ".$user['state']."\r\n".
                $user['zip']."\r\n".
                "Request ID:  ".$user['uid']."\r\n" );
            $this->email->send();
            // End email
            
            redirect('/');
        }
        else {
            redirect('/finaid');
        }
    }
}

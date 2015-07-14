<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
    public function test()
    {
        $rebuild = $this->Application_model->rebuild_pdf_application('274060');
        echo '<pre>';
        var_dump($rebuild);
    }

    public function __construct() {
        parent::__construct();
        
        $this->load->model('Messages_model');
        $this->load->model('Application_model');
        $this->load->model('Users_model');
        $this->load->model('Programs_model');
        $this->load->library('session');
        $this->load->library('fpdf');
        $this->load->library('tank_auth'); 
        $this->load->helper('form');
        $this->load->model('tank_auth/users');
        $this->load->helper('debugger.inc');

        if(!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login');
        }

        force_ssl();
        
        // Set values in session to be used across the site
        $user = $this->users->get_user_by_id($this->tank_auth->get_user_id(), true);
        $this->session->set_userdata('uid', $this->Users_model->getUIDByEmail($user->email));    
        $this->session->set_userdata('item_id', $this->Users_model->getProgramIDByEmail($user->email));    
        $this->session->set_userdata('has_stp', $this->Programs_model->has_stp($this->session->userdata('item_id')));
        $this->session->set_userdata('program_name', $this->Programs_model->get_program_name($this->session->userdata('item_id')));    

        // grab session UID and log out if something went wrong
        $this->uid = $this->session->userdata('uid');
        $this->item_id = $this->session->userdata('item_id');
        $this->program_name = $this->session->userdata('program_name');
        if($this->uid == NULL) {
            $this->tank_auth->logout();
        }

        $mongo_user = $this->Users_model->get_user_by_uid($this->uid);

        if(!isset($mongo_user['type']) || !strstr($mongo_user['type'], "EC")) {
            //$this->Users_model->update_user_from_dw_leads($this->uid);
        }

    }

    public function index()
    {

        $data['user_progress'] = $this->Users_model->getProgress($this->uid);
        $data['user_name'] = $this->Users_model->getUserNameByID($this->uid);
        $data['uid'] = $this->uid;
        $data['image_url'] = $this->Users_model->getImageURLByID($this->uid);
        $data['image_url_thumbnail'] = $this->Users_model->getImageThumbnailURLByID($this->uid);
        $data['messages'] = $this->Messages_model->getMessagesByFromUserID($this->uid, 0, 0);
        $data['ecs'] = $this->Users_model->get_ecs();
        $data['program_has_ecs'] = $this->Programs_model->has_ecs($this->item_id);
        $data['has_stp'] = $this->Programs_model->has_stp($this->item_id);
        $data['has_ecs'] = $this->Programs_model->has_ecs($this->item_id);
        $data['user'] = $this->Users_model->get_user_by_uid($this->uid);

        // leadform/welcome() sets first_login to true after leadform/process_lead()
        if ($this->session->userdata('first_login') && $data['has_stp']) { 
            $data['show_welcome_modal'] = true;
            $this->session->unset_userdata('first_login');
        }

        if ($this->session->userdata('error_msg')) {
            $data['error'] = $this->session->userdata('error_msg');
            $data['error_header'] = $this->session->userdata('error_header');
            $this->session->unset_userdata('error_msg');
            $this->session->unset_userdata('error_header');
        }

        // leadform/welcome() sets first_login to true after leadform/process_lead()
        if ($this->session->userdata('first_login')) {
            $data['show_welcome_modal'] = true;
            $this->session->unset_userdata('first_login');
        }

        // Redirect if they try to access the main page without a STP
        if(! $this->session->userdata('has_stp')) {
            redirect('/app');
        }


        $this->load->view('header', $data);
        $this->load->view('main', $data);
        $this->load->view('footer', $data);
    }

    public function privacy()
    {
        $this->load->helper('url');
        $data['user_progress'] = $this->Users_model->getProgress($this->uid);
        $data['user_name'] = $this->Users_model->getUserNameByID($this->uid);
        $data['uid'] = $this->uid;
        $data['image_url'] = $this->Users_model->getImageURLByID($this->uid);
        $data['image_url_thumbnail'] = $this->Users_model->getImageThumbnailURLByID($this->uid);
        $data['user'] = $this->Users_model->get_user_by_uid($this->uid);
        $data['site']=base_url();
        $data['has_stp'] = $this->Programs_model->has_stp($this->item_id);
        $data['has_ecs'] = $this->Programs_model->has_ecs($this->item_id);

        $this->load->view('header', $data);
        $this->load->view('privacy', $data);
        $this->load->view('footer', $data);
    }


}

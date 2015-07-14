<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setup extends CI_Controller {

    public function __construct() {
        if (ENVIRONMENT=='prod') {
            die('RESTRICTED! No setup scripts allowed here');
        }
        parent::__construct();
        
        $this->load->library('session');
        $this->load->library('tank_auth');
        $this->load->library('studentportal');
        $this->load->model('tank_auth/users');
        $this->load->model('Setup_model');
        $this->load->helper('debugger.inc');
        force_ssl();

    }

    public function index()
    {   

        $this->load->library('studentportal');
        $data['portal_names'] = $this->studentportal->get_portal_names();
        $data['csp_portal_address'] = $this->Setup_model->get_portal_address('csp');
        $data['aurora_portal_address'] = $this->Setup_model->get_portal_address('aurora');
        $data['uof_portal_address'] = $this->Setup_model->get_portal_address('uof');
        $data['csp_compare_elp_items'] = $this->Setup_model->compare_elp_items('csp');
        $data['aurora_compare_elp_items'] = $this->Setup_model->compare_elp_items('aurora');
        $data['uof_compare_elp_items'] = $this->Setup_model->compare_elp_items('uof');
        $data['compare_cpa'] = $this->Setup_model->compare_grail_cpa(); //client_programs_to_applications
        $data['compare_cps'] = $this->Setup_model->compare_grail_cps(); //client_programs_services
        $data['csp_compare_grail_cp'] = $this->Setup_model->compare_grail_cp('csp'); //client_programs
        $data['aurora_compare_grail_cp'] = $this->Setup_model->compare_grail_cp('aurora'); 
        $data['uof_compare_grail_cp'] = $this->Setup_model->compare_grail_cp('uof'); 
        $data['ecs'] = $this->Setup_model->get_ecs();
        $data['has_stp']=0;
        $this->load->view('setup_header', $data);
        $this->load->view('setup', $data);
        $this->load->view('setup_footer', $data);
    }

    public function update_portal_address()
    {
        $portal = $this->input->post('portal');
        echo $this->Setup_model->update_portal_address($portal);
    }

    public function update_ec_email()
    {
        $email  = $this->input->post('email');
        $portal = $this->input->post('portal');
        $uid    = $this->input->post('uid');
        echo $this->Setup_model->update_ec_email($portal,$uid,$email);
    }

    public function clear_msg()
    {
        $portals = $this->input->post('portal');
        echo $this->Setup_model->clear_messages(array($portals));
    }

    public function clear_users()
    {
        $portals = $this->input->post('portal');
        $this->Setup_model->clear_applications(array($portals));
        $this->Setup_model->clear_exports(array($portals));
        echo $this->Setup_model->clear_users(array($portals));  
    }

}
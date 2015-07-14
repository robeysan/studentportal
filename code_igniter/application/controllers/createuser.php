<?php

class Createuser extends CI_Controller {

	public function __construct() {
        
		parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('Messages_model');
        $this->load->model('Application_model');
        $this->load->library(SITE, '', 'school_lib');
        $this->load->helper('date');

        //$this->load->helper('ssl');
        //force_ssl();
        date_default_timezone_set('America/New_York');

	}

    function index() {		                               
        $data = array();
        $this->load->view('create_user', $data);
	}
}

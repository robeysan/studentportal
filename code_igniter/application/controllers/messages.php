<?php

class Messages extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Messages_model');

		$this->load->model('tank_auth/users');
		$this->load->helper('date');
		$this->load->library('tank_auth'); 
		$this->load->library('session');
		if(!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login');
        }

        force_ssl();
        $user = $this->users->get_user_by_id($this->tank_auth->get_user_id(), true);
        $this->session->set_userdata('uid', $this->Users_model->getUIDByEmail($user->email));    

        // Grab session UID and log out if something went wrong
        $this->uid = $this->session->userdata('uid');
        if($this->uid == NULL) {
            $this->tank_auth->logout();
        }
	}

	public function index() {
	}

	public function messages_by_user($uid) {
		$messages = $this->Messages_model->getMessagesByUserID($uid);
	}

	public function create($msgData="") {

		if ($msgData!="") {
			$this->Messages_model->create($msgData);

		} else if($_POST) {
			$data['uid'] = $this->uid;
			$data['to'] = $this->input->post('to');
			$data['text'] = $this->input->post('text');
            $data['type'] = $this->input->post('type');
			$data['ts'] = now();
            
            $this->Messages_model->create($data);
            log_message('info', 'Sent message to ' . $data['to'] . ' from ' . $data['uid']);

            if($this->input->post('redirect')!="") {
                redirect($this->input->post('redirect'));
            } 
        }
    }

    public function reply() {
        if($_POST) {
            $data['uid'] = $this->uid;
            $data['text'] = $this->input->post('text');
            $data['ts'] = now();
            $data['_id'] = $this->input->post('_id');

            // $data['uid'] = 15;
            // $data['text'] = "Test4";
            // $data['_id'] = "4f105aac35d22bd7483fff25";
            // $data['ts'] = now();

            $this->Messages_model->reply($data);
        }
    }

}


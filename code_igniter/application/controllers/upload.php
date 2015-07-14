<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('Messages_model');
        $this->load->library('session');
        $this->load->library('tank_auth'); 
        $this->load->helper('form');
        $this->load->model('tank_auth/users');
        if(!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login');
        }

        force_ssl();
        $user = $this->users->get_user_by_id($this->tank_auth->get_user_id(), true);
        $this->session->set_userdata('uid', $this->Users_model->getUIDByEmail($user->email));    
        $this->session->set_userdata('client_program_id', $this->Users_model->getProgramIDByEmail($user->email));    
        // grab session UID and log out if something went wrong
        $this->uid = $this->session->userdata('uid');
        if($this->uid == NULL) {
            $this->tank_auth->logout();
        }

        $this->client_program_id = $this->session->userdata('client_program_id');
        $this->session->set_userdata('has_stp', $this->Programs_model->has_stp(
            $this->session->userdata('client_program_id')));
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{

		$config['upload_path'] = './img/user_profiles/';
		$config['file_name'] =  $this->uid;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '300';
		$config['max_width']  = '500';
		$config['max_height']  = '500';
		$this->load->library('upload', $config);

		$data['user_progress'] = $this->Users_model->getProgress($this->uid);
        $data['user_name'] = $this->Users_model->getUserNameByID($this->uid);
        $data['uid'] = $this->uid;
        $data['image_url'] = $this->Users_model->getImageURLByID($this->uid);
        $data['image_url_thumbnail'] = $this->Users_model->getImageThumbnailURLByID($this->uid);
        $data['messages'] = $this->Messages_model->getMessagesByFromUserID($this->uid);
        $data['program_has_ecs'] = $this->Programs_model->has_ecs($this->client_program_id);
        $data['has_stp'] = $this->Programs_model->has_stp($this->client_program_id);
        $data['has_ecs'] = $this->Programs_model->has_ecs($this->client_program_id);
        $data['ecs'] = $this->Users_model->get_ecs(); 
        $data['user'] = $this->Users_model->get_user_by_uid($this->uid);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());
			$data['error'] = $this->upload->display_errors();
			$data['error_header'] = 'Change Image';
			$this->load->view('header', $data);
            $this->load->view('main', $data);
            $this->load->view('footer');	
		}
		else
		{
			$this->load->library('image_lib');
			$profileImg =  $this->upload->data();
			$imageUrl = "/img/user_profiles/".$profileImg['file_name'];


			$config['image_library'] = 'gd2';
			//$config['source_image']	= $imageUrl;
			$config['source_image']	= $profileImg['full_path'];
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	 = 75;
			$config['height']	= 50;
			$this->image_lib->initialize($config); 
			$thumbUrl = "/img/user_profiles/".$profileImg['raw_name']."_thumb".$profileImg['file_ext'];
			if ( ! $this->image_lib->resize())
			{
				$error = array('error' => $this->image_lib->display_errors('<p>', '</p>'));
				$data['error'] = $error;
				$this->load->view('header', $data);
            	$this->load->view('main', $data);
            	$this->load->view('footer');	
			}else{
				$this->image_lib->resize();
				//Save image urls to the database
				$this->load->model('Users_model');

				$uid = $this->uid;

				$this->Users_model->updateProfileImage($imageUrl,$thumbUrl,$uid);
				redirect('/');
			}

		}
	}
}

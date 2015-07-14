<?php

include APPPATH.'core/REST_Controller.php';

class User extends REST_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Users_model');
		force_ssl();
	}

	/*****************************************************************
	*  Returns all messages to or from the given user.
	******************************************************************/
	public function index_get() {
	}

	public function progress_post() {
		$uid = $this->input->get('uid');
		$progress = $this->input->get('progress');
        if($this->Users_model->updateProgress($uid, $progress)) {
            $this->response('Success');
        } else {
            $this->response('Failure');
        }
	}


	public function uid_by_entity_id_get() {
		$eid = $this->input->get('entity_id');
		$uid = $this->Users_model->get_uid_by_entity_id($eid);

		if($uid) {
			$this->response($uid);
		}
	}

	public function create_from_lead_post() {
		$rid = $this->input->post('rid');

		$result = $this->Users_model->create_from_lead($rid);

		if(isset($result['errors'])) {
			$this->response("Failure");
		} else {
			$this->response("Success");
		}
	}

	public function is_user_get() {
		$uid = $this->input->get('uid');
		$result = $this->Users_model->is_user($uid);
		$this->response(strval($result));
	}

    public function has_progress_get() {
        $uid = $this->input->get('uid');
        $progress = $this->input->get('progress');
        $result = $this->Users_model->getProgress($uid);
        $this->response((trim($progress) == trim($result)) ? '1' : '0');
    }
}

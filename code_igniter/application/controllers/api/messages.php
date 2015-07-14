<?php

include APPPATH.'core/REST_Controller.php';

class Messages extends REST_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Messages_model');
		$this->load->helper('date');
		force_ssl();
	}

	/*****************************************************************
	*  Returns all messages to or from the given user.
	******************************************************************/
	public function index_get() {
		$uid = 15;
		$messages = $this->Messages_model->getMessagesByFromUserID($uid);
		$this->response($messages);
	}

	/**********************************************************************
	*  Returns all messages to or from the given user.
	**********************************************************************/
	public function messages_for_user_get() {
		$uid = $this->input->get('uid');
		$skip = $this->input->get('skip');
		$limit = $this->input->get('limit');

		$messages = $this->Messages_model->getMessagesByFromUserID($uid, $skip, $limit);


		foreach($messages as $key=>$value) {
			$id = $messages[$key]['_id']->{'$id'};
			$messages[$key]['_id'] = $id;
		}
		
		$this->response($messages);
	}

	/**********************************************************************
	*  Returns all messages where the given user is in the To: field
	**********************************************************************/
	public function messages_by_user_get() {
		$uid = $this->input->get('uid');
		$skip = $this->input->get('skip');
		$limit = $this->input->get('limit');

		$messages = $this->Messages_model->getMessagesByUserID($uid, $skip, $limit);
		
		foreach($messages as $key=>$value) {
			$id = $messages[$key]['_id']->{'$id'};
			$messages[$key]['_id'] = $id;
		}
		
		$this->response($messages);
	}

	public function messages_by_from_user_get() {
		$uid = $this->input->get('uid');
		$skip = $this->input->get('skip');
		$limit = $this->input->get('limit');

		$messages = $this->Messages_model->getMessagesByFromUserID($uid, $skip, $limit);

		foreach($messages as $key=>$value) {
			$id = $messages[$key]['_id']->{'$id'};
			$messages[$key]['_id'] = $id;
		}

		$this->response($messages);	
	}

	/**********************************************************************
	*  Creates a new message. Expects the following get variables: 
	*    -  'uid'	:	The user id of the sender
	*    -  'to'	:	The user id of the recipient
	*    -  'text'	: 	The text of the message
	**********************************************************************/
	public function create_post() {
		$data['uid'] = $this->input->get('uid');
		$data['to'] = $this->input->get('to');
		$data['text'] = $this->input->get('text');
		$data['ts'] = now();

		$this->Messages_model->create($data);
	}

	/**********************************************************************
	*  Creates a reply to a message. Expects the following get variables: 
	*    -  'uid'	:	The user id of the replier
	*    -  '_id' 	: 	Mongo id of the original message
	*    -  'text'	: 	The text of the message
	**********************************************************************/
	public function reply_post() {
		$data['uid'] = $this->input->get('uid');
		$data['_id'] = $this->input->get('_id');
		$data['text'] = $this->input->get('text');
		$data['ts'] = now();
		
		$this->Messages_model->reply($data);
	}
}
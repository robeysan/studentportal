<?php

class Users_model extends CI_Model {
	
    function __construct(){
        $this->load->library('mongo_db');
        $this->load->helper('date');
        $this->load->model('Programs_model');
        $this->grail=$this->load->database('grail', true);
    }

    /**************************************************************************
     * This function requires
     * - first_name
     * - last_name
     * - email
     * - uid               -> request_id
     * Optional:
     * - progress          -> application, otr, finaid, completed
     * - phone
     * - entity_id         -> From Grail
     * - item_id            -> Program
     * - title             -> Admissions Counselor, Prospective Student, etc.
     * - type              -> EC, Student, Teacher, etc
     * - facebook_id
     * - image_url
     * - image_url_thumbnail
     * - fb_data? FB Blob
     * - fb_token
     **************************************************************************/
    function create($data) {
        $data['password'] = $this->randomPassword();
        $data['errors'] = array();
        $data['created_at'] = now();
        $data['uid'] = (isset($data['uid'])) ? $data['uid'] : $data['request_id'];

        // This is used to set the correct 
        if($this->Programs_model->has_stp($data['item_id'])) {
            $data['has_stp'] = true;
            $data['progress'] = (isset($data['progress'])) ? $data['progress'] : 'application'; 
        } else {
            $data['has_stp'] = false;
            $data['progress'] = (isset($data['progress'])) ? $data['progress'] : 'app_only_app';
        }

        $data['phone'] = (isset($data['phone'])) ? $data['phone'] : '';
        $data['entity_id'] = (isset($data['entity_id'])) ? $data['entity_id'] : '';
        $data['item_id'] = (isset($data['item_id'])) ? $data['item_id'] : '';
        $data['title'] = (isset($data['title'])) ? $data['title'] : 'Prospective Student';
        $data['type'] = (isset($data['type'])) ? $data['type'] : 'Student';
        $data['image_url'] = (isset($data['image_url'])) ? $data['image_url'] : '/img/unknown_user_profile.jpg';
        $data['image_url_thumbnail'] = (isset($data['image_url_thumbnail'])) ? $data['image_url_thumbnail'] : '/img/unknown_user_profile_thumb.jpg';
        // register them
        $result = $this->register_user($data);

        return $result;
    }

    function create_from_lead($request_id) {
        $this->load->library('curl');

        // Get info back from Partners with the request ID
        $this->curl->option(CURLOPT_SSL_VERIFYHOST, false);
        $this->curl->option(CURLOPT_SSL_VERIFYPEER, false);
        $lead = json_decode(trim($this->curl->simple_get($this->config->item('partners_url')."/post/get_lead_info/".$request_id)));
        if($this->config->item('log_threshold') >= 2) { log_message('debug', "Called get_lead_info(). Lead Request ID = $lead->request_id"); }
        if($this->config->item('log_threshold') >= 2) { log_message('debug', "Called get_lead_info(). Lead Email = $lead->email"); }

        // create new user
        $data = get_object_vars($lead);
        $data['image_url'] = '/img/unknown_user_profile.jpg';
        $data['image_url_thumbnail'] = '/img/unknown_user_profile_thumb.jpg';
        $data['item_id'] = $lead->client_program_id; 
        $data['uid'] = $request_id;
        // This is used to set the correct 
        if($this->Programs_model->has_stp($data['item_id'])) {
            $data['progress'] = (isset($data['progress'])) ? $data['progress'] : 'application'; 
        } else {
            $data['progress'] = (isset($data['progress'])) ? $data['progress'] : 'app_only_app';
        }
        $data['type'] = 'Student';
        $data['title'] = 'Prospective Student';

        $result = $this->create($data);

        return $result;
    }

	function delete($id) {
		$this->mongo_db->where('_id', $id);
	}

    function is_user($uid) {
        $this->mongo_db->where('uid', $uid);
        return $this->mongo_db->count('users');
    }
    
    function get_user_by_uid($uid) {
        $this->mongo_db->where('uid', $uid);
        $user = $this->mongo_db->get('users');

        return end($user);
    }

    function get_student_type($uid) {
        // Take in uid, return student type
        $this->load->library(SITE, '', 'school_lib');
        $user = $this->get_user_by_uid($uid);
        $item_id = $user['item_id'];
        if (isset($this->school_lib->TRAD_ELP_PROGRAM_ID) && $user['item_id'] == $this->school_lib->TRAD_ELP_PROGRAM_ID) return 'TRAD';
        return $this->grail->query("
		SELECT classification 
		from stp_programs 
		WHERE program_id = ?
	", array($user['item_id']))->row()->classification;
    }

    // lookup_lead_by_email_and_school()
    // Returns request ID if match is found for lead in Grail DW_LEADS
    function lookup_lead_by_email_and_entityid($email, $client_entity_id) {
        $this->load->library('curl');
        $this->curl->option(CURLOPT_SSL_VERIFYHOST, false);
        $this->curl->option(CURLOPT_SSL_VERIFYPEER, false);
        $post_string = $email . ":" . $client_entity_id;
        $is_lead = $this->curl->simple_get($this->config->item('partners_url')."/post/is_active_lead/".urlencode($post_string));
        return $is_lead;

    }
    
    function lookup_user_from_dw_leads($uid){
        $this->load->library('curl');
        $this->curl->option(CURLOPT_SSL_VERIFYHOST, false);
        $this->curl->option(CURLOPT_SSL_VERIFYPEER, false);
        $lead = json_decode(trim($this->curl->simple_get($this->config->item('partners_url')."/post/get_lead_info/".$uid)));

        return $lead;
    }

    function update_user_from_dw_leads($uid){
        $this->load->library('curl');
        $this->curl->option(CURLOPT_SSL_VERIFYHOST, false);
        $this->curl->option(CURLOPT_SSL_VERIFYPEER, false);
        $lead = json_decode(trim($this->curl->simple_get($this->config->item('partners_url')."/post/get_lead_info/".$uid)));

        // Sync with Grail if the Request ID exists
        if(isset($lead->request_id)) {       
            $this->mongo_db->where(array('uid'=>$uid))->set(array(
                'item_id' => $lead->client_program_id))->update('users'); 
        }
    }

    function get_ecs() {
        $this->mongo_db->like('type', 'EC');
        return $this->mongo_db->get('users');
    }

    function get_primary_ec() {
        $this->mongo_db->where('type', 'EC - Primary');
        $ecs = $this->mongo_db->get('users');

        return $ecs[0];
    }

    protected function _addUserInfoToMessagesCollection($value) {
        $user_name = $this->getUserNameByID($value['uid']);
        $image_url = $this->getImageURLByID($value['uid']);

        $value["user_name"] = $user_name[0]['name'];
        $value["image_url"] = $image_url[0]['image_url'];
        return $value;

    }

    function getProgress($id) {
        $this->mongo_db->select('progress');
        $this->mongo_db->where('uid', $id);
        $user = $this->mongo_db->get('users');
        if(isset($user[0])) {
            return $user[0]['progress'];
        } else {
            return 0;
        }
    }

    function updateProgress($id, $status){
        $this->mongo_db->select('uid');
        $this->mongo_db->where('uid', $id);
        $is_user = $this->mongo_db->get('users');
        if(isset($is_user[0])) {
            $data = array('progress' => $status);
            $this->mongo_db->where('uid', $id);
            $this->mongo_db->set($data)->update('users');
            return true;
        } else {
            return false;
        }
    }  

    function updateProgram($id, $program_id){
        $this->mongo_db->select('uid');
        $this->mongo_db->where('uid', $id);
        $is_user = $this->mongo_db->get('users');
        if(isset($is_user[0])) {
            $data = array('item_id' => $program_id);
            $this->mongo_db->where('uid', $id);
            $this->mongo_db->set($data)->update('users');
            return true;
        } else {
            return false;
        }
    }  

    // Interfaces with Users model
    function getUserNameByID($id) {
        $this->mongo_db->select('first_name');
        $this->mongo_db->select('last_name');
        $this->mongo_db->where('uid', $id);
        $user = $this->mongo_db->get('users');
        if(isset($user[0]) && is_array($user)) {
            return $user[0]['first_name'] . ' ' . 
                $user[0]['last_name'];
        } else {
            return false;
        }
    }

    function getUserNameAndProgressByID($id) {
        $this->mongo_db->select('first_name');
        $this->mongo_db->select('last_name');
        $this->mongo_db->select('progress');
        $this->mongo_db->where('uid', $id);
        $user = $this->mongo_db->get('users');
        if(isset($user[0]) && is_array($user)) {
            $progress = '';
            if(isset($user['progress'])){
                echo($user['progress'].'<br>');
                $progress = $user['progress'];
            }
            return array('name' => $user[0]['first_name'] . ' ' . $user[0]['last_name'], 'progress'=>$progress);
        } else {
             return array('name' => '', 'progress'=>'');
        }
    }

    function get_uid_by_entity_id($eid) {
        $this->mongo_db->select('uid');
        $this->mongo_db->where('entity_id', $eid);
        $user = $this->mongo_db->get('users');

        if(isset($user[0])) {
            return $user[0]['uid'];
        } else {
            return false;
        }
    }

    function getImageURLByID($id) {
        $this->mongo_db->select('image_url');
        $this->mongo_db->where('uid', $id);
        $user = $this->mongo_db->get('users');
        if(isset($user[0]) && is_array($user)) {
            return $user[0]['image_url'];
        } else {
            return false;
        }
    }

    function getImageThumbnailURLByID($id) {
        $this->mongo_db->select('image_url_thumbnail');
        $this->mongo_db->where('uid', $id);
        $user = $this->mongo_db->get('users');
        if(isset($user[0]) && is_array($user)) {
            return $user[0]['image_url_thumbnail'];
        } else {
            return false;
        }
    }

    function getFacebookIDByID($id) {
        $this->mongo_db->select('facebook_id');
        $this->mongo_db->where('uid', $id);
        $user = $this->mongo_db->get('users');
        if(isset($user[0]) && is_array($user)) {
            return $user[0]['facebook_id'];
        }
    }

    function updateFacebookInfoByID($id, $fb_data) {
        $data = array(
            'fb_data' => $fb_data
        );

        return $this->mongo_db->where(array('uid'=>$id))->set(array('fb_data' => $fb_data))->update('users');
    }

    function getUIDByEmail($email){
        $this->mongo_db->select('uid');
        $this->mongo_db->where('email', $email);
        $user = $this->mongo_db->get('users');
        return $user[0]['uid'];
    }

    function getProgramIDByEmail($email){
        $this->mongo_db->select('item_id');
        $this->mongo_db->where('email', $email);
        $user = $this->mongo_db->get('users');
        return $user[0]['item_id'];
    }

    function updateProfileImage ($img,$imgThumb,$uid){
        $data = array(
            'image_url_thumbnail' => $imgThumb,
            'image_url' => $img
        );

        //$this->mongo_db->where('uid',1);
        //return $this->mongo_db->update('users', $data);
        return $this->mongo_db->where(array('uid'=>$uid))->set(array('image_url' => $img, 'image_url_thumbnail' => $imgThumb))->update('users');
    }

    function delete_all() {
        // Reset users
        $this->mongo_db->delete_all('users');
    }

    function non_tlh_users_count() {
        $count = count($this->mongo_db->get('users'));
        $this->mongo_db->like('email', '@learninghouse.com');
        $non_tlh_count = count($this->mongo_db->get('users'));

        return $count - $non_tlh_count;
    }

    function students_on_application_count() {
        $this->mongo_db->where('progress', 'application');
        return count($this->mongo_db->get('users'));
    }

    function students_application_count($start_date = 1, $end_date=NULL) {
        $end_date = (is_null($end_date)) ? now() : $end_date;

        $this->mongo_db->where(array('progress' => 'application'));
        $this->mongo_db->where_between('created_at', $start_date, $end_date);
        $started_apps = $this->mongo_db->get('users');

        $app_count = count($started_apps);
        return $app_count;

    }

    function students_on_otr_count() {
        $this->mongo_db->where('progress', 'otr');
        return count($this->mongo_db->get('users'));
    }

    function students_on_financial_aid_count() {
        $this->mongo_db->where('progress', 'finaid');
        return count($this->mongo_db->get('users'));
    }

    function students_awaiting_approval_count() {
        $this->mongo_db->where('progress', 'complete');
        return count($this->mongo_db->get('users'));
    }

    function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, strlen($alphabet)-1);
            $pass[$i] = $alphabet[$n];
        }
        return implode($pass);
    }

    // register_user()
    // this accepts username (blank), password, confirmed password, 
    // and false for no activiation email
    function register_user($data) {
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
        $this->load->library(SITE, '', 'school_lib');
        if (!is_null($result = $this->tank_auth->create_user(
            '', $data['email'], $data['password'], false))) {   // success

            $result['site_name'] = $this->config->item('website_name', 'tank_auth');
            $result['school_name'] = $this->config->item('school_name');
            $result['support_email'] = $this->config->item('support_email');
            $result['support_phone'] = $this->config->item('support_phone');

            // Welcome email conditionals
            // SUPER hack :(
            if ($this->config->item('email_account_details', 'tank_auth')) {    // send "welcome" email
                if($data['has_stp'] && SITE == 'csp') {
                    $this->_send_email('welcome-openhouse-marketing', $data['email'], $result);
                } else if($data['has_stp']) {
                    $this->_send_email('welcome', $data['email'], $result);
                } else {
                    $this->_send_email('welcome-no-stp', $data['email'], $result);
                }

                $result['email'] = $data['email'];
                $result['password'] = $data['password'];
                unset($data['password']);
                unset($data['errors']);

                // If UID is null, set it to the Mongo object ID
                $obj_id = $this->mongo_db->insert('users', $data);
                if($obj_id && $data['uid'] == '') {
                    $this->mongo_db->where(array('_id'=>$obj_id))->set(array(
                        'uid' => SITE . '_' . $obj_id))->update('users');                  
                }

                $this->school_lib->populate_application_from_leadform($data);
                if($this->Programs_model->has_ecs($data['item_id'])) {
                    $this->create_default_messages($data['uid']);
                } else {
                    // True flag is set to notify create_default_message to send from ID 0
                    $this->create_default_messages($data['uid'], true);
                }
            }

            } else {
                $errors = $this->tank_auth->get_error_message();
                foreach ($errors as $k => $v)   {
                    echo "Lang is " . $this->lang->line($v);
                    $result['errors'][$k] = $this->lang->line($v);
                }
            }

        return $result;
    }

    function _send_email($type, $email, &$data)
    {
        $this->load->library('email');
        $this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
        $this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
        $this->email->to($email);
        $this->email->subject('Application Account Information from ' . $this->config->item('school_name'));
        $this->email->message($this->load->view('email/'.$type.'-html', $data, TRUE));
        $this->email->set_alt_message($this->load->view('email/'.$type.'-txt', $data, TRUE));
        $this->email->send();
    }

    function create_default_messages($uid, $no_ec_message = false) {
        $this->load->model("Messages_model");
        $ecs = $this->Users_model->get_ecs();

        // Build message
        $data['to'] = $uid;
        $data['type'] = 'Message';
        $data['broadcast'] = "true";
        $data['ts'] = now();

        if($no_ec_message) {
            // Message from admissions office
            $data['uid'] = '0'; // This is the ID used for a 'system message', no EC
            $data['text'] = "Thanks for your interest in ".$this->config->item('school_name').". The first thing you need to do is click on that big blue button to the right and fill out our online application. Don't worry, it's quick and easy! If you have any questions, feel free to email us at ".$this->config->item('support_email')." or call ".$this->config->item('support_phone').".";
        } else {
            // EC message
            $data['uid'] = $ecs[array_rand($ecs)]['uid'];
            $data['text'] = "Thanks for your interest in ".$this->config->item('school_name').". I'm here to help guide you through every step of the application process. The first thing you need to do is click on that big blue button to the right and fill out our online application. Don't worry, it's quick and easy! If I can help in any way, please click REPLY below (or my picture to the right) and send me a message.";
        }

        $this->Messages_model->create($data);

    }

     function students_applications($start_date = 1, $end_date=NULL, $is_trad) {
        $end_date = (is_null($end_date)) ? now() : $end_date;
        $end_date = strtotime("+1 day", $end_date);

        $this->mongo_db->where_between('created_at', $start_date, $end_date);
        if($is_trad){
            $this->mongo_db->where(array('uid' => array('$regex' => 'csp_')));
        }
        $apps = $this->mongo_db->get('users');
        $student_apps = array();
        $student_apps['total'] = 0;
        $student_apps['breakdown'] = array();
        $month = mktime(0,0,0, date('n', $start_date),1,date('Y', $start_date));
        while($month < $end_date)
        {
            $key = date('F', $month) . ' ' . date('Y', $month);
            $student_apps['breakdown'][$key] = 0;
            $month = strtotime("+1 month", $month);
        }
        foreach($apps as $app) {
            $add_app = true;
            if(!$is_trad){
                if(strpos($app['uid'], 'csp_') > -1){
                    $add_app = false;
                }
            }
            if($add_app){
                $started_date = $app['created_at'];
                $key = date('F', $started_date) . ' ' . date('Y', $started_date);
                $student_apps['breakdown'][$key]++;
                $student_apps['total']++;
            }
            
        }

        return $student_apps;
    }

    function students_on_trad_application_count() {
        $this->mongo_db->where('progress', 'app_only_app');
        return count($this->mongo_db->get('users'));
    }

    function students_on_trad_complete_count() {
        $this->mongo_db->where('progress', 'app_only_completed_img');
        return count($this->mongo_db->get('users'));
    }

}

<?php

class Messages_model extends CI_Model {
	
    function __construct(){
        $this->load->library('mongo_db');
        $this->load->helper('date');
        $this->load->model('Users_model');
        $this->load->model('Application_model');
	}

	/**********************************************************************
	*  Creates a new entry in the 'messages' collection. The entry should 
	*  include:
	*  - uid:  User id of the sender
	*  - to:   User id of the recipient
	*  - text: Content of the message
	*  - ts:   timestamp from Unix epoch
	*
	*  This should eventually validate to allow uid to only be the logged 
	*  in user or the uid of a Group the user is a spokesperson for
	**********************************************************************/
	function create($data) {
        $data = array_merge($data, array("last_activity" => now()));
		$this->mongo_db->insert('messages', $data);	
	}

    function createUser($data) {
        $this->mongo_db->insert('users', $data);
    }
    
    function show($id) {
		
	}

	function update($data) {

	}

	function delete($id) {
		$this->mongo_db->where('_id', $id);
	}

	/**********************************************************************
	*  Returns the last 20 messages by a given user id
	*  - uid: User id of the sender
	*  - skip: Number of messages to skip. (Optional)
	*  - limit: Number of messages to return (Optional)
	**********************************************************************/
	function getMessagesByUserID($id, $skip = 0, $limit = 20) {
		$this->mongo_db->where('uid', $id);
		$this->mongo_db->limit($limit);
        $this->mongo_db->offset($skip);
		$this->mongo_db->order_by(array('ts'=>'desc'));

		return $this->mongo_db->get('messages');
	}

	/**********************************************************************
	*  Returns the last 20 messages by or to a given user id
	*  - uid: User id of the sender
	*  - to:  User id of the recipient
	*  - skip: Number of messages to skip. (Optional)
    *  - limit: Number of messages to return (Optional)
    **********************************************************************/
    function getMessagesByFromUserID($id, $skip = 0, $limit = 20) {
        $this->mongo_db->or_where(array('to'=>$id, 'uid'=>$id));
        $this->mongo_db->limit($limit);
        $this->mongo_db->offset($skip);
        $this->mongo_db->order_by(array('ts'=>'desc'));
        $messages = $this->mongo_db->get('messages');
        // Convert times
        $messages = array_map(array($this, '_convertTime'), $messages);
        return array_map(array($this, '_addUserInfoToMessagesCollection'),
            $messages);

    }

    protected function _addUserInfoToMessagesCollection($value) {
        $value['user_name'] = $this->Users_model->getUserNameByID($value['uid']);
        $value['image_url'] = $this->Users_model->getImageURLByID($value['uid']);
        $value['image_url_thumbnail'] = $this->Users_model->getImageThumbnailURLByID($value['uid']);
        // Associate other values with UID
        if(isset($value['replies'])) {
            for($i=0;  $i < count($value['replies']); $i++) {
                // Grab name of person who did the reply
                $value['replies'][$i]['user_name'] = $this->Users_model->getUserNameByID(
                    $value['replies'][$i]['uid']);    
                // Grab small icon
                $value['replies'][$i]['image_url_thumbnail'] = $this->Users_model->getImageThumbnailURLByID(
                    $value['replies'][$i]['uid']);
            }
        }

        return $value;

    }

    protected function _convertTime($value) {
        if(!empty($value)) {
            // Convert ts of the message
            $value['ts'] = $this->_getRelativeTime($value['ts']);

            // Convert ts of replies
            foreach($value as $key => $v) {
                // Find the replies array
                if($key == 'replies' && count($value[$key]) > 0) {
                    // Iterate through each reply if we found some
                    foreach($v as $r => $r_v) {
                      $value[$key][$r]['ts'] = $this->_getRelativeTime($r_v['ts']);
                    }
                }
            }
        }

        return $value;
    }

    // Facebook like timestamps
    protected function _getRelativeTime($timestamp){ 
        $difference = time() - $timestamp; 
        $periods = array("sec", "min", "hour", "day", "week", 
            "month", "years", "decade"); 
        $lengths = array("60","60","24","7","4.35","12","10"); 
        $ending = "ago"; 

        if ($difference < 0) { // this was in the past 
            $difference = -$difference; 
        }        

        for($j = 0; $difference >= $lengths[$j]; $j++) {
            $difference /= $lengths[$j]; 
        }

        $difference = round($difference); 
        if($difference != 1) $periods[$j].= "s"; 
        $text = "$difference $periods[$j] $ending"; 
        return $text; 
    } 

    function getFacebookIDByID($id) {
        $this->mongo_db->select('facebook_id');
        $this->mongo_db->where('uid', $id);
        return $this->mongo_db->get('users');
    }

    function updateFacebookInfoByID($id, $fb_id, $fb_name,
        $img_url) {

            $data = array(
                'name' => $fb_name,
                'facebook_id' => $fb_id,
                'image_url' => $img_url,
                'uid' => $id
            );

            $this->mongo_db->where('uid', $id);
            return $this->mongo_db->update('users', $data);
        }

    function deleteMessagesByUserID($id){

    }

    function reply($data) {
        $uid = $data['uid'];
        $text = $data['text'];
        $mid = $data['_id'];
        $ts = $data['ts'];
        $replies = array('uid'=>$uid, 'text' => $text, 'ts' => $ts);

        //exit("Reply from user $uid to message $mid saying $text");
        $this->mongo_db->where('_id', $data['_id']);
        $this->mongo_db->set('last_activity', $ts);
        $this->mongo_db->push('replies', $replies);
        $this->mongo_db->update('messages');
    }

    function delete_all() {
        // Reset users
        $this->mongo_db->delete_all('messages');
    }

    function messages_to_ecs_count($start_date = 1, $end_date=NULL) {
    	$end_date = (is_null($end_date)) ? now() : $end_date;
        $ecs = $this->Users_model->get_ecs();

        // Build Where array
        $uids = array();

        foreach($ecs as $ec) {
            array_push($uids, $ec['uid']);
        }

        $this->mongo_db->where_in('to', $uids);
        $this->mongo_db->where_between('ts', $start_date, $end_date);
        return count($this->mongo_db->get('messages'));
    }

    function messages_from_ecs_count($start_date = 1, $end_date=NULL) {
    	$end_date = (is_null($end_date)) ? now() : $end_date;

        $ecs = $this->Users_model->get_ecs();

        // Build Where array
        $uids = array();

        foreach($ecs as $ec) {
            array_push($uids, $ec['uid']);
        }

        $this->mongo_db->where_in('uid', $uids);
        $this->mongo_db->where_ne('broadcast', 'true');
        $this->mongo_db->where_between('ts', $start_date, $end_date);
        return count($this->mongo_db->get('messages'));
    }

    function replies_to_ecs_count() {
    	$messages = $this->mongo_db->get('messages');
    	$reply_count = 0;

    	$ecs = $this->Users_model->get_ecs();
    	$ec_uids = array();

    	foreach($ecs as $ec) {
    		$ec_uids[] = $ec['uid']; 
    	}

    	foreach($messages as $message) {
    		if(isset($message['replies'])) {
	    		foreach($message['replies'] as $reply) {
	    			if(!in_array($reply['uid'], $ec_uids)) {
	    				$reply_count++;
	    			}
	    		}
	    	}
    	}

    	return $reply_count;
    }

    function replies_from_ecs_count() {

        $this->mongo_db->where_between('ts', $start_date, $end_date);
    	$messages = $this->mongo_db->get('messages');

    	$reply_count = 0;

    	$ecs = $this->Users_model->get_ecs();
    	$ec_uids = array();

    	foreach($ecs as $ec) {
    		$ec_uids[] = $ec['uid']; 
    	}

    	foreach($messages as $message) {
    		if(isset($message['replies'])) {
	    		foreach($message['replies'] as $reply) {
	    			if(in_array($reply['uid'], $ec_uids)) {
	    				$reply_count++;
	    			}
	    		}
	    	}	
    	}

    	return $reply_count;
    }


    function get_message_summary($start_date = 1, $end_date=NULL) {
       
        $end_date = strtotime("+1 day", $end_date);

        $this->mongo_db->where_between('ts', $start_date, $end_date);
        $messages = $this->mongo_db->get('messages');
    
        $ecs = $this->Users_model->get_ecs();
        $ec_uids = array();

        foreach($ecs as $ec) {
            $ec_uids[] = $ec['uid']; 
        }

        $messages_summary = array();
        foreach($messages as $message) {

            if(in_array($message['uid'], $ec_uids)){
                if(!isset($message['broadcast'])){
                    $messages_summary = $this->increment_summary($messages_summary, $message['uid'], $ec_uids, 'recieved');
                }
            }
             else {
                if(isset($message['to'])){
                    if(!isset($message['broadcast'])){
                        $messages_summary = $this->increment_summary($messages_summary, $message['uid'], $ec_uids, 'sent');
                    }
                }
            }
           
            if(isset($message['replies'])) {
                foreach($message['replies'] as $reply) {
                    if(in_array($reply['uid'], $ec_uids)) {
                        if(isset($message['broadcast'])){
                            $messages_summary = $this->increment_summary($messages_summary, $message['to'], $ec_uids, 'recieved');
                        } else {
                             $messages_summary = $this->increment_summary($messages_summary, $message['uid'], $ec_uids, 'recieved');
                        }
                    } else {
                        $messages_summary = $this->increment_summary($messages_summary, $reply['uid'], $ec_uids, 'sent');
                    }
                }
            }  
        }
        return $messages_summary;
    }

    function get_message_counts($start_date = 1, $end_date=NULL) {
        $messages_from_ecs = array();
        $messages_to_ecs = array();
        $messages_from_ecs['total'] = 0;
        $messages_to_ecs['total'] = 0;
        $end_date = strtotime("+1 day", $end_date);

        $month = mktime(0,0,0, date('n', $start_date),1,date('Y', $start_date));
        while($month < $end_date)
        {
            $key = date('F', $month) . ' ' . date('Y', $month);
            $messages_from_ecs['breakdown'][$key] = 0;
            $messages_to_ecs['breakdown'][$key] = 0;
            $month = strtotime("+1 month", $month);
        }

        
        $this->mongo_db->where_between('ts', $start_date, $end_date);
        $messages = $this->mongo_db->get('messages');


        $ecs = $this->Users_model->get_ecs();
        $ec_uids = array();

        foreach($ecs as $ec) {
            $ec_uids[] = $ec['uid']; 
        }
        $count = 0;
        foreach($messages as $message) {

            //If message is from EC and not broadcasted it is a legit message
            if(in_array($message['uid'], $ec_uids)){
                if(!isset($message['broadcast'])){
                    $messages_from_ecs = $this->increment_counts($messages_from_ecs, $message['ts']);
                }
            } else {
                //If message is to an EC 
                if(isset($message['to'])){
                    if(in_array($message['to'], $ec_uids)){
                        $messages_to_ecs = $this->increment_counts($messages_to_ecs, $message['ts']);
                    }
                }
            }

            
            if(isset($message['replies'])) {
                foreach($message['replies'] as $reply) {

                    if(in_array($reply['uid'], $ec_uids)) {
                        //If reply is from an EC
                        // echo  json_encode($reply).'<br>';
                         //echo($message['uid'].'<br><br>');
                        $messages_from_ecs = $this->increment_counts($messages_from_ecs, $reply['ts']);
                    } else {
                        //If reply is to an EC

                        $messages_to_ecs = $this->increment_counts($messages_to_ecs, $reply['ts']);
                    }
                }
            }  
        }
        $messages_collection['messages_from_ecs'] = $messages_from_ecs;
        $messages_collection['messages_to_ecs'] = $messages_to_ecs;
        return $messages_collection;

    }

    function increment_summary($collection, $uid, $ec_uids, $type)
    {
        $sent = 0;
        $recieved = 0;
        if($type == 'sent'){
            $sent = 1;
        }
         if($type == 'recieved'){
            $recieved = 1;
        }
        if(!in_array($uid, $ec_uids)){
            if(!isset($collection[$uid])){
                $complete = 'no';
                if ($this->Application_model->isComplete($uid) == 'true'){
                    $complete = 'yes';
                }
                $summary = array(
                    "name"=>$this->Users_model->getUserNameByID($uid), 
                    "messages"=>
                    array(
                        "sent"=>$sent, 
                        "recieved"=>$recieved),
                    "app_complete" => $complete);
                $collection[$uid] = $summary;
            } else {
                $collection[$uid]['messages'][$type]++;
            }
        }

        return $collection;
    }

    function increment_counts($collection, $ts){
        $key = date('F', $ts) . ' ' . date('Y', $ts);
        if(isset($collection['breakdown'][$key])){
            $collection['breakdown'][$key]++;
            $collection['total']++;
        }
        
        return $collection;
    }
 }

<?php

class Application_model extends CI_Model {
	
    function __construct(){
        $this->load->library('mongo_db');
        $this->load->library('encrypt');
        $this->load->helper('date');
        $this->grail = $this->load->database('grail', true);
	$this->key = 'jHXvRyZnmeB8cTJHQ@^9hkq$p#ak!t@SA5qzyD@n%Zv&TKsv#Z@rYnF%Nxz3keEh*r7t@63WZ%d7Tt9x';
	}
	public function rebuild_all_pdf_applications()
	{
        $this->load->library('dompdf');
        $this->mongo_db->switch_db('gwc');
        $this->mongo_db->where('pdf_filename','failed');
        $failed_apps = $this->mongo_db->get('applications');
        if (empty($failed_apps)) {
        	return 'no failed apps';
        }
        $status = array();
        foreach ($failed_apps as $app_data) {
        	$uid = $app_data['uid'];
	        $dompdf = new DOMPDF();
	        $dompdf->load_html($this->load->view('alt_export_pdf', array('post' => $app_data), TRUE));
	        $dompdf->render();
	        $pdf_filename = time() . '_' . $uid . '.pdf';
	        $fp = @fopen("../pdf/$pdf_filename", 'w');
	        if ($fp != false) {
	            fwrite($fp, $dompdf->output(0));
	            fclose($fp);
	        }else{
	            unset($fp);
	            $pdf_filename = 'failed';
	            $status[]='failed';
	        }
	        $this->mongo_db->switch_db('gwc');
	        $this->mongo_db->where('uid', $uid);
	        $this->mongo_db->set('pdf_filename', $pdf_filename);
	        $this->mongo_db->update('applications');
	        unset($dompdf);
	    }
	    if (in_array('failed', $status)) {
			$this->load->library('email');
			$this->email->from('no_reply@learninghouse.com', 'student portal');
			$this->email->to($this->config->item('rebuild_pdf_email'));
			$this->email->subject('Student Portal Error');
			$this->email->message('Student portal tried to REBUILD ALL FAILED PDFs but the PDF dir is not writtable. Please check PDF permissions. -'.$_SERVER['HTTP_HOST']);  
			$this->email->send();
			return 'failed';
	    }else{
	    	return 'success';
	    }
	}

	public function rebuild_pdf_application($uid)
	{
        
        $this->load->library('dompdf');
        $this->mongo_db->switch_db('gwc');
        $this->mongo_db->where('uid', $uid);
        $app_data = $this->mongo_db->get('applications');
        $dompdf = new DOMPDF();
        $dompdf->load_html($this->load->view('alt_export_pdf', array('post' => $app_data[0]), TRUE));
        $dompdf->render();
        $pdf_filename = time() . '_' . $uid . '.pdf';
        $fp = @fopen("../pdf/$pdf_filename", 'w');
        if ($fp != false) {
            fwrite($fp, $dompdf->output(0));
            fclose($fp);
        
	        $this->mongo_db->switch_db('gwc');
	        $this->mongo_db->where('uid', $uid);
	        $this->mongo_db->set('pdf_filename', $pdf_filename);
	        $this->mongo_db->update('applications');
            return 'success';
        }else{
            $this->load->library('email');

            $this->email->from('no_reply@learninghouse.com', 'student portal');
			$this->email->to($this->config->item('rebuild_pdf_email'));
            $this->email->subject('Student Portal Error');
            $this->email->message('Student portal tried to REBUILD a pdf but the PDF dir is not writtable. Please check PDF permissions. -'.$_SERVER['HTTP_HOST']);  

            $this->email->send();
            $pdf_filename = 'failed';
        }
        
        $this->mongo_db->switch_db('gwc');
        $this->mongo_db->where('uid', $uid);
        $this->mongo_db->set('pdf_filename', $pdf_filename);
        $this->mongo_db->update('applications');
        return 'failed';
	}

	public function update_application($uid){

	}
	/*********************************************************************
	* This function resets the application process for the user with 
	* user id = $id. This is for demo purposes.
	**********************************************************************/
	function reset($id) {
		$this->mongo_db->delete_all('applications');
	}

	/*********************************************************************
	* This function gets the status of the application. 
	* Returns 'true' if complete, 'false' if not
	**********************************************************************/
	function getStatus($id) {
		$this->mongo_db->where('uid', $id);
    	$app = end($this->mongo_db->get('applications'));
    	return (isset($app['complete'])) ? $app['complete'] : 'false';
	}

	/*********************************************************************
	* This function returns the progress of the application. Result is a 
	* JSON string that looks like "'id':{oid}, 'completedFields':'num', 
	* 'totalFields':'num'}"
	**********************************************************************/
	function getProgress($user) {
		$this->mongo_db->select(array('completedFields', 'totalFields'));
		$this->mongo_db->where('uid', $user);
		$progress = end($this->mongo_db->get('applications'));

		return $progress;
	}

	function getPdfList($uids = false) {
		// Return a list of PDF filenames from an input array of uids. Used for PP Export.
		if (!is_array($uids)) return false;
		$filenames = array();
		foreach ($uids as $uid) {
			$this->mongo_db->where('uid', $uid);
			if ($data = $this->mongo_db->get('applications')) $filenames[] = $data[0]['pdf_filename'];
		}
		return $filenames;
	}

        function get_ssn_field_name() {
            // Return ssn_field_name for current site
            return $this->grail->query("SELECT ssn_field_name FROM portals WHERE abbrev = ?", array(SITE))->row()->ssn_field_name;
        }

	function add($user, $data) {
        if(isset($data['started_at'])){
                $data['last_modified'] = now();
        }
        
        $ssnName = $this->get_ssn_field_name();
        if(isset($data[$ssnName])) {
                $data[$ssnName] = $this->encrypt->encode($data[$ssnName], $this->key . $user);
        }

        if(isset($user)) {
            $apps = $this->get($user);

            if(empty($apps)) {
                $this->mongo_db->insert('applications', $data);
            } else {
                $this->mongo_db->update('applications', $data);
            }
        }
	}

	function get($user) {
		if(is_array($user)){
			$this->mongo_db->where_in('uid', $user);
		}
		else {
			$this->mongo_db->where('uid', $user);
		}

		$apps = $this->mongo_db->get('applications');
		$ssnName = $this->get_ssn_field_name();

		foreach($apps as $key=>$value) {
			if(isset($apps[$key][$ssnName])){
				$apps[$key][$ssnName] = $this->encrypt->decode($apps[$key][$ssnName], $this->key . $apps[$key]['uid']);
			}
		}
		return $apps;
	}
	
	function delete($user) {
		$this->mongo_db->where('uid', $user);
		$this->mongo_db->delete('applications');
	}

	function isComplete($user) {
		$this->mongo_db->where('uid', $user);
    	$app = end($this->mongo_db->get('applications'));
    	return (isset($app['complete'])) ? $app['complete'] : 'false';
	}

    function getUserContactInfoByID($id) {
        $this->mongo_db->select('txtPermAdd');
        $this->mongo_db->select('txtPermCity');
        $this->mongo_db->select('txtPhone');
        $this->mongo_db->select('ddlpermstate');
        $this->mongo_db->select('txtPermZip');
        $this->mongo_db->where('uid', $id);
        $user = $this->mongo_db->get('applications');
        if(isset($user[0]) && is_array($user)) {
            return $user[0];
        } else {
            return array();
        }
    }

	function export($uids, $redo, $did, $alt=false) {
		$applications = $this->Application_model->get($uids);

        if(is_array($uids)) {
            foreach($uids as $uid) {
                $this->Application_model->set_downloaded($uid);
            }
        } else {
            $this->Application_model->set_downloaded($uids);
        }

		$data['ts'] = now();
		$data['uids'] = $uids;
		$data['did'] = $did;
		
		if($redo != "true" && !$alt) {
			$this->mongo_db->insert('exports', $data);
		}

		return $applications;
	}

	function getExportHistory() {
		$exports = $this->mongo_db->get('exports');

		foreach($exports as $key=>$value) {
			$id = $exports[$key]['_id']->{'$id'};
			$exports[$key]['_id'] = $id;
		}

		return $exports;
	}

	function set_downloaded($user) {
		$this->mongo_db->where('uid', $user);
		$this->mongo_db->set('downloaded', 'true');
		$this->mongo_db->update('applications');
	}

	function unset_downloaded($user) {
		$this->mongo_db->where('uid', $user);
		$this->mongo_db->set('downloaded', 'false');
		$this->mongo_db->update('applications');
	}

	function getCompleted() {
		$this->mongo_db->select(array('uid', 'downloaded'));
		$this->mongo_db->where('complete', 'true');

		$apps = $this->mongo_db->get('applications');

		foreach($apps as $key=>$value) {
			$id = $apps[$key]['_id']->{'$id'};
			$apps[$key]['_id'] = $id;
		}

		return $apps;
	}

	function completed_count($start_date = 1, $end_date=NULL) {
		$end_date = (is_null($end_date)) ? now() : $end_date;

		$this->mongo_db->where('complete', 'true');
		$apps = $this->mongo_db->get('applications');

		$count = 0;

		foreach($apps as $app) {
			$completed_date = strtotime($app['app_complete_date']);
			if($completed_date >= $start_date && $completed_date < $end_date) {
				$count++;
			}
		}

		return $count;
	}

	function started_count($start_date = 1, $end_date=NULL) {
		$end_date = (is_null($end_date)) ? now() : $end_date;

		$this->mongo_db->where(array('complete' => 'false'));
		$this->mongo_db->where_between('started_at', $start_date, $end_date);
		$started_apps = $this->mongo_db->get('applications');

		$app_count = count($started_apps) + $this->completed_count($start_date, $end_date);
		return $app_count;

	}

	function abandoned_count($start_date = 1, $end_date=NULL) {
		$end_date = (is_null($end_date)) ? now() : $end_date;

		$this->mongo_db->where(array('complete' => 'false'));
		$this->mongo_db->where_between('started_at', $start_date, $end_date);
		$started_apps = $this->mongo_db->get('applications');

		$app_count = count($started_apps);
		return $app_count;

	}
	function application_count() {
		return $this->mongo_db->count('applications');
	}

	function completed_apps($start_date = 1, $end_date=NULL, $is_trad) {
		$end_date = (is_null($end_date)) ? now() : $end_date;
		$end_date = strtotime("+1 day", $end_date);
		$this->mongo_db->where(array('complete' => 'true'));
		if($is_trad){
			$this->mongo_db->where(array('AppType' => 'TRAD'));
		}
		$apps = $this->mongo_db->get('applications');

		$completed_apps = array();
		$completed_apps['total'] = 0;
		$completed_apps['breakdown'] = array();
		$month = mktime(0,0,0, date('n', $start_date),1,date('Y', $start_date));
		while($month < $end_date)
		{
			$key = date('F', $month) . ' ' . date('Y', $month);
			$completed_apps['breakdown'][$key] = 0;
		    $month = strtotime("+1 month", $month);
		}

		foreach($apps as $app) {
			$add_app = true;
			if(!$is_trad){
				if(isset($app['AppType']) && $app['AppType'] == 'TRAD')
				{
					$add_app = false;
				}
			}
			if($add_app){
				$completed_date = strtotime($app['app_complete_date']);
				if($completed_date >= $start_date && $completed_date < $end_date) {
					$key = date('F', $completed_date) . ' ' . date('Y', $completed_date);
					$completed_apps['breakdown'][$key]++;
					$completed_apps['total']++;
				}
			}
		}
		return $completed_apps;
	}

	function started_apps($start_date = 1, $end_date=NULL, $completed_apps, $is_trad) {
		$end_date = (is_null($end_date)) ? now() : $end_date;
		$end_date = strtotime("+1 day", $end_date);

		$this->mongo_db->where(array('complete' => 'false'));
		$this->mongo_db->where_between('started_at', $start_date, $end_date);
		if($is_trad){
			$this->mongo_db->where(array('uid' => array('$regex' => 'csp_')));
		}
		$apps = $this->mongo_db->get('applications');

		$started_apps = array();
		$started_apps['total'] = 0;
		$started_apps['breakdown'] = array();
		$month = mktime(0,0,0, date('n', $start_date),1,date('Y', $start_date));
		
		while($month < $end_date)
		{
			$key = date('F', $month) . ' ' . date('Y', $month);
			
			if(isset($completed_apps['breakdown'][$key])) {
				$started_apps['breakdown'][$key] = $completed_apps['breakdown'][$key];
				$started_apps['total'] += $completed_apps['breakdown'][$key];
			} else {
				$started_apps['breakdown'][$key] = 0;
			}
		    $month = strtotime("+1 month", $month);

		}
		foreach($apps as $app){
			$add_app = true;
			if(!$is_trad){
				if(strpos($app['uid'], 'csp_') > -1){
					$add_app = false;
				}
			}
			if($add_app){
				$started_date = $app['started_at'];
				$key = date('F', $started_date) . ' ' . date('Y', $started_date);

				$started_apps['breakdown'][$key]++;
				$started_apps['total']++;
			}
		}
		return $started_apps;
	}

	function  abandoned_apps($start_date = 1, $end_date=NULL, $is_trad) {
		$end_date = (is_null($end_date)) ? now() : $end_date;
		$end_date = strtotime("+1 day", $end_date);

		$this->mongo_db->where(array('complete' => 'false'));
		$this->mongo_db->where_between('started_at', $start_date, $end_date);
		if($is_trad){
			$this->mongo_db->where(array('uid' => array('$regex' => 'csp_')));
		}
		$apps = $this->mongo_db->get('applications');

		$abandoned_apps = array();
		$abandoned_apps['total'] = 0;
		$abandoned_apps['breakdown'] = array();
		$month = mktime(0,0,0, date('n', $start_date),1,date('Y', $start_date));
		while($month < $end_date)
		{
			$key = date('F', $month) . ' ' . date('Y', $month);
			$abandoned_apps['breakdown'][$key] = 0;
		    $month = strtotime("+1 month", $month);
		}
		foreach($apps as $app){
			$add_app = true;
			if(!$is_trad){
				if(strpos($app['uid'], 'csp_') > -1){
					$add_app = false;
				}
			}
			if($add_app){
				$started_date = $app['started_at'];
				$key = date('F', $started_date) . ' ' . date('Y', $started_date);
				$abandoned_apps['breakdown'][$key]++;
				$abandoned_apps['total']++;
			}
		}
		return $abandoned_apps;

	}

}

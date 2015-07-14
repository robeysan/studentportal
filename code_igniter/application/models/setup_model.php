<?php

class Setup_model extends CI_Model {
	
    function __construct()
    {
        
        if (ENVIRONMENT=='prod') {
            die('RESTRICTED! No setup scripts allowed here');
        }
        $this->load->library('mongo_db');
        $this->load->helper('date');
        $this->grail=$this->load->database('grail',true);
        $this->load->library('studentportal');
	}

    public function get_portal_address($portal)
    {
        $eid = $this->studentportal->get_portal_grail_eid($portal);

        $this->grail->select('portal_address,client_entity_id');
        $this->grail->where('client_entity_id',$eid);
        $this->grail->where('portal_type_id','8');
        $portal_address = $this->grail->get('portals')->row_array();
        
        return $portal_address['portal_address'];
    }

    public function update_portal_address($portal)
    {
        $eid = $this->studentportal->get_portal_grail_eid($portal);
        $prep = $portal.'.'.ENVIRONMENT.'.learninghouse.com';
        $new_portal_address = array('portal_address'=>$prep);
        $this->grail->where('client_entity_id',$eid);
        $this->grail->where('portal_type_id','8');
        $this->grail->update('portals',$new_portal_address);
        
        return ($this->grail->affected_rows()!=1)?false:true;
    }

    public function clear_applications($portals)
    {
        foreach ($portals as $portal) {
            $data_cleared = $this->mongo_db->switch_db($portal);
            $data_cleared = $this->mongo_db->delete_all('applications');

            if (count( $this->mongo_db->get('applications') ) > 0) {
                $data_cleared = false;
            }
        }
        return ($data_cleared===false)?'false':'true';
    }

    public function clear_messages($portals)
    {
        foreach ($portals as $portal) {
            $data_cleared = $this->mongo_db->switch_db($portal);
            $data_cleared = $this->mongo_db->delete_all('messages');

            if (count( $this->mongo_db->get('messages') ) > 0) {
                $data_cleared = false;
            }
        }
        return ($data_cleared===false)?'false':'true';
    }

	public function clear_users($portals)
	{
		$this->clear_auth_users();
		$this->clear_auth_user_profiles();
		foreach ($portals as $portal) {
			$data_cleared = $this->mongo_db->switch_db($portal);
			$data_cleared = $this->mongo_db->delete_all('users');

			if (count( $this->mongo_db->get('users') ) > 0) {
				$data_cleared = false;
			}
		}
		$this->add_default_ecs($portals);

		return ($data_cleared===false)?'false':'true';
	}

    public function clear_exports($portals)
    {
        $this->clear_auth_users();
        $this->clear_auth_user_profiles();
        foreach ($portals as $portal) {
            $data_cleared = $this->mongo_db->switch_db($portal);
            $data_cleared = $this->mongo_db->delete_all('exports');

            if (count( $this->mongo_db->get('exports') ) > 0) {
                $data_cleared = false;
            }
        }

        return ($data_cleared===false)?'false':'true';
    }

	public function clear_auth_users()
	{
		$this->load->database();
		$this->db->empty_table('users');
		if($this->db->count_all('users') > 0){
			return false;
		}
		return;
	}

	public function clear_auth_user_profiles()
	{
		$this->load->database();
		$this->db->empty_table('user_profiles');
		if($this->db->count_all('user_profiles') > 0){
			return false;
		}
		return;
	}

	public function add_default_ecs( $portals = array('csp','aurora') )
	{
        $csp_primary_ec     = array( "uid" => "1", "entity_id" => "5457", "type" => "EC - Primary", "first_name" => "Crystal", "last_name" => "Laureano", "title" => "Admissions Counselor", "email" => "no-reply@learninghouse.com", "phone" => "", "image_url" => "/img/user_profiles/1.jpg", "image_url_thumbnail" => "/img/user_profiles/1_thumb.jpg", "facebook_id" => "" );
		$aurora_primary_ec 	= array( "uid" => "2", "entity_id" => "11620", "type" => "EC - Primary", "first_name" => "Kelly", "last_name" => "Fereday", "title" => "Admissions Counselor", "email" => "no-reply@learninghouse.com", "phone" => "", "image_url" => "/img/user_profiles/kfereday.jpg", "image_url_thumbnail" => "/img/user_profiles/kfereday_thumb.jpg", "facebook_id" => "" );
        $uof_primary_ec     = array( "uid" => "2", "entity_id" => "11620", "type" => "EC - Primary", "first_name" => "Kelly", "last_name" => "Fereday", "title" => "Admissions Counselor", "email" => "no-reply@learninghouse.com", "phone" => "", "image_url" => "/img/user_profiles/kfereday.jpg", "image_url_thumbnail" => "/img/user_profiles/kfereday_thumb.jpg", "facebook_id" => "" );


		$csp_secondary_ec	= array( "uid" => "2", "entity_id" => "8987", "type" => "EC", "first_name" => "Stephanie", "last_name" => "Rittenhouse", "title" => "Admissions Counselor", "email" => "no-reply@learninghouse.com", "phone" => "", "image_url" => "/img/user_profiles/2.jpg", "image_url_thumbnail" => "/img/user_profiles/2_thumb.jpg", "facebook_id" => "" );
		foreach ($portals as $portal) {
            if ($portal == 'aurora') {
                $this->mongo_db->switch_db($portal);
                $this->mongo_db->insert('users',$aurora_primary_ec);
            }else if($portal == 'csp'){
                $this->mongo_db->switch_db($portal);
                $this->mongo_db->insert('users',$csp_primary_ec);
                $this->mongo_db->insert('users',$csp_secondary_ec);
            }elseif ($portal == 'uof') {
                $this->mongo_db->switch_db($portal);
                $this->mongo_db->insert('users',$uof_primary_ec);
            }
		}
	}

	public function update_ec_email($portal,$ec_uid,$new_email)
	{
		$this->mongo_db->switch_db($portal);
		$this->mongo_db->where(array('uid' => $ec_uid));
		$data = array('email' => $new_email);
        $this->mongo_db->set($data)->update('users');
        return true;
	}

	public function get_ecs( $portals = '' )
	{
        if ($portals == '') {
            $portals = $this->studentportal->get_portal_names();
        }
        $ecs = array();
        foreach ($portals as $portal) {
			$this->mongo_db->switch_db($portal);
        	$this->mongo_db->like('type', 'EC');
        	$portals_ecs[$portal] = $this->mongo_db->get('users');
        }
        foreach ($portals_ecs as $key => $value) {
        	foreach ($value as $ec) {
        		$all_ecs[]=array_merge($ec,array('portal'=>$key));
        	}
        }
        return $all_ecs;
    }

    public function get_primary_ec() {
        $this->mongo_db->where('type', 'EC - Primary');
        $ecs = $this->mongo_db->get('users');

        return $ecs[0];
    }

    //elp_1_actual_dsn
    //elp_items
    public function compare_elp_items($portal='')
    {
        $eid = $this->studentportal->get_portal_elp_id($portal);
        $this->elp=$this->load->database('elp',true);
        
        //Results from this environment
        $this->elp->select('item_id, active, type, parent_item_id,name, custom, processor');
        $this->elp->where('parent_item_id',$eid);
        $elp_items = $this->elp->get('elp_items')->result_array();
        $this->elp->close();
        //Results from Production
        $elp_actual = $this->load->database($this->studentportal->elp_1_actual_dsn,true);
        $elp_actual->select('item_id, active, type, parent_item_id,name, custom, processor');
        $elp_actual->where('parent_item_id',$eid);
        $elp_items_actual = $elp_actual->get('elp_items')->result_array();
        $elp_actual->close();

        $compare = $this->compare($elp_items,$elp_items_actual);
        return $compare;
    }

    //client_programs_to_applications
    public function compare_grail_cpa()
    {
        
        //Results from this environment
        $grail_cpa_dev = $this->grail->get('client_programs_to_applications')->result_array();
        $this->grail->close();
        //Results from Production
        $grail_actual = $this->load->database($this->studentportal->grail_actual_dsn,true);
        $grail_cpa_actual = $grail_actual->get('client_programs_to_applications')->result_array();

        $compare = $this->compare($grail_cpa_dev,$grail_cpa_actual);
        return $compare;
    }

    //client_programs_services
    public function compare_grail_cps()
    {
        
        //Results from this environment
        $grail_cps_dev = $this->grail->get('client_programs_services')->result_array();
        $this->grail->close();
        //Results from Production
        $grail_actual = $this->load->database($this->studentportal->grail_actual_dsn,true);
        $grail_cps_actual = $grail_actual->get('client_programs_services')->result_array();

        $compare = $this->compare($grail_cps_dev,$grail_cps_actual);
        return $compare;
    }

    //client_programs
    public function compare_grail_cp($portal='')
    {
    	$eid = $this->studentportal->get_portal_grail_eid($portal);
    	
    	//Results from this environment
        $this->grail->select('client_program_id, client_entity_id, program_name, program_type, status');
    	$this->grail->where('client_entity_id',$eid);
    	$this->grail->where('status','Active');
    	$grail_cp_dev = $this->grail->get('client_programs')->result_array();
    	$this->grail->close();
    	//Results from Production
    	$grail_actual = $this->load->database($this->studentportal->grail_actual_dsn,true);
        $grail_actual->select('client_program_id, client_entity_id, program_name, program_type, status');
    	$grail_actual->where('client_entity_id',$eid);
    	$grail_actual->where('status','Active');
    	$grail_cp_actual = $grail_actual->get('client_programs')->result_array();

    	$compare = $this->compare($grail_cp_dev,$grail_cp_actual);
    	return $compare;
    }

    public function compare($array1=array(),$array2=array())
    {
    	// $array1 = array(
    	// 	array('id'=>1,'name'=>'edc','email'=>'asdf@assssdf.com'),
    	// 	array('id'=>2,'name'=>'toccm','email'=>'asdf@asddddf.com'),
    	// 	array('id'=>3,'name'=>'bill','email'=>'asdf@asdfff.com')
    	// 	);
    	// $array2 = array(
    	// 	array('id'=>1,'name'=>'rob','email'=>'asdf@assssdf.com'),
    	// 	array('id'=>2,'name'=>'tom','email'=>'asdf@asddddf.com'),
    	// 	array('id'=>3,'name'=>'bill','email'=>'asdf@asdfff.com')
    	// 	);
    	$match=FALSE;
    	$b2=$array2;
    	foreach ($array1 as $a1 => $val) {

    		foreach ($array2 as $a2 => $value) {
    			if (count(array_diff($val, $value))==0) {
    				$match=TRUE;
    				unset($b2[$a2]);
    			}
    		}
    		if ($match==TRUE) {
    			unset($array1[$a1]);
    		}
    		$match=FALSE;

    	}
    	return array('dev_diff'=>$array1, 'prod_diff'=>$b2);
    }
}

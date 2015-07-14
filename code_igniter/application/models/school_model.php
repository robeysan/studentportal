<?php

class School_model extends CI_Model {
	
    function __construct(){
        $this->load->library('mongo_db');
	}

	function get_schools_state($state)
	{
		$this->mongo_db->select(array('name','state','ceeb_code'));
		$this->mongo_db->where(array('state'=>$state));
		$this->mongo_db->order_by(array('name' => 'ASC'));
		$state_ceebs = $this->mongo_db->get('schools');

		return $state_ceebs;
	}

	function get_names($name) {
		$this->mongo_db->select(array('name'));
		$this->mongo_db->like('name', $name);
		$schools = $this->mongo_db->get('schools');

		$names = array();

		foreach($schools as $school) {
			array_push($names, $school['name']);
		}

		return $names;
	}

	function get_names_append_state($name) {
		$this->mongo_db->select(array('name','state'));
		$this->mongo_db->like('name', $name);
		$schools = $this->mongo_db->get('schools');

		$names = array();

		foreach($schools as $school) {
			array_push($names, $school['name'].' - '.$school['state']);
		}

		return $names;
	}

	function get_ceeb($name,$state='') {
		if ($state!='') {
			$this->mongo_db->where(array('state' => $state));
		}
		$this->mongo_db->select(array('ceeb_code'));
		$this->mongo_db->where(array('name' => $name));
		$schools = $this->mongo_db->get('schools');

		// Only return a code if we had a unique match
		return $schools;
		if(count($schools) == 1) {
			return $schools[0]['ceeb_code'];
		} else {
			return '';
		}
	}

	function get_city($name) {
		$this->mongo_db->select(array('city'));
		$this->mongo_db->like('name', $name);
		$schools = $this->mongo_db->get('schools');

		// Only return a code if we had a unique match
		if(count($schools) == 1) {
			return $schools[0]['city'];
		} else {
			return '';
		}
	}
}
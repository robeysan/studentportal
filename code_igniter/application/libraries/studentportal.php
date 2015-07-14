<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class StudentPortal {

	public $portals = array(
						'uof' => array('grail'=>'10570','elp'=>'2301'),
						'csp' => array('grail'=>'7325','elp'=>'1541'),
						'aurora' => array('grail'=>'8470','elp'=>'2065')
						);

	public $grail_actual_dsn = 'mysql://dev_admin:R3volution!@tlhlou2db00.learninghouse.com/grail';
	public $elp_1_actual_dsn = 'mysql://root:@Wickedness09@mkproductiondb/elp_1';
	
	public function get_portal_grail_eid($portal)
	{
		return $this->portals[$portal]['grail'];
	}

	public function get_portal_elp_id($portal)
	{
		return $this->portals[$portal]['elp'];
	}

	public function get_portal_names()
	{
		$portal_names = array();
		foreach ($this->portals as $name => $ids) {
			$portal_names[] = $name;
		}
		return $portal_names;
	}

}
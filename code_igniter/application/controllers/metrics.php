<?php

class Metrics extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('America/New_York');

		$this->load->model('Application_model');
		$this->load->model('Users_model');
		$this->load->model('Messages_model');
		$this->load->model('School_model');
		$this->load->library('session');
		$this->load->library('tank_auth');
		$this->load->library('email');
		$this->load->library(SITE, '', 'school_lib');
		$this->load->helper('date');

		force_ssl();
	}

	function index() {
	}

    /* Report functions. These need to move to REST later */
    function applications_completed_count() {
    	echo $this->Application_model->completed_count();
    	exit;
    }

    function applications_started_count() {
    	echo $this->Application_model->started_count();
    	exit;
    }

    function applications_count() {
    	echo $this->Application_model->application_count();
    	exit;
    }

    function non_tlh_users_count() {
    	echo $this->Users_model->non_tlh_users_count();
    	exit;
    }

    function messages_to_ecs_count() {
    	echo $this->Messages_model->messages_to_ecs_count();
    	exit;
    }

    function replies_to_ecs_count() {
    	echo $this->Messages_model->replies_to_ecs_count();
    	exit;
    }

    function replies_from_ecs_count() {
    	echo $this->Messages_model->replies_from_ecs_count();
    	exit;
    }

    function messages_from_ecs_count() {
    	echo $this->Messages_model->messages_from_ecs_count();
    	exit;
    }

    function students_on_application_count() {
    	echo $this->Users_model->students_on_application_count();
    	exit;
    }

    function students_on_otr_count() {
    	echo $this->Users_model->students_on_otr_count();
    	exit;
    }

    function students_on_financial_aid_count() {
    	echo $this->Users_model->students_on_financial_aid_count();
    	exit;
    }

    function students_awaiting_approval_count() {
    	echo $this->Users_model->students_awaiting_approval_count();
    	exit;
    }

    function students_on_trad_application_count() {
        echo $this->Users_model->students_on_trad_application_count();
        exit;
    }

     function students_on_trad_complete_count() {
        echo $this->Users_model->students_on_trad_complete_count();
        exit;
    }

    function monthly_metrics() {
    	$args['messages_to_ecs'][3] = $this->Messages_model->messages_to_ecs_count(mktime(0,0,0,3,1,2012), mktime(0,0,0,4,1,2012));
    	$args['messages_to_ecs'][4] = $this->Messages_model->messages_to_ecs_count(mktime(0,0,0,4,1,2012), mktime(0,0,0,5,1,2012));
    	$args['messages_to_ecs'][5] = $this->Messages_model->messages_to_ecs_count(mktime(0,0,0,5,1,2012), mktime(0,0,0,6,1,2012));
    	$args['messages_to_ecs'][6] = $this->Messages_model->messages_to_ecs_count(mktime(0,0,0,6,1,2012), mktime(0,0,0,7,1,2012));
    	$args['messages_to_ecs'][7] = $this->Messages_model->messages_to_ecs_count(mktime(0,0,0,7,1,2012), mktime(0,0,0,8,1,2012));
    	$args['messages_to_ecs'][8] = $this->Messages_model->messages_to_ecs_count(mktime(0,0,0,8,1,2012), mktime(0,0,0,9,1,2012));
    	$args['messages_to_ecs'][9] = $this->Messages_model->messages_to_ecs_count(mktime(0,0,0,9,1,2012), mktime(0,0,0,10,1,2012));
    	$args['messages_to_ecs'][10] = $this->Messages_model->messages_to_ecs_count(mktime(0,0,0,10,1,2012), mktime(0,0,0,11,1,2012));
    	$args['messages_to_ecs'][11] = $this->Messages_model->messages_to_ecs_count(mktime(0,0,0,11,1,2012), mktime(0,0,0,12,1,2012));
    	$args['messages_to_ecs'][12] = $this->Messages_model->messages_to_ecs_count(mktime(0,0,0,12,1,2012), mktime(0,0,0,1,1,2013));

    	$args['messages_from_ecs'][3] = $this->Messages_model->messages_from_ecs_count(mktime(0,0,0,3,1,2012), mktime(0,0,0,4,1,2012));
    	$args['messages_from_ecs'][4] = $this->Messages_model->messages_from_ecs_count(mktime(0,0,0,4,1,2012), mktime(0,0,0,5,1,2012));
    	$args['messages_from_ecs'][5] = $this->Messages_model->messages_from_ecs_count(mktime(0,0,0,5,1,2012), mktime(0,0,0,6,1,2012));
    	$args['messages_from_ecs'][6] = $this->Messages_model->messages_from_ecs_count(mktime(0,0,0,6,1,2012), mktime(0,0,0,7,1,2012));
    	$args['messages_from_ecs'][7] = $this->Messages_model->messages_from_ecs_count(mktime(0,0,0,7,1,2012), mktime(0,0,0,8,1,2012));
    	$args['messages_from_ecs'][8] = $this->Messages_model->messages_from_ecs_count(mktime(0,0,0,8,1,2012), mktime(0,0,0,9,1,2012));
    	$args['messages_from_ecs'][9] = $this->Messages_model->messages_from_ecs_count(mktime(0,0,0,9,1,2012), mktime(0,0,0,10,1,2012));
    	$args['messages_from_ecs'][10] = $this->Messages_model->messages_from_ecs_count(mktime(0,0,0,10,1,2012), mktime(0,0,0,11,1,2012));
    	$args['messages_from_ecs'][11] = $this->Messages_model->messages_from_ecs_count(mktime(0,0,0,11,1,2012), mktime(0,0,0,12,1,2012));
    	$args['messages_from_ecs'][12] = $this->Messages_model->messages_from_ecs_count(mktime(0,0,0,12,1,2012), mktime(0,0,0,1,1,2013));

    	$args['applications_started'][3] = $this->Application_model->started_count(mktime(0,0,0,3,1,2012), mktime(0,0,0,4,1,2012));
    	$args['applications_started'][4] = $this->Application_model->started_count(mktime(0,0,0,4,1,2012), mktime(0,0,0,5,1,2012));
    	$args['applications_started'][5] = $this->Application_model->started_count(mktime(0,0,0,5,1,2012), mktime(0,0,0,6,1,2012));
    	$args['applications_started'][6] = $this->Application_model->started_count(mktime(0,0,0,6,1,2012), mktime(0,0,0,7,1,2012));
    	$args['applications_started'][7] = $this->Application_model->started_count(mktime(0,0,0,7,1,2012), mktime(0,0,0,8,1,2012));
    	$args['applications_started'][8] = $this->Application_model->started_count(mktime(0,0,0,8,1,2012), mktime(0,0,0,9,1,2012));
    	$args['applications_started'][9] = $this->Application_model->started_count(mktime(0,0,0,9,1,2012), mktime(0,0,0,10,1,2012));
    	$args['applications_started'][10] = $this->Application_model->started_count(mktime(0,0,0,10,1,2012), mktime(0,0,0,11,1,2012));
    	$args['applications_started'][11] = $this->Application_model->started_count(mktime(0,0,0,11,1,2012), mktime(0,0,0,12,1,2012));
    	$args['applications_started'][12] = $this->Application_model->started_count(mktime(0,0,0,12,1,2012), mktime(0,0,0,1,1,2013));

    	$args['applications_completed'][3] = $this->Application_model->completed_count(mktime(0,0,0,3,1,2012), mktime(0,0,0,4,1,2012));
    	$args['applications_completed'][4] = $this->Application_model->completed_count(mktime(0,0,0,4,1,2012), mktime(0,0,0,5,1,2012));
    	$args['applications_completed'][5] = $this->Application_model->completed_count(mktime(0,0,0,5,1,2012), mktime(0,0,0,6,1,2012));
    	$args['applications_completed'][6] = $this->Application_model->completed_count(mktime(0,0,0,6,1,2012), mktime(0,0,0,7,1,2012));
    	$args['applications_completed'][7] = $this->Application_model->completed_count(mktime(0,0,0,7,1,2012), mktime(0,0,0,8,1,2012));
    	$args['applications_completed'][8] = $this->Application_model->completed_count(mktime(0,0,0,8,1,2012), mktime(0,0,0,9,1,2012));
    	$args['applications_completed'][9] = $this->Application_model->completed_count(mktime(0,0,0,9,1,2012), mktime(0,0,0,10,1,2012));
    	$args['applications_completed'][10] = $this->Application_model->completed_count(mktime(0,0,0,10,1,2012), mktime(0,0,0,11,1,2012));
    	$args['applications_completed'][11] = $this->Application_model->completed_count(mktime(0,0,0,11,1,2012), mktime(0,0,0,12,1,2012));
    	$args['applications_completed'][12] = $this->Application_model->completed_count(mktime(0,0,0,12,1,2012), mktime(0,0,0,1,1,2013));

        $args['applications_abandoned'][3] = $this->Application_model->abandoned_count(mktime(0,0,0,3,1,2012), mktime(0,0,0,4,1,2012));
        $args['applications_abandoned'][4] = $this->Application_model->abandoned_count(mktime(0,0,0,4,1,2012), mktime(0,0,0,5,1,2012));
        $args['applications_abandoned'][5] = $this->Application_model->abandoned_count(mktime(0,0,0,5,1,2012), mktime(0,0,0,6,1,2012));
        $args['applications_abandoned'][6] = $this->Application_model->abandoned_count(mktime(0,0,0,6,1,2012), mktime(0,0,0,7,1,2012));
        $args['applications_abandoned'][7] = $this->Application_model->abandoned_count(mktime(0,0,0,7,1,2012), mktime(0,0,0,8,1,2012));
        $args['applications_abandoned'][8] = $this->Application_model->abandoned_count(mktime(0,0,0,8,1,2012), mktime(0,0,0,9,1,2012));
        $args['applications_abandoned'][9] = $this->Application_model->abandoned_count(mktime(0,0,0,9,1,2012), mktime(0,0,0,10,1,2012));
        $args['applications_abandoned'][10] = $this->Application_model->abandoned_count(mktime(0,0,0,10,1,2012), mktime(0,0,0,11,1,2012));
        $args['applications_abandoned'][11] = $this->Application_model->abandoned_count(mktime(0,0,0,11,1,2012), mktime(0,0,0,12,1,2012));
        $args['applications_abandoned'][12] = $this->Application_model->abandoned_count(mktime(0,0,0,12,1,2012), mktime(0,0,0,1,1,2013));

        $args['applications_registered'][3] = $this->Users_model->students_application_count(mktime(0,0,0,3,1,2012), mktime(0,0,0,4,1,2012)) + $args['applications_completed'][3];
        $args['applications_registered'][4] = $this->Users_model->students_application_count(mktime(0,0,0,4,1,2012), mktime(0,0,0,5,1,2012)) + $args['applications_completed'][4];
        $args['applications_registered'][5] = $this->Users_model->students_application_count(mktime(0,0,0,5,1,2012), mktime(0,0,0,6,1,2012)) + $args['applications_completed'][5];
        $args['applications_registered'][6] = $this->Users_model->students_application_count(mktime(0,0,0,6,1,2012), mktime(0,0,0,7,1,2012)) + $args['applications_completed'][6];
        $args['applications_registered'][7] = $this->Users_model->students_application_count(mktime(0,0,0,7,1,2012), mktime(0,0,0,8,1,2012)) + $args['applications_completed'][7];
        $args['applications_registered'][8] = $this->Users_model->students_application_count(mktime(0,0,0,8,1,2012), mktime(0,0,0,9,1,2012)) + $args['applications_completed'][8];
        $args['applications_registered'][9] = $this->Users_model->students_application_count(mktime(0,0,0,9,1,2012), mktime(0,0,0,10,1,2012)) + $args['applications_completed'][9];
        $args['applications_registered'][10] = $this->Users_model->students_application_count(mktime(0,0,0,10,1,2012), mktime(0,0,0,11,1,2012)) + $args['applications_completed'][10];
        $args['applications_registered'][11] = $this->Users_model->students_application_count(mktime(0,0,0,11,1,2012), mktime(0,0,0,12,1,2012)) + $args['applications_completed'][11];
        $args['applications_registered'][12] = $this->Users_model->students_application_count(mktime(0,0,0,12,1,2012), mktime(0,0,0,1,1,2013)) + $args['applications_completed'][12];


             
    	echo json_encode($args);
    	exit;
    }

    function range($start = 1, $end = NULL)
    {
        $end = (is_null($end)) ? now() : $end;
        $args['start_date'] = $start;
        $args['end_date'] = $end;
        $args['applications_completed'] = $this->Application_model->completed_apps(strtotime($start), strtotime($end), false);
        $args['applications_started'] = $this->Application_model->started_apps(strtotime($start), strtotime($end), $args['applications_completed'], false );
        $args['applications_abandoned'] = $this->Application_model->abandoned_apps(strtotime($start), strtotime($end), false);        
        $args['applications_registered'] = $this->Users_model->students_applications(strtotime($start), strtotime($end), false); 
        $messages = $this->Messages_model->get_message_counts(strtotime($start), strtotime($end)); 
        $args['messages_from_ecs'] = $messages['messages_from_ecs'];
        $args['messages_to_ecs'] = $messages['messages_to_ecs'];
        
        echo json_encode($args);
        
        exit;
    }

    function range_trad($start = 1, $end = NULL)
    {
        $end = (is_null($end)) ? now() : $end;
        $args['start_date'] = $start;
        $args['end_date'] = $end;
        
        $args['applications_completed'] = $this->Application_model->completed_apps(strtotime($start), strtotime($end), true);
        $args['applications_started'] = $this->Application_model->started_apps(strtotime($start), strtotime($end), $args['applications_completed'], true);
        $args['applications_abandoned'] = $this->Application_model->abandoned_apps(strtotime($start), strtotime($end), true);  
        $args['applications_registered'] = $this->Users_model->students_applications(strtotime($start), strtotime($end), true); 
       
        echo json_encode($args);
        
        exit;
    }

    function messages($start = 1, $end = NULL)
    {
        $end = (is_null($end)) ? now() : $end;
        $messages = $this->Messages_model->get_message_summary(strtotime($start), strtotime($end), true); 
        echo json_encode($messages);
        exit;
    }
}
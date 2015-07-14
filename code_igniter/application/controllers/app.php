<?php

class App extends CI_Controller {
	public $portal_entity_id;
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('America/New_York');
		$this->load->model('Application_model');
		$this->load->model('Programs_model');
		$this->load->model('Users_model');
		$this->load->model('Messages_model');
		$this->load->model('School_model');
                $this->load->model('Programs_model');
		$this->load->library('session');
		$this->load->library('tank_auth');
		$this->load->library('email');
		$this->load->library(SITE, '', 'school_lib');
		$this->load->helper('date');
                $this->portal_entity_id = $this->Programs_model->get_entity_id_for_current_site();
		if(!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login');
        }

        // Grab session UID and log out if something went wrong
        $this->uid = $this->session->userdata('uid');
        if($this->uid == NULL) {
            $this->tank_auth->logout();		
        }

        // Grab some user data, stick it in session to be used later
        $user = $this->users->get_user_by_id($this->tank_auth->get_user_id(), true); 
        $this->session->set_userdata('item_id', $this->Users_model->getProgramIDByEmail($user->email));    
        $this->session->set_userdata('has_stp', $this->Programs_model->has_stp($this->session->userdata('item_id')));
        $this->item_id = $this->session->userdata('item_id');
        $this->user_progress = $this->Users_model->getProgress($this->uid);

		force_ssl();
	}

    function dump() {
        echo "<pre>";
        foreach ($_POST as $key => $value) {
            echo "$key<br>";
        }
    }

    function index() {
        if($this->user_progress != 'application' && 
            $this->user_progress != 'app_only_app') {
                if($this->session->userdata('has_stp')) {
                    redirect('');
                } else {
                    redirect('/app/show_complete');
                }
            }

        $data = $this->get_data_for_view();
        // Grab application filename by program
        $app_view_name = $this->Programs_model->get_application_view(
            $data['user']['item_id']);

        // Sort program list
        if($data['user_type'] != 'TRAD') {
            $this->array_sort_by_column($data['programs'], 'name');	
        }

        $data['program_name'] = $this->Programs_model->get_program_name($data['user']['item_id']);
		$data['locations'] = json_encode($this->Programs_model->get_locations($this->Programs_model->get_entity_id_for_current_site()));
        $this->load->view('header', $data);
        $this->load->view('app_header', $data);
        $this->load->view(SITE. '/'.$app_view_name, $data);
        $this->load->view('footer', $data);

    }

    public function get_school_ceeb()
    {
        $school = $this->input->post('school');
        $school = preg_split('/ -/ ', $school); //Remove state
        $ceeb = $this->School_model->get_ceeb($school[0]);
        echo $ceeb;
    }

    public function get_schools_state()
    {
        $state = $this->input->get('state');
        $state_ceebs = $this->School_model->get_schools_state($state);
        $data['state_ceebs'] = $state_ceebs;
        $this->load->view('ceeb_finder', $data);
    }

    private function get_option_html_string($resources) {
        $result = '<option value="">Please Select</option> ';
        foreach($resources as $resource) {
            if(isset($resource['trad_id'])) {
                $result .= '<option value="' . $resource['trad_id'] . '">' . $resource['name'] . "</option>";
            }
        }
        return $result;
    }

    private function get_scripts_for_view() {
        $scripts = '<link rel="stylesheet" href="/css/formOnly.css" type="text/css"/>
                    <link rel="stylesheet" href="/css/datepicker.css" type="text/css">
                    <script type="text/javascript" src="/js/'.SITE.'/lh_jquery_multi_validator.js"></script>
                    <script type="text/javascript" src="/js/formToWizard.js"></script>
                    <script type="text/javascript" src="/js/'.SITE.'/bootstrap-tab.js"></script>
                    <script type="text/javascript" src="/js/'.SITE.'/application.js"></script>
                    <script type="text/javascript" src="/js/app_header.js"></script>
                    <script type="text/javascript" src="/js/bootstrap-datepicker.js"></script>';
        return $scripts;
    }

    private function get_data_for_view() {
        $data = array();

        // Javascriptzzz
        $data['scripts'] = $this->get_scripts_for_view();

        // Drop down options
        $data['state_options'] = $this->load->view('states', false, true);
        $data['country_options'] = $this->load->view('countries', false, true);
        $data['term_options'] = $this->school_lib->get_term_options();

        // Not sure... possibly defunct
        $data['seg_0'] = "app";

        $student_type = $this->Users_model->get_student_type($this->session->userdata('uid'));
        $data['partners'] = $this->Programs_model->get_stp_partners($this->portal_entity_id, $student_type);

        // User information
        $data['request_id'] = $this->uid;
        $data['uid'] = $this->uid;
        $data['user_progress'] = $this->Users_model->getProgress($this->uid);
        $data['user_name'] = $this->Users_model->getUserNameByID($this->uid);
        $data['image_url'] = $this->Users_model->getImageURLByID($this->uid);
        $data['image_url_thumbnail'] = $this->Users_model->getImageThumbnailURLByID($this->uid);
        $data['user'] = $this->Users_model->get_user_by_uid($this->uid);
        $data['user_type'] = $this->Users_model->get_student_type($this->uid);
        $data['ecs'] = $this->Users_model->get_ecs();

        // Program information
		$data['programs'] = $this->Programs_model->get_stp_programs($this->portal_entity_id, $data['user_type']);

        // Portal options
        $data['has_stp'] = $this->session->userdata('has_stp');
        $data['show_program_chooser'] = $this->school_lib->show_program_chooser($data['user_type']);
        return $data;
    }

    // Used when has_stp is false
    function show_complete() {
        $data = $this->get_data_for_view();

        // Grab application filename by program
        $app_view_name = $this->Programs_model->get_application_view(
            $data['user']['item_id']);

        // Sort progrma list
        $this->array_sort_by_column($data['programs'], 'name');	

        $this->load->view('header', $data);
        $this->load->view('app_header', $data);
        $this->load->view('app_complete', $data);
        $this->load->view('footer', $data);
    }

    // Endpoint for JS to grab various resources from school lib
    function get_resource() {
        // JS calls should pass in a value for resource
        echo $this->get_option_html_string($this->Programs_model->get_resource($_POST['resource']));
    }

    // This is called from JS when the user changes program
    function programwrite() {
        $program_id = (isset($_POST["programchooser"]))?$_POST["programchooser"]:NULL;
        $this->Users_model->updateProgram($this->session->userdata('uid'), $program_id);
        $this->session->set_userdata('item_id', $program_id);
        $this->session->set_userdata('program_name', $this->Programs_model->get_program_name(
            $program_id));
        $this->session->set_userdata('has_stp', $this->Programs_model->has_stp(
            $program_id));
        if($this->session->userdata('has_stp')) {
            $this->Users_model->updateProgress($this->session->userdata('uid'), 'application');
        } else {
            $this->Users_model->updateProgress($this->session->userdata('uid'), 'app_only_app');
        }

        $this->session->set_userdata('user_program_change', true);
        echo $program_id;
    }

    function appread() {
        $application = $this->Application_model->get($this->session->userdata('uid'));
        $application = end($application);

        echo json_encode($application);
    }

    function appwrite() {
        $app_data=$_POST;
        $uid = $this->session->userdata('uid');
        if(!isset($app_data['started_at'])) {
            $app_data = array_merge($app_data, array('started_at' => now()));
        }
        $app_data = array_merge($app_data, array('uid' => $uid, 'complete' => 'false', 'downloaded' => 'false'));
        $this->Application_model->add($uid, $app_data);
    }

    function appcomplete() {
    	$app_data = $_POST;
    	$uid = $this->session->userdata('uid');
    	$has_stp = $this->session->userdata('has_stp');
    	$pdf_filename = null;
    	if (SITE == 'aurora') {
    		// Create PDF for PP alt_export:
    		$this->load->library('dompdf');
    		$dompdf = new DOMPDF();
    		$dompdf->load_html($this->load->view('alt_export_pdf', array('post' => $app_data), TRUE));
    		$dompdf->render();
    		$pdf_filename = time() . '_' . $uid . '.pdf';
    		$fp = fopen("../pdf/$pdf_filename", 'w');
            if ($fp) {
                fwrite($fp, $dompdf->output(0));
                fclose($fp);
            }else{
                $this->load->library('email');

                $this->email->from('no_reply@learninghouse.com', 'student portal');
                $this->email->to($this->config->item('rebuild_pdf_email'));

                $this->email->subject('Student Portal Error');
                $this->email->message('The PDF dir is not writtable. Please check PDF permissions');  

                $this->email->send();
                fclose($fp);
                $pdf_filename = 'failed';
            }
    	}
        
        $datestring = "%Y/%m/%d";
        $time = time();
        $app_complete_date = mdate($datestring,$time);
        $app_data = array_merge($app_data, array(
    		'uid' => $uid,
    		'app_complete_date' => $app_complete_date,
    		'pdf_filename' => $pdf_filename,
    		'complete' => 'true',
    		'downloaded' => 'false'
    	));
        // Add any fields or otherwise modify the app after user complete
        $this->school_lib->add_custom_fields($app_data);
       
        // Add to Mongo
        $this->Application_model->add($uid, $app_data); 

        $message['uid'] = strval($uid);
        $message['type'] = 'Application';
        $message['text'] = "I submitted my application to ".$this->config->item('school_name')."!";
        $message['ts'] = now();

        // Email
        $ec = $this->Users_model->get_primary_ec();
        $user = $this->Users_model->get_user_by_uid($this->uid);

        // Use HTML email if Concordia
        if(! $this->session->userdata('has_stp') && SITE == 'csp') {
            $email_config['mailtype'] = "html";
        } else {
            $email_config['mailtype'] = "text";
        }

        $email_config['newline'] = "\r\n";
        $this->email->initialize($email_config);

        $this->email->from($this->config->item('support_email'), $this->config->item('school_name_long'));
        $this->email->to($user['email']);
        $this->email->subject('Thank you for submitting your application to '.$this->config->item('school_name').'!');
        
        // Super hack to only show CSP's trad app email if condition is met
        // In the future we need to abstract this out, loading views using SITE definition
        if(! $this->session->userdata('has_stp') && SITE == 'csp') {
            $this->email->message($this->load->view('email/app-complete-csp-trad.php', $data, TRUE));
            
        } else {
            if($this->session->userdata('has_stp')) {
                $this->email->message('Thank you for submitting your application to '.$this->config->item('school_name').'. You have just taken your first step '.
                    'in furthering your education and we are here to help you every step of the way. Your Enrollment Counselor will be contacting '.
                    'you within the next 24 hours to walk you through the process and to answer any questions you may have. Congratulations '.
                    'on your decision to apply to '.$this->config->item('school_name').'!');
            } else {
                $this->email->message('Thank you for submitting your application to '.$this->config->item('school_name').'. You have just taken your first step '.
                    'in furthering your education and we are here to help you every step of the way. We will contact you soon regarding '.
                    'the admissions process and status of your acceptance. Congratulations '.
                    'on your decision to apply to '.$this->config->item('school_name').'!');
            }
        }
        $this->email->send();

        // Sends email to ECs if program has a STP
        $this->progress_email();

        // Create the message that's shown on front page
        $this->Messages_model->create($message);

        // Update them to the next step (Online Transcript Request), or just show
        // them as completed if the program doesn't have a STP
        if($this->session->userdata('has_stp')) {
            $this->Users_model->updateProgress($uid, 'otr');
        } else {
            $this->Users_model->updateProgress($uid, 'app_only_completed_img');
        }

        // Check if limbo app was created
        $check_application = $this->Application_model->get($uid);
        $check_user = $this->Users_model->get_user_by_uid($uid);

        if ($check_user['progress'] == 'otr' && $check_application[0]['complete'] == 'false') {
            $errbit = new ErrbitAdapter('student-portal', ENVIRONMENT);
            $data=array(
                'uid'=> $uid,
                'application as it appears in mongo' => $check_application,
                'time' => $time
            );
            $errbit->addParams($data);
            $errbit->send('SP - Limbo app detected');
        }
    }

    function get_school_names() {
        $schools = $this->School_model->get_names($this->input->get('term')); 
        echo json_encode($schools);
    }

    function get_school_names_append_state() {
        $schools = $this->School_model->get_names_append_state($this->input->get('term')); 
        echo json_encode($schools);
    }

    function get_ceeb() {
        $ceeb = $this->School_model->get_ceeb($this->input->get('name'));
        echo $ceeb;
    }

    function get_city() {
        $city = $this->School_model->get_city($this->input->get('name'));
        echo $city;
    }

    function progress_email() {
        $user = $this->Users_model->get_user_by_uid($this->uid);
        $complete = $this->Application_model->isComplete($this->uid);

        // If the user just changed their program, don't send an abandon application email
        if(! $this->session->userdata('user_program_change')) {

            $email_config['mailtype'] = "text";
            $email_config['newline'] = "\r\n";
            $this->email->initialize($email_config);

            // If this is an application only, we want to send to default case
            if(! $this->Programs_model->has_ecs($this->session->userdata('item_id'))) {
                $to_email_address = $this->config->item('default_notification_email');
                $app_completed_subject = $this->config->item('default_notification_email_heading') . 'New Application';
                $app_abandoned_subject = $this->config->item('default_notification_email_heading') . 'Abandoned Application';
            } else {
                $ec = $this->Users_model->get_primary_ec();
                $to_email_address = $ec['email'];
                $app_completed_subject = "Student Portal - Application Completed";
                $app_abandoned_subject = "Student Portal - Application Abandoned";
            }

            // If they came in as app only, or apply now path, they need these fields as they don't have them
            if(! $this->Programs_model->has_stp($this->session->userdata('item_id')) || $user['address'] == '') {
                $user_info = $this->Application_model->getUserContactInfoByID($this->uid);
                // Grab the basic address, phone, city 
                $app_field_names = $this->school_lib->get_basic_user_fields_from_app();
                $address = $app_field_names['address'];
                $phone = $app_field_names['phone'];
                $city = $app_field_names['city'];
                $state = $app_field_names['state'];
                $zip = $app_field_names['zip'];

                $user['address'] = isset($user_info[$address]) ? $user_info[$address] : '';
                $user['phone'] = isset($user_info[$phone]) ? $user_info[$phone] : '';
                $user['city'] = isset($user_info[$city]) ? $user_info[$city] : '';
                $user['state'] = isset($user_info[$state]) ? $user_info[$state] : '';
                $user['zip'] = isset($user_info[$zip]) ? $user_info[$zip] : '';
            }

            $this->email->to($to_email_address);
            $this->email->from($this->config->item('noreply_email'), 'Student Portal Notifications');

            if($complete == "true") {
                $this->email->subject($app_completed_subject);
                $this->email->message("An application has been completed by ".$user['first_name']." ".$user['last_name'].".\r\n".
                    $user['first_name']."'s information is:\r\n".
                    $user['first_name']." ".$user['last_name']."\r\n".
                    $user['email']."\r\n".
                    $user['phone']."\r\n".
                    $user['address']."\r\n".
                    $user['city'].", ".$user['state']."\r\n".
                    $user['zip']."\r\n".
                    "Request ID:  ".$user['uid']."\r\n" );
            } else {
                $this->email->subject($app_abandoned_subject);
                $this->email->message("An application has been abandoned by ".$user['first_name']." ".$user['last_name'].".\r\n".
                    $user['first_name']."'s information is:\r\n".
                    $user['first_name']." ".$user['last_name']."\r\n".
                    $user['email']."\r\n".
                    $user['phone']."\r\n".
                    $user['address']."\r\n".
                    $user['city'].", ".$user['state']."\r\n".
                    $user['zip']."\r\n".
                    "Request ID:  ".$user['uid']."\r\n" );
            }
            $this->email->send();
            $this->session->set_userdata('email', 'sent');
        } else {
            // Reset the program change status flag
            $this->session->set_userdata('user_program_change', false);
            $this->session->set_userdata('email', 'not sent');

        }
    }

    function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
        $sort_col = array();
        foreach ($arr as $key=> $row) {
            $sort_col[$key] = $row[$col];
        }

        array_multisort($sort_col, $dir, $arr);
    }

}

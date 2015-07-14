<?php

class Leadform extends CI_Controller {
    
	public function __construct() {
        
		parent::__construct();

        $this->load->library('session');
        $this->load->model('Users_model');
        $this->load->model('Messages_model');
        $this->load->model('Application_model');
        $this->load->model('Programs_model');
        $this->load->library('form_validation');
        $this->load->library('tank_auth');
        $this->load->library(SITE, '', 'school_lib');
        $this->lang->load('tank_auth');
        $this->load->helper('date');
        $this->load->helper('error_email');

        //$this->load->helper('ssl');
        //force_ssl();
        date_default_timezone_set('America/New_York');

	}

    function index() {		                               
		$states = array('Alabama'=>'AL',
		                'Alaska'=>'AK',  
		                'Arizona'=>'AZ',  
		                'Arkansas'=>'AR',  
		                'California'=>'CA',  
		                'Colorodo'=>'CO',  
		                'Connecticut'=>'CT',  
		                'Delaware'=>'DE',  
		                'District Of Columbia'=>'DC',  
		                'Florida'=>'FL',  
		                'Georgia'=>'GA',  
		                'Hawaii'=>'HI',  
		                'Idaho'=>'ID',  
		                'Illinois'=>'IL',  
		                'Indiana'=>'IN',  
		                'Iowa'=>'IA',  
		                'Kansas'=>'KS',  
		                'Kentucky'=>'KY',  
		                'Louisiana'=>'LA',  
		                'Maine'=>'ME',  
		                'Maryland'=>'MD',  
		                'Massachusetts'=>'MA',  
		                'Michigan'=>'MI',  
		                'Minnesota'=>'MN',  
		                'Mississippi'=>'MS',  
		                'Missouri'=>'MO',  
		                'Montana'=>'MT',
		                'Nebraska'=>'NE',
		                'Nevada'=>'NV',
		                'New Hampshire'=>'NH',
		                'New Jersey'=>'NJ',
		                'New Mexico'=>'NM',
		                'New York'=>'NY',
		                'North Carolina'=>'NC',
		                'North Dakota'=>'ND',
		                'Ohio'=>'OH',  
		                'Oklahoma'=>'OK',  
		                'Oregon'=>'OR',  
		                'Pennsylvania'=>'PA',  
		                'Rhode Island'=>'RI',  
		                'South Carolina'=>'SC',  
		                'South Dakota'=>'SD',
		                'Tennessee'=>'TN',  
		                'Texas'=>'TX',  
		                'Utah'=>'UT',  
		                'Vermont'=>'VT',  
		                'Virgina'=>'VA',  
		                'Washington'=>'WA',  
		                'West Virginia'=>'WV',  
		                'Wisconsin'=>'WI',  
		                'Wyoming'=>'WY');

        $fb_data = $this->session->userdata('fb_data');

        // Set this to mark first login for welcome modal to display
        $this->session->set_userdata('first_login', true);

        $data['form_url'] = $this->config->item('lead_form_path');

        // set facebook data that is populated from js in lead_form view
        if($fb_data) {
            $name = explode(" ", $fb_data['registration']['name']);
            $location = explode(", ", $fb_data['registration']['location']['name']);

            $data['fb_first_name'] = $name[0];
            $data['fb_last_name'] = $name[1];
            $data['fb_city'] = $location[0];

            if(array_key_exists($location[1], $states)) {
                $data['fb_state'] = $states[$location[1]];
                $data['fb_country'] = 'United States';
            }

            $data['fb_email'] = $fb_data['registration']['email']; 
            $data['fb_gender'] = $fb_data['registration']['gender'];
            // $data['fb_address'] = $fb_data['registration']['address'];
            // $data['fb_zipcode'] = $fb_data['registration']['zip'];
            // $data['fb_phone'] = $fb_data['registration']['phone'];
            $data['fb_id'] = $fb_data['user_id'];
        }
        
        $this->load->view('lead_form', $data);
	}

    function welcome($apply_now = NULL){
        $data['redirect_url'] = ($apply_now == "apply") ? "/app" : "/";
        $this->load->view(SITE.'/google_analytics_head');
        $this->load->view('welcome', $data);
        $this->load->view(SITE.'/google_analytics_footer');
    }

    // process_lead()
    // This function is called after the Forms application processes lead information
    // and redirects here
    function process_lead($client_program_id, $request_id) {
        // Decode program name
	$program_name = $this->Programs_model->get_program_name($client_program_id);
        $apply_now = $this->session->userdata('apply_now');

        if($this->config->item('portal_active') == "true") {
            $this->load->library('curl');     
            
            // Check if our result is what we expect from Partners
            if($request_id == NULL || ! is_numeric($request_id)) {
                // Log the error
                $error = 'An error was found with Request_ID returning from Forms. The value was ' . ($request_id == null ? 'NULL' : $request_id) . '.';
                log_message('error', $error);
                send_error_email('Request_ID is null or non numeric', $error);
                $this->load->view(SITE.'/thank_you');
                exit();
            }

            $result = $this->Users_model->create_from_lead($request_id);

            // Store request id in session
            $this->session->set_userdata('uid', $request_id);
            $this->session->set_userdata('client_program_id', $client_program_id);
            $this->session->set_userdata('program_name', $program_name);
            $this->session->set_userdata('has_stp', $this->Programs_model->has_stp(
                $client_program_id));

            // Set this to mark first login for welcome modal to display
            $this->session->set_userdata('first_login', true);

            // Show errors if user wasn't able to register
            if(isset($result['errors'])) {
                $this->session->set_flashdata("error", $result['errors']);
                redirect('/auth/login');
                exit;
            }

            // Login
            if ($this->tank_auth->login(
                $result['email'],
                $result['password'],
                false, // remember login to false
                false, // login by username to false
                true)) 
            { 
                unset($result['password']); // Clear password (just for any case)
                ($apply_now) ? redirect('/leadform/welcome/apply') : redirect('/leadform/welcome');
            } else {

                // Show errors if they exist after login
                $errors = $this->tank_auth->get_error_message();
                show_error($errors);

                // Probably no longer needed, leaving here for now
                if (isset($errors['banned'])) {
                    $this->_show_message($this->lang->line('auth_message_banned').' '.$errors['banned']);
                } elseif (isset($errors['not_activated'])) {
                    redirect('/auth/send_again/');
                } else {													
                    foreach ($errors as $k => $v)	
                        $result['errors'][$k] = $this->lang->line($v);
                }
            }
            
            $this->load->view('lead_form', $result);
        }
        else {
            $this->load->view(SITE.'/thank_you');
        }
    }

    function create_account_from_rid() {
        if($this->config->item('admin_active')) {
            if($_POST) {
                $request_id = $_POST['request_id'];
            }
            
            $this->Users_model->create_from_lead($request_id);
            exit();
        }
        echo "Admin not accessible";
    }

    /**************************************************************************
     * This function wants:
     * - first_name
     * - last_name
     * - email
     * - phone
     * - entity_id      -> From Grail
     * - Request_id     -> Make up, lower than real ones
     * - title          -> Admissions Counselor, Prospective Student, etc.
     * - type           -> EC, Student, Teacher, etc.
     *************************************************************************/
    function create_account() {
        if($this->config->item('admin_active')) {
            if($_POST) {
                $data = $_POST;
            }

            // register them
            $result = $this->Users_model->create($data);
            
            echo ((empty($result['errors'])) ?  'success' : $result['errors']);
            exit();
        }
        echo "Admin not accessible";
    }

    function _show_message($message)
    {
        $this->session->set_flashdata('message', $message);
        redirect('/auth/');
    }
}

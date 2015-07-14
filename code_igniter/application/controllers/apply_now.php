<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apply_now extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Users_model');
        $this->load->model('Programs_model');
        $this->load->library(SITE, '', 'school_lib');
        date_default_timezone_set('America/New_York');
    }

    public function index()
    {
        $data['country_options'] = $this->load->view('countries', false, true);
        if (SITE == 'csp') {
            $data['undergrad_programs'] = $this->Programs_model->get_stp_programs(7325, 'ND');
            $data['grad_programs'] = $this->Programs_model->get_stp_programs(7325, 'NG');
            $this->load->view('csp/apply_now', $data);
        } else {
            if (SITE == 'uof') $data['programs'] = $this->Programs_model->get_elp_programs(10570);
            if (SITE == 'aurora') $data['programs'] = $this->Programs_model->get_elp_programs(8470);
            $this->array_sort_by_column($data['programs'], 'name');
            if (SITE !== 'aurora') $data['country_options'] = $this->get_country_options();
			if(SITE == 'aurora'){
				$data['header_message'] = "Begin your application to Aurora University Online.<br/>Submitting your application is fast, easy, secure and free.";
				$data['footer_message'] = "If you have any questions, please contact us at online@aurora.edu or 1-888-688-1147.";
			}
			else{
				$data['header_message'] = "Apply as an adult undergraduate student - Online campus.";
				$data['footer_message'] = "";
			}
            $this->load->view('apply_now', $data);
        }
    }

    /* Hack for CSP Trad APP Apply Now BEGIN */
    public function csp() {
        $data['undergrad_programs'] = $this->Programs_model->get_stp_programs(7325, 'ND');
        $data['grad_programs'] = $this->Programs_model->get_stp_programs(7325, 'NG');
        $data['country_options'] = $this->load->view('countries', false, true);
        $this->load->view('csp/apply_now_trad', $data);
    }

    public function csp_start() {
        if ($this->input->post('program_type')=='tr') {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email = $this->input->post('email');
            $state = $this->input->post('state');
            $zip = $this->input->post('zip');
            $country = $this->input->post('country');
            $item_id = $this->input->post('program');
            $guid = $this->input->post('guid');
            $client_entity_id = $this->config->item('client_entity_id');

            $new_user['image_url'] = '/img/unknown_user_profile.jpg';
            $new_user['image_url_thumbnail'] = '/img/unknown_user_profile.jpg';
            $new_user['item_id'] = $item_id;
            $new_user['client_entity_id'] = $client_entity_id;
            $new_user['uid'] = ''; 
            $new_user['type'] = 'Student';
            $new_user['title'] = 'Prospective Student';
            $new_user['email'] = $email;
            $new_user['first_name'] = $first_name;
            $new_user['last_name'] = $last_name;
            $new_user['entity_id'] = $client_entity_id;

            // Create new Student Portal account
            $result = $this->Users_model->create($new_user);
            // Show errors if user wasn't able to register
            if (isset($result['errors'])) {
                $this->session->set_flashdata("error", $result['errors']);
                redirect('/auth/login');
                exit;
            }

            // Store request id in session
            $this->session->set_userdata('uid', $this->Users_model->getUIDByEmail($result['email']));

            // Set this to mark first login for welcome modal to display
            $this->session->set_userdata('first_login', true);
            $this->session->set_userdata('client_program_id', $item_id);
            $this->session->set_userdata('program_name', (isset($program_name)) ? $program_name : '');
            $this->session->set_userdata('has_stp', $this->Programs_model->has_stp($item_id));
            $this->session->set_userdata('apply_now', true);

            // Login
            if ($this->tank_auth->login(
                $result['email'],
                $result['password'],
                false, // remember login to false
                false, // login by username to false
                true)) 
            { 
                unset($result['password']); // Clear password (just for any case)
                redirect('/leadform/welcome/apply');
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
        }else{ //If this is not a traditional program 

            $post = $this->input->post();
            if($post['program_type']=='au'){ //adult undergrad program type
                $post['program']=$post['undergrad_programs'];
            }elseif ($post['program_type']=='ag') {
                $post['program']=$post['grad_program'];
            }

            $this->start($post);
        }

    }
    /* Hack for CSP Trad APP Apply Now END */

    public function start($post='') 
    {   
        if ($post=='') {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email = $this->input->post('email');
            $state = $this->input->post('state');
            $zip = $this->input->post('zip');
            $country = $this->input->post('country');
            $item_id = $this->input->post('program');
            $guid = $this->input->post('guid');
            $client_entity_id = $this->config->item('client_entity_id');
        }else{// This path is chosen if applicant came through apply_now/csp and has chosen a non-traditional program type
            // We're expecting these, they are all required
            $first_name = $post['first_name'];
            $last_name = $post['last_name'];
            $email = $post['email'];
            $state = $post['state'];
            $zip = $post['zip'];
            $country = $post['country'];
            $item_id = $post['program'];
            $guid = $post['guid'];
            $client_entity_id = $this->config->item('client_entity_id');
        }

        // Perform lookup and get lead data
        $found_lead = json_decode($this->Users_model->lookup_lead_by_email_and_entityid($email, $client_entity_id));

        // If we found a lead
        if($found_lead != NULL) {
            $new_user['image_url'] = '/img/unknown_user_profile.jpg';
            $new_user['image_url_thumbnail'] = '/img/unknown_user_profile.jpg';
            $new_user['item_id'] = $found_lead->client_program_id;
            $new_user['client_entity_id'] = $client_entity_id;
            $new_user['uid'] = $found_lead->request_id; 
            $new_user['type'] = 'Student';
            $new_user['title'] = 'Prospective Student';
            $new_user['phone'] = $found_lead->phone;
            $new_user['email'] = $found_lead->email;
            $new_user['first_name'] = $found_lead->first_name;
            $new_user['last_name'] = $found_lead->last_name;
            $new_user['entity_id'] = $found_lead->client_entity_id;
            $program_name = $this->Programs_model->get_program_name($item_id);

            // Create new Student Portal account
            $result = $this->Users_model->create($new_user);
            
            // Show errors if user wasn't able to register
            if(isset($result['errors'])) {
                $this->session->set_flashdata("error", $result['errors']);
                redirect('/auth/login');
                exit;
            }

            // Store request id in session
            $this->session->set_userdata('uid', $found_lead->request_id);
            // Set this to mark first login for welcome modal to display
            $this->session->set_userdata('first_login', true);
            $this->session->set_userdata('client_program_id', $item_id);
            if($progam_name) {
                $this->session->set_userdata('program_name', (isset($program_name)) ? $program_name : null);
            } else {
                $this->session->set_userdata('program_name', '');
            }
            $this->session->set_userdata('has_stp', $this->Programs_model->has_stp(
                $item_id));
            $this->session->set_userdata('apply_now', true);

            // Login
            if ($this->tank_auth->login($result['email'],$result['password'],false,false,true)) { 
                unset($result['password']); // Clear password (just for any case)
                redirect('/leadform/welcome/apply');
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

        } else {

            $this->session->set_userdata('apply_now', true);
            $fields = trim($this->encode_array(array(
                'affiliate_id' => trim($this->config->item('affiliate_id')),
                'item_id' => trim($item_id),
                'redirect' => '',
                'first_name' => trim($first_name),
                'last_name' => trim($last_name),
                'state' => trim($state),
                'zip' => trim($zip),
                'country' => trim($country),
                'email' => trim($email),
                'guid' => trim($guid),
                'map' => "fn=first_name&ln=last_name&em=email&st=state&zc=zip",
                /* Returns redirect URL as string instead of performing redirect */
                'return_redirect_as_string' => 'true')));

            $this->load->library('curl');
            $this->curl->option(CURLOPT_SSL_VERIFYHOST, false);
            $this->curl->option(CURLOPT_SSL_VERIFYPEER, false);
            $redirect_url = $this->curl->simple_post($this->config->item('forms_url')."/submit", $fields);

            if($redirect_url) {
                redirect($redirect_url);
            } else {
                exit('There was an error trying to redirect you to your application. 
                    We have been notified of the problem.');
            }
        }
    }

    // Used to URLencode values before sending to Forms
    function encode_array($args)
    {
        if(!is_array($args)) return false;
        $c = 0;
        $out = '';
        foreach($args as $name => $value)
        {
            if($c++ != 0) $out .= '&';
            $out .= urlencode("$name").'=';
            if(is_array($value))
            {
                $out .= urlencode(serialize($value));
            }else{
                $out .= urlencode("$value");
            }
        }
        return $out . "\n";
    }

    function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
        $sort_col = array();
        foreach ($arr as $key=> $row) {
            $sort_col[$key] = $row[$col];
        }

        array_multisort($sort_col, $dir, $arr);
    }
}

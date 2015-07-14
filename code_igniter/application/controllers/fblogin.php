<?php

define('FACEBOOK_APP_ID', '31571730846930');
define('FACEBOOK_SECRET', '65eb2605fee5ad87c00761c1b3a1f76c');

class FBLogin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    function index() {
        $this->load->model('Messages_model');

        if ($_REQUEST) {
            // parse response
            $response = $this->parse_signed_request($_REQUEST['signed_request'], 
                FACEBOOK_SECRET);

            // store facebook and redirect back to lead form
            $this->session->set_userdata('fb_data', $response);
            redirect(base_url('/leadform'));
            // store the ID for the main view to load
            // $this->Messages_model->updateFacebookInfoByID(1, $response['user_id'], 
            //     $response['registration']['name'], 'http://graph.facebook.com/' . 
            //     $response['user_id'] . '/picture?type=square');
            // redirect('', 'refresh');
        } else {
            echo '$_REQUEST is empty';
        }
    }

    function parse_signed_request($signed_request, $secret) {
        list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

        // decode the data
        $sig = $this->base64_url_decode($encoded_sig);
        $data = json_decode($this->base64_url_decode($payload), true);

        if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
            error_log('Unknown algorithm. Expected HMAC-SHA256');
            return null;
        }

        // check sig
        $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
        if ($sig !== $expected_sig) {
            error_log('Bad Signed JSON signature!');
            return null;
        }

        return $data;
    }

    function base64_url_decode($input) {
        return base64_decode(strtr($input, '-_', '+/'));
    }

}
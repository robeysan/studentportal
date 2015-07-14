<?php

define('FACEBOOK_APP_ID', '');
define('FACEBOOK_SECRET', '');

class Facebook_connect extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->model('Users_model');

        // grab session UID and log out if something went wrong
        $this->uid = $this->session->userdata('uid');
    }

    function index() {

        $app_id = "315717308469308";
        $app_secret = "65eb2605fee5ad87c00761c1b3a1f76c";
        $my_url = 'https://'.$this->config->item('full_server_name') . '/facebook_connect';

        session_start();
        if(isset( $_REQUEST["code"])) {
            $code = $_REQUEST["code"];
        }

        // Generate state value to prevent CSRF
        if(empty($code)) {
            $_SESSION['state'] = md5(uniqid(rand(), TRUE)); //CSRF protection
            $dialog_url = "http://www.facebook.com/dialog/oauth?client_id=" 
                . $app_id . "&redirect_uri=" . urlencode($my_url) . "&state="
                . $_SESSION['state'];

            echo("<script> top.location.href='" . $dialog_url . "'</script>");
        }

        // Check state after it comes back
        if($_REQUEST['state'] == $_SESSION['state']) {
            $token_url = "https://graph.facebook.com/oauth/access_token?"
                . "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
                . "&client_secret=" . $app_secret . "&code=" . $code;

            $response = file_get_contents($token_url);
            $params = null;
            parse_str($response, $params);

            $graph_url = "https://graph.facebook.com/me?access_token=" 
                . $params['access_token'];

            $user = json_decode(file_get_contents($graph_url));

            // Set profile image to Facebook
            $image_url = 'https://graph.facebook.com/' . $user->id . '/picture?type=large';
            $image_thumb_url = 'https://graph.facebook.com/' . $user->id . '/picture?type=small';
            $this->Users_model->updateProfileImage($image_url, $image_thumb_url, $this->uid);

            // Store FB data in user document
            $this->Users_model->updateFacebookInfoByID($this->uid, $user);

            // Redirect back to the home page
            redirect('');
        }
        else {
            echo("The state does not match. You may be a victim of CSRF.");
        }

    }
}

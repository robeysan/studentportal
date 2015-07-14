<?php

include APPPATH.'core/REST_Controller.php';

class Application extends REST_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Application_model');
		$this->load->helper('date');
		$this->load->helper('download');
		force_ssl();
	}

	/*****************************************************************
	*  Returns all messages to or from the given user.
	******************************************************************/
	public function index_get() {
	}

	public function pdf_download_get($filename) {
		// Force a download for the given PDF filename
		$file = file_get_contents('../pdf/' . $filename);
		force_download($filename, $file);
	}

	public function pdf_list_post() {
		// Take in json array of uids and return json array of pdf filenames.
		if (!$this->input->post('uids')) return false;
		$uids = json_decode($this->input->post('uids'));
		$this->response($this->Application_model->getPdfList($uids));
	}

	public function get_by_uid_get() {
		$uid = $this->input->get('uid');
		$application = $this->Application_model->get($uid);

		$this->response(end($application));
	}

	/*****************************************************************
	* Returns true if application is complete, false if not
	******************************************************************/
	public function status_get() {
		$uid = $this->input->get('uid');
		$status = $this->Application_model->getStatus($uid);
		$this->response($status);
	}

    public function application_pdf_rebuild_all_get()
    {
        $rebuild = $this->Application_model->rebuild_all_pdf_applications();
        $this->response($rebuild);
    }

    public function application_pdf_rebuild_get()
    {
        $uid = $this->input->get('uid');
        $rebuild = $this->Application_model->rebuild_pdf_application($uid);
        $this->response($rebuild);
    }

	/*****************************************************************
	* Returns true if application is complete, false if not
	******************************************************************/
	public function progress_get() {
		$uid = $this->input->get('uid');
		$progress = $this->Application_model->getProgress($uid);
		$this->response($progress);
	}

	public function export_get() {
		$uids = $this->input->get('uids');
		$redo = $this->input->get('redo');
		$downloader = $this->input->get('did');

        if(! is_array($uids)) {
            // Check if we're dealing with a list of UIDs
            if(strpos($uids, ',') !== false) {
                // Explode into an array if we are
                $uids = explode(',', $uids);
        }
        }

        // Grab apps and init the response
		$apps = $this->Application_model->export($uids, $redo, $downloader);
        $response = '';

        foreach($apps as $app) {
            if(isset($app['AppType'])) {
                // Your application can use AppType to do something different 
                // on the export
                switch ($app['AppType']) {
                case 'TRAD':
                    $response .= $this->load->view(SITE.'/app_trad_export', $app, true);
                    break;
                default:
                    $response .= $this->load->view(SITE.'/app_export', $app, true);
                    break;
                }
            } else {
                $response .= $this->load->view(SITE.'/app_export', $app, true);
            }
        }

        $this->response($response);
	}

    public function alt_export_json_get() {
        $uids = $this->input->get('uids');
        $redo = $this->input->get('redo');
        $downloader = $this->input->get('did');

        if(! is_array($uids)) {
            // Check if we're dealing with a list of UIDs
            if(strpos($uids, ',') !== false) {
                // Explode into an array if we are
                $uids = explode(',', $uids);
            }
        }

        // Grab apps and init the response
        $apps = $this->Application_model->export($uids, $redo, $downloader, true);

        foreach($apps as $app) {
            if(isset($app['AppType'])) {
                switch ($app['AppType']) {
                case 'aurora':
                    //$response[$app['uid']] = $app;#= $this->load->view(SITE.'/app_other_info', $app, true);

                    $response[$app['uid']]['first_name'] = $app['first_name'];
                    $response[$app['uid']]['last_name'] = $app['last_name'];
                    $response[$app['uid']]['current_employer'] = $app['current_employer'];
                    $response[$app['uid']]['current_employer_city'] = $app['current_employer_city'];
                    $response[$app['uid']]['current_employer_state'] = $app['current_employer_state'];
                    $response[$app['uid']]['resume'] = $app['resume'];
                    $response[$app['uid']]['personal_statement'] = $app['personal_statement'];
                    $response[$app['uid']]['other_college_applications'] = $app['other_college_applications'];
                    $response[$app['uid']]['other_information'] = $app['other_information'];
                    break;
                case 'TRAD':
                    $response .= $this->load->view(SITE.'/app_trad_sibling_export', $app, true);
                    break;
                default:
                    break;
                }
            }
        }

        $this->response(json_encode($response));
    }

    public function alt_export_get() {
        $uids = $this->input->get('uids');
        $redo = $this->input->get('redo');
        $downloader = $this->input->get('did');

        if(! is_array($uids)) {
            // Check if we're dealing with a list of UIDs
            if(strpos($uids, ',') !== false) {
                // Explode into an array if we are
                $uids = explode(',', $uids);
            }
        }

        // Grab apps and init the response
        $apps = $this->Application_model->export($uids, $redo, $downloader, true);
        $response = '';

        foreach($apps as $app) {
            if(isset($app['AppType'])) {
                switch ($app['AppType']) {
                case 'aurora':
                    $response .= $this->load->view(SITE.'/app_other_info', $app, true);
                    break;
                case 'TRAD':
                    $response .= $this->load->view(SITE.'/app_trad_sibling_export', $app, true);
                    break;
                default:
                    break;
                }
            }
        }

        $this->response($response);
    }

	public function export_history_get() {
		$exports = $this->Application_model->getExportHistory();
		$this->response($exports);
	}

	public function set_downloaded_get() {
		$uid = $this->input->get('uid');
		$this->Application_model->set_downloaded($uid);
	}

	public function unset_downloaded_get() {
		$uid = $this->input->get('uid');
		$this->Application_model->unset_downloaded($uid);
	}

	public function completed_get() {
		$completed = $this->Application_model->getCompleted();
        $this->response($completed);
    }

	/*****************************************************************
	* Sets progress of user (application, otr, finaid, or null)
	******************************************************************/
    public function user_progress_set() {
        $id = $this->input->get('uid');
        $progress = $this->input->get('progress');
        $this->Users_model->updateProgress($id, $progress);
    }
}

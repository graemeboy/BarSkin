<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
		//$this->is_logged_in();
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$this->load->model('membership_model');
		$this->load->model('user/user_model');
		$logged_in = $this->session->userdata('logged_in');
		$this->site_data['email_address'] = $this->session->userdata('email_address');
		if ($logged_in) {
			$this->site_data['logged_in'] = TRUE;
		} else {
			$this->site_data['logged_in'] = FALSE;
		}
	}

	public function index() {
		$data['main_content'] = 'homepage';
		$this->load->view('user/includes/template', $data);
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
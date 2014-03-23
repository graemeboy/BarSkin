<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$this->load->model('membership_model');
		$this->site_data['logged_in'] = false;
	}
	
	public function index() {
		$this->login_form();
	}
	
	function congratulations() {
		$data['main_content'] = 'user/congratulations';
		$this->load->view('user/includes/template', $data);
	}
	
	function validate() {
		if (isset($_POST['email'])) {
			$user_data = array(
				'email_address' => $_POST['email'],
				'password' => $_POST['password'],
			);
		}
		$valid = $this->membership_model->validate_login($user_data);
		if ($valid) {
			$this->site_data['user_email'] = $_POST['email'];
			$user_data['logged_in'] = TRUE;
			unset($user_data['password']);
			$this->session->set_userdata($user_data);
			redirect('user');
		} else {
			$msg = 'Your email/password confirmation does not seem to be correct. Please try to log in again.';
			$this->session->set_flashdata('error_message', $msg);
			redirect('login');
		}
	}
	
	function login_form() {
		$success_msg = $this->session->flashdata('success_message');
		$error_msg = $this->session->flashdata('error_message');
		$data['success_msg'] = $success_msg; // email confirmation, signup
		$data['error_msg'] = $error_msg; // for incorrect user/password
		$data['main_content'] = 'login/login';
		$this->load->view('user/includes/template', $data);
	}

	function signup() {
		$data['main_content'] = 'login/signup';
		$this->load->view('user/includes/template', $data);
	}
	
	function confirmation($email, $confirmation_id) {
		$email = urldecode($email);
		$confirm = $this->membership_model->confirm_email($email, $confirmation_id);
		if ($confirm) {
			$msg = 'Thank you for confirming your email address. Please log in using the form below.';
			$this->session->set_flashdata('success_message', $msg);
			redirect('login');
		} else {
			$data['general_message'] = 'The confirmation code you provided was not correct. Please try again with the confirmation code from your email inbox.';
			$data['main_content'] = 'user/general_message';
			$this->load->view('user/includes/template', $data);
		}
	}

	function signup_process () {
		$this->load->library('form_validation');
		$this->form_validation->set_rules(
			'password', 'Password', 'trim|required|matches[password-confirm]');
		$this->form_validation->set_rules(
			'password-confirm', 'Confirm Password', 'required');
		$this->form_validation->set_rules(
			'email', 'Email', 'trim|required|valid_email');

		if (!$this->form_validation->run()) {
			$data['main_content'] = 'login/signup';
			$this->load->view('user/includes/template', $data);
		}
		else {
			$this->load->helper('string');
			$confirmation_id = random_string('alnum', 7);
			$user_data = array(
				'email_address' => $_POST['email'],
				'password' => $_POST['password'],
				'confirmation_id' => $confirmation_id,
			);
			$this->membership_model->insert_user($user_data);
			$this->membership_model->send_validation_email($user_data);
			
			redirect('login/congratulations');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
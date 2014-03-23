<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->is_logged_in();
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$this->load->model('membership_model');
		$this->load->model('user/user_model');
		$logged_in = $this->session->userdata('logged_in');
		$email = $this->session->userdata('email_address');
		$this->site_data['email_address'] = $email;
		$this->site_data['role'] = $this->membership_model->get_user_role($email);
		if ($logged_in) {
			$this->site_data['logged_in'] = TRUE;
		} else {
			$this->site_data['logged_in'] = FALSE;
		}
	}

	function get_cur_url() {
		$url ='http://'.$_SERVER['HTTP_HOST'].'/'.ltrim($_SERVER['REQUEST_URI'],'/').'';
		return $url;
	}

	function logout() {
		$user_data['logged_in'] = FALSE;
		$this->session->unset_userdata('email_address');
		$this->session->sess_destroy();
		redirect('welcome');
		$this->session->set_userdata($user_data);
	}

	function change_password() {
		if ($_POST['pass'] && $_POST['passCon']) {
			$pass = $_POST['pass'];
			$passC = $_POST['passCon'];
			if ($pass == $passC) {
				$user = $this->site_data['email_address'];
				$this->membership_model->update_password($user, $pass);
				$msg = 'Your password has been successfully changed!';
				$this->session->set_flashdata('success_message', $msg);
			} else {
				$msg = 'Your password did not match the password confirmation. Please try again.';
				$this->session->set_flashdata('error_message', $msg);
			}
		} else {
			$msg = 'Please complete both the password and confirmation fields.';
			$this->session->set_flashdata('error_message', $msg);
		}
		redirect('user/account');
	}

	function account() {
		$success_msg = $this->session->flashdata('success_message');
		$error_msg = $this->session->flashdata('error_message');
		$data['messages']['success_message'] = $success_msg;
		$data['messages']['error_message'] = $error_msg;
		$data['user_email'] = $this->site_data['email_address'];
		$data['main_content'] = 'user/account';
		$this->load->view('user/includes/template', $data);
	}

	function delete_split($split_id, $conf = false) {
		if (!$conf) {
			$split_name = $this->user_model->get_split_name($split_id);
			$data['split_id'] = $split_id;
			if ($split_name) {
				$data['split_name'] = $split_name;
			} else {
				$data['split_name'] = 'Unknown';
			}
			$data['main_content'] = 'user/delete_split';
			$this->load->view('user/includes/template', $data);

		} else {
			$this->user_model->delete_split($split_id);
			$msg = '<span class="glyphicon glyphicon-fire" style="margin-right:5px"></span> Your split-testing set has been successfully deleted!';
			$this->session->set_flashdata('success_message', $msg);
			redirect("user/split_testing");
		}

	}

	function bars () {
		$success_msg = $this->session->flashdata('success_message');
		$error_msg = $this->session->flashdata('error_message');
		$data['messages']['success_message'] = $success_msg;
		$data['messages']['error_message'] = $error_msg;

		$this->load->model('bar/bar_model');
		$email = $this->site_data['email_address'];
		$user_id = $this->membership_model->get_user_id($email);
		$bars_list = $this->bar_model->get_overall_stats($user_id);
		$data['bars_list'] = $bars_list;
		$data['main_content'] = 'bar/all_stats';
		$this->load->view('user/includes/template', $data);
	}

	// Creates the split-testing set from POST
	function process_split() {
		if (isset($_POST['setName'])) {
			// Creating a new set
			$set_name = $_POST['setName'];
			$user_email = $this->site_data['email_address'];
			$user_id = $this->membership_model->get_user_id($user_email);
			$set_id = $this->user_model->create_split($user_id, $set_name);
			$msg = 'Your split-testing set has been successfully created!';
			$this->session->set_flashdata('success_message', $msg);
			redirect("user/edit_split/$set_id");
		} else if (isset($_POST['set_id'])) {
				$set_id = $_POST['set_id'];
				if (isset($_POST['bars'])) {
					if (is_array($_POST['bars'])) {
						$bars = $_POST['bars'];
					} else {
						$bars = array($_POST['bars']);
					}
				} else {
					$bars = array();
				}
				$this->user_model->update_set($set_id, $bars);
				$msg = 'Your split-testing set has been successfully updated!';
				$this->session->set_flashdata('success_message', $msg);
				redirect("user/edit_split/$set_id");

			}

	}

	function create_split() {
		$data['main_content'] = 'user/create_split';
		$this->load->view('user/includes/template', $data);
	}

	function edit_split($set_id) {
		$success_msg = $this->session->flashdata('success_message');
		$user_email = $this->site_data['email_address'];
		$user_id = $this->membership_model->get_user_id($user_email);
		$user_bars = $this->user_model->get_user_bars($user_id);
		$selected_bars = $this->user_model->get_set_bars_nice($set_id);
		$data['selected_bars'] = $selected_bars;
		$data['set_id'] = $set_id;
		$data['bars'] = $user_bars;;
		$data['main_content'] = 'user/edit_split';
		$data['success_message'] = $success_msg;
		$this->load->view('user/includes/template', $data);
	}

	function embed_set($set_id) {
		$this->load->model('bar/bar_model');
		$bars = $this->user_model->get_set_bars_nice($set_id);
		$bar_list = array();
		if (!empty($bars)) {
			foreach($bars as $bar_id) {
				$bar_height = $this->bar_model->get_bar_height($bar_id);
				$sticky = $this->bar_model->get_bar_sticky($bar_id);
				$bar_position = $this->bar_model->get_bar_position($bar_id);
				$exclude_pages = $this->bar_model->get_bar_exclude_pages($bar_id);
				$bar_list[$bar_id]['height'] = $bar_height;
				$bar_list[$bar_id]['sticky'] = $sticky;
				$bar_list[$bar_id]['excludePages'] = $exclude_pages;
				$bar_list[$bar_id]['barPosition'] = $bar_position;
			}
		}
		print_r($bar_list);
		$data['bars'] = $bar_list;
		$data['bar_height'] = $bar_height;
		$data['main_content'] = 'set/get_code';
		$this->load->view('user/includes/template', $data);
	}

	function split_testing() {
		$success_msg = $this->session->flashdata('success_message');
		$data['messages']['success_message'] = $success_msg;
		$user_email = $this->site_data['email_address'];
		$user_id = $this->membership_model->get_user_id($user_email);
		$sets = $this->user_model->get_user_sets($user_id);
		$data['sets'] = $sets;
		$data['main_content'] = 'user/split_testing';

		$this->load->view('user/includes/template', $data);
	}

	// Contact support page
	function support() {
		$success_msg = $this->session->flashdata('success_message');
		$data['main_content'] = 'user/contact_support';
		$data['messages']['success_message'] = $success_msg;
		$this->load->view('user/includes/template', $data);
	}

	function send_support() {
		$support_email = 'graemeboy@gmail.com'; // we'll change this some time.
		$user_email = $this->site_data['email_address'];
		if (isset($_POST['message'])) {
			$message = $_POST['message'];
		} else {
			$message = '';
		}
		if (isset($_POST['subject'])) {
			$subject = $_POST['subject'];
		} else {
			$subject = '';
		}
		$this->load->library('email');
		$this->email->from($user_email, 'BarSkin User');
		$this->email->to($support_email);
		$this->email->subject($subject);
		$this->email->message($message);
		// Now we'll send the email.
		$this->email->send();
		$msg = 'Your message has been successfully sent to support. We will try to get back to you within 48 hours. Thank you for your patience!';
		$this->session->set_flashdata('success_message', $msg);
		redirect('user/support');
	}

	function manage () {
		$success_msg = $this->session->flashdata('success_message');
		$user_email = $this->site_data['email_address'];
		$user_id = $this->membership_model->get_user_id($user_email);
		$user_bars = $this->user_model->get_user_bars($user_id);
		$data['bars'] = $user_bars;
		$data['main_content'] = 'user/manage_bars';
		$data['success_message'] = $success_msg;
		$this->load->view('user/includes/template', $data);
	}

	function index () {
		redirect('user/dashboard');
	}

	function set_stats($set_id, $date_range = 30) {
		$this->load->model('bar/bar_model');
		if ($set_id != 'all') {
			$bars = $this->user_model->get_set_bars_nice($set_id);
			$set_name = $this->user_model->get_split_name($set_id);
			$data['date_range'] = $date_range;
			$data['set_id'] = $set_id;
			$data['set_name'] = $set_name;
			foreach ($bars as $bar_id) {
				$name = $this->bar_model->get_bar_name($bar_id);
				$type = $this->bar_model->get_bar_middle_type($bar_id);
				$data['bars'][$bar_id]['bar_name'] = $name;
				$data['bars'][$bar_id]['type'] = ucwords($type);

				$total_impressions = $this->bar_model->get_all_impressions($bar_id);
				$total_submissions = $this->bar_model->get_all_submissions($bar_id);
				$impressions =
					$this->bar_model->get_impression_days($bar_id, $date_range);
				$submissions =
					$this->bar_model->get_submission_days($bar_id, $date_range);
				$data['bars'][$bar_id]['total_submissions'] = $total_submissions;
				$data['bars'][$bar_id]['submissions'] = $submissions;
				$data['bars'][$bar_id]['total_impressions'] = $total_impressions;
				$data['bars'][$bar_id]['impressions'] = $impressions;
			}
			$data['main_content'] = 'user/set_stats';
			$this->load->view('user/includes/template', $data);
		}
	}
	
	function upgrade() {
		$data['main_content'] = 'user/upgrade';
		$this->load->view('user/includes/template', $data);
	}

	function dashboard() {
		$user_email = $this->site_data['email_address'];
		$user_id = $this->membership_model->get_user_id($user_email);
		$bars_count = $this->user_model->get_number_bars($user_id);
		$sets_count = $this->user_model->get_number_sets($user_id);
		$data['role'] = $this->site_data['role'];
		$data['num_bars'] = $bars_count;
		$data['num_sets'] = $sets_count;
		$data['main_content'] = 'user/dashboard';
		$this->load->view('user/includes/template', $data);
	}

	function is_logged_in() {
		$is_logged_in = $this->session->userdata('logged_in');
		if (!isset($is_logged_in) || $is_logged_in != true) {
			echo "You don't have permission to access this page. ";
			echo '<a href="../login">Login</a>';
			die();
		}
	}

}
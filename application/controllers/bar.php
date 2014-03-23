<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bar extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$this->load->model('membership_model');
		$this->load->model('bar/bar_model');
		$logged_in = $this->session->userdata('logged_in');
		$this->site_data['email_address'] = $this->session->userdata('email_address');
		if ($logged_in) {
			$this->site_data['logged_in'] = TRUE;
		} else {
			$this->site_data['logged_in'] = FALSE;
		}
	}

	function update_range() {
		if (isset($_POST['date_range'])) {
			$date_range = $_POST['date_range'];
		} else {
			$date_range = 30;
		}
		if (isset($_POST['bar_id'])) {
			$id = $_POST['bar_id'];
			redirect("bar/stats/$id/$date_range");
		} else {
			die('No bar ID.');
		}
	}

	function stats($bar_id, $date_range = 30) {
		if ($bar_id != 'all') {
			$data['date_range'] = $date_range;
			$name = $this->bar_model->get_bar_name($bar_id);
			$type = $this->bar_model->get_bar_middle_type($bar_id);
			$data['bar_name'] = $name;
			$data['bar_id'] = $bar_id;
			$data['type'] = ucwords($type);
			
			if ($type == 'form') {
				
				
			}
			$total_impressions = $this->bar_model->get_all_impressions($bar_id);
			$total_submissions = $this->bar_model->get_all_submissions($bar_id);
			$impressions =
				$this->bar_model->get_impression_days($bar_id, $date_range);
			$submissions =
				$this->bar_model->get_submission_days($bar_id, $date_range);
			$data['total_submissions'] = $total_submissions;
			$data['submissions'] = $submissions;
			$data['total_impressions'] = $total_impressions;
			$data['impressions'] = $impressions;
			$data['main_content'] = 'bar/bar_stats';
			$this->load->view('user/includes/template', $data);
		}
	}

	function delete($bar_id, $conf = 'false') {
		if ($conf == 'false') {
			$bar_name = $this->bar_model->get_bar_name($bar_id);
			$data['bar_id'] = $bar_id;
			if ($bar_name) {
				$data['bar_name'] = $bar_name;
			} else {
				$data['bar_name'] = 'Unknown';
			}
			$data['main_content'] = 'bar/delete_bar';
			$this->load->view('user/includes/template', $data);

		} else if ($conf == 'true') {
				$this->bar_model->delete_bar($bar_id);
				$msg = '<span class="glyphicon glyphicon-fire" style="margin-right:5px"></span> Your bar has been successfully deleted!';
				$this->session->set_flashdata('success_message', $msg);
				redirect("user/bars");
			} else {
			die('Invalid delete request.');
		}
	}

	function new_bar() {
		if (isset($_POST['skinName'])) {
			// We're making a new bar!
			if (isset($_POST['skinName']) && trim($_POST['skinName']) != '') {
				$skin_name = $_POST['skinName'];
			} else {
				$skin_name = 'Untitled';
			}
			$email = $this->site_data['email_address'];
			$user_id = $this->membership_model->get_user_id($email);
			$bar_id = $this->bar_model->new_bar($user_id, $skin_name);
			if ($bar_id) {
				$msg = '<span class="glyphicon glyphicon-saved" style="margin-right:5px"></span> Well done! Your bar has been successfully initialized!';
				$this->session->set_flashdata('success_message', $msg);
				redirect("bar/edit/$bar_id");
			}
		}
	}

	function embed($bar_id) {
		$bar_height = $this->bar_model->get_bar_height($bar_id);
		$sticky = $this->bar_model->get_bar_sticky($bar_id);
		$bar_position = $this->bar_model->get_bar_position($bar_id);
		$exclude_pages = $this->bar_model->get_bar_exclude_pages($bar_id);
		$data['exclude_pages'] = $exclude_pages;
		$data['bar_position'] = $bar_position;
		$data['sticky'] = $sticky;
		$data['bar_id'] = $bar_id;
		$data['bar_height'] = $bar_height;
		$data['main_content'] = 'bar/get_code';
		$this->load->view('user/includes/template', $data);
	}

	function process_bar () {
		if (isset($_POST['bar_id'])) {
			$bar_id = $_POST['bar_id'];
			$bar_height = $_POST['bar_height'];
			$bar_defaults = $this->bar_model->get_bar_defaults();
			$bar_data = array();
			foreach ($bar_defaults as $i=>$d) {
				if (isset($_POST[$i])) {
					$bar_data[$i] = mysql_escape_string($_POST[$i]);
				} else {
					$bar_data[$i] = '';
				}
			}
			$data['bar_height'] = $bar_height;
			$this->bar_model->update_bar($bar_id, $bar_data);
			$msg = '<span class="glyphicon glyphicon-saved"></span> Your bar has been successfully updated!';
			$this->session->set_flashdata('success_message', $msg);
			redirect("bar/edit/$bar_id");
		} else {
			die('No bar ID specified');
		}
	}

	function edit($bar_id) {
		$user_id = $this->bar_model->get_bar_user_id($bar_id);
		$bar_name = $this->bar_model->get_bar_name($bar_id);
		$email = $this->site_data['email_address'];
		$user_id = $this->membership_model->get_user_id($email);
		$valid = 0;
		if ($user_id) {
			$valid = $this->bar_model->validate_user_bar($user_id, $bar_id);
		}
		if (!$valid) {
			die('You do not have permission to view this skin');
		}
		$success_msg = $this->session->flashdata('success_message');
		$bar_properties = $this->bar_model->get_bar_properties_nice($bar_id);

		$data['bar_id'] = $bar_id;
		$data['bar_name'] = $bar_name;
		$data['bar_properties'] = $bar_properties;
		$data['success_message'] = $success_msg;
		$font_list_nice = $this->bar_model->get_font_list_nice();
		$data['font_list_nice'] = $font_list_nice;
		$data['main_content'] = 'bar/edit_bar';
		$this->load->view('user/includes/template', $data);
	}

	function create () {
		$this->load->model('user/user_model');

		$email = $this->site_data['email_address'];
		$user_id = $this->membership_model->get_user_id($email);
		$bars_count = $this->user_model->get_number_bars($user_id);
		$user_role = $this->membership_model->get_user_role($email);

		if ($user_role == 'free' && $bars_count > 0) {
			$data['main_content'] = 'user/upgrade';
			$this->load->view('user/includes/template', $data);
		} else {
			$data['main_content'] = 'bar/create_bar';
			$this->load->view('user/includes/template', $data);
		}
	}

	function index () {
		redirect('bar/create');
	}

}
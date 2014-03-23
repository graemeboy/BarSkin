<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Us extends CI_Controller {

	function b($bar_id) {
		$this->load->model('bar/bar_model');
		$this->bar_model->add_impression($bar_id);
		$bar_data = $this->bar_model->get_bar_properties($bar_id);
		$bar_properties = array();
		foreach ($bar_data as $datum) {
			if (!isset($datum['value'])) {
				$bar_properties[$datum['property']] = '';
			} else {
				$bar_properties[$datum['property']] = stripslashes($datum['value']);
			}
		}
		$data['bar_properties'] = $bar_properties;
		$data['bar_id'] = $bar_id;
		$this->load->view('output/bar', $data);
	}
	
	// For single bars
	function c($bar_id) {
		$this->load->model('bar/bar_model');
		// We need height, $sticky, position, exclude_pages
		$sticky = $this->bar_model->get_bar_sticky($bar_id);
		$position = $this->bar_model->get_bar_position($bar_id);
		$exclude_pages = $this->bar_model->get_bar_exclude_pages($bar_id);
		$height = $this->bar_model->get_bar_height($bar_id);
		$data['height'] = $height;
		$data['sticky'] = $sticky;
		$data['position'] = $position;
		$data['exclude_pages'] = $exclude_pages;
		$data['bar_id'] = $bar_id;
		$this->load->view('output/script', $data);
	}
	// for split testing
	function i($set_id) {
		$this->load->model('bar/bar_model');
		$bars = $this->bar_model->get_set_bars_nice($set_id);
		$bar_id = $bars[array_rand($bars)];
		// Then we'll just get a randomly chosen one from this set
		$sticky = $this->bar_model->get_bar_sticky($bar_id);
		$position = $this->bar_model->get_bar_position($bar_id);
		$exclude_pages = $this->bar_model->get_bar_exclude_pages($bar_id);
		$height = $this->bar_model->get_bar_height($bar_id);
		$data['height'] = $height;
		$data['sticky'] = $sticky;
		$data['position'] = $position;
		$data['exclude_pages'] = $exclude_pages;
		$data['bar_id'] = $bar_id;
		$this->load->view('output/script', $data);
	}
	
	function s($bar_id) {
		if (isset($_POST['bar_id'])) {
			if($bar_id == $_POST['bar_id']) {
				$this->db->insert('submissions', array('bar_id' => $bar_id));
				echo 'inserted';	
			}
		}	
	}
}
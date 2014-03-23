<?php

class User_model extends CI_Model {

	function get_number_bars($user_id) {
		$this->db->where('user_id', $user_id);
		$this->db->select('id');
		$query = $this->db->get('bars');
		$result = $query->num_rows;
		return $result;
	}

	function get_number_sets($user_id) {
		$this->db->where('user_id', $user_id);
		$this->db->select('id');
		$query = $this->db->get('split_sets');
		$result = $query->num_rows;
		return $result;
	}

	function get_user_bars($user_id) {
		$this->db->where('user_id', $user_id);
		$this->db->order_by('date_created', 'desc');
		$query = $this->db->get('bars');
		$result = $query->result_array();
		return $result;
	}

	function get_set_bars_nice($set_id) {
		$bars = $this->get_set_bars($set_id);
		// Format them a bit
		$bar_list = array();
		if (!empty($bars)) {
			foreach($bars as $bar) {
				array_push($bar_list, $bar['bar_id']);
			}
		}
		return $bar_list;
	}

	function get_set_bars($set_id) {
		$this->db->select('bar_id');
		$this->db->where('set_id', $set_id);
		$query = $this->db->get('set_bars');
		if ($query->num_rows()) {
			$result = $query->result_array();
			return $result;
		} else {
			return array();
		}
	}

	function delete_split($split_id) {
		$this->db->delete('split_sets', array('id' => $split_id));
	}

	function get_split_name($split_id) {
		$this->db->select('set_name');
		$this->db->where('id', $split_id);
		$query = $this->db->get('split_sets');
		$result = $query->first_row('array');
		return $result['set_name'];
	}

	// Split-testing sets
	function get_user_sets($user_id) {
		$this->db->where('user_id', $user_id);
		$this->db->select('id, set_name');
		$query = $this->db->get('split_sets');
		$result = $query->result_array();
		return $result;
	}

	function update_set($set_id, $bars = array()) {
		$this->db->where('set_id', $set_id);
		$this->db->delete('set_bars');
		if (!empty($bars)) {
			foreach ($bars as $bar) {
				$new_bar = array (
					'set_id' => $set_id,
					'bar_id' => $bar,
				);
				$this->db->insert('set_bars', $new_bar);
			}
		}
	}

	function create_split($user_id, $set_name) {
		$split_data = array (
			'set_name' => $set_name,
			'user_id' => $user_id,
		);
		$this->db->insert('split_sets', $split_data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
}
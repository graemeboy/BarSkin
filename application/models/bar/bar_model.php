<?php

class Bar_model extends CI_Model {
	
	// This is a copy-over from the user model, just for loading efficiency
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
	
	function get_bar_properties($bar_id) {
		$this->db->where('bar_id', $bar_id);
		$query = $this->db->get('bar_properties');
		$result = $query->result_array();
		return $result;
	}

	function add_impression($bar_id) {
		$this->db->insert('impressions', array('bar_id'=>$bar_id));
	}

	function get_bar_middle_type($bar_id) {
		$this->db->select('value');
		$this->db->where('bar_id', $bar_id);
		$this->db->where('property', 'middleContentType');
		$query = $this->db->get('bar_properties');
		$result = $query->first_row('array');
		return $result['value'];
	}

	function get_overall_stats($user_id) {
		$this->load->model('user/user_model');
		$bars = $this->user_model->get_user_bars($user_id);
		$bars_list = array();
		if (!empty($bars)) {
			foreach ($bars as $bar) {
				$id = $bar['id'];
				$n = $bar['name'];
				$bars_list[$id] = array (
					'name' => $n,
					'all_impressions' => $this->get_all_impressions($id),
					'all_submissions' => $this->get_all_impressions($id),
					'impressions_today' => $this->get_impressions($id, 1),
					'submissions_today' => $this->get_submissions($id, 1),
					'impressions_30' => $this->get_impressions($id, 30),
					'submissions_30' => $this->get_submissions($id, 30),
				);
			}
		}
		return $bars_list;
	}

	function get_impressions($bar_id, $days) {
		$last_date = date('Y-m-d H:i:s', strtotime("-{$days} days"));
		$this->db->select('bar_id');
		$this->db->where('bar_id', $bar_id);
		$this->db->where('date_created >', "$last_date");
		$query = $this->db->get('impressions');
		$result = $query->num_rows;
		return $result;
	}

	function get_submissions($bar_id, $days) {
		$last_date = date('Y-m-d H:i:s', strtotime("-{$days} days"));
		$this->db->select('bar_id');
		$this->db->where('bar_id', $bar_id);
		$this->db->where('date_created >', "$last_date");
		$query = $this->db->get('submissions');
		$result = $query->num_rows;
		return $result;
	}

	function get_submission_days($bar_id, $days) {
		$last_date = date('Y-m-d H:i:s', strtotime("-{$days} days"));
		$this->db->select('bar_id, date_created');
		$this->db->where('bar_id', $bar_id);
		$this->db->where('date_created >', "$last_date");
		$query = $this->db->get('submissions');
		$result = $query->result_array();

		$units = array();
		for ($i = 0; $i < $days; $i++) {

			$d_start = date('j M Y', strtotime("-{$i} days"));
			$units[$d_start] = 0;
		}


		if (!empty($result)) {
			foreach ($result as $d) {
				$d = date('j M Y', strtotime($d['date_created']));
				$units[$d]++;
			}
		}
		return array_reverse($units);
	}

	function get_impression_days($bar_id, $days) {
		$last_date = date('Y-m-d H:i:s', strtotime("-{$days} days"));
		$this->db->select('bar_id, date_created');
		$this->db->where('bar_id', $bar_id);
		$this->db->where('date_created >', "$last_date");
		$query = $this->db->get('impressions');
		$result = $query->result_array();

		$units = array();
		for ($i = 0; $i < $days; $i++) {

			$d_start = date('j M Y', strtotime("-{$i} days"));
			$units[$d_start] = 0;
		}


		if (!empty($result)) {
			foreach ($result as $d) {
				$d = date('j M Y', strtotime($d['date_created']));
				$units[$d]++;
			}
		}
		return array_reverse($units);
	}

	function get_all_impressions($bar_id) {
		$this->db->select('bar_id');
		$this->db->where('bar_id', $bar_id);
		$query = $this->db->get('impressions');
		$result = $query->num_rows;
		return $result;
	}

	function get_all_submissions($bar_id) {
		$this->db->select('bar_id');
		$this->db->where('bar_id', $bar_id);
		$query = $this->db->get('submissions');
		$result = $query->num_rows;
		return $result;
	}

	function get_bar_height($bar_id) {
		$this->db->where('bar_id', $bar_id);
		$this->db->where('property', 'bar_height');
		$this->db->select('value');
		$this->db->limit(1);
		$query = $this->db->get('bar_properties');
		$result = $query->result_array();
		if ($query->num_rows) {
			return $result[0]['value'];
		} else {
			// we want to return a default here.
			return 55;
		}
	}

	function get_bar_properties_nice($bar_id) {
		$bar_data = $this->get_bar_properties($bar_id);
		$bar_properties = array();
		if (!empty($bar_data)) {
			foreach ($bar_data as $datum) {
				if (!isset($datum['value'])) {
					$bar_properties[$datum['property']] = '';
				} else {
					$bar_properties[$datum['property']] = $datum['value'];
				}
			}
		}
		// Just to make sure that it has everything covered.
		$bar_defaults = $this->get_bar_defaults();
		foreach ($bar_defaults as $k=>$v) {
			if (!isset($bar_properties[$k])) {
				$bar_properties[$k] = '';
			}
		}
		return $bar_properties;
	}

	function delete_bar($bar_id) {
		$this->db->delete('bars', array('id' => $bar_id));
	}
	
	function get_bar_sticky($bar_id) {
		$this->db->select('value');
		$query = $this->db->get_where('bar_properties', array('bar_id' => $bar_id, 'property' => 'sticky'), 1);
		$result = $query->first_row('array');
		if (isset($result['value'])) {
			return $result['value'];
		}
		return 'unknown';
	}
	
	function get_bar_exclude_pages ($bar_id) {
		$this->db->select('value');
		$query = $this->db->get_where('bar_properties', array('bar_id' => $bar_id, 'property' => 'excludePages'), 1);
		$result = $query->first_row('array');
		if (isset($result['value'])) {
			$pages = explode(' ', $result['value']);
			$pages = implode(',', $pages);
			return $pages;
		}
		return 'unknown';
	}
	
	function get_bar_position($bar_id) {
		$this->db->select('value');
		$query = $this->db->get_where('bar_properties', array('bar_id' => $bar_id, 'property' => 'barPosition'), 1);
		$result = $query->first_row('array');
		if (isset($result['value'])) {
			return $result['value'];
		}
		return 'unknown';
	}
	
	function get_bar_name($bar_id) {
		$this->db->select('name');
		$query = $this->db->get_where('bars', array('id' => $bar_id), 1);
		$result = $query->first_row('array');
		if (isset($result['name'])) {
			return $result['name'];
		}
		return 0;
	}

	function update_bar($bar_id, $bar_data) {
		$properties = array();
		if (!empty($bar_data)) {
			foreach ($bar_data as $n=>$prop) {
				$new_prop = array(
					'value' => $prop,
				);
				$this->db->where('bar_id', $bar_id);
				$this->db->where('property', $n);
				$this->db->update('bar_properties', $new_prop);
				$affected_rows = $this->db->affected_rows();
				if (!$affected_rows) {
					$new_prop['bar_id'] = $bar_id;
					$new_prop['property'] = $n;
					$this->db->insert('bar_properties', $new_prop);
				}
			}
		}

	}

	function validate_user_bar($user_id, $bar_id) {
		$bar_data['user_id'] = $user_id;
		$bar_data['id'] = $bar_id;
		$query = $this->db->get_where('bars', $bar_data, 1);
		return $query->num_rows();
	}

	function get_bar_user_id($bar_id) {
		$this->db->select('user_id');
		$this->db->where( 'id', $bar_id);
		$query = $this->db->get('bars');
		$result = $query->result_array();
		if (isset($result['user_id'])) {
			return $result['user_id'];
		}
		return 0;
	}

	function new_bar($user_id, $name) {
		$num = 1;
		$original_name = $name;
		while ($this->name_exists($name)) {
			$name = $original_name . "-$num";
			$num++;
		}
		$bar_data = array(
			'name' => $name,
			'user_id' => $user_id,
		);
		$this->db->insert('bars', $bar_data);
		$bar_id = $this->db->insert_id();

		$bar_defaults = $this->get_bar_defaults();

		$properties = array();
		if (!empty($bar_defaults)) {
			foreach ($bar_defaults as $n=>$prop) {
				$new_prop = array(
					'property' => $n,
					'value' => $prop,
					'bar_id' => $bar_id,
				);
				array_push($properties, $new_prop);
			}
		}
		$this->db->insert_batch('bar_properties', $properties);
		return $bar_id;
	}

	// Massive array of all the bar defaults
	function get_bar_defaults() {
		$defaults = array (
			// Background Style
			'bgTopColor' => '#002e60',
			'bgBottomColor' => '#022044',
			'bgBorderBottomSize' => '1',
			'bgBorderBottomColor' => '#022044',
			'bgPaddingTop' => '10',
			'bgPaddingBottom' => '10',
			
			// Left Content
			'leftContent' => 'Left Text',
			'leftFontType' => 'Helvetica, Arial, sans-serif',
			'leftColor' => '#f7fafb',
			'leftPaddingLeft' => '0',
			'leftPaddingRight' => '20',
			'leftFontSize' => '14',
			'leftFontWeight' => '400',
			'leftTextShadowTop' => '0',
			'leftTextShadowRight' => '0',
			'leftTextShadowBottom' => '0',
			'leftTextShadowLeft' => '0',
			'leftTextShadowColor' => '#ffffff',
			
			// Right Contetn
			'rightContent' => 'Right Text',
			'rightFontType' => 'Helvetica, Arial, sans-serif',
			'rightFontWeight' => '400',
			'rightColor' => '#f7fafb',
			'rightPaddingLeft' => '20',
			'rightPaddingRight' => '0',
			'rightFontSize' => '14',
			'rightTextShadowTop' => '0',
			'rightTextShadowRight' => '0',
			'rightTextShadowBottom' => '0',
			'rightTextShadowLeft' => '0',
			'rightTextShadowColor' => '#ffffff',
			
			// Middle Content
			'middleContentType' => 'form',
			'linkText' => 'Link Text',
			'linkColor' => '#f7fafb',
			'linkLocation' => '#',
			'linkFontType' => 'Helvetica, Arial, sans-serif',
			'linkSize' => '14',
			'linkFontWeight' => '400',
			'includeName' => 'yes',
			'linkTextShadowTop' => '0',
			'linkTextShadowRight' => '0',
			'linkTextShadowBottom' => '0',
			'linkTextShadowLeft' => '0',
			'linkTextShadowColor' => '#ffffff',
			
			'buttonText' => 'Submit',
			'buttonColor' => '#f7fafb',
			'buttonTextColor' => '#022044',
			'buttonBorderRadius' => '3',
			'buttonBorderColor' => '022044',
			'buttonFontType' => 'Helvetica Neue',
			'namePlaceholder' => 'Your Name',
			'emailPlaceholder' => 'Your Email',
			'onClick' => '_self',
			'sticky' => 'yes',
			'excludePages' => '',
			'barPosition' => 'top',
			'bar_height' => '50',
			'buttonVerticalPadding' => '5',
			'buttonFontSize' => '14',
			'buttonHorizontalPadding' => '5',

			// Now we can do some opt-in service provider settings.
			'formProvider' => 'aweber',
			// Let's start with aweber
			'aweberID' => '',
			'aweberAd' => '', // ad tracking
			'aweberRedirect' => '',
			// MailChimp
			'mailchimpHTML' => '',
			'mailchimpName' => 'FNAME',
			'mailchimpEmail' => 'EMAIL',
			// Constant Contact
			'constantContactHTML' => '',
			//Feedburner
			'feedburnerID' => '',
			// Custom Form - this one is quite important
			'customAction' => '',
			'customName' => '',
			'customEmail' => '',
			'customHiddenName1' => '',
			'customHiddenValue1' => '',
			'customHiddenName2' => '',
			'customHiddenValue2' => '',
			'customHiddenName3' => '',
			'customHiddenValue3' => '',
			'customHiddenName4' => '',
			'customHiddenValue4' => '',
		);
		return $defaults;
	}

	function name_exists($name) {
		$bar_data = array (
			'name' => $name,
		);
		$query = $this->db->get_where('bars', $bar_data, 1);
		return $query->num_rows();
	}

	function get_font_list_nice() {
		$font_list = $this->get_font_list();
		$font_list_nice = array ();
		if (!empty($font_list)) {
			foreach ($font_list as $f=>$d) {
				$font_list_nice[$d['value']] = $f;
			}
		}
		return $font_list_nice;
	}

	function get_font_list () {
		$font_list = array (
			'Georgia' => array (
				'value' => 'Georgia, serif',
				'type' => 'regular',
			),
			'Palatino Linotype' => array (
				'value' => 'Palatino Linotype, Book Antiqua, Palatino, serif',
				'type' => 'regular',
			),
			'Palatino' => array (
				'value' => 'Palatino, serif',
				'type' => 'regular',
			),
			'Times New Roman' => array (
				'value' => 'Times New Roman, Times, serif',
				'type' => 'regular',
			),
			'Times' => array (
				'value' => 'Times, serif',
				'type' => 'regular',
			),
			'Arial' => array (
				'value' => 'Arial, Helvetica, sans-serif',
				'type' => 'regular',
			),
			'Helvetica' => array (
				'value' => 'Helvetica, sans-serif',
				'type' => 'regular',
			),
			'Arial Black' => array (
				'value' => "Arial Black, Gadget, sans-serif",
				'type' => 'regular',
			),
			'Charcoal' => array (
				'value' => 'Charcoal, sans-serif',
				'type' => 'regular',
			),
			'Lucida Sans Unicode' => array (
				'value' => 'Lucida Sans Unicode, Lucida Grande, sans-serif',
				'type' => 'regular',
			),
			'Lucida Grande' => array (
				'value' => 'Lucida Grande, sans-serif',
				'type' => 'regular',
			),
			'Tahoma' => array (
				'value' => 'Tahoma, Geneva, sans-serif',
				'type' => 'regular',
			),
			'Geneva' => array (
				'value' => 'Geneva, Verdana, sans-serif',
				'type' => 'regular',
			),
			'Treuchet MS' => array (
				'value' => 'Trebuchet MS, Helvetica, sans-serif',
				'type' => 'regular',
			),
			'Helvetica Neue' => array (
				'value' => 'Helvetica Neue, sans-serif',
				'type' => 'regular',
			),
			'Verdana' => array (
				'value' => 'Verdana, Geneva, sans-serif',
				'type' => 'regular',
			),
			'Courier New' => array (
				'value' => 'Courier New, Courier, monospace',
				'type' => 'regular',
			),
			'Courier' => array (
				'value' => 'monospace',
				'type' => 'regular',
			),
			'Lucida Console' => array (
				'value' => 'Lucida Console, Monaco, monospace',
				'type' => 'regular',
			),
		);
		return $font_list;
	}

}

?>
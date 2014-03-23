<?php

class Membership_model extends CI_Model {

	function insert_user($user_data) {
		$user_data['password'] = md5($user_data['password']);
		$user_data['role'] = 'free';
		$this->db->insert('membership', $user_data);
	}
	
	function upgrade_user($email) {
		$data['role'] = 'paid';
		$this->db->where('email_address', $email);
		$this->db->update('membership', $data);
	}
	
	function get_user_role($email) {
		$this->db->select('role');
		$this->db->where('email_address', $email);
		$query = $this->db->get('membership');
		if ($query->num_rows > 0) {
			$result = $query->first_row('array');
			if (isset($result['role']) && trim($result['role']) != '') {
				return $result['role'];
			}
		}
		
		return 'free';
	}
	
	function send_validation_email($user_data) {
		$email = $user_data['email_address'];
		$en_email = urlencode($email);
		$confirmation_id = $user_data['confirmation_id'];
		$confirmation_link = base_url() . "index.php/login/confirmation/$en_email/$confirmation_id";
		$message = "Hi!

Thank you for joining BarSkin. This is just an email to let you know that the signup process has gone smoothly, and that you now have an account with us!

Please could you confirm your email address by clicking on the link below:
$confirmation_link

Have a great day!
BarSkin Team
		";
		$this->load->library('email');

		$this->email->from('hq@barskin.com', 'BarSkin Team');
		$this->email->to($email); 
		
		$this->email->subject('Welcome to BarSkin');
		$this->email->message($message);	
		
		$this->email->send();
	}
	
	function update_password($user, $password) {
		$data = array(
			'password' => md5($password),
		);

		$this->db->where('email_address', $user);
		$this->db->update('membership', $data); 
	}
	
	function get_user_id ($email) {
		$this->db->select('id');
		$this->db->where('email_address', $email);
		$query = $this->db->get('membership');
		$result = $query->result_array();
		if (isset($result[0]['id'])) {
			return $result[0]['id'];
		}
		return 0;
	}
	
	function validate_login($user_data) {
		$user_data['password'] = md5($user_data['password']);
		$query = $this->db->get_where('membership', $user_data, 1);
		return $query->num_rows();
	}
	
	function confirm_email($email, $confirmation_id) {
		$query = $this->db->get_where('membership', array('email_address' => $email, 'confirmation_id' => $confirmation_id), 1);
		if ($query->num_rows) {
			$new_data = array (
				'email_confirmed' => 1,
			);
			$this->db->where('email_address', $email);
			$this->db->update('membership', $new_data);
			return 1;
		} else {
			return 0;
		}

	}
}

?>
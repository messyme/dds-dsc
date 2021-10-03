<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_auth extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function login($c){
		$validate = $this->db->get_where('admin','username = "'.$c['username'].'"');

		$row = $validate->row();
		// Variabel untuk decrypt
		$ciphering = "AES-128-CTR";
		$iv_length = openssl_cipher_iv_length($ciphering);
		$options = 0;
		$decryption_iv = "1234567891011121";
		$decryption_key = "ddsdsctelkom";

		if ($c['password'] == openssl_decrypt($row->password, $ciphering, $decryption_key, $options, $decryption_iv)){
			if($validate->num_rows() > 0){
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}	
	}

	public function add_data_user($data){
		return $this->db->insert('admin', $data);
	}

	public function check_username($username){
		$this->db->where('username', $username);
		return $this->db->count_all_results('admin');	
	}

	public function check_email($email){
		$this->db->where('email', $email);
		return $this->db->count_all_results('admin');	
	}

	public function get_user($c){
		$user = $this->db->get_where('admin','username = "'.$c['username'].'"');
		$row = $user->row();
		return $row->role;
	}

	public function get_type($c){
		$user = $this->db->get_where('admin', 'username = "'.$c['username'].'"');
		$row = $user->row();
		return $row->role;
	}

    public function get_id_admin($username){
        $user = $this->db->get_where('admin', 'username = "'.$username.'"');
		$row = $user->row();
		return $row->id_admin;
    }

	public function get_email($c){
		$user = $this->db->get_where('admin','email = "'.$c['email'].'"');
		$row = $user->row();
		return $row->role;
	}

	public function get_verified($c){
		$user = $this->db->get_where('admin', 'username = "'.$c['username'].'"');
		$row = $user->row();
		return $row->verified;
	}

	public function request_forgot_password($email){
		$this->db->set('forget_password', true);
		$this->db->where('email', $email['email']);
		return $this->db->update('admin');
	}

    public function get_forgot_password($email){
        $user = $this->db->get_where('admin','email = "'.$email['email'].'"');
		$row = $user->row();
		return $row->forget_password;
    }

	public function cancel_forgot_password($c){
		$this->db->set('forget_password', false);
		$this->db->where('username', $c['username']);
		return $this->db->update('admin');
	}

}
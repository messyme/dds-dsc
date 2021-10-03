<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_dataAccount extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	// Data Admin
	public function get_data_admin(){ 
		return $this->db->get_where('admin', array('verified' => true));
	}

	public function get_data_unuser(){
		return $this->db->get_where('admin', array('verified' => false));
	}

	public function get_data_reqpassuser(){
		return $this->db->get_where('admin', array('forget_password' => true));
	}

    public function get_data_member(){ 
        $this->db->join('member_dsc', 'admin.username = member_dsc.nik');
        return $this->db->get_where('admin', array('role' => 'member'));
	}

	// @codeCoverageIgnoreStart
	public function add_data_admin($data){
		return $this->db->insert('admin', $data);
	}

	public function edit_data_admin($id_admin, $data){
		$this->db->set($data);
		$this->db->where('id_admin', $id_admin);
		return $this->db->update('admin');
	}

	public function del_data_admin($id_admin){
		$this->db->where('id_admin', $id_admin);
		return $this->db->delete('admin');
	}

	public function check_username_admin($username){
		$this->db->where('username', $username);
		return $this->db->count_all_results('admin');	
	}

	public function verify_data_user($id_admin){
		$this->db->set('verified', true);
		$this->db->where('id_admin', $id_admin);
		return $this->db->update('admin');
	}

	public function sendreqpassword($id_admin){
		$this->db->set('forget_password', false);
		$this->db->where('id_admin', $id_admin);
		return $this->db->update('admin');
	}

	public function get_username($id_admin){
		$user = $this->db->get_where('admin','id_admin = "'.$id_admin.'"');
		$row = $user->row();
		return $row->username;
	}

    // public function add_data_member($data){
	// 	return $this->db->insert('member', $data);
	// }

    // public function del_data_member($nik){
	// 	$this->db->where('username', $nik);
	// 	return $this->db->delete('member');
	// }


	// @codeCoverageIgnoreEnd
	//End Of Data Admin
	// @codeCoverageIgnoreEnd
}	


?>
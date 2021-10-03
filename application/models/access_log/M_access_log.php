<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_access_log extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getAuditTrailSuperAdmin(){
		$this->db->order_by('date_access', 'DESC');
		$data = $this->db->get_where('log_access', array('type_user' => 'superadmin'))->result();
		return $data;
	}

	public function getAuditTrailAdmin(){
		$this->db->order_by('date_access', 'DESC');
		$data = $this->db->get_where('log_access', array('type_user' => 'admin'))->result();
		return $data;
	}

	public function getAuditTrailGuest(){
		$this->db->order_by('date_access', 'DESC');
		$data = $this->db->get_where('log_access', array('type_user' => 'user'))->result();
		return $data;
	}

    public function getAuditTrailMember(){
		$this->db->order_by('date_access', 'DESC');
		$data = $this->db->get_where('log_access', array('type_user' => 'member'))->result();
		return $data;
	}
}	


?>
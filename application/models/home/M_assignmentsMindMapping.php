<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_assignmentsMindMapping extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function getContentAssignment(){
		$this->db->select('*');
		$this->db->from('content_struktur_organisasi');
		$this->db->where('id', 2);
		return $this->db->get()->result();   
	}

	public function editAboutAssignment( $data){
		$this->db->set($data);
		$this->db->where('id', 2);
		return $this->db->update('content_struktur_organisasi');
	}
}	


?>
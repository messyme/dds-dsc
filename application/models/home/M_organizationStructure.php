<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_organizationStructure extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function getStrukturOrganisasi(){
		$this->db->select('*');
		$this->db->from('content_struktur_organisasi');
		$this->db->where('id', 1);
		return $this->db->get()->result();   
	}

	public function editStrukturOrganisasi( $data){
		$this->db->set($data);
		$this->db->where('id', 1);
		return $this->db->update('content_struktur_organisasi');
	}
}	


?>
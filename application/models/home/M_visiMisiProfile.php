<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_visiMisiProfile extends CI_Model {

    public function __construct(){
      parent::__construct();
      $this->load->database();
    }

	public function getVisiMisi(){
		return $this->db->get('content_visi_misi')->result(); 
	}

	public function editVisi($visi, $misi){
		$this->db->set('visi', $visi);
		$this->db->set('misi', $misi);
		$this->db->where('id', 1);
		return $this->db->update('content_visi_misi');
	}

	public function editGroupHead($data){
		$this->db->set($data);
		$this->db->where('id', 1);
		return $this->db->update('content_sambutan_group');
	}

	public function getGroupHead(){
		return $this->db->get('content_sambutan_group')->result(); 
	}

	public function getDscProfile(){
		return $this->db->get('countent_about_dsc')->result(); 
	}

	public function editDscProfile($data){
		$this->db->set($data);
		$this->db->where('id', 1);
		return $this->db->update('countent_about_dsc');
	}
}	


?>
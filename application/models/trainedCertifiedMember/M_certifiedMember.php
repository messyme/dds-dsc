<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_certifiedMember extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

    // Certified Member
	public function get_certified_member(){ 
		$this->db->join('member_dsc', 'certified_member.nik = member_dsc.nik');
        $this->db->join('pathway', 'certified_member.id_pathway = pathway.id_pathway');
		return $this->db->get('certified_member');
	}

	public function get_certified_memberEdit($id){ 
		$this->db->join('member_dsc', 'certified_member.nik = member_dsc.nik');
        $this->db->join('pathway', 'certified_member.id_pathway = pathway.id_pathway');
		$this->db->where('id_certified_member ', $id);
		return $this->db->get('certified_member')->result();
	}

    public function updateDataCertifiedMember($id, $data){
		$this->db->set($data);
		$this->db->where('id_certified_member  ', $id);
		return $this->db->update('certified_member');
		// echo $this->db->last_query();
	}

    public function get_certified_member_detail($nik){
        $this->db->join('member_dsc', 'certified_member.nik = member_dsc.nik');
        $this->db->join('pathway', 'certified_member.id_pathway = pathway.id_pathway');
		return $this->db->get_where('certified_member', array('certified_member.nik' => $nik));
    }

	// @codeCoverageIgnoreStart
	public function add_certifiedmember($data){
		return $this->db->insert('certified_member', $data);
	}

	public function edit_certifiedmember($id_certified_member, $data){
		$this->db->set($data);
		$this->db->where('id_certified_member', $id_certified_member);
		return $this->db->update('certified_member');
	}

	public function delete_certifiedmember($id_certified_member){
		$this->db->where('id_certified_member', $id_certified_member);
		return $this->db->delete('certified_member');
	}

	public function get_nama_certified_member($nik){
		$user = $this->db->get_where('member_dsc','nik = "'.$nik.'"');
		$row = $user->row();
		return $row->nama_member;
	}

	public function get_nik($id_certified_member){
		$user = $this->db->get_where('certified_member','id_certified_member = "'.$id_certified_member.'"');
		$row = $user->row();
		return $row->nik;
	}

    public function get_pathway(){
		return $this->db->get('pathway');
    }
	// @codeCoverageIgnoreEnd
	//End Of Certified Member

	// Certification
	// public function get_certification_list(){ 
	// 	return $this->db->get('sertifikasi');
	// }

	// // @codeCoverageIgnoreStart
	// public function add_data_certification($data){
	// 	return $this->db->insert('sertifikasi', $data);
	// }

	// public function edit_data_certification($id_sertifikasi, $data){
	// 	$this->db->set($data);
	// 	$this->db->where('id_sertifikasi', $id_sertifikasi);
	// 	return $this->db->update('sertifikasi');
	// }

	// public function delete_data_certification($id_sertifikasi){
	// 	$this->db->where('id_sertifikasi', $id_sertifikasi);
	// 	return $this->db->delete('sertifikasi');
	// }

	// public function check_nama_sertifikasi($nama_sertifikasi){
	// 	$this->db->where('nama_sertifikasi', $nama_sertifikasi);
	// 	return $this->db->count_all_results('sertifikasi');	
	// }

	// public function get_nama_sertifikasi($id_sertifikasi){
	// 	$user = $this->db->get_where('sertifikasi','id_sertifikasi = "'.$id_sertifikasi.'"');
	// 	$row = $user->row();
	// 	return $row->nama_sertifikasi;
	// }
	// @codeCoverageIgnoreEnd
	// end of Certification
}	


?>
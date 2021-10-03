<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_apprentice extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	// Member Internship
	public function get_member_internship($status){ 
		$this->db->join('member_dsc', 'member_internship.nik = member_dsc.nik');
		$this->db->join('universitas', 'member_internship.kode_universitas = universitas.kode_universitas');
		$this->db->join('cluster_ed', 'member_internship.id_cluster_ed = cluster_ed.id_cluster_ed');
		$this->db->join('education_bg', 'member_internship.id_ed_bg = education_bg.id_ed_bg');
		$this->db->where('status_inactive', $status);
		return $this->db->get('member_internship');
	}

    public function get_member_internship_leader($nik){
        $this->db->join('member_dsc', 'member_internship.nik = member_dsc.nik');
		$this->db->join('universitas', 'member_internship.kode_universitas = universitas.kode_universitas');
		$this->db->join('education_bg', 'education_bg.id_ed_bg = member_internship.id_ed_bg');
		$this->db->where('status_inactive', 0);
		return $this->db->get_where('member_internship', array('member_internship.nik' => $nik));
    }
    
	public function get_member_appEdit($id){ 
		$this->db->join('member_dsc', 'member_internship.nik = member_dsc.nik');
		$this->db->join('universitas', 'member_internship.kode_universitas = universitas.kode_universitas');
		$this->db->join('cluster_ed', 'member_internship.id_cluster_ed = cluster_ed.id_cluster_ed');
		$this->db->join('education_bg', 'member_internship.id_ed_bg = education_bg.id_ed_bg');
		$this->db->where('member_internship.status_inactive = ', 0);
		$this->db->where('member_internship.nim = ', $id);
		return $this->db->get('member_internship')->result();
	}

	// @codeCoverageIgnoreStart
	public function add_internship($data){
		return $this->db->insert('member_internship', $data);
	}

	public function edit_internship($nim, $data){
		$this->db->set($data);
		$this->db->where('nim', $nim);
		return $this->db->update('member_internship');
	}

	public function updateStatusIntership($nim,$status){
		$this->db->set('status_inactive', $status);
		$this->db->where('nim', $nim);
		return $this->db->update('member_internship');
	}

	public function delete_internship($nim){
		$this->db->where('nim', $nim);
		return $this->db->delete('member_internship');
	}

	public function check_nim_member($nim){
		$this->db->where('nim', $nim);
		return $this->db->count_all_results('member_internship');	
	}

	public function get_nama($nim){
		$user = $this->db->get_where('member_internship','nim = "'.$nim.'"');
		$row = $user->row();
		return $row->nama_mahasiswa;
	}
	// @codeCoverageIgnoreEnd
	// end of Member Internship
}	


?>
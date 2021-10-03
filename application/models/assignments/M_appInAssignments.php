<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_appInAssignments extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function get_number_of_usecases_app(){
		return $this->db->query('SELECT member_internship.nama_mahasiswa, member_dsc.nama_member, universitas.nama_universitas, member_internship.tahun_intern, COUNT(usecase.nama_usecase) AS jml_usecase
		FROM member_internship
		JOIN member_dsc ON member_internship.nik = member_dsc.nik
		JOIN universitas ON member_internship.kode_universitas = universitas.kode_universitas
		JOIN member_usecase_inter ON member_internship.nim = member_usecase_inter.nim
		JOIN usecase ON member_usecase_inter.id_usecase = usecase.id_usecase
		GROUP BY member_internship.nama_mahasiswa, member_dsc.nama_member, universitas.nama_universitas, member_internship.tahun_intern
		ORDER BY jml_usecase DESC');
	}

	// Member in Assignment
	public function get_member_in_assignmentApp(){ 
		$this->db->join('member_internship', 'member_usecase_inter.nim = member_internship.nim');
		$this->db->join('groups', 'member_usecase_inter.id_groups = groups.id_groups');	
		$this->db->join('tribe', 'member_usecase_inter.id_tribe = tribe.id_tribe');
		$this->db->join('squad', 'member_usecase_inter.id_squad = squad.id_squad');
		$this->db->join('usecase', 'member_usecase_inter.id_usecase = usecase.id_usecase');
		$this->db->where('member_internship.status_inactive !=', '1');
		return $this->db->get('member_usecase_inter');
	}

	public function appNotInUsecase(){
		return $this->db->query('SELECT *
		FROM member_internship
		JOIN member_dsc ON member_dsc.nik = member_internship.nik
		JOIN universitas ON member_internship.kode_universitas = universitas.kode_universitas
		WHERE member_internship.nim NOT IN
		(SELECT member_usecase_inter.nim 
		FROM member_usecase_inter) AND member_internship.status_inactive = 0');
	}

	public function get_member_in_assignmentAppEdit($id){ 
		$this->db->join('member_internship', 'member_usecase_inter.nim = member_internship.nim');
		$this->db->join('groups', 'member_usecase_inter.id_groups = groups.id_groups');	
		$this->db->join('tribe', 'member_usecase_inter.id_tribe = tribe.id_tribe');
		$this->db->join('squad', 'member_usecase_inter.id_squad = squad.id_squad');
		$this->db->join('usecase', 'member_usecase_inter.id_usecase = usecase.id_usecase');
		$this->db->where('member_internship.status_inactive !=', '1');
		$this->db->where('member_usecase_inter.id = ', $id);
		return $this->db->get('member_usecase_inter')->result();
	}

	// @codeCoverageIgnoreStart
	public function add_memberusecaseApp($data){
		return $this->db->insert('member_usecase_inter', $data);
	}

	public function edit_memberusecaseApp($id_member_usecase, $data){
		$this->db->set($data);
		$this->db->where('id', $id_member_usecase);
		return $this->db->update('member_usecase_inter');
		// echo $this->db->last_query();
	}

	public function delete_memberusecaseApp($id_member_usecase){
		$this->db->where('id', $id_member_usecase);
		return $this->db->delete('member_usecase_inter');
	}

	public function get_nama($nim){
		$user = $this->db->get_where('member_internship','nim = "'.$nim.'"');
		$row = $user->row();
		return $row->nama_mahasiswa;
	}

	public function get_nim($id){
		$user = $this->db->get_where('member_usecase_inter','id = "'.$id.'"');
		$row = $user->row();
		return $row->nim;
	}
}	


?>
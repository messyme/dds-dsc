<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_searching extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	// search fitur query
	function searchallmember($keyword)
	{
		$this->db->select('*');
		$this->db->from('member_dsc');
		$this->db->like('nama_member', $keyword);

		$this->db->join('status', 'status.id_status = member_dsc.id_status');
		$this->db->join('posisi', 'posisi.id_posisi = member_dsc.id_posisi');
		$this->db->join('band', 'band.id_band = member_dsc.id_band');

		return $this->db->get();
	}

	public function searchMemberAlumni($keyword)
	{
		$this->db->select('*');
		$this->db->from('member_dsc');
		$this->db->like('nama_member', $keyword);

		$this->db->join('status', 'status.id_status = member_dsc.id_status');
		$this->db->join('posisi', 'posisi.id_posisi = member_dsc.id_posisi');
		$this->db->join('band', 'band.id_band = member_dsc.id_band');
		$this->db->where('member_dsc.id_status', 7);
		// Execute the query.
		$query = $this->db->get();
		return $query;
	}

	public function searchApprentice($keyword)
	{
		$this->db->select('*');
		$this->db->from('member_internship');
		$this->db->like('nama_mahasiswa', $keyword);

		$this->db->join('member_dsc', 'member_internship.nik = member_dsc.nik');
		$this->db->join('universitas', 'member_internship.kode_universitas = universitas.kode_universitas');
		$this->db->where('member_internship.status_inactive', 0);
		// Execute the query.
		$query = $this->db->get();
		return $query;
	}
	public function searchApprenticeRetired($keyword)
	{
		$this->db->select('*');
		$this->db->from('member_internship');
		$this->db->like('nama_mahasiswa', $keyword);

		$this->db->join('member_dsc', 'member_internship.nik = member_dsc.nik');
		$this->db->join('universitas', 'member_internship.kode_universitas = universitas.kode_universitas');
		$this->db->where('member_internship.status_inactive', 1);
		// Execute the query.
		$query = $this->db->get();
		return $query;
	}

	public function searchMemberkontrak($keyword)
	{
		$this->db->select('*');
		$this->db->from('member_dsc');
		$this->db->like('nama_member', $keyword);
		$this->db->join('status', 'status.id_status = member_dsc.id_status');
		$this->db->join('posisi', 'posisi.id_posisi = member_dsc.id_posisi');
		$this->db->join('band', 'band.id_band = member_dsc.id_band');
		$this->db->where('member_dsc.id_status !=', 7);
		$this->db->where('member_dsc.id_status !=', 3);

		$query = $this->db->get();
		return $query;
	}

	public function searchTrainedMember($keyword)
	{
		$this->db->select('trained_member.id_trained_member, member_dsc.nik,  member_dsc.nama_member, trained_member.nama_pelatihan, trained_member.tahun_pelatihan');
		$this->db->from('trained_member');
		$this->db->like('member_dsc.nama_member', $keyword);
		$this->db->or_like('trained_member.nama_pelatihan', $keyword);
		$this->db->join('member_dsc', 'trained_member.nik = member_dsc.nik');

		$query = $this->db->get();
		return $query;
	}

	public function searchCertifiedMember($keyword)
	{
		$this->db->select('*');
		$this->db->from('certified_member');
		$this->db->like('member_dsc.nama_member', $keyword);
		$this->db->or_like('nama_sertifikasi', $keyword);
		$this->db->join('member_dsc', 'certified_member.nik = member_dsc.nik');
		$query = $this->db->get();
		return $query;
	}

	public function searchMemberAssignments($keyword)
	{
		$this->db->select('*');
		$this->db->from('member_usecase');
		$this->db->like('nama_member', $keyword);
		$this->db->or_like('nama_squad', $keyword);
		$this->db->or_like('nama_tribe', $keyword);
		$this->db->or_like('nama_usecase', $keyword);
        $this->db->or_like('nama_groups', $keyword);
		$this->db->join('member_dsc', 'member_usecase.nik = member_dsc.nik');
		$this->db->join('groups', 'member_usecase.id_groups = groups.id_groups');
		$this->db->join('tribe', 'member_usecase.id_tribe = tribe.id_tribe');
		$this->db->join('squad', 'member_usecase.id_squad = squad.id_squad');
		$this->db->join('usecase', 'member_usecase.id_usecase = usecase.id_usecase');
		$this->db->where('member_dsc.id_status !=', '7');
		$query = $this->db->get();
		return $query;
	}

	public function searchAssignmentApp($keyword)
	{
		$this->db->select('*');
		$this->db->from('member_usecase_inter');
		$this->db->like('nama_mahasiswa', $keyword);
		$this->db->or_like('nama_squad', $keyword);
		$this->db->or_like('nama_tribe', $keyword);
		$this->db->or_like('nama_usecase', $keyword);
        $this->db->or_like('nama_groups', $keyword);
		$this->db->join('member_internship', 'member_usecase_inter.nim = member_internship.nim');
		$this->db->join('groups', 'member_usecase_inter.id_groups = groups.id_groups');
		$this->db->join('tribe', 'member_usecase_inter.id_tribe = tribe.id_tribe');
		$this->db->join('squad', 'member_usecase_inter.id_squad = squad.id_squad');
		$this->db->join('usecase', 'member_usecase_inter.id_usecase = usecase.id_usecase');
		$this->db->where('member_internship.status_inactive !=', '1');
		$query = $this->db->get();
		return $query;
	}

	public function searchJirareward($keyword)
	{
		$this->db->select('jirareward.id, jirareward.nik, jirareward.raw, jirareward.epic_tracking, jirareward.date_point, jirareward.last_updated, jirareward.raw_noa, member_dsc.nama_member, jirareward.key1, jirareward.key2, jirareward.key3, jirareward.key4, jirareward.key5, jirareward.key6, jirareward.key7, jirareward.key8, jirareward.key9, jirareward.key10, jirareward.key11, jirareward.key12, jirareward.key13, jirareward.key14, jirareward.key15, jirareward.score1, jirareward.score2, jirareward.score3, jirareward.score4, jirareward.score5, jirareward.score6, jirareward.score7, jirareward.score8, jirareward.score9, jirareward.score10, jirareward.score11, jirareward.score12, jirareward.score13, jirareward.score14, jirareward.score15, jirareward.wv, jirareward.wv_noa, jirareward.raw_mean, jirareward.wv_raw_mean, jirareward.pwa_noa, jirareward.pwa_lod, jirareward.total_pwa, jirareward.ra');
		$this->db->from('jirareward');
		$this->db->like('member_dsc.nama_member', $keyword);
		$this->db->order_by('jirareward.ra', 'DESC');
		$this->db->order_by('member_dsc.nama_member', 'ASC');
		$this->db->join('member_dsc', 'jirareward.nik = member_dsc.nik');
		$query = $this->db->get();
		return $query;
	}

	public function searchJiramonitoring($keyword)
	{
		$data = $this->db->query("SELECT * FROM jiramonitoring AS a 
		INNER JOIN usecase AS u ON u.id_usecase = a.id_usecase 
		WHERE u.nama_usecase LIKE '%$keyword%'");
		return $data->result();
	}

	public function searchgruptribe($keyword)
	{
		$this->db->select('*');
		$this->db->from('groups');
		$this->db->like('nama_groups', $keyword);
		// Execute the query.
		$query = $this->db->get();
		return $query;
	}

	public function searchtribe($keyword)
	{
		$this->db->select('*');
		$this->db->from('tribe');
		$this->db->like('nama_groups', $keyword);
		$this->db->or_like('nama_tribe', $keyword);
		$this->db->join('groups', 'tribe.id_groups = groups.id_groups');
		$query = $this->db->get();
		return $query;
	}

	public function searchsquad($keyword)
	{
		$this->db->select('*');
		$this->db->from('squad');
		$this->db->like('nama_squad', $keyword);
		$this->db->or_like('nama_tribe', $keyword);
		$this->db->join('tribe', 'squad.id_tribe = tribe.id_tribe');
		$query = $this->db->get();
		return $query;
	}

	public function searchusecase($keyword)
	{
		$this->db->select('usecase.id_usecase, usecase.nama_usecase, squad.nama_squad, usecase_status.deskripsi_status');
		$this->db->from('usecase');
		$this->db->like('squad.nama_squad', $keyword);
		$this->db->or_like('usecase.nama_usecase', $keyword);
		$this->db->or_like('usecase_status.deskripsi_status', $keyword);
		$this->db->join('squad', 'usecase.id_squad = squad.id_squad');
		$this->db->join('usecase_status', 'usecase.id_usecase_status = usecase_status.id_usecase_status');
		$query = $this->db->get();
		return $query;
	}
}	


?>
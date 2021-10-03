<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_memberInAssignments extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_number_of_usecase()
	{
		return $this->db->query('SELECT member_dsc.nama_member, status.nama_status, COUNT(usecase.nama_usecase) AS jml_usecase
		FROM member_dsc
		JOIN status ON member_dsc.id_status = status.id_status
		JOIN member_usecase ON member_dsc.nik = member_usecase.nik
		JOIN usecase ON member_usecase.id_usecase = usecase.id_usecase
		WHERE member_dsc.id_status != 7 AND usecase.id_usecase_status = 1
		GROUP BY member_dsc.nama_member, status.nama_status
		ORDER BY jml_usecase DESC');
	}

	// Member in Assignment
	public function get_member_in_assignment()
	{
		$this->db->join('member_dsc', 'member_usecase.nik = member_dsc.nik');
		$this->db->join('groups', 'member_usecase.id_groups = groups.id_groups');
		$this->db->join('tribe', 'member_usecase.id_tribe = tribe.id_tribe');
		$this->db->join('squad', 'member_usecase.id_squad = squad.id_squad');
		$this->db->join('usecase', 'member_usecase.id_usecase = usecase.id_usecase');
		$this->db->where('member_dsc.id_status !=', '7');
		$this->db->where('usecase.id_usecase_status =', '1');
		return $this->db->get('member_usecase');
	}

	public function mdscNotInUsecase()
	{
		return $this->db->query('SELECT *
		FROM member_dsc
		JOIN status ON status.id_status = member_dsc.id_status
		JOIN posisi ON posisi.id_posisi = member_dsc.id_posisi
		JOIN band ON band.id_band = member_dsc.id_band
		WHERE member_dsc.nik NOT IN
		(SELECT member_usecase.nik 
		FROM member_usecase
		JOIN usecase ON member_usecase.id_usecase = usecase.id_usecase
		WHERE usecase.id_usecase_status = 1) AND
		member_dsc.id_status != 7');
	}

	// Member in Assignment
	public function get_member_in_assignmentEdit($id)
	{
		$this->db->join('member_dsc', 'member_usecase.nik = member_dsc.nik');
		$this->db->join('groups', 'member_usecase.id_groups = groups.id_groups');
		$this->db->join('tribe', 'member_usecase.id_tribe = tribe.id_tribe');
		$this->db->join('squad', 'member_usecase.id_squad = squad.id_squad');
		$this->db->join('usecase', 'member_usecase.id_usecase = usecase.id_usecase');
		$this->db->where('member_dsc.id_status !=', '7');
		$this->db->where('member_usecase.id_member_usecase = ', $id);
		return $this->db->get('member_usecase')->result();
	}

	public function get_usecase_leader_list()
	{
		$this->db->select(
			'member_usecase.id_member_usecase, member_dsc.nama_member,
			groups.nama_groups,
			tribe.nama_tribe,
			usecase.nama_usecase,
			squad.nama_squad,
			member_dsc.nik,
			usecase.occupancy_rate,
			usecase.occupancy_status,
			workload_point_usecase.point, member_usecase.status_member'
		);
		$this->db->join('member_dsc', 'member_usecase.nik = member_dsc.nik');
		$this->db->join('groups', 'member_usecase.id_groups = groups.id_groups');
		$this->db->join('tribe', 'member_usecase.id_tribe = tribe.id_tribe');
		$this->db->join('squad', 'member_usecase.id_squad = squad.id_squad');
		$this->db->join('usecase', 'member_usecase.id_usecase = usecase.id_usecase');
		$this->db->join('workload_point_usecase', 'workload_point_usecase.id_workload_point_usecase = usecase.level_usecase', 'left');
		$this->db->join('workload_usecase_level', 'workload_usecase_level.id_workload_usecase_level = workload_point_usecase.level', 'left');
		$this->db->where('member_dsc.id_status !=', '7');
		$this->db->where('member_usecase.usecase_leader =', '1');
		$this->db->where('usecase.id_usecase_status =', '1');
		//$this->db->where('member_usecase.id_usecase =', $id_usecase);
		//return $this->db->get('member_usecase');
		//return $this->db->get_where('member_usecase', array('member_usecase.id_usecase' => $id_usecase));
		return $this->db->get('member_usecase');
	}

	public function get_usecase_member_list()
	{
		$this->db->select(
			'member_usecase.id_member_usecase, member_dsc.nama_member,
			groups.nama_groups,
			tribe.nama_tribe,
			usecase.nama_usecase,
			squad.nama_squad,
			member_dsc.nik,
			usecase.occupancy_rate,
			usecase.occupancy_status,
			workload_point_usecase.point, member_usecase.status_member'
		);
		$this->db->join('member_dsc', 'member_usecase.nik = member_dsc.nik');
		$this->db->join('groups', 'member_usecase.id_groups = groups.id_groups');
		$this->db->join('tribe', 'member_usecase.id_tribe = tribe.id_tribe');
		$this->db->join('squad', 'member_usecase.id_squad = squad.id_squad');
		$this->db->join('usecase', 'member_usecase.id_usecase = usecase.id_usecase');
		$this->db->join('workload_point_usecase', 'workload_point_usecase.id_workload_point_usecase = usecase.level_usecase', 'left');
		$this->db->join('workload_usecase_level', 'workload_usecase_level.id_workload_usecase_level = workload_point_usecase.level', 'left');
		$this->db->where('member_dsc.id_status !=', '7');
		$this->db->where('member_usecase.usecase_leader !=', '1');
		$this->db->where('usecase.id_usecase_status =', '1');
		//$this->db->where('member_usecase.id_usecase =', $id_usecase);
		//return $this->db->get('member_usecase');
		//return $this->db->get_where('member_usecase', array('member_usecase.id_usecase' => $id_usecase));
		return $this->db->get('member_usecase');
	}

	// @codeCoverageIgnoreStart
	public function add_memberusecase($data)
	{
		return $this->db->insert('member_usecase', $data);
	}

	public function edit_memberusecase($id_member_usecase, $data)
	{

		$this->db->set($data);
		$this->db->where('id_member_usecase', $id_member_usecase);
		return $this->db->update('member_usecase');
		// echo $this->db->last_query();
	}

	public function delete_memberusecase($id_member_usecase)
	{
		$this->db->where('id_member_usecase', $id_member_usecase);
		return $this->db->delete('member_usecase');
	}

	public function get_nama($nik)
	{
		$user = $this->db->get_where('member_dsc', 'nik = "' . $nik . '"');
		$row = $user->row();
		return $row->nama_member;
	}

	public function get_nik($id_member_usecase)
	{
		$user = $this->db->get_where('member_usecase', 'id_member_usecase = "' . $id_member_usecase . '"');
		$row = $user->row();
		return $row->nik;
	}

	public function get_id_usecase($id_member_usecase)
	{
		$user = $this->db->get_where('member_usecase', 'id_member_usecase = "' . $id_member_usecase . '"');
		$row = $user->row();
		return $row->id_usecase;
	}

	public function workload_point()
	{
		$this->db->join('workload_usecase_level', 'workload_usecase_level.id_workload_usecase_level = workload_point_usecase.level', 'left');
		return $this->db->get('workload_point_usecase');
	}


	//occupancy rate & status usecase
	public function update_occupancy_rate_usecase($id_usecase){
		return $this->db->query(
			"UPDATE usecase set occupancy_rate = 
			(select CAST(((sum(point)/threshold)*100)  as decimal(10,2)) 
			from usecase as uc 
			join member_usecase as mu on uc.id_usecase = mu.id_usecase
			join member_dsc as md on md.nik = mu.nik
			join workload_point_member as wpm
			join workload_threshold_usecase as wtu on wtu.id_workload_threshold_usecase = uc.level_usecase
			WHERE wpm.posisi_type =  md.id_posisi_type AND wpm.posisi_level =  md.id_posisi_level
			AND mu.id_usecase = '$id_usecase')
			WHERE id_usecase = '$id_usecase'"
		);
	}

	public function update_occupancy_status_usecase($id_usecase){
		return $this->db->query(
			"UPDATE usecase set occupancy_status = 
			(select 
			CASE
			WHEN occupancy_rate <70 THEN 'Underload'
			WHEN occupancy_rate >=70 AND occupancy_rate <=100 THEN 'Balanced'
			WHEN occupancy_rate > 100 THEN 'Overload'
			END AS occupancy_status
			FROM usecase
			Where id_usecase = '$id_usecase')
			Where id_usecase = '$id_usecase'"
		);
	}

	//occupancy rate & status member
	public function update_occupancy_rate_member($nik){
		return $this->db->query(
			"UPDATE member_dsc set occupancy_rate = 
			(select CAST(((sum(point)/threshold)*100)  as decimal(10,2)) 
			from member_dsc as md 
			join member_usecase as mu  on md.nik = mu.nik
			join usecase as uc  on uc.id_usecase = mu.id_usecase 
			join workload_point_usecase as wpu on wpu.id_workload_point_usecase = uc.level_usecase
			join workload_threshold_member as wtm
			WHERE wtm.posisi_type =  md.id_posisi_type AND wtm.posisi_level =  md.id_posisi_level
			AND md.nik =  '$nik')
			where nik = '$nik'"
		);
	}

	public function update_occupancy_status_member($nik){
		return $this->db->query(
			"UPDATE member_dsc set occupancy_status = 
			(select 
			CASE
			WHEN occupancy_rate <70 THEN 'Underload'
			WHEN occupancy_rate >=70 AND occupancy_rate <=100 THEN 'Balanced'
			WHEN occupancy_rate > 100 THEN 'Overload'
			END AS occupancy_status
			FROM member_dsc
			Where nik = '$nik')
			Where nik = '$nik'"
		);
	}
	// @codeCoverageIgnoreEnd
	//End Of Member in Assignment
}

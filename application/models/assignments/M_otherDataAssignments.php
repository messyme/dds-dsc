<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_otherDataAssignments extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Groups
	public function get_groups()
	{
		return $this->db->get('groups');
	}

	// @codeCoverageIgnoreStart
	public function add_group($data)
	{
		return $this->db->insert('groups', $data);
	}

	public function edit_group($id_groups, $data)
	{
		$this->db->set($data);
		$this->db->where('id_groups', $id_groups);
		return $this->db->update('groups');
	}

	public function delete_group($id_groups)
	{
		$this->db->where('id_groups', $id_groups);
		return $this->db->delete('groups');
	}

	public function check_nama_group($nama_groups)
	{
		$this->db->where('nama_groups', $nama_groups);
		return $this->db->count_all_results('groups');
	}

	public function get_nama_groups($id_groups)
	{
		$user = $this->db->get_where('groups', 'id_groups = "' . $id_groups . '"');
		$row = $user->row();
		return $row->nama_groups;
	}
	// @codeCoverageIgnoreEnd
	//End Of Groups

	// Tribe
	public function get_tribe()
	{
		$this->db->join('groups', 'tribe.id_groups = groups.id_groups');
		$this->db->join('unit_tribe', 'unit_tribe.id_unit = tribe.unit');
		return $this->db->get('tribe');
	}

	// @codeCoverageIgnoreStart
	public function add_tribe($data)
	{
		return $this->db->insert('tribe', $data);
	}

	public function edit_tribe($id_tribe, $data)
	{
		$this->db->set($data);
		$this->db->where('id_tribe', $id_tribe);
		return $this->db->update('tribe');
	}

	public function delete_tribe($id_tribe)
	{
		$this->db->where('id_tribe', $id_tribe);
		return $this->db->delete('tribe');
	}

	public function check_nama_tribe($nama_tribe)
	{
		$this->db->where('nama_tribe', $nama_tribe);
		return $this->db->count_all_results('tribe');
	}

	public function get_nama_tribe($id_tribe)
	{
		$user = $this->db->get_where('tribe', 'id_tribe = "' . $id_tribe . '"');
		$row = $user->row();
		return $row->nama_tribe;
	}
	// @codeCoverageIgnoreEnd
	//End Of Tribe

	// Squad
	public function get_squad()
	{
		$this->db->join('tribe', 'squad.id_tribe = tribe.id_tribe');
		return $this->db->get('squad');
	}

	// @codeCoverageIgnoreStart
	public function add_squad($data)
	{
		return $this->db->insert('squad', $data);
	}

	public function edit_squad($id_squad, $data)
	{
		$this->db->set($data);
		$this->db->where('id_squad', $id_squad);
		return $this->db->update('squad');
	}

	public function delete_squad($id_squad)
	{
		$this->db->where('id_squad', $id_squad);
		return $this->db->delete('squad');
	}

	public function check_nama_squad($nama_squad)
	{
		$this->db->where('nama_squad', $nama_squad);
		return $this->db->count_all_results('squad');
	}

	public function get_nama_squad($id_squad)
	{
		$user = $this->db->get_where('squad', 'id_squad = "' . $id_squad . '"');
		$row = $user->row();
		return $row->nama_squad;
	}
	// @codeCoverageIgnoreEnd
	//End Of Squad

	// Use Case
	public function get_usecase()
	{
		$this->db->join('usecase_status', 'usecase.id_usecase_status = usecase_status.id_usecase_status');
		// $this->db->join('member_usecase', 'usecase.id_usecase = member_usecase.id_usecase', 'left outer');
		// $this->db->join('member_dsc', 'member_dsc.nik = member_usecase.nik', 'left outer');
		//$this->db->join('member_dsc', 'usecase.id_leader = member_dsc.nik');
		$this->db->join('squad', 'usecase.id_squad = squad.id_squad');
		$this->db->join('tribe', 'squad.id_tribe = tribe.id_tribe');
		$this->db->join('groups', 'tribe.id_groups = groups.id_groups');
		$this->db->join('workload_point_usecase', 'workload_point_usecase.id_workload_point_usecase = usecase.level_usecase', 'left');
		$this->db->join('workload_usecase_level', 'workload_usecase_level.id_workload_usecase_level = workload_point_usecase.level', 'left');
		$this->db->group_by('usecase.id_usecase');
		return $this->db->get('usecase');
	}
	
	public function get_usecase_group($id_usecase)
	{
		$this->db->join('squad', 'usecase.id_squad = squad.id_squad');
		$this->db->join('tribe', 'squad.id_tribe = tribe.id_tribe');
		$this->db->join('groups', 'tribe.id_groups = groups.id_groups');
		$usecase = $this->db->get_where('usecase', 'id_usecase = "' . $id_usecase . '"');
		$row = $usecase->row();
		return $row->id_groups;
	}

	public function get_usecase_tribe($id_usecase)
	{
		$this->db->join('squad', 'usecase.id_squad = squad.id_squad');
		$this->db->join('tribe', 'squad.id_tribe = tribe.id_tribe');
		$this->db->join('groups', 'tribe.id_groups = groups.id_groups');
		$usecase = $this->db->get_where('usecase', 'id_usecase = "' . $id_usecase . '"');
		$row = $usecase->row();
		return $row->id_tribe;
	}

	public function get_usecase_squad($id_usecase)
	{
		$this->db->join('squad', 'usecase.id_squad = squad.id_squad');
		$this->db->join('tribe', 'squad.id_tribe = tribe.id_tribe');
		$this->db->join('groups', 'tribe.id_groups = groups.id_groups');
		$usecase = $this->db->get_where('usecase', 'id_usecase = "' . $id_usecase . '"');
		$row = $usecase->row();
		return $row->id_squad;
	}

	public function get_usecase_exclude($nik)
	{
		return $this->db->query("SELECT * FROM usecase
			JOIN squad ON usecase.id_squad = squad.id_squad
			JOIN tribe ON squad.id_tribe = tribe.id_tribe
			JOIN groups ON tribe.id_groups = groups.id_groups
			WHERE usecase.id_usecase_status = 1 AND usecase.id_usecase NOT IN (SELECT member_usecase.id_usecase FROM member_usecase WHERE member_usecase.nik = '$nik')
		");
	}

	public function get_usecase_in_progress()
	{
		$this->db->join('usecase_status', 'usecase.id_usecase_status = usecase_status.id_usecase_status');
		// $this->db->join('member_usecase', 'usecase.id_usecase = member_usecase.id_usecase', 'left outer');
		// $this->db->join('member_dsc', 'member_dsc.nik = member_usecase.nik', 'left outer');
		//$this->db->join('member_dsc', 'usecase.id_leader = member_dsc.nik');
		$this->db->join('squad', 'usecase.id_squad = squad.id_squad');
		$this->db->join('tribe', 'squad.id_tribe = tribe.id_tribe');
		$this->db->join('groups', 'tribe.id_groups = groups.id_groups');
		//$this->db->group_by('usecase.id_usecase');
		return $this->db->get_where('usecase', array('usecase.id_usecase_status' => 1));
	}

	public function get_usecase_in_progress_nik($id_usecase_nik)
	{
		$this->db->join('usecase_status', 'usecase.id_usecase_status = usecase_status.id_usecase_status');
		// $this->db->join('member_dsc', 'usecase.id_leader = member_dsc.nik');
		$this->db->join('squad', 'usecase.id_squad = squad.id_squad');
		$this->db->join('tribe', 'squad.id_tribe = tribe.id_tribe');
		$this->db->join('groups', 'tribe.id_groups = groups.id_groups');
		$this->db->where_not_in('id_usecase', $id_usecase_nik);
		return $this->db->get_where('usecase', array('usecase.id_usecase_status' => 1));
	}

	public function get_usecase_in_progress_without_id_usecase($array_of_id_usecase)
	{
		$this->db->join('usecase_status', 'usecase.id_usecase_status = usecase_status.id_usecase_status');
		// $this->db->join('member_usecase', 'usecase.id_usecase = member_usecase.id_usecase', 'left outer');
		// $this->db->join('member_dsc', 'member_dsc.nik = member_usecase.nik', 'left outer');
		// $this->db->join('member_dsc', 'usecase.id_leader = member_dsc.nik');
		$this->db->join('squad', 'usecase.id_squad = squad.id_squad');
		$this->db->join('tribe', 'squad.id_tribe = tribe.id_tribe');
		$this->db->join('groups', 'tribe.id_groups = groups.id_groups');
		$this->db->where_not_in('usecase.id_usecase', $array_of_id_usecase);
		$this->db->group_by('usecase.id_usecase');
		return $this->db->get_where('usecase', array('usecase.id_usecase_status' => 1));
	}

	public function get_usecase_in_progress_leader($id_usecase)
	{
		$this->db->join('usecase_status', 'usecase.id_usecase_status = usecase_status.id_usecase_status');
		// $this->db->join('member_dsc', 'usecase.id_leader = member_dsc.nik');
		$this->db->join('squad', 'usecase.id_squad = squad.id_squad');
		$this->db->join('tribe', 'squad.id_tribe = tribe.id_tribe');
		$this->db->join('groups', 'tribe.id_groups = groups.id_groups');
		return $this->db->get_where('usecase', array('usecase.id_usecase_status' => 1, 'usecase.id_usecase' => $id_usecase))->row();
	}

	public function get_usecase_leader_idt($nik)
	{
		return $this->db->query("SELECT * FROM usecase
			JOIN squad ON usecase.id_squad = squad.id_squad
			JOIN tribe ON squad.id_tribe = tribe.id_tribe
			JOIN groups ON tribe.id_groups = groups.id_groups
			WHERE usecase.id_usecase_status = 1 AND usecase.id_usecase IN (SELECT member_usecase.id_usecase FROM member_usecase WHERE member_usecase.nik = '$nik' AND member_usecase.usecase_leader = 1)
		");
		// $this->db->join('usecase_status', 'usecase.id_usecase_status = usecase_status.id_usecase_status');
		// $this->db->join('member_usecase', 'usecase.id_usecase = member_usecase.id_usecase', 'left outer');
		// $this->db->join('member_dsc', 'member_usecase.nik = member_dsc.nik', 'left outer');
		// $this->db->join('squad', 'usecase.id_squad = squad.id_squad');
		// $this->db->join('tribe', 'squad.id_tribe = tribe.id_tribe');
		// $this->db->join('groups', 'tribe.id_groups = groups.id_groups');
		// $this->db->group_by('usecase.id_usecase');
		// return $this->db->get_where('usecase', array('member_usecase.nik' => $nik, 'usecase.id_usecase_status' => 1, 'member_usecase.usecase_leader' => 1));
	}

	public function get_member_in_usecase($id_usecase)
	{
		$this->db->join('member_dsc', 'member_usecase.nik = member_dsc.nik');
		$this->db->join('groups', 'member_usecase.id_groups = groups.id_groups');
		$this->db->join('squad', 'member_usecase.id_squad = squad.id_squad');
		$this->db->join('tribe', 'member_usecase.id_tribe = tribe.id_tribe');
		$this->db->join('usecase', 'member_usecase.id_usecase = usecase.id_usecase');
		$this->db->where('member_dsc.id_status !=', '7');
		$this->db->where('member_usecase.usecase_leader =', '0');
		$this->db->where('member_usecase.id_usecase =', $id_usecase);
		return $this->db->get('member_usecase');
	}

	public function get_member_detail_usecase($nik)
	{
		$this->db->join('groups', 'member_usecase.id_groups = groups.id_groups');
		$this->db->join('tribe', 'member_usecase.id_tribe = tribe.id_tribe');
		$this->db->join('squad', 'member_usecase.id_squad = squad.id_squad');
		$this->db->join('usecase', 'member_usecase.id_usecase = usecase.id_usecase');
		$this->db->join('member_dsc', 'member_usecase.nik = member_dsc.nik');
		$this->db->join('usecase_status', 'usecase.id_usecase_status = usecase_status.id_usecase_status');
		$this->db->where('member_dsc.id_status !=', '7');
		return $this->db->get_where('member_usecase', array('member_usecase.nik' => $nik));
	}

	public function get_member_detail_usecase_idt($nik)
	{
		return $this->db->query("SELECT * FROM usecase
			JOIN squad ON usecase.id_squad = squad.id_squad
			JOIN tribe ON squad.id_tribe = tribe.id_tribe
			JOIN groups ON tribe.id_groups = groups.id_groups
			WHERE usecase.id_usecase_status = 1 AND usecase.id_usecase IN (SELECT member_usecase.id_usecase FROM member_usecase WHERE member_usecase.nik = '$nik' AND member_usecase.usecase_leader = 0)
		");
		// $this->db->join('member_dsc', 'member_usecase.nik = member_dsc.nik');
		// $this->db->join('groups', 'member_usecase.id_groups = groups.id_groups');
		// $this->db->join('tribe', 'member_usecase.id_tribe = tribe.id_tribe');
		// $this->db->join('squad', 'member_usecase.id_squad = squad.id_squad');
		// $this->db->join('usecase', 'member_usecase.id_usecase = usecase.id_usecase');
		// $this->db->join('usecase_status', 'usecase.id_usecase_status = usecase_status.id_usecase_status');
		// $this->db->where('member_dsc.id_status !=', '7');
		// $this->db->where('member_usecase.usecase_leader =', '0');
		// return $this->db->get_where('member_usecase', array('member_usecase.nik' => $nik, 'usecase.id_usecase_status' => 1));
	}

	public function get_member_detail_usecase_inprogress($nik)
	{
		$this->db->join('member_dsc', 'member_usecase.nik = member_dsc.nik');
		$this->db->join('groups', 'member_usecase.id_groups = groups.id_groups');
		$this->db->join('tribe', 'member_usecase.id_tribe = tribe.id_tribe');
		$this->db->join('squad', 'member_usecase.id_squad = squad.id_squad');
		$this->db->join('usecase', 'member_usecase.id_usecase = usecase.id_usecase');
		$this->db->join('usecase_status', 'usecase.id_usecase_status = usecase_status.id_usecase_status');
		$this->db->where('member_dsc.id_status !=', '7');
		$this->db->where('member_usecase.usecase_leader =', '0');
		$this->db->order_by('usecase.nama_usecase', 'ASC');
		return $this->db->get_where('member_usecase', array('member_usecase.nik' => $nik, 'usecase_status.id_usecase_status' => 1));
	}

	public function get_id_usecase_member_detail_usecase_inprogress($nik)
	{
		$this->db->select('member_usecase.id_usecase');
		$this->db->join('usecase', 'member_usecase.id_usecase = usecase.id_usecase');
		$this->db->join('usecase_status', 'usecase.id_usecase_status = usecase_status.id_usecase_status');
		//$this->db->where('member_usecase.usecase_leader =', '0');
		return $this->db->get_where('member_usecase', array('member_usecase.nik' => $nik, 'usecase_status.id_usecase_status' => 1));
	}

	public function get_member_detail_usecase_inprogress_default($nik)
	{
		$this->db->join('member_dsc', 'member_usecase.nik = member_dsc.nik');
		$this->db->join('groups', 'member_usecase.id_groups = groups.id_groups');
		$this->db->join('tribe', 'member_usecase.id_tribe = tribe.id_tribe');
		$this->db->join('squad', 'member_usecase.id_squad = squad.id_squad');
		$this->db->join('usecase', 'member_usecase.id_usecase = usecase.id_usecase');
		$this->db->join('usecase_status', 'usecase.id_usecase_status = usecase_status.id_usecase_status');
		$this->db->where('member_dsc.id_status !=', '7');
		$this->db->where('member_usecase.usecase_leader =', '0');
		$this->db->order_by('usecase.nama_usecase', 'ASC');
		return $this->db->get_where('member_usecase', array('member_usecase.nik' => $nik, 'usecase_status.id_usecase_status' => 1))->row(0);
	}

	public function get_member_detail_usecase_inprogress_default_assigned($nik, $id_usecase)
	{
		$this->db->join('member_dsc', 'member_usecase.nik = member_dsc.nik');
		$this->db->join('groups', 'member_usecase.id_groups = groups.id_groups');
		$this->db->join('tribe', 'member_usecase.id_tribe = tribe.id_tribe');
		$this->db->join('squad', 'member_usecase.id_squad = squad.id_squad');
		$this->db->join('usecase', 'member_usecase.id_usecase = usecase.id_usecase');
		$this->db->join('usecase_status', 'usecase.id_usecase_status = usecase_status.id_usecase_status');
		$this->db->where('member_dsc.id_status !=', '7');
		$this->db->where('member_usecase.usecase_leader =', '0');
		$this->db->order_by('usecase.nama_usecase', 'ASC');
		return $this->db->get_where('member_usecase', array('member_usecase.nik' => $nik, 'usecase_status.id_usecase_status' => 1, 'member_usecase.id_usecase' => $id_usecase))->row(0);
	}

	public function get_member_internship_in_usecase($id_usecase)
	{
		$this->db->join('member_internship', 'member_usecase_inter.nim = member_internship.nim');
		$this->db->join('groups', 'member_usecase_inter.id_groups = groups.id_groups');
		$this->db->join('tribe', 'member_usecase_inter.id_tribe = tribe.id_tribe');
		$this->db->join('squad', 'member_usecase_inter.id_squad = squad.id_squad');
		$this->db->join('usecase', 'member_usecase_inter.id_usecase = usecase.id_usecase');
		$this->db->where('member_internship.status_inactive', 0);
		$this->db->where('member_usecase_inter.id_usecase =', $id_usecase);
		return $this->db->get('member_usecase_inter');
	}

	public function get_detail_usecase($id_usecase)
	{
		//$this->db->join('member_usecase', 'usecase.id_usecase = member_usecase.id_usecase', 'left outer');
		//$this->db->join('member_dsc', 'member_usecase.nik = member_dsc.nik', 'left outer');
		$this->db->join('usecase_status', 'usecase.id_usecase_status = usecase_status.id_usecase_status');
		$this->db->join('squad', 'usecase.id_squad = squad.id_squad');
		$this->db->join('tribe', 'squad.id_tribe = tribe.id_tribe');
		$this->db->join('groups', 'tribe.id_groups = groups.id_groups');
		$this->db->join('workload_point_usecase', 'workload_point_usecase.id_workload_point_usecase = usecase.level_usecase', 'left');
		$this->db->join('workload_usecase_level', 'workload_usecase_level.id_workload_usecase_level = workload_point_usecase.level', 'left');
		//$this->db->group_by('usecase.id_usecase');
		return $this->db->get_where('usecase', array('id_usecase' => $id_usecase))->row(0);
	}

	public function get_leader($nik)
	{
		$this->db->join('member_usecase', 'usecase.id_usecase = member_usecase.id_usecase');
		$this->db->join('member_dsc', 'member_usecase.nik = member_dsc.nik');
		return $this->db->get_where('usecase', array('member_usecase.nik' => $nik, 'usecase.id_usecase_status' => 1, 'member_usecase.usecase_leader' => 1));
	}

	public function get_leader_default($nik)
	{
		$this->db->join('member_usecase', 'usecase.id_usecase = member_usecase.id_usecase');
		$this->db->join('member_dsc', 'member_usecase.nik = member_dsc.nik');
		$this->db->order_by('usecase.nama_usecase', 'ASC');
		return $this->db->get_where('usecase', array('member_usecase.nik' => $nik, 'usecase.id_usecase_status' => 1, 'member_usecase.usecase_leader' => 1))->row(0);
	}

	public function get_leader_default_assigned($nik, $id_usecase)
	{
		$this->db->join('member_usecase', 'usecase.id_usecase = member_usecase.id_usecase');
		$this->db->join('member_dsc', 'member_usecase.nik = member_dsc.nik');
		$this->db->order_by('usecase.nama_usecase', 'ASC');
		return $this->db->get_where('usecase', array('member_usecase.nik' => $nik, 'usecase.id_usecase_status' => 1, 'member_usecase.usecase_leader' => 1, 'usecase.id_usecase' => $id_usecase))->row(0);
	}

	public function get_leader_usecase($id_usecase)
	{
		$this->db->join('member_usecase', 'usecase.id_usecase = member_usecase.id_usecase');
		$this->db->join('member_dsc', 'member_usecase.nik = member_dsc.nik');
		return $this->db->get_where('usecase', array('usecase.id_usecase' => $id_usecase, 'usecase.id_usecase_status' => 1, 'member_usecase.usecase_leader' => 1))->row(0);
	}

	public function get_usecase_leader($id_usecase)
	{
		$this->db->join('member_usecase', 'member_usecase.nik = member_dsc.nik');
		return $this->db->get_where('member_dsc', array('member_usecase.id_usecase' => $id_usecase, 'member_usecase.usecase_leader' => 1))->row(0);
	}

	//Usecase Resource Needs -->
	public function add_resource_needs($data)
	{
		return $this->db->insert('usecase_resource_needs', $data);
	}
	public function get_resource_needs($id_usecase)
	{
		return $this->db->get_where('usecase_resource_needs', array('id_usecase' => $id_usecase));
	}

	public function edit_resource_needs($id_usecase_resource_needs, $data)
	{
		$this->db->set($data);
		$this->db->where('id_usecase_resource_needs', $id_usecase_resource_needs);
		return $this->db->update('usecase_resource_needs');
	}


	public function delete_resource_needs($id_usecase_resource_needs)
	{
		$this->db->where('id_usecase_resource_needs', $id_usecase_resource_needs);
		return $this->db->delete('usecase_resource_needs');
	}

	public function get_role_resource($id_usecase_resource_needs)
	{
		$output = $this->db->get_where('usecase_resource_needs', 'id_usecase_resource_needs = "' . $id_usecase_resource_needs . '"');
		$row = $output->row();
		return $row->role;
	}
	//End Usecase Resource Needs 

	//Usecase Tool Needs -->
	public function add_tool_needs($data)
	{
		return $this->db->insert('usecase_tool_needs', $data);
	}
	public function get_tool_needs($id_usecase)
	{
		return $this->db->get_where('usecase_tool_needs', array('id_usecase' => $id_usecase));
	}

	public function edit_tool_needs($id_usecase_tool_needs, $data)
	{
		$this->db->set($data);
		$this->db->where('id_usecase_tool_needs', $id_usecase_tool_needs);
		return $this->db->update('usecase_tool_needs');
	}


	public function delete_tool_needs($id_usecase_tool_needs)
	{
		$this->db->where('id_usecase_tool_needs', $id_usecase_tool_needs);
		return $this->db->delete('usecase_tool_needs');
	}

	public function get_nama_tool($id_usecase_tool_needs)
	{
		$output = $this->db->get_where('usecase_tool_needs', 'id_usecase_tool_needs = "' . $id_usecase_tool_needs . '"');
		$row = $output->row();
		return $row->tool_name;
	}
	//End Usecase Tool Needs 

	//Usecase OKR Products -->
	public function add_okr_product($data)
	{
		return $this->db->insert('usecase_okr_product', $data);
	}
	public function get_okr_product($id_usecase)
	{
		$this->db->join('category_okr', 'category_okr.id_category_okr = usecase_okr_product.category_okr');
		$this->db->join('complexity_okr', 'complexity_okr.id_complexity_okr = usecase_okr_product.complexity');
		$this->db->join('too_okr', 'too_okr.id_too_okr = usecase_okr_product.type_of_output');
		$this->db->join('tof_okr', 'tof_okr.id_tof_okr = usecase_okr_product.type_of_formula');
		return $this->db->get_where('usecase_okr_product', array('id_usecase' => $id_usecase));
	}
	public function edit_okr_product($id_okr_product, $data)
	{
		$this->db->set($data);
		$this->db->where('id_okr_product', $id_okr_product);
		return $this->db->update('usecase_okr_product');
	}

	public function delete_okr_product($id_okr_product)
	{
		$this->db->where('id_okr_product', $id_okr_product);
		return $this->db->delete('usecase_okr_product');
	}

	public function get_kodifikasi_okr($id_okr_product)
	{
		$output = $this->db->get_where('usecase_okr_product', 'id_okr_product = "' . $id_okr_product . '"');
		$row = $output->row();
		return $row->kodifikasi;
	}

	public function get_avg_progress_okr_product($id_usecase)
	{
		$this->db->select_avg('progress');
		$query = $this->db->get_where('usecase_okr_product', 'id_usecase = "' . $id_usecase . '"');
		return $query->row()->progress;
	}

	//End Usecase OKR Products 

	//Usecase OKR Member -->
	public function add_okr_member($data)
	{
		return $this->db->insert('usecase_okr_member', $data);
	}
	public function get_okr_member($id_usecase)
	{
		$this->db->join('category_okr', 'category_okr.id_category_okr = usecase_okr_member.category_okr');
		$this->db->join('complexity_okr', 'complexity_okr.id_complexity_okr = usecase_okr_member.complexity');
		$this->db->join('too_okr', 'too_okr.id_too_okr = usecase_okr_member.type_of_output');
		$this->db->join('tof_okr', 'tof_okr.id_tof_okr = usecase_okr_member.type_of_formula');
		return $this->db->get_where('usecase_okr_member', array('id_usecase' => $id_usecase));
	}
	public function get_okr_member_by_nik($nik)
	{
		$this->db->join('usecase', 'usecase.id_usecase = usecase_okr_member.id_usecase');
		$this->db->join('category_okr', 'category_okr.id_category_okr = usecase_okr_member.category_okr');
		$this->db->join('complexity_okr', 'complexity_okr.id_complexity_okr = usecase_okr_member.complexity');
		$this->db->join('too_okr', 'too_okr.id_too_okr = usecase_okr_member.type_of_output');
		$this->db->join('tof_okr', 'tof_okr.id_tof_okr = usecase_okr_member.type_of_formula');
		return $this->db->get_where('usecase_okr_member', array('assignee' => $nik));
	}
	public function edit_okr_member($id_okr_member, $data)
	{
		$this->db->set($data);
		$this->db->where('id_okr_member', $id_okr_member);
		return $this->db->update('usecase_okr_member');
	}

	public function delete_okr_member($id_okr_member)
	{
		$this->db->where('id_okr_member', $id_okr_member);
		return $this->db->delete('usecase_okr_member');
	}

	public function get_member_okr_member($id_okr_member)
	{
		$output = $this->db->get_where('usecase_okr_member', 'id_okr_member = "' . $id_okr_member . '"');
		$row = $output->row();
		return $row->member;
	}

	public function get_avg_progress_okr_member($id_usecase)
	{
		$this->db->select_avg('progress');
		$query = $this->db->get_where('usecase_okr_member', 'id_usecase = "' . $id_usecase . '"');
		return $query->row()->progress;
	}

	public function get_avg_progress_okr_member_by_nik($nik)
	{
		$this->db->select_avg('progress');
		$query = $this->db->get_where('usecase_okr_member', 'assignee = "' . $nik . '"');
		return $query->row()->progress;
	}
	//End Usecase OKR Member

	public function get_okr_dsc($id_usecase)
	{
		$this->db->join('category_okr', 'category_okr.id_category_okr = usecase_okr_dsc.category_okr');
		$this->db->join('complexity_okr', 'complexity_okr.id_complexity_okr = usecase_okr_dsc.complexity');
		$this->db->join('too_okr', 'too_okr.id_too_okr = usecase_okr_dsc.type_of_output');
		$this->db->join('tof_okr', 'tof_okr.id_tof_okr = usecase_okr_dsc.type_of_formula');
		return $this->db->get_where('usecase_okr_dsc', array('id_usecase' => $id_usecase));
	}

	public function add_okr_dsc($data)
	{
		return $this->db->insert('usecase_okr_dsc', $data);
	}

	public function edit_okr_dsc($id_okr_dsc, $data)
	{
		$this->db->set($data);
		$this->db->where('id_okr_dsc', $id_okr_dsc);
		return $this->db->update('usecase_okr_dsc');
	}

	public function get_kodifikasi_okr_dsc($id_okr_dsc)
	{
		$output = $this->db->get_where('usecase_okr_dsc', 'id_okr_dsc = "' . $id_okr_dsc . '"');
		$row = $output->row();
		return $row->kodifikasi;
	}

	public function delete_okr_dsc($id_okr_dsc)
	{
		$this->db->where('id_okr_dsc', $id_okr_dsc);
		return $this->db->delete('usecase_okr_dsc');
	}

	public function get_avg_progress_okr_dsc($id_usecase)
	{
		$this->db->select_avg('progress');
		$query = $this->db->get_where('usecase_okr_dsc', 'id_usecase = "' . $id_usecase . '"');
		return $query->row()->progress;
	}

	public function get_training_needs($id_usecase)
	{
		return $this->db->get_where('usecase_training_needs', array('id_usecase' => $id_usecase));
	}

	public function add_training_needs($data)
	{
		return $this->db->insert('usecase_training_needs', $data);
	}

	public function edit_training_needs($id_usecase_training_needs, $data)
	{
		$this->db->set($data);
		$this->db->where('id_usecase_training_needs', $id_usecase_training_needs);
		return $this->db->update('usecase_training_needs');
	}

	public function get_nama_training_needs($id_usecase_training_needs)
	{
		$output = $this->db->get_where('usecase_training_needs', 'id_usecase_training_needs = "' . $id_usecase_training_needs . '"');
		$row = $output->row();
		return $row->training_name;
	}

	public function delete_training_needs($id_usecase_training_needs)
	{
		$this->db->where('id_usecase_training_needs', $id_usecase_training_needs);
		return $this->db->delete('usecase_training_needs');
	}

	public function get_skill_existing($id_usecase)
	{
		return $this->db->get_where('usecase_skill_existing', array('id_usecase' => $id_usecase));
	}

	public function add_skill_existing($data)
	{
		return $this->db->insert('usecase_skill_existing', $data);
	}

	public function edit_skill_existing($id_usecase_skill_existing, $data)
	{
		$this->db->set($data);
		$this->db->where('id_usecase_skill_existing', $id_usecase_skill_existing);
		return $this->db->update('usecase_skill_existing');
	}

	public function get_nama_skill_existing($id_usecase_skill_existing)
	{
		$output = $this->db->get_where('usecase_skill_existing', 'id_usecase_skill_existing = "' . $id_usecase_skill_existing . '"');
		$row = $output->row();
		return $row->skill_name;
	}

	public function delete_skill_existing($id_usecase_skill_existing)
	{
		$this->db->where('id_usecase_skill_existing', $id_usecase_skill_existing);
		return $this->db->delete('usecase_skill_existing');
	}

	public function get_output($id_usecase)
	{
		return $this->db->get_where('usecase_output', array('id_usecase' => $id_usecase));
	}

	public function add_output($data)
	{
		return $this->db->insert('usecase_output', $data);
	}

	public function edit_output($id_output_usecase, $data)
	{
		$this->db->set($data);
		$this->db->where('id_output_usecase', $id_output_usecase);
		return $this->db->update('usecase_output');
	}

	public function get_nama_output($id_output_usecase)
	{
		$output = $this->db->get_where('usecase_output', 'id_output_usecase = "' . $id_output_usecase . '"');
		$row = $output->row();
		return $row->output_name;
	}

	public function delete_output($id_output_usecase)
	{
		$this->db->where('id_output_usecase', $id_output_usecase);
		return $this->db->delete('usecase_output');
	}

	public function get_data_source($id_usecase)
	{
		return $this->db->get_where('usecase_data_source', array('id_usecase' => $id_usecase));
	}

	public function add_data_source($data)
	{
		return $this->db->insert('usecase_data_source', $data);
	}

	public function edit_data_source($id_data_source, $data)
	{
		$this->db->set($data);
		$this->db->where('id_data_source', $id_data_source);
		return $this->db->update('usecase_data_source');
	}

	public function get_nama_data_source($id_data_source)
	{
		$data_source = $this->db->get_where('usecase_data_source', 'id_data_source = "' . $id_data_source . '"');
		$row = $data_source->row();
		return $row->data_source_name;
	}

	public function delete_data_source($id_data_source)
	{
		$this->db->where('id_data_source', $id_data_source);
		return $this->db->delete('usecase_data_source');
	}

	public function get_usecase_task($id_usecase)
	{
		// $this->db->join('usecase_status', 'usecase_task.id_status = usecase_status.id_usecase_status');
		// return $this->db->get_where('usecase_task', array('id_usecase' => $id_usecase));
		return $this->db->query(
			"SELECT ut.date, ut.id_usecase, ut.id_usecase_task, ut.start_time, ut.end_time, ut.task_name, ut.task_description, dsc2.nama_member AS assignee, dsc1.nama_member AS reporter, ut.feedback, ut.status, sut.nama_status, ut.id_reporter, ut.id_assignee 
        FROM usecase_task ut
        JOIN status_usecase_task sut ON ut.status = sut.id_status_usecase_task
        JOIN member_dsc dsc1 ON ut.id_reporter = dsc1.nik
        JOIN member_dsc dsc2 ON ut.id_assignee = dsc2.nik
        WHERE ut.id_usecase = '$id_usecase'"
		);
	}

	public function get_usecase_task_nik($id_usecase, $nik)
	{
		// $this->db->join('status_usecase_task', 'status_usecase_task.id_status_usecase_task = usecase_task.status');
		// $this->db->join('member_dsc', 'usecase_task.id_reporter = member_dsc.nik');
		// $this->db->group_start();
		// $this->db->where('id_assignee', $nik);
		// $this->db->or_where('id_reporter', $nik);
		// $this->db->group_end();
		// return $this->db->get_where('usecase_task', array('id_usecase' => $id_usecase));
		return $this->db->query(
			"SELECT ut.date, ut.id_usecase, ut.id_usecase_task, ut.start_time, ut.end_time, ut.task_name, ut.task_description, dsc2.nama_member AS assignee, dsc1.nama_member AS reporter, ut.feedback, ut.status, sut.nama_status, ut.id_reporter, ut.id_assignee 
        FROM usecase_task ut
        JOIN status_usecase_task sut ON ut.status = sut.id_status_usecase_task
        JOIN member_dsc dsc1 ON ut.id_reporter = dsc1.nik
        JOIN member_dsc dsc2 ON ut.id_assignee = dsc2.nik
        WHERE (ut.id_reporter = '$nik' OR ut.id_assignee = '$nik') AND ut.id_usecase = '$id_usecase'"
		);
	}

	public function count_get_usecase_task_nik($id_usecase, $nik)
	{
		$this->db->join('status_usecase_task', 'status_usecase_task.id_status_usecase_task = usecase_task.status');
		$this->db->join('member_dsc', 'usecase_task.id_reporter = member_dsc.nik');
		$this->db->group_start();
		$this->db->where('id_assignee', $nik);
		$this->db->or_where('id_reporter', $nik);
		$this->db->group_end();
		return $this->db->get_where('usecase_task', array('id_usecase' => $id_usecase))->num_rows();
	}

	public function get_all_usecase_task_nik($nik)
	{
		// $this->db->join('status_usecase_task', 'status_usecase_task.id_status_usecase_task = usecase_task.status');
		// $this->db->join('member_dsc', 'usecase_task.id_reporter = member_dsc.nik');
		// $this->db->group_start();
		// $this->db->where('id_assignee', $nik);
		// $this->db->or_where('id_reporter', $nik);
		// $this->db->group_end();
		// return $this->db->get_where('usecase_task');
		return $this->db->query(
			"SELECT ut.date, ut.id_usecase, ut.id_usecase_task, ut.start_time, ut.end_time, ut.task_name, ut.task_description, dsc2.nama_member AS assignee, dsc1.nama_member AS reporter, ut.feedback, ut.status, sut.nama_status, ut.id_reporter, ut.id_assignee   
        FROM usecase_task ut
        JOIN status_usecase_task sut ON ut.status = sut.id_status_usecase_task
        JOIN member_dsc dsc1 ON ut.id_reporter = dsc1.nik
        JOIN member_dsc dsc2 ON ut.id_assignee = dsc2.nik
        WHERE (ut.id_reporter = '$nik' OR ut.id_assignee = '$nik')"
		);
	}

	public function get_usecase_task_nik_filter($id_usecase, $nik, $month, $year)
	{
		// $this->db->join('status_usecase_task', 'status_usecase_task.id_status_usecase_task = usecase_task.status');
		// $this->db->join('member_dsc', 'usecase_task.id_reporter = member_dsc.nik');
		// $this->db->group_start();
		// $this->db->where('id_assignee', $nik);
		// $this->db->or_where('id_reporter', $nik);
		// $this->db->group_end();
		// return $this->db->get_where('usecase_task', array('id_usecase' => $id_usecase, 'month(date)' => $month, 'year(date)' => $year));
		return $this->db->query(
			"SELECT ut.date, ut.id_usecase, ut.id_usecase_task, ut.start_time, ut.end_time, ut.task_name, ut.task_description, dsc2.nama_member AS assignee, dsc1.nama_member AS reporter, ut.feedback, ut.status, sut.nama_status, ut.id_reporter, ut.id_assignee   
        FROM usecase_task ut
        JOIN status_usecase_task sut ON ut.status = sut.id_status_usecase_task
        JOIN member_dsc dsc1 ON ut.id_reporter = dsc1.nik
        JOIN member_dsc dsc2 ON ut.id_assignee = dsc2.nik
        WHERE (ut.id_reporter = '$nik' OR ut.id_assignee = '$nik') AND ut.id_usecase = '$id_usecase' AND month(ut.date) = '$month' AND year(ut.date) = '$year'"
		);
	}

	public function get_usecase_task_detail_member_filter($id_usecase, $nik, $month, $year, $status)
	{
		return $this->db->query(
			"SELECT ut.date, ut.id_usecase_task, ut.start_time, ut.end_time, ut.task_name, ut.task_description, dsc2.nama_member AS assignee, dsc1.nama_member AS reporter, ut.feedback, ut.status, sut.nama_status, ut.id_reporter, ut.id_assignee   
        FROM usecase_task ut
        JOIN status_usecase_task sut ON ut.status = sut.id_status_usecase_task
        JOIN member_dsc dsc1 ON ut.id_reporter = dsc1.nik
        JOIN member_dsc dsc2 ON ut.id_assignee = dsc2.nik
        WHERE (ut.id_reporter = '$nik' OR ut.id_assignee = '$nik') AND ut.id_usecase = '$id_usecase' AND month(ut.date) = '$month' AND year(ut.date) = '$year' AND ut.status = '$status'"
		);
	}

	public function get_usecase_task_nik_not_sent($id_usecase, $nik)
	{
		// $this->db->join('status_usecase_task', 'status_usecase_task.id_status_usecase_task = usecase_task.status');
		// $this->db->join('member_dsc', 'usecase_task.id_reporter = member_dsc.nik');
		// $this->db->group_start();
		// $this->db->where('id_assignee', $nik);
		// $this->db->or_where('id_reporter', $nik);
		// $this->db->group_end();
		// return $this->db->get_where('usecase_task', array('id_usecase' => $id_usecase, 'status' => 1));
		return $this->db->query(
			"SELECT ut.date, ut.id_usecase, ut.id_usecase_task, ut.start_time, ut.end_time, ut.task_name, ut.task_description, dsc2.nama_member AS assignee, dsc1.nama_member AS reporter, ut.feedback, ut.status, sut.nama_status, ut.id_reporter, ut.id_assignee   
        FROM usecase_task ut
        JOIN status_usecase_task sut ON ut.status = sut.id_status_usecase_task
        JOIN member_dsc dsc1 ON ut.id_reporter = dsc1.nik
        JOIN member_dsc dsc2 ON ut.id_assignee = dsc2.nik
        WHERE (ut.id_reporter = '$nik' OR ut.id_assignee = '$nik') AND ut.status = 1 AND ut.id_usecase = '$id_usecase' "
		);
	}

	public function get_usecase_task_nik_waiting_for_approval($id_usecase, $nik)
	{
		// $this->db->join('status_usecase_task', 'status_usecase_task.id_status_usecase_task = usecase_task.status');
		// $this->db->join('member_dsc', 'usecase_task.id_reporter = member_dsc.nik');
		// $this->db->group_start();
		// $this->db->where('id_assignee', $nik);
		// $this->db->or_where('id_reporter', $nik);
		// $this->db->group_end();
		// return $this->db->get_where('usecase_task', array('id_usecase' => $id_usecase, 'status' => 1));
		return $this->db->query(
			"SELECT ut.date, ut.id_usecase, ut.id_usecase_task, ut.start_time, ut.end_time, ut.task_name, ut.task_description, dsc2.nama_member AS assignee, dsc1.nama_member AS reporter, ut.feedback, ut.status, sut.nama_status, ut.id_reporter, ut.id_assignee   
        FROM usecase_task ut
        JOIN status_usecase_task sut ON ut.status = sut.id_status_usecase_task
        JOIN member_dsc dsc1 ON ut.id_reporter = dsc1.nik
        JOIN member_dsc dsc2 ON ut.id_assignee = dsc2.nik
        WHERE (ut.id_reporter = '$nik' AND ut.id_assignee = '$nik') AND ut.status = 2 AND ut.id_usecase = '$id_usecase' "
		);
	}

	public function get_all_status_usecase_task()
	{
		return $this->db->get('status_usecase_task');
	}

	public function get_member_usecase($id_usecase)
	{
		// $this->db->from('member_dsc as m2');
		$this->db->join('usecase', 'member_usecase.id_usecase = usecase.id_usecase');
		$this->db->join('member_dsc', 'member_usecase.nik = member_dsc.nik');
		$this->db->join('posisi', 'member_dsc.id_posisi = posisi.id_posisi');
		// $this->db->join('usecase_task', 'm2.nik = usecase_task.id_reporter');
		// $this->db->join('usecase_task', 'usecase.id_leader = usecase_task.id_reporter');
		return $this->db->get_where('member_usecase', array('member_usecase.id_usecase' => $id_usecase, 'member_usecase.usecase_leader' => 0));
	}

	public function get_all_member_usecase()
	{
		// $this->db->from('member_dsc as m2');
		$this->db->join('usecase', 'member_usecase.id_usecase = usecase.id_usecase');
		$this->db->join('member_dsc', 'member_usecase.nik = member_dsc.nik');
		$this->db->join('posisi', 'member_dsc.id_posisi = posisi.id_posisi');
		// $this->db->join('usecase_task', 'm2.nik = usecase_task.id_reporter');
		// $this->db->join('usecase_task', 'usecase.id_leader = usecase_task.id_reporter');
		return $this->db->get('member_usecase');
	}

	public function get_all_member_dsc_in_usecase($id_usecase)
	{
		// $this->db->from('member_dsc as m2');
		$this->db->join('member_usecase', 'member_usecase.nik = member_dsc.nik');
		// $this->db->group_by('member_dsc.nik');
		// $this->db->where('member_usecase.id_usecase !=', $id_usecase);
		$this->db->join('usecase', 'member_usecase.id_usecase = usecase.id_usecase');
		// $this->db->join('posisi', 'member_dsc.id_posisi = posisi.id_posisi');
		// $this->db->join('usecase_task', 'm2.nik = usecase_task.id_reporter');
		// $this->db->join('usecase_task', 'usecase.id_leader = usecase_task.id_reporter');
		$this->db->join('status', 'status.id_status = member_dsc.id_status');
		$this->db->join('posisi', 'posisi.id_posisi = member_dsc.id_posisi');
		$this->db->join('band', 'band.id_band = member_dsc.id_band');
		$this->db->join('cluster_ed', 'cluster_ed.id_cluster_ed = member_dsc.id_cluster_ed');
		$this->db->join('education_bg', 'education_bg.id_ed_bg = member_dsc.id_ed_bg');
		$this->db->where('member_dsc.id_status !=', 7);
		return $this->db->get_where('member_dsc', array('member_usecase.id_usecase' => $id_usecase));
		// return $this->db->get('member_dsc');
	}

	public function get_leader_dsc_in_usecase($id_usecase)
	{
		$this->db->join('member_usecase', 'member_usecase.nik = member_dsc.nik');
		$this->db->join('usecase', 'member_usecase.id_usecase = usecase.id_usecase');
		$this->db->join('status', 'status.id_status = member_dsc.id_status');
		$this->db->join('posisi', 'posisi.id_posisi = member_dsc.id_posisi');
		$this->db->join('band', 'band.id_band = member_dsc.id_band');
		$this->db->join('cluster_ed', 'cluster_ed.id_cluster_ed = member_dsc.id_cluster_ed');
		$this->db->join('education_bg', 'education_bg.id_ed_bg = member_dsc.id_ed_bg');
		$this->db->where('member_dsc.id_status !=', 7);
		return $this->db->get_where('member_dsc', array('member_usecase.id_usecase' => $id_usecase, 'member_usecase.usecase_leader' => 1))->row();
	}

	public function get_member_usecase_nik($nik, $id_usecase)
	{
		$this->db->join('usecase', 'member_usecase.id_usecase = usecase.id_usecase');
		$this->db->join('member_dsc', 'member_usecase.nik = member_dsc.nik');
		$this->db->join('posisi', 'member_dsc.id_posisi = posisi.id_posisi');
		// $this->db->join('leader', 'member_dsc.nik = usecase.id_leader');
		return $this->db->get_where('member_usecase', array('member_usecase.id_usecase' => $id_usecase, 'member_usecase.nik' => $nik));
	}

	public function get_usecase_task_member($id_usecase, $nik)
	{
		// $this->db->join('status_usecase_task', 'status_usecase_task.id_status_usecase_task = usecase_task.status');
		// $this->db->join('member_dsc', 'usecase_task.id_reporter = member_dsc.nik');
		// $this->db->group_start();
		// $this->db->where('id_assignee', $nik);
		// $this->db->or_where('id_reporter', $nik);
		// $this->db->group_end();
		// return $this->db->get_where('usecase_task', array('id_usecase' => $id_usecase));
		return $this->db->query(
			"SELECT ut.date, ut.id_usecase, ut.id_usecase_task, ut.start_time, ut.end_time, ut.task_name, ut.task_description, dsc2.nama_member AS assignee, dsc1.nama_member AS reporter, ut.feedback, ut.status, sut.nama_status, ut.id_reporter, ut.id_assignee   
        FROM usecase_task ut
        JOIN status_usecase_task sut ON ut.status = sut.id_status_usecase_task
        JOIN member_dsc dsc1 ON ut.id_reporter = dsc1.nik
        JOIN member_dsc dsc2 ON ut.id_assignee = dsc2.nik
        WHERE (ut.id_reporter = '$nik' OR ut.id_assignee = '$nik') AND ut.id_usecase = '$id_usecase'
		ORDER BY ut.id_usecase_task DESC"

		);
	}

	public function get_usecase_task_leader($id_usecase, $nik)
	{
		// $this->db->join('status_usecase_task', 'status_usecase_task.id_status_usecase_task = usecase_task.status');
		// $this->db->join('member_dsc', 'usecase_task.id_reporter = member_dsc.nik');
		// $this->db->group_start();
		// $this->db->where('id_assignee', $nik);
		// $this->db->or_where('id_reporter', $nik);
		// $this->db->group_end();
		// return $this->db->get_where('usecase_task', array('id_usecase' => $id_usecase));
		return $this->db->query(
			"SELECT ut.date, ut.id_usecase, ut.id_usecase_task, ut.start_time, ut.end_time, ut.task_name, ut.task_description, dsc2.nama_member AS assignee, dsc1.nama_member AS reporter, ut.feedback, ut.status, sut.nama_status, ut.id_reporter, ut.id_assignee   
        FROM usecase_task ut
        JOIN status_usecase_task sut ON ut.status = sut.id_status_usecase_task
        JOIN member_dsc dsc1 ON ut.id_reporter = dsc1.nik
        JOIN member_dsc dsc2 ON ut.id_assignee = dsc2.nik
        WHERE (ut.id_reporter = '$nik' AND ut.id_assignee = '$nik') AND ut.id_usecase = '$id_usecase'
		ORDER BY ut.id_usecase_task DESC"
		);
	}

	public function get_usecase_task_member_sent($id_usecase, $nik)
	{
		$this->db->join('status_usecase_task', 'status_usecase_task.id_status_usecase_task = usecase_task.status');
		$this->db->join('member_dsc', 'usecase_task.id_reporter = member_dsc.nik');
		$this->db->group_start();
		$this->db->where('id_assignee', $nik);
		$this->db->or_where('id_reporter', $nik);
		$this->db->group_end();
		return $this->db->get_where('usecase_task', array('id_usecase' => $id_usecase, 'status' => 2));
	}

	public function get_usecase_task_member_status($id_usecase, $nik, $status)
	{
		$this->db->join('status_usecase_task', 'status_usecase_task.id_status_usecase_task = usecase_task.status');
		$this->db->join('member_dsc', 'usecase_task.id_reporter = member_dsc.nik');
		$this->db->group_start();
		$this->db->where('id_assignee', $nik);
		$this->db->or_where('id_reporter', $nik);
		$this->db->group_end();
		return $this->db->get_where('usecase_task', array('id_usecase' => $id_usecase, 'status' => $status));
	}

	public function add_usecase_task($data)
	{
		return $this->db->insert('usecase_task', $data);
	}

	public function edit_usecase_task($id_usecase_task, $data)
	{
		$this->db->set($data);
		$this->db->where('id_usecase_task', $id_usecase_task);
		return $this->db->update('usecase_task');
	}

	public function send_all_usecase_task_member($id_usecase, $nik, $data)
	{
		$this->db->where('status', 1);
		$this->db->where('id_usecase', $id_usecase);
		$this->db->group_start();
		$this->db->where('id_assignee', $nik);
		$this->db->or_where('id_reporter', $nik);
		$this->db->group_end();
		return $this->db->update('usecase_task', $data);
	}

	public function send_all_usecase_task_leader($id_usecase, $nik, $data)
	{
		$this->db->where('status', 2);
		$this->db->or_where("(status=1 AND id_assignee='$nik' AND id_reporter='$nik')", NULL, FALSE);
		$this->db->where('id_usecase', $id_usecase);
		$this->db->group_start();
		$this->db->where('id_assignee', $nik);
		$this->db->or_where('id_reporter', $nik);
		$this->db->group_end();
		return $this->db->update('usecase_task', $data);
	}

	public function approve_all_usecase_task($nik, $id_usecase, $data)
	{
		$this->db->where('status', 2);
		$this->db->or_where("(status=1 AND id_assignee='$nik' AND id_reporter='$nik')", NULL, FALSE);
		$this->db->where('id_usecase', $id_usecase);
		$this->db->where('id_reporter', $nik);
		$this->db->or_where('id_assignee', $nik);
		return $this->db->update('usecase_task', $data);
	}

	public function send_all_detail_task($id_usecase, $data)
	{
		$this->db->where('status', 1);
		$this->db->where('id_usecase', $id_usecase);
		return $this->db->update('usecase_task', $data);
	}

	public function get_nama_usecase_task($id_usecase_task)
	{
		$usecase_task = $this->db->get_where('usecase_task', 'id_usecase_task = "' . $id_usecase_task . '"');
		$row = $usecase_task->row();
		return $row->task_name;
	}

	public function delete_usecase_task($id_usecase_task, $id_usecase)
	{
		$this->db->where('id_usecase_task', $id_usecase_task);
		$this->db->where('id_usecase', $id_usecase);
		return $this->db->delete('usecase_task');
	}

	public function get_id_usecase($id_usecase_task)
	{
		$usecase_task = $this->db->get_where('usecase_task', 'id_usecase_task = "' . $id_usecase_task . '"');
		$row = $usecase_task->row();
		return $row->id_usecase;
	}

	// @codeCoverageIgnoreStart
	public function add_usecase($data)
	{
		return $this->db->insert('usecase', $data);
	}

	public function edit_usecase($id_usecase, $data)
	{
		$this->db->set($data);
		$this->db->where('id_usecase', $id_usecase);
		return $this->db->update('usecase');
	}

	public function delete_usecase($id_usecase)
	{
		$this->db->where('id_usecase', $id_usecase);
		return $this->db->delete('usecase');
	}

	public function delete_member_usecase($nik, $id_usecase)
	{
		$this->db->where('nik', $nik);
		$this->db->where('id_usecase', $id_usecase);
		return $this->db->delete('member_usecase');
	}

	public function check_nama_usecase($nama_usecase)
	{
		$this->db->where('nama_usecase', $nama_usecase);
		return $this->db->count_all_results('usecase');
	}

	public function get_usecase_status()
	{
		return $this->db->get('usecase_status');
	}

	public function get_nama_usecase($id_usecase)
	{
		$user = $this->db->get_where('usecase', 'id_usecase = "' . $id_usecase . '"');
		$row = $user->row();
		return $row->nama_usecase;
	}
	// @codeCoverageIgnoreEnd
	//End Of Use Case

	public function get_pathway()
	{
		return $this->db->get('pathway');
	}
	//Problem use case
	public function get_problem($id_usecase)
	{
		return $this->db->get_where('usecase_kendala', array('id_usecase' => $id_usecase));
	}

	public function add_problem($data)
	{
		return $this->db->insert('usecase_kendala', $data);
	}

	public function edit_problem($id_usecase_kendala, $data)
	{
		$this->db->set($data);
		$this->db->where('id_usecase_kendala', $id_usecase_kendala);
		return $this->db->update('usecase_kendala');
	}

	public function get_nama_problem($id_usecase_kendala)
	{
		$problem = $this->db->get_where('usecase_kendala', 'id_usecase_kendala = "' . $id_usecase_kendala . '"');
		$row = $problem->row();
		return $row->descriptions;
	}

	public function delete_problem($id_usecase_kendala)
	{
		$this->db->where('id_usecase_kendala', $id_usecase_kendala);
		return $this->db->delete('usecase_kendala');
	}

	// category_okr
	public function get_category_okr()
	{
		return $this->db->get('category_okr');
	}

	// @codeCoverageIgnoreStart
	public function add_category_okr($data)
	{
		return $this->db->insert('category_okr', $data);
	}

	public function edit_category_okr($id_category_okr, $data)
	{
		$this->db->set($data);
		$this->db->where('id_category_okr', $id_category_okr);
		return $this->db->update('category_okr');
	}

	public function delete_category_okr($id_category_okr)
	{
		$this->db->where('id_category_okr', $id_category_okr);
		return $this->db->delete('category_okr');
	}

	public function check_nama_category_okr($nama_category_okr)
	{
		$this->db->where('nama_category_okr', $nama_category_okr);
		return $this->db->count_all_results('category_okr');
	}

	public function get_nama_category_okr($id_category_okr)
	{
		$user = $this->db->get_where('category_okr', 'id_category_okr = "' . $id_category_okr . '"');
		$row = $user->row();
		return $row->nama_category_okr;
	}
	// @codeCoverageIgnoreEnd
	// End Of category_okr

	// complexity_okr
	public function get_complexity_okr()
	{
		return $this->db->get('complexity_okr');
	}

	// @codeCoverageIgnoreStart
	public function add_complexity_okr($data)
	{
		return $this->db->insert('complexity_okr', $data);
	}

	public function edit_complexity_okr($id_complexity_okr, $data)
	{
		$this->db->set($data);
		$this->db->where('id_complexity_okr', $id_complexity_okr);
		return $this->db->update('complexity_okr');
	}

	public function delete_complexity_okr($id_complexity_okr)
	{
		$this->db->where('id_complexity_okr', $id_complexity_okr);
		return $this->db->delete('complexity_okr');
	}

	public function check_nama_complexity_okr($nama_complexity_okr)
	{
		$this->db->where('nama_complexity_okr', $nama_complexity_okr);
		return $this->db->count_all_results('complexity_okr');
	}

	public function get_nama_complexity_okr($id_complexity_okr)
	{
		$user = $this->db->get_where('complexity_okr', 'id_complexity_okr = "' . $id_complexity_okr . '"');
		$row = $user->row();
		return $row->nama_complexity_okr;
	}
	// @codeCoverageIgnoreEnd
	// End Of complexity_okr

	// tof_okr
	public function get_tof_okr()
	{
		return $this->db->get('tof_okr');
	}

	// @codeCoverageIgnoreStart
	public function add_tof_okr($data)
	{
		return $this->db->insert('tof_okr', $data);
	}

	public function edit_tof_okr($id_tof_okr, $data)
	{
		$this->db->set($data);
		$this->db->where('id_tof_okr', $id_tof_okr);
		return $this->db->update('tof_okr');
	}

	public function delete_tof_okr($id_tof_okr)
	{
		$this->db->where('id_tof_okr', $id_tof_okr);
		return $this->db->delete('tof_okr');
	}

	public function check_nama_tof_okr($nama_tof_okr)
	{
		$this->db->where('nama_tof_okr', $nama_tof_okr);
		return $this->db->count_all_results('tof_okr');
	}

	public function get_nama_tof_okr($id_tof_okr)
	{
		$user = $this->db->get_where('tof_okr', 'id_tof_okr = "' . $id_tof_okr . '"');
		$row = $user->row();
		return $row->nama_tof_okr;
	}
	// @codeCoverageIgnoreEnd
	// End Of tof_okr

	// too_okr
	public function get_too_okr()
	{
		return $this->db->get('too_okr');
	}

	// @codeCoverageIgnoreStart
	public function add_too_okr($data)
	{
		return $this->db->insert('too_okr', $data);
	}

	public function edit_too_okr($id_too_okr, $data)
	{
		$this->db->set($data);
		$this->db->where('id_too_okr', $id_too_okr);
		return $this->db->update('too_okr');
	}

	public function delete_too_okr($id_too_okr)
	{
		$this->db->where('id_too_okr', $id_too_okr);
		return $this->db->delete('too_okr');
	}

	public function check_nama_too_okr($nama_too_okr)
	{
		$this->db->where('nama_too_okr', $nama_too_okr);
		return $this->db->count_all_results('too_okr');
	}

	public function get_nama_too_okr($id_too_okr)
	{
		$user = $this->db->get_where('too_okr', 'id_too_okr = "' . $id_too_okr . '"');
		$row = $user->row();
		return $row->nama_too_okr;
	}

	public function unit_tribe()
	{
		return $this->db->get('unit_tribe');
	}
	public function add_unit_tribe($data)
	{
		return $this->db->insert('unit_tribe', $data);
	}

	public function edit_unit_tribe($id, $data)
	{
		$this->db->set($data);
		$this->db->where('id_unit', $id);
		return $this->db->update('unit_tribe');
	}
	public function delete_unit_tribe($id)
	{
		$this->db->where('id_unit', $id);
		return $this->db->delete('unit_tribe');
	}
	// @codeCoverageIgnoreEnd
	// end of too_okr

}

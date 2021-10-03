<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_otherDataWorkload extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    public function get_workload_point_usecase()
	{		
		$this->db->join('workload_usecase_level', 'level = id_workload_usecase_level');
		return $this->db->get('workload_point_usecase');
	}

	public function get_workload_point_member()
	{		
		$this->db->join('posisi_type', 'posisi_type = id_posisi_type');
		$this->db->join('posisi_level', 'posisi_level = id_posisi_level');
		return $this->db->get('workload_point_member');
	}

    public function get_workload_usecase_level()
	{
		return $this->db->get('workload_usecase_level');
	}

    public function get_posisi_type()
	{
		return $this->db->get('posisi_type');
	}

    public function get_posisi_level()
	{
		return $this->db->get('posisi_level');
	}

	public function get_workload_point()
	{
		return $this->db->get('workload_point');
	}

	# Workload Usecase Level
	public function add_workload_usecase_level($data){
		return $this->db->insert('workload_usecase_level', $data);
	}

	public function edit_workload_usecase_level($id_workload_usecase_level, $data){
		$this->db->set($data);
		$this->db->where('id_workload_usecase_level', $id_workload_usecase_level);
		return $this->db->update('workload_usecase_level');
	}

	public function get_nama_workload_usecase_level($id_workload_usecase_level)
	{
		$user = $this->db->get_where('workload_usecase_level', 'id_workload_usecase_level = "' . $id_workload_usecase_level . '"');
		$row = $user->row();
		return $row->nama_workload_usecase_level;
	}

	public function delete_workload_usecase_level($id_workload_usecase_level){
		$this->db->where('id_workload_usecase_level', $id_workload_usecase_level);
		return $this->db->delete('workload_usecase_level');
	}
	
	public function check_nama_workload_usecase_level($nama_workload_usecase_level){
		$this->db->where('nama_workload_usecase_level', $nama_workload_usecase_level);
		return $this->db->count_all_results('workload_usecase_level');	
	}

	# Workload Point Usecase Level
	public function add_workload_point_usecase($data){
		return $this->db->insert('workload_point_usecase', $data);
	}

	public function check_level_workload_point_usecase($level){
		$this->db->where('level', $level);
		return $this->db->count_all_results('workload_point_usecase');	
	}

	public function get_nama_workload_point_usecase($id_workload_point_usecase)
	{
		$this->db->join('workload_usecase_level', 'level = id_workload_usecase_level');
		$user = $this->db->get_where('workload_point_usecase', 'id_workload_point_usecase = "' . $id_workload_point_usecase . '"');
		$row = $user->row();
		return $row->nama_workload_usecase_level;
	}

	public function edit_workload_point_usecase($id_workload_point_usecase, $data){
		$this->db->set($data);
		$this->db->where('id_workload_point_usecase', $id_workload_point_usecase);
		return $this->db->update('workload_point_usecase');
	}
	
	public function delete_workload_point_usecase($id_workload_point_usecase){
		$this->db->where('id_workload_point_usecase', $id_workload_point_usecase);
		return $this->db->delete('workload_point_usecase');
	}

	# Workload Point Usecase Level
	public function add_workload_point_member($data){
		return $this->db->insert('workload_point_member', $data);
	}

	public function check_level_workload_point_member($posisi_type, $posisi_level){
		$this->db->where('posisi_type', $posisi_type);
		$this->db->where('posisi_level', $posisi_level);
		return $this->db->count_all_results('workload_point_member');	
	}

	public function edit_workload_point_member($id_workload_point_member, $data){
		$this->db->set($data);
		$this->db->where('id_workload_point_member', $id_workload_point_member);
		return $this->db->update('workload_point_member');
	}
	
	public function delete_workload_point_member($id_workload_point_member){
		$this->db->where('id_workload_point_member', $id_workload_point_member);
		return $this->db->delete('workload_point_member');
	}

	public function get_workload_threshold_member(){
		$this->db->join('posisi_type', 'workload_threshold_member.posisi_type = posisi_type.id_posisi_type');
		$this->db->join('posisi_level', 'workload_threshold_member.posisi_level = posisi_level.id_posisi_level');
		return $this->db->get('workload_threshold_member');
	}

	public function get_workload_threshold_usecase(){
		$this->db->join('workload_usecase_level', 'workload_threshold_usecase.level = workload_usecase_level.id_workload_usecase_level');
		return $this->db->get('workload_threshold_usecase');
	}

	public function delete_workload_threshold_member($id_workload_threshold_member){
		$this->db->where('id_workload_threshold_member', $id_workload_threshold_member);
		return $this->db->delete('workload_threshold_member');
	}

	public function delete_workload_threshold_usecase($id_workload_threshold_usecase){
		$this->db->where('id_workload_threshold_usecase', $id_workload_threshold_usecase);
		return $this->db->delete('workload_threshold_usecase');
	}

	public function add_workload_threshold_member($data)
	{
		return $this->db->insert('workload_threshold_member', $data);
	}

	public function add_workload_threshold_usecase($data)
	{
		return $this->db->insert('workload_threshold_usecase', $data);
	}

	public function edit_workload_threshold_member($id_workload_threshold_member, $data){
		$this->db->set($data);
		$this->db->where('id_workload_threshold_member', $id_workload_threshold_member);
		return $this->db->update('workload_threshold_member');
	}

	public function edit_workload_threshold_usecase($id_workload_threshold_usecase, $data){
		$this->db->set($data);
		$this->db->where('id_workload_threshold_usecase', $id_workload_threshold_usecase);
		return $this->db->update('workload_threshold_usecase');
	}
}

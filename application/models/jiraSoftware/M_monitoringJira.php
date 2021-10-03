<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_monitoringJira extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	// Monitoring Jira
	public function get_data_monitoring_jira()
	{
		$data = $this->db->query("SELECT a.id_jiramonitor, a.id_usecase, u.nama_usecase, a.key, a.kanban, a.todo, a.in_progress, a.done, a.last_updated, a.performance, a.updating, a.monitored FROM usecase AS u INNER JOIN jiramonitoring AS a ON u.id_usecase = a.id_usecase");
		return $data->result();
	}

	public function add_data_monitoring_jira($data)
	{
		$this->db->insert('jiramonitoring', $data);
	}


	function delete_data_monitoring_jira($id_jiramonitor)
	{
		$this->db->where('id_jiramonitor', $id_jiramonitor);
		return $this->db->delete('jiramonitoring');
	}

	function get_member_usecase()
	{
		$data = $this->db->query("SELECT DISTINCT i.id_usecase, u.nama_usecase FROM usecase AS u INNER JOIN member_usecase AS i ON u.id_usecase = i.id_usecase");
		return $data->result();
	}

	function get_monitoring7days()
	{
		$data = $this->db->query("SELECT * FROM `jiramonitoring` WHERE last_updated >= DATE(NOW()) + INTERVAL -7 DAY AND last_updated < DATE(NOW()) + INTERVAL 0 DAY");
		return $data->result();
	}

	function update_monitoring($id, $data)
	{
		$this->db->set($data);
		$this->db->where('id_jiramonitor', $id);
		return $this->db->update('jiramonitoring');
	}

	public function get_nama_usecase($id_usecase){
		$user = $this->db->get_where('usecase','id_usecase = "'.$id_usecase.'"');
		$row = $user->row();
		return $row->nama_usecase;
	}

	public function get_id_usecase($id_jiramonitor){
		$user = $this->db->get_where('jiramonitoring','id_jiramonitor = "'.$id_jiramonitor.'"');
		$row = $user->row();
		return $row->id_usecase;
	}

}	


?>
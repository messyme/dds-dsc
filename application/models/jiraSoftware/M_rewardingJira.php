<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_rewardingJira extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	// Rewarding Jira
	public function get_data_rewarding_jira(){
		$this->db->select('jirareward.id, jirareward.nik, jirareward.raw, jirareward.epic_tracking, jirareward.date_point, jirareward.last_updated, jirareward.raw_noa, member_dsc.nama_member, jirareward.key1, jirareward.key2, jirareward.key3, jirareward.key4, jirareward.key5, jirareward.key6, jirareward.key7, jirareward.key8, jirareward.key9, jirareward.key10, jirareward.key11, jirareward.key12, jirareward.key13, jirareward.key14, jirareward.key15, jirareward.score1, jirareward.score2, jirareward.score3, jirareward.score4, jirareward.score5, jirareward.score6, jirareward.score7, jirareward.score8, jirareward.score9, jirareward.score10, jirareward.score11, jirareward.score12, jirareward.score13, jirareward.score14, jirareward.score15, jirareward.wv, jirareward.wv_noa, jirareward.raw_mean, jirareward.wv_raw_mean, jirareward.pwa_noa, jirareward.pwa_lod, jirareward.total_pwa, jirareward.ra');
		$this->db->like('jirareward.date_point', date('Y-m'));
		$this->db->order_by('jirareward.ra', 'DESC');
		$this->db->order_by('member_dsc.nama_member', 'ASC');
		$this->db->join('member_dsc', 'jirareward.nik = member_dsc.nik');
		return $this->db->get('jirareward');
		// $query = $this->db->get('jirareward');
		// return $query->result_array();
	}

	public function get_data_rewarding_jira_filter($date){
		$month = substr($date,0,2);
		$year = substr($date,3,4);
		$this->db->select('jirareward.id, jirareward.nik, jirareward.raw, jirareward.epic_tracking, jirareward.date_point, jirareward.last_updated, jirareward.raw_noa, member_dsc.nama_member, jirareward.key1, jirareward.key2, jirareward.key3, jirareward.key4, jirareward.key5, jirareward.key6, jirareward.key7, jirareward.key8, jirareward.key9, jirareward.key10, jirareward.key11, jirareward.key12, jirareward.key13, jirareward.key14, jirareward.key15, jirareward.score1, jirareward.score2, jirareward.score3, jirareward.score4, jirareward.score5, jirareward.score6, jirareward.score7, jirareward.score8, jirareward.score9, jirareward.score10, jirareward.score11, jirareward.score12, jirareward.score13, jirareward.score14, jirareward.score15, jirareward.wv, jirareward.wv_noa, jirareward.raw_mean, jirareward.wv_raw_mean, jirareward.pwa_noa, jirareward.pwa_lod, jirareward.total_pwa, jirareward.ra');
		$this->db->where('MONTH(jirareward.date_point)',$month);
		$this->db->where('YEAR(jirareward.date_point)',$year);
		$this->db->order_by('jirareward.ra', 'DESC');
		$this->db->order_by('member_dsc.nama_member', 'ASC');
		$this->db->join('member_dsc', 'jirareward.nik = member_dsc.nik');
		return $this->db->get('jirareward');
	}

	public function add_data_rewarding_jira($data){
		$this->db->insert('jirareward', $data);
	}

	public function delete_data_rewarding_jira($id){
		$this->db->where('id', $id);
		return $this->db->delete('jirareward');
	}

	public function update_data_rewarding_jira($id, $data){
		$this->db->set($data);
		$this->db->where('id', $id);
		return $this->db->update('jirareward');
		// echo $this->db->last_query();
	}

	public function get_nama($nik){
		$user = $this->db->get_where('member_dsc','nik = "'.$nik.'"');
		$row = $user->row();
		return $row->nama_member;
	}

	public function get_nik($id){
		$user = $this->db->get_where('jirareward','id = "'.$id.'"');
		$row = $user->row();
		return $row->nik;
	}
}	


?>
<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_otherDataMember extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	// Status
	public function get_status(){ 
		return $this->db->get('status');
	}

	// @codeCoverageIgnoreStart
	public function add_status($data){
		return $this->db->insert('status', $data);
	}

	public function edit_status($id_status, $data){
		$this->db->set($data);
		$this->db->where('id_status', $id_status);
		return $this->db->update('status');
	}

	public function delete_status($id_status){
		$this->db->where('id_status', $id_status);
		return $this->db->delete('status');
	}

	public function check_nama_status($nama_status){
		$this->db->where('nama_status', $nama_status);
		return $this->db->count_all_results('status');	
	}

	public function get_nama_status($id_status){
		$user = $this->db->get_where('status','id_status = "'.$id_status.'"');
		$row = $user->row();
		return $row->nama_status;
	}
	// @codeCoverageIgnoreEnd
	// End Of Status
	
	// Posisi
	public function get_posisi(){ 
		return $this->db->get('posisi');		 
	}

	// @codeCoverageIgnoreStart
	public function add_posisi($data){
		return $this->db->insert('posisi', $data);
	}

	public function edit_posisi($id_posisi, $data){
		$this->db->set($data);
		$this->db->where('id_posisi', $id_posisi);
		return $this->db->update('posisi');
	}

	public function delete_posisi($id_posisi){
		$this->db->where('id_posisi', $id_posisi);
		return $this->db->delete('posisi');
	}

	public function check_nama_posisi($nama_posisi){
		$this->db->where('nama_posisi', $nama_posisi);
		return $this->db->count_all_results('posisi');	
	}

	public function get_nama_posisi($id_posisi){
		$user = $this->db->get_where('posisi','id_posisi = "'.$id_posisi.'"');
		$row = $user->row();
		return $row->nama_posisi;
	}
	// @codeCoverageIgnoreEnd
	// End Of Posisi
	
	// Band
	public function get_band(){ 
		return $this->db->get('band');		 
	}

	// @codeCoverageIgnoreStart
	public function add_band($data){
		return $this->db->insert('band', $data);
	}

	public function edit_band($id_band, $data){
		$this->db->set($data);
		$this->db->where('id_band', $id_band);
		return $this->db->update('band');
	}

	public function delete_band($id_band){
		$this->db->where('id_band', $id_band);
		return $this->db->delete('band');
	}

	public function check_nama_band($nama_band){
		$this->db->where('nama_band', $nama_band);
		return $this->db->count_all_results('band');	
	}

	public function get_nama_band($id_band){
		$user = $this->db->get_where('band','id_band = "'.$id_band.'"');
		$row = $user->row();
		return $row->nama_band;
	}
	// @codeCoverageIgnoreEnd
	// End Of band

	// posisi_level
	public function get_posisi_level(){ 
		return $this->db->get('posisi_level');		 
	}

	// @codeCoverageIgnoreStart
	public function add_posisi_level($data){
		return $this->db->insert('posisi_level', $data);
	}

	public function edit_posisi_level($id_posisi_level, $data){
		$this->db->set($data);
		$this->db->where('id_posisi_level', $id_posisi_level);
		return $this->db->update('posisi_level');
	}

	public function delete_posisi_level($id_posisi_level){
		$this->db->where('id_posisi_level', $id_posisi_level);
		return $this->db->delete('posisi_level');
	}

	public function check_nama_posisi_level($nama_posisi_level){
		$this->db->where('nama_posisi_level', $nama_posisi_level);
		return $this->db->count_all_results('posisi_level');	
	}

	public function get_nama_posisi_level($id_posisi_level){
		$user = $this->db->get_where('posisi_level','id_posisi_level = "'.$id_posisi_level.'"');
		$row = $user->row();
		return $row->nama_posisi_level;
	}
	// @codeCoverageIgnoreEnd
	// End Of posisi_level

	// posisi_type
	public function get_posisi_type(){ 
		return $this->db->get('posisi_type');		 
	}

	// @codeCoverageIgnoreStart
	public function add_posisi_type($data){
		return $this->db->insert('posisi_type', $data);
	}

	public function edit_posisi_type($id_posisi_type, $data){
		$this->db->set($data);
		$this->db->where('id_posisi_type', $id_posisi_type);
		return $this->db->update('posisi_type');
	}

	public function delete_posisi_type($id_posisi_type){
		$this->db->where('id_posisi_type', $id_posisi_type);
		return $this->db->delete('posisi_type');
	}

	public function check_nama_posisi_type($nama_posisi_type){
		$this->db->where('nama_posisi_type', $nama_posisi_type);
		return $this->db->count_all_results('posisi_type');	
	}

	public function get_nama_posisi_type($id_posisi_type){
		$user = $this->db->get_where('posisi_type','id_posisi_type = "'.$id_posisi_type.'"');
		$row = $user->row();
		return $row->nama_posisi_type;
	}
	// @codeCoverageIgnoreEnd
	// End Of posisi_type
	
	// Universitas
	public function get_universitas(){ 
		return $this->db->get('universitas');
	}

	// @codeCoverageIgnoreStart
	public function add_univ($data){
		return $this->db->insert('universitas', $data);
	}

	public function edit_univ($kode_universitas, $data){
		$this->db->set($data);
		$this->db->where('kode_universitas', $kode_universitas);
		return $this->db->update('universitas');
	}

	public function delete_univ($kode_universitas){
		$this->db->where('kode_universitas', $kode_universitas);
		return $this->db->delete('universitas');
	}

	public function check_nama_univ($nama_universitas){
		$this->db->where('nama_universitas', $nama_universitas);
		return $this->db->count_all_results('universitas');	
	}

	public function get_nama_univ($kode_universitas){
		$user = $this->db->get_where('universitas','kode_universitas = "'.$kode_universitas.'"');
		$row = $user->row();
		return $row->nama_universitas;
	}
	// @codeCoverageIgnoreEnd
	// end of Universitas

	// cluster_ed
	public function get_cluster_ed(){ 
		return $this->db->get('cluster_ed');		 
	}

	// @codeCoverageIgnoreStart
	public function add_cluster_ed($data){
		return $this->db->insert('cluster_ed', $data);
	}

	public function edit_cluster_ed($id_cluster_ed, $data){
		$this->db->set($data);
		$this->db->where('id_cluster_ed', $id_cluster_ed);
		return $this->db->update('cluster_ed');
	}

	public function delete_cluster_ed($id_cluster_ed){
		$this->db->where('id_cluster_ed', $id_cluster_ed);
		return $this->db->delete('cluster_ed');
	}

	public function check_nama_cluster_ed($cluster_ed_desc){
		$this->db->where('cluster_ed_desc', $cluster_ed_desc);
		return $this->db->count_all_results('cluster_ed');	
	}

	public function get_nama_cluster_ed($id_cluster_ed){
		$user = $this->db->get_where('cluster_ed','id_cluster_ed = "'.$id_cluster_ed.'"');
		$row = $user->row();
		return $row->cluster_ed_desc;
	}
	// @codeCoverageIgnoreEnd
	// End Of cluster_ed
	
	// ED BG
	public function get_ed_bg(){ 
		$this->db->join('cluster_ed', 'education_bg.id_cluster_ed = cluster_ed.id_cluster_ed');
		return $this->db->get('education_bg');
	}

	// @codeCoverageIgnoreStart
	public function add_ed_bg($data){
		return $this->db->insert('education_bg', $data);
	}

	public function edit_ed_bg($id_ed_bg, $data){
		$this->db->set($data);
		$this->db->where('id_ed_bg', $id_ed_bg);
		return $this->db->update('education_bg');
	}

	public function delete_ed_bg($id_ed_bg){
		$this->db->where('id_ed_bg', $id_ed_bg);
		return $this->db->delete('education_bg');
	}

	public function check_nama_ed_bg($ed_bg_desc){
		$this->db->where('ed_bg_desc', $ed_bg_desc);
		return $this->db->count_all_results('education_bg');	
	}

	public function get_nama_ed_bg($id_ed_bg){
		$user = $this->db->get_where('education_bg','id_ed_bg = "'.$id_ed_bg.'"');
		$row = $user->row();
		return $row->ed_bg_desc;
	}
	// @codeCoverageIgnoreEnd
	// End Of ED BG
}	


?>
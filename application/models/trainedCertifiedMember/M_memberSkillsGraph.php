<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_memberSkillsGraph extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	/* ---------------------------------------------------
	CHART
	----------------------------------------------------- */
	// total trained_member
	public function get_total_trained_member()
	{
	$query = $this->db->query('SELECT * FROM trained_member');
	return $query->num_rows();
	}
	// end of total trained_member

	// total training
	public function get_total_training()
	{
	$query = $this->db->query('SELECT * FROM training');
	return $query->num_rows();
	}
	// end of total training

	// total certified_member
	public function get_total_certified_member()
	{
	$query = $this->db->query('SELECT * FROM certified_member');
	return $query->num_rows();
	}
	// end of total certified_member

	// total sertifikasi
	public function get_total_sertifikasi()
	{
	$query = $this->db->query('SELECT * FROM sertifikasi');
	return $query->num_rows();
	}
	// end of total sertifikasi

	// Grafik Sertifikasi per Jenis per Tahun
	public function get_certified_JenisperTahun(){
		return $this->db->query('SELECT nama_sertifikasi, SUM(CASE WHEN certified_member.tahun_sertifikasi=2018 THEN 1 ELSE 0 END) as perjenis_2018, SUM(CASE WHEN certified_member.tahun_sertifikasi=2019 THEN 1 ELSE 0 END) as perjenis_2019, SUM(CASE WHEN certified_member.tahun_sertifikasi=2020 THEN 1 ELSE 0 END) as perjenis_2020 FROM certified_member GROUP BY nama_sertifikasi')->result();
	}
	// End of Grafik Sertifikasi per Jenis per tahun

	// Grafik Training per Jenis per Tahun
	public function get_trained_JenisperTahun(){
		return $this->db->query('SELECT nama_pelatihan, SUM(CASE WHEN tahun_pelatihan=2018 THEN 1 ELSE 0 END) as perjenis_2018, SUM(CASE WHEN tahun_pelatihan=2019 THEN 1 ELSE 0 END) as perjenis_2019, SUM(CASE WHEN tahun_pelatihan=2020 THEN 1 ELSE 0 END) as perjenis_2020 FROM trained_member GROUP BY nama_pelatihan')->result();
	}
	// End of Grafik Training per Jenis per tahun
}	


?>
<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_dscMembersGraph extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	/* ---------------------------------------------------
	CHART
	----------------------------------------------------- */
	// total member
	public function get_total_member()
	{
	$query = $this->db->query('SELECT * FROM member_dsc WHERE id_status != "7" ');
	return $query->num_rows();
	}
	// end of total member

	// total member organik
	public function get_total_pro_hire()
	{
		$query = $this->db->query('SELECT * FROM member_dsc WHERE id_status = "5" ');
		return $query->num_rows();
	}
	// end of total member organik

	// total member organik
	public function get_total_outsource()
	{
		$query = $this->db->query('SELECT * FROM member_dsc WHERE id_status = "4" ');
		return $query->num_rows();
	}
	// end of total member organik

	// total member organik
	public function get_total_probation()
	{
		$query = $this->db->query('SELECT * FROM member_dsc WHERE id_status = "6" ');
		return $query->num_rows();
	}
	// end of total member organik

	// total member organik
	public function get_total_member_organik()
	{
		$query = $this->db->query('SELECT * FROM member_dsc WHERE id_status = "3" ');
		return $query->num_rows();
	}
	// end of total member organik

	// total member Emp Mobility
	public function get_total_member_emp_mob()
	{
	$query = $this->db->query('SELECT * FROM member_dsc WHERE id_status = "1" ');
	return $query->num_rows();
	}
	// end of total Emp Mobility

	// total member digital talent
	public function get_total_member_digital_talent()
	{
	$query = $this->db->query('SELECT * FROM member_dsc WHERE id_status = "8" ');
	return $query->num_rows();
	}
	// end of total digital talent

	// total internship
	public function get_total_internship()
	{
	$query = $this->db->query('SELECT * FROM member_internship where status_inactive != "1" ');
	return $query->num_rows();
	}
	// end of total internship

    // Grafik Status Member
	public function get_member_graph(){
		$memberDsc = $this->db->query('SELECT nama_status, count(*) as total FROM member_dsc, status WHERE `member_dsc`.`id_status`=`status`.`id_status` and `member_dsc`.`id_status` != 7 and `member_dsc`.`id_status` != 2 GROUP BY nama_status')->result();
		$dataMember = $this->db->query('SELECT count(*) as total from member_internship where status_inactive !=1')->row_array();
		$data = new stdClass;
		$data->nama_status = 'Apprentice';
		$data->total = $dataMember['total'];
		$db_data[] = $data;
		$final = array_merge($memberDsc, $db_data);
		return $final;
	}
	// End of Grafik Status Member

	// Data for Monitoring
	// Member Contract Expired
	public function get_contract_expired(){
		return $this->db->query("select concat(DAY(member_dsc.kontrak_selesai),' ',MONTHNAME(member_dsc.kontrak_selesai), ' ',
		YEAR(member_dsc.kontrak_selesai))
		as kontrak_selesai, count(member_dsc.nik) as total
		from member_dsc WHERE member_dsc.kontrak_selesai!=0
		AND YEAR(member_dsc.kontrak_selesai) >= 2018
		group by kontrak_selesai ORDER BY YEAR(kontrak_selesai), MONTH(kontrak_selesai), DAY(kontrak_selesai) ASC")->result();
	}
	// End of Member Contract Expired

	//   get graph alumni dsc
	public function getGraphMemberAlumni(){
		$data = $this->db->query("
		select concat(DAY(member_dsc.kontrak_selesai), ' ', MONTHNAME(member_dsc.kontrak_selesai), ' ', year(member_dsc.kontrak_selesai))  as tahun, count(member_dsc.kontrak_selesai) as total
		from member_dsc
		where member_dsc.id_status = 7 and YEAR(member_dsc.kontrak_selesai) >= 2018
		group by member_dsc.kontrak_selesai
		order by YEAR(kontrak_selesai), MONTH(kontrak_selesai), DAY(kontrak_selesai) ASC
		")->result();

		return $data;
	}

    public function getGraphBand(){
		$data = $this->db->query("
		select band.nama_band, count(md.id_band) as total
		from band
		join member_dsc md on band.id_band = md.id_band
		and md.id_status != 7
		group by md.id_band
		")->result();

		return $data;
	}

	public function getGraphPosition(){
		$data = $this->db->query("
		select posisi.nama_posisi, count(md.id_posisi) as total
		from posisi
		join member_dsc md on posisi.id_posisi = md.id_posisi
		and md.id_status != 7
		group by md.id_posisi
		")->result();

		return $data;
	}
}	


?>
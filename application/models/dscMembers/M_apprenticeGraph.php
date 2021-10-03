<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_apprenticeGraph extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/* ---------------------------------------------------
	CHART
	----------------------------------------------------- */
	// total internship
	public function get_total_internship()
	{
		$query = $this->db->query('SELECT * FROM member_internship where status_inactive != "1" ');
		return $query->num_rows();
	}
	// end of total internship

	// Member Contract Expired
	public function get_contract_expiredApprentice()
	{
		return $this->db->query("select concat(day(member_internship.kontrak_selesai_internship), ' ', MONTHNAME(member_internship.kontrak_selesai_internship), ' ', year(member_internship.kontrak_selesai_internship)) as tahun,
		count(member_internship.nim) as total
		from member_internship
		where  year(member_internship.kontrak_selesai_internship) >= 2018
		group by member_internship.kontrak_selesai_internship
		order by YEAR(kontrak_selesai_internship), MONTH(kontrak_selesai_internship), DAY(kontrak_selesai_internship) ASC")->result();
	}
	// End of Member Contract Expired

	//   get graph alumni Internce
	public function getGraphMemberAlumniInt()
	{
		$data = $this->db->query("
		select concat(day(member_internship.kontrak_selesai_internship), ' ', MONTHNAME(member_internship.kontrak_selesai_internship), ' ', year(member_internship.kontrak_selesai_internship)) as tahun,
		count(member_internship.nim) as total
		from member_internship
		where member_internship.status_inactive = 1
		and year(member_internship.kontrak_selesai_internship) >= 2018
		group by member_internship.kontrak_selesai_internship
		order by YEAR(kontrak_selesai_internship), MONTH(kontrak_selesai_internship), DAY(kontrak_selesai_internship) ASC
		")->result();

		return $data;
	}

	// Internship Contract Expired
	public function get_internship_expired()
	{
		return $this->db->query("SELECT CONCAT(MONTHNAME(member_internship.kontrak_selesai_internship), ', ', YEAR(member_internship.kontrak_selesai_internship)) AS internship_selesai, COUNT(member_internship.nim) AS total FROM member_internship WHERE member_internship.kontrak_selesai_internship!=0 AND MONTH(member_internship.kontrak_selesai_internship)>=MONTH(NOW()) AND YEAR(member_internship.kontrak_selesai_internship)>=YEAR(NOW()) GROUP BY internship_selesai ORDER BY internship_selesai DESC")->result();
	}
	// End of Internship Contract Expired
	// End of Data for Monitoring

	public function getGraphApprByYear()
	{
		$data = $this->db->query("
		SELECT  YEAR(member_internship.kontrak_selesai_internship) as tahun, count(member_internship.nim) as total
		FROM member_internship
		group by YEAR(member_internship.kontrak_selesai_internship)
		")->result();
		return $data;
	}

	public function getGraphApprByUniversity()
	{
		$data = $this->db->query("
		select universitas.nama_universitas, count(mi.kode_universitas) as total
		from universitas
		join member_internship mi on universitas.kode_universitas = mi.kode_universitas
		where mi.status_inactive = 0
		group by mi.kode_universitas
		")->result();

		return $data;
	}

	public function getGraphApprBySpv()
	{
		$data = $this->db->query("
		SELECT  member_dsc.nama_member, count(member_internship.nim) as total
		FROM member_internship
		JOIN member_dsc ON member_internship.nik = member_dsc.nik
		JOIN universitas ON member_internship.kode_universitas = universitas.kode_universitas
		where member_internship.status_inactive = 0
		group by member_dsc.nama_member
		")->result();

		return $data;
	}
}

<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_assignmentsGraph extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	/* ---------------------------------------------------
	CHART
	----------------------------------------------------- */
	// total groups
	public function get_total_groups()
	{
	$query = $this->db->query('SELECT * FROM groups');
	return $query->num_rows();
	}
	// end of total groups

	// total mdscinassigments
	public function get_total_mdscinassigments()
	{
	$query = $this->db->query('SELECT DISTINCT member_usecase.nik FROM member_usecase
	JOIN member_dsc ON member_usecase.nik = member_dsc.nik
	JOIN usecase ON member_usecase.id_usecase = usecase.id_usecase
	WHERE usecase.id_usecase_status = 1 AND member_dsc.id_status != 7');
	return $query->num_rows();
	}
	// end of total mdscinassigments

	// total mdscnotinassigments
	public function get_total_mdscnotinassigments()
	{
		$query = $this->db->query('SELECT member_dsc.nik
		FROM member_dsc
		JOIN status ON status.id_status = member_dsc.id_status
		JOIN posisi ON posisi.id_posisi = member_dsc.id_posisi
		JOIN band ON band.id_band = member_dsc.id_band
		WHERE member_dsc.nik NOT IN
		(SELECT member_usecase.nik 
		FROM member_usecase
		JOIN usecase ON member_usecase.id_usecase = usecase.id_usecase
		WHERE usecase.id_usecase_status = 1) AND member_dsc.id_status != 7');
		return $query->num_rows();
	}
	// end of total mdscnotinassigments

	// total appinassigments
	public function get_total_appinassigments()
	{
		$query = $this->db->query('SELECT DISTINCT nim FROM member_usecase_inter');
		return $query->num_rows();
	}
	// end of total appinassigments

	// total appnotinassigments
	public function get_total_appnotinassigments()
	{
		$query = $this->db->query('SELECT *
		FROM member_internship
		JOIN member_dsc ON member_dsc.nik = member_internship.nik
		JOIN universitas ON member_internship.kode_universitas = universitas.kode_universitas
		WHERE member_internship.nim NOT IN
		(SELECT member_usecase_inter.nim 
		FROM member_usecase_inter) AND member_internship.status_inactive = 0');
		return $query->num_rows();
	}
	// end of total appnotinassigments

	// total tribe
	public function get_total_tribe()
	{
		$query = $this->db->query('SELECT * FROM tribe');
		return $query->num_rows();
	}
	// end of total tribe

	// total squad
	public function get_total_squad()
	{
		$query = $this->db->query('SELECT * FROM squad');
		return $query->num_rows();
	}
	// end of total squad

	// total usecase
	public function get_total_usecase()
	{
		$query = $this->db->query('SELECT * FROM usecase');
		return $query->num_rows();
	}
	// end of total usecase

	// Grafik Member per Usecase
	public function get_member_perusecase(){
		return $this->db->query('SELECT usecase.nama_usecase,
		COUNT(CASE WHEN member_dsc.id_status=1 THEN 1 END) as EMPEX,
		COUNT(CASE WHEN member_dsc.id_status=3 THEN 1 END) as Organik,
		COUNT(CASE WHEN member_dsc.id_status=4 THEN 1 END) as Outsource,
		COUNT(CASE WHEN member_dsc.id_status=5 THEN 1 END) as ProHire,
		COUNT(CASE WHEN member_dsc.id_status=6 THEN 1 END) as Probation,
		COUNT(CASE WHEN member_dsc.id_status=8 THEN 1 END) as DigitalTalent
		FROM usecase, member_usecase, member_dsc, status
		WHERE member_usecase.id_usecase=usecase.id_usecase AND member_usecase.nik=member_dsc.nik AND member_dsc.id_status=status.id_status AND usecase.id_usecase_status = 1
		GROUP BY nama_usecase ORDER BY usecase.nama_usecase ASC')->result();
	}	// End of Grafik Member per Usecase

	public function get_member_perusecaseApp(){
		$data = $this->db->query("
		select usecase.nama_usecase, count(mui.nim) as total
		from usecase join member_usecase_inter mui on usecase.id_usecase = mui.id_usecase
		group by mui.id_usecase
		")->result();
		return $data;
	}  

	public function getNameLabelPerusecase() {
		return $this->db->query('SELECT * FROM `status` WHERE id_status != 2 and id_status != 7')->result();
	}  

	// Grafik Member per Tribe
	public function get_member_pertribe(){
		return $this->db->query('SELECT tribe.nama_tribe,
		COUNT(CASE WHEN member_dsc.id_status=1 THEN 1 END) as EMPEX,
		COUNT(CASE WHEN member_dsc.id_status=3 THEN 1 END) as Organik,
		COUNT(CASE WHEN member_dsc.id_status=4 THEN 1 END) as Outsource,
		COUNT(CASE WHEN member_dsc.id_status=5 THEN 1 END) as ProHire,
		COUNT(CASE WHEN member_dsc.id_status=6 THEN 1 END) as Probation,
		COUNT(CASE WHEN member_dsc.id_status=8 THEN 1 END) as DigitalTalent
		FROM tribe, member_usecase, member_dsc, status
		WHERE member_usecase.id_tribe=tribe.id_tribe AND member_usecase.nik=member_dsc.nik AND member_dsc.id_status=status.id_status
		GROUP BY nama_tribe ORDER BY tribe.nama_tribe ASC')->result();
	}	// End of Grafik Member per Tribe

	public function get_member_pertribeApp(){
		$data = $this->db->query("
		SELECT tribe.nama_tribe,
		COUNT(member_usecase_inter.nim) as total
		FROM tribe,
		member_usecase_inter
		WHERE member_usecase_inter.id_tribe = tribe.id_tribe
		GROUP BY nama_tribe
		ORDER BY tribe.nama_tribe ASC
		")->result();
		return $data;
	}

	//   progres usecase inprogress
	public function progress_usecase_inprogress(){
		$this->db->select('nama_usecase');
		$this->db->from('usecase');
		$this->db->where('id_usecase_status', 1);
		return $this->db->get()->result();
	}
	//  end progres usecase inprogress  

	//   progres usecase done
	public function progress_usecase_done(){
		$this->db->select('nama_usecase');
		$this->db->from('usecase');
		$this->db->where('id_usecase_status', 2);
		return $this->db->get()->result();
	}
	//  end progres usecase done

	//   progres usecase cancelled
	public function progress_usecase_cancel(){
		$this->db->select('nama_usecase');
		$this->db->from('usecase');
		$this->db->where('id_usecase_status', 3);
		return $this->db->get()->result();
	}
	//  end progres usecase cancelled

	public function getTotalSquad(){
		$data = $this->db->query("
		SELECT squad.nama_squad,
		COUNT(CASE WHEN member_dsc.id_status = 1 THEN 1 END) as EMPEX,
		COUNT(CASE WHEN member_dsc.id_status = 3 THEN 1 END) as Organik,
		COUNT(CASE WHEN member_dsc.id_status = 4 THEN 1 END) as Outsource,
		COUNT(CASE WHEN member_dsc.id_status = 5 THEN 1 END) as ProHire,
		COUNT(CASE WHEN member_dsc.id_status = 6 THEN 1 END) as Probation,
		COUNT(CASE WHEN member_dsc.id_status = 8 THEN 1 END) as DigitalTalent
		FROM squad,
		member_usecase,
		member_dsc,
		status
		WHERE member_usecase.id_squad = squad.id_squad
		AND member_usecase.nik = member_dsc.nik
		AND member_dsc.id_status = status.id_status
		GROUP BY nama_squad
		ORDER BY squad.nama_squad ASC
		")->result();

		return $data;
	}

	public function getTotalSquadApp(){
		$data = $this->db->query("
		select s.nama_squad, count(mu.id_squad) as total
		from member_usecase_inter mu
		join squad s on mu.id_squad = s.id_squad
		join member_internship mi on mu.nim = mi.nim
		where mi.status_inactive !=1
		group by mu.id_squad
		")->result();

		return $data;
	}

    public function getCountUsecase(){
		$data = $this->db->query("
		select
		count(IF(usecase.id_usecase_status = 1, 1, NULL)) as inProgress,
		count(IF(usecase.id_usecase_status = 2, 1, NULL)) as done,
		count(IF(usecase.id_usecase_status = 3, 1, NULL)) as cancel
		from usecase
		")->result();
		
		return $data;
	}

	public function getTotalGroup(){
		$data = $this->db->query("
		SELECT g.nama_groups,
		COUNT(CASE WHEN member_dsc.id_status = 1 THEN 1 END) as EMPEX,
		COUNT(CASE WHEN member_dsc.id_status = 3 THEN 1 END) as Organik,
		COUNT(CASE WHEN member_dsc.id_status = 4 THEN 1 END) as Outsource,
		COUNT(CASE WHEN member_dsc.id_status = 5 THEN 1 END) as ProHire,
		COUNT(CASE WHEN member_dsc.id_status = 6 THEN 1 END) as Probation,
		COUNT(CASE WHEN member_dsc.id_status = 8 THEN 1 END) as DigitalTalent
		FROM `groups` as g, member_usecase, member_dsc, status
		WHERE member_usecase.id_groups = g.id_groups
		AND member_usecase.nik = member_dsc.nik
		AND member_dsc.id_status = status.id_status
		GROUP BY nama_groups
		ORDER BY g.nama_groups ASC
		")->result();

		return $data;
	}

	public function getTotalGroupApp(){
		$data = $this->db->query("
		select g.nama_groups, count(mu.id_groups) as total
		from member_usecase_inter mu
		join `groups` g on mu.id_groups = g.id_groups
		join member_internship mi on mu.nim = mi.nim
		where mi.status_inactive !=1
		group by mu.id_groups
		")->result();

		return $data;
	}
}	


?>
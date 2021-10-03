<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_workloadGraph extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	/* ---------------------------------------------------
	SUMMARY
	----------------------------------------------------- */
	// usecase load
	public function getCountUsecase() {
		$data = $this->db->query("
			select
			count(IF(usecase.occupancy_status = 'Underload', 1, NULL)) as Underload,
			count(IF(usecase.occupancy_status = 'Balanced', 1, NULL)) as Balanced,
			count(IF(usecase.occupancy_status = 'Overload', 1, NULL)) as Overload
			from usecase
			where id_usecase_status=1
		")->result();
		
		return $data;
	}
	// end of usecase load

	// member load
	public function getCountMember() {
		$data = $this->db->query("
			select
			count(IF(member_dsc.occupancy_status = 'Underload', 1, NULL)) as Underload,
			count(IF(member_dsc.occupancy_status = 'Balanced', 1, NULL)) as Balanced,
			count(IF(member_dsc.occupancy_status = 'Overload', 1, NULL)) as Overload
			from member_dsc
			where id_status!=7
		")->result();
		
		return $data;
	}
	// end of member load

	/* ---------------------------------------------------
	CHART
	----------------------------------------------------- */
	// nodes
	public function get_nodes() {
		$data = $this->db->query("
			select id, `group`, `level` 
					, occupancy_rate
					, occupancy_status
			from (
				select tDsc.nama_member as id
						, 'Member' as `group`
						, id_status
						, concat(tType.nama_posisi_type, ' ', tDsc.id_posisi_level) as `level`
						, occupancy_rate
						, occupancy_status
				from member_dsc tDsc 
				left join posisi_type tType on tType.id_posisi_type = tDsc.id_posisi_type
				where id_status!=7
			) t0
			union
			select id, `group`, `level` 
					, occupancy_rate
					, occupancy_status
			from (
				select nama_usecase as id
						, 'Usecase' as `group`
						, id_usecase_status
						, tLevel.nama_workload_usecase_level as `level`
						, occupancy_rate
						, occupancy_status
				from usecase tUsecase
				left join workload_usecase_level tLevel on tLevel.id_workload_usecase_level = tUsecase.level_usecase
				where id_usecase_status=1
			) t1
		")->result();
		return $data;
	}
	// end of nodes

	// links
	public function get_links() {
		$data = $this->db->query("
			select nama_usecase as `source`
				 , nama_member as target
				 , status_member as status
			from (
				select tLink.nik
					 , tMember.nama_member
					 , tMember.id_status
					 , tLink.id_usecase
					 , tUsecase.nama_usecase
					 , tUsecase.id_usecase_status
					 , tLink.status_member
				from member_usecase tLink
				left join member_dsc tMember on tMember.nik = tLink.nik
				left join usecase tUsecase   on tUsecase.id_usecase = tLink.id_usecase
			) t0
			where id_status!=7 and id_usecase_status=1
		")->result();
		return $data;
	}
	// end of links

}	


?>
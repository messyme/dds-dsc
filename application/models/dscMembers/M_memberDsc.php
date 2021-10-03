<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_memberDsc extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	//All Member DSC List
	public function get_all_member(){ 
		$this->db->join('status', 'status.id_status = member_dsc.id_status');
		$this->db->join('posisi', 'posisi.id_posisi = member_dsc.id_posisi');
		$this->db->join('posisi_level', 'posisi_level.id_posisi_level = member_dsc.id_posisi_level');
		$this->db->join('posisi_type', 'posisi_type.id_posisi_type = member_dsc.id_posisi_type');
		$this->db->join('band', 'band.id_band = member_dsc.id_band');
		$this->db->join('cluster_ed', 'cluster_ed.id_cluster_ed = member_dsc.id_cluster_ed');
		$this->db->join('education_bg', 'education_bg.id_ed_bg = member_dsc.id_ed_bg');
		$this->db->where('member_dsc.id_status !=', 7);
		return $this->db->get('member_dsc');
	}

    public function get_all_member_asesor($nik){ 
		$this->db->join('status', 'status.id_status = member_dsc.id_status');
		$this->db->join('posisi', 'posisi.id_posisi = member_dsc.id_posisi');
		$this->db->join('posisi_level', 'posisi_level.id_posisi_level = member_dsc.id_posisi_level');
		$this->db->join('posisi_type', 'posisi_type.id_posisi_type = member_dsc.id_posisi_type');
		$this->db->join('band', 'band.id_band = member_dsc.id_band');
		$this->db->join('cluster_ed', 'cluster_ed.id_cluster_ed = member_dsc.id_cluster_ed');
		$this->db->join('education_bg', 'education_bg.id_ed_bg = member_dsc.id_ed_bg');
        $this->db->where('member_dsc.nik !=', $nik);
		$this->db->where('member_dsc.id_status !=', 7);
		return $this->db->get('member_dsc');
	}

	public function get_detail_member($nik){
		$this->db->join('status', 'status.id_status = member_dsc.id_status');
		$this->db->join('posisi', 'posisi.id_posisi = member_dsc.id_posisi');
		$this->db->join('posisi_level', 'posisi_level.id_posisi_level = member_dsc.id_posisi_level');
		$this->db->join('posisi_type', 'posisi_type.id_posisi_type = member_dsc.id_posisi_type');
		$this->db->join('band', 'band.id_band = member_dsc.id_band');
		$this->db->join('education_bg', 'education_bg.id_ed_bg = member_dsc.id_ed_bg');
		$this->db->join('cluster_ed', 'cluster_ed.id_cluster_ed = member_dsc.id_cluster_ed');
		$this->db->where('member_dsc.id_status !=', 7);
		return $this->db->get_where('member_dsc', array('nik' => $nik))->row(0);
    }

	public function get_member_dscEdit($id){ 
		$this->db->join('status', 'status.id_status = member_dsc.id_status');
		$this->db->join('posisi', 'posisi.id_posisi = member_dsc.id_posisi');
		$this->db->join('posisi_level', 'posisi_level.id_posisi_level = member_dsc.id_posisi_level');
		$this->db->join('posisi_type', 'posisi_type.id_posisi_type = member_dsc.id_posisi_type');
		$this->db->join('band', 'band.id_band = member_dsc.id_band');
		$this->db->join('cluster_ed', 'cluster_ed.id_cluster_ed = member_dsc.id_cluster_ed');
		$this->db->join('education_bg', 'education_bg.id_ed_bg = member_dsc.id_ed_bg');
		$this->db->where('member_dsc.id_status !=', 7);
		$this->db->where('member_dsc.nik = ', $id);
		return $this->db->get('member_dsc')->result();
	}

	//alumni dsc
	public function getMemberAlumni() {
		$this->db->join('status', 'status.id_status = member_dsc.id_status');
		$this->db->join('posisi', 'posisi.id_posisi = member_dsc.id_posisi');
		$this->db->join('posisi_level', 'posisi_level.id_posisi_level = member_dsc.id_posisi_level');
		$this->db->join('posisi_type', 'posisi_type.id_posisi_type = member_dsc.id_posisi_type');
		$this->db->join('band', 'band.id_band = member_dsc.id_band');
		$this->db->join('cluster_ed', 'cluster_ed.id_cluster_ed = member_dsc.id_cluster_ed');
		$this->db->join('education_bg', 'education_bg.id_ed_bg = member_dsc.id_ed_bg');
		$this->db->where('member_dsc.id_status', 7);
		return $this->db->get('member_dsc');
	}

    public function get_request_edit_member(){
		return $this->db->get_where('member_dsc', array('verify_data' => 2));
    }
	
	// @codeCoverageIgnoreStart
	public function add_member_dsc($data){
		return $this->db->insert('member_dsc', $data);
	}

	public function edit_member_dsc($nik, $data){
		$this->db->set($data);
		$this->db->where('nik', $nik);
		return $this->db->update('member_dsc');
	}

    public function edit_have_account_member($nik, $data){
        $this->db->set($data);
        $this->db->where('nik', $nik);
        return $this->db->update('member_dsc');
    }

	public function delete_member_dsc($nik){
		$this->db->where('nik', $nik);
		return $this->db->delete('member_dsc');
	}

	public function check_nik_member($nik){
		$this->db->where('nik', $nik);
		return $this->db->count_all_results('member_dsc');	
	}

	public function get_nama($nik){
		$user = $this->db->get_where('member_dsc','nik = "'.$nik.'"');
		$row = $user->row();
		return $row->nama_member;
	}

    public function get_have_account($nik){
		$user = $this->db->get_where('member_dsc','nik = "'.$nik.'"');
		$row = $user->row();
		return $row->have_account;
	}

    public function get_verify_data($nik){
		$user = $this->db->get_where('member_dsc','nik = "'.$nik.'"');
		$row = $user->row();
		return $row->verify_data;
	}

    public function get_subordinate($nik){
        $this->db->join('member_dsc', 'subordinate.nik_subordinate = member_dsc.nik');
        $this->db->join('status', 'status.id_status = member_dsc.id_status');
		$this->db->join('posisi', 'posisi.id_posisi = member_dsc.id_posisi');
		$this->db->join('posisi_level', 'posisi_level.id_posisi_level = member_dsc.id_posisi_level');
		$this->db->join('posisi_type', 'posisi_type.id_posisi_type = member_dsc.id_posisi_type');
		$this->db->join('band', 'band.id_band = member_dsc.id_band');
		$this->db->where('member_dsc.id_status !=', 7);
		return $this->db->get_where('subordinate', array('nik_superior' => $nik));
    }

    public function add_subordinate($data){
        return $this->db->insert('subordinate', $data);
    }

    public function delete_subordinate($id_superior_subordinate){
        $this->db->where('id_superior_subordinate', $id_superior_subordinate);
		return $this->db->delete('subordinate');
    }

    public function get_asesor($nik){
        $this->db->join('member_dsc', 'asesor.nik_penilai = member_dsc.nik');
		$this->db->join('posisi', 'posisi.id_posisi = member_dsc.id_posisi');
		$this->db->join('posisi_level', 'posisi_level.id_posisi_level = member_dsc.id_posisi_level');
		$this->db->join('posisi_type', 'posisi_type.id_posisi_type = member_dsc.id_posisi_type');
		$this->db->join('band', 'band.id_band = member_dsc.id_band');
		$this->db->where('member_dsc.id_status !=', 7);
        return $this->db->get_where('asesor', array('nik_dinilai' => $nik));
    }

    public function add_asesor($data){
        return $this->db->insert('asesor', $data);
    }

    public function edit_asesor($id_asesor, $data){
        $this->db->set($data);
		$this->db->where('id_asesor', $id_asesor);
		return $this->db->update('asesor');
    }

    public function delete_asesor($id_asesor){
        $this->db->where('id_asesor', $id_asesor);
		return $this->db->delete('asesor');
    }

    public function get_nama_project_history($id_project_history){
        $project_history = $this->db->get_where('project_history','id_project_history = "'.$id_project_history.'"');
		$row = $project_history->row();
		return $row->project_name;
    }

    public function get_project_history($nik){
        return $this->db->get_where('project_history', array('nik' => $nik));
    }

    public function add_project_history($data){
        return $this->db->insert('project_history', $data);
    }

    public function edit_project_history($id_project_history, $data){
        $this->db->set($data);
		$this->db->where('id_project_history', $id_project_history);
		return $this->db->update('project_history');
    }

    public function delete_project_history($id_project_history){
        $this->db->where('id_project_history', $id_project_history);
		return $this->db->delete('project_history');
    }

    public function get_nama_usulan_training($id_usulan){
        $usulan_training = $this->db->get_where('usulan_training','id_usulan = "'.$id_usulan.'"');
		$row = $usulan_training->row();
		return $row->nama_training;
    }

    public function get_usulan_training($nik){
        $this->db->join('pathway', 'usulan_training.id_pathway = pathway.id_pathway');
		return $this->db->get_where('usulan_training', array('nik' => $nik));
    }

    public function get_all_usulan_training(){
        $this->db->join('member_dsc', 'usulan_training.nik = member_dsc.nik');
        $this->db->join('pathway', 'usulan_training.id_pathway = pathway.id_pathway');
		return $this->db->get_where('usulan_training');
    }

    public function add_usulan_training($data){
        return $this->db->insert('usulan_training', $data);
    }

    public function edit_usulan_training($id_usulan, $data){
        $this->db->set($data);
		$this->db->where('id_usulan', $id_usulan);
		return $this->db->update('usulan_training');
    }

    public function delete_usulan_training($id_usulan){
        $this->db->where('id_usulan', $id_usulan);
		return $this->db->delete('usulan_training');
    }

    public function get_nama_usulan_certification($id_usulan_cert){
        $usulan_sertifikasi = $this->db->get_where('usulan_sertifikasi','id_usulan_cert = "'.$id_usulan_cert.'"');
		$row = $usulan_sertifikasi->row();
		return $row->nama_certification;
    }

    public function get_usulan_certification($nik){
        $this->db->join('pathway', 'usulan_sertifikasi.id_pathway = pathway.id_pathway');
		return $this->db->get_where('usulan_sertifikasi', array('nik' => $nik));
    }

    public function get_all_usulan_certification(){
        $this->db->join('member_dsc', 'usulan_sertifikasi.nik = member_dsc.nik');
        $this->db->join('pathway', 'usulan_sertifikasi.id_pathway = pathway.id_pathway');
		return $this->db->get_where('usulan_sertifikasi');
    }

    public function add_usulan_certification($data){
        return $this->db->insert('usulan_sertifikasi', $data);
    }

    public function edit_usulan_certification($id_usulan_cert, $data){
        $this->db->set($data);
		$this->db->where('id_usulan_cert', $id_usulan_cert);
		return $this->db->update('usulan_sertifikasi');
    }

    public function delete_usulan_certification($id_usulan_cert){
        $this->db->where('id_usulan_cert', $id_usulan_cert);
		return $this->db->delete('usulan_sertifikasi');
    }

	// @codeCoverageIgnoreEnd
	//End Of All Member DSC List

	//Member kontrak
	public function get_member_kontrak() {
		$this->db->join('status', 'status.id_status = member_dsc.id_status');
		$this->db->join('posisi', 'posisi.id_posisi = member_dsc.id_posisi');
		$this->db->join('posisi_level', 'posisi_level.id_posisi_level = member_dsc.id_posisi_level');
		$this->db->join('posisi_type', 'posisi_type.id_posisi_type = member_dsc.id_posisi_type');
		$this->db->join('band', 'band.id_band = member_dsc.id_band');
		$this->db->join('cluster_ed', 'cluster_ed.id_cluster_ed = member_dsc.id_cluster_ed');
		$this->db->join('education_bg', 'education_bg.id_ed_bg = member_dsc.id_ed_bg');
		$this->db->where('member_dsc.id_status !=', 7);
		$this->db->where('member_dsc.id_status !=', 3);
		return $this->db->get('member_dsc');
		//echo $this->db->last_query(); 
		//die;
	}
	//end of Member kontrak
}	


?>